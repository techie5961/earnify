@extends('layout.users.app')
@section('title')
    Games
@endsection
@section('main')
    <section x-data="{ 
        VoucherForm : false,
        MaxHeight : 0,
        Results : [
            {
    Phone: '90****4321',
    Amount: '9,500',
    Game: 'Memory Game'
  },
  {
    Phone: '81****6789',
    Amount: '8,200',
    Game: 'Memory Game'
  },
  {
    Phone: '70****3456',
    Amount: '10,100',
    Game: 'Memory Game'
  },
  
  
  {
    Phone: '91****1234',
    Amount: '16,700',
    Game: 'Cube Game'
  },
  {
    Phone: '80****5678',
    Amount: '15,500',
    Game: 'Cube Game'
  },
  
  
  {
    Phone: '70****7890',
    Amount: '7,800',
    Game: 'Memory Game'
  },
  {
    Phone: '90****2345',
    Amount: '11,300',
    Game: 'Memory Game'
  },
  {
    Phone: '81****9012',
    Amount: '6,900',
    Game: 'Memory Game'
  },
  {
    Phone: '91****4567',
    Amount: '8,800',
    Game: 'Memory Game'
  },
  
  
  {
    Phone: '80****2345',
    Amount: '12,300',
    Game: 'Cube Game'
  },
  {
    Phone: '70****6789',
    Amount: '18,900',
    Game: 'Cube Game'
  },
  {
    Phone: '90****8901',
    Amount: '14,200',
    Game: 'Cube Game'
  },
  {
    Phone: '81****3456',
    Amount: '22,500',
    Game: 'Cube Game'
  },
  
  
  {
    Phone: '91****7890',
    Amount: '9,700',
    Game: 'Memory Game'
  },
  {
    Phone: '80****1234',
    Amount: '8,500',
    Game: 'Memory Game'
  },
  {
    Phone: '70****5678',
    Amount: '10,600',
    Game: 'Memory Game'
  },
  {
    Phone: '90****9012',
    Amount: '7,400',
    Game: 'Memory Game'
  },
  {
    Phone: '81****2345',
    Amount: '11,900',
    Game: 'Memory Game'
  },
  
  
  {
    Phone: '91****6789',
    Amount: '19,100',
    Game: 'Cube Game'
  },
  {
    Phone: '80****8901',
    Amount: '11,800',
    Game: 'Cube Game'
  },
  {
    Phone: '70****1234',
    Amount: '17,400',
    Game: 'Cube Game'
  },
  {
    Phone: '90****5678',
    Amount: '21,300',
    Game: 'Cube Game'
  },
  {
    Phone: '81****9012',
    Amount: '13,700',
    Game: 'Cube Game'
  },
  
  
  {
    Phone: '91****3456',
    Amount: '10,800',
    Game: 'Memory Game'
  },
  {
    Phone: '80****7890',
    Amount: '7,200',
    Game: 'Memory Game'
  },
  {
    Phone: '70****2345',
    Amount: '9,300',
    Game: 'Memory Game'
  },
  {
    Phone: '90****6789',
    Amount: '12,400',
    Game: 'Memory Game'
  },
  {
    Phone: '81****0123',
    Amount: '8,100',
    Game: 'Memory Game'
  },
  {
    Phone: '91****4567',
    Amount: '6,700',
    Game: 'Memory Game'
  },
  
  
  {
    Phone: '80****8901',
    Amount: '13,600',
    Game: 'Cube Game'
  },
  {
    Phone: '70****2345',
    Amount: '20,000',
    Game: 'Cube Game'
  },
  {
    Phone: '90****6789',
    Amount: '16,200',
    Game: 'Cube Game'
  },
  {
    Phone: '81****0123',
    Amount: '18,500',
    Game: 'Cube Game'
  },
  
  
  {
    Phone: '91****4567',
    Amount: '11,500',
    Game: 'Memory Game'
  },
  {
    Phone: '80****8901',
    Amount: '9,800',
    Game: 'Memory Game'
  },
  {
    Phone: '70****2345',
    Amount: '8,900',
    Game: 'Memory Game'
  },
  {
    Phone: '90****6789',
    Amount: '10,200',
    Game: 'Memory Game'
  },
  
  
  {
    Phone: '81****0123',
    Amount: '24,100',
    Game: 'Cube Game'
  },
  {
    Phone: '91****4567',
    Amount: '19,800',
    Game: 'Cube Game'
  },
  {
    Phone: '80****8901',
    Amount: '15,300',
    Game: 'Cube Game'
  },
  {
    Phone: '70****2345',
    Amount: '22,700',
    Game: 'Cube Game'
  },
  
  
  {
    Phone: '90****6789',
    Amount: '7,600',
    Game: 'Memory Game'
  },
  {
    Phone: '81****0123',
    Amount: '13,200',
    Game: 'Memory Game'
  },
  {
    Phone: '91****4567',
    Amount: '10,500',
    Game: 'Memory Game'
  },
  
  
  {
    Phone: '80****8901',
    Amount: '17,900',
    Game: 'Cube Game'
  },
  {
    Phone: '70****2345',
    Amount: '21,600',
    Game: 'Cube Game'
  },
  {
    Phone: '90****6789',
    Amount: '14,800',
    Game: 'Cube Game'
  },
  {
    Phone: '81****0123',
    Amount: '25,300',
    Game: 'Cube Game'
  }
        ],
        Result :  {
                Phone : '803****325',
                Amount : '2,500',
                Game : 'Memory Game'
             },
        CurrentResult : 0,
        ShowResult : true
     }" x-init="$watch('VoucherForm', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden');
        }else{
            document.body.classList.remove('overflow-hidden');

        }
     });
     setInterval(() => {
        ShowResult = false;
       
        setTimeout(() => {
             Result = Results[(CurrentResult + 1) % Results.length];
        CurrentResult = (CurrentResult + 1) % Results.length;
            ShowResult = true;
        }, 700);
     }, 5000);
     " class="w-full column g-10px">
        {{-- new column --}}
        <div class="row space-between g-10px">
            <strong class="desc font-weight-900">
               {{ config('app.name') }} Games
            </strong>
            <div x-on:click="VoucherForm = true" class="bg-primary pointer p-5 p-x-10px br-5px row align-center g-5px no-select pointer">
                Redeem Voucher
            </div>
        </div>
          {{-- fixed modal --}}
        <div x-show="VoucherForm" x-transition.duration.500ms x-on:click="VoucherForm=false" class="pos-fixed p-20px bg-black-transparent inset-0 column z-index-3000 align-center justify-center g-10px backdrop-blur-5px">
            <form x-on:submit.prevent="PostRequest(event,$el,function(response){
              let data=JSON.parse(response);
              if(data.status == 'success'){
                VoucherForm = false;
                $el.reset();
              }
            })" action="{{ url('users/post/redeem/game/voucher/process') }}" method="POST" x-on:click.stop="" class="w-full max-w-500 column g-10px align-center text-center p-20px bg-light border-width-1px border-style-solid border-color-rgt-01 br-10px">
                <div class="h-50 w-50 no-shrink circle column align-center justify-center g-10px bg-rgt-01 c-primary">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 9.49966V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V14.4997C3.38559 14.4997 4.50488 13.3804 4.50488 11.9997C4.50488 10.619 3.38559 9.49966 2.00488 9.49966ZM9.00488 8.99966V10.9997H15.0049V8.99966H9.00488ZM9.00488 12.9997V14.9997H15.0049V12.9997H9.00488Z"></path></svg>

                </div>
                <span class="font-size-1 font-weight-900">Redeem Game Voucher</span>
                <span class="opacity-07">Enter the voucher and click on the button to redeem your game voucher.</span>
              {{-- csrf token --}}
              <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
               <div class="column w-full text-align-start m-top-20px g-5px">
                <label>Game Voucher</label>
                 <div class="cont">
                    <input name="code" type="text" placeholder="XXX-XXX-XXX-XXX" class="inp input required">
                </div>
               </div>
                <button class="post">Redeem Voucher</button>
            </form>
        </div>

        {{-- banner --}}
        <img src="{{ asset('banners/IMG_8692-compressed.jpeg') }}" alt="" class="w-full no-select no-pointer max-w-500 m-x-auto br-10px">
       {{-- results --}}
        <div class="p-7px overflow-hidden p-x-10px w-full row align-center g-10px br-10px bg-light border-width-1px border-color-rgt-02 border-style-solid">
        <i class="opacity-07">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 16.0001H5.88889L11.1834 20.3319C11.2727 20.405 11.3846 20.4449 11.5 20.4449C11.7761 20.4449 12 20.2211 12 19.9449V4.05519C12 3.93977 11.9601 3.8279 11.887 3.73857C11.7121 3.52485 11.3971 3.49335 11.1834 3.66821L5.88889 8.00007H2C1.44772 8.00007 1 8.44778 1 9.00007V15.0001C1 15.5524 1.44772 16.0001 2 16.0001ZM23 12C23 15.292 21.5539 18.2463 19.2622 20.2622L17.8445 18.8444C19.7758 17.1937 21 14.7398 21 12C21 9.26016 19.7758 6.80629 17.8445 5.15557L19.2622 3.73779C21.5539 5.75368 23 8.70795 23 12ZM18 12C18 10.0883 17.106 8.38548 15.7133 7.28673L14.2842 8.71584C15.3213 9.43855 16 10.64 16 12C16 13.36 15.3213 14.5614 14.2842 15.2841L15.7133 16.7132C17.106 15.6145 18 13.9116 18 12Z"></path></svg>

        </i>
        <div x-transition:leave-start="bottom-leave-start" x-transition:leave-end="bottom-leave-end" x-transition:enter-start="top-enter" x-transition:enter-end="top-enter-end" x-show="ShowResult" class="ws-nowrap transition-all font-size-07 overflow-hidden no-selgect no-pointer">
           <span x-text="Result.Phone"></span> won <span class="c-whatsapp" x-text="'NGN' + Result.Amount"></span> from <strong x-text="Result.Game" class="c-gold"></strong>
        </div>
        </div>
        {{-- games loop --}}
        <section class="w-full row align-center g-10px">
                {{-- new column --}}
                <div x-init="
                $el.style.maxHeight=$el.querySelector('img').offsetHeight + 'px';
                
                " style="width:clamp(100px,30%,200px)" class="column overflow-hidden pos-relative no-select g-10px br-10px w-full">
                    <img src="{{ asset('banners/IMG_8639-compressed.jpeg') }}" alt="" class="w-full br-inherit no-pointer no-select">
                <div style="background:linear-gradient(to bottom,rgb(255, 68, 0),coral);color:white;" class="font-weight-900 pos-absolute font-size-05 top-5px left-5px br-1000 row align-center text-center justify-center p-2 p-x-5px">
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="9" width="9"><path d="M12 23C7.85786 23 4.5 19.6421 4.5 15.5C4.5 13.3462 5.40786 11.4045 6.86179 10.0366C8.20403 8.77375 11.5 6.49951 11 1.5C17 5.5 20 9.5 14 15.5C15 15.5 16.5 15.5 19 13.0296C19.2697 13.8032 19.5 14.6345 19.5 15.5C19.5 19.6421 16.1421 23 12 23Z"></path></svg>
                  
                    HOT
                </div>
                <div class="pos-absolute backdrop-blur-1px font-weight-900 font-size-05 top-5px right-5px br-1000px p-2px p-x-5px bg-black-transparent c-white">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="9" width="9"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>

                    <span x-text="Math.floor(Math.random(1000)* 1000)"></span>
                </div>

                <div x-on:click="
               window.location.href='{{ url('users/memory/game') }}';
                " class="p-5px font-weight-900 pos-absolute bottom-5px left-5px right-5px pointer no-select max-w-full br-1000 bg-secondary secondary-text no-select pointer row align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 23C7.85786 23 4.5 19.6421 4.5 15.5C4.5 13.3462 5.40786 11.4045 6.86179 10.0366C8.20403 8.77375 11.5 6.49951 11 1.5C17 5.5 20 9.5 14 15.5C15 15.5 16.5 15.5 19 13.0296C19.2697 13.8032 19.5 14.6345 19.5 15.5C19.5 19.6421 16.1421 23 12 23Z"></path></svg>

                    Play
                </div>
                </div>
                 {{-- new column --}}
                <div x-init="
                $el.style.maxHeight=$el.querySelector('img').offsetHeight + 'px';
                
                " style="width:clamp(100px,30%,200px)" class="column overflow-hidden pos-relative no-select g-10px br-10px w-full">
                    <img src="{{ asset('banners/IMG_8650-compressed.jpeg') }}" alt="" class="w-full br-inherit no-pointer no-select">
                <div style="background:linear-gradient(to bottom,rgb(255, 68, 0),coral);color:white;" class="font-weight-900 pos-absolute font-size-05 top-5px left-5px br-1000 row align-center text-center justify-center p-2 p-x-5px">
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="9" width="9"><path d="M12 23C7.85786 23 4.5 19.6421 4.5 15.5C4.5 13.3462 5.40786 11.4045 6.86179 10.0366C8.20403 8.77375 11.5 6.49951 11 1.5C17 5.5 20 9.5 14 15.5C15 15.5 16.5 15.5 19 13.0296C19.2697 13.8032 19.5 14.6345 19.5 15.5C19.5 19.6421 16.1421 23 12 23Z"></path></svg>
                  
                    HOT
                </div>
                <div class="pos-absolute backdrop-blur-1px font-weight-900 font-size-05 top-5px right-5px br-1000px p-2px p-x-5px bg-black-transparent c-white">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="9" width="9"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>

                    <span x-text="Math.floor(Math.random(1000)* 1000)"></span>
                </div>

                <div x-on:click="
               window.location.href='{{ url('users/cube/game') }}';
                " class="p-5px font-weight-900 pos-absolute bottom-5px left-5px right-5px pointer no-select max-w-full br-1000 bg-secondary secondary-text no-select pointer row align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 23C7.85786 23 4.5 19.6421 4.5 15.5C4.5 13.3462 5.40786 11.4045 6.86179 10.0366C8.20403 8.77375 11.5 6.49951 11 1.5C17 5.5 20 9.5 14 15.5C15 15.5 16.5 15.5 19 13.0296C19.2697 13.8032 19.5 14.6345 19.5 15.5C19.5 19.6421 16.1421 23 12 23Z"></path></svg>

                    Play
                </div>
                </div>
                 {{-- new column --}}
                <div x-init="
                $el.style.maxHeight=$el.querySelector('img').offsetHeight + 'px';
                " style="width:clamp(100px,30%,200px);" class="column overflow-hidden pos-relative no-select g-10px br-10px w-full">
                    <img src="{{ asset('banners/IMG_8679-compressed.jpeg') }}" alt="" class="w-full br-inherit no-pointer no-select">
                <div style="filter:hue-rotate(120deg);background:linear-gradient(to bottom,rgb(255, 68, 0),coral);color:white;" class="font-weight-900 pos-absolute font-size-05 top-5px left-5px br-1000 row align-center text-center justify-center p-2 p-x-5px">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="9" width="9"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>

                   INCOMING
                </div>
              

                <div x-on:click="
                " class="p-5px disabled no-pointer filter-grayscale-50 font-weight-900 pos-absolute bottom-5px left-5px right-5px pointer no-select max-w-full br-1000 bg-secondary secondary-text no-select pointer row align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 23C7.85786 23 4.5 19.6421 4.5 15.5C4.5 13.3462 5.40786 11.4045 6.86179 10.0366C8.20403 8.77375 11.5 6.49951 11 1.5C17 5.5 20 9.5 14 15.5C15 15.5 16.5 15.5 19 13.0296C19.2697 13.8032 19.5 14.6345 19.5 15.5C19.5 19.6421 16.1421 23 12 23Z"></path></svg>

                    Play
                </div>
                </div>

                

        </section>
       
    </section>
@endsection