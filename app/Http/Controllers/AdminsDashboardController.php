<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminsDashboardController extends Controller
{
    //  LOGIN FUNCTION
    public function Login(){
        return view('admins.login');
    }
    // DASHBOARD FUNCTION
    public function Dashboard(){
        return view('admins.dashboard',[
            'total_users' => DB::table('users')->count(),
            'total_promoters' => DB::table('users')->where('type','promoter')->count(),
            'pending_deposits' => DB::table('transactions')->where('type','deposit')->where('status','pending')->sum('amount'),
            'pending_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('status','pending')->sum('amount'),
            'successfull_deposits' => DB::table('transactions')->where('type','deposit')->where('status','success')->sum('amount'),
            'successfull_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('status','success')->sum('amount'),
            'rejected_deposits' => DB::table('transactions')->where('type','deposit')->where('status','rejected')->sum('amount'),
            'rejected_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('status','rejected')->sum('amount')

        ]);
    }
    // ADD PRODUCTS FUNCTION 
    public function AddProduct(){
        return view('admins.products.add');
    }
      // EDIT PRODUCTS FUNCTION 
    public function EditProduct(){
        
        return view('admins.products.edit',[
            'product' => DB::table('products')->where('id',request()->input('id'))->first()
        ]);
    }
    // MANAGE PRODUCTS FUNCTION
    public function ManageProducts(){
     
        $products=DB::table('products')->orderBy('updated','desc')->paginate(10);
        $products->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->updated)->diffForHumans();
            return $each;
        });
      
        if(request()->has('paginate')){
            return view('components.admins.paginate',[
            'products' => $products,
            'manage_products' => true
        ]);
        }
        return view('admins.products.manage',[
            'products' => $products
        ]);
    }
    // SITE SETTINGS
    public function SiteSettings(){
        return view('admins.settings',[
            'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json),
             'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->json),
             'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json),
             'deposit_settings' => json_decode(DB::table('settings')->where('key','deposit_settings')->first()->json)
        ]);
    }
    // transactions
    public function Transactions(){
        $trx=DB::table('transactions')->whereNot('status','initiated')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json ?? '{}');
            if($each->type == 'commisson'){
                $each->json->user =DB::table('users')->where('id',$each->json->user_id)->first();
            }
            return $each;
        });
        if(request()->has('paginate')){
             return view('components.admins.paginate',[
                   'trx' => $trx,
                   'transactions' => true
        ]);
        }
        return view('admins.transactions',[
            'total' => DB::table('transactions')->whereNot('status','initiated')->count(),
            'today' => DB::table('transactions')->whereNot('status','initiated')->whereDate('date',Carbon::today())->count(),
            'sum' => DB::table('transactions')->whereNot('status','initiated')->sum('amount'),
            'trx' => $trx
        ]);
    }

    // deposits
    public function Deposits($status){
        $trx=DB::table('transactions')->whereNot('status','initiated')->where('status',$status)->where('type','deposit')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json ?? '{}');
            if($each->type == 'commisson'){
                $each->json->user =DB::table('users')->where('id',$each->json->user_id)->first();
            }
            return $each;
        });
        if(request()->has('paginate')){
             return view('components.admins.paginate',[
                   'trx' => $trx,
                   'transactions' => true
        ]);
        }
        return view('admins.deposits',[
            'total' => DB::table('transactions')->whereNot('status','initiated')->where('status',$status)->where('type','deposit')->count(),
            'today' => DB::table('transactions')->whereNot('status','initiated')->where('status',$status)->where('type','deposit')->whereDate('date',Carbon::today())->count(),
            'sum' => DB::table('transactions')->whereNot('status','initiated')->where('status',$status)->where('type','deposit')->sum('amount'),
            'trx' => $trx,
            'status' => $status == 'success' ? 'Successfull' : ucfirst($status)
        ]);
    }
     // deposits
    public function Withdrawals($status){
        $trx=DB::table('transactions')->whereNot('status','initiated')->where('status',$status)->where('type','withdrawal')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json ?? '{}');
            if($each->type == 'commisson'){
                $each->json->user =DB::table('users')->where('id',$each->json->user_id)->first();
            }
            return $each;
        });
        if(request()->has('paginate')){
             return view('components.admins.paginate',[
                   'trx' => $trx,
                   'transactions' => true
        ]);
        }
        return view('admins.withdrawals',[
            'total' => DB::table('transactions')->whereNot('status','initiated')->where('status',$status)->where('type','withdrawal')->count(),
            'today' => DB::table('transactions')->whereNot('status','initiated')->where('status',$status)->where('type','withdrawal')->whereDate('date',Carbon::today())->count(),
            'sum' => DB::table('transactions')->whereNot('status','initiated')->where('status',$status)->where('type','withdrawal')->sum('amount'),
            'trx' => $trx,
            'status' => $status == 'success' ? 'Successfull' : ucfirst($status)
        ]);
    }

    // users
    public function Users($status){
      if($status == 'all'){
          $users=DB::table('users')->orderBy('date','desc')->paginate(10);
      }else{
          $users=DB::table('users')->where('status',$status)->orderBy('date','desc')->paginate(10);
      }
        $users->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->last_deposit=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','deposit')->where('user_id',$each->id)->orderBy('date','desc')->first()->amount ?? 0;
           $each->last_withdrawal=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','withdrawal')->where('user_id',$each->id)->orderBy('date','desc')->first()->amount ?? 0;
             $each->total_deposit=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','deposit')->where('user_id',$each->id)->sum('amount') ?? 0;
          $each->total_withdrawn=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','withdrawal')->where('user_id',$each->id)->sum('amount') ?? 0;
            $each->total_referrals=DB::table('users')->where('ref',$each->username)->count();
             return $each;
        });
        if(request()->has('paginate')){
           return view('components.admins.paginate',[
            
            'users' => $users
        ]);  
        }
        return view('admins.users',[
            'total' => $status == 'all' ? DB::table('users')->count() : DB::table('users')->where('status',$status)->count(),
            'active' => DB::table('users')->where('status','active')->count(),
            'today' => DB::table('users')->whereDate('date',Carbon::today())->count(),
            'users' => $users,
            'status' => $status
        ]);

    }
      // promoters
    public function Promoters(){
    
          $users=DB::table('users')->where('type','promoter')->orderBy('date','desc')->paginate(10);
     
        $users->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->last_deposit=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','deposit')->where('user_id',$each->id)->orderBy('date','desc')->first()->amount ?? 0;
           $each->last_withdrawal=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','withdrawal')->where('user_id',$each->id)->orderBy('date','desc')->first()->amount ?? 0;
             $each->total_deposit=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','deposit')->where('user_id',$each->id)->sum('amount') ?? 0;
          $each->total_withdrawn=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','withdrawal')->where('user_id',$each->id)->sum('amount') ?? 0;
            $each->total_referrals=DB::table('users')->where('ref',$each->username)->count();
             return $each;
        });
        if(request()->has('paginate')){
           return view('components.admins.paginate',[
            
            'users' => $users
        ]);  
        }
        return view('admins.promoters',[
            'total' => DB::table('users')->where('type','promoter')->count(),
            'active' => DB::table('users')->where('type','promoter')->where('status','active')->count(),
            'today' => DB::table('users')->where('type','promoter')->whereDate('date',Carbon::today())->count(),
            'users' => $users,
            
        ]);

    }
     // user
    public function User(){
    
          $user=DB::table('users')->where('id',request()->input('id'))->orWhere('username',request()->input('id'))->orderBy('date','desc')->first();
    
            $user->frame=Carbon::parse($user->date)->diffForHumans();
            $user->last_deposit=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','deposit')->where('user_id',$user->id)->orderBy('date','desc')->first()->amount ?? 0;
           $user->last_withdrawal=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','withdrawal')->where('user_id',$user->id)->orderBy('date','desc')->first()->amount ?? 0;
             $user->total_deposit=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','deposit')->where('user_id',$user->id)->sum('amount') ?? 0;
          $user->total_withdrawn=DB::table('transactions')->whereNot('status','initiated')->whereNot('status','rejected')->where('type','withdrawal')->where('user_id',$user->id)->sum('amount') ?? 0;
            $user->total_referrals=DB::table('users')->where('ref',$user->username)->count();
          $username=$user->username;
            $user->total_second_level_referrals=DB::table('users')->whereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->where('ref',$username);
            })->count();
            $user->total_active_products=DB::table('purchased')->where('user_id',$user->id)->where('status','active')->count();
            $user->total_daily_income=DB::table('purchased')->where('status','active')->where('user_id',$user->id)->sum('json->daily_income');
            $user->total_referral_commission=DB::table('transactions')->where('type','commission')->where('user_id',$user->id)->sum('amount');
      
        return view('admins.user',[
                'data' => $user,
            
        ]);

    }
    // system logs
    public function SiteLogs(){
        $logs=DB::table('logs')->orderBy('date','desc')->paginate(1);
        $logs->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        if(request()->has('paginate')){
            
            return view('components.admins.paginate',[
            'logs' => $logs,
            'system_logs' => true
        ]);
        }
        return view('admins.logs',[
            'logs' => $logs
        ]);
    }
    // notifications
    public function Notifications(){
        $notifications=DB::table('notifications')->orderBy('date','desc')->paginate(10);
        $notifications->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        if(request()->has('paginate')){
             return view('components.admins.paginate',[
            'notifications' => $notifications
        ]);
        }
        return view('admins.notifications',[
            'notifications' => $notifications,
            'unread' => DB::table('notifications')->where('status','unread')->count()
        ]);
    }
    // logout
    public function Logout(){
        Auth::guard('admins')->logout();
        return redirect('admins/login');
    }
    // purchased
    public function Purchased(){
        $purchased=DB::table('purchased')->orderBy('date','desc')->paginate(10);
        $purchased->getCollection()->transform(function($each){
            $each->json=json_decode($each->json);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->next_income=Carbon::parse($each->updated)->addDay()->format('d M Y, H:i:s');
            $each->expires=Carbon::parse($each->date)->addDays($each->json->cycle)->format('d M Y, H:i:s');
           $each->user=DB::table('users')->where('id',$each->user_id)->first();
            return $each;
        });
        if(request()->has('paginate')){
             return view('components.admins.paginate',[
            'purchased' => $purchased,
             ]);
        }

        return view('admins.products.purchased',[
            'purchased' => $purchased,
            'total_active' => DB::table('purchased')->where('status','active')->count(),
            'total_expired' => DB::table('purchased')->where('status','expired')->count(),
            'total_daily_income' => DB::table('purchased')->where('status','active')->sum('json->daily_income')
        ]);

    }

}
