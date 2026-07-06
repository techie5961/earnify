<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Number;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    // register
    public function Register(){
     
        $countries=collect(json_decode(file_get_contents(database_path('data/countries.json'))));
       
        $packages=[];
        foreach(collect(json_decode(file_get_contents(database_path('data/packages.json')))) as $data){
            $packages[]=[
                'id' => $data->id,
                'name' => $data->name->value,
                'country' => $data->country->value
            ];
        }


        return view('users.auth.register',[
            'ref' => request('ref',''),
            'countries' => $countries,
            'packages' => $packages
        ]);
    }
    // login 
    public function Login(){
        return view('users.auth.login');
    }
    // dashboard
    public function Dashboard(){
      $referrals=DB::table('users')->where('ref',Auth::guard('users')->user()->username)->count();
      $referral_earnings=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','referral_commission')->where('status','success')->sum('amount');
      $agent_gold=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','referral_commission')->where('json->level','2')->where('status','success')->sum('amount');
      $agent_silver=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','referral_commission')->where('json->level','3')->where('status','success')->sum('amount');
      $trx=DB::table('transactions')->whereNot('status','initiated')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->limit(5)->get();  
      $trx->transform(function($each){
        $each->frame=Carbon::parse($each->date)->format('M d, Y H:i');
        $each->meridian=Carbon::parse($each->date)->format('H') >= 12 ? ' PM' : ' AM';
        return $each;
      });
      return view('users.dashboard',[
           'referrals' => $referrals,
           'referral_earnings' => $referral_earnings,
           'agent_gold' => $agent_gold,
           'agent_silver' => $agent_silver,
           'trx' => $trx
        ]);
    }

    // social settings
    public function SocialSettings(){
        return view('users.settings.social',[
            'socials' => json_decode(Auth::guard('users')->user()->socials ?? '{}')
        ]);
    }

    // payout settings
    public function PayoutSettings(){
        
        return view('users.settings.payout',[
            'bank' => json_decode(Auth::guard('users')->user()->bank ?? '{}'),
            'nigeria_banks' => collect(json_decode(file_get_contents(database_path('data/nigeriabanks.json'))))->sortBy('name')->all()
        ]);
    }

    // profile settings
    public function ProfileSettings(){
        return view('users.settings.profile',[
            'package' => Auth::guard('users')->user()->package,
            'joined' => Carbon::parse(Auth::guard('users')->user()->date)->diffForHumans()
        ]);
    }

    // security settings
    public function SecuritySettings(){
        return view('users.settings.security');
    }

    // logout
    public function Logout(){
        Auth::guard('users')->logout();
        return redirect('users/login');
    }
    // post ads
    public function PostAds(){
    $categories=DB::table('task_categories')->orderBy('name','asc')->get();
        return view('users.ads.post',[
            'categories' => $categories
        ]);
    }
    // recharge
    public function Recharge(){
        return view('users.recharge',[
              'bank' => json_decode(DB::table('settings')->where('key','bank_settings')->first()->value ?? '{}')
        ]);

    }

    // transactions
    public function Transactions(){
         $trx=DB::table('transactions')->whereNot('status','initiated')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->paginate(10);  
      $trx->getCollection()->transform(function($each){
        $each->frame=Carbon::parse($each->date)->format('M d, Y H:i');
        $each->meridian=Carbon::parse($each->date)->format('H') >= 12 ? ' PM' : ' AM';
        return $each;
      });
        return view('users.transactions',[
            'trx' => $trx
        ]);
    }

    // transaction receipt
    public function TransactionReceipt(){
        $trx=DB::table('transactions')->where('id',request('id'))->first();
        $trx->frame=Carbon::parse($trx->date)->format('M d, Y H:i');
        $trx->meridian=Carbon::parse($trx->date)->format('H') >= 12 ? ' AM' : ' PM';
        return view('users.receipt',[
            'data' => $trx,
            'session_id' => Str::uuid()
        ]);
    }

    // daily tasks
    public function DailyTasks(){
        $tasks=DB::table('tasks')->whereColumn('proofs','<','limit')->whereNotIn('id',function($q){
            $q->select('task->id')->from('task_proofs')->where('user_id',Auth::guard('users')->user()->id);
        })->orderBy('date','asc')->paginate(10);
        return view('users.tasks',[
            'tasks' => $tasks
        ]);
    }

    // task
    public function Task(){
       
        $task=DB::table('tasks')->where('id',request('id'))->first();
        return view('users.task',[
            'task' => $task
        ]);
    }
    
    // withdraw
    public function Withdraw(){
        return view('users.withdraw',[
           'withdrawal_settings' => json_decode(DB::table('settings')->where('key','withdrawal_settings')->first()->value ?? '{}')
        ]);
    }
    
    // upgrade account
    public function UpgradeAccount(){
        return view('users.upgrade',[
            'settings' => json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}'),
            'general' => json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}')
        ]);
    }

    // gift code
public function GiftCode(){
    return view('users.giftcode');
}

// index
public function Index(){
    return view('users.home');
}

// terms of service
public function TermsOfService(){
    return view('users.terms');
}

// privacy policy
public function PrivacyPolicy(){
    return view('users.privacy');
}

// referrals
public function Referrals(){
    $referrals=DB::table('users')->where('ref',Auth::guard('users')->user()->username)->orderBy('date','desc')->paginate(10);
    $referrals->getCollection()->transform(function($each){
      $each->time=Carbon::parse($each->date)->format('M d, Y h:i').(Carbon::parse($each->date)->format('H') > 12 ? ' PM' : ' AM');
        return $each;
    });
    return view('users.referrals',[
        'referrals' => $referrals,
        'total' => DB::table('users')->where('ref',Auth::guard('users')->user()->username)->count(),
        'commission' => DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','referral_commission')->sum('amount')
    ]);
}

// daily spin
public function DailySpin(){
    //   return Auth::guard('users')->user()->last_spin;
    return view('users.dailyspin',[
        'last_spin' => Carbon::parse(Auth::guard('users')->user()->last_spin)
    ]);
}

// marketplace
public function Marketplace(){
    $products=DB::table('products')->where('status','active')->orderBy('date','desc')->paginate(50);

    return view('users.marketplace.index',[
        'products' => $products
    ]);
}

// purchase product
public function PurchaseProduct(){
    $product=DB::table('products')->where('id',request('id'))->where('status','active');
    if(!$product->exists()){
        return redirect('users/marketplace');
    }
    $product=$product->first();
    return view('users.marketplace.purchase',[
        'data' => $product
    ]);
}
// shopping history
public function ShoppingHistory(){
   
    $purchased=DB::table('purchased_products')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->paginate(10);
    $purchased->getCollection()->transform(function($each){
                $each->frame=Carbon::parse($each->date)->diffForHumans();
                $each->product=json_decode($each->product);
                $each->status=json_decode($each->status);
                return $each;
    });
    return view('users.marketplace.purchased',[
        'purchased' => $purchased
    ]);
}

// airtime vtu
public function AirtimeVTU(){
     return view('users.vtu.airtime');
}
// data vtu
public function DataVTU(){
 
    $response=Http::withToken(env('CLUBKONNECT_API_KEY'))->get('https://www.nellobytesystems.com/APIDatabundlePlansV2.asp',[
        'UserID' => env('CLUBKONNECT_USER_ID')
    ]);
    if($response->successful()){
        $data=$response->json();
    }else{
        return abort(403,'Internal Server Error');
    }
//    return $data;
    return view('users.vtu.data',[
        'plans' => $data
    ]);
}

// forgot password
public function  ForgotPassword(){
  
    return view('users.auth.forgot');
}


public function TestMail(){
    try{
        $otp=rand(100000,999999);
        // return $otp;
        // sleep(15);
     Mail::send('users.test',[
        'otp' => $otp,
        'name' => 'Techie'
     ],function($message){
    $message->to('techie5961@gmail.com')->subject('Forgot Password');
  });
  
    return response('Email sent successfully');
    }catch(\Exception $e){
        return response($e->getMessage());
    }
 
  
}
// api token
public function APIToken(){
    try{
      
  $upgrade_settings=json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}');
    return view('users.apitoken',[
        'settings' => $upgrade_settings,
         'bank' => json_decode(DB::table('settings')->where('key','bank_settings')->first()->value ?? '{}')
     
    ]);
    }catch(\Exception $e){
        return $e;
    }
  
}

// music streaming
public function MusicStreaming(){
    $tracks=DB::table('tracklist')->whereNotIn('id',function($q){
        $q->select('track_id')->from('streams')->where('user_id',Auth::guard('users')->user()->id);
    })->orderBy('date','desc')->paginate(100);
    return view('users.streaming',[
        'tracks' => $tracks
    ]);
}


// top earners
public function TopEarners(){
    $top_earners=DB::table('transactions')->select('user_id','type',DB::raw('SUM(amount) as total_earnings'))->where('type','referral_commission')->where('status','success')->having('total_earnings','>',0)->groupBy('user_id','type')->limit(100)->orderBy('total_earnings','desc')->get();
    $top_earners->transform(function($each){
        $each->user=DB::table('users')->where('id',$each->user_id)->first();
        $each->total_earnings=abbreviate_number($each->total_earnings);
        return $each;
    });
    return view('users.topearners',[
        'top_earners' => $top_earners
    ]);
}

// vendors
public function Vendors(){
    $vendors=DB::table('users')->where('type','vendor')->orderBy('date','asc')->limit(100)->get();

    return view('users.vendors',[
        'vendors' => $vendors
    ]);
}
   
// coupon checker
public function CouponChecker(){
    return view('users.couponchecker');
}

// transaction pin
public function TransactionPin(){
    return view('users.settings.transactionpin');
}

// vendors dashboard
public function VendorsDashboard(){
    if(Auth::guard('users')->user()->type != 'vendor'){
        return redirect('users/dashboard');
    }
    $coupons=DB::table('coupons')->where('vendor',Auth::guard('users')->user()->id);
    if(request()->has('status')){
        $coupons=$coupons->where('status',request()->input('status'));
    }
    $coupons=$coupons->orderBy('date','desc')->paginate(10);
    $coupons->getCollection()->transform(function($each){
            $each->assigned=Carbon::parse($each->date)->diffForHumans();
            $each->user=DB::table('users')->where('coupon->id',$each->id)->first()->username ?? null;
            $each->user_ref=DB::table('users')->where('coupon->id',$each->id)->first()->ref ?? null;
            $each->used_on=isset(DB::table('users')->where('coupon->id',$each->id)->first()->date) ? Carbon::parse(DB::table('users')->where('coupon->id',$each->id)->first()->date)->diffForHumans() : null;
            return $each;
    });
    return view('users.vendorsdashboard',[
        'coupons' => $coupons,
        'total' => DB::table('coupons')->where('vendor',Auth::guard('users')->user()->id)->count(),
        'active' => DB::table('coupons')->where('vendor',Auth::guard('users')->user()->id)->where('status','active')->count(),
    ]);
}
// google to earn
public function GoogleToEarn(){
    return view('users.googletoearn',[
        'reward' => collect(json_decode(file_get_contents(database_path('data/packages.json'))))->where('id',Auth::guard('users')->user()->pkg)->first()->earnify_google_to_earn->value ?? 0,
        'isRewarded' => DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','google_to_earn')->whereDate('date',Carbon::today())->count()
    ]);
}


// games
public function Games(){
    return view('users.games.index',[
    ]);
}

// cube game
public function CubeGame(){
    return view('users.games.cube');
}

}
