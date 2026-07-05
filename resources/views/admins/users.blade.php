@extends('layout.admins.app')
@section('title')
  {{ ucwords($status) }}  Users
@endsection
@section('css')
    <style class="css">
        .details{
            padding:10px !important;
           background:var(--rgt-005);
            border-radius:5px !important;
            border:1px solid var(--rgt-01);
            display: flex;
            flex-direction: column;
            gap:10px;
           
        }

        
        .details > div div{
            border-bottom:none;
            padding-bottom:5px;
            background:transparent !important;
            padding:0 !important;
            color:var(--primary);
            font-weight:600;

        }
        .details > div span{
            font-weight:normal;
        }
        .details > div div{
            border:none !important;
            font-size:1rem;
        }
        .details > div:last-of-type{
            /* border-bottom: 1px dashed var(--primary); */
        }
    </style>
@endsection
@section('main')
    <section class="column g-10 w-full">
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M164.38,181.1a52,52,0,1,0-72.76,0,75.89,75.89,0,0,0-30,28.89,12,12,0,0,0,20.78,12,53,53,0,0,1,91.22,0,12,12,0,1,0,20.78-12A75.89,75.89,0,0,0,164.38,181.1ZM100,144a28,28,0,1,1,28,28A28,28,0,0,1,100,144Zm147.21,9.59a12,12,0,0,1-16.81-2.39c-8.33-11.09-19.85-19.59-29.33-21.64a12,12,0,0,1-1.82-22.91,20,20,0,1,0-24.78-28.3,12,12,0,1,1-21-11.6,44,44,0,1,1,73.28,48.35,92.18,92.18,0,0,1,22.85,21.69A12,12,0,0,1,247.21,153.59Zm-192.28-24c-9.48,2.05-21,10.55-29.33,21.65A12,12,0,0,1,6.41,136.79,92.37,92.37,0,0,1,29.26,115.1a44,44,0,1,1,73.28-48.35,12,12,0,1,1-21,11.6,20,20,0,1,0-24.78,28.3,12,12,0,0,1-1.82,22.91Z"></path></svg>
                 </div>
                <div class="column g-5">
                    <span>Total Users</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($total_users) }}</strong>
                </div>
            </div>
        </div>
          {{-- analytic --}}
        <div style="border:1px solid var(--primary-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M213,174.26A12,12,0,0,0,196.24,177q-1.47,2.06-3.05,4a76,76,0,0,0-30-28.37,48,48,0,1,0-70.28.08,76.8,76.8,0,0,0-30.06,28.25,83.62,83.62,0,0,1-18.3-43.55,12,12,0,0,0,16-17.88l-20-20a12,12,0,0,0-17,0l-20,20a12,12,0,0,0,16.83,17.1,107.88,107.88,0,0,0,37.72,73.61,12.33,12.33,0,0,0,1.88,1.57,107.82,107.82,0,0,0,136.47-.26,13.09,13.09,0,0,0,1.28-1.06,107.66,107.66,0,0,0,18-19.46A12,12,0,0,0,213,174.26ZM128,96a24,24,0,1,1-24,24A24,24,0,0,1,128,96Zm0,116a83.52,83.52,0,0,1-46.94-14.37,52,52,0,0,1,93.88,0A84.07,84.07,0,0,1,128,212Zm124.49-75.51-20,20a12,12,0,0,1-17,0l-20-20a12,12,0,0,1,16-17.88A84,84,0,0,0,59.74,79,12,12,0,1,1,40.26,65a108,108,0,0,1,195.4,54.4,12,12,0,0,1,16.83,17.1Z"></path></svg>


                </div>
                <div class="column g-5">
                    <span>Active Users</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($active_users) }}</strong>
                </div>
            </div>
        </div>
        {{-- analytic --}}
        <div style="border:1px solid var(--primary-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M148,152a20,20,0,1,1-20-20A20,20,0,0,1,148,152ZM228,48V208a20,20,0,0,1-20,20H48a20,20,0,0,1-20-20V48A20,20,0,0,1,48,28H68V24a12,12,0,0,1,24,0v4h72V24a12,12,0,0,1,24,0v4h20A20,20,0,0,1,228,48ZM52,52V76H204V52H188a12,12,0,0,1-24,0H92a12,12,0,0,1-24,0ZM204,204V100H52V204Z"></path></svg>


                </div>
                <div class="column g-5">
                    <span>Today's Signups</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($today_signups) }}</strong>
                </div>
            </div>
        </div>

         {{-- search --}}
        <div style="border:1px solid var(--rgt-01);" class="w-full search br-primary p-20 bg-light">
            <div class="cont">
                <span class="h-full perfect-square column align-center no-shrink justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"></path></svg>

                </span>
                <input oninput="Search(this,'{{ url('admins/search/users?key=') }}' + this.value)" type="search" placeholder="Search by User ID,Username,Email or Full Name..." class="inp input">
            </div>
            <div class="child">
              
                
            </div>
        </div>
        @if ($users->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Users Found'
            ])
        @else
            <div class="w-full grid pc-grid-2 g-10">
                @foreach ($users as $data)
                  <div style="border:1px solid var(--rgt-01)" class="w-full overflow-hidden bg-light p-20 br-10 column g-10">
                    {{-- new row --}}
                    <div class="w-full row flex-wrap g-10 space-between">
                        {{-- new --}}
                        <div class="h-50 w-50 p-5 no-shrink bg-primary primary-text circle no-select column align-center justify-center">
                            @isset($data->photo)
                                <img src="{{ asset('photos/users/'.$data->photo.'') }}" alt="" class="w-full h-full circle">
                            @else
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>

                            @endisset
                        </div>
                        {{-- new column --}}
                        <div class="column m-right-auto g-5">
                            <strong class="row align-center g-5" class="font-size-1">{{ ucwords($data->username) }} 
                                @if ($data->type == 'vendor')
                                <svg viewBox="0 0 24 24" fill="orange" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 19H22.0049V21H2.00488V19ZM2.00488 5L7.00488 8L12.0049 2L17.0049 8L22.0049 5V17H2.00488V5Z"></path></svg>
                                    
                                @endif
                            </strong>
                            <small class="opacity-07">Registered {{ $data->frame }}</small>
                        </div>
                        {{-- new --}}
                        <div class="status {{ $data->status == 'active' ? 'green' : 'red' }}">{{ $data->status }}</div>
                    </div>
                    <hr>
                    {{-- balances --}}
                    <div style="grid-template-columns: repeat(auto-fit,minmax(100px,1fr))" class="w-full overflow-hidden grid g-10 place-center">
                        @foreach (collect(json_decode(file_get_contents(database_path('data/wallets.json')))) as $wallet)
                            <div style="border:1px solid var(--rgt-01);background:var(--rgt-005)" class="w-full overflow-hidden g-10 br-5 p-10 align-center column">
                                <small>{{ $wallet->name }}</small>
                                <strong class="font-size-09 font-weight-900 row overflow-hidden ">{{ $data->currency.number_format($data->{$wallet->key}) }}</strong>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">User ID:</span>
                        <span class="font-weight-500">{{ $data->uniqid }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Email:</span>
                        <span class="font-weight-500">{{ $data->email }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Name:</span>
                        <span class="font-weight-500">{{ ucwords($data->name) }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Package:</span>
                        <span class="font-weight-500">{{ $data->package }} Package ({{ucwords($data->country)}})</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Activation Fee:</span>
                        <span class="font-weight-500">{{ $data->currency.number_format(collect(json_decode(file_get_contents(database_path('data/packages.json'))))->where('id',$data->pkg)->first()->activation_fee->value ?? 0,2) }}</span>
                    </div>
                     {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Coupon Code Used:</span>
                        <span class="font-weight-500">{{ json_decode($data->coupon)->uniqid ?? 'null' }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Country:</span>
                        <span class="font-weight-500">{{ ucwords($data->country) }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Account Type:</span>
                        <span class="font-weight-500">{{ ucwords($data->type) }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Phone Number:</span>
                        <span class="font-weight-500">{{ $data->phone }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Referred By:</span>
                        <span onclick="if(this.dataset.ref != '') window.location.href='{{ url('admins/user?id=') }}' + this.dataset.ref " data-ref="{{ $data->ref_id }}" class="font-weight-500 capitalize no-select  {{ isset($data->ref) ? 'c-primary u' : '' }}">{{ $data->ref ?? 'None' }}</span>
                    </div>

                    <span onclick="window.location.href='{{ url('admins/user?id='.$data->id.'') }}'" class="u c-primary no-select pointer">View More</span>
                    
                  </div>
                @endforeach
            </div>
             @if ($users->lastPage() > 1)
                    @include('components.utilities',[
                        'paginate' => true,
                        'data' => $users
                    ])
                @endif
        @endif
    </section>
@endsection