@extends('layout.users.app')
@section('title')
    API Token
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- new --}}
        <div style="border:1px solid var(--primary);padding:30px 20px;background:radial-gradient(circle at 0% 0%,var(--primary-04),var(--bg))" class="w-full max-w-500 m-x-auto column text-center g-10 p-20 br-15">
          <div style="background:var(--primary-01)" class="h-50 m-x-auto w-50 circle column align-center justify-center c-primary">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M17 14H12.6586C11.8349 16.3304 9.61244 18 7 18C3.68629 18 1 15.3137 1 12C1 8.68629 3.68629 6 7 6C9.61244 6 11.8349 7.66962 12.6586 10H23V14H21V18H17V14ZM7 14C8.10457 14 9 13.1046 9 12C9 10.8954 8.10457 10 7 10C5.89543 10 5 10.8954 5 12C5 13.1046 5.89543 14 7 14Z"></path></svg>

          </div>
          @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') == '')
             <strong class="title">API Token Required</strong>
            <span class="opacity-07">You need an active API Token to connect your account to the payment processor and enable withdrawals.</span>
          @else
           <strong class="title">API Token Status</strong>
           @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') == 'pending')
             <div style="background:orange;color:black" class="w-fit p-5 m-x-auto no-select p-x-10">Pending</div>  
           @endif
            @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') == 'rejected')
             <div style="background:red;color:white" class="w-fit p-5 m-x-auto no-select p-x-10">Rejected</div>  
           @endif
             @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') == 'active')
           <span class="font-1">{{ (json_decode(Auth::guard('users')->user()->api_token ?? '{}')->token ?? '') }}</span>
             <div style="background:greenyellow;color:black" class="w-fit p-5 m-x-auto no-select p-x-10">Active</div>  
           @endif
          @endif
              </div>
        @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') != 'active')
              {{-- new --}}
        <div style="border:1px solid orange;background:rgba(255, 165, 0,0.1);color:orange;" class="row g-10 w-full p-15 br-10">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 9.5C12.8284 9.5 13.5 8.82843 13.5 8C13.5 7.17157 12.8284 6.5 12 6.5C11.1716 6.5 10.5 7.17157 10.5 8C10.5 8.82843 11.1716 9.5 12 9.5ZM14 15H13V10.5H10V12.5H11V15H10V17H14V15Z"></path></svg>

            <span>You need an active API Token to process withdrawals.</span>
        </div>
        @endif
      
        {{-- new --}}
        <div style="border:1px solid var(--rgt-01)" class="column bg-light w-full g-10 br-15 p-15">
            {{-- new row --}}
            <div class="row w-fit g-5">
                <i class="c-primary">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M17 14H12.6586C11.8349 16.3304 9.61244 18 7 18C3.68629 18 1 15.3137 1 12C1 8.68629 3.68629 6 7 6C9.61244 6 11.8349 7.66962 12.6586 10H23V14H21V18H17V14ZM7 14C8.10457 14 9 13.1046 9 12C9 10.8954 8.10457 10 7 10C5.89543 10 5 10.8954 5 12C5 13.1046 5.89543 14 7 14Z"></path></svg>
                </i>
                <strong class="desc c-primary">
                    What is API Token?
                </strong>
            </div>
            <span class="opacity-07">API Token is a 17-digits secure token used to: </span>
            {{-- new row --}}
            <div style="border:1px solid var(--rgt-01);background:var(--rgt-002)" class="w-full br-10 row g-10 p-15">
                {{-- new --}}
                <div style="background:var(--primary-01)" class="h-40 w-40 circle column align-center justify-center c-primary no-shrink">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C14.7405 2 17.1131 3.5748 18.2624 5.86882L16.4731 6.76344C15.6522 5.12486 13.9575 4 12 4C9.23858 4 7 6.23858 7 9V10ZM5 12V20H19V12H5ZM10 15H14V17H10V15Z"></path></svg>

                </div>
                {{-- new column --}}
                <div class="column g-5">
                    <strong class="font-1">Unlock Withdrawals</strong>
                    <span class="opacity-07">Connect to payment gateway securely.</span>
                </div>
            </div>
            {{-- new row --}}
            <div style="border:1px solid var(--rgt-01);background:var(--rgt-002)" class="w-full br-10 row g-10 p-15">
                {{-- new --}}
                <div style="background:var(--primary-01)" class="h-40 w-40 circle column align-center justify-center c-primary no-shrink">
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13 9H21L11 24V15H4L13 0V9ZM11 11V7.22063L7.53238 13H13V17.3944L17.263 11H11Z"></path></svg>

                </div>
                {{-- new column --}}
                <div class="column g-5">
                    <strong class="font-1">Instant Processing</strong>
                    <span class="opacity-07">Token allows automated payouts.</span>
                </div>
            </div>
             {{-- new row --}}
            <div style="border:1px solid var(--rgt-01);background:var(--rgt-002)" class="w-full br-10 row g-10 p-15">
                {{-- new --}}
                <div style="background:var(--primary-01)" class="h-40 w-40 circle column align-center justify-center c-primary no-shrink">
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13 9H21L11 24V15H4L13 0V9ZM11 11V7.22063L7.53238 13H13V17.3944L17.263 11H11Z"></path></svg>
                  
                </div>
                {{-- new column --}}
                <div class="column g-5">
                    <strong class="font-1">Secure Transaction</strong>
                    <span class="opacity-07">Verified token for safe transfers.</span>
                </div>
            </div>
        </div>
        @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? 'rejected') != 'pending' && (json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') != 'active' )
            {{-- new --}}
        <div style="border:1px solid orange;background:rgba(255, 165, 0,0.1);color:orange;" class="column g-10 w-full p-15 br-10">
          {{-- new row --}}
          <div class="row align-center g-5">
            <i>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12 2 6.47715 6.47715 2 12 2 17.5228 2 22 6.47715 22 12 22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12 20 7.58172 16.4183 4 12 4 7.58172 4 4 7.58172 4 12 4 16.4183 7.58172 20 12 20ZM13 10.5V15H14V17H10V15H11V12.5H10V10.5H13ZM13.5 8C13.5 8.82843 12.8284 9.5 12 9.5 11.1716 9.5 10.5 8.82843 10.5 8 10.5 7.17157 11.1716 6.5 12 6.5 12.8284 6.5 13.5 7.17157 13.5 8Z"></path></svg>

            </i>
            <strong class="font-1">Payment Instructions</strong>
          </div>
          {{-- new --}}
             <div>1. Pay exactly {{ $currency.number_format($settings->upgrade->fee,2) }} to the account below to generate your token.</div>
          {{-- new --}}
             <div>2. Upload clear screenshot of the receipt.</div>
             {{-- new --}}
             <div>3. Submit & wait for few minutes, your API Token would be generated and withdrawals would be accessible.</div>
          {{-- new --}}
             <div>4. Uploading invalid proof might lead to account suspension.</div>
        </div> 
        
        {{-- new --}}
        <div style="border:1px solid var(--rgt-01)" class="column bg-light w-full g-10 br-15 p-15">
             {{-- new row --}}
            <div class="row w-fit g-5">
                <i class="c-primary">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM4 8.23607V9H20V8.23607L12 4.23607L4 8.23607ZM12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7C13 7.55228 12.5523 8 12 8Z"></path></svg>
                   </i>
                <strong class="desc c-primary">
                    Account Details
                </strong>
            </div>
            {{-- new row --}}
            <div style="border:1px solid var(--rgt-01);background:var(--rgt-002)" class="w-full align-center space-between p-15 br-10 row g-10">
                <div class="column g-5">
                    <span class="opacity-07 row align-center g-5">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M7.78428 14L8.2047 10H4V8H8.41491L8.94043 3H10.9514L10.4259 8H14.4149L14.9404 3H16.9514L16.4259 8H20V10H16.2157L15.7953 14H20V16H15.5851L15.0596 21H13.0486L13.5741 16H9.58509L9.05957 21H7.04855L7.57407 16H4V14H7.78428ZM9.7953 14H13.7843L14.2047 10H10.2157L9.7953 14Z"></path></svg>

                        Account Number</span>
                    <strong class="font-1">{{ $bank->account_number }}</strong>
                </div>
                <button onclick="copy('{{ $bank->account_number }}')" style="border-radius:2px;" class="border-none bg-primary h-fit br-2 row align-center g-5 primary-text p-5 p-x-10 w-fit">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                    <small>Copy</small></button>
            </div>
             {{-- new row --}}
            <div style="border:1px solid var(--rgt-01);background:var(--rgt-002)" class="w-full align-center space-between p-15 br-10 row g-10">
                <div class="column g-5">
                    <span class="opacity-07 row align-center g-5">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM4 8.23607V9H20V8.23607L12 4.23607L4 8.23607ZM12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7C13 7.55228 12.5523 8 12 8Z"></path></svg>

                        Bank Name</span>
                    <strong class="font-1">{{ $bank->bank_name }}</strong>
                </div>
                <button onclick="copy('{{ $bank->bank_name }}')" style="border-radius:2px;" class="border-none bg-primary h-fit br-2 row align-center g-5 primary-text p-5 p-x-10 w-fit">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                    <small>Copy</small></button>
            </div>
             {{-- new row --}}
            <div style="border:1px solid var(--rgt-01);background:var(--rgt-002)" class="w-full align-center space-between p-15 br-10 row g-10">
                <div class="column g-5">
                    <span class="opacity-07 row align-center g-5">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"></path></svg>

                        Account Name</span>
                    <strong class="font-1">{{ $bank->account_name }}</strong>
                </div>
                <button onclick="copy('{{ $bank->account_name }}')" style="border-radius:2px;" class="border-none bg-primary h-fit br-2 row align-center g-5 primary-text p-5 p-x-10 w-fit">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                    <small>Copy</small></button>
            </div>
              <div style="border:1px solid var(--rgt-01);background:var(--rgt-002)" class="w-full align-center space-between p-15 br-10 row g-10">
                <div class="column g-5">
                    <span class="opacity-07 row align-center g-5">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12.0004 16C14.2095 16 16.0004 14.2091 16.0004 12 16.0004 9.79086 14.2095 8 12.0004 8 9.79123 8 8.00037 9.79086 8.00037 12 8.00037 14.2091 9.79123 16 12.0004 16ZM21.0049 4.00293H3.00488C2.4526 4.00293 2.00488 4.45064 2.00488 5.00293V19.0029C2.00488 19.5552 2.4526 20.0029 3.00488 20.0029H21.0049C21.5572 20.0029 22.0049 19.5552 22.0049 19.0029V5.00293C22.0049 4.45064 21.5572 4.00293 21.0049 4.00293ZM4.00488 15.6463V8.35371C5.13065 8.017 6.01836 7.12892 6.35455 6.00293H17.6462C17.9833 7.13193 18.8748 8.02175 20.0049 8.3564V15.6436C18.8729 15.9788 17.9802 16.8711 17.6444 18.0029H6.3563C6.02144 16.8742 5.13261 15.9836 4.00488 15.6463Z"></path></svg>
                        Amount</span>
                    <strong class="font-1">{{ $currency.number_format($settings->upgrade->fee,2) }}</strong>
                </div>
                <button onclick="copy('{{ $settings->upgrade->fee }}')" style="border-radius:2px;" class="border-none bg-primary h-fit br-2 row align-center g-5 primary-text p-5 p-x-10 w-fit">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                    <small>Copy</small></button>
            </div>
        </div>

            
         {{-- form --}}
         <form action="{{ url('users/post/recharge/process') }}" onsubmit="PostRequest(event,this,Completed)" style="border:1px solid var(--rgt-01)" class="column bg-light w-full g-10 br-15 p-15">
         {{-- new row --}}
            <div class="row w-full g-5">
                <i class="c-primary">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M3 3H5V5H3V3ZM7 3H9V5H7V3ZM11 3H13V5H11V3ZM15 3H17V5H15V3ZM19 3H21V5H19V3ZM19 7H21V9H19V7ZM3 19H5V21H3V19ZM3 15H5V17H3V15ZM3 11H5V13H3V11ZM3 7H5V9H3V7ZM10.6667 11L11.7031 9.4453C11.8886 9.1671 12.2008 9 12.5352 9H15.4648C15.7992 9 16.1114 9.1671 16.2969 9.4453L17.3333 11H20C20.5523 11 21 11.4477 21 12V20C21 20.5523 20.5523 21 20 21H8C7.44772 21 7 20.5523 7 20V12C7 11.4477 7.44772 11 8 11H10.6667ZM9 19H19V13H16.263L14.9296 11H13.0704L11.737 13H9V19ZM14 18C12.8954 18 12 17.1046 12 16C12 14.8954 12.8954 14 14 14C15.1046 14 16 14.8954 16 16C16 17.1046 15.1046 18 14 18Z"></path></svg>
                  </i>
                <strong class="desc c-primary">
                Upload Screenshot
                </strong>
            </div>
           {{-- csrf token --}}
           <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       {{-- amount --}}
       <input type="hidden" class="inp c-black input" name="amount" value="{{ $settings->upgrade->fee }}">
        
       {{-- new input --}}
         <div class="column w-full g-5">
            <label class="column g-2">
                <label>Transfer Receipt</label>
                <small class="opacity-05">Screenshot of transfer made</small>
            </label>
            <label class="screenshot cont">
                <span>TAP TO UPLOAD</span>
                <span class="opacity-07">JPG, PNG, HEIF ( Max: 2MB )</span>
                 <input onchange="IMGChanged(this)" type="file" accept="image/*" name="receipt" class="inp display-none required input">
           <img src="" alt="">
                </label>
           
        </div>
        
        @push('css')
            <style class="css">
                .screenshot{
                    height:150px;
                    width:100%;
                    border-radius:5px;
                    border:1px solid var(--rgt-01);
                    background:var(--bg);
                    display:flex;
                    flex-direction:column;
                    align-items:center;
                    justify-content:center;
                    text-align:center;
                    font-weight: 400 !important;
                    width:100%;
                    padding:10px;
                    user-select:none;
                    -webkit-user-select:none;
                    cursor: pointer;
                }
                .screenshot img{
                   
                   max-height:80%;
                   max-width:80%;
                }
                .screenshot.active *:not(img){
                    display:none;
                }
                .screenshot.active img{
                    display:flex;
                }
                .screenshot img{
                    display:none;
                }
            </style>
        @endpush
        @push('js')
            <script class="js">
                function IMGChanged(element){
                    let file=element.files[0];
                    if(file){
                        document.querySelector('.screenshot img').src=URL.createObjectURL(file);
                        document.querySelector('.screenshot').classList.add('active');
                    }else{
                         document.querySelector('.screenshot').classList.remove('active');
                    }
                }
                // new
               
        function Completed(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect(data.url)
            }
        }
    
     
            </script>
        @endpush
        <button class="post">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21.7267 2.95694L16.2734 22.0432C16.1225 22.5716 15.7979 22.5956 15.5563 22.1126L11 13L1.9229 9.36919C1.41322 9.16532 1.41953 8.86022 1.95695 8.68108L21.0432 2.31901C21.5716 2.14285 21.8747 2.43866 21.7267 2.95694ZM19.0353 5.09647L6.81221 9.17085L12.4488 11.4255L15.4895 17.5068L19.0353 5.09647Z"></path></svg>
            
            Submit Deposit</button>
        </form>
        @endif
       
      
    </section>
@endsection