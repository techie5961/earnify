@extends('layout.admins.app')
@section('title')
    Purchased Products
@endsection
@section('main')
     <section class="column g-10 p-10 w-full">
        <div class="bg-light p-10 br-10 column space-between box-shadow">
            <div class="row align-center w-full g-10">
                <div class=" h-50 w-50 clip-10 bg-primary-transparent column justify-center">
                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-38.34-85.66a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35A8,8,0,0,1,169.66,122.34Z"></path></svg>

                </div>
                 <div class="column g-5">
                    <span class="text-dim">Total Active Products</span>
                    <strong class="font-1">{{ number_format($total_active) }}</strong>
                </div>
            </div>
        </div>
        {{-- NEW --}}
          <div class="bg-light p-10 br-10 column space-between box-shadow">
            <div class="row align-center w-full g-10">
                <div class=" h-50 w-50 clip-10 bg-primary-transparent column justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-50.34-74.34L139.31,152l18.35,18.34a8,8,0,0,1-11.32,11.32L128,163.31l-18.34,18.35a8,8,0,0,1-11.32-11.32L116.69,152,98.34,133.66a8,8,0,0,1,11.32-11.32L128,140.69l18.34-18.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

                </div>
                 <div class="column g-5">
                    <span class="text-dim">Total Expired Products</span>
                    <strong class="font-1">{{ number_format($total_expired) }}</strong>
                </div>
            </div>
        </div>
        {{-- NEW --}}
          <div class="bg-light p-10 br-10 column space-between box-shadow">
            <div class="row align-center w-full g-10">
                <div class=" h-50 w-50 clip-10 bg-primary-transparent column justify-center">
                   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>

                </div>
                 <div class="column g-5">
                    <span class="text-dim">Total Daily Income</span>
                    <strong class="font-1">&#8358;{{ number_format($total_daily_income,2) }}</strong>
                </div>
            </div>
        </div>
        <div class="grid pc-grid-2 w-full g-10">
            @if ($purchased->isEmpty())
                @include('components.sections',[
                    'null' => true,
                    'text' => 'No Data Found'
                ])
            @else
                @foreach ($purchased as $data)
                    <div class="column w-full g-10 p-10 bg-light box-shadow br-10">
                        <div class="row space-between w-full g-10">
                            <img src="{{ asset('products/'.$data->json->photo.'') }}" alt="" class="h-70 w-70 clip-10 br-10">
                            <div class="column m-right-auto g-2">
                                <strong class="desc">{{ $data->json->name }}</strong>
                                 <span class="text-average g-2 capitalize row align-center text-dim">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                       Purchased {{ $data->frame }}
                    </span>
                    <a href="{{ url('admins/user?id='.$data->user->id.'') }}" class="font-1 c-primary row align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                       {{ $data->user->username }}
                    </a>
                            </div>
                            <div class="status {{ $data->status == 'active' ? 'green' : ($data->status == 'expired' ? 'red' : 'gold
                            |') }}">{{ $data->status }}</div>
                        </div>
                        <hr>
                          <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M243.31,136,144,36.69A15.86,15.86,0,0,0,132.69,32H40a8,8,0,0,0-8,8v92.69A15.86,15.86,0,0,0,36.69,144L136,243.31a16,16,0,0,0,22.63,0l84.68-84.68a16,16,0,0,0,0-22.63Zm-96,96L48,132.69V48h84.69L232,147.31ZM96,84A12,12,0,1,1,84,72,12,12,0,0,1,96,84Z"></path></svg>
                         <strong>Purchase Price:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->json->price,2) }}</span>
                    </div>
                        <div class="row space-between">
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                        <strong>Cycle:</strong>
                        <span class="c-primary">{{ number_format($data->json->cycle) }} Days</span>
                    </div>
                     
                </div>
                <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

                        <strong>Daily Income:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->json->daily_income,2) }}</span>
                    </div>
                      <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>

                        <strong>Total Income:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->json->daily_income * $data->json->cycle,2) }}</span>
                    </div>
                     <div class="row g-5 align-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>

                        <strong>Next Income Time:</strong>
                        <span class="c-primary">{{ $data->next_income }}</span>
                    </div>
                    @if ($data->status == 'active')
                          <div class="row g-5 align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z"></path></svg>

                        <strong>Expires:</strong>
                        <span class="c-primary">{{ $data->expires }}</span>
                    </div>
                    @else
                        <div class="row g-5 align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z"></path></svg>

                        <strong>Expired:</strong>
                        <span class="c-primary">{{ $data->expires }}</span>
                    </div> 
                    @endif
                    @if ($data->status !== 'expired')
                        <button onclick="window.location.href='{{ url('admins/get/product/suspend?status='.$data->status.'&id='.$data->id.'') }}'" class="m-left-auto {{ $data->status == 'active' ? 'btn-red-3d' : 'btn-green-3d' }}">{{ $data->status == 'active' ? 'Suspend' : 'Resume' }}</button>
                    @endif
                    </div>
                @endforeach
                @if ($purchased->hasMorePages())
                    @include('components.sections',[
                        'infinite_loading' => true,
                        'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                            'page' => $purchased->currentPage() + 1,
                            'paginate' => 'true'
                        ]))
                    ])

                @endif
            @endif
        </div>
     </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
    </script>
@endsection