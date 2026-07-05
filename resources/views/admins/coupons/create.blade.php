@extends('layout.admins.app')
@section('title')
    Create Coupon Code
@endsection
@section('main')
    <section class="w-full column g-10">
        <form onsubmit="PostRequest(event,this,Created)" style="border:1px solid var(--rgt-01)" method="POST" action="{{ url('admins/post/create/coupon/code/process') }}" class="w-full column g-10 p-20 br-10 bg-light">
           {{-- csrf token --}}
           <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new row --}}
            <div class="row w-full c-primary g-10">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.0049 20.9997C11.0049 20.1712 10.3333 19.4997 9.50488 19.4997C8.67646 19.4997 8.00488 20.1712 8.00488 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H8.00488C8.00488 3.82809 8.67646 4.49966 9.50488 4.49966C10.3333 4.49966 11.0049 3.82809 11.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H11.0049ZM9.50488 10.4997C10.3333 10.4997 11.0049 9.82809 11.0049 8.99966C11.0049 8.17124 10.3333 7.49966 9.50488 7.49966C8.67646 7.49966 8.00488 8.17124 8.00488 8.99966C8.00488 9.82809 8.67646 10.4997 9.50488 10.4997ZM9.50488 16.4997C10.3333 16.4997 11.0049 15.8281 11.0049 14.9997C11.0049 14.1712 10.3333 13.4997 9.50488 13.4997C8.67646 13.4997 8.00488 14.1712 8.00488 14.9997C8.00488 15.8281 8.67646 16.4997 9.50488 16.4997Z"></path></svg>
                <strong class="font-size-1">Create coupon Code</strong>
            </div>
            <hr>
            {{-- new column --}}
            <div class="column g-10 w-full">
                <label class="column g-5">
                    <span>Select Vendor</span>
                    <small class="opacity-07">Select the vendor attached to this coupon code</small>
                </label>
                <div class="cont">
                    <select name="vendor" class="inp input required">
                        <option value="" selected disabled>Click to select....</option>
                          <option value="non_vendor">Non-Vendor</option>

                      @if (!$vendors->isEmpty())
                            @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ ucwords($vendor->username) }} ({{ ucwords($vendor->country) }})</option>
                            
                        @endforeach
                      @endif
                    </select>
                </div>
            </div>
             {{-- new column --}}
            <div class="column g-10 w-full">
                <label class="column g-5">
                    <span>Select Package</span>
                    <small class="opacity-07">Select the package attached to this coupon code</small>
                </label>
                <div class="cont">
                    <select name="package" class="inp input required">
                        <option value="" selected disabled>Click to select....</option>
                      @if ($vendors->isEmpty())
                          <option value="" disabled>No Package available</option>
                      @else
                            @foreach ($packages as $package)
                        <option value="{{ $package->id }}">{{ ucwords($package->name->value) }} ({{ ucwords($package->country->value) }})</option>
                            
                        @endforeach
                      @endif
                    </select>
                </div>
            </div>
              {{-- new column --}}
            <div class="column g-10 w-full">
                <label class="column g-5">
                    <span>How many codes</span>
                    <small class="opacity-07">How Many codes do you intend to create ( MAX = 50 )</small>
                </label>
                <div class="cont">
                   <input name="amount" type="number" value="1" max="50" min="1" inputmode="numeric" placeholder="Enter code amount" class="inp input required">
                </div>
            </div>


            <small class="opacity-07">Note that the coupon code is internally generated and stored securely on the system. Fraud clearIf you encounter any issues creating coupon code ,do well to contact developer.</small>
            {{-- post btn --}}
            <button class="post">Create coupon code</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        // new
        function Created(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('admins/coupon/codes/manage') }}';
            }
        }
    </script>
@endsection