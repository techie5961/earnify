@extends('layout.admins.app')
@section('title')
    System Logs
@endsection
@section('main')
    <section class="w-full g-10 grid pc-grid-2 p-10">
        @if ($logs->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Data Found'
            ])
        @else
           @foreach ($logs as $data)
               <div class="w-full bg-light box-shadow br-10 p-10 column g-10">
                <div class="row g-10 space-between">
                    <img src="{{ asset('images/avatar.jpeg') }}" class="h-50 w-50 clip-circle border-2 border-color-primary circle" alt="">
                    <div class="column g-5m-right-auto">
                        <a href="{{ url('admins/user?id='.$data->id.'') }}" class="bold u c-primary font-1">{{ ucfirst($data->user->username) }}</a>
                       <span class="text-average g-2 capitalize row align-center text-dim">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                        Logged {{ $data->frame }}
                    </span>
                    </div>
                    <div class="status green">success</div>
                </div>
                <hr>
                <div class="row align-center g-2">
                    <strong class="desc c-primary">IP Address:</strong>
                    <strong>{{ $data->ip }}</strong>
                </div>
               </div>
           @endforeach
        @endif
        @if ($logs->hasMorePages())
            @include('components.sections',[
                'infinite_loading' => true,
                'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                    'page' => $logs->currentPage() + 1,
                    'paginate' => true
                ]))
            ])
        @endif
    </section>
@endsection
@section('js')
    <script class="js">
       // alert(10)
        InfiniteLoading();
    </script>
@endsection
