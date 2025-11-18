@extends('layout.users.app')
@section('title')
    Withdraw
@endsection
@section('main')
    <section class="section1 column g-10 p-10">
        <div class="column max-w-500 m-x-auto w-full g-10 p-10 bg-light box-shadow br-5">
          <div class="w-full p-10 column g-10 br-5 primary-text no-select bg-primary">
            <strong class="">Withdrawable Balance</strong>
            <strong class="desc">&#8358;{{ number_format(Auth::guard('users')->user()->withdrawal,2) }}</strong>
          </div>
           @if (!empty((array) $bank))
            <div class="column max-w-500 g-10 space-between br-5 box-shadoww bg p-10 w-full">
            <div class="row w-full g-10 align-center">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>

                 <span>Bank Details</span>
                 <span onclick="spa(event,'{{ url('users/bank') }}')" class="m-left-auto row align-center pointer c-primary no-select">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary)" viewBox="0 0 256 256"><path d="M201.54,54.46A104,104,0,0,0,54.46,201.54,104,104,0,0,0,201.54,54.46ZM96,210V152h64v58a88.33,88.33,0,0,1-64,0Zm48-74H112V100.94l32-16Zm46.22,54.22A88.09,88.09,0,0,1,176,201.77V152a16,16,0,0,0-16-16V72a8,8,0,0,0-11.58-7.16l-48,24A8,8,0,0,0,96,96v40a16,16,0,0,0-16,16v49.77a88,88,0,1,1,110.22-11.55Z"></path></svg>
                             
                    Edit
                </span>
            </div>
             <hr class="gradient" style="background:linear-gradient(to right,transparent,var(--primary),transparent) !important">
             
            <div class="row g-10 align-center">
                <strong>Account Number:</strong>
                <span>{{ $bank->account_number }}</span>
            </div>
             <div class="row g-10 align-center">
                <strong>Bank Name:</strong>
                <span>{{ $bank->bank_name }}</span>
            </div>
             <div class="row g-10 align-center">
                <strong>Account Name:</strong>
                <span>{{ $bank->account_name }}</span>
            </div>
        </div>
       @endif
          <form action="{{ url('users/post/withdraw') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Initiated)" class="column w-full g-20">
            <input type="hidden" name="_token" class="input" value="{{ @csrf_token() }}">
            <div class="cont bg row space-between h-50 w-full br-5 border-color-silver border-1">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="h-full column c-primary no-select perfect-square justify-center text-center">&#8358;</div>
                <input placeholder="Enter Withdrawal Amount" type="number" name="amount" class="inp bg-transparent required amount input w-full h-full no-border br-10">
            </div>
            <button class="post bold br-5 clip-5">Withdraw</button>
          </form>
        </div>
        <div class="w-full bg-light box-shadow p-10 g-10 column br-5 m-top-20">
            <strong class="desc c-primary">Withdrawal Instructions</strong>
            <span>- Minimum Withdrawal is &#8358;{{ number_format($finance_settings->min_withdrawal,2) }}.</span>
            <span>- Withdrawal fee is {{ number_format($finance_settings->withdrawal_fee) }}%.</span>
            @if ($finance_settings->withdrawal_status == 'open')
                 <span>- Withdrawal portal is currently open.</span>
                 @else
                  <span>- Withdrawal portal is currently closed.</span>
            @endif
              <span>- Please Ensure to confirm your linked Bank details before proceeding.</span>
                <span>- Withdrawals are sent to the linked bank account.</span>
                 <span>- Withdrawals are processed between 1 to 40 minutes but might exceed if we have lots of requests to attend to.</span>
                  <span>- If you encounter any issues in withdrawal ,endeavour to contact our support team and we would guide you through.</span>

        </div>
    </section>
@endsection
@section('js')
    <script class="js">
      window.MyFunc = {
        Initiated : function(response){
          let data=JSON.parse(response);
          if(data.status == 'success'){
            spa(event,data.url)
          }
        }
      }
    </script>
@endsection