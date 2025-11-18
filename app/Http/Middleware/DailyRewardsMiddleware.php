<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DailyRewardsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $purchased=DB::table('purchased')->where('status','active')->whereDate('updated','<=',Carbon::now()->subDay())->limit(500)->get();
      // $x='';
        foreach($purchased as $data){
            $days=Carbon::parse($data->date)->diffIndays();
          
            $diff=Carbon::parse($data->updated)->diffInDays();
            $json=json_decode($data->json);
              if($days >= $json->cycle){
                DB::table('purchased')->where('id',$data->id)->update([
                    'status' => 'expired',
                    
                ]);
                continue;
              }
            if($diff >= 1){
                DB::table('users')->where('id',$data->user_id)->update([
                    'withdrawal' => DB::raw('withdrawal + '.$json->daily_income.''),
                    'updated' => Carbon::now()
                ]);
                  DB::table('transactions')->insert([
            'amount' => $json->daily_income,
            'class' => 'credit',
            'type' => 'income',
            'json' => json_encode($data),
            'user_id' => $data->user_id,
            'description' => ''.$json->name.' Daily Income',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        DB::table('purchased')->where('id',$data->id)->update([
            'updated' => Carbon::now()
        ]);
            }
         // $x=$x.$diff.'<br>';
        }
       // return response($x);
        return $next($request);
    }
}
