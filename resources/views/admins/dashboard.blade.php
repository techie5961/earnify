@extends('layout.admins.app')
@section('title')
    Dashboard
@endsection
@section('main')
    <section class="grid pc-grid-2 no-select w-full p-10 g-10">
        {{-- NEW --}}
        <div onclick="window.location.href='{{ url('admins/users/all') }}'" class="bg box-shadow bg-light br-10 w-full p-10 column g-10">
           <div class="row align-center space-between">
             <div class="h-50 max-w-50 perfect-square br-10 bg-primary column justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M125.18,156.94a64,64,0,1,0-82.36,0,100.23,100.23,0,0,0-39.49,32,12,12,0,0,0,19.35,14.2,76,76,0,0,1,122.64,0,12,12,0,0,0,19.36-14.2A100.33,100.33,0,0,0,125.18,156.94ZM44,108a40,40,0,1,1,40,40A40,40,0,0,1,44,108Zm206.1,97.67a12,12,0,0,1-16.78-2.57A76.31,76.31,0,0,0,172,172a12,12,0,0,1,0-24,40,40,0,1,0-10.3-78.67,12,12,0,1,1-6.16-23.19,64,64,0,0,1,57.64,110.8,100.23,100.23,0,0,1,39.49,32A12,12,0,0,1,250.1,205.67Z"></path></svg>

            </div>
            <strong class="desc">{{ number_format($total_users) }}</strong>
           </div>
           <span>Total Users</span>
        </div>
        {{-- NEW --}}
         <div onclick="window.location.href='{{ url('admins/promoters') }}'" class="bg box-shadow bg-light br-10 w-full p-10 column g-10">
           <div class="row align-center space-between">
             <div class="h-50 max-w-50 perfect-square br-10 bg-purple column justify-center">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M252,80a32,32,0,1,0-60,15.45l-20.86,25.66L150.82,74.4a32,32,0,1,0-45.64,0L84.87,121.11,64,95.45a32,32,0,1,0-35,15.78l14,84.06A19.94,19.94,0,0,0,62.78,212H193.22A19.94,19.94,0,0,0,213,195.29l14-84.06A32.05,32.05,0,0,0,252,80Zm-32-8a8,8,0,1,1-8,8A8,8,0,0,1,220,72ZM128,44a8,8,0,1,1-8,8A8,8,0,0,1,128,44ZM36,72a8,8,0,1,1-8,8A8,8,0,0,1,36,72ZM189.83,188H66.17L55.29,122.78l23.4,28.79A12,12,0,0,0,88,156a12.87,12.87,0,0,0,1.63-.11,12,12,0,0,0,9.37-7.1L127.18,84l.82,0,.82,0L157,148.79a12,12,0,0,0,9.37,7.1A12.87,12.87,0,0,0,168,156a12,12,0,0,0,9.31-4.43l23.4-28.79Z"></path></svg>
            </div>
            <strong class="desc">{{ number_format($total_promoters) }}</strong>
           </div>
           <span>Total Promoters</span>
        </div>
         {{-- NEW --}}
         <div onclick="window.location.href='{{ url('admins/deposits/pending') }}'" class="bg box-shadow bg-light br-10 w-full p-10 column g-10">
           <div class="row align-center space-between">
             <div class="h-50 max-w-50 perfect-square br-10 bg-gold column justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" viewBox="0 0 256 256"><path d="M120,140a12,12,0,0,1-12-12V45l-7.51,7.51a12,12,0,0,1-17-17l28-28a12,12,0,0,1,17,0l28,28a12,12,0,1,1-17,17L132,45v83A12,12,0,0,1,120,140Zm76-18.48V96a20,20,0,0,0-20-20H164a12,12,0,0,0,0,24h8v68.3A32,32,0,0,0,128.29,212c.11.2.23.39.35.58l22.26,34A12,12,0,1,0,171,233.43l-22-33.66a8,8,0,0,1,14-7.77c.11.2.23.39.36.58L174,208.88a12,12,0,0,0,22-6.57V154a70.66,70.66,0,0,1,16,44.61V240a12,12,0,0,0,24,0V198.65A94.91,94.91,0,0,0,196,121.52ZM76,76H64A20,20,0,0,0,44,96V200a12,12,0,0,0,24,0V100h8a12,12,0,0,0,0-24Z"></path></svg>
         </div>
            <strong class="desc">&#8358;{{ number_format($pending_deposits,2) }}</strong>
           </div>
           <span>Pending Deposits</span>
        </div>
          {{-- NEW --}}
         <div onclick="window.location.href='{{ url('admins/withdrawals/pending') }}'" class="bg box-shadow bg-light br-10 w-full p-10 column g-10">
           <div class="row align-center space-between">
             <div class="h-50 max-w-50 perfect-square br-10 bg-gold column justify-center">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" viewBox="0 0 256 256"><path d="M236,198.65V240a12,12,0,0,1-24,0V198.65A70.66,70.66,0,0,0,196,154v48.27a12,12,0,0,1-22,6.57l-10.67-16.3c-.13-.19-.25-.38-.36-.58a8,8,0,0,0-14,7.77l22,33.66a12,12,0,1,1-20.08,13.14l-22.26-34c-.12-.19-.24-.38-.35-.58A32,32,0,0,1,172,168.3V68h-8a12,12,0,0,1,0-24h12a20,20,0,0,1,20,20v57.52A94.91,94.91,0,0,1,236,198.65ZM88,56A12,12,0,0,0,76,44H64A20,20,0,0,0,44,64V200a12,12,0,0,0,24,0V68h8A12,12,0,0,0,88,56Zm68.49,60.48a12,12,0,0,0-17-17L132,107V16a12,12,0,0,0-24,0v91l-7.51-7.52a12,12,0,0,0-17,17l28,28a12,12,0,0,0,17,0Z"></path></svg>
         </div>
            <strong class="desc">&#8358;{{ number_format($pending_withdrawals,2) }}</strong>
           </div>
           <span>Pending Withdrawals</span>
        </div>
         {{-- NEW --}}
         <div onclick="window.location.href='{{ url('admins/deposits/success') }}'" class="bg box-shadow bg-light br-10 w-full p-10 column g-10">
           <div class="row align-center space-between">
             <div class="h-50 max-w-50 perfect-square br-10 bg-green column justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" viewBox="0 0 256 256"><path d="M120,140a12,12,0,0,1-12-12V45l-7.51,7.51a12,12,0,0,1-17-17l28-28a12,12,0,0,1,17,0l28,28a12,12,0,1,1-17,17L132,45v83A12,12,0,0,1,120,140Zm76-18.48V96a20,20,0,0,0-20-20H164a12,12,0,0,0,0,24h8v68.3A32,32,0,0,0,128.29,212c.11.2.23.39.35.58l22.26,34A12,12,0,1,0,171,233.43l-22-33.66a8,8,0,0,1,14-7.77c.11.2.23.39.36.58L174,208.88a12,12,0,0,0,22-6.57V154a70.66,70.66,0,0,1,16,44.61V240a12,12,0,0,0,24,0V198.65A94.91,94.91,0,0,0,196,121.52ZM76,76H64A20,20,0,0,0,44,96V200a12,12,0,0,0,24,0V100h8a12,12,0,0,0,0-24Z"></path></svg>
         </div>
            <strong class="desc">&#8358;{{ number_format($successfull_deposits,2) }}</strong>
           </div>
           <span>Successfull Deposits</span>
        </div>
          {{-- NEW --}}
         <div onclick="window.location.href='{{ url('admins/withdrawals/success') }}'" class="bg box-shadow bg-light br-10 w-full p-10 column g-10">
           <div class="row align-center space-between">
             <div class="h-50 max-w-50 perfect-square br-10 bg-green column justify-center">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" viewBox="0 0 256 256"><path d="M236,198.65V240a12,12,0,0,1-24,0V198.65A70.66,70.66,0,0,0,196,154v48.27a12,12,0,0,1-22,6.57l-10.67-16.3c-.13-.19-.25-.38-.36-.58a8,8,0,0,0-14,7.77l22,33.66a12,12,0,1,1-20.08,13.14l-22.26-34c-.12-.19-.24-.38-.35-.58A32,32,0,0,1,172,168.3V68h-8a12,12,0,0,1,0-24h12a20,20,0,0,1,20,20v57.52A94.91,94.91,0,0,1,236,198.65ZM88,56A12,12,0,0,0,76,44H64A20,20,0,0,0,44,64V200a12,12,0,0,0,24,0V68h8A12,12,0,0,0,88,56Zm68.49,60.48a12,12,0,0,0-17-17L132,107V16a12,12,0,0,0-24,0v91l-7.51-7.52a12,12,0,0,0-17,17l28,28a12,12,0,0,0,17,0Z"></path></svg>
         </div>
            <strong class="desc">&#8358;{{ number_format($successfull_withdrawals,2) }}</strong>
           </div>
           <span>Successfull Withdrawals</span>
        </div>
         {{-- NEW --}}
         <div onclick="window.location.href='{{ url('admins/deposits/rejected') }}'" class="bg box-shadow bg-light br-10 w-full p-10 column g-10">
           <div class="row align-center space-between">
             <div class="h-50 max-w-50 perfect-square br-10 bg-red column justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M120,140a12,12,0,0,1-12-12V45l-7.51,7.51a12,12,0,0,1-17-17l28-28a12,12,0,0,1,17,0l28,28a12,12,0,1,1-17,17L132,45v83A12,12,0,0,1,120,140Zm76-18.48V96a20,20,0,0,0-20-20H164a12,12,0,0,0,0,24h8v68.3A32,32,0,0,0,128.29,212c.11.2.23.39.35.58l22.26,34A12,12,0,1,0,171,233.43l-22-33.66a8,8,0,0,1,14-7.77c.11.2.23.39.36.58L174,208.88a12,12,0,0,0,22-6.57V154a70.66,70.66,0,0,1,16,44.61V240a12,12,0,0,0,24,0V198.65A94.91,94.91,0,0,0,196,121.52ZM76,76H64A20,20,0,0,0,44,96V200a12,12,0,0,0,24,0V100h8a12,12,0,0,0,0-24Z"></path></svg>
         </div>
            <strong class="desc">&#8358;{{ number_format($rejected_deposits,2) }}</strong>
           </div>
           <span>Rejected Deposits</span>
        </div>
          {{-- NEW --}}
         <div onclick="window.location.href='{{ url('admins/withdrawals/rejected') }}'" class="bg box-shadow bg-light br-10 w-full p-10 column g-10">
           <div class="row align-center space-between">
             <div class="h-50 max-w-50 perfect-square br-10 bg-red column justify-center">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M236,198.65V240a12,12,0,0,1-24,0V198.65A70.66,70.66,0,0,0,196,154v48.27a12,12,0,0,1-22,6.57l-10.67-16.3c-.13-.19-.25-.38-.36-.58a8,8,0,0,0-14,7.77l22,33.66a12,12,0,1,1-20.08,13.14l-22.26-34c-.12-.19-.24-.38-.35-.58A32,32,0,0,1,172,168.3V68h-8a12,12,0,0,1,0-24h12a20,20,0,0,1,20,20v57.52A94.91,94.91,0,0,1,236,198.65ZM88,56A12,12,0,0,0,76,44H64A20,20,0,0,0,44,64V200a12,12,0,0,0,24,0V68h8A12,12,0,0,0,88,56Zm68.49,60.48a12,12,0,0,0-17-17L132,107V16a12,12,0,0,0-24,0v91l-7.51-7.52a12,12,0,0,0-17,17l28,28a12,12,0,0,0,17,0Z"></path></svg>
         </div>
            <strong class="desc">&#8358;{{ number_format($rejected_withdrawals,2) }}</strong>
           </div>
           <span>Rejected Withdrawals</span>
        </div>
    </section>
@endsection