<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class UsersPostRequestController extends Controller
{
    // REGISTER USER FUNCTION
    public function Register(){
      if(!preg_match('/^0/',request()->input('phone'))){
        return response()->json([
            'message' => 'Please enter a valid number starting with zero(e.g, 09013350351)',
            'status' => 'error'
        ]);
      }
      if(strlen(request()->input('phone')) !== 11){
         return response()->json([
            'message' => 'Please enter a valid 11 digit mobile number ',
            'status' => 'error'
        ]);
      }
        //    check number
       if(DB::table('users')->where('phone',request()->input('phone'))->exists()){
        return response()->json([
            'message' => 'Mobile Number has already been used',
            'status' => 'error'
        ]);
       }
        // check username
       if(DB::table('users')->where('username',strtolower(str_replace(['-',' '],'',request()->input('username'))))->exists()){
        return response()->json([
            'message' => 'Username already taken',
            'status' => 'error'
        ]);
       }
   
    //    verify password against confirm password
       if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('password')))){
        return response()->json([
            'message' => 'Password and confirm password must match',
            'status' => 'error'
        ]);
       }
    //    declare ref
    $ref=request()->input('ref');
    //    insert into db
    DB::table('users')->insert([
        'uniqid' => strtoupper(uniqid('usr')),
        'email' => strtolower(str_replace(['-',' '],'',request()->input('username'))).'@gmail.com',
        'phone' => request()->input('phone'),
        'username' => strtolower(str_replace(['-',' '],'',request()->input('username'))),
        'ref' => $ref,
        'withdrawal' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json)->welcome_bonus,
        'password' => Hash::make(request()->input('password')),
        'date' => Carbon::now(),
        'updated' => Carbon::now()
    ]);
    DB::table('notifications')->insert([
        'message' => ucfirst(request()->input('username')).' Just registered an account',
        'date' => Carbon::now()
    ]);
    return response()->json([
        'message' => 'Registration successfull,redirectiong to login...',
        'status' => 'success',
        'url' => url('login')
    ]);
    }


    // USER LOGIN FUNCTION
    public function Login(){
        // validate users
        if(!DB::table('users')->where('username',request()->input('id'))->orWhere('phone',request()->input('id'))->exists()){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ]);

        }
        // select user
        $user=DB::table('users')->where('username',request()->input('id'))->orWhere('phone',request()->input('id'))->first();
    //   validate password 
        if(!Hash::check(request()->input('password'),$user->password)){
            return response()->json([
                'message' => 'Invalid account password',
                'status' => 'error'
            ]);
        }
        if($user->status !== 'active'){
            return response()->json([
                'message' => 'Your account has been banned',
                'status' => 'error'
            ]);
        }
        // login user
        Auth::guard('users')->loginUsingId($user->id,true);
       DB::table('logs')->insert([
        'user_id' => $user->id,
        'ip' => request()->ip(),
        'date' => Carbon::now()
       ]);
        return response()->json([
            'message' => 'Login successfully',
            'status' => 'success',
            'url' => url('users/dashboard')
        ]);
    }
    //  initiate deposit
     public function InitiateDeposit(){
        //return request()->input('amount');
        $uniqid =uniqid('TRX');
        if(request()->input('amount') < DB::table('products')->orderBy('price','asc')->first()->price){
            return response()->json([
                'message' => 'Minimum deposit is '.number_format(DB::table('products')->orderBy('price','asc')->first()->price,2).'',
                'status' => 'error'
            ]);
        }
        // DB::table('transactions')->insert([
        //     'uniqid' => strtoupper($uniqid),
        //     'amount' => request()->input('amount'),
        //     'class' => 'credit',
        //     'type' => 'deposit',
        //     'user_id' => Auth::guard('users')->user()->id,
        //     'description' => 'Account deposit',
        //     'status' => 'initiated',
        //     'updated' => Carbon::now(),
        //     'date' => Carbon::now()
        // ]);
        $email=Auth::guard('users')->user()->email;
        $request=Http::get(env('API_URL').'/order/payment/initiate',[
            'email' => $email,
            'amount' => request()->input('amount'),
            'currency' => 'NGN',
            'reference' => $uniqid,
            'callback_url' => url('users/get/deposit/complete')
        ]);
       
        if($request->successful()){
          $data=$request->json();
          if($data['status'] == 'error'){
            return response()->json([
                'message' => 'Could not initiate deposit,please try again...',
                'status' => 'error'
            ]);
          }
        }else{
           
           // echo $email;
         //  return dd($paystack->body());
           return response()->json([
            'message' => 'Could not initiate deposit,please try again...',
            'status' => 'error'
        ]);

        }
        $data=$data['message'];
        DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just initiated a deposit',
        'date' => Carbon::now()
    ]);
        return response()->json([
            'message' => 'Deposit Request initiated successfully,redirecting to checkout...',
            'status' => 'success',
            'url' => env("API_URL").'/paystack/deposit'.'?url='.$data['data']['authorization_url']
        ]);

     }
    //  password update
    public function PasswordUpdate(){
        if(!Hash::check(request()->input('current'),Auth::guard('users')->user()->password)){
            return response()->json([
                'message' => 'Invalid current password',
                'status' => 'error'
            ]);
        }
        if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('new')))){
            return response()->json([
                'message' => 'New password and confirm password must match',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'password' => Hash::make(request()->input('new')),
            'updated' => Carbon::now()
        ]);
         DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just updated his/her account password',
        'date' => Carbon::now()
    ]);
        return response()->json([
            'message' => 'Password updated successfully',
            'status' => 'success'
        ]);
    }
    // add bank
    public function AddBank(){

        foreach(Banks()->data as $data){
            if($data->id == request()->input('bank_id')){
                $bank_name=$data->name;
                // $bank_code=$data->code;
                break;
            }
        }
    
     
       
          
        
           
     
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'bank' => json_encode([
                'account_number' => request()->input('account_number'),
                'bank_name' => $bank_name,
                'account_name' => request()->input('account_name') 
            ]),
            
            'updated' => Carbon::now()
            ]);
             DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just updated withdrawal bank details',
        'date' => Carbon::now()
    ]);
        return response()->json([
            'message' => 'Bank details successfully updated',
            'status' => 'success',
            'url' => url('users/bank')
        ]);

            
       
     
    }
    // withdraw 
    public function Withdraw(){
      if(request()->input('amount') > Auth::guard('users')->user()->withdrawal){
        return response()->json([
            'message' => 'You cannot withdraw more than your balance',
            'status' => 'error'
        ]);
      }
      $finance_settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}');
      if(request()->input('amount') < $finance_settings->min_withdrawal){
        return response()->json([
            'message' => 'Minimum withdrawal amount is &#8358;'.number_format($finance_settings->min_withdrawal,2).'',
            'status' => 'error'
        ]);
     }
      if($finance_settings->withdrawal_status == 'closed'){
        return response()->json([
            'message' => 'Withdrawal portal is currently closed',
            'status' => 'error'
        ]);
     }
      $fee=($finance_settings->withdrawal_fee*request()->input('amount'))/100;
     DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'withdrawal' => DB::raw('withdrawal - '.request()->input('amount').'')
     ]);
      DB::table('transactions')->insert([
        'uniqid' => strtoupper(uniqid('trx')),
        'amount' => request()->input('amount'),
        'class' => 'debit',
        'type' => 'withdrawal',
        'json' => json_encode([
            'fee' => $fee,
            'amount' => request()->input('amount') - $fee,
            'details' => [
                'bank' => Auth::guard('users')->user()->bank
            ]
            ]),
            'user_id' => Auth::guard('users')->user()->id,
            'description' => 'Bank Withdrawal',
            'status' => 'pending',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
      ]);
       DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just placed a withdrawal',
        'date' => Carbon::now()
    ]);
      return response()->json([
        'message' => 'Withdrawal placed successfully',
        'status' => 'success',
        'url' => url('users/wallet')
      ]);
    }
    // create virtual account
    public function CreateVirtualAccount(){
        // // DEBUG
        //  return response()->json([
        //     'message' => 'Virtual Account created successfully',
        //     'status' => 'success',
        //     'account_number' => '5005016577',
        //     'bank_name' => 'Wema Bank',
        //     'account_name' => 'DEVTECHIEINNO/David James',
        //     'url' => url('users/recharge'),
        //     'notify' => 'false'
        // ]);
        // create customer
        if(DB::table('users')->where('customer_details->email',request()->input('email'))->exists()){
            return response()->json([
                'message' => 'A user with this email already exist,please use another email',
                'status' => 'error'
            ]);
        }
        $response=Http::get(env('API_URL').'/create/customer',[
            'email' => request()->input('email'),
            'first_name' => request()->input('first_name'),
            'last_name' => request()->input('last_name'),
            'phone' => Auth::guard('users')->user()->phone
        ]);
        
        $data=$response->json();
     
      if($data['status'] == 'success'){
          DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'customer_details' => json_encode($data['data']['data'])
        ]);
      }else{
        return response()->json([
            'message' => 'Error creating your virtual account,try again or use manual deposit',
            'status' => 'error'
        ]);
      }
        $request=Http::get(env('API_URL').'/create/dva',[
            'customer' => $data['data']['data']['customer_code'],
            'first_name' => request()->input('first_name'),
            'last_name' => request()->input('last_name'),
            'phone' => Auth::guard('users')->user()->phone
        ]);
        if($request->json()['status'] == 'success'){
             DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'virtual_account' => json_encode($request->json()['data']['data'])
        ]);
        return response()->json([
            'message' => 'Virtual Account created successfully',
            'status' => 'success',
            'account_number' => $request->json()['data']['data']['account_number'],
            'bank_name' => $request->json()['data']['data']['bank']['name'],
            'account_name' => $request->json()['data']['data']['account_name'],
            'url' => url('users/recharge')
        ]);
        }else{
               return response()->json([
            'message' => 'Error creating your virtual account,try again or use manual deposit',
            'status' => 'error'
        ]);
        }
     


    }
    // deposit complete
    public function DepositSubmit(){
        if(request()->input('amount') < DB::table('products')->orderBy('price','asc')->first()->price){
            return response()->json([
                'message' => 'Minimum deposit is &#8358;'.number_format(DB::table('products')->orderBy('price','asc')->first()->price).'',
                'status' => 'error'
            ]);
        }
           DB::table('transactions')->insert([
            'uniqid' => strtoupper(Str::random(10)),
            'amount' => request()->input('amount'),
            'class' => 'credit',
            'type' => 'deposit',
            'user_id' => Auth::guard('users')->user()->id,
            'description' => 'Account deposit',
             'json' => json_encode([
                    'gateway' => 'Manual',
                    'details' => [
                        'bank_name' => request()->input('bank_name'),
                        'account_name' => request()->input('account_name')
                    ]
                    ]),
            'status' => 'pending',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
          DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just submitted a deposit request',
        'date' => Carbon::now()
    ]);
    return response()->json([
        'message' => 'Deposit request submitted successfully,awaiting approval',
        'status' => 'success',
        'url' => url('users/wallet')
    ]);
    
            
        
    }
}
