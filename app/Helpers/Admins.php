<?php
use Illuminate\Support\Facades\DB;
function NotifyAmount(){
    $amount=DB::table('notifications')->where('status','unread')->count();
    if($amount >= 99){
        $amount='99+';

    }
    if($amount == 0){
        return;
    }
    return '<div id="badge" class="notification-badge flex justify-center">'.$amount.'</div>';
}

