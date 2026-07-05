@extends('layout.users.app')
@section('title')
    Google To Earn
@endsection
@section('css')
    <style class="css">
        header,footer,nav{
            display:none;
        }
        main{
            margin-left:0;
            width:100%;
            max-width: 100%;

        }
        @media(min-width:800px){
            main{
                padding-right:10vw;
                padding-left:10vw;
            }
        }
    </style>
@endsection
@section('main')
    <section x-data="{ 
        'claimSection' : false,
        'firstSearch' : false,
        'searchResult' : null,
        'query' : '',
        'isRewarded' : {{ $isRewarded }} > 0 ? true : false,
         'isEmpty' : true,
        'isFetching' : false,
        'searchError' : false,
         'search_url' : 'https://api.duckduckgo.com'
     }" class="w-full column g-10px">
        {{-- new row --}}
       <div class="row align-center space-between g-10px">
        <div x-data="{ 
            'url' : '{{ url()->previous() == url()->current() ? url('users/dashboard') : url()->previous() }}'
         }" x-on:click="Redirect(url)" class="glass pc-pointer no-shrink h-40 w-40 circle column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </div>
         <div class="row align-center justify-center">
            <strong class="font-size-1-5rem font-weight-900 c-primary">Google</strong>
            <strong class="font-size-1-5rem font-weight-900">2</strong>
            <strong class="font-size-1-5rem font-weight-900 c-secondary">Earn</strong>
            
        </div>
        <span></span>
       </div>
    
        {{-- new row --}}
        <div class="w-full bg-light br-1000 row align-center border-width-1px border-style-solid border-color-rgt-02 p-4px">
            <input x-ref="input" x-on:input="if($el.value.trim() != ''){
                isEmpty = false
            }else{
                isEmpty = true;
            }" type="text" placeholder="Type to search...." class="h-40px br-inherit w-full bg-transparent border-none">
       <template x-if="!isEmpty && !isFetching">
         <div x-ref="fetchBTN" x-on:click="
         if(query != $refs.input.value){
         isFetching=true;

             SendGetRequest(search_url,{
         q : $refs.input.value,
         format : 'json',
         pretty : 1,
         skip_disambig : 1
         },function(response,error){
               query = $refs.input.value;
            isFetching =false;
         if(error){
            searchError = true;
         }else{
            searchError = false;
            searchResult = JSON.parse(response);
               if(searchResult.Abstract && searchResult.Abstract != '' && !isRewarded){
                 setTimeout(()=>{
                    claimSection=true;
                },5000)
               }
         }
         })
         }else{
            isFetching = true;
            setTimeout(()=>{
                isFetching = false;
            },300);

         }
        
         " class="h-40 w-40 pc-pointer no-shrink circle bg-primary primary-text column align-center justify-center no-select">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>

        </div>
       </template>
         <template x-if="!isEmpty && isFetching">
         <div class="h-40 w-40 filter-grayscale-25 pointer-none disabled no-shrink circle bg-primary primary-text column align-center justify-center no-select">
<svg height="20" width="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="11" y="1" width="2" height="5" opacity=".14"/><rect x="11" y="1" width="2" height="5" transform="rotate(30 12 12)" opacity=".29"/><rect x="11" y="1" width="2" height="5" transform="rotate(60 12 12)" opacity=".43"/><rect x="11" y="1" width="2" height="5" transform="rotate(90 12 12)" opacity=".57"/><rect x="11" y="1" width="2" height="5" transform="rotate(120 12 12)" opacity=".71"/><rect x="11" y="1" width="2" height="5" transform="rotate(150 12 12)" opacity=".86"/><rect x="11" y="1" width="2" height="5" transform="rotate(180 12 12)"/><animateTransform attributeName="transform" type="rotate" calcMode="discrete" dur="0.75s" values="0 12 12;30 12 12;60 12 12;90 12 12;120 12 12;150 12 12;180 12 12;210 12 12;240 12 12;270 12 12;300 12 12;330 12 12;360 12 12" repeatCount="indefinite"/></g></svg>

        </div>
       </template>
        </div>
          {{-- claim section --}}
        <div x-show="claimSection && query && !isRewarded" x-transition:enter.duration.500ms x-transition:leave.duration.500ms style="background:linear-gradient(to bottom,orange,rgb(255, 181, 44));color:white;" class="p-20px overflow-hidden pos-relative w-full column g-10px br-10px">
          <span style="animation-duration:5s !important;" class="pos-absolute  animate__animated animate__swing animate__infinite z-index-100 font-size-4rem top-0 right-0 text-align-end no-select opacity-04 no-pointer">
            🎉
          </span>
            {{-- new row --}}
            <div class="row pos-relative z-index-200 align-center g-5px w-full">
                <span class="font-size-1-3">
                    🎊
                </span>
                <div style="background:rgba(255,255,255,0.2)" class="p-5px p-x-10px font-weight-900 font-size-1-3 br-5px">
                    {{ Auth::guard('users')->user()->currency }}{{ number_format($reward) }}
                </div>
                <span class="font-weight-700 font-size-1">Reward</span>
            </div>
            <div class="pos-relative z-index-200">
                Congratulations {{ ucfirst(Auth::guard('users')->user()->username) }}, You have earned <strong class="font-weight-800"> {{ Auth::guard('users')->user()->currency }}{{ number_format($reward) }}</strong> reward for using Earnify Google to Earn, click the button below to claim your reward instantly.
            </div>
            <div x-data="{ 
                isLoading : false
             }" x-on:click="
             isLoading= true;
             SendPostRequest('{{ url('users/post/reward/google/to/earn/process') }}',{
                _token : '{{ @csrf_token() }}',
                
             },function(response,error){
                isLoading = false;
                if(error){
                   CreateNotify('error',error);
                   
                }else{
                    let data=JSON.parse(response);
                    CreateNotify(data.status,data.message);
                    if(data.status == 'success'){
                        isRewarded = true;
                        claimSection = false;
                        let confetti=createConfetti({
                            duration : 3000,
                            colors : ['blue','gold','pink','white']
                        });
                        setTimeout(()=>{
                            confetti.stop();
                        },3000)
                    }
                }
             })
             " x-bind:class="{'disabled filter-grayscale-50' : isLoading}" style="background:linear-gradient(to right,rgb(0, 0, 29),rgb(0, 0, 63))" class="pos-relative z-index-200 w-full g-5px br-1000 bg-navy row align-center justify-center c-white p-10px">
              {{-- is not loading --}}
            <template x-if="!isLoading">
                <div class="row align-center justify-center">
                     <i>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM13.0049 10.0028H11.0049V20.0028H13.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

               </i>
                <span>Claim Rewards</span>
                </div>
              </template>
            {{-- is Loading --}}
            <template x-if="isLoading">
                <div>
                    CLAIMING....
                </div>
            </template>
            </div>
        </div>
        <template x-if="query == ''">
            <div class="w-full column g-5">
                <strong class="font-size-1rem m-bottom-20px">Suggested searches</strong>
                {{-- new --}}
                <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Cristiano Ronaldo</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Manchester United FC</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">FIFA World cup</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Apple Fruit</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Apple Iphone</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Real Madrid CF</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Chelsea FC</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Elon Musk</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">World bank</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">World War II</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Solar System</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Tesla Model S</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
                 {{-- new --}}
                 <div x-on:click="
                $refs.input.value=$el.querySelector('.search-details').innerText;
                isEmpty = false;
                " x-bind:style="{
                    'border-bottom' : '1px solid var(--rgt-01)',
                    'padding-bottom': '10px'
                }" class="w-full row space-between align-center g-10px pc-pointer">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M244,56v64a12,12,0,0,1-24,0V85l-75.51,75.52a12,12,0,0,1-17,0L96,129,32.49,192.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0L136,135l67-67H168a12,12,0,0,1,0-24h64A12,12,0,0,1,244,56Z"></path></svg>

                </i>
                    <span class="m-right-auto block search-details">Fall of the Berlin wall</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>
                        </i>
                </div>
            </div>
        </template>

      
       <template x-if="searchResult != null && searchResult.Abstract">
        <div class="p-20px overflow-hidden bg-rgt-01 br-10px column g-10px">
            <strong class="font-size-1-5 font-weight-900" x-text="searchResult.Heading"></strong>
            {{-- new row --}}
            <div class="row align-center g-5px">
                <span class="opacity-07">Source:</span>
                <span class="c-secondary no-select pointer" x-on:click="window.open(searchResult.AbstractURL);" x-text="searchResult.AbstractSource"></span>
            </div>
            <div x-text="searchResult.Abstract"></div>
            <template x-if="searchResult.Image">
            <img :src="'https://duckduckgo.com' + searchResult.Image" alt="" class="max-w-full">
             
            </template>
            <template x-if="searchResult.Infobox.content">
                 {{-- new row --}}
                <div class="column g-10px w-full">
                   <div class="row align-center g-5px">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M108,108a12,12,0,0,1,12-12h56a12,12,0,0,1,0,24H120A12,12,0,0,1,108,108Zm68,28H120a12,12,0,0,0,0,24h56a12,12,0,0,0,0-24Zm52-88V208a20,20,0,0,1-20,20H48a20,20,0,0,1-20-20V48A20,20,0,0,1,48,28H208A20,20,0,0,1,228,48ZM52,204H68V52H52ZM204,52H92V204H204Z"></path></svg>
                    
                    <stong class="font-size-1-2 font-weight-800">Details</stong>
                   </div>
                  <div class="hr" vitecss-type="dashed"></div>

                </div>
            </template>

                <template x-for="data in searchResult.Infobox.content">
                   <template x-if="typeof data.value != 'object'">
                    <div class="row g-10px space-between">
                        <div class="opacity-07">
                        <strong x-text="data.label" class="font-weight-800 ws-nowrap"></strong>

                        </div>
                        <span class="ws-nowrap text-overflow-ellipsis text-end" x-text="data.value"></span>
                    </div>
                   </template>
                </template>
        </div>
       </template>
       <template x-if="searchResult != null && !searchResult.Abstract">
        <div class="column opacity-07 text-center no-select g-10px w-full p-20px">
           <i class="row m-x-auto w-fit">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="70" width="70"><path d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z"></path></svg>

            </i>
            <span>Your search - <strong x-text="query"></strong> - did not match any results.</span>
            <strong>Suggestions:</strong>
            <span>Make sure that all keywords are spelt corrrectly.</span>
            <span>Try different keywords.</span>
            <span>Try more general keywords.</span>
        </div>
       </template>

      <template x-if="searchError">
         <div class="column opacity-07 text-center no-select g-10px w-full p-20px">
           <i class="row m-x-auto w-fit">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="70" width="70"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212ZM76,108a16,16,0,1,1,16,16A16,16,0,0,1,76,108Zm104,0a16,16,0,1,1-16-16A16,16,0,0,1,180,108Zm-3.26,57a12,12,0,0,1-19.48,14,36,36,0,0,0-58.52,0,12,12,0,0,1-19.48-14,60,60,0,0,1,97.48,0Z"></path></svg>

            </i>
            <span>Oops we experienced an internal error and could not query your search</span>
            <strong>Suggestions:</strong>
            <span>Make sure your internet connection is okay and try searching again.</span>
        </div>
      </template>
    </section>
@endsection
@section('js')
<script src="{{ asset('vitecss/js/confetti.js') }}" class="js"></script>
@endsection