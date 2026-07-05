@extends('layout.users.app')
@section('title')
    Payout Settings
@endsection
@section('css')
    <style class="css">
        header,footer,nav{
            display:none;
        }
        main{
            margin-left:0;
            max-width:100%;
            padding:0;
            width:100%;
        }
        .bank-cont .selected{
            display:none;
        }
        .bank-cont.active .not-selected{
            display:none;
        }
        .bank-cont.active .selected{
            display:flex;
        }
      
    </style>
@endsection
@section('main')
    <section class="w-full column">
        <section class="w-full z-index-500 page-head g-10 align-center pos-fixed top-0 left-0 right-0 p-15 bg-light row align-center space-between space-between">
            <div onclick="Redirect('{{ url()->previous() == url()->current() ? url('users/dashboard') : url()->previous() }}')" class="h-40 pc-pointer perfect-square glass circle column align-center justify-center no-shrink no-select pointer">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

            </div>
            <strong class="font-weight-800 font-size-1">Payout Settings</strong>
            <span></span>
        </section>
    <section class="page-contents max-w-500 m-x-auto p-top-0 column g-10 p-20 w-full">
        <span class="opacity-07">Configure the primary destination for all your withdrawals</span>
        @isset(Auth::guard('users')->user()->bank)
            <div class="w-full g-10px column no-select border-width-1px p-20 border-color-primary-05 bg-primary-02 br-10 border-style-solid">
                {{-- new row --}}
                <div class="row w-full align-center space-between g-10">
                    <strong class="font-weight-500 font-size-09">
                        {{ json_decode(Auth::guard('users')->user()->bank)->bank_name }}
                    </strong>
                    <i class="c-primary">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM20.0049 10.9998H4.00488V18.9998H20.0049V10.9998ZM20.0049 8.99979V4.99979H4.00488V8.99979H20.0049ZM14.0049 14.9998H18.0049V16.9998H14.0049V14.9998Z"></path></svg>

                    </i>
                </div>
                {{-- new row --}}
                <strong class="font-size-1-2 font-weight-700">
                    {{ json_decode(Auth::guard('users')->user()->bank)->account_name }}
                </strong>
                {{-- new --}}
                <span class="opacity-07">
                    **** **{{ substr(json_decode(Auth::guard('users')->user()->bank)->account_number,6,4) }}

                </span>
            </div>
        @endisset
        {{-- new --}}
           <div onclick="document.querySelector('.overlay.add-bank').classList.add('active');" class="w-full c-whatsapp p-20 p-y-30 pointer no-select row align-center g-5 justify-center bg-light br-10">
            <i class="row align-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"></path></svg>
            </i>
            <span class="font-weight-500">{{ isset(Auth()->guard('users')->user()->bank) ? 'Update' : 'Add'  }} bank Account</span>
           </div>
    </section>
    </section>
    {{-- overlay --}}
    <section class="overlay right add-bank">
         <section class="w-full z-index-500 overlay-head g-10 align-center pos-absolute top-0 left-0 right-0 p-15 bg-light row align-center space-between space-between">
            <div onclick="this.closest('.overlay').classList.remove('active')" class="h-40 perfect-square glass circle column align-center justify-center no-shrink no-select pointer">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

            </div>
            <strong class="font-weight-700 font-size-1">{{ isset(Auth()->guard('users')->user()->bank) ? 'Update' : 'Add'  }} Bank Account</strong>
            <span></span>
        </section>
        <section class="column max-w-500px overflow-auto m-x-auto g-5 overlay-contents p-20 align-center text-center">
            <strong class="font-size-1 font-weight-600">{{ isset(Auth()->guard('users')->user()->bank) ? 'Update' : 'Add'  }} Bank Account</strong>
            <span class="c-whatsapp g-3px row align-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598L12 1ZM16.4524 8.22183L11.5019 13.1709L8.67421 10.3431L7.25999 11.7574L11.5026 16L17.8666 9.63604L16.4524 8.22183Z"></path></svg>

                {{ config('app.name') }} Protects your information</span>
            <form action="{{ url('users/post/update/payout/process') }}" method="POST" onsubmit="PostRequest(event,this,Updated)" class="w-full text-align-start m-top-15 column g-10">
             {{-- csrf token --}}
             <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Account Number</label>
                    <div class="cont bg-light">
                        <input placeholder="Enter account number" type="number" name="account_number" inputmode="numeric" class="inp input required">
                    </div>
                </div>
                {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Bank</label>
                    <div onclick="this.classList.remove('empty');document.querySelector('.overlay.nigeria-banks').classList.add('active')" class="cont pc-pointer bank-cont no-select p-10 bg-light">
                        <div class="row not-selected w-full g-7px align-center space-between">
                            <span class="opacity-07">Click to select</span>
                            <i>
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                            </i>
                        </div>
                         <div class="row selected w-full g-7px align-center">
                            <div class="h-25 bg-rgt-10 w-25 no-shrink circle column align-center justify-center p-2px no-pointer no-select">
                    <img src="" alt="" class="w-full bank-photo h-full br-inherit">
                </div>

                            <span class="bank-name max-w-full text-ellipsis "></span>
                           
                        </div>
                        <input type="hidden" name="bank_name" class="inp input required">
                    </div>
                </div>
                 {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Account Name</label>
                    <div class="cont bg-light">
                        <input placeholder="Enter account name" name="account_name" type="text" class="inp input required">
                    </div>
                </div>

                <button class="post">{{ isset(Auth()->guard('users')->user()->bank) ? 'Update' : 'Add'  }} Bank</button>
            </form>
        </section>
    </section>

     {{-- overlay --}}
    <section class="overlay overflow-hidden bottom nigeria-banks">
         <section class="w-full z-index-500 overlay-head g-10 align-center pos-absolute top-0 left-0 right-0 p-15 bg-light row align-center space-between space-between">
            <div onclick="this.closest('.overlay').classList.remove('active')" class="h-40 perfect-square glass circle column align-center justify-center no-shrink no-select pointer">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

            </div>
            <strong class="font-weight-700 font-size-1">Select Bank</strong>
            <span></span>
        </section>
        <section class="column banks-list overflow-auto text-align-start g-15 overlay-contents p-20">
            <div class="w-full house h-40px min-h-40px bg-rgt-007 row align-center g-4 p-right-6px br-4px border-width-1px border-style-solid border-color-rgt-01">
               <input oninput="SearchBanks(this)" placeholder="Search Banks...." type="text" class="search-bank border-0 w-full h-full bg-transparent">
            <div onclick="this.closest('.house').querySelector('.search-bank').value='';this.classList.add('display-none');this.closest('.banks-list').querySelectorAll('.bank-list.display-none').forEach((bnk)=>{bnk.classList.remove('display-none')})" class="h-20 clear-search w-20 bg-rgt-01 column no-shrink display-none align-center justify-center c-rgt-05 circle">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

            </div>
            </div>
            @foreach ($nigeria_banks as $bank)
               <div onclick="Selectbank(this,'{{ $bank->name }}','{{ asset('nigeriabanks/'.$bank->logo.'') }}')" data-name="{{  $bank->name }}" class="w-full bank-list pc-pointer border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-01 p-6px no-select row align-center g-10">
                <div class="h-30 bg-rgt-10 w-30 no-shrink circle column align-center justify-center p-2px no-pointer no-select">
                    <img src="{{ asset('nigeriabanks/'.$bank->logo.'') }}" alt="" class="w-full h-full br-inherit">
                </div>
                <span>{{ $bank->name }}</span>
               </div>
           @endforeach
          
        </section>
    </section>
@endsection
@section('js')
    <script class="js">
        function Selectbank(element,name,logo){
            try{
             document.querySelector('.bank-cont .bank-name').innerHTML=name;
            document.querySelector('.bank-cont .bank-photo').src=logo;
            document.querySelector('.bank-cont').classList.add('active');
            element.closest('.overlay').classList.remove('active');
             document.querySelector('input.search-bank').value='';
             document.querySelector('.clear-search').classList.add('display-none');
             document.querySelectorAll('.bank-list').forEach((bnk)=>{
                bnk.classList.remove('display-none');
             });
           element.closest('.banks-list').scrollTo(0,0);
           document.querySelector('input[name=bank_name]').value=name;
          

          
            }catch(error){
                alert(error)
            } 
        }
        // new
        function SearchBanks(element){
           try{
            if(element.value != ''){
                document.querySelector('.clear-search').classList.remove('display-none');
            }else{
                document.querySelector('.clear-search').classList.add('display-none');

            }
             document.querySelectorAll('.bank-list').forEach((bank)=>{
                if((bank.dataset.name).toLowerCase().includes(element.value.toLowerCase())){
                    bank.classList.remove('display-none');
                }else{
                    bank.classList.add('display-none');
                }
            })
           }catch(error){
            alert(error)
           }
        }
        // new
        function PageStyles(){
            document.querySelector('.page-contents').style.marginTop=document.querySelector('.page-head').offsetHeight + 'px';
            document.querySelectorAll('.overlay-contents').forEach((ovc)=>{
            ovc.style.maxHeight=ovc.closest('.overlay').getBoundingClientRect().height - ovc.closest('.overlay').querySelector('.overlay-head').getBoundingClientRect().height + 'px';
                ovc.style.marginTop=ovc.closest('.overlay').querySelector('.overlay-head').offsetHeight + 'px';
            })
        }

        window.addEventListener('load',()=>{
            PageStyles();
        });
        document.addEventListener('vitecss:navigated',()=>{
            PageStyles();
        })
        // new 
        function Updated(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url()->current() }}')
            }
        }
    </script>
@endsection