<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UsersDashboardController;
use App\Http\Controllers\UsersPostRequestController;
use App\Http\Controllers\AdminsDashboardController;
use App\Http\Middleware\AdminCheckAuthMiddleware;
use App\Http\Controllers\AdminsPostRequestController;
use App\Http\Controllers\AdminsGetRequestController;
use App\Http\Controllers\AdminsSearchRequestController;
use App\Http\Controllers\UsersGetRequestController;
use App\Http\Middleware\UsersCheckAuthMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\DailyRewardsMiddleware;
use App\Http\Middleware\UsersAuthMiddleware;
use App\Http\Middleware\AdminsAuthMiddleware;

Route::get('paystack/dva/process',[
   UsersGetRequestController::class,'PaystackDVAProcess'
]);
Route::get('preview',function(){
  return view('preview');
});
Route::get('users/get/total/balance',function(){
   return number_format(Auth::guard('users')->user()->deposit + Auth::guard('users')->user()->withdrawal,2);
});
Route::middleware([
   DailyRewardsMiddleware::class
])->group(function(){
   // hash password
Route::get('hash',[
   AdminsPostRequestController::class,'Hash'
]);
// users
// auth
Route::middleware([ UsersAuthMiddleware::class ])->group(function(){
Route::get('login',[
   UsersDashboardController::class,'Login' 
]);
Route::get('/',[
   UsersDashboardController::class,'Login' 
]);
Route::get('register',[
   UsersDashboardController::class,'Register'
]);
Route::get('register/ref/{username}',[
   UsersDashboardController::class,'AffiliateRegister'
]);
});
Route::post('post/users/register/process',[
   UsersPostRequestController::class,'Register'
]);
Route::post('post/login/process',[
   UsersPostRequestController::class,'Login'
]);
// users prefix
Route::prefix('users')->group(function(){
  Route::middleware([ UsersCheckAuthMiddleware::class ])->group(function(){
    Route::get('dashboard',[
      UsersDashboardController::class,'Dashboard'
   ]);
   Route::get('recharge',[
      UsersDashboardController::class,'Recharge'
   ]);
   Route::get('recharge/checkout',[
      UsersDashboardController::class,'DepositCheckout'
   ]);
   Route::get('withdraw',[
      UsersDashboardController::class,"Withdraw"
   ]);
   Route::get('skeleton',function(){
         return view('users.skeleton');
      });
      Route::get('transactions',function(){
         return Auth::guard('users')->user()->deposit;
      });
      Route::get('wallet',[
         UsersDashboardController::class,'Wallet'
      ]);
      Route::get('profile',[
         UsersDashboardController::class,'Profile'
      ]);
      Route::get('bank',[
         UsersDashboardController::class,'AddBank'
      ]);
      Route::get('invite',[
         UsersDashboardController::class,'Invite'
      ]);
      Route::get('products',[
         UsersDashboardController::class,'Products'
      ]);
       Route::get('team',[
         UsersDashboardController::class,'Team'
      ]);
      Route::get('logout',[
         UsersDashboardController::class,'Logout'
      ]);
      Route::get('check/in',[
         UsersGetRequestController::class,'CheckIn'
      ]);





  });




//   prefix post for users
  Route::prefix('post')->group(function(){
   Route::post('deposit/initiate',[
      UsersPostRequestController::class,'InitiateDeposit'
   ]);
   Route::post('password/update/process',[
      UsersPostRequestController::class,'PasswordUpdate'
   ]);
   Route::post('add/bank/process',[
      UsersPostRequestController::class,'AddBank'
   ]);
   Route::post('withdraw',[
      UsersPostRequestController::class,'Withdraw'
   ]);
   Route::post('create/virtual/account/process',[
      UsersPostRequestController::class,'CreateVirtualAccount'
   ]);
   Route::post('deposit/submit/process',[
      UsersPostRequestController::class,'DepositSubmit'
   ]);
  });


   // prefix get for users
   Route::prefix('get')->group(function(){
      Route::get('purchase/product',[
      UsersGetRequestController::class,'PurchaseProduct'
      ]);
      Route::get('purchase/product/confirm',[
         UsersGetRequestController::class,'PurchaseProductConfirm'
      ]);
      Route::get('deposit/complete',[
         UsersGetRequestController::class,'DepositComplete'
      ]);
      Route::get('banks',[
         UsersGetRequestController::class,'GetBanks'
      ]);
      Route::get('bank/auto/verify',[
         UsersGetRequestController::class,'AutoVerify'
      ]);
      

   });
});



// admins
Route::middleware([AdminsAuthMiddleware::class ])->group(function(){
   Route::get('admins/login',[
   AdminsDashboardController::class,'Login'
]);
Route::get('admins',[
   AdminsDashboardController::class,'Login'
]);
});
Route::post('post/admins/login/process',[
   AdminsPostRequestController::class,'Login'
]);
// prefix admins
Route::middleware([ AdminCheckAuthMiddleware::class ])->group(function(){
   
   Route::prefix('admins')->group(function(){
   Route::get('dashboard',[
      AdminsDashboardController::class,"Dashboard"
   ]);
   Route::get('products/add',[
      AdminsDashboardController::class,'AddProduct'
   ]);
     Route::get('products/manage',[
      AdminsDashboardController::class,'ManageProducts'
   ]);
    Route::get('product/edit',[
      AdminsDashboardController::class,'EditProduct'
   ]);
   Route::get('site/settings',[
      AdminsDashboardController::class,'SiteSettings'
   ]);
   Route::get('transactions',[
      AdminsDashboardController::class,'Transactions'
   ]);
   Route::get('deposits/{status}',[
      AdminsDashboardController::class,'Deposits'
   ]);
   Route::get('withdrawals/{status}',[
      AdminsDashboardController::class,'Withdrawals'
   ]);
   Route::get('users/{status}',[
      AdminsDashboardController::class,'Users'
   ]);
   Route::get('user',[
      AdminsDashboardController::class,'User'
   ]);
   Route::get('users/mark/as/promoter',[
      AdminsGetRequestController::class,'MarkAsPromoter'
   ]);
   Route::get('get/ban/user',[
      AdminsGetRequestController::class,'BanUser'
   ]);
   Route::get('login/as/user',[
      AdminsGetRequestController::class,'LoginAsUser'
   ]);
   Route::get('logs',[
      AdminsDashboardController::class,'SiteLogs'
   ]);
   Route::get('notifications',[
      AdminsDashboardController::class,'Notifications'
   ]);
   Route::get('logout',[
      AdminsDashboardController::class,'Logout'
   ]);
    Route::get('products/purchased',[
      AdminsDashboardController::class,'Purchased'
   ]);
   Route::get('promoters',[
      AdminsDashboardController::class,'Promoters'
   ]);




   // prefix post
Route::prefix('post')->group(function(){
   Route::post('add/products/process',[
      AdminsPostRequestController::class,'AddProduct'
   ]);
    Route::post('edit/products/process',[
      AdminsPostRequestController::class,'EditProduct'
   ]);
   Route::post('finance/settings/process',[
      AdminsPostRequestController::class,'FinanceSettings'
   ]);
    Route::post('referral/settings/process',[
      AdminsPostRequestController::class,'ReferralSettings'
   ]);
   Route::post('general/settings/process',[
      AdminsPostRequestController::class,'GeneralSettings'
   ]);
   Route::post('deposit/settings/process',[
      AdminsPostRequestController::class,'DepositSettings'
   ]);
   Route::post('credit/user/process',[
      AdminsPostRequestController::class,'CreditUser'
   ]);
    Route::post('debit/user/process',[
      AdminsPostRequestController::class,'DebitUser'
   ]);
});

// prefix get
Route::prefix('get')->group(function(){
   Route::get('delete/product/confirm',[
      AdminsGetRequestController::class,'DeleteProduct'
   ]);
   Route::get('transaction/alter',[
      AdminsGetRequestController::class,'AlterTrx'
   ]);
   Route::get('transaction/alter/confirm',[
      AdminsGetRequestController::class,'AlterTrxConfirm'
   ]);
   Route::get('mark/as/read',[
      AdminsGetRequestController::class,'MarkAsRead'
   ]);
   Route::get('mark/all/as/read',[
      AdminsGetRequestController::class,'MarkAllAsRead'
   ]);
   Route::get('product/suspend',[
      AdminsGetRequestController::class,'SuspendProduct'
   ]);

});


Route::prefix('search')->group(function(){
   Route::get('users',[
      AdminsSearchRequestController::class,'Users'
   ]);
    Route::get('promoters',[
      AdminsSearchRequestController::class,'Promoters'
   ]);
});




});



});
});