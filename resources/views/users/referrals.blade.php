@extends('layout.users.app')
@section('title')
   My Referrals
@endsection
@section('main')
  <section class="w-full column g-10">
    {{-- new column --}}
    <div class="column g-5px">
        <strong class="font-weight-900 desc">My Referrals</strong>
        <span class="opacity-07">Invite your friends and families and earn commissions.</span>
    </div>
   <div class="row w-full g-10 g-10px align-center">
     {{-- new row --}}
    <div style="width:clamp(30%,100%,50%);" class="row space-between w-full br-10px p-10px border-width-1px border-color-rgt-01 border-style-solid bg-light">
        {{-- new column --}}
<div class="column g-5px">
            <small class="opacity-08">Total Referrals</small>
<strong>{{ number_format($total) }}</strong>
</div>
{{-- new --}}
        <div style="background:rgba(255,255,0,0.1);color:yellow;" class="h-40 no-shrink perfect-square br-5px column align-center justify-center no-select">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>

            </div>
    </div>
     {{-- new row --}}
    <div style="width:clamp(30%,100%,50%);" class="row space-between w-full br-10px p-10px border-width-1px border-color-rgt-01 border-style-solid bg-light">
        {{-- new column --}}
<div class="column g-5px">
            <small class="opacity-08">Total Commission</small>
<strong>{{ Auth::guard('users')->user()->currency.number_format($commission,2) }}</strong>
</div>
{{-- new --}}
        <div style="background:rgba(0, 153, 255, 0.1);color:rgb(0, 174, 255);" class="h-40 no-shrink perfect-square br-5px column align-center justify-center no-select">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 5.99979H15.0049C11.6912 5.99979 9.00488 8.68608 9.00488 11.9998C9.00488 15.3135 11.6912 17.9998 15.0049 17.9998H22.0049V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V5.99979ZM15.0049 7.99979H23.0049V15.9998H15.0049C12.7957 15.9998 11.0049 14.2089 11.0049 11.9998C11.0049 9.79065 12.7957 7.99979 15.0049 7.99979ZM15.0049 10.9998V12.9998H18.0049V10.9998H15.0049Z"></path></svg>

            </div>
    </div>
   </div>

     {{-- new row --}}
        <div style="border:1px solid var(--rgt-01)" class="row w-full m-top-10 bg-light br-10 p-15 column g-10">
            <strong class="font-size-1 font-weight-600">Your Agent Link</strong>
            {{-- new row --}}
            <div class="row w-full overflow-hidden g-10 align-center space-between">
                <div style="border:1px solid var(--rgt-01);flex:1 0 auto;max-width:calc(100% - 50px);" class="h-40 overflow-hidden max-w-full p-10 row no-shrink br-10">
                    <span class="row max-w-full overflow-auto no-scrollbar">{{ url('register?ref='.Auth::guard('users')->user()->uniqid.'') }}</span>
                </div>
                <div onclick="copy('{{ url('register?ref='.Auth::guard('users')->user()->uniqid.'') }}')" class="h-40 w-40 no-shrink bg-primary primary-text column align-center justify-center br-10">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                </div>
            </div>
        </div>
        {{-- referrals --}}
        @if ($referrals->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No referrals yet',
                'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path></svg>'
            ])
        @else
        <strong class="font-size-1rem font-weight-900">Referral History</strong>
          <div class="w-full grid g-10px pc-grid-2 place-center">
              @foreach ($referrals as $data)
                <div class="w-full p-20px br-10px column g-10px bg-light border-width-1px border-color-rgt-01 border-style-solid">
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center space-between">
                        <div style="background:linear-gradient(gold,rgb(253, 246, 203),gold);" class="h-50 p-2px perfect-square circle no-shrink">
                            @isset($data->photo)
                                <img src="{{ asset('photos/users/'.$data->photo.'') }}" alt="" class="h-full w-full br-inherit no-pointer no-select">
                            @else
                                <div class="w-full uppercase h-full column br-inherit align-center g-10 justify-center bg-primary primary-text no-select no-pointer">
                                    {{ substr(explode(' ',$data->name)[0],0,1).substr(explode(' ',$data->name)[1],0,1) }}
                                </div>
                            @endisset
                        </div>
                        {{-- new column --}}
                        <div class="column m-right-auto g-2px">
                            <strong class="font-weight-800">{{ $data->name }}</strong>
                            <small class="opacity-07">{{ $data->time }}</small>
                        </div>
                        {{-- new --}}
                        <div class="status {{ $data->status == 'active' ? 'green' : 'red' }}">{{ $data->status }}</div>
                    </div>
                </div>
            @endforeach
          </div>
            @if ($referrals->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $referrals
                ])
            @endif
        @endif
  </section>
@endsection