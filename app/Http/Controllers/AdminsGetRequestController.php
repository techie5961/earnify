<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdminsGetRequestController extends Controller
{
    // DELETE PRODUCT FUNCTION
    public function DeleteProduct(){
        DB::table('products')->where('id',request()->input('id'))->delete();
        return response()->json([
            'message' => 'Product Deleted successfully',
            'status' => 'success'
        ]);
    }
    // alter trx
    public function AlterTrx(){
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
    

        return view('components.admins.api',[
            'trx' => $trx,
            'alter_trx' => true,
            'action' => request()->input('action')
        ]);
    }
    // alter confirm
    public function AlterTrxConfirm(){
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
        $trx->json=json_decode($trx->json);
        $user=DB::table('users')->where('id',$trx->user_id)->first();
        $user->recipient=json_decode($user->recipient_details);
       
        if(request('action') == 'approve'){
            if($trx->type == 'deposit'){
                DB::table('users')->where('id',$trx->user_id)->update([
                    'deposit' => DB::raw('deposit + '.$trx->amount.''),
                    'updated' => Carbon::now()
                ]);
                DB::table('transactions')->where('id',$trx->id)->update([
                    'status' => 'success',
                    'updated' => Carbon::now()
                ]);
                return response()->json([
                    'message' => 'Deposit request approved successfully',
                    'status' => 'success'
                ]);

            }else{
              
               
             
             
             
                  DB::table('transactions')->where('id',$trx->id)->update([
                    'status' => 'success',
                    'updated' => Carbon::now()
                ]);
                return response()->json([
                    'message' => 'Withdrawal request approved successfully',
                    'status' => 'success'
                ]);
              
            
              
            }
        }else{
            if($trx->type == 'deposit'){
                
                DB::table('transactions')->where('id',$trx->id)->update([
                    'status' => 'rejected',
                    'updated' => Carbon::now()
                ]);
                return response()->json([
                    'message' => 'Deposit request rejected successfully',
                    'status' => 'success'
                ]);
            }else{
                 DB::table('users')->where('id',$trx->user_id)->update([
                    'withdrawal' => DB::raw('withdrawal + '.$trx->amount.''),
                    'updated' => Carbon::now()
                ]);
                DB::table('transactions')->where('id',$trx->id)->update([
                    'status' => 'rejected',
                    'updated' => Carbon::now()
                ]);
                return response()->json([
                    'message' => 'Withdrawal request rejected successfully',
                    'status' => 'success'
                ]);
            }
        }

    }
    // mark as promoter
    public function MarkAsPromoter(){
      if(request()->input('type') == 'promoter'){
          DB::table('users')->where('id',request()->input('id'))->update([
            'type' => 'user',
            'updated' => Carbon::now()
        ]);
      }else{
          DB::table('users')->where('id',request()->input('id'))->update([
            'type' => 'promoter',
            'updated' => Carbon::now()
        ]);
      }
      return redirect('admins/user?id='.request()->input('id').'');

    }
    // ban user
    public function BanUser(){
        if(request()->input('status') == 'active'){
            DB::table('users')->where('id',request()->input('id'))->update([
                'status' => 'banned',
                'updated' => Carbon::now()
            ]);
        }else{
             DB::table('users')->where('id',request()->input('id'))->update([
                'status' => 'active',
                'updated' => Carbon::now()
            ]);
        }
        return redirect('admins/user?id='.request()->input('id').'');
    }
    // login as user
    public function LoginAsUser(){
       Auth::guard('users')->loginUsingId(request()->input('id'));
       return redirect()->to('users/dashboard');
    }
    //  Mark As read
    public function MarkAsRead(){
        DB::table('notifications')->where('id',request()->input('id'))->update([
            'status' => 'read'
        ]);
        return redirect('admins/notifications');
    }
    //  Mark All As read
    public function MarkAllAsRead(){
        DB::table('notifications')->update([
            'status' => 'read'
        ]);
        return redirect('admins/notifications');
    }
    // suspend product
    public function SuspendProduct(){
      if(request('status') == 'active'){
        DB::table('purchased')->where('id',request()->input('id'))->update([
            'status' => 'suspended'
        ]);
        return redirect('admins/products/purchased');
      }else{
         DB::table('purchased')->where('id',request()->input('id'))->update([
            'status' => 'active'
        ]);
        return redirect('admins/products/purchased');
      }
    }

}
