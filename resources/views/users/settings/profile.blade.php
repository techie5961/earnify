@extends('layout.users.app')
@section('title')
    Profile Settings
@endsection
@section('main')
    <section class="w-full column g-10">
        <strong class="desc font-weight-900">Profile Settings</strong>
        <span class="opacity-07">Manage and update your profile information</span>
        <div class="w-full border-width-1px border-color-rgt-01 border-style-solid p-20px row align-center g-10 bg-light br-10px">
            <div style="background:linear-gradient(to bottom,gold,rgb(255, 243, 175),gold)" class="h-70px p-2px circle w-70px">
                @isset(Auth::guard('users')->user()->photo)
                    <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" class="h-full w-full br-inherit no-pointer">
                @else
                <div class="w-full h-full no-select bg-primary primary-text column align-center justify-center font-size-1-5rem br-inherit">{{ $initials }}</div>
                @endisset
            </div>
            {{-- new column --}}
            <div class="column g-4px flex-auto">
                <strong class="font-size-1rem">{{ Auth::guard('users')->user()->name }}</strong>
                {{-- new row --}}
                <div class="row w-full g-5px">
                    <span class="opacity-07">{{ '@'.Auth::guard('users')->user()->username }}</span>
                    <span>&bull;</span>
                    <span class="c-secondary">{{ Auth::guard('users')->user()->package }}</span>
                </div>
            </div>
        </div>
        {{-- new row --}}
        <div class="row w-full g-10px align-center">
           {{-- new --}}
            <div onclick="Redirect('{{ url('users/transaction/pin') }}')" style="width:clamp(30%,100%,50%)" class="w-full no-select pc-pointer bg-light border-width-1px border-style-solid border-color-rgt-01 p-13px br-10px row g-5px">
                <div style="background:rgb(50, 205, 50,0.1);" class="h-40px w-40px br-5px column align-center justify-center no-shrink bg-rgt-01 c-limegreen">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598L12 1ZM16.4524 8.22183L11.5019 13.1709L8.67421 10.3431L7.25999 11.7574L11.5026 16L17.8666 9.63604L16.4524 8.22183Z"></path></svg>
                </div>
                <span>Transaction Pin</span>
            </div>
            {{-- new --}}
            <div onclick="Redirect('{{ url('users/security/settings') }}')" style="width:clamp(30%,100%,50%)" class="w-full no-select pc-pointer bg-light border-width-1px border-style-solid border-color-rgt-01 p-13px br-10px row g-5px">
                <div style="background:rgb(255, 215, 0,0.1);" class="h-40px w-40px br-5px column align-center justify-center no-shrink bg-rgt-01 c-gold">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16ZM11 14V16H13V14H11ZM7 14V16H9V14H7ZM15 14V16H17V14H15Z"></path></svg>

                </div>
                <span>Security Settings</span>
            </div>
        </div>
        {{-- form --}}
        <form onsubmit="PostRequest(event,this,Updated)" action="{{ url('users/post/profile/updated/process') }}" method="POST" class="w-full br-10px column g-10px p-15px bg-primary-01 border-width-1px border-color-rgt-01 border-style-solid">
            {{-- csrf token --}}
            <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            <label class="w-full pointer h-150px column c-rgt-07 no-select p-10px align-center justify-center text-center bg border-width-1px border-color-rgt-01 border-style-solid">
           <span>Tap to select profile picture</span>
           <span>JPG, PNG, WEBP (MAX: 2MB)</span>
            <input name="photo" onchange="PreviewPhoto(this,this.closest('label'))" type="file" class="inp display-none input" accept="image/*">
          </label>
            {{-- new row --}}
           <div class="row w-full g-10px align-center">
             {{-- new input --}}
            <div class="column g-5px w-full">
                <span>First Name</span>
                <div class="cont h-fit bg">
                    <input name="first_name" type="text" value="{{ explode(' ',Auth::guard('users')->user()->name)[0] }}" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Last Name</span>
                <div class="cont h-fit bg">
                    <input name="last_name" type="text" value="{{ explode(' ',Auth::guard('users')->user()->name)[1] }}" class="inp input required">
                </div>
            </div>
           </div>
            {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Phone Number</span>
                <div class="cont h-fit bg">
                    <input name="phone" type="number" inputmode="numeric" value="{{ Auth::guard('users')->user()->phone }}" class="inp input required">
                </div>
            </div>
            {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Email Address</span>
                <div class="cont h-fit bg">
                    <input readonly type="email" value="{{ Auth::guard('users')->user()->email }}" class="inp input opacity-07 no-pointer no-select">
                </div>
            </div>
              {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Country</span>
                <div class="cont h-fit bg">
                    <input type="text" value="{{ Auth::guard('users')->user()->country }}" readonly class="inp input required opacity-07 no-pointer no-select">
                </div>
            </div>
            <button class="post">Update Profile</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        // new
        function Updated(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url()->current() }}');
            }
        }
    </script>
@endsection