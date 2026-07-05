@extends('layout.users.auth')
@section('title')
    Register
@endsection
@section('main')
    
        <form action="{{ url('users/post/register/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)">
             {{-- logo --}}
            <div class="w-full column g-10 align-center text-center p-20">
                  <img onclick="window.location.href='{{ url('/') }}'" style="width:50%;max-width:300px;" src="{{ asset(config('settings.logo')) }}" alt="Site Logo">
             {{-- new --}}
           <strong class="font-size-1-5 font-weight-900">Create Account</strong>
           <span class="opacity-07">Please fill in your details accurately</span>
              
            </div>
         
        {{-- container --}}
            <div class="container">
           
       {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       <div class="row align-center g-10 w-full">

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>First Name</label>
            <div class="cont w-full">
                

                <input name="first_name" placeholder="E.g David" type="text" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Last Name</label>
            <div class="cont w-full">
                
                <input name="last_name"   placeholder="E.g James" type="text" class="inp input required">
            </div>
        </div>
       </div>

          {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Username</label>
            <div class="cont w-full">
                

                <input name="username"   placeholder="Enter your username" type="text" class="inp input required">
            </div>
        </div>

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Email Address</label>
            <div class="cont w-full">
                

                <input name="email"   placeholder="E.g you@gmail.com" type="email" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Phone Number</label>
            <div class="cont w-full">
               

                <input name="phone" inputmode="numeric"  placeholder="E.g 08118768360" type="number" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Country</label>
            <div class="cont w-full">
               <select onchange="FindPackages(this)" name="country" class="inp input required">
                <option value="" selected disabled>Select your country...</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->name }}">{{ ucwords($country->name) }}</option>
                @endforeach
               </select>

            </div>
        </div>
         {{-- new input --}}
        <div class="column pkgs display-none g-5 w-full">
            <label>Select Package</label>
            <div class="cont w-full">
               <select name="package" class="inp input required">
               
               </select>

            </div>
        </div>
           {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Coupon Code</label>
            <div class="cont w-full">
                

                <input name="coupon"   placeholder="{{ GenerateID() }}" type="text" class="inp required input">
            </div>
            <small class="no-select block">
                Don't have a coupon code? 
                <a href="{{ url('users/puchase/coupon') }}" class="c-secondary no-u pointer no-select">Purchase</a>
            </small>
        </div>
        @if ($ref != '')
              {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Referral Code</label>
            <div class="cont w-full">
                

                <input readonly value="{{ $ref }}" name="ref"   placeholder="Enter referral code" type="text" class="inp input">
            </div>
        </div>
        @endif
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Password</label>
            <div class="cont w-full">
                

                <input name="password"  placeholder="Enter password" type="password" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Confirm Password</label>
            <div class="cont w-full">
                

                <input name="confirm_password"  placeholder="Retype password" type="password" class="inp input required">
            </div>
        </div>
        {{-- agree prompt --}}
        <label class="w-full row no-select align-center g-5">
            <input type="checkbox" required>
            <span>I agree to {{ config('app.name') }} <a class="no-u pointer c-secondary font-weight-500" href="{{ url('terms') }}">Terms</a> and <a class="no-u c-secondary font-weight-500" href="{{ url('privacy') }}">Privacy Policy</a></span>
        </label>
        {{-- submit btn --}}
        <button class="post">
            
            
            Create Account
        </button>
           
        </div> 
          {{-- new row --}}
          <div class="text-center m-bottom-20 w-full">
            Already have an account? <a onclick="Vitecss.navigate('{{ url('login') }}')" class="pointer font-weight-600 no-u c-secondary no-select">Sign in here</a>
          </div>
        </form>
   
@endsection

@section('js')
    <script class="js">
        let pkgs=@json($packages);
                // new
                function FindPackages(element){
                    document.querySelector('.pkgs select').innerHTML='';
                    let package=pkgs.filter(pkg => pkg.country == element.value);
                    let opt=document.createElement('option');
                    opt.value = '';
                    opt.innerHTML='Click to select package...';
                    opt.selected=true;
                    opt.disabled=true;
                    document.querySelector('.pkgs select').appendChild(opt);

                    package.forEach((data)=>{
                        let option=document.createElement('option');
                        option.value=data.id;
                        option.innerHTML=data.name;
                        document.querySelector('.pkgs select').appendChild(option);
                        document.querySelector('.pkgs').classList.remove('display-none');
                    });
                }
                // new
            function Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('users/login') }}'
                }
            }
        
    </script>
@endsection