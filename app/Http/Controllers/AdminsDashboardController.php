<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminsDashboardController extends Controller
{
    // login
    public function Login(){
        return view('admins.auth.login');
    }
    // dashboard
    public function DashBoard(){
        return view('admins.dashboard',[
            'total_packages' => collect(json_decode(file_get_contents(database_path('data/packages.json'))))->count(),
            'total_users' => DB::table('users')->count(),
            'today_users' => DB::table('users')->whereDate('date',Carbon::now())->count(),
            'pending_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('class','debit')->where('status','pending')->sum('amount'),
            'successfull_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('class','debit')->where('status','success')->sum('amount'),
            'rejected_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('class','debit')->where('status','rejected')->sum('amount'),
            'pending_deposits' => DB::table('transactions')->where('type','deposit')->where('class','credit')->where('status','pending')->sum('amount'),
            'successfull_deposits' => DB::table('transactions')->where('type','deposit')->where('class','credit')->where('status','success')->sum('amount'),
            'rejected_deposits' => DB::table('transactions')->where('type','deposit')->where('class','credit')->where('status','rejected')->sum('amount'),


        ]);
    }
    // transactions
    public function Transactions(){
        // variables
        $transactions=DB::table('transactions');
         $total=DB::table('transactions');
       $today=DB::table('transactions')->whereDate('date',Carbon::today());
       $sum=DB::table('transactions');

// pending

        if(request()->has('type')){
            $transactions=$transactions->where('type',request('type'));
            $total=$total->where('type',request('type'));
            $today=$today->where('type',request('type'));
            $sum=$sum->where('type',request('type'));
        }
        if(request()->has('status')){
            $transactions=$transactions->where('status',request('status'));
            $total=$total->where('status',request('status'));
            $today=$today->where('status',request('status'));
            $sum=$sum->where('status',request('status'));
        }
        if(request()->has('user_id')){
            $transactions=$transactions->where('user_id',request('user_id'));
            $total=$total->where('user_id',request('user_id'));
            $today=$today->where('user_id',request('user_id'));
            $sum=$sum->where('user_id',request('user_id'));
        }
        if(request()->has('gift_code_id')){
              $transactions=$transactions->where('json->gift_code_id',request('gift_code_id'));
            $total=$total->where('json->gift_code_id',request('gift_code_id'));
            $today=$today->where('json->gift_code_id',request('gift_code_id'));
            $sum=$sum->where('json->gift_code_id',request('gift_code_id'));
        }
       $transactions=$transactions->orderBy('date','desc')->paginate(10);
       $transactions->getCollection()->transform(function($each){
    $each->user=DB::table('users')->where('id',$each->user_id)->first();
    $each->frame=Carbon::parse($each->date)->diffForHumans();
    $each->date_format=Carbon::parse($each->date)->format('d M, Y H:i');
    $each->meridian=Carbon::parse($each->date)->format('H') >= 12 ? 'PM' : 'AM';

    return $each;
       });
      
       
        return view('admins.transactions',[
            'total' => $total->count(),
            'today' => $today->count(),
            'sum' => $sum->sum('amount'),
            'trx' => $transactions,
            'type' => request('type'),
            'status' => request('status') == 'success' ? 'successful' : request('status')
        ]);
    }
    // transaction receipt
    public function TransactionReceipt(){
        $trx=DB::table('transactions')->where('id',request('id'))->first();
        $trx->day=Carbon::parse($trx->date)->format('d M Y');
        $trx->time=Carbon::parse($trx->date)->format('H:i');
        $trx->user=DB::table('users')->where('id',$trx->user_id)->first();
        $trx->user->frame=Carbon::parse($trx->user->date)->diffForHumans();
        return view('admins.receipt',[
            'data' => $trx
        ]);
    }

    // all users
    public function AllUsers(){
      
        $users=DB::table('users');
          $total_users=DB::table('users');
            $active_users=DB::table('users')->where('status','active');
            $todays_signups=DB::table('users')->whereBetween('date',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()]);
        
        if(request()->has('status')){
            $users=$users->where('status',request('status'));
            $total_users=$total_users->where('status',request('status'));
            $active_users=$active_users->where('status',request('status'));
            $todays_signups=$todays_signups->where('status',request('status'))->whereBetween('date',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()]);
            }
        if(request()->has('type')){
            $users=$users->where('type',request('type'));
            $total_users=$total_users->where('type',request('type'));
            $active_users=$active_users->where('type',request('type'));
            $todays_signups=$todays_signups->where('type',request('type'))->whereBetween('date',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()]);
        
        }
        if(request()->has('date')){
            $users=$users->whereDate('date',Carbon::today());
            $total_users=$total_users->whereDate('date',Carbon::today());
            $active_users=$active_users->whereDate('date',Carbon::today());
            $todays_signups=$todays_signups->whereDate('date',Carbon::today())->whereBetween('date',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()]);
        
        }
         if(request()->has('new')){
            $users=$users->where('date',Carbon::today());
              $total_users=$total_users->where('date',Carbon::today());
            $active_users=$active_users->where('date',Carbon::today());
            $todays_signups=$todays_signups->where('date',Carbon::today())->whereBetween('date',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()]);
        
        }
        if(request()->has('coupon')){
            $users=$users->where('coupon->uniqid',request('coupon'));
             $total_users=$total_users->where('coupon->uniqid',request('coupon'));
            $active_users=$active_users->where('coupon->uniqid',request('coupon'));
            $todays_signups=$todays_signups->where('coupon->uniqid',request('coupon'))->whereBetween('date',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()]);
        
        }
         if(request()->has('package')){
            $users=$users->where('pkg',request('package'));
             $total_users=$total_users->where('pkg',request('package'));
            $active_users=$active_users->where('pkg',request('package'));
            $todays_signups=$todays_signups=$todays_signups->where('pkg',request('package'))->whereBetween('date',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()]);
            }
        $users=$users->orderBy('date','desc')->paginate(10);
        $users->getCollection()->transform(function($each){
    $each->date_format=Carbon::parse($each->date)->format('d M Y');
    $each->frame=Carbon::parse($each->date)->diffForHumans();
    $each->ref_id=DB::table('users')->where('username',$each->ref ?? '0')->first()->id ?? '';
    $each->downlines=DB::table('users')->where('ref',$each->username)->count();
    return $each;
        });

       
        return view('admins.users',[
            'users' => $users,
            'status' => request()->has('status') ? request('status') : 'All',
            'total_users' => $total_users->count(),
            'active_users' => $active_users->count() ?? 0,
            'today_signups' => $todays_signups->count(),
        ]);
    }
    // user 
    public function User(){
        $user=DB::table('users')->where('id',request('id'))->first();
    $user->frame=Carbon::parse($user->date)->diffForHumans();
     $user->ref_id=DB::table('users')->where('username',$user->ref ?? '0')->first()->id ?? '';
     $user->total_referred=DB::table('users')->where('ref',$user->username)->count();
      $user->downlines=DB::table('users')->where('ref',$user->username)->count();
      $user->date_format=Carbon::parse($user->date)->format('d M, Y h:i');
    $user->meridian=Carbon::parse($user->date)->format('H') >= 12 ? 'PM' : 'AM';
    $user->total_withdrawals=DB::table('transactions')->where('user_id',$user->id)->where('type','withdrawal')->where('status','success')->sum('amount');
        return view('admins.user',[
           'data' => $user
        ]);

    }
    // site settings
    public function SiteSettings(){
        return view('admins.settings.index',[
            'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}'),
           'social_settings' => json_decode(DB::table('settings')->where('key','social_settings')->first()->value ?? '{}'),

        ]);
    }
    // notifications
    public function Notifications(){
      
    $notifications=DB::table('notifications');
    $notifications=$notifications->orderBy('date','desc')->paginate(10);
    $notifications->getCollection()->transform(function($each){
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
    });
        return view('admins.notifications',[
        'total' => DB::table('notifications')->count(),
        'read' => DB::table('notifications')->where('status->admins','read')->count(),
        'unread' => DB::table('notifications')->where('status->admins','unread')->count(),
        'notifications' => $notifications
        ]);
    }

    // logout
    public function Logout(){
       Auth::guard('admins')->logout();
       return redirect('admins/login');
    }
    
    // bank settings
    public function BankSettings(){
        return view('admins.settings.bank',[
            'bank' => json_decode(DB::table('settings')->where('key','bank_settings')->first()->value ?? '{}')
        ]);
    }

    // add task category
    public function AddTaskCategory(){
        return view('admins.tasks.categories.add');
    }

    // manage tasks categories
    public function ManageTasksCategories(){
        $categories=DB::table('task_categories');
        $categories=$categories->orderBy('date','desc')->paginate(10);
        $categories->getCollection()->transform(function($each){
                        $each->frame=Carbon::parse($each->date)->diffForHumans();
                        return $each;
        });
        return view('admins.tasks.categories.manage',[
            'total' => DB::table('task_categories')->count(),
            'categories' => $categories
        ]);
    }

    // edit task category
    public function EditTaskCategory(){
        return view('admins.tasks.categories.edit',[
            'data' => DB::table('task_categories')->where('id',request('id'))->first()
        ]);
    }

    // post task
    public function PostTask(){
        return view('admins.tasks.post');
    }

    // manage tasks
    public function ManageTasks(){
        $tasks=DB::table('tasks');

        $tasks=$tasks->orderBy('updated','desc')->paginate(10);
        $tasks->getCollection()->transform(function($each){
                    $each->status=$each->proofs >= $each->limit ? 'completed' : 'active';
                    $each->user=DB::table('users')->where('id',$each->user_id)->first();
                    $each->frame=Carbon::parse($each->date)->diffForHumans();
                    return $each;
        });
        return view('admins.tasks.manage',[
            'tasks' => $tasks,
            'total' => DB::table('tasks')->count(),
            'total_active' => DB::table('tasks')->whereColumn('proofs','<','limit')->count(),
            'total_completed' => DB::table('tasks')->whereColumn('proofs','>=','limit')->count()
        ]);
    }

    // edit task
    public function EditTask(){
        $task=DB::table('tasks')->where('id',request('id'))->first();
        return view('admins.tasks.edit',[
            'data' => $task
        ]);
    }

    // submitted task proofs
    public function SubmittedTaskProofs(){
        $proofs=DB::table('task_proofs');
        if(request()->has('status')){
            $proofs=$proofs->where('status',request('status'));
        }
        $proofs=$proofs->orderBy('date','desc')->paginate(10);

        $proofs->getCollection()->transform(function($each){
                $each->user=DB::table('users')->where('id',$each->user_id)->first();
                $each->frame=Carbon::parse($each->date)->diffForHumans();
                $each->proofs=json_decode($each->proofs);
                $each->task=json_decode($each->task);
                return $each;
        });
    //    return $proofs[0]->task->type;
        return view('admins.tasks.proofs',[
            'proofs' => $proofs,
            'status' => request('status','all'),
            'total' => DB::table('task_proofs')->count(),
            'total_pending' => DB::table('task_proofs')->where('status','pending')->count(),
            'total_approved' => DB::table('task_proofs')->where('status','approved')->count(),
            'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}')
        ]);
    }

    // upgrade settings
    public function UpgradeSettings(){
        return view('admins.settings.upgrade',[
             'settings' => json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}')
        ]);
    }

    // create gift code
    public function CreateGiftCode(){
        return view('admins.giftcode.create');
    }

    // manage gift codes
    public function ManageGiftCodes(){
        $codes=DB::table('gift_codes');
        $codes=$codes->orderBy('updated','desc')->paginate(10);

        $codes->getCollection()->transform(function($each){
                $each->frame=Carbon::parse($each->updated)->diffForHumans();
                $each->status=$each->redeemed >= $each->limit ? 'completed' : 'active';
                return $each;
        });
        return view('admins.giftcode.manage',[
            'total' => DB::table('gift_codes')->count(),
            'total_active' => DB::table('gift_codes')->where('limit','>','redeemed')->count(),
            'total_used' => DB::table('gift_codes')->where('limit','<=','redeemed')->count(),
            'codes' => $codes
        ]);
    }

    // edit gift code
    public function EditGiftCode(){
        return view('admins.giftcode.edit',[
            'data' => DB::table('gift_codes')->where('id',request('id'))->first()
        ]);
    }

    // delete gift code
    public function DeleteGiftCode(){
        DB::table('gift_codes')->where('id',request('id'))->delete();
        return redirect(url()->previous());
    }

    // add marketplace product
    public function AddMarketplaceProduct(){
       
        return view('admins.marketplace.add');
    }
    // manage products
    public function ManageProducts(){
        $products=DB::table('products');

        $products=$products->orderBy('updated','desc')->paginate(10);
        $products->getCollection()->transform(function($each){
                $each->frame=Carbon::parse($each->updated)->diffForHumans();
                return $each;
        });
        return view('admins.marketplace.manage',[
            'products' => $products,
            'total' => DB::table('products')->count(),
            'sold' => DB::table('products')->where('status','sold')->count(),
            'active' => DB::table('products')->where('status','active')->count(),
        ]);
    }

    // edit marketplace product
    public function EditMarketplaceProduct(){
        return view('admins.marketplace.edit',[
            'data' => DB::table('products')->where('id',request('id'))->first()
        ]);
    
    }

    // shopping history
    public function ShoppingHistory(){
         $history=DB::table('purchased_products');
            if(request()->has('seller_status')){
                $history=$history->where('status->seller',str_replace('_',' ',request('seller_status')));
            }
             if(request()->has('buyer_status')){
                $history=$history->where('status->buyer',str_replace('_',' ',request('buyer_status')));
            }
         $history=$history->orderBy('date','desc')->paginate(10);
    $history->getCollection()->transform(function($each){
                $each->frame=Carbon::parse($each->date)->diffForHumans();
                $each->product=json_decode($each->product);
                $each->status=json_decode($each->status);
                return $each;
    });
        return view('admins.marketplace.history',[
            'history' => $history,
            'total' => DB::table('purchased_products')->count(),
            'pending_delivery' => DB::table('purchased_products')->whereNot('status->seller','delivered')->count(),
            'delivered' => DB::table('purchased_products')->where('status->seller','delivered')->count(),
            
        ]);
    }
// upload song
public function UploadSong(){
    return view('admins.streaming.music.upload');
}
// manage songs
public function ManageSongs(){
    $songs=DB::table('tracklist')->orderBy('date','desc')->paginate(10);
    $songs->getCollection()->transform(function($each){
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
    });
    return view('admins.streaming.music.manage',[
        'total' => DB::table('tracklist')->count(),
        'tracks' => $songs
        
    ]);
}

// delete song
public function DeleteSong(){
    DB::table('tracklist')->where('id',request('id'))->delete();
    return redirect(url()->previous());
}

// edit song
public function EditSong(){
    $song=DB::table('tracklist')->where('id',request('id'))->First();
    return view('admins.streaming.music.edit',[
        'data' => $song
    ]);
}

// packages list
public function PackagesList(){

    $packages=collect(json_decode(file_get_contents(database_path('data/packages.json'))));
    if(request()->has('id')){
        $packages=$packages->where('id',request('id'));
    }
    return view('admins.packages',[
        'total' => collect(json_decode(file_get_contents(database_path('data/packages.json'))))->count(),
        'packages' => $packages->all()
    ]);
}

// create coupon code
public function CreateCouponCode(){
    $vendors=DB::table('users')->where('type','vendor')->get();
    return view('admins.coupons.create',[
        'vendors' => $vendors,
        'packages' => collect(json_decode(file_get_contents(database_path('data/packages.json'))))->all()
    ]);
}

// mark as vendor
public function MarkAsVendor(){
    DB::table('users')->where('id',request('id'))->update([
        'type' => DB::raw('CASE WHEN type="user" THEN "vendor" ELSE "user" END')
    ]);
    return redirect(url()->previous());
}

// manage coupon codes
public function ManageCouponCodes(){
    $data=DB::table('coupons');
    $count=DB::table('coupons')->count();
    $active=DB::table('coupons')->where('status','active')->count();
    if(request()->has('package')){
        $data=$data->where('package->id',request('package'));
          $count=DB::table('coupons')->where('package->id',request('package'))->count();
         $active=DB::table('coupons')->where('package->id',request('package'))->where('status','active')->count();
    }
    $coupons=$data->orderBy('date','desc')->paginate(10);
    $coupons->getCollection()->transform(function($each){
        $each->package=json_decode($each->package);
        $each->vendor=DB::table('users')->where('id',$each->vendor)->first() ?? [];
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
    });
    return view('admins.coupons.manage',[
        'total' => $count,
        'active' => $active,
        'coupons' => $coupons
    ]);
}

// delete coupon code
public function DeleteCoupon(){
    DB::table('coupons')->where('id',request('id'))->delete();
    return redirect(url()->previous());
}

// withdrawal portal
public function WithdrawalPortal(){
    return view('admins.settings.withdrawal',[
        'settings' => json_decode(DB::table('settings')->where('key','withdrawal_settings')->first()->value ?? '{}')
    ]);
}

// create voucher 
public function CreateVoucher(){
    return view('admins.vouchers.create');
}

// manage vouchers
public function ManageVouchers(){
    $vouchers=DB::table('vouchers')->orderBy('date','desc')->paginate(10);
    $vouchers->getCollection()->transform(function($each){
    $each->username=DB::table('users')->where('id',$each->used_by)->first()->username ?? null;
    $each->user_id=DB::table('users')->where('id',$each->used_by)->first()->id ?? null;
    return $each;
    });
    return view('admins.vouchers.manage',[
        'total' => DB::table('vouchers')->count(),
        'active' => DB::table('vouchers')->where('status','active')->count(),
        'vouchers' => $vouchers
    ]);
}

// delete voucher
public function DeleteVoucher(){
    DB::table('vouchers')->where('id',request()->input('id'))->delete();
    return redirect(url()->previous());
}

// edit voucher
public function EditVoucher(){
    $voucher=DB::table('vouchers')->where('id',request()->input('id'))->first();
    return view('admins.vouchers.edit',[
        'voucher' => $voucher
    ]);
}

}
