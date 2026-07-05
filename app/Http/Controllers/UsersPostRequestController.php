<?php

namespace App\Http\Controllers;

use App\Http\Middleware\GeneralMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UsersPostRequestController extends Controller
{
    // register
    public function Register(){
        try{
      
       
        request()->merge(array_map('trim',request()->all()));
       $validator=Validator::make(request()->all(),[
            'first_name' => 'required|string|max:255|min:2',
            'last_name' => 'required|string|max:255|min:2',
            'username' => 'required|string|max:50|min:3|regex:/^[a-zA-Z0-9_]+$/|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|regex:/^[0-9]{11}$/',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'coupon' => 'required',
            'package' => 'required',
            'country' => 'required'
       ],[
        'first_name.required' => 'First name cannot be empty',
        'first_name.string' => 'First name must be a string',
        'first_name.max' => 'First name must have a maximum of 255 characters',
        'first_name.min' => 'First name must have a minimum of 2 characters',
        'last_name.required' => 'Last name is required',
        'last_name.string' => 'last name must be a string',
        'last_name.max' => 'Last name must have maximum of 255 characters',
        'last_name.min' => 'Last name must have a minimum of 2 characters',
        'username.required' => 'Username is reuired and cannot be empty',
        'username.string' => 'Username must be a string',
        'username.max' => 'Username should have a maximum of 50 characters',
        'username.min' => 'Username should have a minimum of 3 characters',
        'username.regex' => 'Username should only contain alphabets(A - Z), numbers(0 - 9) and underscore',
        'username.unique' => 'Username already taken',
        'email.required' => 'Email is required and cannot be empty',
        'email.email' => 'Please enter a valid email (i.e you@example.com)',
        'email.max' => 'Email should have a maximum of 255 characters',
        'email.unique' => 'Email already exists on our server',
        'phone.required' => 'Phone number is required and cannot be empty',
        'phone.regex' => 'Invalid Phone number',
        'password.required' => 'Password is required and cannot not be empty',
        'confirm_password.required' => 'Confirm password is required and cannot be empty',
        'confirm_password.same' => 'Password and Confirm password must be the same',
        'coupon' => 'Coupon code is required for signup',
        'package.required' => 'Package is required',
        'country' => 'Country is required'
       ]);

       if($validator->fails()){
        return response()->json([
            'message' => $validator->errors()->first(),
            'status' => 'error'
        ]);
       }
  
         
        $name=trim(request('first_name')).' '.trim(request('last_name'));
        $name=ucwords(strtolower($name));
        $username=str_replace('-','_',request('username'));
        $username=trim(strtolower(str_replace([' ','@'],'',$username)));
        $email=trim(strtolower(str_replace(' ','',strtolower(request('email')))));
        $phone=request('phone');
        $password=request('password');
        $confirm_password=request('confirm_password');
        $coupon=request('coupon');
        $package=request('package');
        $country=request('country');
        $currency=collect(json_decode(file_get_contents(database_path('data/countries.json'))))->where('name',$country)->first()->currency;
        



        
    // make sure email does not exists
       if(DB::table('users')->where('email',$email)->exists()){
        return response()->json([
            'message' => 'Email already exists on our server',
            'status' => 'error'
        ]);
       }
    //    make sure username does not exist
    if(DB::table('users')->where('username',$username)->exists()){
    return response()->json([
        'message' => 'Username already exists on our server',
        'status' => 'error'
    ]);
    }
   
    // make sure password and confirm password are the same
    if(!Hash::check($password,Hash::make($confirm_password))){
        return response()->json([
        'message' => 'Password & confirm password must match',
        'status' => 'error'
        ]);
          
    }

    // make sure its a valid coupon code
    if(!DB::table('coupons')->where('uniqid',$coupon)->where('status','active')->where('package->country->value',$country)->exists()){
        return response()->json([
            'message' => 'Invalid coupon code',
            'status' => 'error'
        ]);
    }

    $coupon=DB::table('coupons')->where('uniqid',$coupon)->where('status','active')->where('package->country->value',$country)->first();
   $package=json_decode($coupon->package);
    DB::transaction(function() use($username,$phone,$name,$email,$password,$coupon,$country,$currency,$package){
    // insert into db
    $user_id=DB::table('users')->insertGetId([
        'uniqid' => uniqid('usr'),
        'type' => 'user',
        'username' => $username,
        'phone' => $phone,
        'name' => $name,
        'package' => json_decode($coupon->package)->name->value,
        'pkg' => $package->id,
        'country' => $country,
        'currency' => $currency,
        'coupon' => json_encode($coupon),
        'ref' => DB::table('users')->where('uniqid',request('ref',''))->first()->username ?? null,
        'email' => $email,
        'main_balance' => json_decode($coupon->package)->earnify_free_bonus->value ?? 0,
        'password' => Hash::make($password),
        'updated' => Carbon::now(),
        'date' => Carbon::now(),
    ]);

    DB::table('coupons')->where('id',$coupon->id)->update([
        'status' => 'used'
    ]);
     DB::table('transactions')->insert([
            'uniqid' => GenerateID(),
            'user_id' => $user_id,
            'title' => 'Free Bonus',
            'class' => 'credit',
            'type' => 'welcome_bonus',
            'amount' => $package->earnify_free_bonus->value,
            'fee' => 0,
            'icon' => '',
            'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()),
            'data' => json_encode([
                'Package' => ucwords($package->name->value),
                'Activation Fee' => $currency.number_format($package->activation_fee->value),
                'Country' => ucwords($country)
            ]),
            'json' => json_encode([
            'balance' => [
                'before' => 0,
                'after' => 500
            ],
            'primary_wallet' => 'main Wallet'

            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
            ]);


    if(request()->has('ref') && DB::table('users')->where('uniqid',request('ref'))->where('country',$country)->where('status','active')->exists()){
        $agent=DB::table('users')->where('uniqid',request('ref'))->first();
        $agent_reward=$package->earnify_agent_rewards->value;
        DB::table('users')->where('id',$agent->id)->increment('affiliate_balance',$agent_reward);
          DB::table('transactions')->insert([
            'uniqid' => GenerateID(),
            'user_id' => $agent->id,
            'title' => 'Agent Rewards',
            'class' => 'credit',
            'type' => 'referral_commission',
            'amount' => $agent_reward,
            'fee' => 0,
            'icon' => '',
            'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','affiliate_balance')->first()),
            'data' => json_encode([
                'Downline' => ucwords($username),
                'Downline Package' => ucwords($package->name->value),
                'Downline Activation Fee' => $currency.number_format($package->activation_fee->value),
                'Downline Country' => ucwords($country)
            ]),
            'json' => json_encode([
            'balance' => [
                'before' => 0,
                'after' => 500
            ],
            'primary_wallet' => 'Affiliate Wallet',
            'referral_level' => '1'

            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
            ]);

                if(!is_null($agent->ref)){
                    $agent2=DB::table('users')->where('username',$agent->ref)->where('country',$agent->country)->first();
                    $agent_gold=$package->agent_gold->value;
                    DB::table('users')->where('id',$agent2->id)->increment('affiliate_balance',$agent_gold);
                     DB::table('transactions')->insert([
                        'uniqid' => GenerateID(),
                        'user_id' => $agent2->id,
                        'title' => 'Agent Gold',
                        'class' => 'credit',
                        'type' => 'referral_commission',
                        'amount' => $agent_gold,
                        'fee' => 0,
                        'icon' => '',
                        'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','affiliate_balance')->first()),
                        'data' => json_encode([
                            'Downline' => ucwords($agent->username),
                            'Downline Country' => ucwords($agent->country)
                        ]),
                        'json' => json_encode([
                        'balance' => [
                            'before' => 0,
                            'after' => 500
                        ],
                        'primary_wallet' => 'Affiliate Wallet',
                        'referral_level' => '2'

                        ]),
                        'status' => 'success',
                        'updated' => Carbon::now(),
                        'date' => Carbon::now()
                        ]);

                                if(!is_null($agent2->ref)){
                                    $agent3=DB::table('users')->where('username',$agent2->ref)->where('country',$agent2->country)->first();
                                    $agent_silver=$package->agent_silver->value;
                                    DB::table('users')->where('id',$agent3->id)->increment('affiliate_balance',$agent_silver);
                                     DB::table('transactions')->insert([
                        'uniqid' => GenerateID(),
                        'user_id' => $agent3->id,
                        'title' => 'Agent Silver',
                        'class' => 'credit',
                        'type' => 'referral_commission',
                        'amount' => $agent_silver,
                        'fee' => 0,
                        'icon' => '',
                        'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()),
                        'data' => json_encode([
                            'Downline' => ucwords($agent2->username),
                            'Downline Country' => ucwords($agent2->country)
                        ]),
                        'json' => json_encode([
                        'balance' => [
                            'before' => 0,
                            'after' => 500
                        ],
                        'primary_wallet' => 'Affiliate Wallet',
                        'referral_level' => '3'

                        ]),
                        'status' => 'success',
                        'updated' => Carbon::now(),
                        'date' => Carbon::now()
                        ]);
                                }
                }
    }
   
  
   });
    return response()->json([
        'message' => 'Registration successfull,redirecting...',
        'status' => 'success'
    ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
       
    }

    // login
    public function Login(){
        request()->merge(array_map('trim',request()->all()));
        $validator=Validator::make(request()->all(),[
            'id' => 'required|string|regex:/^[A-Za-z0-9_]+$/',
            'password' => 'required'
        ],[
        'id.required' => 'Username is required and cannot be empty',
        'id.string' => 'Username must be a string',
        'id.regex' => 'Username should only contain alphabets(A - Z), numbers(0 - 9) and underscore',
        'password.required' => 'Password is required and cannot not be empty',
     
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        $password=request('password');
        $username=request('id');
       
        if(!DB::table('users')->where('username',$username)->exists()){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ]);
        }
        $user=DB::table('users')->where('username',$username)->first();
        if(!Hash::check($password,$user->password)){
            return response()->json([
                'message' => 'Invalid account password',
                'status' => 'error'
            ]);
        }
        if($user->status == 'banned'){
            return response()->json([
                'message' => 'User account has been banned,please contact admin',
                'status' => 'error'
            ]);
        }

        Auth::guard('users')->loginUsingId($user->id,true);
        return response()->json([
            'message' => 'Login successful,redirecting...',
            'status' => 'success'
        ]);
    }

    // social settings
    public function SocialSettings(){
        $facebook=request('facebook') == '' ? null : request('facebook');
        $tiktok=request('tiktok') == '' ? null : request('tiktok');
        $instagram=request('instagram') == '' ? null : request('instagram');
        $twitter=request('twitter') == '' ? null : request('twitter');
        $whatsapp=request('whatsapp') == '' ? null : request('whatsapp');
        $telegram=request('telegram') == '' ? null : request('telegram');
        if($whatsapp && strlen($whatsapp) != 11){
            return response()->json([
                'message' => 'Enter a valid 11 digit phone number',
                'status' => 'error'
            ]);
        }
        $socials=[
             'facebook' => $facebook ?? null,
            'tiktok' => $tiktok ?? null,
            'instagram' => $instagram ?? null,
            'twitter' => $twitter ?? null,
            'whatsapp' => $whatsapp ?? null,
            'telegram' => $telegram ?? null
        ];
        

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'socials' => json_encode($socials)
        ]);
        return response()->json([
    'message' => 'Social settings updated successfully',
    'status' => 'success'
        ]);
    }

    // payout settings
    public function PayoutSettings(){
        $bank_name=request('bank_name');
        $account_number=request('account_number');
        $account_name=request('account_name');
        if(strlen(trim($account_number)) !== 10){
            return response()->json([
                'message' => 'Please enter a 10 digits account number',
                'status' => 'error'
            ]);
        }
        $bank=[
            'account_number' => trim($account_number),
            'bank_name' => $bank_name,
            'account_name' => $account_name
        ];
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'bank' => json_encode($bank)
        ]);
        return response()->json([
            'message' => 'Payout settings updated successfully',
            'status' => 'success'
        ]);
    }

 

    // update password
    public function UpdatePassword(){
        try{
         $validator=Validator::make(request()->all(),[
        'password.current' => 'required',
        'password.new.index' => 'required',
        'password.new.confirm' => 'required|same:password.new.index'
    ],[
        'password.current.required' => 'Current password cannot be empty',
        'passsword.new.index.required' => 'New password cannot be empty',
        'password.new.confirm.required' => 'Confirm password cannot be empty',
        'password.new.confirm.same' => 'New password and Confirm password must be the same'
    ]);

    if($validator->fails()){
        return response()->json([
            'message' => $validator->errors()->first(),
            'status' => 'error'
        ]);
    }

    if(!Hash::check(request('password.current'),Auth::guard('users')->user()->password)){
        return response()->json([
            'message' => 'Invalid current password',
            'status' => 'error'
        ]);
    }

    DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'password' => Hash::make(request('password.new.index'))
    ]);
    return response()->json([
        'message' => 'Account password updated successfully',
        'status' => 'success'
    ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
   
    }

    // claim task reward
    public function ClaimTaskReward(){
        try{
              request()->merge(array_map('trim',request()->all()));
            $validator=Validator::make(request()->all(),[
                "id" => "required|integer|min:0|exists:tasks,id",
            ],[
                "id.required" => "Task ID is required and cannot be empty",
                "id.integer" => "Task ID must be a valid integer",
                "id.min" => "Invalid task ID",
                "id.exists" => "Task not found"
            ]);
            if($validator->fails()){
                return response()->json([
                    'message' => $validator->errors()->first(),
                    'status' => 'error'
                ]);
            }
            $task=DB::table('tasks')->where('id',request('id'))->first();
            $reward=$task->reward;
            $status='pending';
            $message='Task Completed successfully,awaiting review';
            $proof=' <a class="c-primary no-pointer no-select no-u w-fit">No Screenshot attached</a>';
            if(DB::table('task_proofs')->where('user_id',Auth::guard('users')->user()->id)->where('task->id',request('id'))->exists()){
                return response()->json([
                    'message' => 'You have already performed this task before',
                    'status' => 'error'
                ]);
            }

            if($task->proofs >= $task->limit){
                return response()->json([
                    'message' => 'Task already completed',
                    'status' => 'success'
                ]);
            }

            if(request()->hasFile('screenshot')){
                $name=strtolower(GenerateID()).'.'.request()->file('screenshot')->getClientOriginalExtension();
                request()->file('screenshot')->move(public_path('tasks/proofs'),$name);
                $proof=' <a href="'.asset('tasks/proofs/'.$name.'').'" target="_blank" class="c-primary no-select w-fit">
                        View Screenshot
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M228,104a12,12,0,0,1-24,0V69l-59.51,59.51a12,12,0,0,1-17-17L187,52H152a12,12,0,0,1,0-24h64a12,12,0,0,1,12,12Zm-44,24a12,12,0,0,0-12,12v64H52V84h64a12,12,0,0,0,0-24H48A20,20,0,0,0,28,80V208a20,20,0,0,0,20,20H176a20,20,0,0,0,20-20V140A12,12,0,0,0,184,128Z"></path></svg>

                    </a>';
            }
            if(config('settings.task_reward') != 'review'){
                $status='approved';
                $message='Task Completed successfully and reward granted success';
                DB::transaction(function() use($task,$reward){
     DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                        'main_balance' => DB::raw('main_balance + '.$reward.''),
                        'updated' => Carbon::now()
                ]);
               
                 DB::table('transactions')->insert([
                'uniqid' => GenerateID(),
                'user_id' => Auth::guard('users')->user()->id,
                'title' => 'Daily Activities',
                'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 4H5V20H19V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H19.9997C20.5519 2 20.9996 2.44772 20.9997 3L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11.2929 13.1213L15.5355 8.87868L16.9497 10.2929L11.2929 15.9497L7.40381 12.0607L8.81802 10.6464L11.2929 13.1213Z"></path></svg>',
                'class' => 'credit',
                'type' => 'task_reward',
                'amount' => $reward,
                'fee' => 0,
               'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()),
                'data' => json_encode([
                    'Task Performed' => $task->title
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => Auth::guard('users')->user()->main_balance,
                'after' => Auth::guard('users')->user()->main_balance + $reward 
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
                });
               
            }

            DB::transaction(function() use($task,$proof,$status){
            DB::table('tasks')->where('id',request('id'))->update([
                'proofs' => DB::raw('proofs + 1')
            ]);
            DB::table('task_proofs')->insert([
                'uniqid' => GenerateID(),
                'user_id' => Auth::guard('users')->user()->id,
                'task' => json_encode($task),
                'proofs' => json_encode([
                    'Screenshot' => $proof
                ]),
                'status' => $status,
                'updated' => Carbon::now(),
                'date' => Carbon::now() 
            ]);
            });
            
            return response()->json([
                'message' => $message,
                'status' => 'success'
            ]);



        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
          


    }

    // withdrawal
    public function Withdraw(){
        try{

          $pin=request('pin');
      $amount=request('amount');
      $wallet=request('wallet');
      $withdrawal_settings=json_decode(DB::table('settings')->where('key','withdrawal_settings')->first()->value ?? '{}');
       $wallets=collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key',$wallet)->first();
        $user=Auth::guard('users')->user();
        $validator=Validator::make(request()->all(),[
            'amount' => 'required|numeric|min:0',
            'wallet' => 'required',
            'pin' => 'required|numeric|digits:6'
        ],[
            'amount.required' => 'Withdrawal amount cannot be empty',
            'amount.numeric' => 'Withdrawal amount must be a number',
            'amount.min' => 'Please enter a minimum amount greater than '.$user->currency.'0',
            'wallet.required' => 'Please select withdrawal wallet',
            'pin.required' => 'Please enter your transaction pin',
            'pin.numeric' => 'Transaction pin must contain only numbers',
            'pin.digits' => 'Transaction pin must be 6 digits'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
      if($amount > $user->{$wallet}){
        return response()->json([
            'message' => 'Insufficient balance',
            'status' => 'error'
        ]);
      }

      if(!isset($user->bank)){
        return response()->json([
            'message' => 'You must link a payout account before placing withdrawals',
            'status' => 'error'
        ]);
      }

      if(!Hash::check($pin,Auth::guard('users')->user()->transaction_pin)){
        return response()->json([
            'message' => 'Invalid transaction pin',
            'status' => 'error'
        ]);
      }

      if($amount < $withdrawal_settings->{$wallet}->minimum){
        return response()->json([
            'message' => 'Minimum withdrawal for '.$wallets->name.' is '.$user->currency.number_format($withdrawal_settings->{$wallet}->minimum,2).'',
            'status' => 'info'
        ]);
      }

      if($withdrawal_settings->{$wallet}->portal == 'off'){
        return response()->json([
            'message' => ''.$wallets->name.' withdrawal portal is currently off, please check back later',
            'status' => 'info'
        ]);
      }

      $tx=DB::transaction(function() use($wallet,$amount,$user,$wallets){
            DB::table('users')->where('id',$user->id)->decrement($wallet,$amount);
                $trx_id=DB::table('transactions')->insertGetId([
                'uniqid' => GenerateID(),
                'user_id' => $user->id,
                'title' => ''.$wallets->name.' Withdrawal',
                'class' => 'debit',
                'type' => 'withdrawal',
                'amount' => $amount,
                'fee' => 0,
                'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V9.99979H22.0049ZM22.0049 7.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V7.99979ZM15.0049 15.9998V17.9998H19.0049V15.9998H15.0049Z"></path></svg>',
                'wallet' => json_encode($wallets),
                'json' => json_encode([
                'balance' => [
                    'before' => 0,
                    'after' => 0
                ],
                'primary_wallet' => $wallets->name,
                'bank' => [
                    'method' => 'bank',
                    'account_number' => json_decode($user->bank)->account_number,
                    'account_name' => json_decode($user->bank)->account_name,
                    'bank_name' => json_decode($user->bank)->bank_name
                ]

                ]),
                'data' => json_encode([
                    'Account Number' => json_decode($user->bank)->account_number,
                    'Bank Name' => json_decode($user->bank)->bank_name,
                    'Account Name' => json_decode($user->bank)->account_name,
                    'Withdrawal Amount' => $user->currency.number_format($amount,2),
                    'Withdrawal Fee' => $user->currency.number_format(0,2),
                    'To Receive' => $user->currency.number_format($amount,2),
                    'wallet' => $wallets->name
                ]),
                'status' => 'pending',
                'updated' => Carbon::now(),
                'date' => Carbon::now()
                ]);
                return $trx_id;
      });

      return response()->json([
        'message' => 'Withdrawal placed successfully',
        'status' => 'success',
        'url' => url('users/transaction/receipt?id='.$tx.'')
      ]);

      

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Internal server error, please try again',
                'status' => 'error'
            ]);
        }
    
   
    }


    // purchase product
    public function PurchaseProduct(){
        $product=DB::table('products')->where('id',request('id'))->first();
        if(Auth::guard('users')->user()->deposit_balance < $product->price){
            return response()->json([
                'message' => 'Insufficient balance,kindly fund your account to purchase item',
                'status' => 'error' 
            ]);
        }
    $id=DB::transaction(function() use($product){
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->decrement('deposit_balance',$product->price);
        $id= DB::table('transactions')->insertGetId([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Purchased product in Marketplace',
    'class' => 'debit',
    'type' => 'marketplace',
    'amount' => $product->price,
    'fee' => 0,
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z"></path></svg>',
    'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','deposit')->first()),
    'data' => json_encode([
        'Product' => $product->name,
        'Product Category' => $product->category,
        'Product Location' => $product->location.' State',
        'Delivery Address' => request('delivery_address'),
        'Delivery State' => request('delivery_state').' State'
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->deposit_balance,
        'after' => Auth::guard('users')->user()->deposit_balance + $product->price
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    DB::table('purchased_products')->insert([
        'uniqid' => GenerateID(),
        'user_id' => Auth::guard('users')->user()->id,
        'product' => json_encode($product),
        'delivery_address' => request('delivery_address'),
        'delivery_state' => request('delivery_state'),
        'status' => json_encode([
            'buyer' => 'not received',
            'seller' => 'not delivered'
        ]),
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
    DB::table('products')->where('id',$product->id)->update([
        'status' => 'purchased'
        ]);
    return $id;
    });
    return response()->json([
        'message' => 'Item purchased successfully,awaiting delivery',
        'status' => 'success',
        'receipt' => url('users/transaction/receipt?id='.$id.'')
    ]);
    }

    // confirm delivery
    public function ConfirmDelivery(){
        DB::table('purchased_products')->where('id',request('id'))->update([
            'status->buyer' => 'received'
        ]);
        return response()->json([
            'message' => 'Item marked as received successfully',
            'status' => 'success'
        ]);
    }

    // send code
    public function SendCode(){
         try{
            $user=DB::table('users')->where('email',request('email'));
            if(!$user->exists()){
                  return  response()->json([
                        'message' => 'User not found',
                        'status' => 'error'
                    ]);
            }
            $user=$user->first();

            if($user->status != 'active'){
                return response()->json([
                    'message' => 'Inactive user',
                    'status' => 'error'
                ]);
            }

            if(!DB::table('otps')->where('email',request('email'))->where('purpose','Forgot Password')->where('date','>=',Carbon::now()->subMinutes(30))->where('status','active')->exists()){
              $otp=rand(100000,999999);
        
     Mail::send('users.test',[
        'otp' => $otp,
        'name' => ucfirst(explode(' ',$user->name)[0])
     ],function($message) use($user){
    $message->to($user->email)->subject('Forgot Password Token');
  });
  DB::transaction(function() use($otp){
        DB::table('otps')->insert([
            'email' => request('email'),
            'otp' => $otp,
            'purpose' => 'Forgot Password',
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
  });
            }

            
      
  
    return response()->json([
        'message' => 'OTP code sent successfully',
        'status' => 'success',
        'email' => request('email')
    ]);
    }catch(\Exception $e){
        return response()->json([
            'message' => 'Could not send OTP code, please try again later',
            'status' => 'info'
        ]);
    }
      
    }
    
    public function VerifyCode(){
        try{
            $code=request('code');
            if(strlen($code) != 6){
                return response()->json([
                    'message' => 'Please enter a valid 6-digit code',
                    'status' => 'error'
                ]);
            }

            $otp=DB::table('otps')->where('otp',$code)->where('email',request('email'));
            if(!$otp->exists()){
                return response()->json([
                    'message' => 'Invalid OTP code',
                    'status' => 'error'
                ]);
            }
                $otp=$otp->first();
            if($otp->status != 'active'){
                return response()->json([
                    'message' => 'Inactive OTP code',
                    'status' => 'error'
                ]);
            }

            return response()->json([
                'message' => 'OTP verified successfully',
                'status' => 'success',
                'email' => request('email'),
                'otp' => $code
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error, please try again'
            ]);
        }
    }

    // reset password
    public function ResetPassword(){
        try{
           
          if(!DB::table('otps')->where('otp',request('otp'))->where('email',request('email'))->where('status','active')->where('date','>',Carbon::now()->subMinutes(30))->exists()){
                    return response()->json([
                        'message' => 'Invalid session',
                        'status' => 'error'
                    ]);
          }
          if(!Hash::check(request('confirm'),Hash::make(request('password')))){
                        return response()->json([
                            'message' => 'New password and confirm password must match',
                            'status' => 'error'
                        ]);
          }
         DB::transaction(function(){
                    DB::table('users')->where('email',request('email'))->update([
                        'password' => Hash::make(request('password')),
                        'updated' =>Carbon::now()
                    ]);
                    DB::table('otps')->where('email',request('email'))->where('otp',request('otp'))->update([
                        'status' => 'used',
                        'updated' => Carbon::now()
                    ]);
         });

         return response()->json([
            'message' => 'Account password updated successfully',
            'status' => 'success'
         ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Internal server error, please try again later',
                'status' => 'error'
            ]);
        }
    }

    // music streaming
    public function MusicStreaming(){
      try{
          $tx=false;
        $track=DB::table('tracklist')->where('id',request('id'))->first();
        if(DB::table('streams')->where('user_id',Auth::guard('users')->user()->id)->where('track_id',$track->id)->exists()){
            return response()->json([
                'message' => 'Track already streamed',
                'status' => 'warning'
            ]);
        }
        $tx=DB::transaction(function() use($track){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$track->reward,[
                'updated' => Carbon::now()
            ]);
            DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Music Streaming Reward',
    'class' => 'credit',
    'type' => 'stream_reward',
    'amount' => $track->reward,
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M215.38,14.54a12,12,0,0,0-10.29-2.18l-128,32A12,12,0,0,0,68,56V159.35A40,40,0,1,0,92,196V113.37l104-26v40A40,40,0,1,0,220,164V24A12,12,0,0,0,215.38,14.54ZM52,212a16,16,0,1,1,16-16A16,16,0,0,1,52,212ZM92,88.63V65.37l104-26V62.63ZM180,180a16,16,0,1,1,16-16A16,16,0,0,1,180,180Z"></path></svg>',
    'fee' => 0,
    'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->main_balance,
        'after' => Auth::guard('users')->user()->main_balance + $track->reward
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'data' => json_encode([
            'Music' => $track->name,
            'Artist' => $track->artist
            
    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
            DB::table('streams')->insert([
                'uniqid' => GenerateID(),
                'user_id' => Auth::guard('users')->user()->id,
                'track_id' => $track->id,
                'track' => json_encode($track),
                'status' => 'success',
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return true;
        });

        if($tx){
            return response()->json([
                'message' => 'Streaming reward claimed successfully',
                'status' => 'success'
            ]);
        }

        // fallback
        return response()->json([
            'message' => 'Internal server error, please try again',
            'status' => 'error'
        ]);
      }catch(\Exception $e){
        return response()->json([
            'message' => $e->getMessage(),
            'status' => 'error'
        ]);
      }
    }

    // coupon checker
    public function CouponChecker(){
      $coupon=request('coupon');
      if(!DB::table('coupons')->where('uniqid',$coupon)->exists()){
        return response()->json([
            'message' => 'Invalid coupon code',
            'status' => 'error'
        ]);
      }
    $coupon=DB::table('coupons')->where('uniqid',$coupon)->first();
    if($coupon->status == 'active'){
        return response()->json([
            'message' => 'Coupon code is valid',
            'status' => 'success',
            'data' => [
                'Status' => 'Active',
                'Country' => ucwords(json_decode($coupon->package)->country->value),
                'Package' => ucwords(json_decode($coupon->package)->name->value),
                'Activation Fee' => json_decode($coupon->package)->activation_fee->currency.number_format(json_decode($coupon->package)->activation_fee->value,2)
            ]
        ]);
    }else{
        return response()->json([
            'message' => 'Coupon code has been used',
            'status' => 'info',
            'data' => [
                'Status' => 'Used',
                'Used By' => ucwords(DB::table('users')->where('coupon->uniqid',$coupon->uniqid)->first()->username),
                'Country' => ucwords(json_decode($coupon->package)->country->value),
                'Package' => ucwords(json_decode($coupon->package)->name->value),
                'Activation Fee' => json_decode($coupon->package)->activation_fee->currency.number_format(json_decode($coupon->package)->activation_fee->value,2)
            ]
        ]);
    }

    }

    // update transaction pin
    public function UpdateTransactionPin(){
       
        if(isset(Auth::guard('users')->user()->transaction_pin)){
            $validator=Validator::make([
                'pin'=> [
                    'current' => request()->input('pin.current')
                ]
            ],[
                'pin.current' => 'required|numeric|digits:6'
             ],
             [
                'pin.current.required' => 'Current Transaction pin cannot be empty',
                'pin.current.numeric' => 'Transaction pin must only contain numbers',
                'pin.current.digits' => 'Current transaction pin must be 6-digits'
             ]);
             
            if($validator->fails()){
                return response()->json([
                    'message' => $validator->errors()->first(),
                    'status' => 'error'
                ]);
            }

            if(!Hash::check(request()->input('pin.current'),Auth::guard('users')->user()->transaction_pin)){
                return response()->json([
                    'message' => 'Invalid current password',
                    'status' => 'error'
                ]);
            }
        }

        $validator=Validator::make([
            'pin' => [
                'new' => request()->input('pin.new'),
                'confirm' => request()->input('pin.confirm')
            ]
        ],[
            'pin.new' => 'required|numeric|digits:6',
            'pin.confirm' => 'required|digits:6|numeric|same:pin.new'
        ],[
            'pin.new.required' => 'New transaction pin cannot be empty',
            'pin.new.digits' => 'New transaction pin must be 6 digits',
            'pin.new.numeric' => 'New transaction pin must consist of only numbers',
            'pin.confirm.required' => 'Confirm transaction pin cannot be empty',
            'pin.confirm.digits' => 'Confirm transaction pin must be 6 digits',
            'pin.confirm.numeric' => 'Confirm transaction pin must consist of only numbers',
            'pin.confirm.same' => 'Confirm transaction pin must be same as New Transaction pin'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'transaction_pin' => Hash::make(request()->input('pin.new'))
        ]);
        return response()->json([
            'message' => 'Transaction pin updated successfully',
            'status' => 'success'
        ]);
    }

    // update profile
    public function UpdateProfile(){
        request()->merge(array_map('trim',request()->all()));
        $validator=Validator::make(request()->all(),[
            'photo' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'phone' => 'required|regex:/^[0-9]{11}$/' 
        ],[
            'photo.image' => 'Invalid photo selected',
            'photo.mimes' => 'Only PNG, JPG and WEBP images are supported for profile picture',
            'photo.max' => 'Max profile picture size allowed is 2MB',
            'first_name.required' => 'First name is required and cannot be empty',
            'first_name.string' => 'First name must only contain strings',
            'first_name.min' => 'Invalid first name',
            'last_name.required' => 'Last name is required and cannot be empty',
            'last_name.string' => 'Last name must only contain strings',
            'last_name.min' => 'Invalid last name',
            'phone.required' => 'Phone number is required and cannot be empty',
            'phone.regex' => 'Invalid phone number'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }

        $photo=Auth::guard('users')->user()->photo;
        if(request()->hasFile('photo')){
            $photo=GenerateID().'.'.request()->file('photo')->getClientOriginalExtension();
            request()->file('photo')->move(public_path('photos/users'),$photo);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'name' => request()->input('first_name').' '.request()->input('last_name'),
            'phone' => request()->input('phone'),
            'photo' => $photo,
            'updated' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Profile updated successfully',
            'status' => 'success'
        ]);
    }

    // google to earn
    public function GoogleToEarn(){
        try{
          
 if(DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','google_to_earn')->whereDate('date',Carbon::today())->exists()){
            return response()->json([
                'message' => 'You can earn from google to earn only once per day, try again tomorrow',
                'status' => 'info'
            ]);
        }
        $reward=collect(json_decode(file_get_contents(database_path('data/packages.json'))))->where('id',Auth::guard('users')->user()->pkg)->first()->earnify_google_to_earn->value;
       

        DB::transaction(function() use($reward){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$reward);
             DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Google to Earn',
    'class' => 'credit',
    'type' => 'google_to_earn',
    'amount' => $reward,
    'fee' => 0,
    'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()),
     'json' => json_encode([
    'balance' => [
        'before' => 0,
        'after' => 500
    ],
    'primary_wallet' => collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()->name

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
        });
        return response()->json([
            'message' => 'Google to Earn reward claimed successfully',
            'status' => 'success'
        ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
       
    }
    // redeem voucher
    public function RedeemVoucher(){
        try{
             request()->merge(array_map('trim',request()->all()));
        $validator=Validator::make(request()->all(),[
            'code' => 'required|regex:/^[A-Z0-9-]+$/|exists:vouchers,uniqid,purpose,games_voucher'
        ],[
            'code.required' => 'Voucher code is required and cannot be empty',
            'code.regex' => 'Invalid voucher code',
            'code.exists' => 'Voucher code does not exists'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        $voucher=DB::table('vouchers')->where('uniqid',request()->input('code'))->first();
        if($voucher->status != 'active'){
            return response()->json([
                'message' => 'Voucher has already been used',
                'status' => 'error'
             ]);
        }

        DB::transaction(function() use($voucher){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('gaming_balance',$voucher->value);
            DB::table('vouchers')->where('id',$voucher->id)->update([
                'status' => 'used',
                'used_by' => Auth::guard('users')->user()->id
            ]);
                    DB::table('transactions')->insert([
            'uniqid' => GenerateID(),
            'user_id' => Auth::guard('users')->user()->id,
            'title' => 'Redeemed voucher',
            'class' => 'credit',
            'type' => 'gaming_voucher',
            'amount' => $voucher->value,
            'fee' => 0,
            'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','gaming_balance')->first()),
            'json' => json_encode([
            'balance' => [
                'before' => 0,
                'after' => 0
            ],
            'primary_wallet' => collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','gaming_balance')->first()->name

            ]),
            'data' => json_encode([
                'Voucher code' => $voucher->uniqid,
                'Code type' => 'Gaming Voucher'
            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
            ]);
            });
            return response()->json([
                'message' => 'Voucher redeemed successfully, '.Auth::guard('users')->user()->currency.number_format($voucher->value,2).' has been added to your gaming balance',
                'status' => 'success'
            ]); 
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
       
    }

}
