<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsSearchRequestController extends Controller
{
    // search users
    public function Users(){
      if(request('status') == 'all'){
         $users=DB::table('users')->where('username','like','%'.request()->input('q').'%')->orWhere('email','like','%'.request()->input('q').'%')->limit(5)->get();

      }else{
        $query=request()->input('q');
         $users=DB::table('users')->where('status',request('status'))->where(function($q) use($query){
           $q->where('username','like','%'.$query.'%')->orWhere('email','like','%'.$query.'%');
         })->limit(5)->get();

      }

       return view('components.admins.api',[
        'search_users' => true,
        'users' => $users
       ]);
        
       
    }

      // search promoters
    public function Promoters(){
      $username=request('q');
         $users=DB::table('users')->where('type','promoter')->where(function($q) use($username){
          $q->where('username','like','%'.request()->input('q').'%')->orWhere('email','like','%'.request()->input('q').'%');
         })->limit(5)->get();



       return view('components.admins.api',[
        'search_users' => true,
        'users' => $users
       ]);
        
    }
    
}
