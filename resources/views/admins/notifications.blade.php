@extends('layout.admins.app')
@section('title')
    Notifications
@endsection
@section('main')
    <section class="grid w-full pc-grid-2 g-10 p-10">
        @if ($notifications->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Notifications Found'
            ])
        @else
        @if ($unread !== 0)
        <button onclick="window.location.href='{{ url('admins/get/mark/all/as/read') }}'" class="btn-green-3d m-left-auto">Mark All As Read</button>

            
        @endif
            @foreach ($notifications as $data)
                <div class="w-full p-10 g-10 br-10 bg-light box-shadow">
                    <div class="row w-full space-between g-10">
                        <div class="h-50 w-50 bg-primary br-10 column justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary-text)" viewBox="0 0 256 256"><path d="M224,71.1a8,8,0,0,1-10.78-3.42,94.13,94.13,0,0,0-33.46-36.91,8,8,0,1,1,8.54-13.54,111.46,111.46,0,0,1,39.12,43.09A8,8,0,0,1,224,71.1ZM35.71,72a8,8,0,0,0,7.1-4.32A94.13,94.13,0,0,1,76.27,30.77a8,8,0,1,0-8.54-13.54A111.46,111.46,0,0,0,28.61,60.32,8,8,0,0,0,35.71,72Zm186.1,103.94A16,16,0,0,1,208,200H167.2a40,40,0,0,1-78.4,0H48a16,16,0,0,1-13.79-24.06C43.22,160.39,48,138.28,48,112a80,80,0,0,1,160,0C208,138.27,212.78,160.38,221.81,175.94ZM150.62,200H105.38a24,24,0,0,0,45.24,0Z"></path></svg>
                    </div>
                    <div class="column m-right-auto g-2">
                        <span>Notification ID : {{ $data->id }}</span>
                         <span class="text-average g-2 capitalize row align-center text-dim">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                        Logged {{ $data->frame }}
                    </span>
                    </div>
                    <div class="status {{ $data->status == 'read' ? 'green' : 'gold' }} ">{{ $data->status }}</div>
                    </div>
                    <hr>
                    <span>{{ $data->message }}</span>
                    @if ($data->status !== 'read')
                        <button onclick="window.location.href='{{ url('admins/get/mark/as/read?id='.$data->id.'') }}'" class="btn-green-3d m-left-auto">Mark As Read</button>
                    @endif
                </div>
            @endforeach
            @if ($notifications->hasMorePages())
                @include('components.sections',[
                    'infinite_loading' => true,
                    'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                        'page' => $notifications->currentPage() + 1,
                        'paginate' => true
                    ]))
                ])
            @endif

        @endif
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
    </script>
@endsection