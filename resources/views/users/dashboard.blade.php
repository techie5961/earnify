@extends('layout.users.app')
@section('title')
   Dashboard
@endsection
@section('css')
    <style class="css">
        .balance-div{
            width:100%;
            /* max-width:500px; */
            margin:5px 0;
            background:var(--primary);
            color:var(--primary-text);
            padding:20px;
            border-radius:20px;
            padding-top:0;
        
        }
          
               .balance-div .down-part{
                    width:100%;
                    background:inherit;
                    position:relative;
                    display:flex;
                    flex-direction:column;
                    justify-content:flex-end;
                    padding-top:25px;
                }
                
              .balance-div  .balance-card{
                    width:100%;
                    padding:20px;
                    background:var(--secondary);
                    color:var(--secondary-text);
                    border-radius:20px 20px 0 0;
                    display:flex;
                    flex-direction:column;
                    gap:10px;
              }
                        .balance-div .balance-card.balance-card-1{
                            padding-bottom:0;
                            position:relative;
                            z-index:100;

                        }
                                
                               .balance-div .balance-card.balance-card-1 .card-teeth{
                                    width:50%;
                                    background:var(--primary);
                                    height:30px;
                                    margin:0 auto;
                                    border-radius:20px 20px 0 0;
                                    position:relative;
                               }
                    .balance-div .balance-card.balance-card-1 .card-teeth  .left-cutout{
                                            position: absolute;
                                            height:50%;
                                            aspect-ratio:1;
                                            background:inherit;
                                            right:100%;
                                            bottom:0;
                    }

                                               .balance-div .balance-card.balance-card-1 .card-teeth  .left-cutout::before{
                                                    content:'';
                                                    background:var(--secondary);
                                                    position:absolute;
                                                    inset:-10% 0 0 -10%;
                                                    border-radius:0 0 50% 0;
                                                
                                                }
                                               

                             
                                .balance-div .balance-card.balance-card-1 .card-teeth .right-cutout{
                                            position: absolute;
                                            height:50%;
                                            aspect-ratio:1;
                                            background:inherit;
                                            left:100%;
                                            bottom:0;
                                }

                                               .balance-div .balance-card.balance-card-1 .card-teeth .right-cutout::before{
                                                    content:'';
                                                    background:var(--secondary);
                                                    position:absolute;
                                                    inset:-10% -10% 0 0;
                                                    border-radius:0 0 0 50%;
                                                
                                                }
                                  

               .balance-div .balance-card.balance-card-2{
                    transform: translateY(20px);
                    background:white;
                    color:black;
                    position:relative;
                    z-index:50;
                    padding-bottom:30px;
                }
   
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- new row --}}
        <div class="row w-full g-10">
            @if (isset(Auth::guard('users')->user()->photo))
                <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" class="h-40 w-40 circle no-pointer no-select">
            @else
                <div class="h-40 w-40 no-shrink circle bg-primary primary-text column align-center justify-center no-select">
                    {{ $initials }}
                </div>
            @endif
            {{-- new column --}}
            <div class="column overflow-hidden g-5">
                <small class="opacity-07 ws-nowrap">Welcome Back, 👋</small>
                <strong class="font-size-1 ws-nowrap font-weight-700 row w-fit max-w-full overflow-hidden"><span class="block text-overflow-ellipsis ws-nowrap">{{ ucwords(Auth::guard('users')->user()->username) }}</span></strong>
            </div>
            <div style="background:var(--primary);color:var(--primary-text)" class="p-5 row overflow-hidden min-w-100 align-center justify-center max-w-full no-select p-x-10 m-y-auto br-5"><span class="block w-fit text-overflow-ellipsis ws-nowrap"> {{ json_decode(json_decode(Auth::guard('users')->user()->coupon)->package)->name->value }}</span></div>
        </div>

        {{-- balance div --}}
        <div class="balance-div">
            {{-- cards --}}
             <div class="balance-card balance-card-2">
                {{-- new row --}}
                <div class="row align-center space-between g-10">
                    <span class="opacity-07">{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','gaming_balance')->first()->name }}</span>
                    <strong class="font-size-1 font-weight-900">{{ Auth::guard('users')->user()->currency }}{{ number_format(Auth::guard('users')->user()->gaming_balance,2) }}</strong>
              
            </div>
            
                </div>
            {{-- new card --}}
            <div class="balance-card balance-card-1">
                {{-- new row --}}
                <div class="row align-center space-between g-10">
                    <span class="opacity-07">{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','affiliate_balance')->first()->name }}</span>
                    <strong class="font-size-1 font-weight-900">{{ Auth::guard('users')->user()->currency }}{{ number_format(Auth::guard('users')->user()->affiliate_balance,2) }}</strong>
              
            </div>
            {{-- card left --}}
            <div class="h-30 max-h-30 w-30 bottom-0 left-0 pos-absolute bg-primary m-right-auto">
                <div style="border-radius:0 0 0 50%;inset:-1% -1% 0 0;" class="pos-absolute bg-secondary inset-0"></div>
            </div>
             {{-- card teeth --}}
               <div class="card-teeth">
                {{-- left cutout --}}
                <div class="left-cutout">

                </div>
                {{-- right cutout --}}
                <div class="right-cutout">

                </div>
               </div>
               {{-- card right --}}
            <div class="h-30 max-h-30 w-30 bottom-0 right-0 pos-absolute bg-primary m-right-auto">
                <div style="border-radius:0 0 50% 0;inset:-1% 0 0 -1%;" class="pos-absolute bg-secondary inset-0"></div>
            </div>
                </div>
            <div class="down-part">
                {{-- new column --}}
                <div class="column">
                    <strong class="font-size-1-5 font-weight-900">
                        {{ Auth::guard('users')->user()->currency }}{{ number_format(Auth::guard('users')->user()->main_balance,2) }}
                    </strong>
                    {{-- new row --}}
                    <div class="row w-full g-10 space-between">
                    <span class="opacity-07">{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()->name }}</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- analytics --}}
        <div style="grid-template-columns:repeat(auto-fit,minmax(150px,1fr))" class="w-full grid g-10 place-center">
            {{-- new analytic --}}
            <div style="border:1px solid var(--rgt-01)" class="bg-light w-full p-10 br-10 space-between row align-center g-10">
                {{-- new column --}}
                <div class="column g-5">
                    <small class="opacity-07 ws-nowrap">Total Referrals</small>
                    <strong class="font-size-09 ws-nowrap">{{ number_format($referrals) }}</strong>
                </div>
                {{-- new --}}
                <div style="background:rgba(255, 255, 0,0.1);color:yellow;" class="h-40 w-40 br-5 no-shrink column align-center justify-center">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path></svg> 
                </div>
            </div>
              {{-- new analytic --}}
            <div style="border:1px solid var(--rgt-01)" class="bg-light w-full p-10 br-10 space-between row align-center g-10">
                {{-- new column --}}
                <div class="column overflow-hidden text-overflow-ellipsis min-w-0 g-5">
                    <small class="opacity-07 flex-1 overflow-hidden  row ws-nowrap">Total Earnings</small>
                    <strong class="font-size-09 ws-nowrap">{{ Auth::guard('users')->user()->currency.number_format($referral_earnings) }}</strong>
                </div>
                {{-- new --}}
                <div style="background:rgba(0, 255, 242, 0.1);color:rgb(0, 255, 242);" class="h-40 w-40 br-5 no-shrink column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M8 21H3V13H8V21ZM14.5 21H9.5V15H14.5V21ZM21 21H16V17H21V21ZM14.5 14H9.5V3H14.5V14ZM21 16H16V8H21V16ZM8 12H3V8H8V12Z"></path></svg>
                </div>
            </div>
             {{-- new analytic --}}
            <div style="border:1px solid var(--rgt-01)" class="bg-light w-full p-10 br-10 space-between row align-center g-10">
                {{-- new column --}}
                <div class="column overflow-hidden text-overflow-ellipsis min-w-0 g-5">
                    <small class="opacity-07 flex-1 overflow-hidden  row ws-nowrap">Agent Gold</small>
                    <strong class="font-size-09 ws-nowrap">{{ Auth::guard('users')->user()->currency.number_format($agent_gold) }}</strong>
                </div>
                {{-- new --}}
                <div style="background:rgba(30, 255, 0, 0.1);color:rgb(30, 255, 0);" class="h-40 w-40 br-5 no-shrink column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.1162 5.87598L21 3.52344V20H3V4.32324L9.11719 1.87598L15.1162 5.87598ZM5 5.67676V12.2334L8.87988 9.90625L14.9678 11.9355L19 10.3223V6.47656L14.8828 8.12402L8.88281 4.12305L5 5.67676Z"></path></svg>
                </div>
            </div>
             {{-- new analytic --}}
            <div style="border:1px solid var(--rgt-01)" class="bg-light w-full p-10 br-10 space-between row align-center g-10">
                {{-- new column --}}
                <div class="column overflow-hidden text-overflow-ellipsis min-w-0 g-5">
                    <small class="opacity-07 flex-1 overflow-hidden  row ws-nowrap">Agent Silver</small>
                    <strong class="font-size-09 ws-nowrap">{{ Auth::guard('users')->user()->currency.number_format($agent_silver) }}</strong>
                </div>
                {{-- new --}}
                <div style="background:rgba(108,92,230, 0.1);color:rgb(141, 127, 253);" class="h-40 w-40 br-5 no-shrink column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 12H4V21H2V12ZM5 14H7V21H5V14ZM16 8H18V21H16V8ZM19 10H21V21H19V10ZM9 2H11V21H9V2ZM12 4H14V21H12V4Z"></path></svg>
                </div>
            </div>
        </div>
        <strong class="font-weight-600 font-size-1 m-top-10 m-left-10">Quick Actions</strong>
        {{-- new row --}}
        <div style="display:grid;grid-template-columns:repeat(4,1fr);" class="w-full row g-10 space-between flex-wrap">
            {{-- new column --}}
            <div x-data="{ 
                'link' : '{{ url('users/free/loan') }}'
             }" x-on:click="CreateNotify('info','You are not yet qualified to apply for a free loan')"  class="column align-center text-center g-5">
                <div class="h-50 no-shrink w-fit perfect-square g-10 column align-center justify-center br-10 bg-primary primary-text">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 5.99979H15.0049C11.6912 5.99979 9.00488 8.68608 9.00488 11.9998C9.00488 15.3135 11.6912 17.9998 15.0049 17.9998H22.0049V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V5.99979ZM15.0049 7.99979H23.0049V15.9998H15.0049C12.7957 15.9998 11.0049 14.2089 11.0049 11.9998C11.0049 9.79065 12.7957 7.99979 15.0049 7.99979ZM15.0049 10.9998V12.9998H18.0049V10.9998H15.0049Z"></path></svg>

                </div>
                <small class="opacity-07">Free Loan</small>
            </div>
             {{-- new column --}}
            <div x-data="{ 
                'link' : '{{ url('users/games') }}'
             }" x-on:click="Redirect(link)"  class="column align-center text-center g-5">
                <div class="h-50 no-shrink w-fit perfect-square g-10 column align-center justify-center br-10 bg-primary primary-text">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17 4C20.3137 4 23 6.68629 23 10V14C23 17.3137 20.3137 20 17 20H7C3.68629 20 1 17.3137 1 14V10C1 6.68629 3.68629 4 7 4H17ZM10 9H8V11H6V13H7.999L8 15H10L9.999 13H12V11H10V9ZM18 13H16V15H18V13ZM16 9H14V11H16V9Z"></path></svg>

                </div>
                <small class="opacity-07">Games</small>
            </div>
              {{-- new column --}}
            <div x-data="{ 
                'link' : '{{ url('users/games') }}'
             }" x-on:click="Redirect(l
             ink)"  class="column align-center text-center g-5">
                <div class="h-50 no-shrink w-fit perfect-square g-10 column align-center justify-center br-10 bg-primary primary-text">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17 4C20.3137 4 23 6.68629 23 10V14C23 17.3137 20.3137 20 17 20H7C3.68629 20 1 17.3137 1 14V10C1 6.68629 3.68629 4 7 4H17ZM10 9H8V11H6V13H7.999L8 15H10L9.999 13H12V11H10V9ZM18 13H16V15H18V13ZM16 9H14V11H16V9Z"></path></svg>

                </div>
                <small class="opacity-07">Free Loan</small>
            </div>
              {{-- new column --}}
            <div x-data="{ 
                'link' : '{{ url('users/google/to/earn') }}'
             }" x-on:click="Redirect(link)" class="column align-center text-center g-5">
                <div class="h-50 no-shrink w-fit perfect-square g-10 column align-center justify-center br-10 bg-primary primary-text">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.06364 7.50914C4.70909 4.24092 8.09084 2 12 2C14.6954 2 16.959 2.99095 18.6909 4.60455L15.8227 7.47274C14.7864 6.48185 13.4681 5.97727 12 5.97727C9.39542 5.97727 7.19084 7.73637 6.40455 10.1C6.2045 10.7 6.09086 11.3409 6.09086 12C6.09086 12.6591 6.2045 13.3 6.40455 13.9C7.19084 16.2636 9.39542 18.0227 12 18.0227C13.3454 18.0227 14.4909 17.6682 15.3864 17.0682C16.4454 16.3591 17.15 15.3 17.3818 14.05H12V10.1818H21.4181C21.5364 10.8363 21.6 11.5182 21.6 12.2273C21.6 15.2727 20.5091 17.8363 18.6181 19.5773C16.9636 21.1046 14.7 22 12 22C8.09084 22 4.70909 19.7591 3.06364 16.4909C2.38638 15.1409 2 13.6136 2 12C2 10.3864 2.38638 8.85911 3.06364 7.50914Z"></path></svg>

                </div>
                <small class="opacity-07 ws-nowrap overflow-hidden block">Google-To-Earn</small>
            </div>
             {{-- new column --}}
            <div x-data="{ 
                'link' : '{{ url('users/tasks') }}'
             }" x-on:click="Redirect(link)" class="column align-center text-center g-5">
                <div class="h-50 no-shrink w-fit perfect-square g-10 column align-center justify-center br-10 bg-primary primary-text">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                </div>
                <small class="opacity-07">Activities</small>
            </div>
        </div>

        {{-- new row --}}
        <div style="border:1px solid var(--rgt-01)" class="row w-full m-top-10 bg-light br-10 p-15 column g-10">
            <strong class="font-size-1 font-weight-600">Your Agent Link</strong>
            {{-- new row --}}
            <div class="row w-full overflow-hidden g-10 align-center space-between">
                <div style="border:1px solid var(--rgt-01);flex:1 0 auto;max-width:calc(100% - 50px);" class="h-40 overflow-hidden max-w-full p-10 row no-shrink br-10">
                    <span class="row max-w-full overflow-auto no-scrollbar">{{ url('register?ref='.Auth::guard('users')->user()->uniqid.'') }}</span>
                </div>
                <div onclick="copy('{{ url('register?ref='.Auth::guard('users')->user()->uniqid.'') }}')" class="h-40 w-40 no-shrink bg-primary primary-text column align-center justify-center br-10">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                </div>
            </div>
        </div>
       @if (!$trx->isEmpty())
            {{-- recent transactions --}}
            {{-- new row --}}
            <div class="row w-full g-10 space-between align-center">
        <strong class="font-weight-600 font-size-1">Recent Transactions</strong>
        <span onclick="Redirect('{{ url('users/transactions') }}')" class="c-secondary row align-center pointer no-u no-select">
            View More
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>

        </span>
            </div>
            <div style="grid-template-columns: repeat(auto-fit,minmax(min(400px,100%),1fr))" class="w-full max-w-full grid pc-grid-2 g-10 place-center">
        @foreach ($trx as $data)
            <div onclick="Redirect('{{ url('users/transaction/receipt?id='.$data->id.'') }}')" style="max-width:100%;border:1px solid var(--rgt-01)" class="w-full align-center space-between overflow-hidden p-15 pc-pointer br-10 row g-10 bg-light">
             @if ($data->class == 'credit')
                    <div style="background: #4caf50;color:white;flex:0 0 40px;min-width:0;" class="h-40 w-40 circle no-shrink column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14.5895 16.0032L5.98291 7.39664L7.39712 5.98242L16.0037 14.589V7.00324H18.0037V18.0032H7.00373V16.0032H14.5895Z"></path></svg>

                </div>
             @else
                    <div style="background: orangered;color:white;" class="h-40 w-40 circle no-shrink column align-center justify-center">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>

                </div>
             @endif
             {{-- new column --}}
             <div class="column m-right-auto g-5">
                <strong class="font-size-09 font-weight-700">{{ $data->title }}</strong>
                <span class="opacity-07 font-size-07">{{ $data->frame.$data->meridian }}</span>
             </div>
             {{-- amount --}}
             <div class="column text-align-end g-3px">
             <strong class="font-size-1 text-align-end row "><span class="max-w-full m-left-auto text-overflow-ellipsis block ws-nowrap">{{ Auth::guard('users')->user()->currency.number_format($data->amount,2) }}</span></strong>
                <small class="{{ $data->status == 'success' ? 'c-green' : ($data->status == 'pending' ? 'c-gold' : 'c-red') }}">{{ $data->status }}</small>
             </div>
            </div>
        @endforeach
            </div>
       @endif

    </section>
@endsection
