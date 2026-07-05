@extends('layout.users.app')
@section('title')
    Transaction Receipt
@endsection
@section('css')
    <style class="css">
        footer,header,nav,section.nav{
            display:none;
        }
        main{
            padding:0;
            padding-top:0 !important;
            margin-left:0;
            margin-right:0;
            width:100%;
            display: flex;
            align-items:center;
            flex-direction:column;
            max-width:100% !important;
        }
        .receipt-body{
            position:relative;
            max-width:500px;
            margin:0 auto;
        }
        .bg-img{
            position:absolute;
            opacity:0.1;
            inset:0;
            overflow:hidden;
            z-index:10;
            pointer-events:none;
           display:grid;
           gap:50px 30px;
           place-items:center;
        }
        .bg-img img{
            width:100px;
            transform:rotate(-10deg);
            filter:grayscale(100%);
        }
        .receipt-contents *:not(.bg-img){
            position: relative;
            z-index:30;

        }
        .overlay-body{
            max-width: 500px;
            margin:0 auto;
        }
    
    </style>
@endsection 
@section('main')
    <section class="w-full column g-10">
      {{-- header --}}
      <div class="w-full receipt-header p-15 top-0 pos-fixed z-index-1000 bg-light row align-center g-10 space-between">
        <div onclick="Redirect('{{ url()->previous() == url()->current() ? url('users/dashboard') : url()->previous() }}')" class="glass pointer h-40 w-40 column align-center justify-center g-10 circle">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </div>
        <strong class="font-weight-700 font-size-1">Transaction Details</strong>
        <i onclick="Redirect('{{ url('users/transactions') }}')" class="pointer">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12H4C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.53614 4 7.33243 5.11383 5.86492 6.86543L8 9H2V3L4.44656 5.44648C6.28002 3.33509 8.9841 2 12 2ZM13 7L12.9998 11.585L16.2426 14.8284L14.8284 16.2426L10.9998 12.413L11 7H13Z"></path></svg>

        </i>
      </div>
      {{-- body --}}
      <section class="column w-full receipt-body p-20 g-20">
        <div style="border:1px solid var(--rgt-01)" class="w-full align-center text-center bg-light br-10 p-20 column g-10">
          @if ($data->class == 'credit')
                    <div style="background: #4caf50;color:white;min-width:0;" class="h-50 w-50 circle no-shrink column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14.5895 16.0032L5.98291 7.39664L7.39712 5.98242L16.0037 14.589V7.00324H18.0037V18.0032H7.00373V16.0032H14.5895Z"></path></svg>

                </div>
             @else
                    <div style="background: orangered;color:white;" class="h-50 w-50 circle no-shrink column align-center justify-center">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>

                </div>
             @endif
             <strong class="font-size-1 font-weight-600">{{ $data->title }}</strong>
             <strong class="font-size-1-5 font-weight-900">
                {{ Auth::guard('users')->user()->currency.number_format($data->amount,2) }}
             </strong>
             <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : 'red') }}">{{ $data->status }}</div>
      </div>
      {{-- new --}}
      <div style="border:1px solid var(--rgt-01)" class="w-full p-15 overflow-hidden bg-light br-10 column g-10">
        <strong class="font-size-09 font-weight-600">Transaction Details</strong>
        {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">Transaction Type</span>
            <span class="font-weight-500 break-word text-align-end">{{ $data->title }}</span>
        </div>
        {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">Transaction ID</span>
            <span class="font-weight-500 break-word text-align-end row g-5 align-center">
                {{ $data->uniqid }}
                <i class="opacity-07" onclick="copy('{{ $data->uniqid }}')">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                </i>
            </span>
        </div>
         {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07 ws-nowrap">Session ID</span>
            <span class="font-weight-500 break-word text-align-end row g-5 align-center">
                {{ $session_id }}
                <i class="opacity-07" onclick="copy('{{ $session_id }}')">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                </i>
            </span>
        </div>
         {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">Transaction Date</span>
            <span class="font-weight-500 break-word text-align-end">{{ $data->frame.$data->meridian }}</span>
        </div>
        @isset($data->data)
            @foreach (json_decode($data->data) as $key=>$value)
                  {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">{{ $key }}</span>
            <span class="font-weight-500 break-word text-align-end">{{ $value }}</span>
        </div>
            @endforeach
        @endisset
         {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">{{ ucwords($data->class) }}ed {{ $data->class == 'debit' ? 'from' : 'to' }}</span>
            <span class="font-weight-500 break-word text-align-end">{{ json_decode($data->wallet)->name ?? 'Main Wallet' }}</span>
        </div>
      </div>
      </section>
      {{-- footer --}}
      <section class="receipt-footer m-top-auto column align-center justify-center bg pos-fixed bottom-0 left-0 right-0 p-20">
        <div onclick="document.querySelector('.receipt-overlay').classList.add('active')" class="w-full ,-x-auto max-w-500 pointer h-50 br-1000 row align-center justify-center bg-primary primary-text no-select">
            Share Receipt
        </div>
      </section>
    </section>
    {{-- overlay --}}
    <section class="overlay receipt-overlay overflow-hidden bottom">
       <div class="w-full overlay-header row align-center space-between p-15 bg-light pos-absolute z-index-1000 top-0 overlay-head">
         <div onclick="this.closest('.overlay').classList.remove('active')" class="glass pointer h-40 w-40 column align-center justify-center g-10 circle">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </div>
        <strong class="font-weight-700 font-size-1">Share Receipt</strong>
       <span class="pointer" onclick="ShareReceipt()">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M13 13V18.585L14.8284 16.7574L16.2426 18.1716L12 22.4142L7.75736 18.1716L9.17157 16.7574L11 18.585V13H13ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z"></path></svg>

       </span>
       </div>
       {{-- overlay body --}}
       <div class="overlay-body flex-1 overflow-auto p-20 column g-20">
        <div class="w-full overflow-hidden receipt-contents column pos-relative g-10 br-10 bg-light p-20">
               {{-- bg img --}}

            <div data-src="{{ asset(config('settings.logo')) }}" class="bg-img">
        <img src="{{ asset(config('settings.logo')) }}">

            </div>
            {{-- new row --}}
            <div class="row w-full g-10 space-between align-center">
                <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-30 no-pointer no-select">
                <span>Transaction Receipt</span>
            </div>
            {{-- new --}}
            <strong class="font-size-1-5 font-weight-900 m-top-20 m-x-auto block text-center">{{ Auth::guard('users')->user()->currency.number_format($data->amount,2) }}</strong>
          {{-- new --}}
            <div class="status m-x-auto {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : 'red') }}">{{ $data->status }}</div>
            <span class="font-weight-500 row m-x-auto opacity-07 break-word text-align-end">{{ $data->frame.$data->meridian }}</span>
            
            {{-- new --}}
            <div style="--hr-color:var(--rgt-03)" class="hr" vitecss-type='dashed'></div>
            {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">Transaction Type</span>
            <span class="font-weight-500 break-word text-align-end">{{ $data->title }}</span>
        </div>
         {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">Transaction ID</span>
            <span class="font-weight-500 break-word text-align-end row g-5 align-center">
                {{ $data->uniqid }}
                
            </span>
        </div>
         {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07 ws-nowrap">Session ID</span>
            <span class="font-weight-500 break-word text-align-end row g-5 align-center">
                {{ $session_id }}
               
            </span>
        </div>
         @isset($data->data)
            @foreach (json_decode($data->data) as $key=>$value)
                  {{-- new row --}}
        <div class="row g-10 space-between w-full">
            <span class="opacity-07">{{ $key }}</span>
            <span class="font-weight-500 break-word text-align-end">{{ $value }}</span>
        </div>
            @endforeach
        @endisset
        {{-- hr --}}
        <div class="hr" vitecss-type="dashed" style="--hr-color:var(--rgt-03)"></div>
         <small class="opacity-07 text-center block">
            Enjoy a better earning experience with Earnify. Get instant payouts, daily rewards, flexible job opportunities, and weekly support — all from one dashboard. Earnify is officially registered under the Federal Republic of Nigeria.

         </small>
        </div>
       </div>
    </section>
@endsection
@section('js')
{{-- html2canvas --}}
<script src="{{ asset('vitecss/js/html2canvas.min.js') }}"></script>
    <script class="js">
        function CreateBGImg(){
          try{
              let totalX=Math.round(document.querySelector('.bg-img').getBoundingClientRect().width / document.querySelector('.bg-img img').getBoundingClientRect().width) * Math.round(document.querySelector('.bg-img').getBoundingClientRect().height / document.querySelector('.bg-img img').getBoundingClientRect().height);
              let totalColumn=Math.round(document.querySelector('.bg-img').getBoundingClientRect().width / document.querySelector('.bg-img img').getBoundingClientRect().width);
              document.querySelector('.bg-img').style.gridTemplateColumns='repeat(' + totalColumn + ',1fr)';
              for(let i=0;i < totalX;i++){
                let img=document.createElement('img');
                img.src=document.querySelector('.bg-img').dataset.src;
                document.querySelector('.bg-img').appendChild(img);
            }
          }catch(error){
            alert(error)
          }
        }
        function PageStyle(){
            document.querySelector('.overlay-body').style.maxHeight=document.querySelector('.receipt-overlay').offsetHeight - document.querySelector('.overlay-header').offsetHeight + 'px';
            document.querySelector('.receipt-body').style.marginBottom=document.querySelector('.receipt-footer').offsetHeight + 'px';
            document.querySelector('.receipt-body').style.marginTop=document.querySelector('.receipt-header').offsetHeight + 'px';
            document.querySelector('.overlay-body').style.marginTop=document.querySelector('.overlay-head').offsetHeight + 'px';
        }
        window.addEventListener('load',()=>{
            PageStyle();
            CreateBGImg();
        });
        document.addEventListener('vitecss:navigated',()=>{
            PageStyle();
            CreateBGImg();
        });
        // new
        async function ShareReceipt(){
        try{
             let canvas=  await html2canvas(document.querySelector('.overlay-body'),{
                scale : 2,
                useCORS : true,
                backgroundColor : 'black'
            });

            let link=document.createElement('a');
            link.download='receipt.png';
            link.href=canvas.toDataURL('image/png');
            link.click();

        }catch(error){
            alert(error);
        }
        }
    </script>
@endsection