@extends('layout.admins.app')
@section('title')
    Manage Vouchers
@endsection
@section('main')
    <section x-data="{ 
        ShowModal : false,
        HideBody : false,
        VoucherID : 0
     }" x-init="
        $watch('HideBody', (value) => {
            if(value){
                document.body.classList.add('overflow-hidden');
            
            }else{
                document.body.classList.remove('overflow-hidden');

            }
        })
     " class="w-full column g-10px">
        {{-- new analytic --}}
        <div class="w-full p-20px br-10px row g-10px bg-light border-width-1px border-style-solid border-color-rgt-01">
            <div class="h-50 c-whatsapp column align-center justify-center w-50 br-10px bg-whatsapp-01 border-style-solid border-width-1px border-color-whatsapp">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M11.0049 20.9997C11.0049 20.1712 10.3333 19.4997 9.50488 19.4997C8.67646 19.4997 8.00488 20.1712 8.00488 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H8.00488C8.00488 3.82809 8.67646 4.49966 9.50488 4.49966C10.3333 4.49966 11.0049 3.82809 11.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H11.0049ZM9.50488 10.4997C10.3333 10.4997 11.0049 9.82809 11.0049 8.99966C11.0049 8.17124 10.3333 7.49966 9.50488 7.49966C8.67646 7.49966 8.00488 8.17124 8.00488 8.99966C8.00488 9.82809 8.67646 10.4997 9.50488 10.4997ZM9.50488 16.4997C10.3333 16.4997 11.0049 15.8281 11.0049 14.9997C11.0049 14.1712 10.3333 13.4997 9.50488 13.4997C8.67646 13.4997 8.00488 14.1712 8.00488 14.9997C8.00488 15.8281 8.67646 16.4997 9.50488 16.4997Z"></path></svg>

            </div>
            {{-- new column --}}
            <div class="column g-5px">
                <span>Total Voucher Codes</span>
                <strong class="font-size-1-2 font-weight-900">{{ $total }}</strong>
            </div>
        </div>
         {{-- new analytic --}}
        <div class="w-full p-20px br-10px row g-10px bg-light border-width-1px border-style-solid border-color-rgt-01">
            <div class="h-50 c-whatsapp column align-center justify-center w-50 br-10px bg-whatsapp-01 border-style-solid border-width-1px border-color-whatsapp">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M2.00488 3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979ZM8.09024 18.9998C8.29615 18.4172 8.85177 17.9998 9.50488 17.9998C10.158 17.9998 10.7136 18.4172 10.9195 18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H10.9195C10.7136 5.58238 10.158 5.99979 9.50488 5.99979C8.85177 5.99979 8.29615 5.58238 8.09024 4.99979H4.00488V18.9998H8.09024ZM9.50488 10.9998C8.67646 10.9998 8.00488 10.3282 8.00488 9.49979C8.00488 8.67136 8.67646 7.99979 9.50488 7.99979C10.3333 7.99979 11.0049 8.67136 11.0049 9.49979C11.0049 10.3282 10.3333 10.9998 9.50488 10.9998ZM9.50488 15.9998C8.67646 15.9998 8.00488 15.3282 8.00488 14.4998C8.00488 13.6714 8.67646 12.9998 9.50488 12.9998C10.3333 12.9998 11.0049 13.6714 11.0049 14.4998C11.0049 15.3282 10.3333 15.9998 9.50488 15.9998Z"></path></svg>

            </div>
            {{-- new column --}}
            <div class="column g-5px">
                <span>Total Active Voucher Codes</span>
                <strong class="font-size-1-2 font-weight-900">{{ $active }}</strong>
            </div>
        </div>
        @if ($vouchers->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No voucher created'
            ])
        @else
        <div class="w-full grid pc-grid-2 g-10 place-center">
            @foreach ($vouchers as $data)
                <div x-data="{
                    Code : '{{ $data->uniqid }}'
                 }" style="box-shadow:0 0 10px rgba(0,0,0,0.1)" class="w-full card column g-10px bg-light p-20px br-10px border-width-1px border-style-solid border-color-rgt-01">
                    {{-- new row --}}
                    <div class="row align-center g-10px space-between">
                        <div x-bind:style="{
                        'max-width' : ($el.closest('.card').offsetWidth / 2.5) + 'px',
                       
                        }" class="p-5px max-w-half row align-center text-overflow-ellipsis overflow-hidden p-x-10px bg-primary-01 c-primary br-5px">
                            <span class="text-overflow-ellipsis">{{ $data->uniqid }}</span>
                            <i x-on:click="copy(Code)">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                            </i>
                        </div>
                        {{-- new --}}
                        <div class="status {{ $data->status == 'active' ? 'green' : 'primary' }}">{{ $data->status }}</div>
                    </div>
                    <div class="hr" vitecss-type="dashed"></div>
                    {{-- new row --}}
                    <div class="row w-full g-5px text-overflow-ellipsis">
                        <span class="opacity-07">Voucher Title: </span>
                        <span>{{ ucwords(str_replace('_',' ',$data->purpose)) }}</span>
                    </div>
                     {{-- new row --}}
                    <div class="row w-full g-5px text-overflow-ellipsis">
                        <span class="opacity-07">Voucher Value: </span>
                        <span>{{ $currency.number_format($data->value,2) }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-5px text-overflow-ellipsis">
                        <span class="opacity-07">Used By: </span>
                        @isset ($data->username)
                            <span x-on:click="
                             window.location.href='{{ url('admins/user?id='.$data->user_id.'') }}'
                            " class="c-primary u no-select pointer">{{ ucwords($data->username) }}</span>
                        @else
                            <i class="no-select opacity-05">NULL</i>
                        @endisset
                    </div>
                    <div class="hr" vitecss-type="dashed"></div>
                    {{-- new row --}}
                    <div class="row align-center space-between g-10">
                        <button x-on:click="
                        window.location.href='{{ url('admins/voucher/edit?id='.$data->id.'') }}';
                        " class="btn-green p-10px p-x-20px h-fit">Edit</button>
                        <button x-on:click="
                        ShowModal = true;
                        HideBody = true;
                        VoucherID = '{{ $data->id }}'
                        " class="btn-red p-10px p-x-20px h-fit">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
            
            @if ($vouchers->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $vouchers
                ])
            @endif
        @endif
       
        {{-- modal --}}
        <div x-transition:enter="transition-all" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave="transition-all" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-on:click="ShowModal = false;HideBody = false;" x-show="ShowModal" class="pos-fixed inset-0 p-30px column align-center justify-center z-index-3000 bg-black-transparent">
            <div style="width:90%;" x-on:click.stop="" class="p-20px box-shadow column align-center max-w-500px g-10px bg-light br-10px w-full">
                <div class="h-70 w-70 no-shink bg-red c-white column align-center justify-center circle">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9ZM9 12V18H11V12H9ZM13 12V18H15V12H13Z"></path></svg>

                </div>
                {{-- new row --}}
                <strong>Delete this Voucher?</strong>
                <span class="text-align-center">Are you sure you want to delete this voucher, this action cannot be undone.</span>
            {{-- new row --}}
            <div class="row w-full align-center g-10px space-between">
                <div x-on:click="ShowModal = false;HideBody = false;" class="p-10px row align-center justify-center w-full bg-black c-white br-5px">
                    No, Cancel
                </div>
                 <div x-on:click="
                 window.location.href='{{ url('admins/get/voucher/delete?id=') }}' + VoucherID
                 " class="p-10px row align-center justify-center w-full bg-primary primary-text br-5px">
                    Yes, Delete
                </div>
            </div>
            </div>
        </div>
    </section>

@endsection