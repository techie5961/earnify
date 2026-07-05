@extends('layout.users.index')
@section('title')
    Top Earners
@endsection
@section('css')
   <style class="css">
    main{
        padding:0;
    }
   
    .hero{
        display:flex;
        flex-direction:column;
        align-items:center;
        text-align: center;
        gap:10px;
        background:var(--primary-darker);
        width:100%;
        background: linear-gradient(to bottom,var(--bg),var(--primary-darker));
        padding:20px;
    }
    .title{
        font-size:2rem;
        background: linear-gradient(to right,hsl(calc(var(--secondary-hsl) + 30),100%,50%),var(--secondary));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .body{
        display:flex;
        flex-direction: column;
        gap:10px;
    }
    .gold-border.bg-photo{
        background:red !important;
    }
    .gold-border{
        width:100%;
        padding:0;
        border-radius:10px;
        position:relative;
        margin-bottom:15px;
        aspect-ratio:1 !important;
        background-image: var(--bg-img);
        background-size:cover;
        background-position:center;
    }  

                .gold-border::before{
                    content:'';
                    position:absolute;
                    background:linear-gradient(to bottom,gold,rgb(250, 243, 203),gold);
                    inset:0;
                    border-radius:inherit;
                    mask:linear-gradient(white 0,white) content-box,linear-gradient(white 0,white);
                    -webkit-mask:linear-gradient(white 0,white) content-box,linear-gradient(white 0,white);
                    mask-composite:exclude;
                    -webkit-mask-composite:xor;
                    padding:2px;

                }
        


             
    .trophy{
        color:black;
        background:linear-gradient(to bottom right,#fada95,#ffae00);
        padding:5px;
        height:30px;
        width:30px;
        border-radius:50%;
        position:absolute;
       top:100%;
       left:50%;
       transform:translateY(-50%) translateX(-50%);
       display:flex;
       align-items:center;
       justify-content: center;
    }
          .trophy  > svg{
                height:16px;
                width:16px;
            }
      
        
        
   
  

    @media(min-width:800px){
        .body,.hero{
            padding-left:5vw;
            padding-right: 5vw;
        }
        .earners-loop{
            width:100%;
            justify-content:center;
        }
        .top-3{
            margin-left:20px;
            margin-right:20px;
        }

    }
    
   </style>
@endsection
@section('main')
    <section class="w-full column g-10">
  <section class="hero">
       
           
            <strong class="title font-weight-900">
                Top Earners
            </strong>
           
          <span>
            See Who's topping the earnings leaderboard on Earnify.
            </span>
       
    </section>
    <section class="body w-full p-20">
        {{-- top --}}
        <div style="margin-top:50px;" class="w-full row space-between earners-loop flex-wrap align-center g-10">
           @if (!$top_earners->isEmpty())
        @foreach ($top_earners as $data)
         {{-- top earner --}}
        @if ($loop->first)
                <div style="width:clamp(100px,25%,150px);transform:translateY(-50px);order:2;--bg-img:url('{{ asset('photos/users/'.($data->user->photo ?? 'null').'') }}');" class="br-10 top-3 overflow-hidden no-select no-pointer no-shrink column g-10 align-center text-center">
                    <div class="gold-border">
                        @if(is_null($data->user->photo))
                    <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-darker));" class="w-full perfect-square br-inherit font-weight-900 font-size-2 uppercase bgf-primary-darker primary-text column align-center justify-center">
                        {{ substr($data->user->username,0,1) }}
                    </div>
                    @endif
                    <div class="trophy">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.0049 16.9409V19.0027H18.0049V21.0027H6.00488V19.0027H11.0049V16.9409C7.05857 16.4488 4.00488 13.0824 4.00488 9.00275V3.00275H20.0049V9.00275C20.0049 13.0824 16.9512 16.4488 13.0049 16.9409ZM1.00488 5.00275H3.00488V9.00275H1.00488V5.00275ZM21.0049 5.00275H23.0049V9.00275H21.0049V5.00275Z"></path></svg>
                        
                    </div>
                    </div>
                    <strong class="font-size-1 ws-nowrap font-weight-900 max-w-full text-overflow-ellipsis">{{ ucwords($data->user->username) }}</strong>
                    <div class="column text-center align-center">
                        <span class="opacity-07 font-size-07">Earnings</span>
                    <strong class="font-weight-900 font-size-1">{{ $data->user->currency.$data->total_earnings }}</strong>
                
                    </div>
                </div>
            @endif
            {{-- second top earner --}}
             @if ($loop->iteration == 2)
                <div style="width:clamp(70px,25%,150px);order:1;" class="br-10 overflow-hidden no-select top-3 no-pointer no-shrink column g-10 align-center text-center">
                   
                    
                    <div class="gold-border">
                        @isset($data->user->photo)
                        <img src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="" class="w-full perfect-square w-full br-inherit">
                    @else
                    <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-darker));" class="w-full perfect-square br-inherit font-weight-900 font-size-2 uppercase bgf-primary-darker primary-text column align-center justify-center">
                        {{ substr($data->user->username,0,1) }}
                    </div>
                    @endisset
                    <div style="background:linear-gradient(to bottom right,silver,rgb(117, 115, 115)) !important;" class="trophy">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 7.00002C16.4183 7.00002 20 10.5817 20 15C20 19.4183 16.4183 23 12 23C7.58172 23 4 19.4183 4 15C4 10.5817 7.58172 7.00002 12 7.00002ZM12 10.5L10.6775 13.1797L7.72025 13.6094L9.86012 15.6953L9.35497 18.6406L12 17.25L14.645 18.6406L14.1399 15.6953L16.2798 13.6094L13.3225 13.1797L12 10.5ZM13 1.99902L18 2.00002V5.00002L16.6366 6.13758C15.5305 5.55773 14.3025 5.17887 13.0011 5.04951L13 1.99902ZM11 1.99902L10.9997 5.04943C9.6984 5.17866 8.47046 5.55738 7.36441 6.13706L6 5.00002V2.00002L11 1.99902Z"></path></svg>

                    </div>
                    </div>
                    <strong class="font-size-1 ws-nowrap font-weight-900 max-w-full text-overflow-ellipsis">{{ ucwords($data->user->username) }}</strong>
                    <div class="column text-center align-center">
                        <span class="opacity-07 font-size-07">Earnings</span>
                    <strong class="font-weight-900 font-size-1">{{ $data->user->currency.$data->total_earnings }}</strong>
                
                    </div>
                </div>
            @endif
             {{-- third top earner --}}
             @if ($loop->iteration == 3)
                <div style="width:clamp(70px,25%,150px);order:3;" class="br-10 overflow-hidden no-select top-3 no-pointer no-shrink column g-10 align-center text-center">
                   
                    <div class="gold-border">
                        @isset($data->user->photo)
                        <img src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="" class="w-full perfect-square w-full br-inherit">
                    @else
                    <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-darker));" class="w-full perfect-square br-inherit font-weight-900 font-size-2 uppercase bgf-primary-darker primary-text column align-center justify-center">
                        {{ substr($data->user->username,0,1) }}
                    </div>
                    @endisset
                    <div style="background:linear-gradient(to bottom right,rgb(247, 190, 169),orangered) !important;" class="trophy">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0001 8.5L14.1161 13.5875L19.6085 14.0279L15.4239 17.6125L16.7023 22.9721L12.0001 20.1L7.29777 22.9721L8.57625 17.6125L4.3916 14.0279L9.88403 13.5875L12.0001 8.5ZM8.00005 2V11H6.00005V2H8.00005ZM18.0001 2V11H16.0001V2H18.0001ZM13.0001 2V7H11.0001V2H13.0001Z"></path></svg>

                    </div>
                    </div>
                    <strong class="font-size-1 ws-nowrap font-weight-900 max-w-full text-overflow-ellipsis">{{ ucwords($data->user->username) }}</strong>
                    <div class="column text-center align-center">
                        <span class="opacity-07 font-size-07">Earnings</span>
                    <strong class="font-weight-900 font-size-1">{{ $data->user->currency.$data->total_earnings }}</strong>
                
                    </div>
                </div>
            @endif
          @if ($loop->iteration > 3)
                {{-- regular --}}
            <div style="border:1px solid var(--rgt-01);order:{{ $loop->iteration }};" class="w-full {{ $loop->iteration == 4 ? 'm-top-20' : '' }} br-10 p-20 bg-light row g-10">
                  <div style="height:50px;width:50px;border-radius:50%;margin-bottom:0;" class="no-pointer no-select gold-border">
                        @isset($data->user->photo)
                        <img src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="" class="w-full perfect-square w-full br-inherit">
                    @else
                    <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-darker));" class="w-full perfect-square br-inherit font-weight-900 font-size-2 uppercase bgf-primary-darker primary-text column align-center justify-center">
                        {{ substr($data->user->username,0,1) }}
                    </div>
                    @endisset
                   
                    </div>
                    {{-- new column --}}
                    <div class="column g-10">
                        <strong class="font-size-09">{{ ucwords($data->user->username) }}</strong>
                       <div class="column">
                         <span class="opacity-07">Earnings</span>
                        <strong class="font-size-09">{{ $data->user->currency.$data->total_earnings }}</strong>

                       </div>
                    </div>
                    {{-- iteration --}}
                    <div class="w-40 h-40 circle no-select bg-secondary font-weight-900 font-size-1 m-left-auto secondary-text column align-center justify-center">{{ $loop->iteration }}</div>
            </div>
          @endif
        @endforeach
               
           @endif
        </div>
    </section>
    </section>
@endsection
