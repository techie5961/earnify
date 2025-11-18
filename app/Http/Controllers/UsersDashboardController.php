<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UsersDashboardController extends Controller
{
    // login
    public function Login(){
        return view('users.auth.login');
    }
    // register
    public function Register(){
        return view('users.auth.register',[
            'ref' => ''
        ]);
    }
    //  affiliate register
    public function AffiliateRegister($username){
       if(DB::table('users')->where('username',$username)->where('status','active')->exists()){
        $ref=$username;
       }else{
        $ref='';
       }
        return view('users.auth.register',[
            'ref' => $ref
        ]);
    }
    // dashboard
    public function Dashboard(){
        $products=DB::table('products')->orderBy('price','asc')->get();

        return view('users.dashboard',[
            'products' => $products,
             'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json),
             'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json),
             'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->json)
        ]);
    }
    // recharge
    public function Recharge(){
    
        return view('users.recharge',[
            'auto' => DB::table('products')->orderBy('price','asc')->get(),
             'deposit_settings' => json_decode(DB::table('settings')->where('key','deposit_settings')->first()->json)
     
        ]);
    }
     // recharge checkout
    public function DepositCheckout(){
    if(!request()->has('amount')){
        return redirect('users/recharge');
    }
    if(request('amount') < DB::table('products')->orderBy('price','asc')->get()[0]->price){
        return redirect('users/recharge');
    }


        return view('users.deposit',[
            'amount' => request('amount'),
            'auto' => DB::table('products')->orderBy('price','asc')->get(),
             'deposit_settings' => json_decode(DB::table('settings')->where('key','deposit_settings')->first()->json)
     
        ]);
    }
     // withdraw
    public function Withdraw(){
        if(empty((array) json_decode(Auth::guard('users')->user()->bank ?? '{}'))){
            return redirect('users/bank');
        }
        return view('users.withdraw',[
            'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json),
            'bank' => json_decode(Auth::guard('users')->user()->bank ?? '{}')
        ]);
    }
    // wallet
    public function Wallet(){
        $trx=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->whereNot('status','initiated')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        if(request()->has('paginate')){
             return view('components.users.paginate',[
            'trx' => $trx,
            'wallet' => true
        ]);
        }
        return view('users.wallet',[
            'trx' => $trx
        ]);
    }
    // profile
    public function Profile(){
      
        return view('users.profile',[
            'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json)
     
        ]);

    }
    // add bank
    public function AddBank(){
        return view('users.bank',[
            'bank' => json_decode(Auth::guard('users')->user()->bank ?? '{}')
        ]);
    }
    // invite
    public function Invite(){
        return view('users.refer',[
             'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->json)
        ]);
    }
    // products
    public function Products(){
        $purchased=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->paginate(10);
        $purchased->getCollection()->transform(function($each){
            $each->json=json_decode($each->json);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->next_income=Carbon::parse($each->updated)->addDay()->format('d M Y, H:i:s');
            $each->expires=Carbon::parse($each->date)->addDays($each->json->cycle)->format('d M Y, H:i:s');
            return $each;
        });
        if(request()->has('paginate')){
             return view('components.users.paginate',[
            'purchased' => $purchased,
            'products' => true
                 
        ]); 
        }
        return view('users.products',[
            'purchased' => $purchased,
            'total_products' => DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->count(),
             'total_daily_income' => DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->sum('json->daily_income')
            
        ]);
    }
    // my team 
    public function Team(){
       
        $username=Auth::guard('users')->user()->username;
        $ref=DB::table('users')->where('ref',Auth::guard('users')->user()->username)->orWhereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->where('ref',$username);
            })->orWhereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->whereIn('ref',function($sq) use($username){
                    $sq->select('username')->from('users')->where('ref',$username);
                });
            })->orderBy('date','desc')->paginate(10);
            $ref->getCollection()->transform(function($each){
                $each->frame=Carbon::parse($each->date)->diffForHumans();
                $each->total_purchase=DB::table('purchased')->where('user_id',$each->id)->sum('json->price');
                 $each->total_commission=DB::table('transactions')->where('type','commission')->where('user_id',Auth::guard('users')->user()->id)->where('json->user_id',$each->id)->sum('amount');
                $each->referral_level=$each->ref == Auth::guard('users')->user()->username ? 'Direct Referral' : 'Indirect Referral';
                 return $each;
            });
            if(request()->has('paginate')){
                return view('components.users.paginate',[
            
             'ref' => $ref,
             'team' => true
        ]);
            }
        return view('users.team',[
            'team_size' => DB::table('users')->where('ref',Auth::guard('users')->user()->username)->orWhereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->where('ref',$username);
            })->orWhereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->whereIn('ref',function($sq) use($username){
                    $sq->select('username')->from('users')->where('ref',$username);
                });
            })->count(),
            'total_commission' => DB::table('transactions')->where('type','commission')->where('user_id',Auth::guard('users')->user()->id)->sum('amount'),
            'ref' => $ref
        ]);
    }
    // logout
    public function Logout(){
        Auth::guard('users')->logout();
        return redirect('login');
    }
    
}
