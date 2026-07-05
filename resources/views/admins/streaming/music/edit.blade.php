@extends('layout.admins.app')
@section('title')
    Upload Song
@endsection
@section('main')

     <section class="w-full column g-10">
         <form action="{{ url('admins/post/music/streaming/edit/song/process') }}" method="POST" onsubmit="PostRequest(event,this,Added)" style="border:1px solid var(--rgt-01)" action="" class="w-full bg-light br-10 p-20 column g-10">
         {{-- id --}}
         <input type="hidden" class="inp input" name="id" value="{{ $data->id }}">
            @push('js')
               <script class="js">
                    function Added(response){
                        let data=JSON.parse(response);
                        if(data.status == 'success'){
                            window.location.href='{{ url('admins/music/streaming/songs/manage') }}';
                        }
                    }
               </script>
           @endpush
            {{-- head --}}
            <div class="row align-center c-primary g-10">
                <span>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5ZM11 13.05C10.8384 13.0172 10.6712 13 10.5 13C9.11929 13 8 14.1193 8 15.5C8 16.8807 9.11929 18 10.5 18C11.8807 18 13 16.8807 13 15.5V11H16V9H11V13.05Z"></path></svg>

                </span>
                <strong class="desc">Upload Song</strong>
            </div>
            {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" class="inp input" name="_token">
         @push('css')
             <style class="css">
             
                label.banner{
                    display:flex;
                    flex-direction:column;
                    align-items:center;
                    justify-content:center;
                    user-select:none;
                    -webkit-user-select:none;
                }
                label.banner.active *:not(img){
                    display:none;
                }
                label.banner.active img{
                    display:flex;
                }
                label img{
                    display:none;
                    max-height:80%;
                    max-width:80%;
                }
             </style>
         @endpush
            {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Song Banner</span>
                    <small class="opacity-07">The music/song audio</small>
                </label>
                <label class="cont h-150 pointer banner active column align-center justify-center">
                    <span>TAP TO UPLOAD</span>
                    <span class="opacity-07">JPG, PNG, WEBP(Max: 5MB)</span>
                    <input onchange="IMGChanged(this)" name="banner" accept="image/*" type="file" class="inp display-none input">
                <img src="{{ asset('tracks/banners/'.$data->banner.'') }}" alt="">
                </label>
            </div>
            @push('js')
                <script class="js">
                    function IMGChanged(element){
                        let file=element.files[0];
                        if(file){
                            document.querySelector('label.banner img').src=URL.createObjectURL(file);
                            document.querySelector('label.banner').classList.add('active');
                        }else{
                               document.querySelector('label.banner').classList.remove('active');
                        }
                    }
                </script>
            @endpush
            {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Song Audio</span>
                    <small class="opacity-07">The music/song audio</small>
                </label>
                <div class="cont">
                    <input name="audio" accept=".mp3, .wav, .m4a, .aac, .ogg" type="file" class="inp input">
                </div>
            </div>
            {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Song Name</span>
                    <small class="opacity-07">Enter the name of the song</small>
                </label>
                <div class="cont">
                    <input value="{{ $data->name }}" name="name" placeholder="E.g With You" type="text" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Artist/ Artists</span>
                    <small class="opacity-07">Enter the name of the artist/artists who sang it</small>
                </label>
                <div class="cont">
                    <input value="{{ $data->artist }}" name="artist" placeholder="E.g Davido ft Omah Lay" type="text" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Streaming Reward({{ $currency }})</span>
                    <small class="opacity-07">Enter the reward for streaming this song</small>
                </label>
                <div class="cont">
                    <input value="{{ $data->reward }}" name="reward" placeholder="E.g {{ $currency }}2,000" type="number" class="inp input required">
                </div>
            </div>
           
             
           
           
            
            {{-- submit btn --}}
            <button class="post">Save Changes</button>
          
        </form>
    </section>
@endsection