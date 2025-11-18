@extends('layout.users.auth')
@section('title')
    Login
@endsection
@section('css')
    <style>
       
    </style>
@endsection

@section('action')
   <div onclick="window.location.href='{{ url('register') }}'" class="p-10 bg-light br-5 clip-5 border-1 border-color-primary no-select pointer">Create Account</div>
@endsection
@section('main')
 
    <section class="w-full  m-y-auto form-house bg-light m-x-auto p-bottom-50 align-center br-5 p-y-20 g-10 column p-10 backdrop-blur-10 max-w-500 overflow-hidden">
      
       
        <strong class="desc welcome c-primary c-white "  style="font-family:alfa slab;font-weight:100;">Welcome Back</strong>
        <span class=" m-bottom-10">Sign In to your Account</span>
         <form onsubmit="PostRequest(event,this,MyFunc.redirect)" action="{{ url('post/login/process') }}" method="POST" class="column w-full g-5">
        
        <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <label for="" class="m-top-10">Phone Number or Username</label>
        <div class="h-50 align-center w-full row border-1 cont  border-color-dim bg br-5">    <input autocomplete="off" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Phone Number or Username" name="id" class="w-full input inp required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="text">
       
        </div>
          <label for="" class="m-top-10">Password</label>
       <div class="h-50 align-center w-full row border-1 cont  border-color-dim bg br-5">    <input  autocomplete="new-password" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Password" class="w-full inp required input ph-c-silver h-full no-border no-outline bg-transparent br-10" name="password" type="password">
       
          
        </div>
          <button class="post br-5 clip-5 m-top-20 bold">Login</button>
         </form>
         
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            redirect : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href=data.url;
                }
            }
        }
    </script>
@endsection