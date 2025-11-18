<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png?v=1.2') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg?v=1.2') }}" />
<link rel="shortcut icon" href="{{ asset('favicon/favicon.ico?v=1.2') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png?v=1.2') }}" />
<meta name="apple-mobile-web-app-title" content="Finova" />
<meta name="description" content="{{ config('app.name') }} lets you earn daily income by purchasing products. Turn every purchase into a smart investment.">
  <meta name="keywords" content="earn daily income, buy to earn, investment products, passive income, product-based ROI, {{ config('app.name') }}, online earning, income from shopping">
<!-- Canonical URL -->
  <link rel="canonical" href="{{ url()->current() }}">
<!-- Open Graph / Facebook -->
  <meta property="og:title" content="Buy Products & Earn Daily | {{ config('app.name') }}">
  <meta property="og:description" content="Invest by buying products on {{ config('app.name') }} and earn daily income. Join a smarter way to grow your money.">
  <meta property="og:image" content="{{ asset('logo.png?v=1.1') }}"> <!-- Replace with actual image URL -->
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ config('app.name') }}">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Buy & Earn Daily | {{ config('app.name') }}">
  <meta name="twitter:description" content="Turn purchases into profits. Earn daily income by investing in products on {{ config('app.name') }}.">
  <meta name="twitter:image" content="{{ asset('logo.png?v=1.1') }}"> <!-- Replace with actual image URL -->
  <meta name="twitter:site" content=""> <!-- Optional -->


<link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />
<link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
<link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
<link rel="manifest" href="{{ asset('manifest.json') }}" class="">
<title>{{ config('app.name') }} | Users | @yield('title')</title>

    @yield('css')
    <style>
     footer *{
      transition:all 0.5s ease;
     }
      footer .nav.active{
       color:var(--primary);
       
      }

      footer .nav.active .svg{
       background:inherit !important;
        color:var(--primary);
      }
      @keyframes bounce{
        0%,100%{
          transform: translateY(0) scale(1);
        }
        50%{
          transform: translateY(-50%) scale(0.5)
        }
      }
      footer .nav{
        color:white;
      }
    </style>
</head>
<section class="pos-fixed loading column justify-center top-0 left-0 bottom-0 right-0 bg higher">
<svg fill="var(--primary)" height="100" width="100" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="RadialGradient8932"><stop offset="0%" stop-color="var(--primary)" stop-opacity="1"/><stop offset="100%" stop-color="var(--primary)" stop-opacity="0.25"/></linearGradient></defs><style>@keyframes spin8932 {
            to {
                transform: rotate(360deg);
            }
        }

        #circle8932 {
            transform-origin: 50% 50%;
            stroke: url(#RadialGradient8932);
            fill: none;
            animation: spin8932 .5s infinite linear;
            :

        }</style><circle cx="10" cy="10" r="8" id="circle8932" stroke-width="2"/></svg>
</section>
@include('components.skeletons')
<body class="column bg justify-center">
   <header class="pos-sticky average row align-center space-between no-select pc-x-padding stick-top w-full bg p-10">
      <img src="{{ asset('logo.png?v=1.1') }}" height="30" alt="">
   <div class="p-10 g-5 no-select row align-center border-1 border-color-primary clip-5 br-5">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.9235 11.7502C20.9032 11.75 20.8766 11.75 20.8333 11.75H18.2308C16.8074 11.75 15.75 12.8087 15.75 14C15.75 15.1913 16.8074 16.25 18.2308 16.25H20.8333C20.8766 16.25 20.9032 16.25 20.9235 16.2498C20.9427 16.2496 20.948 16.2492 20.948 16.2492C21.154 16.2367 21.2427 16.0976 21.2495 16.0139C21.2495 16.0139 21.2497 16.0077 21.2498 15.9986C21.25 15.9808 21.25 15.9572 21.25 15.9167V12.0833C21.25 12.0609 21.25 12.0437 21.25 12.0297C21.2499 12.0185 21.2499 12.0093 21.2498 12.0014C21.2497 11.9924 21.2495 11.9861 21.2495 11.9861C21.2427 11.9024 21.154 11.7633 20.9479 11.7508C20.9479 11.7508 20.943 11.7504 20.9235 11.7502ZM20.8499 10.25C20.9163 10.25 20.9803 10.2499 21.0391 10.2535C21.9104 10.3066 22.681 10.9638 22.7458 11.8818C22.7501 11.942 22.75 12.0069 22.75 12.067C22.75 12.0725 22.75 12.0779 22.75 12.0833V15.9167C22.75 15.9221 22.75 15.9275 22.75 15.933C22.75 15.9931 22.7501 16.058 22.7458 16.1182C22.681 17.0362 21.9104 17.6934 21.0391 17.7465C20.9803 17.7501 20.9163 17.75 20.8499 17.75C20.8444 17.75 20.8389 17.75 20.8333 17.75H18.2308C16.0856 17.75 14.25 16.1224 14.25 14C14.25 11.8776 16.0856 10.25 18.2308 10.25H20.8333C20.8389 10.25 20.8444 10.25 20.8499 10.25Z" fill="CurrentColor"></path>
<path d="M19 14C19 14.5523 18.5523 15 18 15C17.4477 15 17 14.5523 17 14C17 13.4477 17.4477 13 18 13C18.5523 13 19 13.4477 19 14Z" fill="#000000"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.8499 10.25C20.9163 10.25 20.9803 10.2499 21.0391 10.2535C21.2645 10.2672 21.4832 10.3214 21.6847 10.4101C21.5777 8.80363 21.2831 7.56563 20.3588 6.64124C19.6104 5.89288 18.6614 5.56076 17.489 5.40313L17.4467 5.39754C17.4362 5.38977 17.4255 5.38223 17.4145 5.37492L13.679 2.89806C12.3758 2.03398 10.6242 2.03398 9.32102 2.89806L5.58554 5.37492C5.57453 5.38223 5.56377 5.38977 5.55327 5.39754L5.51098 5.40313C4.33856 5.56076 3.38961 5.89288 2.64124 6.64124C1.89288 7.38961 1.56076 8.33856 1.40314 9.51098C1.24997 10.6502 1.24998 12.1058 1.25 13.9436V14.0564C1.24998 15.8942 1.24997 17.3498 1.40314 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588C3.38961 22.1071 4.33856 22.4392 5.51098 22.5969C6.65019 22.75 8.10583 22.75 9.94359 22.75H13.0564C14.8942 22.75 16.3498 22.75 17.489 22.5969C18.6614 22.4392 19.6104 22.1071 20.3588 21.3588C21.2831 20.4344 21.5777 19.1964 21.6847 17.5899C21.4832 17.6786 21.2645 17.7328 21.0391 17.7465C20.9803 17.7501 20.9163 17.75 20.8499 17.75L20.8333 17.75H20.1679C20.0541 19.0915 19.7966 19.7996 19.2981 20.2981C18.8749 20.7213 18.2952 20.975 17.2892 21.1102C16.2615 21.2484 14.9068 21.25 13 21.25H10C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14C2.75 12.0932 2.75159 10.7385 2.88976 9.71085C3.02502 8.70476 3.27869 8.12511 3.7019 7.7019C4.12511 7.27869 4.70476 7.02502 5.71085 6.88976C6.73851 6.75159 8.09318 6.75 10 6.75H13C14.9068 6.75 16.2615 6.75159 17.2892 6.88976C18.2952 7.02502 18.8749 7.27869 19.2981 7.7019C19.7966 8.20043 20.0541 8.90854 20.1679 10.25H20.8333L20.8499 10.25ZM9.94358 5.25H13.0564C13.5729 5.24999 14.0592 5.24999 14.5168 5.25339L12.8501 4.14821C12.0493 3.61726 10.9507 3.61726 10.15 4.14821L8.48318 5.25339C8.94077 5.24999 9.42708 5.24999 9.94358 5.25Z" fill="CurrentColor"></path>
<path d="M6 9.25C5.58579 9.25 5.25 9.58579 5.25 10C5.25 10.4142 5.58579 10.75 6 10.75H10C10.4142 10.75 10.75 10.4142 10.75 10C10.75 9.58579 10.4142 9.25 10 9.25H6Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M19 14C19 14.5523 18.5523 15 18 15C17.4477 15 17 14.5523 17 14C17 13.4477 17.4477 13 18 13C18.5523 13 19 13.4477 19 14Z" fill="CurrentColor"></path>
</svg>
<span class="header-balance">&#8358;{{ number_format(Auth::guard('users')->user()->deposit + Auth::guard('users')->user()->withdrawal,2) }}</span>

<span onclick="spa(event,'{{ url('users/wallet') }}')" class="c-primary">
  <svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.0574 1.25H11.9426C9.63424 1.24999 7.82519 1.24998 6.41371 1.43975C4.96897 1.63399 3.82895 2.03933 2.93414 2.93414C2.03933 3.82895 1.63399 4.96897 1.43975 6.41371C1.24998 7.82519 1.24999 9.63422 1.25 11.9426V12.0574C1.24999 14.3658 1.24998 16.1748 1.43975 17.5863C1.63399 19.031 2.03933 20.1711 2.93414 21.0659C3.82895 21.9607 4.96897 22.366 6.41371 22.5603C7.82519 22.75 9.63423 22.75 11.9426 22.75H12.0574C14.3658 22.75 16.1748 22.75 17.5863 22.5603C19.031 22.366 20.1711 21.9607 21.0659 21.0659C21.9607 20.1711 22.366 19.031 22.5603 17.5863C22.75 16.1748 22.75 14.3658 22.75 12.0574V11.9426C22.75 9.63423 22.75 7.82519 22.5603 6.41371C22.366 4.96897 21.9607 3.82895 21.0659 2.93414C20.1711 2.03933 19.031 1.63399 17.5863 1.43975C16.1748 1.24998 14.3658 1.24999 12.0574 1.25ZM3.9948 3.9948C4.56445 3.42514 5.33517 3.09825 6.61358 2.92637C7.91356 2.75159 9.62177 2.75 12 2.75C14.3782 2.75 16.0864 2.75159 17.3864 2.92637C18.6648 3.09825 19.4355 3.42514 20.0052 3.9948C20.5749 4.56445 20.9018 5.33517 21.0736 6.61358C21.2484 7.91356 21.25 9.62177 21.25 12C21.25 14.3782 21.2484 16.0864 21.0736 17.3864C20.9018 18.6648 20.5749 19.4355 20.0052 20.0052C19.4355 20.5749 18.6648 20.9018 17.3864 21.0736C16.0864 21.2484 14.3782 21.25 12 21.25C9.62177 21.25 7.91356 21.2484 6.61358 21.0736C5.33517 20.9018 4.56445 20.5749 3.9948 20.0052C3.42514 19.4355 3.09825 18.6648 2.92637 17.3864C2.75159 16.0864 2.75 14.3782 2.75 12C2.75 9.62177 2.75159 7.91356 2.92637 6.61358C3.09825 5.33517 3.42514 4.56445 3.9948 3.9948Z" fill="CurrentColor"></path>
</svg>
</span>

   </div>
  
   </header>
   <main class="flex-auto bg pc-x-padding w-full">
    <section class="popup" onclick="HidePopUp(MyFunc.PopUpHidden)">
      <div onclick="StopPropagation(event)" class="child">@yield('popup_child')</div>
    </section>
    <section class="slideup" onclick="HideSlideUp()">
      <div class="child" onclick="StopPropagation(event)">@yield('slideup_child')</div>
    </section>
     @yield('main')
   </main>
   <footer class="bg c-white pc-x-padding no-select w-full pos-fixed bottom-0 row space-between">
  

    
    <div onclick="spa(event,'{{ url('users/recharge') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
       <svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.4105 9.86058C20.3559 9.8571 20.2964 9.85712 20.2348 9.85715L20.2194 9.85715H17.8015C15.8086 9.85715 14.1033 11.4382 14.1033 13.5C14.1033 15.5618 15.8086 17.1429 17.8015 17.1429H20.2194L20.2348 17.1429C20.2964 17.1429 20.3559 17.1429 20.4105 17.1394C21.22 17.0879 21.9359 16.4495 21.9961 15.5577C22.0001 15.4992 22 15.4362 22 15.3778L22 15.3619V11.6381L22 11.6222C22 11.5638 22.0001 11.5008 21.9961 11.4423C21.9359 10.5506 21.22 9.91209 20.4105 9.86058ZM17.5872 14.4714C18.1002 14.4714 18.5162 14.0365 18.5162 13.5C18.5162 12.9635 18.1002 12.5286 17.5872 12.5286C17.0741 12.5286 16.6581 12.9635 16.6581 13.5C16.6581 14.0365 17.0741 14.4714 17.5872 14.4714Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.2341 18.6C20.3778 18.5963 20.4866 18.7304 20.4476 18.8699C20.2541 19.562 19.947 20.1518 19.4542 20.6485C18.7329 21.3755 17.8183 21.6981 16.6882 21.8512C15.5902 22 14.1872 22 12.4158 22H10.3794C8.60803 22 7.20501 22 6.10697 21.8512C4.97692 21.6981 4.06227 21.3755 3.34096 20.6485C2.61964 19.9215 2.29953 18.9997 2.1476 17.8608C1.99997 16.7541 1.99999 15.3401 2 13.5548V13.4452C1.99998 11.6599 1.99997 10.2459 2.1476 9.13924C2.29953 8.00031 2.61964 7.07848 3.34096 6.35149C4.06227 5.62451 4.97692 5.30188 6.10697 5.14876C7.205 4.99997 8.60802 4.99999 10.3794 5L12.4158 5C14.1872 4.99998 15.5902 4.99997 16.6882 5.14876C17.8183 5.30188 18.7329 5.62451 19.4542 6.35149C19.947 6.84817 20.2541 7.43804 20.4476 8.13012C20.4866 8.26959 20.3778 8.40376 20.2341 8.4L17.8015 8.40001C15.0673 8.40001 12.6575 10.5769 12.6575 13.5C12.6575 16.4231 15.0673 18.6 17.8015 18.6L20.2341 18.6ZM5.61446 8.88572C5.21522 8.88572 4.89157 9.21191 4.89157 9.61429C4.89157 10.0167 5.21522 10.3429 5.61446 10.3429H9.46988C9.86912 10.3429 10.1928 10.0167 10.1928 9.61429C10.1928 9.21191 9.86912 8.88572 9.46988 8.88572H5.61446Z" fill="CurrentColor"></path>
<path d="M7.77668 4.02439L9.73549 2.58126C10.7874 1.80625 12.2126 1.80625 13.2645 2.58126L15.2336 4.03197C14.4103 3.99995 13.4909 3.99998 12.4829 4H10.3123C9.39123 3.99998 8.5441 3.99996 7.77668 4.02439Z" fill="CurrentColor"></path>
</svg>


       </div>
        <span>Deposit</span>
    </div>
    <div onclick="spa(event,'{{ url('users/withdraw') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12ZM8 15.25C7.58579 15.25 7.25 15.5858 7.25 16C7.25 16.4142 7.58579 16.75 8 16.75H16C16.4142 16.75 16.75 16.4142 16.75 16C16.75 15.5858 16.4142 15.25 16 15.25H8ZM7.58579 6.58579C8.17157 6 9.11438 6 11 6H13C14.8856 6 15.8284 6 16.4142 6.58579C17 7.17157 17 8.11438 17 10V10.25H19C19.4142 10.25 19.75 10.5858 19.75 11C19.75 11.4142 19.4142 11.75 19 11.75H5C4.58579 11.75 4.25 11.4142 4.25 11C4.25 10.5858 4.58579 10.25 5 10.25H7V10C7 8.11438 7 7.17157 7.58579 6.58579Z" fill="CurrentColor"></path>
</svg>


       </div>
        <span>Withdraw</span>
    </div>
      <div onclick="spa(event,'{{ url('users/dashboard') }}')"  class="column pos-relative pc-pointer nav p-10 g-5 w-full align-center">
       <div style="position:absolute;top:0;transform:translate(-50%,-10%);left:50%;color:var(--primary-text);background:var(--primary);border:0.1px solid var(--primary)" class="svg dash-svg p-10 w-fit circle perfect-square align-center column w-full">
<svg width="30" height="30" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M2.33537 7.87495C1.79491 9.00229 1.98463 10.3208 2.36407 12.9579L2.64284 14.8952C3.13025 18.2827 3.37396 19.9764 4.54903 20.9882C5.72409 22 7.44737 22 10.8939 22H13.1061C16.5526 22 18.2759 22 19.451 20.9882C20.626 19.9764 20.8697 18.2827 21.3572 14.8952L21.6359 12.9579C22.0154 10.3208 22.2051 9.00229 21.6646 7.87495C21.1242 6.7476 19.9738 6.06234 17.6731 4.69181L16.2882 3.86687C14.199 2.62229 13.1543 2 12 2C10.8457 2 9.80104 2.62229 7.71175 3.86687L6.32691 4.69181C4.02619 6.06234 2.87583 6.7476 2.33537 7.87495ZM12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V15C11.25 14.5858 11.5858 14.25 12 14.25C12.4142 14.25 12.75 14.5858 12.75 15V18C12.75 18.4142 12.4142 18.75 12 18.75Z" fill="CurrentColor"></path>
</svg>




       </div>
      
    </div>
    <div onclick="spa(event,'{{ url('users/products') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
       <svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M4.97883 9.68508C2.99294 8.89073 2 8.49355 2 8C2 7.50645 2.99294 7.10927 4.97883 6.31492L7.7873 5.19153C9.77318 4.39718 10.7661 4 12 4C13.2339 4 14.2268 4.39718 16.2127 5.19153L19.0212 6.31492C21.0071 7.10927 22 7.50645 22 8C22 8.49355 21.0071 8.89073 19.0212 9.68508L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L4.97883 9.68508Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M2 8C2 8.49355 2.99294 8.89073 4.97883 9.68508L7.7873 10.8085C9.77318 11.6028 10.7661 12 12 12C13.2339 12 14.2268 11.6028 16.2127 10.8085L19.0212 9.68508C21.0071 8.89073 22 8.49355 22 8C22 7.50645 21.0071 7.10927 19.0212 6.31492L16.2127 5.19153C14.2268 4.39718 13.2339 4 12 4C10.7661 4 9.77318 4.39718 7.7873 5.19153L4.97883 6.31492C2.99294 7.10927 2 7.50645 2 8Z" fill="CurrentColor"></path>
<path d="M19.0212 13.6851L16.2127 14.8085C14.2268 15.6028 13.2339 16 12 16C10.7661 16 9.77318 15.6028 7.7873 14.8085L4.97883 13.6851C2.99294 12.8907 2 12.4935 2 12C2 11.5551 2.80681 11.1885 4.42043 10.5388L7.56143 11.7952C9.41007 12.535 10.572 13 12 13C13.428 13 14.5899 12.535 16.4386 11.7952L19.5796 10.5388C21.1932 11.1885 22 11.5551 22 12C22 12.4935 21.0071 12.8907 19.0212 13.6851Z" fill="CurrentColor"></path>
<path d="M19.0212 17.6849L16.2127 18.8083C14.2268 19.6026 13.2339 19.9998 12 19.9998C10.7661 19.9998 9.77318 19.6026 7.7873 18.8083L4.97883 17.6849C2.99294 16.8905 2 16.4934 2 15.9998C2 15.5549 2.80681 15.1883 4.42043 14.5386L7.56143 15.795C9.41007 16.5348 10.572 16.9998 12 16.9998C13.428 16.9998 14.5899 16.5348 16.4386 15.795L19.5796 14.5386C21.1932 15.1883 22 15.5549 22 15.9998C22 16.4934 21.0071 16.8905 19.0212 17.6849Z" fill="CurrentColor"></path>
</svg>

       </div>
        <span>Products</span>
    </div>
    
    <div onclick="spa(event,'{{ url('users/profile') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
       <svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" fill="CurrentColor"></circle>
<ellipse cx="12" cy="17" rx="7" ry="4" fill="CurrentColor"></ellipse>
</svg>

 </div> 
        <span>Profile</span>
    </div>
    
   </footer>
    
    <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    <script>
      window.onload=function(){
       try{
       
         setInterval(async function(){
          
          let response=await fetch('{{ url('users/get/total/balance') }}');
          if(response.ok){
            let data=await response.text();
           document.querySelector('.header-balance').innerHTML=`&#8358;${data}`;
          }
        },5000)
      
        // new
        let max_bottom=document.querySelector('footer').getBoundingClientRect().bottom;
       
       document.querySelector('main').style.paddingBottom=max_bottom - document.querySelector('.dash-svg').getBoundingClientRect().top + 'px';
      }catch(error){
        alert(error.stack)
       }
      }
    </script>
    @yield('js')
</body>
</html>