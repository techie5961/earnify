@extends('layout.users.auth')
@section('title')
    Register
@endsection
@section('action')
   <div onclick="window.location.href='{{ url('login') }}'" class="p-10 bg-light br-5 clip-5 border-1 border-color-primary no-select pointer">Login to your Account</div>
@endsection
@section('main')

     <section class="w-full m-x-auto bg-light m-y-auto p-bottom-50 align-center br-5 p-y-20 g-10 column p-10 backdrop-blur-10 max-w-500">
       
        <strong class="desc c-primary "  style="font-family: alfa slab;font-weight:100;">Join {{ config('app.name') }}</strong>
        <span class=" m-bottom-10">Create New Account</span>
        @if ($ref !== '')
           <div class="c-green desc  bold bg-green-transparent p-10 br-10 border-1 border-color-green no-select">🎉You are joining under {{ ucfirst($ref) }}</div>
         
        @endif

        <form method="POST" onsubmit="PostRequest(event,this,MyFunc.call_back)" action="{{ url('post/users/register/process') }}" class="column w-full g-5">
        
        
          <input type="hidden"  name="_token" value="{{ csrf_token() }}" class="input">
         
         <div class="h-50 display-none align-center cont w-full row border-1 border-color-silver bg-light br-10 bg-dim">
            <input value="{{ strtolower(config('app.name')).'@gmail.com' }}" autocomplete="off" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Email Address" name="email" name="email" class="w-full input inp required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="text">
        <div style="height:40px;margin-right:5px !important;" class="h-semi-full perfect-square br-10 bg-silver m-right-10 column justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM203.43,64,128,133.15,52.57,64ZM216,192H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>
        </div>
        </div>
         <label for="" class="m-top-10">Phone Number</label>
       <div class="h-50 align-center w-full row border-1 cont  border-color-dim bg br-5">
      
          <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" placeholder="Phone/Mobile Number" type="text" inputmode="numeric" maxlength="11"  name="phone" class="w-full input inp required ph-c-silver h-full no-border no-outline bg-transparent br-10">
        
        </div>
         <label for="" class="m-top-10">Username</label>
       <div class="h-50 align-center w-full row border-1 cont  border-color-dim bg br-5">
           <input autocomplete="off" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Username" name="username" class="w-full inp input required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="text">
 
        </div>
          <div class="h-50 display-none align-center w-full row cont border-1 border-color-silver bg-whitesmoke br-10 bg-dim">
            <input autocomplete="off" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Referral Username (optional)" name="refferral" class="w-full input ph-c-silver h-full no-border no-outline bg-transparent br-10" type="text">
 
        </div>
         <label for="" class="m-top-10">Password</label>
<div class="h-50 align-center w-full row border-1 cont  border-color-dim bg br-5">
         <input autocomplete="new-password" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Password" name="password" class="w-full inp input required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="password">
 
          
        </div>
         <label for="" class="m-top-10">Confirm Password</label>
       <div class="h-50 align-center w-full row border-1 cont  border-color-dim bg br-5">
            <input autocomplete="new-password" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Confirm Password" name="confirm" class="w-full input inp required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="password">
 
          
        </div>
        <input type="hidden" value="{{ $ref }}" name="ref" class="input">
         <button class="post br-5 clip-5 m-top-20 bold">Register</button>
         </form>
        
    </section>
@endsection
@section('js')
    <script class="js">
      window.MyFunc={
        call_back : function(response){
          let data=JSON.parse(response);
          if(data.status == 'success'){
            window.location.href='{{ url('login') }}';
          }
        }
      }
    </script>
@endsection