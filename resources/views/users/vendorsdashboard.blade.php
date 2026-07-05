@extends('layout.users.app')
@section('title')
    Vendorss Dashboard
@endsection
@section('css')
    <style class="css">
        .analysis:hover{
            border-color:var(--primary);
            transform:scale(1.01);
            box-shadow: 0 0 20px var(--primary-05)
            
        }
        .analysis:hover svg{
            fill:var(--secondary);
        }
        .filter .child{
          transform:scale(0);
          transform-origin: top center;
            color:var(--text);
            transition: all 0.5s ease;
            top:calc(100% + 5px);
            pointer-events: none;
        }
        .filter.active .child{
            transform:scale(1);
            pointer-events:auto;

        }
        .filter .child > div{
            transition: all 0.5s ease;
            cursor: pointer;
        }
        .filter .child > div:hover{
            background:var(--rgt-01);
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- new analytics --}}
        <div onclick="return;" class="column transition-all w-full analysis br-10px g-10 bg-light border-width-1px border-color-rgt-01 border-style-solid p-20px">
            {{-- new row --}}
            <div class="w-full row align-center g-10 space-between">
                <span>Total Codes</span>
                <i class="c-primary opacity-05">
<svg class="transition-all" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M11.0049 20.9997C11.0049 20.1712 10.3333 19.4997 9.50488 19.4997C8.67646 19.4997 8.00488 20.1712 8.00488 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H8.00488C8.00488 3.82809 8.67646 4.49966 9.50488 4.49966C10.3333 4.49966 11.0049 3.82809 11.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H11.0049ZM9.50488 10.4997C10.3333 10.4997 11.0049 9.82809 11.0049 8.99966C11.0049 8.17124 10.3333 7.49966 9.50488 7.49966C8.67646 7.49966 8.00488 8.17124 8.00488 8.99966C8.00488 9.82809 8.67646 10.4997 9.50488 10.4997ZM9.50488 16.4997C10.3333 16.4997 11.0049 15.8281 11.0049 14.9997C11.0049 14.1712 10.3333 13.4997 9.50488 13.4997C8.67646 13.4997 8.00488 14.1712 8.00488 14.9997C8.00488 15.8281 8.67646 16.4997 9.50488 16.4997Z"></path></svg>

                </i>
            </div>
            <strong class="font-weight-900 font-size-1-3rem">{{ $total }}</strong>
        </div>
        {{-- new analytics --}}
         <div onclick="return;" class="column w-full transition-all analysis br-10px g-10 bg-light border-width-1px border-color-rgt-01 border-style-solid p-20px">
            {{-- new row --}}
            <div class="w-full row align-center g-10 space-between">
                <span>Total Active Codes</span>
                <i class="c-primary opacity-05">
<svg class="transition-all" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M14.0049 2.99966V20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V14.4997C3.38559 14.4997 4.50488 13.3804 4.50488 11.9997C4.50488 10.619 3.38559 9.49966 2.00488 9.49966V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H14.0049ZM16.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H16.0049V2.99966Z"></path></svg>

                </i>
            </div>
            <strong class="font-weight-900 font-size-1-3rem">{{ $active }}</strong>
        </div>
        @if ($total > 0)
             {{-- filter --}}
       <div onclick="this.classList.contains('active') ? this.classList.remove('bg-secondary','secondary-text','active') : this.classList.add('bg-secondary','secondary-text','active')" class="pos-relative filter transition-all w-fit br-5px border-width-1px border-color-secondary c-secondary border-style-solid bg row align-center justify-center g-10px">
       <div class="w-full p-10px row align-center g-10px">
         <i class="row h-fit">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M2.00488 9.49966V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V14.4997C3.38559 14.4997 4.50488 13.3804 4.50488 11.9997C4.50488 10.619 3.38559 9.49966 2.00488 9.49966ZM9.00488 8.99966V10.9997H15.0049V8.99966H9.00488ZM9.00488 12.9997V14.9997H15.0049V12.9997H9.00488Z"></path></svg>

        </i>
       <span class="row h-fit">
         Available Codes
       </span>
        <i class="row h-fit">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

        </i>
       
       </div>
        {{-- dropdown --}}
        <div onclick="event.stopPropagation();" style="box-shadow:0 5px 10px rgba(0,0,0,,0.1);" class="border-width-1px child border-style-solid border-color-rgt-01 column  bg border-width-1px border-color-rgt-0 pos-absolute br-5px overflow-hidden z-index-500 min-w-full p-y-10px top-full left-0">
            {{-- new row --}}
            <div onclick="Redirect('{{ url()->current() }}')" class="row p-x-20px p-10px align-center g-10">
               Available Codes
            </div>
             {{-- new row --}}
            <div onclick="Redirect('{{ url()->current().'?status=active' }}')" class="row p-x-20px p-10px align-center g-10">
               Active Codes
            </div>
             {{-- new row --}}
            <div onclick="Redirect('{{ url()->current().'?status=used' }}')" class="row p-x-20px p-10px align-center g-10">
                Used Codes
            </div>
        </div>
       </div>
        @endif
        {{-- coupons --}}
        @if ($coupons->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No coupon code available'
            ])
        @else
       <div class="column">
         <strong class="font-weight-900 desc">My Assigned Codes</strong>
        <span class="opacity-07">Manage and copy coupon codes assigned to your account.</span>
       </div>
      
       {{-- grid-loop --}}
       <div class="grid pc-grid-2 g-10px place-center">
         @foreach ($coupons as $data)
                <div class="w-full p-15px column g-10px br-10px border-width-1px border-color-rgt-01 border-style-solid bg-light">
                    {{-- new row --}}
                    <div class="row w-full g-10 space-between align-center flex-wrap">
                        <div class="p-5 p-x-10px bg-rgt-01 br-5px no-select row align-center g-5px">
                            <span>{{ $data->uniqid }}</span>
                            <i class="row align-center h-fit" onclick="copy('{{ $data->uniqid }}')">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                            </i>
                        </div>
                        {{-- status --}}
                        <div class="status {{ $data->status == 'active' ? 'green' : 'status-info' }}">{{ $data->status }}</div>
                    </div>
                    <div class="hr" vitecss-type="dashed"></div>
                    {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">Package: </span>
                        <span>{{ json_decode($data->package)->name->value }} ({{ ucwords(json_decode($data->package)->country->value) }})</span>
                    </div>
                      {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">Assigned: </span>
                        <span>{{ $data->assigned }}</span>
                    </div>
                       {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">Used By: </span>
                        @isset($data->user)
                        <span>{{ ucwords($data->user) }}</span>
                            @else
                        <i class="opacity-07">NOT USED</i>

                        @endisset
                    </div>
                      {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">User Referred by: </span>
                          @isset($data->user_ref)
                        <span>{{ ucwords($data->user_ref) }}</span>
                            @else
                        <i class="opacity-07">NULL</i>

                        @endisset
                    </div>
                    @isset($data->used_on)
                          {{-- new row --}}
                    <div class="row align-center g-10">
                        <span class="opacity-07">Used: </span>
                        <span>{{ ucwords($data->used_on) }}</span>
                    </div>
                    @endisset
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
@endsection