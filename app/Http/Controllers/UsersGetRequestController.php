<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class UsersGetRequestController extends Controller
{
    // PURCHASE PRODUCT FUNCTION
    public function PurchaseProduct(){
        return view('components.sections',[
            'purchase_product' => true,
            'product' => DB::table('products')->where('id',request()->input('id'))->first()
        ]);
    }
    // PURCHASE PRODUCT CONFIRM
    public function PurchaseProductConfirm(){
        $product=DB::table('products')->where('id',request()->input('id'))->first();
        if(Auth::guard('users')->user()->deposit < $product->price){
            return response()->json([
                'message' => 'Insufficient Balance,deposit funds to purchase',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'deposit' => DB::raw('deposit - '.$product->price.''),
            'updated' => Carbon::now()
        ]);
        DB::table('transactions')->insert([
            'amount' => $product->price,
            'class' => 'debit',
            'type' => 'purchase',
            'json' => json_encode($product),
            'user_id' => Auth::guard('users')->user()->id,
            'description' => ''.$product->name.' Purchase',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        DB::table('purchased')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'json' => json_encode($product),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        // REFERRAL TO BE ADDED
        $first_ref=Auth::guard('users')->user()->ref ?? '';
        $referral_settings=json_decode(DB::table('settings')->where('key','referral_settings')->first()->json ?? '{}');
        $first_level=($referral_settings->first_level * $product->price)/100;
    //    FIRST LEVEL
        if($first_ref !== ''){
                DB::table('users')->where('username',$first_ref)->update([
                    'withdrawal' =>  DB::raw('withdrawal + '.$first_level.''),
                    'updated' => Carbon::now()
                ]);
                 DB::table('transactions')->insert([
            'amount' => $first_level,
            'class' => 'credit',
            'type' => 'commission',
            'json' => json_encode([
                'level' => 'first',
                'user_id' => Auth::guard('users')->user()->id,
                
            ]),
            'user_id' => DB::table('users')->where('username',$first_ref)->first()->id,
            'description' => 'First level referral commission',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        // SECOND LEVEL
        $second_ref=DB::table('users')->where('username',$first_ref)->first()->ref ?? '';
         $second_level=($referral_settings->second_level * $product->price)/100;
        if($second_ref !== ''){
              DB::table('users')->where('username',$second_ref)->update([
                    'withdrawal' => DB::raw('withdrawal + '.$second_level.''),
                    'updated' => Carbon::now()
                ]);
                 DB::table('transactions')->insert([
            'amount' => $second_level,
            'class' => 'credit',
            'type' => 'commission',
            'json' => json_encode([
                'level' => 'second',
                'user_id' => Auth::guard('users')->user()->id,
                
            ]),
            'user_id' => DB::table('users')->where('username',$second_ref)->first()->id,
            'description' => 'Second level referral commission',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        }
        // THIRD LEVEL
        $third_ref=DB::table('users')->where('username',$second_ref)->first()->ref ?? '';
         $third_level=($referral_settings->third_level * $product->price)/100;
        if($third_ref !== ''){
              DB::table('users')->where('username',$third_ref)->update([
                    'withdrawal' => DB::raw('withdrawal + '.$third_level.''),
                    'updated' => Carbon::now()
                ]);
                 DB::table('transactions')->insert([
            'amount' => $third_level,
            'class' => 'credit',
            'type' => 'commission',
            'json' => json_encode([
                'level' => 'third',
                'user_id' => Auth::guard('users')->user()->id,
                
            ]),
            'user_id' => DB::table('users')->where('username',$third_ref)->first()->id,
            'description' => 'Third level referral commission',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        }
        }
        

        // REFERRAL TO BE ADDED
         DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just purchased a product',
        'date' => Carbon::now()
    ]);
        return response()->json([
            'message' => 'Product purchase successfull',
            'status' => 'success',
            'url' => url('users/products')
        ]);
    }

    // deposit complete 
    public function DepositComplete(){
       if(!request()->has('reference')){
        return response()->json([
            'message' => 'Invalid reference',
            'status' => 'error'
        ]);
       }
       if(DB::table('transactions')->where('uniqid',strtoupper(request()->input('reference')))->where('user_id',Auth::guard('users')->user()->id)->exists()){
        return response()->json([
            'message' => 'Reference already approved',
            'status' => 'error'
        ]);
       }
      // return request()->input('reference');
    //    if(!DB::table('transactions')->where('uniqid',request()->input('reference'))->where('user_id',Auth::guard('users')->user()->id)->where('status','initiated')->exists()){
    //       return response()->json([
    //         'message' => 'ffIgnored',
    //         'status' => 'error'
    //     ]);
    //    }
       $paystack=Http::withToken(env('PSTCK_SECRET_KEY'))->get('https://api.paystack.co/transaction/verify/'.request()->input('reference').'');
       if($paystack->successful()){
        $data=$paystack->json();
     // return $data['data'];

        if(isset($data['data']['status']) && $data['data']['status'] == 'success'){
            // DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('uniqid',request()->input('reference'))->update([
            //     'status' => 'success',
            //     'json' => json_encode([
            //         'gateway' => 'paystack',
            //         'details' => [

            //         ]
            //     ])
                
            // ]);
               DB::table('transactions')->insert([
            'uniqid' => strtoupper(request()->input('reference')),
            'amount' => $data['data']['amount'] / 100,
            'class' => 'credit',
            'type' => 'deposit',
            'user_id' => Auth::guard('users')->user()->id,
            'description' => 'Account deposit',
             'json' => json_encode([
                    'gateway' => 'paystack',
                    'details' => [

                    ]
                    ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
            
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'deposit' => DB::raw('deposit + '.($data['data']['amount']/100).''),
                'updated' => Carbon::now()
            ]);
            return redirect()->to('users/wallet');
        //       return response()->json([
        //     'message' => 'success',
        //     'status' => 'success',
        //     'url' => url('users/wallet')
        // ]);
        }else{
               return response()->json([
            'message' => 'Ignored',
            'status' => 'error'
        ]);
        }
       }else{
           return response()->json([
            'message' => 'Ignored',
            'status' => 'error'
        ]);
       }
    }
    // get paystack banks
    public function GetBanks(){
        $banks=Http::withToken(env('PSTCK_SECRET_KEY'))->get('https://api.paystack.co/bank',[
            'country' => 'nigeria'
        ]);
        if($banks->successful()){
           return $banks->json();
        }else{
            return dd($banks->body());
        }
    }
    // auto verify
    public function AutoVerify(){
        foreach(Banks()->data as $data){
           if($data->id == request()->input('bank_id')){
            $bank_code=$data->code;
            $bank_name=$data->name;
           }
        }
        $response=Http::withToken(env('PSTCK_SECRET_KEY'))->get('https://api.paystack.co/bank/resolve',[
            'account_number' => request()->input('account_number'),
            'bank_code' => $bank_code
        ]);
        if($response->successful()){
           $data=json_decode(json_encode($response->json()));
           return response()->json([
            'message' => 'Account verification succcessfull',
            'status' => 'success',
            'account_name' => $data->data->account_name,
            'bank_name' => $bank_name
           ]);
        }else{
            return response()->json([
                'message' => 'Invalid account.Please check the account information and try again.',
                'status' => 'error'
            ]);
        }
    }
    // public function checkin
    public function CheckIn(){
        if(DB::table('transactions')->where('type','check in')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->exists()){
            return response()->json([
                'message' => 'You have already checked in today,try again tomorrow',
                'status' => 'error'
            ]);
        }else{
            $finance=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json);
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'withdrawal' => DB::raw('withdrawal + '.$finance->daily_check_in.'')
            ]);
              DB::table('transactions')->insert([
            'amount' => $finance->daily_check_in,
            'class' => 'credit',
            'type' => 'check in',
            'user_id' => Auth::guard('users')->user()->id,
            'description' => 'Daily Check In',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Daily Check in successful and wallet has been creditted',
            'status' => 'success',
            'url' => url('users/dashboard')
        ]);
        
        }
    }
 
}
