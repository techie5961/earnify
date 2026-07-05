@extends('layout.admins.app')
@section('title')
    Manage Coupons
@endsection
@section('main')
    <section class="w-full column g-10">
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M11.0049 20.9997C11.0049 20.1712 10.3333 19.4997 9.50488 19.4997C8.67646 19.4997 8.00488 20.1712 8.00488 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H8.00488C8.00488 3.82809 8.67646 4.49966 9.50488 4.49966C10.3333 4.49966 11.0049 3.82809 11.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H11.0049ZM9.50488 10.4997C10.3333 10.4997 11.0049 9.82809 11.0049 8.99966C11.0049 8.17124 10.3333 7.49966 9.50488 7.49966C8.67646 7.49966 8.00488 8.17124 8.00488 8.99966C8.00488 9.82809 8.67646 10.4997 9.50488 10.4997ZM9.50488 16.4997C10.3333 16.4997 11.0049 15.8281 11.0049 14.9997C11.0049 14.1712 10.3333 13.4997 9.50488 13.4997C8.67646 13.4997 8.00488 14.1712 8.00488 14.9997C8.00488 15.8281 8.67646 16.4997 9.50488 16.4997Z"></path></svg>
                  </div>
                <div class="column g-5">
                       <span>Total Coupon Codes</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($total) }}</strong>
                </div>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M10.0049 20.9997H3.00488C2.4526 20.9997 2.00488 20.552 2.00488 19.9997V3.99969C2.00488 3.44741 2.4526 2.99969 3.00488 2.99969H10.0049C10.0049 4.10426 10.9003 4.99969 12.0049 4.99969C13.1095 4.99969 14.0049 4.10426 14.0049 2.99969H21.0049C21.5572 2.99969 22.0049 3.44741 22.0049 3.99969V19.9997C22.0049 20.552 21.5572 20.9997 21.0049 20.9997H14.0049C14.0049 19.8951 13.1095 18.9997 12.0049 18.9997C10.9003 18.9997 10.0049 19.8951 10.0049 20.9997ZM6.00488 7.99969V15.9997H8.00488V7.99969H6.00488ZM16.0049 7.99969V15.9997H18.0049V7.99969H16.0049Z"></path></svg>
                  </div>
                <div class="column g-5">
                       <span>Total Active Codes</span>
                    <strong class="font-size-1-2 font-weight-900">{{ number_format($active) }}</strong>
                </div>
            </div>
        </div>

        @if ($coupons->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No coupon code found',
                'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M14.0049 2.99966V20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V14.4997C3.38559 14.4997 4.50488 13.3804 4.50488 11.9997C4.50488 10.619 3.38559 9.49966 2.00488 9.49966V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H14.0049ZM16.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H16.0049V2.99966Z"></path></svg>'
            ])
        @else
        <div class="w-full grid pc-grid-2 g-10 place-center">
               @foreach ($coupons as $data)
                <div style="border:1px solid var(--rgt-01)" class="w-full column g-10 p-20 br-10 bg-light">
                    {{-- new row --}}
                    <div class="row space-between w-full flex-wrap g-10">
                        <div style="background:var(--primary-01)" class="p-5 row align-center g-5 p-x-10 br-5 no-select">
                            {{ $data->uniqid }}
                            <i onclick="copy('{{ $data->uniqid }}')" class="c-primary">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>
                            </i>
                        </div>
                        <div class="status {{ $data->status == 'active' ? 'green' : 'primary' }}">{{ $data->status }}</div>
                    </div>
                    {{-- hr --}}
                    <div class="hr" vitecss-type="dashed"></div>
                    {{-- new row --}}
                    <div class="row w-full g-10">
                        <span class="opacity-07">Package: </span>
                        <span onclick="window.location.href='{{ url('admins/packages/list?id='.$data->package->id.'') }}'" class="font-weight-500 capitalize u pointer c-primary no-select">{{ $data->package->name->value }} ({{ ucwords($data->package->country->value) }})</span>
                    </div>
                     {{-- new row --}}
                    <div class="row w-full g-10">
                        <span class="opacity-07">Vendor: </span>
                        <span data-vendor="{{ $data->vendor->id ?? 'null' }}" onclick="if(this.dataset.vendor != 'null') window.location.href='{{ url('admins/user?id='.($data->vendor->id ?? 'null').'') }}'" class="font-weight-500 {{ ($data->vendor->id ?? 'null') == 'null' ? 'no-pointer' : '' }} capitalize u pointer c-primary no-select">{{ $data->vendor->username ?? 'Non Vendor' }}</span>
                    </div>
                        {{-- new row --}}
                    <div class="row w-full g-10">
                        <span class="opacity-07">Coupon Country: </span>
                        <span class="font-weight-500">{{ ucwords($data->package->country->value) }}</span>
                    </div>
                       {{-- new row --}}
                    <div class="row w-full g-10">
                        <span class="opacity-07">Created: </span>
                        <span class="font-weight-500">{{ $data->frame }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center space-between">
                        <button onclick="window.location.href='{{ url('admins/users?coupon='.$data->uniqid.'') }}'" style="background:#444;border-color:black;" class="btn-green-3d">View Registered Users</button>
                        <button onclick="document.querySelector('.modal.delete .yes-btn').dataset.id='{{ $data->id }}';document.querySelector('.modal.delete').classList.add('active')" class="btn-red-3d">Delete</button>
                    </div>

                </div>
            @endforeach
        </div>
         @if ($coupons->lastPage() > 1)
             @include('components.utilities',[
                'paginate' => true,
                'data' => $coupons
             ])
         @endif
        @endif
    </section>
    {{-- delete modal --}}
    <section onclick="this.querySelector('.yes-btn').dataset.id='';this.classList.remove('active')" class="modal delete">
        <div onclick="event.stopPropagation()" class="child column align-center g-10 text-center">
            <div class="h-70 w-70 bg-red c-white column align-center justify-center circle no-shrink">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M7 6V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7ZM13.4142 13.9997L15.182 12.232L13.7678 10.8178L12 12.5855L10.2322 10.8178L8.81802 12.232L10.5858 13.9997L8.81802 15.7675L10.2322 17.1817L12 15.4139L13.7678 17.1817L15.182 15.7675L13.4142 13.9997ZM9 4V6H15V4H9Z"></path></svg>

            </div>
            <strong class="font-weight-700">Delete Coupon?</strong>
            <span>Are you sure you want to delete this coupon code?</span>
            <small class="opacity-07">Any user who have already registered with this coupon code wont be affected.</small>
        {{-- new row --}}
        <div class="row w-full g-10 align-center">
            <div onclick="this.closest('.modal').querySelector('.yes-btn').dataset.id='';this.closest('.modal').classList.remove('active')" class="w-full br-5 p-10 bg-black c-white row align-center justify-center">
                No, Cancel
            </div>
            <div data-id="" onclick="if(this.dataset.id != '') window.location.href='{{ url('admins/coupon/code/delete?id=') }}' + this.dataset.id" class="w-full yes-btn br-5 p-10 bg-primary primary-text row align-center justify-center">
                Yes, Delete
            </div>
        </div>
        </div>
    </section>
@endsection