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



    <title>{{ config('app.name') }} || Users || @yield('title') </title>

     @include('components.utilities',[
    'vite_js' => true
  ])
  
    <script>
   
    function StyleUp(){
        
      try{
       
       
        document.querySelector('main').style.paddingTop=document.querySelector('header').getBoundingClientRect().height + 20 + 'px';
          document.body.style.marginBottom=document.querySelector('footer').getBoundingClientRect().height + 'px';
   
       
      }catch(error){
        alert(error)
      }
    }
    window.addEventListener('load',()=>{
        StyleUp();
    });
    // document.addEventListener('vitecss:navigating',()=>{
    //     alert('navigating')
    // });
   document.addEventListener('vitecss:navigated',()=>{
       
     StyleUp();
    });
    
    document.addEventListener('vitecss:navigated',()=>{
        try{
            if(window.allAudio){
                 if(window.allAudio && window.allAudio.length){
            allAudio.forEach((aud)=>{
                aud.pause();
                aud.src='';
                aud.load();
            });
            allAudio.length=0;
        }
            }
            
        }catch(error){
            alert(error)
        }
       
    });
    function ToggleNav(element){
       
        let nav=document.querySelector('nav');
            if(nav.classList.contains('active')){
                 nav.classList.remove('active');
         
            }else{
                 nav.classList.add('active');
         
            }
               document.querySelector('nav > .child .body').style.marginTop=(document.querySelector('nav > .child .header').getBoundingClientRect().height) + 'px';
            document.querySelector('nav > .child .body').style.height=Math.abs(window.innerHeight - (document.querySelector('nav > .child .header').getBoundingClientRect().height + document.querySelector('nav > .child .footer').getBoundingClientRect().height)) + 'px';
    
    }
   
    function Redirect(url){
        // window.location.href=url;
        // Vitecss.navigate(url)
        Vitecss.navigate(url)
    }
   
  </script>
    <style>
       
      body{
        overflow-x: hidden;
       
      }
      .vite-loader .child{
        background:linear-gradient(to right,var(--primary),var(--secondary));
      }
        header{
            position:fixed !important;
            top:0;
            left:0;
            right:0;
            z-index:1200;
            background:transparent;
             background:var(--bg);
            border-bottom:1px solid var(--rgt-005);
            display:flex;
            flex-direction:row;
            align-items:center;
            justify-content:space-between;
            padding:20px;
            position: relative;
            user-select:none;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(50px);
            box-shadow:0 0 10px var(--primary-01)

        }
        /* menu icon */
        .menu-icon{
            height:40px;
            width:40px;
            border-radius:50%;
            background:var(--primary);
            color:var(--primary-text);
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;
            border-radius:5px;
            
           
           
        }
        nav{
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            z-index:1000;
            background:rgb(0,0,0,0.4);
            display:flex;
            flex-direction:row;
            gap:10px;
            user-select: none;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            z-index:1500;
        }
        nav > .child{
            background:var(--bg);
            width:70%;
            height:100%;
            border-right:1px solid var(--rgt-01);
            position:relative;
            /* font-weight:600; */

        }
        /* nav child header */
        nav > .child .header{
            background:inherit;
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:10px;
            padding:20px;
            position:absolute;
            top:0;
            z-index:500;
            width:100%;
            background:inherit;
            background:linear-gradient(to bottom,var(--primary-darker),var(--bg));
           
        }
         nav > .child .footer{
            background:inherit;
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:10px;
            padding:20px;
            position:absolute;
            bottom:0;
            left:0;
            right:0;
            z-index:500;
            margin-top:auto;
           
        }
        nav > .child .body{
            padding:10px;
            display:flex;
            flex-direction:column;
            gap:5px;
            width:100%;
            overflow: auto;
        }
        nav > .child .body .link{
            padding:10px;
            cursor:pointer;
            user-select:none;
            border-radius:0;
            transition: all 0.2s ease;
            font-weight:400;
        }
        nav > .child .body .link:not(.expandible-nav .link):hover,nav > .child .body .link.active{
           
            background:var(--rgt-005);
            border:1px solid var(--rgt-01);
         

        }
       
        main{
            padding-bottom:0;
        }
       
      
        main{
            overflow-x: hidden;
        }
         .populate{
            position:fixed;
            inset: 0;
            background:rgba(0,0,0,0.5);
            z-index:4000;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter:blur(10px);
            display:flex;
            flex-direction:column;
            gap:10px;
            padding:20px;
            align-items:center;
            justify-content:center;
            visibility: hidden;
        
        }
        .populate .child{
            background:black;
            border:1px solid var(--primary);
            padding:20px;
            width:80%;
            color:white;
            border-radius:5px;
            display:flex;
            flex-direction:column;
            gap:10px;
            text-align:center;
            color:var(--primary-light);
            transform:translateY(30px);
            opacity:0;
            transition:all 1s ease;
            max-width:500px;

            

        }
        .populate.active{
            visibility: visible;
        }
        .populate.active .child{
            opacity:1;
            transform:translateY(0);
        }
        body:has(.populate.active){
            overflow:hidden;
        }
        .expandible-nav{
            display:flex;
            flex-direction: column;
         
        }
        .expandible-links{
            display:flex;
            flex-direction:column;
            margin-left:20px;
            border:1px solid var(--rgt-01);
            background:var(--rgt-005);
           display:none;
            overflow:hidden;
            /* border:none; */
        }
        .expandible-nav.active .expandible-links{
            display:flex;

        }
        .expandible-link{
            padding:15px 10px;
         

        }
        .expandible-link:first-of-type{
            padding-top:20px;
           

        }
         .expandible-link:last-of-type{
            padding-bottom:20px;
           

        }
        .expandible-link:not(.expandible-link:last-of-type):hover{
            /* background:var(--rgt-005); */
            border-bottom:1px solid var(--rgt-01)
        }
        .expandible-link:last-of-type:hover{
             border-top:1px solid var(--rgt-01)
        }
        .expandible-nav .caret-right{
            transition:all 0.5s ease;
        }
        .expandible-nav.active .caret-right{
            transform: rotate(90deg);
        }
       
        form{
            display:flex;
            flex-direction: column;
            align-items:center;
        }
        form .page-title,.title{
            text-align:center;
        }
      .form-icon{
        height:70px;
        width:70px;
        border-radius:50%;
        background:var(--primary-01);
        color:var(--primary);
        display:flex;
        flex-direction: column;
        align-items:center;
        justify-content:center;
      }
      .form-icon svg{
        height:40px;
        width:40px;
      }
        /* media query for mobile devices */
        @media(max-width:800px){
           nav{

          transition:all 0.5s ease;
          
           }
         
          
           
            body:has(nav.active){
                overflow:hidden;
            }
        }

     
           
                  footer > div  > div{
                       opacity:0.7;
                       user-select:none;
                       -webkit-user-select:none;
                       cursor:pointer;
                  }
                        footer > div  > div.active{
                            opacity:1;
                            /* animation:rubberBand 1s linear; */
                        }
            .refresh.rotate{
                animation:rotate 1s linear infinite;
            }

            @keyframes rotate{
                0%{
                    transform:rotate(0deg);
                }
                100%{
                    transform:rotate(360deg);
                }
            }
        
        /* media query for pc */
        @media(min-width:800px){
            nav{
                width:30%;
            }
            nav > .child{
                width:100% !important;
                
            }
            main,footer{
                width:70%;
                margin-left:30%;
                max-width:70%;
            }
           
        }
    </style>

{{-- yield css --}}
     @yield('css')
     {{-- stack css --}}
     @stack('css')
</head>
<body x-on:vitecss:navigate.document="
if(!IsLarge){
ShowNav = false;

}
HeaderHeight = 0;
"  x-data="{ 
    ShowNav : false,
    HeaderHeight : 0,
    IsLarge : window.matchMedia('(min-width: 800px)').matches

 }">
 
    {{-- include general codes --}}
    @include('components.utilities',[
        'general_codes' => true
    ])
     {{-- include users only codes --}}
    @include('components.utilities',[
        'users_codes' => true
    ])
     {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    <header x-data="{ 
        HeaderLinks : false,
     }"  x-init="
 if(IsLarge){
    ShowNav=true;
    $nextTick(() => {
        HeaderHeight = $refs.NavHeader.offsetHeight
    });
   
 }
 ">

     {{-- logo and menu icon --}}
     <div class="row align-center g-10">
        {{-- menu icon --}}
           <div x-on:click="
           ShowNav = !ShowNav;
           $nextTick(() => {
            HeaderHeight = $refs.NavHeader.offsetHeight;
           });
           " class="menu-icon">
 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 4H21V6H3V4ZM3 11H15V13H3V11ZM3 18H21V20H3V18Z"></path></svg>
           </div>
        {{-- logo --}}
        <img onclick="window.location.href='{{ url('/') }}'" src="{{ asset(config('settings.logo')) }}" alt="Site Logo" class="h-40">
   
     </div>
    <i onclick="this.classList.add('rotate','no-pointer');Redirect('{{ url()->current().(count(request()->query())  > 0 ? '?'.http_build_query(request()->query()) : '') }}')" class="c-secondary refresh block m-right-auto m-left-20">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M5.46257 4.43262C7.21556 2.91688 9.5007 2 12 2C17.5228 2 22 6.47715 22 12C22 14.1361 21.3302 16.1158 20.1892 17.7406L17 12H20C20 7.58172 16.4183 4 12 4C9.84982 4 7.89777 4.84827 6.46023 6.22842L5.46257 4.43262ZM18.5374 19.5674C16.7844 21.0831 14.4993 22 12 22C6.47715 22 2 17.5228 2 12C2 9.86386 2.66979 7.88416 3.8108 6.25944L7 12H4C4 16.4183 7.58172 20 12 20C14.1502 20 16.1022 19.1517 17.5398 17.7716L18.5374 19.5674Z"></path></svg>
        </i>     

     {{-- user icon --}}
   <div x-on:click="HeaderLinks = !HeaderLinks" class="pc-pointer">
     @isset(Auth::guard('users')->user()->photo)
           <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" class="w-30 no-pointer h-30 no-shrink circle">
               @else
                <div class="w-30 h-30 no-shrink circle bg-primary column align-center justify-center primary-text">
    {{ $initials }}
            </div>
     @endisset
   </div>

    {{-- header links --}}
     <div style="display:flex !important;" x-transition.duration.500ms x-show="HeaderLinks" x-on:click.outside="
    HeaderLinks = false;
     " class="pos-absolute right-0 top-full bg br-10px border-style-solid border-width-1px border-color-rgt-02 column ">
       
        {{-- head --}}
        <div  class="w-full border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-02 p-10 row g-5">
             @isset(Auth::guard('users')->user()->photo)
           <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" class="w-40 no-pointer no-shrink h-40 circle">
               @else
                <div class="w-40 h-40 min-h-40 min-w-40 perfect-square no-shrink circle bg-primary column align-center justify-center primary-text">
    {{ $initials }}
            </div>
     @endisset
            <div class="column g-5">
                <strong style="max-width:25vw;" class="ws-nowrap text-overflow-ellipsis">{{ Auth::guard('users')->user()->name }}</strong>
                <div>{{ Auth::guard('users')->user()->username }}</div>
            </div>
        </div>
        {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/profile/settings') }}')" class="row pc-pointer no-select p-10 w-full g-10 align-center">
            <span>

                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>

            </span>
            <span>Profile Settings</span>
        </div>
        {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row pc-pointer no-select p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V9.99979H22.0049ZM22.0049 7.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V7.99979ZM15.0049 15.9998V17.9998H19.0049V15.9998H15.0049Z"></path></svg>

            </span>
            <span>Payout Settings</span>
        </div>
       
        {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/transaction/pin') }}')" class="row pc-pointer no-select p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598L12 1ZM16.4524 8.22183L11.5019 13.1709L8.67421 10.3431L7.25999 11.7574L11.5026 16L17.8666 9.63604L16.4524 8.22183Z"></path></svg>

            </span>
            <span>Transaction Pin</span>
        </div>
       
         {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/security/settings') }}')" class="row pc-pointer no-select p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16ZM11 14V16H13V14H11ZM7 14V16H9V14H7ZM15 14V16H17V14H15Z"></path></svg>
           </span>
            <span>Security Settings</span>
        </div>
        
         {{-- new header link --}}
        <div onclick="window.location.href='{{ url('users/logout') }}'" class="row pc-pointer no-select c-coral p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM17 16L22 12L17 8V11H9V13H17V16Z"></path></svg>

            </span>
            <span>Logout</span>
        </div>
     </div>
    </header>
    {{-- nav --}}
    <nav x-if="ShowNav && !IsLarge ? document.body.classList.add('overflow-hidden') : document.body.classList.remove('overflow-hidden')" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-on:click="ShowNav = false" x-show="ShowNav">
        {{-- nav child --}}
<div x-ref="Nav" x-show="ShowNav" x-transition:enter-start="left-enter" x-transition:enter-end="left-enter-end" x-transition:leave-start="left-leave" x-transition:leave-end="left-leave-end" x-on:click.stop="" class="child transition-all">
    {{-- nav child header --}}
<div x-ref="NavHeader" class="header">
<img src="{{ asset(config('settings.logo')) }}" alt="" class="no-pointer h-50 no-select">
</div>
{{-- nav child body --}}
<div x-init="
$watch('HeaderHeight', (value) => {
 if(value > 0){
       $el.style.marginTop = value + 'px';
    $el.style.height = $refs.Nav.offsetHeight - value + 'px';
 }
});

" class="body overflow-auto">
{{-- new link --}}
<div x-on:click="
// if(!IsLarge){
// ShowNav = false;
// HeaderHeight = 0;

// }
Vitecss.navigate('{{ url('users/dashboard') }}');
" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20Z"></path></svg>

    </span>
    <span>Dashboard</span>
</div>
@if (Auth::guard('users')->user()->type == 'vendor')
    {{-- new link --}}
<div onclick="Redirect('{{ url('users/vendors/dashboard') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20.7999 9H12V17H11V21.0001H5C4.44772 21.0001 4 20.5524 4 20.0001V11.0001L1 11.0001 11.3273 1.61162C11.7087 1.26488 12.2913 1.26488 12.6727 1.61162L20.7999 9ZM14 11H23V18H14V11ZM13 21H24V19H13V21Z"></path></svg>

    </span>
    <span>Vendors Dashboard</span>
</div>
@endif
{{-- new link --}}
<div onclick="Redirect('{{ url('users/transactions') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM8 7V9H16V7H8ZM8 11V13H16V11H8ZM8 15V17H13V15H8Z"></path></svg>

    </span>
    <span>Transactions</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/tasks') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>
    </span>
    <span>Daily Activities</span>
</div>

{{-- new link --}}
<div x-data="{ 
    'link' : '{{ url('users/google/to/earn') }}' 
    }" x-on:click="Redirect(link)" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.06364 7.50914C4.70909 4.24092 8.09084 2 12 2C14.6954 2 16.959 2.99095 18.6909 4.60455L15.8227 7.47274C14.7864 6.48185 13.4681 5.97727 12 5.97727C9.39542 5.97727 7.19084 7.73637 6.40455 10.1C6.2045 10.7 6.09086 11.3409 6.09086 12C6.09086 12.6591 6.2045 13.3 6.40455 13.9C7.19084 16.2636 9.39542 18.0227 12 18.0227C13.3454 18.0227 14.4909 17.6682 15.3864 17.0682C16.4454 16.3591 17.15 15.3 17.3818 14.05H12V10.1818H21.4181C21.5364 10.8363 21.6 11.5182 21.6 12.2273C21.6 15.2727 20.5091 17.8363 18.6181 19.5773C16.9636 21.1046 14.7 22 12 22C8.09084 22 4.70909 19.7591 3.06364 16.4909C2.38638 15.1409 2 13.6136 2 12C2 10.3864 2.38638 8.85911 3.06364 7.50914Z"></path></svg>
    </span>
    <span>Google to Earn</span>
</div>

{{-- new link --}}
<div x-data="{ 
    'link' : '{{ url('users/games') }}' 
    }" x-on:click="Redirect(link)" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17 4C20.3137 4 23 6.68629 23 10V14C23 17.3137 20.3137 20 17 20H7C3.68629 20 1 17.3137 1 14V10C1 6.68629 3.68629 4 7 4H17ZM10 9H8V11H6V13H7.999L8 15H10L9.999 13H12V11H10V9ZM18 13H16V15H18V13ZM16 9H14V11H16V9Z"></path></svg>
    </span>
    <span>Games</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/referrals') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>

    </span>
    <span>Referrals</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/withdraw') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 5H20V3H4V5ZM20 9H4V7H20V9ZM9 13H15V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11H9V13Z"></path></svg>

    </span>
    <span>Withdraw</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V9.99979H22.0049ZM22.0049 7.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V7.99979ZM15.0049 15.9998V17.9998H19.0049V15.9998H15.0049Z"></path></svg>
    </span>
    <span>Payout Settings</span>
</div>
{{-- new link --}}
<div onclick="Redirect('{{ url('users/profile/settings') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>
    </span>
    <span>Profile</span>
</div>




{{-- new link --}}
<div onclick="window.location.href='{{ url('users/logout') }}'" style="color:coral;" class="row m-top-auto link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z"></path></svg>
  </span>
    <span>Logout</span>
</div>




</div>

</div>
    </nav>
    <main>
        {{-- yield main --}}
        @yield('main')
    </main>
   
 {{-- footer --}}
 <footer class="footer pos-fixed bottom-0 z-index-1000 p-10 w-full">
<div class="glass row g-10 p-10 w-full br-1000">
   {{-- new link --}}
   <div onclick="document.querySelectorAll('footer > div > div').forEach((div)=>{div.classList.remove('active','animate__animated','animate__rubberBand');});this.classList.add('active','animate__animated','animate__rubberBand');Redirect('{{ url('users/dashboard') }}')" class="w-full @if(url()->current() == url('users/dashboard')) active @endif column align-center justify-center">
    <i>
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20Z"></path></svg>

    </i>
    <small>Home</small>
   </div>

    {{-- new link --}}
   <div onclick="document.querySelectorAll('footer > div > div').forEach((div)=>{div.classList.remove('active','animate__animated','animate__rubberBand');});this.classList.add('active','animate__animated','animate__rubberBand');Redirect('{{ url('users/tasks') }}')" class="w-full @if(url()->current() == url('users/tasks')) active @endif column align-center justify-center">
    <i>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>
    </i>
    <small>Activities</small>
   </div>
    {{-- new link --}}
   <div onclick="document.querySelectorAll('footer > div > div').forEach((div)=>{div.classList.remove('active','animate__animated','animate__rubberBand');});this.classList.add('active','animate__animated','animate__rubberBand');Redirect('{{ url('users/withdraw') }}')" class="w-full @if(url()->current() == url('users/withdraw')) active @endif column align-center justify-center">
    <i>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 5H20V3H4V5ZM20 9H4V7H20V9ZM9 13H15V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11H9V13Z"></path></svg>

    </i>
    <small>Withdraw</small>
   </div>
    {{-- new link --}}
   <div onclick="document.querySelectorAll('footer > div > div').forEach((div)=>{div.classList.remove('active','animate__animated','animate__rubberBand');});this.classList.add('active','animate__animated','animate__rubberBand');Redirect('{{ url('users/profile/settings') }}')" class="w-full @if(url()->current() == url('users/profile')) active @endif column align-center justify-center">
    <i>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>
    </i>
    <small>Profile</small>
   </div>
</div>
</footer>
  {{-- yield js --}}
    @yield('js')
    {{-- stack js --}}
    @stack('js')
</body>
</html>