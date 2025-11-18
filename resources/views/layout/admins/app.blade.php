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
<link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />
<link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
<link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
    <title>{{ config('app.name') }} | Admins | @yield('title')</title>

    @yield('css')
    <style>
      :root{
        --bg:whitesmoke;
        --bg-light:white;
        --text:black;
        --primary:rgb(108,92,230);
        --primary-text:white;
        --primary-transparent:rgba(108,92,230,0.5);
      }
      nav{
        position:fixed;
        top:0;
        left:0;
        bottom:0;
        width:100%;
        z-index:var(--z-index-high);
        background:rgba(0,0,0,0.5);
        display:none;
      }
      nav .child{
        width:70%;
        background:var(--bg);
        height:100%;
        transform:translateX(-100%)
        
        
      }
      nav .child .profile{
        background-color: #ee5522;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='100' y1='33' x2='100' y2='-3'%3E%3Cstop offset='0' stop-color='%23000' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23000' stop-opacity='1'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='100' y1='135' x2='100' y2='97'%3E%3Cstop offset='0' stop-color='%23000' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23000' stop-opacity='1'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill='%23d23d09' fill-opacity='0.6'%3E%3Crect x='100' width='100' height='100'/%3E%3Crect y='100' width='100' height='100'/%3E%3C/g%3E%3Cg fill-opacity='0.5'%3E%3Cpolygon fill='url(%23a)' points='100 30 0 0 200 0'/%3E%3Cpolygon fill='url(%23b)' points='100 100 0 130 0 100 200 100 200 130'/%3E%3C/g%3E%3C/svg%3E");
      }
     nav .group .sub-group{
        display:none
      }
      nav .group.active .sub-group{
        display:flex;
      }
      nav .group.active .title svg:nth-of-type(2){
        transform: rotate(90deg)
      }
      nav.active{
        display:flex;
      }
      nav.active .child{
        animation:trans-in-from-left 0.5s linear forwards;
      }
      @media(min-width:800px){
        nav{
          display:flex;
          width:30%;
        }
        nav .child{
          width:100%;
            transform:translateX(0);
            border-right:0.1px solid var(--primary);
        }
        main,header,footer{
          max-width:calc(100% - 30%);
          margin-left:30%;
        }
      }
    </style>
     <style>
    .notification-icon {
      position: relative;
      display: inline-block;
      width: 25px;
      height: 25px;
    
    }
    
    .bell-icon {
      width: 100%;
      height: 100%;
    }
    
    .notification-badge {
      position: absolute;
      top: -2px;
      right: -2px;
      min-width: 13px;
      height: 13px;
      padding:0 3px;
      background-color: #fa3e3e;
      border-radius: 8px;
      color: white;
    
      font-size: 7px;
      font-weight: bold;
      line-height: 16px;
      text-align: center;
      box-shadow: 0 0 0 1.5px white;
      transition: transform 0.2s ease;
     
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
<body class="column bg justify-center">
   <header class="pos-sticky row align-center high space-between no-select pc-x-padding stick-top w-full bg border-bottom-thin p-10">
    <div onclick="ToggleNav()" class="p-10 pc-display-none perfect-square">&#9777;</div>
    <strong>@yield('title')</strong>
    
<div class="row align-center g-5">
  <div onclick="window.location.href='{{ url('admins/notifications') }}'" class="notification-icon">
    <!-- Bell icon -->
    <svg class="bell-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
      <path d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216Z"/>
    </svg>
    {!! NotifyAmount() !!}
  </div>
    <img src="{{ asset('logo.png?v=1.1') }}" height="30" alt="">
     
</div>
   </header>
  
   <main class="flex-auto column bg w-full">
     <nav onclick="HideNav()">
    <section onclick="StopPropagation(event)" class="bg overflow-auto column no-select child">
 <div class="profile pos sticky stick-top w-full p-10 column g-10">
    
      <img src="{{ asset('images/avatar.jpeg') }}" height="50" width="50" class="clip-circle" alt="">
      <strong class="desc c-white">{{ ucfirst(Auth::guard('admins')->user()->tag) }}</strong>
  
 </div>
 {{-- NEW NAV --}}
 <a href="{{ url('admins/dashboard') }}" class="row no-u c align-center pointer g-10 space-between p-10">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M240,192h-8V98.67a16,16,0,0,0-7.12-13.31l-88-58.67a16,16,0,0,0-17.75,0l-88,58.67A16,16,0,0,0,24,98.67V192H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM136,128h56v24H136Zm-16,24H64V128h56ZM64,168h56v24H64Zm72,0h56v24H136Z"></path></svg>
  <span class="m-right-auto">Dashboard</span>
  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </a>
 {{-- NEW NAV --}}
 <div class="column group">
  <div onclick="ToggleNavGroup(this)" class="row title align-center g-10 space-between p-10">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M64.12,147.8a4,4,0,0,1-4,4.2H16a8,8,0,0,1-7.8-6.17,8.35,8.35,0,0,1,1.62-6.93A67.79,67.79,0,0,1,37,117.51a40,40,0,1,1,66.46-35.8,3.94,3.94,0,0,1-2.27,4.18A64.08,64.08,0,0,0,64,144C64,145.28,64,146.54,64.12,147.8Zm182-8.91A67.76,67.76,0,0,0,219,117.51a40,40,0,1,0-66.46-35.8,3.94,3.94,0,0,0,2.27,4.18A64.08,64.08,0,0,1,192,144c0,1.28,0,2.54-.12,3.8a4,4,0,0,0,4,4.2H240a8,8,0,0,0,7.8-6.17A8.33,8.33,0,0,0,246.17,138.89Zm-89,43.18a48,48,0,1,0-58.37,0A72.13,72.13,0,0,0,65.07,212,8,8,0,0,0,72,224H184a8,8,0,0,0,6.93-12A72.15,72.15,0,0,0,157.19,182.07Z"></path></svg>
   <span class="m-right-auto">Users</span>
  <svg class="transition-linear-half" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </div>
 <div class="sub-group border-left-4 m-left-10 border-color-primary column">
  <a href="{{ url('admins/users/all') }}" class="p-10 no-u c pointer">All Users</a>
  <a href="{{ url('admins/users/active') }}" class="p-10 no-u c pointer">Active Users</a>
  <a href="{{ url('admins/users/banned') }}" class="p-10 no-u c pointer">Banned Users</a>
  <a href="{{ url('admins/promoters') }}" class="p-10 no-u c pointer">Promoters</a>
 </div>
 </div>
  {{-- NEW NAV --}}
 <div class="column group">
  <div onclick="ToggleNavGroup(this)" class="row title align-center g-10 space-between p-10">
 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80v28a4,4,0,0,0,4,4H64V96.27A8.17,8.17,0,0,1,71.47,88,8,8,0,0,1,80,96v16h96V96.27A8.17,8.17,0,0,1,183.47,88,8,8,0,0,1,192,96v16h44a4,4,0,0,0,4-4V80A16,16,0,0,0,224,64Zm-64,0H96V56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Zm80,68v60a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V132a4,4,0,0,1,4-4H64v16a8,8,0,0,0,8.53,8A8.17,8.17,0,0,0,80,143.73V128h96v16a8,8,0,0,0,8.53,8,8.17,8.17,0,0,0,7.47-8.25V128h44A4,4,0,0,1,240,132Z"></path></svg>
  <span class="m-right-auto">Products</span>
  <svg class="transition-linear-half" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </div>
 <div class="sub-group border-left-4 m-left-10 border-color-primary column">
  <a href="{{ url('admins/products/add') }}" class="p-10  no-u c pointer">Add New</a>
  <a href="{{ url('admins/products/manage') }}" class="p-10  no-u c pointer">Manage All</a>
  <a href="{{ url('admins/products/purchased') }}" class="p-10 no-u c pointer">Purchased Products</a>
 </div>
 </div>
 {{-- NEW NAV --}}
 <a href="{{ url('admins/transactions') }}" class="row no-u c align-center pointer g-10 space-between p-10">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M240,56v64a8,8,0,0,1-13.66,5.66L200,99.31l-58.34,58.35a8,8,0,0,1-11.32,0L96,123.31,29.66,189.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0L136,140.69,188.69,88,162.34,61.66A8,8,0,0,1,168,48h64A8,8,0,0,1,240,56Z"></path></svg>
   <span class="m-right-auto">Transaction History</span>
  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </a>
  {{-- NEW NAV --}}
 <div class="column group">
  <div onclick="ToggleNavGroup(this)" class="row title align-center g-10 space-between p-10">
 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38c-.38-.66-.73-1.33-1.05-2H56a8,8,0,0,1-8-8V96A16,16,0,0,1,64,80h48v48a8,8,0,0,0,16,0V80h48a16,16,0,0,1,16,16v27.62A90.89,90.89,0,0,1,232,198.65ZM128,35.31l18.34,18.35a8,8,0,0,0,11.32-11.32l-32-32a8,8,0,0,0-11.32,0l-32,32A8,8,0,0,0,93.66,53.66L112,35.31V80h16Z"></path></svg>
  <span class="m-right-auto">Deposits</span>
  <svg class="transition-linear-half" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </div>
 <div class="sub-group border-left-4 m-left-10 border-color-primary column">
  <a href="{{ url('admins/deposits/pending') }}" class="p-10 no-u c pointer">Pending Deposits</a>
  <a href="{{ url('admins/deposits/success') }}" class="p-10 no-u c pointer">Successfull Deposits</a>
  <a href="{{ url('admins/deposits/rejected') }}" class="p-10 no-u c pointer">Rejected Deposits</a>
 </div>
 </div>
 {{-- NEW NAV --}}
 <div class="column group">
  <div onclick="ToggleNavGroup(this)" class="row title align-center g-10 space-between p-10">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>
 <span class="m-right-auto">Withdrawals</span>
  <svg class="transition-linear-half" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </div>
 <div class="sub-group border-left-4 m-left-10 border-color-primary column">
  <a href="{{ url('admins/withdrawals/pending') }}" class="p-10 no-u c pointer">Pending Withdrawals</a>
  <a href="{{ url('admins/withdrawals/success') }}" class="p-10 no-u c pointer">Successfull Withdrawals</a>
  <a href="{{ url('admins/withdrawals/rejected') }}" class="p-10 no-u c pointer">Rejected Withdrawals</a>
 </div>
 </div>
 {{-- NEW NAV --}}
 <a href="{{ url('admins/notifications') }}" class="row no-u c align-center pointer g-10 space-between p-10">
 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M168,224a8,8,0,0,1-8,8H96a8,8,0,1,1,0-16h64A8,8,0,0,1,168,224Zm53.81-48.06C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H208a16,16,0,0,0,13.8-24.06Z"></path></svg>
    <span class="m-right-auto">Notifications</span>
  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </a>
 {{-- NEW NAV --}}
 <a href="{{ url('admins/logs') }}" class="row no-u c align-center pointer g-10 space-between p-10">
 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M141.66,133.66l-40,40A8,8,0,0,1,88,168V136H24a8,8,0,0,1,0-16H88V88a8,8,0,0,1,13.66-5.66l40,40A8,8,0,0,1,141.66,133.66ZM200,32H136a8,8,0,0,0,0,16h56V208H136a8,8,0,0,0,0,16h64a8,8,0,0,0,8-8V40A8,8,0,0,0,200,32Z"></path></svg>
   <span class="m-right-auto">System Logs</span>
  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </a>
 {{-- NEW NAV --}}
 <a href="{{ url('admins/site/settings') }}" class="row no-u c align-center pointer g-10 space-between p-10">
 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M237.94,107.21a8,8,0,0,0-3.89-5.4l-29.83-17-.12-33.62a8,8,0,0,0-2.83-6.08,111.91,111.91,0,0,0-36.72-20.67,8,8,0,0,0-6.46.59L128,41.85,97.88,25a8,8,0,0,0-6.47-.6A111.92,111.92,0,0,0,54.73,45.15a8,8,0,0,0-2.83,6.07l-.15,33.65-29.83,17a8,8,0,0,0-3.89,5.4,106.47,106.47,0,0,0,0,41.56,8,8,0,0,0,3.89,5.4l29.83,17,.12,33.63a8,8,0,0,0,2.83,6.08,111.91,111.91,0,0,0,36.72,20.67,8,8,0,0,0,6.46-.59L128,214.15,158.12,231a7.91,7.91,0,0,0,3.9,1,8.09,8.09,0,0,0,2.57-.42,112.1,112.1,0,0,0,36.68-20.73,8,8,0,0,0,2.83-6.07l.15-33.65,29.83-17a8,8,0,0,0,3.89-5.4A106.47,106.47,0,0,0,237.94,107.21ZM128,168a40,40,0,1,1,40-40A40,40,0,0,1,128,168Z"></path></svg>
   <span class="m-right-auto">Site Settings</span>
  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </a>



 {{-- NEW NAV --}}
 <a href="{{ url('admins/logout') }}" class="row no-u c  m-top-auto bg-inherit stick-bottom pos-sticky align-center pointer g-10 space-between p-10">
 
 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M116,128V48a12,12,0,0,1,24,0v80a12,12,0,0,1-24,0Zm66.55-82a12,12,0,0,0-13.1,20.1C191.41,80.37,204,103,204,128a76,76,0,0,1-152,0c0-25,12.59-47.63,34.55-61.95A12,12,0,0,0,73.45,46C44.56,64.78,28,94.69,28,128a100,100,0,0,0,200,0C228,94.69,211.44,64.78,182.55,46Z"></path></svg>
  <span class="m-right-auto">Logout</span>
  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
 </a>
    </section>
   </nav>


     @yield('main')

     <section onclick="HidePopUp()" class="popup">
      <div onclick="StopPropagation(event)" class="child">
        @yield('popup_child')
      </div>
     </section>
   </main>
   <footer class="bg-primary c-white column justify-center text-center p-10 w-full">
    <span>&copy; 2025 {{ config('app.name') }} Admin Dashboard</span>
   <span>Built and Designed By <a href="https://wa.me/+2349013350351">Techie Innovations</a></span>
   </footer>
    
    <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    @yield('js')
</body>
</html>