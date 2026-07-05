@extends('layout.users.app')
@section('title')
    Withdraw
@endsection
@section('css')
    <style class="css">
        .balance.active{
            border:1px solid var(--primary-05);
            background:var(--primary-02);
            animation:activate 0.5s ease forwards;
        }
        @keyframes activate{
            0%,100%{
                transform: scale(1);
            }
            50%{
                transform:scale(0.95);
            }

        }
        @media(min-width:800px){
              .overlay-body{
            padding-left:10vw;
            padding-right:10vw;
        }
        }
      
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
      
      <form onsubmit="PostRequest(event,this,Withdrawn)" method="POST" action="{{ url('users/post/withdraw/process') }}" withdrawal-form class="column g-10px w-full">
       {{-- csrf token --}}
       <input type="hidden" class="input inp" name="_token" value="{{ @csrf_token() }}">
        <div class="row w-full g-10 align-center space-between">
           <div class="column g-2px">
             <strong class="desc font-weight-900">Withdrawal Portal</strong>
        <span class="opacity-07">Withdraw your earnings straight into your local bank account.</span>
  </div> 
  <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="glass h-40 w-40 circle no-shrink column alugn-center justify-center pc-pointer">
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V9.99979H22.0049ZM22.0049 7.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V7.99979ZM15.0049 15.9998V17.9998H19.0049V15.9998H15.0049Z"></path></svg>

    </div> 
        </div>

        <span class="m-right-auto m-top-10px">Select Wallet</span>
   {{-- new grid --}}
   
   <div style="grid-template-columns:repeat(auto-fit,minmax(150px,1fr));" class="grid w-full place-center g-10px">
   {{-- new balance --}}
    <div onclick="ChooseBalance(this,'main_balance','{{ $withdrawal_settings->main_balance->portal }}','{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()->name }}')" class="w-full {{ $withdrawal_settings->main_balance->portal == 'off' ? 'filter-grayscale-100 opacity-07' : '' }} transition-ease-05s no-select pc-pointer column balance g-10 p-13 g-4 br-8px bg-light border-width-1px border-style-solid border-color-rgt-01">
       <div class="row w-full g-10">
         <div class="h-40px no-shrink w-40px br-6px column align-center justify-center bg-primary-01 c-primary">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 5H20V3H4V5ZM20 9H4V7H20V9ZM9 13H15V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11H9V13Z"></path></svg>

        </div>
        {{-- new column --}}
        <div class="column g-2px">
            <strong class="font-weight-600 font-size-1 capitalize">{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','main_balance')->first()->name }}</strong>
            <span class="font-weight-500">{{ Auth::guard('users')->user()->currency.number_format(Auth::guard('users')->user()->main_balance,2) }}</span>
        </div>
       </div>
      
    </div>
   {{-- new balance --}}
    <div onclick="ChooseBalance(this,'affiliate_balance','{{ $withdrawal_settings->affiliate_balance->portal }}','{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','affiliate_balance')->first()->name }}')" class="w-full  {{ $withdrawal_settings->affiliate_balance->portal == 'off' ? 'filter-grayscale-100 opacity-07' : '' }} transition-ease-05s column no-select pc-pointer balance g-10 p-13 g-4 br-8px bg-light border-width-1px border-style-solid border-color-rgt-01">
       <div class="row w-full g-10px">
         <div class="h-40px no-shrink w-40px br-6px column align-center justify-center bg-primary-01 c-primary">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>

        </div>
        {{-- new column --}}
        <div class="column g-2px">
            <strong class="font-weight-600 font-size-1 capitalize">{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','affiliate_balance')->first()->name }}</strong>
            <span class="font-weight-500">{{ Auth::guard('users')->user()->currency.number_format(Auth::guard('users')->user()->affiliate_balance,2) }}</span>
        </div>
       </div>
    </div>
   {{-- new balance --}}
    
    <div onclick="ChooseBalance(this,'gaming_balance','{{ $withdrawal_settings->gaming_balance->portal }}','{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','gaming_balance')->first()->name }}')" class="w-full  {{ $withdrawal_settings->gaming_balance->portal == 'off' ? 'filter-grayscale-100 opacity-07' : '' }} column transition-ease-05s no-select pc-pointer balance g-10 p-13 g-4 br-8px bg-light border-width-1px border-style-solid border-color-rgt-01">
       <div class="row w-full g-10px">
         <div class="h-40px no-shrink w-40px br-6px column align-center justify-center bg-primary-01 c-primary">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17 4C20.3137 4 23 6.68629 23 10V14C23 17.3137 20.3137 20 17 20H7C3.68629 20 1 17.3137 1 14V10C1 6.68629 3.68629 4 7 4H17ZM10 9H8V11H6V13H7.999L8 15H10L9.999 13H12V11H10V9ZM18 13H16V15H18V13ZM16 9H14V11H16V9Z"></path></svg>

        </div>
        
        {{-- new column --}}
        <div class="column g-2px">
            <strong class="font-weight-600 font-size-1 capitalize">{{ collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('key','gaming_balance')->first()->name }}</strong>
            <span class="font-weight-500">{{ Auth::guard('users')->user()->currency.number_format(Auth::guard('users')->user()->gaming_balance,2) }}</span>
        </div>
       </div>
    </div>
   </div>
   {{-- selected balance/wallet --}}
        <input type="hidden" class="inp bg-transparent input" name="wallet">
        {{-- transaction pin --}}
        <input type="hidden" class="inp bg-transparent input" trx-pin name="pin" value="">
   {{-- new input --}}
   <div class="column g-5px m-top-25px w-full">
    <label>Withdrawal Amount({{ Auth::guard('users')->user()->currency }})</label>
    <div class="cont bg-rgt-007">
        <input oninput="document.querySelector('[amount-entered]').innerHTML=FormatNumber(parseFloat(this.value),2);" placeholder="0.00" type="number" name="amount" inputmode="numeric" class="inp input required">
    </div>
   </div>
   @if (!isset(Auth::guard('users')->user()->bank))
       <span class="c-coral">
        You must link a payout account to place withdrawals, <a class="c-limegreen u" onclick="event.preventDefault();Redirect('{{ url('users/payout/settings') }}')"> click Here to link your payout account.</a> 
       </span>
   @endif

   <button onclick="ValidateInputs(this,event)" class="post {{ !isset(Auth::guard('users')->user()->bank) ? 'pointer-events-none opacity-07 filter-grayscale-50' : '' }}">Proceed</button>
          <button class="post post-btn display-none"></button>
    
</form>
    </section>
    {{-- review overlay --}}
    <section class="overlay overflow-hidden display review">
        {{-- new row --}}
        <div class="row w-full overlay-header pos-absolute top-0 left-0 right-0 z-index-100 align-center g-10 space-between bg-light p-15px">
            <div onclick="this.closest('.overlay').classList.remove('active');" class="glass h-40 w-40 circle column align-center justify-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

            </div>
            <strong class="font-weight-800 font-size-1rem">Review & Confirm</strong>
            <span></span>
        </div>
        {{-- overlay body --}}
        <div class="overlay-body overflow-auto w-full column g-10px p-15px">
        <span class="opacity-07">Confirm Your withdrawal details before proceeding</span>
            {{-- new --}}
            <div class="w-full m-top-20px br-10px column g-10px p-20px bg-light border-width-1px border-color-rgt-01 border-style-solid">
                <div class="w-full row align-center space-between border-bottom-width-1px border-bottom-color-rgt-01 border-bottom-style-solid p-bottom-10px">
                    <span class="opacity-08">Wallet</span>
                    <span class="font-weight-500" wallet-selected></span>
                </div>
                <div class="w-full row align-center space-between">
                    <span class="opacity-08">Amount</span>
                    <span class="font-weight-500">{{ Auth::guard('users')->user()->currency }}<span amount-entered></span></span>
                </div>
            </div>
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
                {{-- new row --}}
                <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row align-center c-primary-lighter m-left-auto pointer g-3px">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L9.29145 10.4627L9.29886 14.7099L13.537 14.7024L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

                    <span>Update Withdrawal bank</span>
                </div>
            </div>
        @endisset
            <div class="w-full m-top-20px br-10px column g-10px p-20px bg-light border-width-1px border-color-rgt-01 border-style-solid">
           <span>IMPORTANT</span>
           {{-- new row --}}
           <div class="row w-full g-10">
            <div class="h-20 perfect-square no-shrink column align-center circle justify-center bg-primary-02 c-primary">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

            </div>
            <span>Double check your withdrawal bank to avoid loss of funds.</span>
           </div>
           {{-- new row --}}
           <div class="row w-full g-10">
            <div class="h-20 perfect-square no-shrink column align-center circle justify-center bg-primary-02 c-primary">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

            </div>
            <span>Do not expose your transaction pin.</span>
           </div>
          
            </div>

        <button onclick="document.querySelector('.overlay.payment-pin').classList.add('active')" class="post min-h-50">Confirm Withdrawal</button>

        </div>

    </section>

    {{-- payment pin overlay --}}
    <section class="overlay payment-pin opacity">
          {{-- new row --}}
        <div class="row w-full overlay-header pos-absolute top-0 left-0 right-0 z-index-100 align-center g-10 space-between bg-light p-15px">
            <div onclick="this.closest('.overlay').classList.remove('active');" class="glass h-40 w-40 circle column align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

            </div>
            <strong class="font-weight-800 font-size-1rem">Transaction Pin</strong>
            <span></span>
        </div>
        {{-- overlay body --}}
        <div class="overlay-body pc-align-center overflow-auto w-full column g-10px p-15px">
           
          @isset(Auth::guard('users')->user()->transaction_pin)
           <strong class="font-weight-900 font-size-1-1">Transaction Pin</strong>
            <span class="opacity-07 font-weight-700">Enter your 6-digit transaction pin</span>
                {{-- new row --}}
            <div class="row w-full g-10 m-top-20px trx-pin align-center justify-center">
                <input placeholder="*" type="password" inputmode="numeric" maxlength="1" class="h-50px w-50px no-shrink bg-rgt-007 br-4px text-align-center border-width-1px border-color-rgt-01 border-style-solid">
                <input placeholder="*" type="password" inputmode="numeric" maxlength="1" class="h-50px w-50px no-shrink bg-rgt-007 br-4px text-align-center border-width-1px border-color-rgt-01 border-style-solid">
                <input placeholder="*" type="password" inputmode="numeric" maxlength="1" class="h-50px w-50px no-shrink bg-rgt-007 br-4px text-align-center border-width-1px border-color-rgt-01 border-style-solid">
                <input placeholder="*" type="password" inputmode="numeric" maxlength="1" class="h-50px w-50px no-shrink bg-rgt-007 br-4px text-align-center border-width-1px border-color-rgt-01 border-style-solid">
                <input placeholder="*" type="password" inputmode="numeric" maxlength="1" class="h-50px w-50px no-shrink bg-rgt-007 br-4px text-align-center border-width-1px border-color-rgt-01 border-style-solid">
                <input placeholder="*" type="password" inputmode="numeric" maxlength="1" class="h-50px w-50px no-shrink bg-rgt-007 br-4px text-align-center border-width-1px border-color-rgt-01 border-style-solid">
            </div>
            <span onclick="Redirect('{{ url('users/transaction/pin') }}')" class="font-weight-500 pointer no-select">Click to reset pin</span>
        <button onclick="PlaceWithdrawal(this)" style="margin-top:auto;" class="post">Place Withdrawal</button>
        @else
            <span class="text-center c-coral">
            You haven't set your transaction pin yet, for security reasons, transaction pin is required to process all withdrawals on {{ config('app.name') }}
            </span>
            <div onclick="Redirect('{{ url('users/transaction/pin') }}')" class="p-y-30px g-4px no-select bg-light w-full br-10 c-limegreen row align-center justify-center">
              
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17 14H12.6586C11.8349 16.3304 9.61244 18 7 18C3.68629 18 1 15.3137 1 12C1 8.68629 3.68629 6 7 6C9.61244 6 11.8349 7.66962 12.6586 10H23V14H21V18H17V14ZM7 14C8.10457 14 9 13.1046 9 12C9 10.8954 8.10457 10 7 10C5.89543 10 5 10.8954 5 12C5 13.1046 5.89543 14 7 14Z"></path></svg>

                Click to Set Transaction Pin
            </div>
        @endisset
       
        </div>

    </section>
    
@endsection
@section('js')
    <script class="js">
        function PageStyles(){
           try{
             document.querySelectorAll('.overlay').forEach((ovl)=>{
                if(ovl.querySelector('.overlay-header')){
                    ovl.querySelector('.overlay-body').style.marginTop=ovl.querySelector('.overlay-header').getBoundingClientRect().height + 'px';
                    ovl.querySelector('.overlay-body').style.maxHeight=Math.abs(ovl.getBoundingClientRect().height - ovl.querySelector('.overlay-header').getBoundingClientRect().height) + 'px';
                    ovl.querySelector('.overlay-body').style.height=Math.abs(ovl.getBoundingClientRect().height - ovl.querySelector('.overlay-header').getBoundingClientRect().height) + 'px';
                    
                }
            });
            let mbh=0;
            document.querySelectorAll('.balance').forEach((bal)=>{
                if(bal.offsetHeight > mbh){
                    mbh=bal.offsetHeight;
                }
            })
            document.querySelectorAll('.balance').forEach((bal)=>{
                bal.style.height=mbh + 'px';
            })
           }catch(error){
            alert(error);
           }
        }

        // new 
        function Refocus(){
            let inputs=document.querySelectorAll('.trx-pin input');
            let pin='';
            inputs.forEach((input,index)=>{
                input.addEventListener('input',()=>{
                    if(input.value.trim().length > 0){
                        if(inputs[index + 1]){
                        inputs[index + 1].focus();

                        }
                    }else{
                        if(inputs[index - 1]){
                        inputs[index - 1].focus();

                        }
                    }
                    pin='';
                    inputs.forEach((inp)=>{
                        pin=pin + inp.value;
                        document.querySelector('input[trx-pin]').value=pin;
                    })
                });

                input.addEventListener('keydown',function(e){
                    if(e.key.toLowerCase() === 'backspace' && this.value == ''){
                        if(inputs[index - 1]){
                            inputs[index - 1].focus();
                             pin='';
                    inputs.forEach((inp)=>{
                        pin=pin + inp.value;
                        document.querySelector('input[trx-pin]').value=pin;
                    })
                        }
                    }
                })

            })
        }
        // load
        window.addEventListener('load',()=>{
            PageStyles();
            Refocus();
        });
        document.addEventListener('vitecss:navigated',()=>{
            PageStyles();
            Refocus();
        });
        // new
        function ChooseBalance(element,bal,portal,wallet){
            if(portal == 'off'){
                CreateNotify('info',`${wallet} Withdrawal portal is currently off, please check back later`);
                return;
            }
           document.querySelectorAll('.balance').forEach((data)=>{
            data.classList.remove('active');
           });
           element.classList.add('active'); 
           document.querySelector('input[name=wallet]').value=bal;
           document.querySelector('[wallet-selected]').innerHTML=wallet;
        }
        // new
        function ValidateInputs(element,event){
            event.preventDefault();
            if(document.querySelector('input[name=wallet]').value.trim() == ''){
                CreateNotify('error','Please select a withdrawal wallet');
                return;
            }
            if(document.querySelector('input[name=amount]').value.trim() == ''){
                CreateNotify('error','Please enter withdrawal amount');
                return;
            }

            document.querySelector('.overlay.review').classList.add('active');
        }

        // place withdrawal
        function PlaceWithdrawal(element){
            if(document.querySelector('input[trx-pin]').value.length != 6){
                CreateNotify('error','Please enter a valid 6-digits transaction pin');
                return;
            }else{
                document.querySelectorAll('.overlay').forEach((ovlay)=>{
                    ovlay.classList.remove('active');
                })
                document.querySelector('form[withdrawal-form] .post-btn').click();
            }
        }

        // new 
        function Withdrawn(response){
            let data=JSON.parse(response);
            if(data.status === 'success'){
                Redirect(data.url);
            }
        }

        
    </script>
@endsection