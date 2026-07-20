@extends('layout.admins.app')
@section('title')
    Loan Requests
@endsection
@section('main')
    <section class="w-full column g-10px">
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M22 18V20H2V18H22ZM2 3.5L10 8.5L2 13.5V3.5ZM22 11V13H12V11H22ZM22 4V6H12V4H22Z"></path></svg>
                  </div>
                <div class="column g-5">
                       <span>Total Loan Requests</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($total) }}</strong>
                </div>
            </div>
        </div>
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M13 4H21V6H13V4ZM13 11H21V13H13V11ZM13 18H21V20H13V18ZM6.5 19C5.39543 19 4.5 18.1046 4.5 17C4.5 15.8954 5.39543 15 6.5 15C7.60457 15 8.5 15.8954 8.5 17C8.5 18.1046 7.60457 19 6.5 19ZM6.5 21C8.70914 21 10.5 19.2091 10.5 17C10.5 14.7909 8.70914 13 6.5 13C4.29086 13 2.5 14.7909 2.5 17C2.5 19.2091 4.29086 21 6.5 21ZM5 6V9H8V6H5ZM3 4H10V11H3V4Z"></path></svg>
                  </div>
                <div class="column g-5">
                       <span>Pending Loan Requests</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($pending) }}</strong>
                </div>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z"></path></svg>
                  </div>
                <div class="column g-5">
                       <span>Approved Loan Requests</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($approved) }}</strong>
                </div>
            </div>
        </div>

        @if ($loans->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No loan request available',
                'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6 4H4V2H20V4H18V6C18 7.61543 17.1838 8.91468 16.1561 9.97667C15.4532 10.703 14.598 11.372 13.7309 12C14.598 12.628 15.4532 13.297 16.1561 14.0233C17.1838 15.0853 18 16.3846 18 18V20H20V22H4V20H6V18C6 16.3846 6.81616 15.0853 7.8439 14.0233C8.54682 13.297 9.40202 12.628 10.2691 12C9.40202 11.372 8.54682 10.703 7.8439 9.97667C6.81616 8.91468 6 7.61543 6 6V4ZM8 4V6C8 6.88457 8.43384 7.71032 9.2811 8.58583C10.008 9.33699 10.9548 10.0398 12 10.7781C13.0452 10.0398 13.992 9.33699 14.7189 8.58583C15.5662 7.71032 16 6.88457 16 6V4H8ZM12 13.2219C10.9548 13.9602 10.008 14.663 9.2811 15.4142C8.43384 16.2897 8 17.1154 8 18V20H16V18C16 17.1154 15.5662 16.2897 14.7189 15.4142C13.992 14.663 13.0452 13.9602 12 13.2219Z"></path></svg>'
            ])
        @else
            <div x-data="{  }" class="w-full grid pc-grid-2 g-10px place-center">
                @foreach ($loans as $data)
                    <div class="w-full overflow-hidden column g-10px p-20px br-10px bg-light box-shadow">
                        {{-- new row --}}
                        <div class="w-full row align-center g-10px space-between flex-wrap">
                            <strong x-on:click="window.location.href='{{ url('admins/user?id='.$data->user_id.'') }}'" x-on:touchstart="$el.classList.add('bg-primary-01')" x-on:touchend="$el.classList.remove('bg-primary-01')" class="p-2px p-x-10px font-size-1 font-weight-800 u c-primary capitalize no-select pointer br-5px">
                                {{ $data->user->username }}
                            </strong>
                            {{-- status --}}
                            <div class="status {{ $data->status == 'processing' ? 'gold' : ($data->status == 'rejected' ? 'red' : 'green') }}">{{ $data->status }}</div>
                        </div>
                        <div class="hr" vitecss-type="dashed"></div>
                        {{-- new row --}}
                        <div class="row align-center g-10px">
                            <span class="opacity-07 ws-nowrap">Full Name:</span>
                            <span class="max-w-full ws-nowrap text-overflow-ellipsis">{{ $data->name }}</span>
                        </div>
                           {{-- new row --}}
                        <div class="row align-center g-10px">
                            <span class="opacity-07 ws-nowrap">Home Address:</span>
                            <span class="max-w-full ws-nowrap text-overflow-ellipsis">{{ $data->address }}</span>
                        </div>
                           {{-- new row --}}
                        <div class="row align-center g-10px">
                            <span class="opacity-07 ws-nowrap">Account Number:</span>
                            <span x-on:click="copy('{{ json_decode($data->bank)->account_number }}')" class="max-w-full ws-nowrap u text-overflow-ellipsis">{{ json_decode($data->bank)->account_number }}</span>
                        </div>
                          {{-- new row --}}
                        <div class="row align-center g-10px">
                            <span class="opacity-07 ws-nowrap">Bank Name:</span>
                            <span class="max-w-full ws-nowrap text-overflow-ellipsis">{{ json_decode($data->bank)->bank_name }}</span>
                        </div>
                         {{-- new row --}}
                        <div class="row align-center g-10px">
                            <span class="opacity-07 ws-nowrap">Account Name:</span>
                            <span class="max-w-full ws-nowrap text-overflow-ellipsis">{{ json_decode($data->bank)->account_name }}</span>
                        </div>
                        <div class="hr" vitecss-type="dashed"></div>
                       <div class="row align-center space-between g-10px">
                         <span class="opacity-07">Loan Amount</span>
                        <strong class="desc font-weight-900 c-green">&#8358;{{ number_format($data->amount) }}</strong>
                       </div>
                        @if ($data->status == 'processing')
                            {{-- new row --}}
                        <div class="row align-center space-between g-10px">
                            <button x-on:click="window.location.href='{{ url('admins/loan/alter?action=approved&id='.$data->id.'') }}'" class="btn-green">Approve</button>
                            <button x-on:click="window.location.href='{{ url('admins/loan/alter?action=rejected&id='.$data->id.'') }}'" class="btn-red">Reject</button>
                        </div>
                        <div class="hr" vitecss-type="dotted"></div>
                        <small class="opacity-07 text-center">Please ensure to disburse the money before clicking approve, otherwise click reject.</small>
   
                        @endif
                    </div>
                @endforeach
            </div>
            @if ($loans->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $loans
                ])
            @endif
        @endif
    </section>
 
@endsection