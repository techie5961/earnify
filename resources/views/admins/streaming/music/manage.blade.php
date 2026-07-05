@extends('layout.admins.app')
@section('title')
    Manage Songs
@endsection
@section('main')
    <section class="w-full column g-10">
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18.7134 8.12811L18.4668 8.69379C18.2864 9.10792 17.7136 9.10792 17.5331 8.69379L17.2866 8.12811C16.8471 7.11947 16.0555 6.31641 15.0677 5.87708L14.308 5.53922C13.8973 5.35653 13.8973 4.75881 14.308 4.57612L15.0252 4.25714C16.0384 3.80651 16.8442 2.97373 17.2761 1.93083L17.5293 1.31953C17.7058 0.893489 18.2942 0.893489 18.4706 1.31953L18.7238 1.93083C19.1558 2.97373 19.9616 3.80651 20.9748 4.25714L21.6919 4.57612C22.1027 4.75881 22.1027 5.35653 21.6919 5.53922L20.9323 5.87708C19.9445 6.31641 19.1529 7.11947 18.7134 8.12811ZM7 3H12V6H9V17C9 19.2091 7.20914 21 5 21C2.79086 21 1 19.2091 1 17C1 14.7909 2.79086 13 5 13C5.72857 13 6.41165 13.1948 7 13.5351V3ZM18 13.5351V11H20V17C20 19.2091 18.2091 21 16 21C13.7909 21 12 19.2091 12 17C12 14.7909 13.7909 13 16 13C16.7286 13 17.4117 13.1948 18 13.5351Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Songs</span>
                <strong class="desc">{{ number_format($total) }}</strong>
            </div>
        </div>
      

        @if ($tracks->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Track available'
            ])
        @else
        <section class="w-full grid place-center g-10" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">
       
            @foreach ($tracks as $data)
                <div style="border:1px solid var(--rgt-01)" class="w-full column g-10 p-15 bg-light br-primary">
                    {{-- new row --}}
                    <div style="border-bottom:1px solid var(--rgt-02);padding-bottom:10px;" class="row w-full g-10">
                        <img src="{{ asset('tracks/banners/'.$data->banner.'') }}" alt="Track Banner" class="h-70 w-70 no-shrink br-10">
                    {{-- new column --}}
                    <div style="max-width:calc(100% - 110px)" class="column g-5">
                      {{-- new row --}}
                        
                    <div vitecss-marquee vitecss-marquee-check vitecss-marquee-duplicates="0">
                        <div>
                            <strong class="font-1 ws-nowrap">{{ $data->name }}</strong>
                        </div>
                        </div>
                        {{-- new row --}}
                        <span class="opacity-07 ws-nowrap max-w-full text-overflow-ellipsis">{{ $data->artist }}</span>
                        {{-- new row --}}
                        <small class="opacity-05 row align-center">
                            <i>
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="10" width="10"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>

                            </i>
                            Added {{ $data->frame }}</small>
                    </div>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-5">
                        <span>Streaming Reward:</span>
                        <strong>{{ $currency.number_format($data->reward,2) }}</strong>
                    </div>
                      {{-- new row --}}
                    <div class="row w-full g-5">
                        <span>Total Streams:</span>
                        <strong>{{ number_format($data->streams) }}</strong>
                    </div>
                       {{-- new row --}}
                    <div class="row w-full g-5">
                        <span>Audio:</span>
                       <a href="{{ asset('tracks/audios/'.$data->audio.'') }}" class="c-primary row align-center g-2 no-select pointer" target="_blank">Tap to Play Audio
                    
                    </a>
                    </div>
                      {{-- new row --}}
                    <div class="row w-full align-center space-between g-5">
                       <button onclick="window.location.href='{{ url('admins/music/streaming/edit/song?id='.$data->id.'') }}'" class="btn-green-3d">
                      <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L9.29145 10.4627L9.29886 14.7099L13.537 14.7024L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

                        Edit</button>
                        <button onclick="PopulateModal('{{ url('admins/music/streaming/delete/song?id='.$data->id.'') }}')" class="btn-red-3d">
                     <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17 4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7V2H17V4ZM9 9V17H11V9H9ZM13 9V17H15V9H13Z"></path></svg>

                       Delete</button>
                    </div>
                </div>
            @endforeach
            @push('js')
                <script class="js">
                    function PopulateModal(link){
                        document.querySelector('.modal.delete .proceed-btn').dataset.url=link;
                         document.querySelector('.modal.delete').classList.add('active');
                    }
                </script>
            @endpush
        </section>
        <section onclick="this.classList.remove('active');" class="modal delete">
            <div onclick="event.stopPropagation()" class="child column align-center justify-center text-center">
                   <div class="w-50 circle perfect-square align-center g-10 justify-center column no-shrink bg-red c-white no-select">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM112,168a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm0-120H96V40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Z"></path></svg>
        </div>
        <strong class="font-1">Delete this Product</strong>
        <span>Are you sure you want to delete this product? this action cannot be undone</span>
        <div class="row w-full no-select align-center g-10 space-between">
            <div onclick="this.closest('.modal').classList.remove('active')" style="border:1px solid var(--rgt-01);background:var(--rgt-005)" class="h-40 row align-center justify-center br-5 w-fit p-10 p-x-20">Cancel</div>
            <div onclick="window.location.href=this.dataset.url" style="background:var(--primary);color:var(--primary-text)" class="h-40 proceed-btn row align-center justify-center br-5 w-fit p-10 p-x-20">Yes! Proceed</div>
        </div>
            </div>
        </section>
       
        @if ($tracks->lastPage() > 1)
            @include('components.utilities',[
                'data' => $tracks,
                'paginate' => true
            ])
        @endif
        @endif
    </section>

@endsection