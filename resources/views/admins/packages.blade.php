@extends('layout.admins.app')
@section('title')
    Packages List
@endsection
@section('main')
    <section class="w-full column g-10">
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M5 3C4.5313 3 4.12549 3.32553 4.02381 3.78307L2.02381 12.7831C2.00799 12.8543 2 12.927 2 13V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V13C22 12.927 21.992 12.8543 21.9762 12.7831L19.9762 3.78307C19.8745 3.32553 19.4687 3 19 3H5ZM19.7534 12H15C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12H4.24662L5.80217 5H18.1978L19.7534 12Z"></path></svg>
                  </div>
                <div class="column g-5">
                       <span>Total Packages</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($total) }}</strong>
                </div>
            </div>
        </div>

       @if (empty($packages))
           @include('components.utilities',[
            'empty' => true,
            'data' => 'No packages found'
           ])
       @else
            @foreach ($packages as $data)
            <div style="border:1px solid var(--rgt-01)" class="w-full p-20 column g-10 bg-light br-10">
                {{-- new row --}}
                <div class="row w-full flex-wrap g-10 align-center space-between">
                    <strong class="font-weight-700 font-size-1">{{ $data->name->value }} Package</strong>
                    <div class="status green">Active</div>
                </div>
                <hr>
                @foreach ($data as $key=>$value)
                @if ($key == 'name' || $key == 'id' )
                    @continue
                @endif
                     <div class="row w-full flex-wrap g-10 align-center space-between">
                    <span class="opacity-07">{{ ucwords(str_replace('_',' ',$key)) }}:</span>
                  
                            @if ($value->is_number)
                        <span>{{ $value->currency.number_format($value->value,2) }}</span>
                                @else
                        <span>{{ ucwords($value->value) }}</span>

                            @endif
                </div>
                @endforeach
                <hr>
                {{-- new row --}}
                <div class="w-full row g-10 space-between align-center">
                    <button onclick="window.location.href='{{ url('admins/users?package='.$data->id.'') }}'" class="btn-green">
                        View Users
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path></svg>

                    </button>
                    <button onclick="window.location.href='{{ url('admins/coupon/codes/manage?package='.$data->id.'') }}'" class="btn-green bg-black c-white">
                        View Coupons
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979ZM8.09024 18.9998C8.29615 18.4172 8.85177 17.9998 9.50488 17.9998C10.158 17.9998 10.7136 18.4172 10.9195 18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H10.9195C10.7136 5.58238 10.158 5.99979 9.50488 5.99979C8.85177 5.99979 8.29615 5.58238 8.09024 4.99979H4.00488V18.9998H8.09024ZM9.50488 10.9998C8.67646 10.9998 8.00488 10.3282 8.00488 9.49979C8.00488 8.67136 8.67646 7.99979 9.50488 7.99979C10.3333 7.99979 11.0049 8.67136 11.0049 9.49979C11.0049 10.3282 10.3333 10.9998 9.50488 10.9998ZM9.50488 15.9998C8.67646 15.9998 8.00488 15.3282 8.00488 14.4998C8.00488 13.6714 8.67646 12.9998 9.50488 12.9998C10.3333 12.9998 11.0049 13.6714 11.0049 14.4998C11.0049 15.3282 10.3333 15.9998 9.50488 15.9998Z"></path></svg>

                    </button>
                </div>
            </div>
        @endforeach
       @endif
    </section>
@endsection