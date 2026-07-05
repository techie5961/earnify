<!DOCTYPE html>
<html lang="en">
<head>
    @yield('links')
    <link fetchpriority="high" rel="preload" as="image" href="{{ asset('banners/IMG_7562-compressed.jpeg') }}">
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
{{-- vite js --}}
 @include('components.utilities',[
    'vite_js' => true
  ])
  <script>

  window.addEventListener('load',()=>{
    document.body.style.paddingTop=document.querySelector('header').offsetHeight + 'px';
    // document.querySelector('nav').style.height=window.innerHeight + 'px';
  });
  </script>
{{-- yield css --}}
     @yield('css')
    <title>{{ config('app.name') }} || @yield('title') </title>
 <style>
    body{
        padding:0;
    }
    header{
       position:fixed;
       top:0;
       left:0;
       right:0;
       padding:20px;
       width:100%;
       display: flex;
       flex-direction: row;
       align-items:center;
       justify-content:space-between;
       z-index: 2000;
       backdrop-filter: blur(10px);
       -webkit-backdrop-filter: blur(10px);
    }
    .menu-icon{
        height:40px;
        width:40px;
        border-radius: 50%;
        background:var(--secondary);
        color:var(--secondary-text);
        flex-shrink: 0;
        display:flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap:10px;
        cursor:pointer;
    }
    footer{
        width:100%;
        border-top:1px solid var(--rgt-01);
        padding:20px;
        background:var(--bg);
        display:flex;
        flex-direction:column;
        gap:10px;
        text-align:center;
        align-items: center;
        justify-content: center;
        user-select: none;
        -webkit-user-select: none;
    }
    footer a{
        display:flex;
        flex-direction: column;
        gap:2px;

    }
    footer a::after{
        content:'';
        width:100%;
        height:1px;
        width:0;
        background:var(--rgt-10);
        display:flex;
        transition:all 0.5s ease;

    }
    footer a:hover::after{
        width:100%;
    }
    nav{
       position:fixed;
        inset: 0;
       background:transparent;
        display:flex;
        flex-direction: column;
        gap:10px;
        z-index:2000;
        display:none;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        overflow:hidden;
    }
    nav.active{
        display:flex;
    }
    body:has(nav.active){
        overflow: hidden;
    }
    nav .child{
        width:100%;
        height:100%;
        min-height:100%;
        max-height:100%;
        background: var(--bg);
        overflow:hidden;
        background-image: url('{{ asset('banners/IMG_7562-compressed.jpeg') }}');
        background-size:cover;
        background-position:center;
        position:relative;
        transform:translateX(-100%);
        transition:all 0.5s ease;
        max-width:500px;
        right:0;
        margin-left:auto;
    }
    nav .child{
    animation :trans-out 0.5s ease forwards;

    }
     @keyframes trans-out{
    0%{
        transform:translateX(0%);
    }
    100%{
        transform: translateX(100%);
    }
   }
   nav .child.active{
    animation :trans-in 0.5s ease forwards;
   }
   @keyframes trans-in{
    0%{
        transform:translateX(100%);
    }
    100%{
        transform: translateX(0);
    }
   }
    nav .child::before{
        content:'';
        position: absolute;
        inset: 0;
        z-index:200;
        background:rgba(0,0,0,0.5);

    }
    nav .child > section{
        position: relative;
        z-index:200;
        width:100%;
        display:flex;
        flex-direction: column;
        gap:10px;
        padding:20px;
        padding-top:0;
        overflow:auto;
        max-height: 100%;

    }
  
    nav .header{
        padding:20px 0 20px 0;
        display:flex;
        flex-direction: row;
        align-items:center;
        justify-content: space-between;
        gap:10px;
        border-bottom:1px solid rgb(var(--secondary-rgb),0.3);
        position:sticky;
        top:0;
        z-index:200;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        /* height:1000px; */
        
    }
    nav .links{
        cursor:pointer;
        user-select:none;
        -webkit-user-select:none;
        transition:padding 0.2s linear;

    }
    nav .links:hover{
        background:var(--rgt-01);
        padding-left:25px;
    }
    nav .links svg{
        height:20px;
        width:20px;
    }
    nav .links i{
       height:40px !important;
       width:40px !important;
    }
    .pc-nav{
        display:none;
    }
    @media(min-width:800px){
        header{
            padding:20px 7vw;
        }
     .menu-icon{
        display:none;

     }
     .pc-nav{
        display: flex;
        flex-direction: row;
        align-items: center;
        gap:10px;
        width:fit-content;
     }
        
       .pc-nav .links{
            width:fit-content;
            border-radius:1000px !important;
            padding:10px 20px;
            cursor: pointer;
        }
            .pc-nav .links:hover{
                background:var(--rgt-01)
            }
            .pc-nav .links i{
                height:fit-content !important;
                width:fit-content !important;
            }
           .pc-nav .links strong{
                font-size:1rem;
            }
       
    }
 </style>
</head>
<body>
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
    {{-- header --}}
    <header>
      <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-40">
      <div onclick="document.querySelector('nav').classList.add('active');document.querySelector('nav .child').classList.add('active');" class="menu-icon">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 4H21V6H3V4ZM9 11H21V13H9V11ZM3 18H21V20H3V18Z"></path></svg>

      </div>
       <div class="pc-nav">
             {{-- links --}}
            <div onclick="window.location.href='{{ url('/') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
               
                <strong class="desc font-weight-600">Home</strong>
            </div>
              {{-- links --}}
            <div onclick="window.location.href='{{ url('/terms') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
              
                <strong class="desc font-weight-600">Terms</strong>
            </div>
            {{-- links --}}
            <div onclick="window.location.href='{{ url('/privacy') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
               
                <strong class="desc font-weight-600">Privacy</strong>
            </div>
             {{-- links --}}
            <div onclick="window.location.href='{{ url('/vendors') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
              
                <strong class="desc font-weight-600">Influencers</strong>
            </div>
            {{-- links --}}
            <div onclick="window.location.href='{{ url('/earners/top') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
              
                <strong class="desc font-weight-600">Top Earners</strong>
            </div>
              {{-- links --}}
            <div onclick="window.location.href='{{ url('/coupon/checker') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
               
                <strong class="desc font-weight-600">Check Coupon</strong>
            </div> 
            
             {{-- links --}}
            <div onclick="window.location.href='{{ url('/login') }}'" style="background:var(--rgt-01);margin-top:auto;" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
                <i>
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M10 11V8L15 12L10 16V13H1V11H10ZM2.4578 15H4.58152C5.76829 17.9318 8.64262 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.64262 4 5.76829 6.06817 4.58152 9H2.4578C3.73207 4.94289 7.52236 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C7.52236 22 3.73207 19.0571 2.4578 15Z"></path></svg>

                </i>
                <strong class="desc font-weight-600">Login</strong>
            </div>
           </div>
    </header>
     {{-- nav --}}
    <nav>
    <section class="child">
        <section style="min-height:100%;">
            <div class="header">
                 <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-40">
      <div onclick="document.querySelector('nav .child').classList.remove('active');setTimeout(()=>{ document.querySelector('nav').classList.remove('active'); },400)" class="menu-icon">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

      </div>
            </div>
           <div style="flex:1 0 auto;" class="column nav w-full">
             {{-- links --}}
            <div onclick="window.location.href='{{ url('/') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
                <i class="h-30 w-30 circle no-shrink column align-center justify-center" style="background:var(--rgt-01)">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M13 19H19V9.97815L12 4.53371L5 9.97815V19H11V13H13V19ZM21 20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V9.48907C3 9.18048 3.14247 8.88917 3.38606 8.69972L11.3861 2.47749C11.7472 2.19663 12.2528 2.19663 12.6139 2.47749L20.6139 8.69972C20.8575 8.88917 21 9.18048 21 9.48907V20Z"></path></svg>

                </i>
                <strong class="desc font-weight-900">Home</strong>
            </div>
              {{-- links --}}
            <div onclick="window.location.href='{{ url('/terms') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
                <i class="h-30 w-30 circle no-shrink column align-center justify-center" style="background:var(--rgt-01)">
                 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M21 15L15 20.996L4.00221 21C3.4487 21 3 20.5551 3 20.0066V3.9934C3 3.44476 3.44495 3 3.9934 3H20.0066C20.5552 3 21 3.45576 21 4.00247V15ZM19 5H5V19H13V14C13 13.4872 13.386 13.0645 13.8834 13.0067L14 13L19 12.999V5ZM18.171 14.999L15 15V18.169L18.171 14.999Z"></path></svg>

                </i>
                <strong class="desc font-weight-900">Terms of Service</strong>
            </div>
            {{-- links --}}
            <div onclick="window.location.href='{{ url('/privacy') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
                <i class="h-30 w-30 circle no-shrink column align-center justify-center" style="background:var(--rgt-01)">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M9 4L6 2L3 4V19C3 20.6569 4.34315 22 6 22H20C21.6569 22 23 20.6569 23 19V16H21V4L18 2L15 4L12 2L9 4ZM19 16H7V19C7 19.5523 6.55228 20 6 20C5.44772 20 5 19.5523 5 19V5.07037L6 4.4037L9 6.4037L12 4.4037L15 6.4037L18 4.4037L19 5.07037V16ZM20 20H8.82929C8.93985 19.6872 9 19.3506 9 19V18H21V19C21 19.5523 20.5523 20 20 20Z"></path></svg>
                   
                </i>
                <strong class="desc font-weight-900">Privacy Policy</strong>
            </div>
             {{-- links --}}
            <div onclick="window.location.href='{{ url('/vendors') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
                <i class="h-30 w-30 circle no-shrink column align-center justify-center" style="background:var(--rgt-01)">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M21 13.2422V20H22V22H2V20H3V13.2422C1.79401 12.435 1 11.0602 1 9.5C1 8.67286 1.22443 7.87621 1.63322 7.19746L4.3453 2.5C4.52393 2.1906 4.85406 2 5.21132 2H18.7887C19.1459 2 19.4761 2.1906 19.6547 2.5L22.3575 7.18172C22.7756 7.87621 23 8.67286 23 9.5C23 11.0602 22.206 12.435 21 13.2422ZM19 13.9725C18.8358 13.9907 18.669 14 18.5 14C17.2409 14 16.0789 13.478 15.25 12.6132C14.4211 13.478 13.2591 14 12 14C10.7409 14 9.5789 13.478 8.75 12.6132C7.9211 13.478 6.75911 14 5.5 14C5.331 14 5.16417 13.9907 5 13.9725V20H19V13.9725ZM5.78865 4L3.35598 8.21321C3.12409 8.59843 3 9.0389 3 9.5C3 10.8807 4.11929 12 5.5 12C6.53096 12 7.44467 11.3703 7.82179 10.4295C8.1574 9.59223 9.3426 9.59223 9.67821 10.4295C10.0553 11.3703 10.969 12 12 12C13.031 12 13.9447 11.3703 14.3218 10.4295C14.6574 9.59223 15.8426 9.59223 16.1782 10.4295C16.5553 11.3703 17.469 12 18.5 12C19.8807 12 21 10.8807 21 9.5C21 9.0389 20.8759 8.59843 20.6347 8.19746L18.2113 4H5.78865Z"></path></svg>

                </i>
                <strong class="desc font-weight-900">Influencers</strong>
            </div>
            {{-- links --}}
            <div onclick="window.location.href='{{ url('/earners/top') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
                <i class="h-30 w-30 circle no-shrink column align-center justify-center" style="background:var(--rgt-01)">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M13.0049 16.9409V19.0027H18.0049V21.0027H6.00488V19.0027H11.0049V16.9409C7.05857 16.4488 4.00488 13.0824 4.00488 9.00275V3.00275H20.0049V9.00275C20.0049 13.0824 16.9512 16.4488 13.0049 16.9409ZM6.00488 5.00275V9.00275C6.00488 12.3165 8.69117 15.0027 12.0049 15.0027C15.3186 15.0027 18.0049 12.3165 18.0049 9.00275V5.00275H6.00488ZM1.00488 5.00275H3.00488V9.00275H1.00488V5.00275ZM21.0049 5.00275H23.0049V9.00275H21.0049V5.00275Z"></path></svg>

                </i>
                <strong class="desc font-weight-900">Top Earners</strong>
            </div>
              {{-- links --}}
            <div onclick="window.location.href='{{ url('/coupon/checker') }}'" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
                <i class="h-30 w-30 circle no-shrink column align-center justify-center" style="background:var(--rgt-01)">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M2.00488 3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979ZM8.09024 18.9998C8.29615 18.4172 8.85177 17.9998 9.50488 17.9998C10.158 17.9998 10.7136 18.4172 10.9195 18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H10.9195C10.7136 5.58238 10.158 5.99979 9.50488 5.99979C8.85177 5.99979 8.29615 5.58238 8.09024 4.99979H4.00488V18.9998H8.09024ZM9.50488 10.9998C8.67646 10.9998 8.00488 10.3282 8.00488 9.49979C8.00488 8.67136 8.67646 7.99979 9.50488 7.99979C10.3333 7.99979 11.0049 8.67136 11.0049 9.49979C11.0049 10.3282 10.3333 10.9998 9.50488 10.9998ZM9.50488 15.9998C8.67646 15.9998 8.00488 15.3282 8.00488 14.4998C8.00488 13.6714 8.67646 12.9998 9.50488 12.9998C10.3333 12.9998 11.0049 13.6714 11.0049 14.4998C11.0049 15.3282 10.3333 15.9998 9.50488 15.9998Z"></path></svg>

                </i>
                <strong class="desc font-weight-900">Check Coupon Code</strong>
            </div> 
            
             {{-- links --}}
             <span class="h-10"></span>
            <div onclick="window.location.href='{{ url('/login') }}'" style="background:var(--rgt-01);margin-top:auto;" class="w-full links p-15 br-10 overflow-hidden row align-center g-10">
                <i class="h-30 w-30 circle no-shrink column align-center justify-center" style="background:var(--rgt-01)">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M10 11V8L15 12L10 16V13H1V11H10ZM2.4578 15H4.58152C5.76829 17.9318 8.64262 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.64262 4 5.76829 6.06817 4.58152 9H2.4578C3.73207 4.94289 7.52236 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C7.52236 22 3.73207 19.0571 2.4578 15Z"></path></svg>

                </i>
                <strong class="desc font-weight-900">Login</strong>
            </div>
           </div>
        </section>
    </section>
    </nav>
   
   
    <main>
       
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer>
      <img style="filter:brightness(100)" src="{{ asset(config('settings.logo')) }}" alt="" class="h-30 no-pointer">
  <span>EARNIFY — MONETIZE YOUR DAILY ACTIVITIES</span>
  <div class="row align-center justify-center g-10 w-full opacity-05">
    <a class="no-u c-text" onclick="setTimeout(()=>{window.location.href='{{ url('privacy') }}'},500)">Privacy Policy</a> <span>&bull;</span>
    <a class="no-u c-text" onclick="setTimeout(()=>{window.location.href='{{ url('terms') }}'},500)">Terms of Service</a>
  </div>
  <span class="opacity-07">&copy; {{ date('Y') }} {{ config('app.name') }} &mdash; All Rights Reserved </span>
    </footer>
 
  {{-- yield js --}}
    @yield('js')
    {{-- stack js --}}
    @stack('js')
</body>
</html>