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


<link rel="manifest" href="{{ asset('manifest.json') }}" class="">
<meta name="apple-mobile-web-app-title" content="Finova" />
<link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />
<link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
<link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
    <title>{{ config('app.name') }} | Users | @yield('title')</title>
  
<style>
  body{

   /* background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='15' cy='15' r='0.8' fill='rgba(0,0,0,0.5)'/%3E%3C/svg%3E"); */
    background-color:black;
  }
  .cont:has(input:focus){
    border-color:var(--primary) !important;
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
<body class="column">
  
  <section class="w-full flex-auto pos-relative bg h-full column p-10">
    <div class="p-10 w-full bg-transparent row align-center space-between g-10">
     <img src="{{ asset('logo.png?v=1.1') }}" class="h-30 br-10" alt="">
     @yield('action')

  </div>
 @yield('main')
  </section>
   
    
    <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    @yield('js')
</body>
</html>