@extends('layout.users.index')
@section('title')
    Influencers
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
                Influencers
            </strong>
           
          <span>
            Meet Earnify's verified influencers
            </span>
            <small class="opacity-07">Choose a verified vendor below to purchase your coupon code.</small>
       
    </section>
    <section class="body w-full p-20">
      @if (!$vendors->isEmpty())
      <div style="height:auto;max-width:500px;margin:0 auto;margin-bottom:20px;" class="cont">
        <input oninput="
       try{
       
        document.querySelectorAll('.vendors').forEach((vendor)=>{
     
        if((vendor.dataset.name).toLowerCase().includes((this.value).toLowerCase())){
        vendor.classList.remove('display-none');
       
        }else{
        vendor.classList.add('display-none');
        }
        });

        if(document.querySelectorAll('.vendors:not(.display-none)').length == 0){
        document.querySelector('.no-vendor').classList.remove('display-none');
        }else{
        document.querySelector('.no-vendor').classList.add('display-none');
        }
       }catch(error){
       alert(error)
       }
            " placeholder="Search influencers..." type="text" class="inp">
      </div>
      <div class="w-full justify-center row flex-wrap g-10 align-center">
        <div class="column display-none no-vendor g-10 align-center opacity-07">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M10 19.748V16.4C10 15.1174 10.9948 14.1076 12.4667 13.5321C11.5431 13.188 10.5435 13 9.5 13C7.61013 13 5.86432 13.6168 4.45286 14.66C5.33199 17.1544 7.41273 19.082 10 19.748ZM18.8794 16.0859C18.4862 15.5526 17.1708 15 15.5 15C13.4939 15 12 15.7967 12 16.4V20C14.9255 20 17.4843 18.4296 18.8794 16.0859ZM9.55 11.5C10.7926 11.5 11.8 10.4926 11.8 9.25C11.8 8.00736 10.7926 7 9.55 7C8.30736 7 7.3 8.00736 7.3 9.25C7.3 10.4926 8.30736 11.5 9.55 11.5ZM15.5 12.5C16.6046 12.5 17.5 11.6046 17.5 10.5C17.5 9.39543 16.6046 8.5 15.5 8.5C14.3954 8.5 13.5 9.39543 13.5 10.5C13.5 11.6046 14.3954 12.5 15.5 12.5ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22Z"></path></svg>
            <span>No Influencer Found</span>
        </div>
 @foreach ($vendors as $data)
        <div data-name="{{ $data->username }}" style="border:1px solid var(--rgt-01);width:clamp(200px,100%,500px);" class="w-full vendors no-select br-10 row g-10 p-20 bg-light">
      @isset($data->photo)
          <img src="{{ asset('photos/users/'.$data->photo.'') }}" alt="" class="h-50 w-50 no-shrink br-10 no-pointer no-select">
      @else
      <div class="w-50 uppercase h-50 no-shrink br-10 no-select no-pointer column align-center justify-center font-size-1 font-weight-900 bg-primary primary-text">
        {{ substr($data->username,0,1) }}
      </div>
        @endisset
        {{-- new column --}}
        <div class="column g-5">
            <strong class="font-size-1">{{ ucwords($data->username) }}</strong>
            <span class="opacity-07">{{ ucwords($data->country) }}</span>
            <small style="background:rgb(173, 255, 47,0.1);color:greenyellow" class="p-2 br-5 font-weight-500 row w-fit h-fit p-x-10">online</small>
        </div>

        {{-- new --}}
        <div onclick="
        window.open('https:\/\/wa.me/{{ ($data->country == 'nigeria' ? '+234' : '+237').ltrim($data->phone,0) }}?text={{ urlencode('Hello '.ucwords($data->username).', I want to purchase '.config('app.name').' coupon code') }}')
        " style="background:#25d366;color:white;" class="h-50 m-left-auto pointer w-50 column align-center justify-center br-10">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z"></path></svg>

        </div>
    </div>
   @endforeach
      </div>
  
          
      @endif
    </section>
    </section>
@endsection