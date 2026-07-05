<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use stdClass;
use Illuminate\Support\Facades\Validator;

class AdminsPostRequestController extends Controller
{
    // login
    public function Login(){
         
        if(!DB::table('admins')->where('tag',request('id'))->exists()){
            return response()->json([
                'message' => 'Admin not found',
                'status' => 'error'
            ]);
        }
       $admin= DB::table('admins')->where('tag',request('id'))->first();
       if(!Hash::check(request('password'),$admin->password)){
        return response()->json([
            'message' => 'Incorrect password',
            'status' => 'error'
        ]);
       }
       Auth::guard('admins')->loginUsingId($admin->id,true);
       return response()->json([
        'message' => 'Login successfull,redirecting....',
        'status' => 'success'
       ]);
    }

    // credit user
    public function CreditUser(){
        $user=DB::table('users')->where('id',request('user_id'))->first();
        DB::table('users')->where('id',request('user_id'))->update([
            request('wallet') => DB::raw(''.request('wallet').'  + '.request('amount').''),
            'updated' => Carbon::now()
        ]);
        
        if(request()->has('title')){
             DB::table('transactions')->insert([
    'uniqid' => strtoupper(Str::random(10)),
    'user_id' => request('user_id'),
    'title' => ucwords(strtolower(request('title'))),
    'class' => 'credit',
    'type' => 'credit_alert',
    'amount' => request('amount'),
    'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key',request('wallet'))->first()),
     'json' => json_encode([
    'balance' => [
        'before' => $user->{request('wallet')},
        'after' => $user->{request('wallet')} + request('amount')
    ],
    'primary_wallet' => collect(Wallets())->where('key',request('wallet'))->first()->name

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
   
        }

         return response()->json([
        'message' => 'User Creditted Successfully',
        'status' => 'success'
    ]);
    }

    // debit user
    public function DebitUser(){
        $user=DB::table('users')->where('id',request('user_id'))->first();
        DB::table('users')->where('id',request('user_id'))->update([
            request('wallet') => DB::raw(''.request('wallet').'  - '.request('amount').''),
            'updated' => Carbon::now()
        ]);
        
        if(request()->has('title')){
             DB::table('transactions')->insert([
    'uniqid' => strtoupper(Str::random(10)),
    'user_id' => request('user_id'),
    'title' => ucwords(strtolower(request('title'))),
    'class' => 'debit',
    'type' => 'debit_alert',
    'amount' => request('amount'),
    'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key',request('wallet'))->first()),
     'json' => json_encode([
    'balance' => [
        'before' => $user->{request('wallet')},
        'after' => $user->{request('wallet')} - request('amount')
    ],
    'primary_wallet' => collect(Wallets())->where('key',request('wallet'))->first()->name

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
   
        }

         return response()->json([
        'message' => 'User Debitted Successfully',
        'status' => 'success'
    ]);
    }
    // general settings
    public function GeneralSettings(){
        $message='General settings updated success';
        $key='general_settings';
        $value=[
        'email_verification' => request('email_verification'),
        'maintenance_mode' => request('maintenance_mode'),
        'welcome_bonus' => request('welcome_bonus'),
        'referral_commission' => request('referral_commission'),
        'task' => [
            'penalty' => request('task_penalty')
        ]
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }
     // withdrawal portal
    public function WithdrawalPortal(){
        $message='Withdrawal settings updated success';
        $key='withdrawal_settings';
        $value=new stdClass();
        foreach(request('wallet') as $title=>$data){
            $value->{$title}=[
                'portal' => $data['portal'],
                'minimum' => $data['minimum']
            ];
        }
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }
     // social settings
    public function SocialSettings(){
        $message='Social settings updated success';
        $key='social_settings';
        $value=[
        'whatsapp_community' => request('whatsapp_community') ?? '',
        'telegram_community' => request('telegram_community') ?? '',
        'site_notification' => request('site_notification') ?? '',
        'advert' => [
            'telegram' => request('telegram_advert_link') ?? null,
            'whatsapp' => request('whatsapp_advert_link') ?? null
        ]
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }

    // bank settings
    public function BankSettings(){
        $message='Bank settings updated success';
        $key='bank_settings';
        $value=[
        'account_number' => request('account_number') ?? '',
        'bank_name' => request('bank_name') ?? '',
        'account_name' => request('account_name') ?? ''
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }
     // upgrade settings
    public function UpgradeSettings(){
        $message='Upgrade settings updated success';
        $key='upgrade_settings';
        $value=[
        'upgrade' => [
           
            'fee' => request('upgrade_fee'),
            'cashback' => request('cashback'),
            'portal' => request('upgrade_portal')
        ]
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }

    // add task category
    public function AddTaskCategory(){
        DB::table('task_categories')->insert([
            'uniqid' => GenerateID(),
            'name' => request('name'),
            'cost' => request('cost'),
            'earning' => request('earning'),
            'platform' => request('platform'),
            'members' => request('members'),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => carbon::now()
        ]);
        return response()->json([
            'message' => 'Category added successfully',
            'status' => 'success'
        ]);
    }

    // edit task category
    public function EditTaskCategory(){
         DB::table('task_categories')->where('id',request('id'))->update([
            'name' => request('name'),
            'cost' => request('cost'),
            'earning' => request('earning'),
            'platform' => request('platform'),
            'members' => request('members'),
            'status' => 'active',
            'updated' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Category edited successfully',
            'status' => 'success'
        ]);
    }

    // post task
    public function PostTask(){
        try{
              request()->merge(array_map('trim',request()->all()));
    $validator=Validator::make(request()->all(),[
        'title' => 'required|string|max:255',
        'link' => 'required|url|max:255',
        'reward' => 'required|numeric',
        'members' => 'required|integer',
        'banner' => 'image|mimes:jpg,png,webp|max:2048',
        'caption' => 'string'
    ],[
        'title.required' => 'Task title is required and cannot be empty',
        'title.string' => 'Task title must only contain strings',
        'title.max' => 'Task title should not exceed 255 characters',
        'link.required' => 'Task link is required and cannot be empty',
        'link.url' => 'Task link must be a valid url',
        'link.max' => 'Task link should not exceed 255 characters',
        'reward.required' => 'Task reward is required and cannot be empty',
        'reward.numeric' => 'Task reward must only contain numbers',
        'members.required' => 'Task members is required and cannot be empty',
        'members.integer' => 'Task members must be an integer',
        'banner.image' => 'Task banner must be an image file',
        'banner.mimes' => 'Only JPG,PNG and WEBP images are accepted for banner',
        'banner.max' => 'Task banner must be max 2MB',
        'caption.string' => 'Task caption must be a valid string/note'
    ]);

    if($validator->fails()){
        return response()->json([
            'message' => $validator->errors()->first(),
            'status' => 'error'
        ]);
    }
    
    if(request()->hasFile('banner')){
        $name=time().'.'.request()->file('banner')->getClientOriginalExtension();
        request()->file('banner')->move(public_path('tasks/banners'),$name);
    }
    DB::table('tasks')->insert([
        'uniqid' => GenerateID(),
        'user_id' => 0,
        'title' => request()->input('title'),
        'reward' => request()->input('reward'),
        'limit' => request()->input('members'),
        'proofs' => 0,
        'link' => request()->input('link'),
        'caption' => request()->input('caption') ?? null,
        'banner' => $name ?? null,
        'status' => 'active',
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
        return response()->json([
            'link' => url('admins/tasks/manage'),
            'message' => 'Task posted successfully',
            'status' => 'success'
        ]);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Internal server error, please try again later',
                'status' => 'error'
            ]);
        }
  
    }

    // delete task
    public function DeleteTask(){
        
        DB::table('tasks')->where('id',request('id'))->delete();
         return response()->json([
                'message' => 'Task deleted successfully',
                'status' => 'success'
            ]);
    }

    // edit task
    public function EditTask(){
              request()->merge(array_map('trim',request()->all()));
    $validator=Validator::make(request()->all(),[
        'title' => 'required|string|max:255',
        'link' => 'required|url|max:255',
        'reward' => 'required|numeric',
        'members' => 'required|integer',
        'banner' => 'image|mimes:jpg,png,webp|max:2048',
        'caption' => 'string'
    ],[
        'title.required' => 'Task title is required and cannot be empty',
        'title.string' => 'Task title must only contain strings',
        'title.max' => 'Task title should not exceed 255 characters',
        'link.required' => 'Task link is required and cannot be empty',
        'link.url' => 'Task link must be a valid url',
        'link.max' => 'Task link should not exceed 255 characters',
        'reward.required' => 'Task reward is required and cannot be empty',
        'reward.numeric' => 'Task reward must only contain numbers',
        'members.required' => 'Task members is required and cannot be empty',
        'members.integer' => 'Task members must be an integer',
        'banner.image' => 'Task banner must be an image file',
        'banner.mimes' => 'Only JPG,PNG and WEBP images are accepted for banner',
        'banner.max' => 'Task banner must be max 2MB',
        'caption.string' => 'Task caption must be a valid string/note'
    ]);

    if($validator->fails()){
        return response()->json([
            'message' => $validator->errors()->first(),
            'status' => 'error'
        ]);
    }
    

    if(request()->hasFile('banner')){
        $name=time().'.'.request()->file('banner')->getClientOriginalExtension();
        request()->file('banner')->move(public_path('tasks/banners'),$name);
    }
    DB::table('tasks')->where('id',request('id'))->update([
        'title' => request()->input('title'),
        'reward' => request()->input('reward'),
        'limit' => request()->input('members'),
        'proofs' => 0,
        'link' => request()->input('link'),
        'caption' => request()->input('caption') ?? null,
        'banner' => $name ?? null,
        
    ]);
        return response()->json([
            'link' => url('admins/tasks/manage'),
            'message' => 'Task Editted successfully',
            'status' => 'success'
        ]);
    }
    // approve task
    public function ApproveTask(){
        $task=DB::table('task_proofs')->where('id',request('id'))->first();
        $reward=json_decode($task->task)->reward;
        $user=DB::table('users')->where('id',$task->user_id)->first();
        if($task->status == 'pending'){
          DB::transaction(function() use($user,$reward,$task){
              DB::table('users')->where('id',$user->id)->increment('main_balance',$reward);
                 DB::table('transactions')->insert([
                 'uniqid' => GenerateID(),
                'user_id' => $user->id,
                'title' => 'Task Reward',
                'class' => 'credit',
                'type' => 'task_reward',
                'amount' => $reward,
                'fee' => 0,
              'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()),
                'data' => json_encode([
                    'Task Performed' => json_decode($task->task)->title
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => $user->main_balance,
                'after' => $user->main_balance + $reward 
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    DB::table('task_proofs')->where('id',request('id'))->update([
        'status' => 'approved',
        'updated' => Carbon::now()
    ]);
   
          });
        }
         return response()->json([
        'message' => 'Task approved successfully',
        'status' => 'success'
    ]);
    }
    // reject task
    public function RejectTask(){
       
         DB::table('task_proofs')->where('id',request('id'))->update([
        'status' => 'rejected',
        'updated' => Carbon::now()
    ]);
   
         return response()->json([
        'message' => 'Task rejected successfully',
        'status' => 'success'
    ]);
    }
    // penalise task
    public function PenaliseTask(){
        try{
         $task=DB::table('task_proofs')->where('id',request('id'))->first();
        $user=DB::table('users')->where('id',$task->user_id)->first();
        DB::table('users')->where('id',$task->user_id)->update([
            'main_balance' => DB::raw('main_balance - '.request('amount').''),
            'updated' => Carbon::now()
        ]);

        DB::table('transactions')->insert([
                'uniqid' => GenerateID(),
                'user_id' => $user->id,
                'title' => 'Task Penalty',
                'class' => 'debit',
                'type' => 'task_penalty',
                'amount' => request('amount'),
                'fee' => 0,
               'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()),
                'data' => json_encode([
                    'Task Penalised' => ucwords(json_decode($task->task)->title)
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => $user->main_balance,
                'after' => $user->main_balance - request('amount')
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    DB::table('task_proofs')->where('id',request('id'))->update([
        'status' => 'penalised',
        'updated' => Carbon::now()
    ]);
    return response()->json([
        'message' => 'Task penalised succesfully',
        'status' => 'success'
    ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
       

    }

    // approve all pending task
    public function ApproveAllPendingTask(){
        DB::table('task_proofs')->orderBy('date','desc')->where('status','pending')->chunk(50,function($all){
            foreach($all as $each){
                $id=$each->id;
                DB::transaction(function() use($id){
                      $task=DB::table('task_proofs')->where('id',$id)->first();
        $reward=json_decode($task->task)->reward;
        $user=DB::table('users')->where('id',$task->user_id)->first();
            // DB::transaction(function() use(){

            // });
            DB::table('users')->where('id',$user->id)->increment('main_balance',$reward);
                 DB::table('transactions')->insert([
                         'uniqid' => GenerateID(),
                'user_id' => $user->id,
                'title' => 'Task Reward',
                'class' => 'credit',
                'type' => 'task_reward',
                'amount' => $reward,
                'fee' => 0,
               'wallet' => json_encode(collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()),
                'data' => json_encode([
                    'Task Performed' => json_decode($task->task)->title
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => $user->main_balance,
                'after' => $user->main_balance + $reward 
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    DB::table('task_proofs')->where('id',$id)->update([
        'status' => 'approved',
        'updated' => Carbon::now()
    ]);
   
        
                });
         }
        });
        return response()->json([
            'message' => 'All pending tasks approved successfully',
            'status' => 'success'
        ]);
    }

    // reject all pending task
    public function RejectAllPendingTask(){
    DB::table('task_proofs')->orderBy('date','desc')->where('status','pending')->chunk(50,function($all){
            foreach($all as $each){
                $id=$each->id;
                DB::transaction(function() use($id){
                     DB::table('task_proofs')->where('id',$id)->update([
        'status' => 'rejected',
        'updated' => Carbon::now()
    ]);
                });
         }
        });
        return response()->json([
            'message' => 'All pending tasks rejected successfully',
            'status' => 'success'
        ]);
    }

    // create gift code
    public function CreateGiftCode(){
        $value=request('value');
        $limit=request('limit');
        DB::table('gift_codes')->insert([
            'uniqid' => GenerateID(),
            'code' => 'GCD'.GenerateID(),
            'value' => $value,
            'limit' => $limit,
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Gift code created successfully',
            'status' => 'success'
        ]);
    }
     // edit gift code
    public function EditGiftCode(){
        $value=request('value');
        $limit=request('limit');
        DB::table('gift_codes')->where('id',request('id'))->update([
            'value' => $value,
            'limit' => $limit,
            'updated' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Gift code editted successfully',
            'status' => 'success'
        ]);
    }

    // add product
    public function AddProduct(){
        $name=request('name');
        $category=request('category');
        $price=request('price');
        $location=request('location');
        $address=request('address') ?? null;
        $photo=strtolower(GenerateID()).'.'.request()->file('photo')->getClientOriginalExtension();
        request()->file('photo')->move(public_path('photos/marketplace'),$photo);
        DB::table('products')->insert([
            'uniqid' => GenerateID(),
            'name' => $name,
            'photo' => $photo,
            'category' => $category,
            'price' => $price,
            'location' => $location,
            'address' => $address,
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Product added successfully',
            'status' => 'success'
        ]);
    }

    // add product
    public function EditProduct(){
        $product=DB::table('products')->where('id',request('id'))->first();
        $name=request('name');
        $category=request('category');
        $price=request('price');
        $location=request('location');
        $address=request('address') ?? null;
        $photo=$product->photo;
        if(request()->hasFile('photo')){
     $photo=strtolower(GenerateID()).'.'.request()->file('photo')->getClientOriginalExtension();
        request()->file('photo')->move(public_path('photos/marketplace'),$photo);
        }
       
        DB::table('products')->where('id',request('id'))->update([
            'name' => $name,
            'photo' => $photo,
            'category' => $category,
            'price' => $price,
            'location' => $location,
            'address' => $address,
            'updated' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Product editted successfully',
            'status' => 'success'
        ]);
    }

    // confirm delivery
    public function ConfirmDelivery(){
           DB::table('purchased_products')->where('id',request('id'))->update([
            'status->seller' => 'delivered'
        ]);
        return response()->json([
            'message' => 'Item marked as delivered successfully',
            'status' => 'success'
        ]);
    }

    // upload track
    public function EditTrack(){
        $tx=false;
        $track=DB::table('tracklist')->where('id',request('id'))->first();
        $banner=$track->banner;
        $audio=$track->audio;
        if(request()->hasFile('banner')){
       $banner=strtolower(GenerateID()).'.'.request()->file('banner')->getClientOriginalExtension();
    $size=request()->file('banner')->getSize()/1024;
    $size=$size/1024;
    if($size > 5){
        return response()->json([
            'message' => 'Max upload size for banner is 5MB',
            'status' => 'warning'
        ]);
    }
     request()->file('banner')->move(public_path('tracks/banners'),$banner);
        }
     if(request()->hasFile('audio')){
     $audio=GenerateID().'.'.request()->file('audio')->getClientOriginalExtension();
    
   
    request()->file('audio')->move(public_path('tracks/audios'),$audio);
     }
   
    $tx=DB::transaction(function() use($banner,$audio){
            DB::table('tracklist')->where('id',request('id'))->update([
                'banner' => $banner,
                'audio' => $audio,
                'name' => request('name'),
                'artist' => request('artist'),
                'reward' => request('reward'),
                'updated' => Carbon::now()
            ]);
            return true;
    });
    
        if($tx){
      return response()->json([
            'message' => 'Track Editted successfully',
            'status' => 'success'
        ]);
        }
      
    }

    // upload track
    public function UploadTrack(){
        $tx=false;
        $banner=strtolower(GenerateID()).'.'.request()->file('banner')->getClientOriginalExtension();
    $size=request()->file('banner')->getSize()/1024;
    $size=$size/1024;
    $audio=GenerateID().'.'.request()->file('audio')->getClientOriginalExtension();
    if($size > 5){
        return response()->json([
            'message' => 'Max upload size for banner is 5MB',
            'status' => 'warning'
        ]);
    }
    request()->file('banner')->move(public_path('tracks/banners'),$banner);
    request()->file('audio')->move(public_path('tracks/audios'),$audio);
    $tx=DB::transaction(function() use($banner,$audio){
            DB::table('tracklist')->insert([
                'uniqid' => GenerateID(),
                'banner' => $banner,
                'audio' => $audio,
                'name' => request('name'),
                'artist' => request('artist'),
                'reward' => request('reward'),
                'status' => 'active',
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return true;
    });
    
        if($tx){
      return response()->json([
            'message' => 'Track uploaded successfully',
            'status' => 'success'
        ]);
        }
      
    }

    // create coupon code
    public function CreateCouponCode(){
    try{
            $vendor=request('vendor');
        $vendor=$vendor == 'non_vendor' ? null : $vendor;
        $package=request('package');
        $package=collect(json_decode(file_get_contents(database_path('data/packages.json'))))->where('id',$package)->first();
        $amount=request('amount');
        
       for($i=0;$i < $amount;$i++){
        DB::table('coupons')->insert([
            'uniqid' => GenerateID(),
            'package' => json_encode($package),
            'vendor' => $vendor,
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
       $message='Coupon code generated successfully';
       if($amount > 1){
    $message='Coupon codes generated successfully';
       }

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

        // create voucher
        public function CreateVoucher(){
            request()->merge(array_map('trim',request()->all()));
            $validator=Validator::make(request()->all(),[
                'purpose' => 'required|string|max:255',
                'value' => 'required|numeric|min:1'
            ],[
                'purpose.required' => 'Voucher title is required and cannot be empty',
                'purpose.string' => 'Voucher title must only contain strings',
                'purpose.max' => 'Voucher must have a maximum of 255 characters',
                'value.required' => 'Voucher value is required and cannot be empty',
                'value.numeric' => 'Voucher value must be a valid number',
                'value.min' => 'Voucher value must be greater than 0'
            ]);
            if($validator->fails()){
                return response()->json([
                    'message' => $validator->errors()->first(),
                    'status' => 'error'
                ]);
            }

            $uniqid=strtoupper(Str::uuid());
            DB::table('vouchers')->insert([
                'uniqid' => $uniqid,
                'purpose' => request('purpose'),
                'value' => request('value'),
                'status' => 'active',
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Voucher created successfully',
                'status' => 'success'
            ]);


        }

        // edit voucher
        public function EditVoucher(){
             request()->merge(array_map('trim',request()->all()));
            $validator=Validator::make(request()->all(),[
                'id' => 'required|integer|min:1|exists:vouchers,id',
                'purpose' => 'required|string|max:255',
                'value' => 'required|numeric|min:1'
            ],[
                'id.required' => 'Voucher ID is required and cannot be empty',
                'id.integer' => 'Vouche ID must be an integer',
                'id.min' => 'Invalid Voucher ID',
                'id.exists' => 'Invalid Voucher ID',
                'purpose.required' => 'Voucher title is required and cannot be empty',
                'purpose.string' => 'Voucher title must only contain strings',
                'purpose.max' => 'Voucher must have a maximum of 255 characters',
                'value.required' => 'Voucher value is required and cannot be empty',
                'value.numeric' => 'Voucher value must be a valid number',
                'value.min' => 'Voucher value must be greater than 0'
            ]);
            if($validator->fails()){
                return response()->json([
                    'message' => $validator->errors()->first(),
                    'status' => 'error'
                ]);
            }

            $uniqid=strtoupper(Str::uuid());
            DB::table('vouchers')->where('id',request()->input('id'))->update([
                'purpose' => request('purpose'),
                'value' => request('value'),
                'updated' => Carbon::now(),
            ]);
            return response()->json([
                'message' => 'Voucher edited successfully',
                'status' => 'success'
            ]);
        }
}
