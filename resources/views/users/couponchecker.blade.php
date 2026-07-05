@extends('layout.users.index')
@section('title')
    Coupon Checker
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

    form,.form{
            background:hsl(var(--primary-hsl),30%,7%);
            padding:0;
            border-radius:10px;
            display:flex;
            flex-direction: column;
            /* gap:10px; */
            align-items:center;
            justify-content: center;
            border:1.5px solid var(--primary-darker);
            /* background:var(--bg-light); */
            border:1px solid var(--rgt-01);
            
        }
        form input[type=checkbox],.form input[type=checkbox]{
            transform: scale(0.7)
        }
        .cont{
            border-radius:5px;
            background:var(--bg);
            padding:0px;
            min-height:40px;
            height:auto;
        }
        .inp{
            padding:10px !important;
        }
       label{
        font-weight:500;
       }
      
        .cont:has(input:focus){
            box-shadow: 0 0 0 2px var(--primary-02)
        }
        .cont svg{
            fill: var(--primary);
        }
  

    @media(min-width:800px){
        .body,.hero{
            padding-left:5vw;
            padding-right: 5vw;
        }
        

    }
    
   </style>
@endsection
@section('main')
     <section class="w-full column g-10">
  <section class="hero">
       
           
            <strong class="title font-weight-900">
              {{ config('app.name') }} Coupon Checker
            </strong>
           
          <span>
          Verify the authenticity of your coupon code before proceeding with registration
            </span>
            <small class="opacity-07">Enter your coupon code in the box below to verify it.</small>
       
    </section>
    <section class="body p-20 w-full column g-10">
        <form action="{{ url('users/post/check/coupon/code/process') }}" onsubmit="PostRequest(event,this,Verified)" class="w-full column p-20 br-10 g-10">
           {{-- csrf token --}}
           <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            <div class="column w-full g-5">
                <label>Coupon Code</label>
                <div class="cont">
                    <input name="coupon" type="text" placeholder="Enter your coupon code" class="inp input required">
                </div>
            </div>
            <div class="w-full append-html">

            </div>
           
            {{-- post btn --}}
            <button class="post bg-secondary secondary-text">Verify Coupon</button>
            <span>Dont have a coupon code? <a class="c-secondary no-select no-u" href="{{ url('vendors') }}">Click here</a></span>
        </form>
    </section>
    </section>
@endsection
@section('js')
    <script class="js">
        function Verified(response){
            let data=JSON.parse(response);
           if(data.status != 'error'){
              let html='';
                Object.entries(data.data).forEach(([key,value])=>{
                    html+=`  <div class="row w-full g-10">
                    <span>${key}: </span>
                    <span>${value}</span>
                </div>`;
                });
                 if(data.status == 'success'){
                document.querySelector('.append-html').innerHTML=` <div style="color:greenyellow;background:rgb(76, 175, 80,0.2);border:1px solid #4caf50;" class="w-full br-5 p-15 column g-5">${html}</div>`;
            }else{
                document.querySelector('.append-html').innerHTML=`<div style="color:var(--secondary-light);background:rgba(var(--secondary-rgb),0.1);border:1px solid var(--secondary);" class="w-full br-5 p-15 column g-5">${html}</div>`;
            }
           }
              
        }
    </script>
@endsection
 
