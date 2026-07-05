<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])
{{-- include admin changed vars --}}
@include('components.sections.admins',[
    'css_var' => true
])
{{-- yield css --}}
@stack('css')
{{-- yield js --}}
    @yield('js')
    <title>{{ config('app.name') }} || Admins || @yield('title') </title>

    <style>
        
        /* body */
        body:has(nav.active){
            overflow:hidden !important;
           
        }
        /* header */
        header{
            position: fixed;
            top:0;
            left:0;
            right:0;
            padding:20px;
            display:flex;
            flex-direction:row;
            align-items:center;
            justify-content:space-between;
            gap:10px;
            background:var(--bg-light);
            border-bottom:1px solid var(--rgt-01);
            user-select:none;
            z-index:2000;

        }
        main{
            overflow:auto;
            scrollbar-width: none;
            -webkit-scrollbar-width:none;
           

        }
        /* menu icon */
        .menu-icon{
            width:40px;
            aspect-ratio:1;
          
            color:var(--primary);
            border-radius:10px;
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;


        }
        /* nav */
        nav{
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background:rgba(0,0,0,0.1);
            z-index:3000;
            backdrop-filter:blur(20px);
            -webkit-backdrop-filter:blur(10px);
            user-select:none;
            display:none;

        }
        nav .child{
            width:70%;
            background:var(--bg-light);
            height:100%;
            border-right: 1px solid var(--rgt-01);
            display:flex;
            transform:translateX(-100%);
            transition:all 0.5s linear;
            gap:30px;
            flex-direction:column;
            overflow:auto;
           

        }
        .nav-child-header{
            position:sticky;
            top:0;
            left:0;
            right:0;
            background:inherit;
            border-bottom:1px solid var(--rgt-01)
        }
        nav.active{
            display:flex;
        }
        nav.active .child{
            animation:animate-trans 0.5s linear forwards;

        }
        @keyframes animate-trans{
            0%{
                transform:translateX(-100%);
            }
            100%{
                transform:translateX(0)
            }
        }
        
        .expandible-nav{
            width:100%;
            display:flex;
            flex-direction:column;
            gap:10px;
            
        }
        .expandible-body{
            width:calc(100% - 30px);
            display:none;
            flex-direction:column;
            gap:5px;
            margin-left:30px;
            background:var(--rgt-005);
            border:1px solid var(--rgt-01);
            border-radius:5px;
            padding:10px;

        }
        .expandible-header:hover{
            background:var(--rgt-005);

        }
        .expandible-header{
            padding:5px;
            border-radius:5px;
        }
        .expandible-body a{
            text-decoration:none;
            color:var(--primary);
            padding:5px;
        }
        .expandible-body a:hover{
            background:var(--bg-light);
            border-radius:5px;
        }
        .nav-a{
            padding:5px;
            border-radius:5px;
        }
        .nav-a:hover{
            background:var(--rgt-005);
        }
        .expandible-nav.active .expandible-body{
            display:flex;
        }
        .expandible-header .chevron svg{
            transition:all 0.2s linear;
            height:15px;
            width:15px;
        }
        .expandible-nav.active .expandible-header .chevron svg{
            transform:rotate(45deg);
        }
        /* footer */
        footer{
            background:var(--primary);
            padding:20px;
            color:var(--primary-text);
            display:flex;
            flex-direction:column;
            gap:5px;
            text-align:center;
            user-select:none;
            z-index:1;
            /* position:none; */

        }
        /* search */
        .search{
            position:relative;
        }
        .search .child{
            position:absolute;
            left:0;
            right:0;
            top:100%;
            padding:20px;
            border:1px solid var(--rgt-01);
            background:inherit;
            border-radius:5px;
            display:none;
            flex-direction:column;
            gap:5px;
            z-index:500;
            overflow:hidden;
        }
        .search .child a{
            width:100%;
            display:flex;
            flex-direction: row;
            align-items:center;
            color:var(--rgt-07);
            text-decoration:none;
           cursor:pointer;
           overflow:hidden;
           border-radius:10px;
           clip-path:inset(0 round 10px);
           user-select: none;
           padding:5px 10px;
          
           
        }
        .search.active .child{
            display:flex;
        }

        
       

        /* media queries */
        @media(min-width:800px){
            /* header */
            header{
                padding-left:calc(30% + 20px);
            }
            .menu-icon{
                display:none;
            }
            /* nav */
            nav{
                display:flex;
                width:30%;
            }
            nav .child{
                transform:none;
                width:100%;

            }
            main{
                width:calc(100% - 30%);
               margin-left:30%;
               
             
               
            }
            .nav-close{
                display:none;
            }
            /* footer */
            footer{
                text-align:start;
                align-items:start;
                width:calc(100% - 30%);
                margin-left:30%;

            }

        
        }
        
    </style>
</head>
<body>
    {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    {{-- header --}}
    <header>
        {{-- logo --}}
        <div class="row align-center g-10">
            <div class="h-40 br-10 w-40 no-shrink column align-center justify-center p-10 bg-primary primary-text">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M213.85,125.46l-112,120a8,8,0,0,1-13.69-7l14.66-73.33L45.19,143.49a8,8,0,0,1-3-13l112-120a8,8,0,0,1,13.69,7L153.18,90.9l57.63,21.61a8,8,0,0,1,3,12.95Z"></path></svg>

            </div>
            <strong style="font-size:30px" class="c-primary font-weight-900">Lumina</strong>
        </div>
       
        {{-- menu icon --}}
        <div onclick="document.querySelector('nav').classList.toggle('active')" class="menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M228,128a12,12,0,0,1-12,12H40a12,12,0,0,1,0-24H216A12,12,0,0,1,228,128ZM40,76H216a12,12,0,0,0,0-24H40a12,12,0,0,0,0,24ZM216,180H40a12,12,0,0,0,0,24H216a12,12,0,0,0,0-24Z"></path></svg>

        </div>
    </header>
    {{-- nav --}}
    <nav onclick="this.classList.remove('active')">
        <div onclick="event.stopPropagation()" class="child">
            {{-- nav child header --}}
            <div class="row nav-child-header p-20 align-center w-full space-between">
                 {{-- logo --}}
        <div class="row align-center g-10">
            <div class="h-40 br-10 w-40 no-shrink column align-center justify-center p-10 bg-primary primary-text">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M213.85,125.46l-112,120a8,8,0,0,1-13.69-7l14.66-73.33L45.19,143.49a8,8,0,0,1-3-13l112-120a8,8,0,0,1,13.69,7L153.18,90.9l57.63,21.61a8,8,0,0,1,3,12.95Z"></path></svg>

            </div>
            <strong style="font-size:30px" class="font-weight-900 c-primary">Lumina</strong>
        </div>
        {{-- close --}}
        <span onclick="document.querySelector('nav').classList.remove('active')" class="nav-close" style="font-size:40px;">&times;</span>
            </div>
            {{-- nav child body --}}
            <div class="w-full flex-auto column c-primary p-20 g-10">
                {{-- new nav a --}}
                <a href="{{ url('admins/dashboard') }}" class="row nav-a no-u space-between c-primary align-center g-10">
                    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20Z"></path></svg>
                    </span>
                    <span class="m-right-auto">Dashboard</span>
                    <span>
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                    </span>
                </a>
                 {{-- new nav expandible --}}
                <div onclick="if(this.classList.contains('active')){
                this.classList.remove('active');
                }else{
                this.classList.add('active');
                }" class="expandible-nav">
                    {{-- expandible header --}}
                    <div class="row expandible-header align-center g-10">
                        <span>
                         <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>


                        </span>
                        <span class="m-right-auto">Users</span>
                        <span class="chevron">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
                           </span>
                    </div>
                    {{-- expandible body --}}
                    <div class="expandible-body">
                        <a href="{{ url('admins/users') }}">All Users</a>
                        <a href="{{ url('admins/users?status=active') }}">Active Users</a>
                        <a href="{{ url('admins/users?status=banned') }}">Banned Users</a>
                        <a href="{{ url('admins/users?type=vendor') }}">Vendors</a>
                    </div>
                </div>
                 {{-- new nav a --}}
                <a href="{{ url('admins/withdrawal/portal') }}" class="row nav-a no-u space-between c-primary align-center g-10">
                    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V9.99979H22.0049ZM22.0049 7.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V7.99979ZM15.0049 15.9998V17.9998H19.0049V15.9998H15.0049Z"></path></svg>
                 </span>
                    <span class="m-right-auto">Withdrawal Portal</span>
                    <span>
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                    </span>
                </a>
                  {{-- new nav a --}}
                <a href="{{ url('admins/packages/list') }}" class="row nav-a no-u space-between c-primary align-center g-10">
                    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M5 3C4.5313 3 4.12549 3.32553 4.02381 3.78307L2.02381 12.7831C2.00799 12.8543 2 12.927 2 13V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V13C22 12.927 21.992 12.8543 21.9762 12.7831L19.9762 3.78307C19.8745 3.32553 19.4687 3 19 3H5ZM19.7534 12H15C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12H4.24662L5.80217 5H18.1978L19.7534 12Z"></path></svg>
                 </span>
                    <span class="m-right-auto">Packages List</span>
                    <span>
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

                    </span>
                </a>
                 

                 {{-- new nav expandible --}}
                <div onclick="if(this.classList.contains('active')){
                this.classList.remove('active');
                }else{
                this.classList.add('active');
                }" class="expandible-nav">
                    {{-- expandible header --}}
                    <div class="row expandible-header align-center g-10">
                        <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.0049 20.9997C11.0049 20.1712 10.3333 19.4997 9.50488 19.4997C8.67646 19.4997 8.00488 20.1712 8.00488 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H8.00488C8.00488 3.82809 8.67646 4.49966 9.50488 4.49966C10.3333 4.49966 11.0049 3.82809 11.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H11.0049ZM9.50488 10.4997C10.3333 10.4997 11.0049 9.82809 11.0049 8.99966C11.0049 8.17124 10.3333 7.49966 9.50488 7.49966C8.67646 7.49966 8.00488 8.17124 8.00488 8.99966C8.00488 9.82809 8.67646 10.4997 9.50488 10.4997ZM9.50488 16.4997C10.3333 16.4997 11.0049 15.8281 11.0049 14.9997C11.0049 14.1712 10.3333 13.4997 9.50488 13.4997C8.67646 13.4997 8.00488 14.1712 8.00488 14.9997C8.00488 15.8281 8.67646 16.4997 9.50488 16.4997Z"></path></svg>

                        </span>
                        <span class="m-right-auto">Coupons Codes</span>
                        <span class="chevron">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
                           </span>
                    </div>
                    {{-- expandible body --}}
                    <div class="expandible-body">
                        <a href="{{ url('admins/coupon/code/create') }}">Create New Code</a>
                        <a href="{{ url('admins/coupon/codes/manage') }}">Manage Codes</a>
                    </div>
                </div>

                  {{-- new nav expandible --}}
                <div onclick="if(this.classList.contains('active')){
                this.classList.remove('active');
                }else{
                this.classList.add('active');
                }" class="expandible-nav">
                    {{-- expandible header --}}
                    <div class="row expandible-header align-center g-10">
                        <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 9.49966V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V14.4997C3.38559 14.4997 4.50488 13.3804 4.50488 11.9997C4.50488 10.619 3.38559 9.49966 2.00488 9.49966ZM9.00488 8.99966V10.9997H15.0049V8.99966H9.00488ZM9.00488 12.9997V14.9997H15.0049V12.9997H9.00488Z"></path></svg>

                        </span>
                        <span class="m-right-auto">Vouchers</span>
                        <span class="chevron">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
                           </span>
                    </div>
                    {{-- expandible body --}}
                    <div class="expandible-body">
                        <a href="{{ url('admins/voucher/create') }}">Create New Voucher</a>
                        <a href="{{ url('admins/vouchers/manage') }}">Manage Vouchers</a>
                    </div>
                </div>
               
                

                  {{-- new nav expandible --}}
                <div onclick="if(this.classList.contains('active')){
                this.classList.remove('active');
                }else{
                this.classList.add('active');
                }" class="expandible-nav">
                    {{-- expandible header --}}
                    <div class="row expandible-header align-center g-10">
                        <span>
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                        </span>
                        <span class="m-right-auto">Tasks</span>
                        <span class="chevron">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
                           </span>
                    </div>
                    {{-- expandible body --}}
                    <div class="expandible-body">
                        <a href="{{ url('admins/task/post') }}">Post Task</a>
                        <a href="{{ url('admins/tasks/manage') }}">Manage Tasks</a>
                        <a href="{{ url('admins/tasks/proofs') }}">Submitted Proofs</a>
                    </div>
                </div>
                 {{-- new nav expandible --}}
                <div onclick="if(this.classList.contains('active')){
                this.classList.remove('active');
                }else{
                this.classList.add('active');
                }" class="expandible-nav">
                    {{-- expandible header --}}
                    <div class="row expandible-header align-center g-10">
                        <span>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20.998 3V21H2.99805V3H20.998ZM12.998 6H10.998V18H12.998V6ZM8.99805 9H6.99805V15H8.99805V9ZM16.998 9H14.998V15H16.998V9Z"></path></svg>

                        </span>
                        <span class="m-right-auto">Task Proofs</span>
                        <span class="chevron">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
                           </span>
                    </div>
                    {{-- expandible body --}}
                    <div class="expandible-body">
                        <a href="{{ url('admins/tasks/proofs') }}">All Proofs</a>
                        <a href="{{ url('admins/tasks/proofs?status=approved') }}">Approved Proofs</a>
                        <a href="{{ url('admins/tasks/proofs?status=pending') }}">Pending Proofs</a>
                        <a href="{{ url('admins/tasks/proofs?status=rejected') }}">Rejected Proofs</a>
                        <a href="{{ url('admins/tasks/proofs?status=penalised') }}">Penalised Proofs</a>
                    </div>
                </div>
                 {{-- new nav a --}}
                <a href="{{ url('admins/transactions') }}" class="row nav-a no-u space-between c-primary align-center g-10">
                    <span>
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0049 22.0027C6.48204 22.0027 2.00488 17.5256 2.00488 12.0027C2.00488 6.4799 6.48204 2.00275 12.0049 2.00275C17.5277 2.00275 22.0049 6.4799 22.0049 12.0027C22.0049 17.5256 17.5277 22.0027 12.0049 22.0027ZM8.50488 14.0027V16.0027H11.0049V18.0027H13.0049V16.0027H14.0049C15.3856 16.0027 16.5049 14.8835 16.5049 13.5027C16.5049 12.122 15.3856 11.0027 14.0049 11.0027H10.0049C9.72874 11.0027 9.50488 10.7789 9.50488 10.5027C9.50488 10.2266 9.72874 10.0027 10.0049 10.0027H15.5049V8.00275H13.0049V6.00275H11.0049V8.00275H10.0049C8.62417 8.00275 7.50488 9.12203 7.50488 10.5027C7.50488 11.8835 8.62417 13.0027 10.0049 13.0027H14.0049C14.281 13.0027 14.5049 13.2266 14.5049 13.5027C14.5049 13.7789 14.281 14.0027 14.0049 14.0027H8.50488Z"></path></svg>
                  </span>
                    <span class="m-right-auto">Transactions</span>
                    <span>
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>
                       
                    </span>
                </a>
                  {{-- new nav expandible --}}
                <div onclick="if(this.classList.contains('active')){
                this.classList.remove('active');
                }else{
                this.classList.add('active');
                }" class="expandible-nav">
                    {{-- expandible header --}}
                    <div class="row expandible-header align-center g-10">
                        <span>
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 5.99979H15.0049C11.6912 5.99979 9.00488 8.68608 9.00488 11.9998C9.00488 15.3135 11.6912 17.9998 15.0049 17.9998H22.0049V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V5.99979ZM15.0049 7.99979H23.0049V15.9998H15.0049C12.7957 15.9998 11.0049 14.2089 11.0049 11.9998C11.0049 9.79065 12.7957 7.99979 15.0049 7.99979ZM15.0049 10.9998V12.9998H18.0049V10.9998H15.0049Z"></path></svg>

                        </span>
                        <span class="m-right-auto">Withdrawals</span>
                        <span class="chevron">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
                          </span>
                    </div>
                    {{-- expandible body --}}
                    <div class="expandible-body">
                        <a href="{{ url('admins/transactions?type=withdrawal') }}">All Withdrawals</a>
                        <a href="{{ url('admins/transactions?type=withdrawal&status=pending') }}">Pending Withdrawals</a>
                        <a href="{{ url('admins/transactions?type=withdrawal&status=success') }}">Successfull Withdrawals</a>
                        <a href="{{ url('admins/transactions?type=withdrawal&status=rejected') }}">Rejected Withdrawals</a>
                    </div>
                </div>
                  {{-- new nav expandible --}}
                <div onclick="if(this.classList.contains('active')){
                this.classList.remove('active');
                }else{
                this.classList.add('active');
                }" class="expandible-nav">
                    {{-- expandible header --}}
                    <div class="row expandible-header align-center g-10">
                        <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM16 11L11 18V13H8L13 6V11H16Z"></path></svg>

                        </span>
                        <span class="m-right-auto">Deposits</span>
                        <span class="chevron">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
                           </span>
                    </div>
                    {{-- expandible body --}}
                    <div class="expandible-body">
                        <a href="{{ url('admins/transactions?type=deposit') }}">All Deposits</a>
                        <a href="{{ url('admins/transactions?type=deposit&status=pending') }}">Pending Deposits</a>
                        <a href="{{ url('admins/transactions?type=deposit&status=success') }}">Successfull Deposits</a>
                        <a href="{{ url('admins/transactions?type=deposit&status=rejected') }}">Rejected Deposits</a>
                    </div>
                </div>
                 {{-- new nav a --}}
                <a href="{{ url('admins/settings') }}" class="row nav-a no-u space-between c-primary align-center g-10">
                    <span>
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.13127 13.6308C1.9492 12.5349 1.95521 11.434 2.13216 10.3695C3.23337 10.3963 4.22374 9.86798 4.60865 8.93871C4.99357 8.00944 4.66685 6.93557 3.86926 6.17581C4.49685 5.29798 5.27105 4.51528 6.17471 3.86911C6.9345 4.66716 8.0087 4.99416 8.93822 4.60914C9.86774 4.22412 10.3961 3.23332 10.369 2.13176C11.4649 1.94969 12.5658 1.9557 13.6303 2.13265C13.6036 3.23385 14.1319 4.22422 15.0612 4.60914C15.9904 4.99406 17.0643 4.66733 17.8241 3.86975C18.7019 4.49734 19.4846 5.27153 20.1308 6.1752C19.3327 6.93499 19.0057 8.00919 19.3907 8.93871C19.7757 9.86823 20.7665 10.3966 21.8681 10.3695C22.0502 11.4654 22.0442 12.5663 21.8672 13.6308C20.766 13.6041 19.7756 14.1324 19.3907 15.0616C19.0058 15.9909 19.3325 17.0648 20.1301 17.8245C19.5025 18.7024 18.7283 19.4851 17.8247 20.1312C17.0649 19.3332 15.9907 19.0062 15.0612 19.3912C14.1316 19.7762 13.6033 20.767 13.6303 21.8686C12.5344 22.0507 11.4335 22.0447 10.3691 21.8677C10.3958 20.7665 9.86749 19.7761 8.93822 19.3912C8.00895 19.0063 6.93508 19.333 6.17532 20.1306C5.29749 19.503 4.51479 18.7288 3.86862 17.8252C4.66667 17.0654 4.99367 15.9912 4.60865 15.0616C4.22363 14.1321 3.23284 13.6038 2.13127 13.6308ZM11.9997 15.0002C13.6565 15.0002 14.9997 13.657 14.9997 12.0002C14.9997 10.3433 13.6565 9.00018 11.9997 9.00018C10.3428 9.00018 8.99969 10.3433 8.99969 12.0002C8.99969 13.657 10.3428 15.0002 11.9997 15.0002Z"></path></svg>
               </span>
                    <span class="m-right-auto">Site Settings</span>
                    <span>
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>
                       
                    </span>
                </a>





                <div onclick="window.location.href='{{ url('admins/logout') }}'" style="border:1px solid red;color:red;background:rgba(255,0,0,0.1)" class="w-full pointer m-top-auto justify-center br-5 p-10 g-5 align-center row">
                    <span>
                       <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M5 22C4.44772 22 4 21.5523 4 21V3C4 2.44772 4.44772 2 5 2H19C19.5523 2 20 2.44772 20 3V6H18V4H6V20H18V18H20V21C20 21.5523 19.5523 22 19 22H5ZM18 16V13H11V11H18V8L23 12L18 16Z"></path></svg>
                       </span>
                    <span class="font-weight-600">Sign Out</span>
                </div>





            </div>
        </div>
    </nav>
    {{-- main --}}
    <main>
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer>
        <span>{{ config('app.name') }} Admin Dashboard <br> &copy;{{ date('Y') }} powered by Lumina Admin</span>
        <span>Coding and design by <a style="color:aqua" href="https://wa.me/+2349013350351">Techie Innovations</a></span>

    </footer>
  @include('components.utilities',[
    'vite_js' => true
  ])
  <script>
    function Redirect(url){
        window.location.href=url;
    }
   async function Search(element,url){
    
    if(element.value.trim() == ''){
        element.closest('.search').classList.remove('active');
        return;
    }
        let response=await fetch(url);
        if(response.ok){
            let data=await response.text();
            element.closest('.search').classList.add('active');
            element.closest('.search').querySelector('.child').innerHTML=data;
        }else{
             element.closest('.search').classList.add('active');
             element.closest('.search').querySelector('.child').innerHTML=` <a href="/" class="w-full row align-center g-10">
                    <span>
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212ZM76,108a16,16,0,1,1,16,16A16,16,0,0,1,76,108Zm104,0a16,16,0,1,1-16-16A16,16,0,0,1,180,108Zm-3.26,57a12,12,0,0,1-19.48,14,36,36,0,0,0-58.52,0,12,12,0,0,1-19.48-14,60,60,0,0,1,97.48,0Z"></path></svg>
                 </span>
                  <span>${response.status} Error</span>
                
                </a>`;
        }
    }
    document.querySelector('main').style.height=Math.abs(document.querySelector('body').getBoundingClientRect().height - document.querySelector('header').getBoundingClientRect().height) + 'px';
    document.querySelector('main').style.marginTop=document.querySelector('header').getBoundingClientRect().height + 'px';
  </script>
 
    {{-- stack js --}}
    @stack('js')
</body>
</html>