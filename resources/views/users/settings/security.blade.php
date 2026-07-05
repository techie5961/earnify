@extends('layout.users.app')
@section('title')
    Account Password
@endsection
@section('css')
    <style class="css">
        header,nav,footer{
            display:none;
        }
        main{
            width:100%;
            max-width:100%;
            margin-left:0;
            padding:0;
        }
        @media(min-width:800px){
            .contents{
                padding-left:10vw;
                padding-right:10vw;
            }
        }
    </style>
@endsection
@section('main')
    <section class="w-full flex-auto column g-10">
        {{-- header --}}
        <div class="head w-full z-index-300 row align-center space-between g-10 bg-light p-15px pos-fixed top-0 right-0 left-0">
           <div onclick="Redirect('{{ url()->previous() == url()->current() ? url('users/dashboard') : url()->previous() }}')" class="glass h-40 w-40 no-shrink circle column align-center justify-center">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

           </div>
            <strong class="font-weight-800 font-size-1">
                Account Password
            </strong>
            <span></span>
        </div>
        
        {{-- contents --}}
        <div class="contents w-full flex-auto column g-10 p-top-0 p-20px">
            
            <span class="opacity-07">Your Account/Login password protects your account from unauthorised logins. Please, dont share it with anyone.</span>
        {{-- form --}}
        <form onsubmit="PostRequest(event,this,Completed)" action="{{ url('users/post/update/password/process') }}" method="POST" class="w-full flex-auto column g-15px">
          {{-- csrf token --}}
          <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
            <div class="column g-4px w-full">
                <span>Current Password</span>
                <div class="cont bg-rgt-01">
                    <input name="password[current]" type="password" placeholder="Enter Current password" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-4px w-full">
                <span>New Password</span>
                <div class="cont bg-rgt-01">
                    <input name="password[new][index]" type="password" placeholder="Enter New password" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-4px w-full">
                <span>Confirm New Password</span>
                <div class="cont bg-rgt-01">
                    <input name="password[new][confirm]" type="password" placeholder="Confirm New password" class="inp input required">
                </div>
            </div>
            <button style="margin-top:auto;" class="post">Update Password</button>
        </form>
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        // completed
        function Completed(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url()->current() }}');
            }
        }

        // new
        function PageStyles(){
            document.querySelector('div.contents').style.marginTop=document.querySelector('div.head').offsetHeight + 'px';
            // document.querySelector('div.contents').style.minHeight=(window.innerHeight - document.querySelector('div.head').offsetHeight) + 'px';

        }

        // load
        window.addEventListener('load',()=>{
            PageStyles();
        });
        document.addEventListener('vitecss:navigated',()=>{
            PageStyles();
        });
    </script>
@endsection


