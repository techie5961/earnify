@extends('layout.users.app')
@section('title')
    Music Streamung
@endsection
@section('main')
@push('css')
        <style class="css">
            body:has(.track-modal.active){
                overflow:hidden;
            }
            .track-modal{
                position:fixed;
                inset:0;
                background:rgba(0,0,0,0.1);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                z-index:3200;
                display:flex;
                flex-direction: column;
                align-items:center;
                justify-content:center;
                transform: scale(0);
                visibility: hidden;
                transition:all 0.5s ease;
            }
            .track-modal .child{
                max-height:80%;
                width:80%;
                max-width:500px;
                background:var(--rgb-07);
                padding:20px;
                border-radius:15px;
                display:flex;
                flex-direction:column;
                gap:10px;
                
            }
            .track-modal.active{
                transform: scale(1);
                visibility: visible;
            }
            .track-skip.disabled{
               opacity:0.5;
                pointer-events: none;
            }
            .progress-bar{
                overflow:none !important;

            }
            .progress-bar > div{
                border-radius:inherit;
                display:flex;
                flex-direction: row;
                justify-content: flex-end;
                align-items: center;

            }
            .progress-bar > div::after{
                content:'';
                min-height:10px;
                min-width:10px;
                height:10px;
                width:10px;
                background:var(--rgt-10);
                border-radius:50%;
            }
        </style>
    @endpush
{{-- populate --}}
<section class="populate">
    <form onsubmit="PostRequest(event,this,Streamed)" method="POST" action="{{ url('users/post/claim/streaming/reward/process') }}" class="child">
        {{-- csrf token --}}
        <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
        {{-- track id --}}
        <input type="hidden" class="inp bg input" name="id">
        <i class="c-primary">
            <!--
version: "2.39"
unicode: "fd14"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M11 14v8h-4a3 3 0 0 1 -3 -3v-4a1 1 0 0 1 1 -1h6zm8 0a1 1 0 0 1 1 1v4a3 3 0 0 1 -3 3h-4v-8h6zm-2.5 -12a3.5 3.5 0 0 1 3.163 5h.337a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-7v-5h-2v5h-7a2 2 0 0 1 -2 -2v-1a2 2 0 0 1 2 -2h.337a3.486 3.486 0 0 1 -.337 -1.5c0 -1.933 1.567 -3.5 3.483 -3.5c1.755 -.03 3.312 1.092 4.381 2.934l.136 .243c1.033 -1.914 2.56 -3.114 4.291 -3.175l.209 -.002zm-9 2a1.5 1.5 0 0 0 0 3h3.143c-.741 -1.905 -1.949 -3.02 -3.143 -3zm8.983 0c-1.18 -.02 -2.385 1.096 -3.126 3h3.143a1.5 1.5 0 1 0 -.017 -3z"></path>
</svg>

        </i>
         {{-- new row --}}
    <div style="color:var(--primary-lighter)" class="w-full text-center">
        <strong class="font-1-5">Streamed Successfully</strong>
        <i>
            <!--
unicode: "10185"
version: "3.34"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M3 5a1 1 0 0 1 1 -1a1 1 0 0 1 1.993 -.117l.007 .117a1 1 0 0 1 .117 1.993l-.117 .007a1 1 0 1 1 -2 0a1 1 0 0 1 -1 -1m7.53 -1.243a1 1 0 1 1 1.94 .486l-.5 2a1 1 0 1 1 -1.94 -.486zm6.47 1.243a1 1 0 0 1 1 -1a1 1 0 0 1 1.993 -.117l.007 .117a1 1 0 0 1 .117 1.993l-.117 .007a1 1 0 0 1 -2 0a1 1 0 0 1 -1 -1m-8.81 4.293l6.517 6.518a1 1 0 0 1 -.29 1.617l-9.573 4.387a2 2 0 0 1 -2.661 -2.652l4.39 -9.58a1 1 0 0 1 1.616 -.29m7.517 -1a1 1 0 0 1 0 1.414l-1 1a1 1 0 0 1 -1.414 -1.414l1 -1a1 1 0 0 1 1.414 0m4.05 3.237a1 1 0 0 1 .486 1.94l-2 .5a1 1 0 0 1 -.486 -1.94zm-2.756 7.47a1 1 0 0 1 1 -1a1 1 0 0 1 1.993 -.117l.007 .117a1 1 0 0 1 .117 1.993l-.117 .007a1 1 0 0 1 -2 0a1 1 0 0 1 -1 -1"></path>
</svg>


        </i>
    </div>
    {{-- new --}}
    <span class="opacity-07">You have earned rewards.</span>
    <strong class="font-1-5 reward-text">{{ $currency }}500</strong>
    <button class="post">Claim Reward</button>
    <div style="border-top:1px dashed var(--primary-05)" class="w-full"></div>
    <small class="opacity-07">💚Powered by Profitport stream-to-earn💚</small>
</form>
   
</section>
{{-- main --}}
    <section class="w-full column g-10">
       <img src="{{ asset('banners/IMG_7415.jpeg') }}" alt="" class="w-full no-pointer br-5 no-select"> 
       {{-- new row --}}
        <div class="row align-center g-10 w-full">
            <i class="c-primary">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M20 3V17C20 19.2091 18.2091 21 16 21C13.7909 21 12 19.2091 12 17C12 14.7909 13.7909 13 16 13C16.7286 13 17.4117 13.1948 18 13.5351V6H9V17C9 19.2091 7.20914 21 5 21C2.79086 21 1 19.2091 1 17C1 14.7909 2.79086 13 5 13C5.72857 13 6.41165 13.1948 7 13.5351V3H20Z"></path></svg>

            </i>
            <strong style="font-size:2.0rem;color:var(--primary) !important;text-shadow:0 0 10px var(--primary-02)" class="title m-right-auto">Stream & Earn</strong>

        </div>
       
       @if ($tracks->isEmpty())
           @include('components.utilities',[
            'empty' => true,
            'text' => 'No Tracks available',
            'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18.7134 8.12811L18.4668 8.69379C18.2864 9.10792 17.7136 9.10792 17.5331 8.69379L17.2866 8.12811C16.8471 7.11947 16.0555 6.31641 15.0677 5.87708L14.308 5.53922C13.8973 5.35653 13.8973 4.75881 14.308 4.57612L15.0252 4.25714C16.0384 3.80651 16.8442 2.97373 17.2761 1.93083L17.5293 1.31953C17.7058 0.893489 18.2942 0.893489 18.4706 1.31953L18.7238 1.93083C19.1558 2.97373 19.9616 3.80651 20.9748 4.25714L21.6919 4.57612C22.1027 4.75881 22.1027 5.35653 21.6919 5.53922L20.9323 5.87708C19.9445 6.31641 19.1529 7.11947 18.7134 8.12811ZM7 3H12V5H9V17C9 19.2091 7.20914 21 5 21C2.79086 21 1 19.2091 1 17C1 14.7909 2.79086 13 5 13C5.72857 13 6.41165 13.1948 7 13.5351V3ZM18 13.5351V11H20V17C20 19.2091 18.2091 21 16 21C13.7909 21 12 19.2091 12 17C12 14.7909 13.7909 13 16 13C16.7286 13 17.4117 13.1948 18 13.5351ZM5 19C6.10457 19 7 18.1046 7 17C7 15.8954 6.10457 15 5 15C3.89543 15 3 15.8954 3 17C3 18.1046 3.89543 19 5 19ZM16 19C17.1046 19 18 18.1046 18 17C18 15.8954 17.1046 15 16 15C14.8954 15 14 15.8954 14 17C14 18.1046 14.8954 19 16 19Z"></path></svg>'
           ])
       @else
       <strong class="desc">Track List</strong>
           <section class="grid w-full place-center g-10" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">
            @foreach ($tracks as $data)
            
               <div style="border:1px solid var(--rgt-01)" class="w-full track-loops space-between row g-10 p-15 bg-light br-10">
                    <img src="{{ asset('tracks/banners/'.$data->banner.'') }}" alt="" class="w-70 h-70 br-5 no-shrink no-pointer">
               {{-- new column --}}
               <div style="max-width:calc(100% - 130px);overflow:hidden" class="column m-right-auto g-5">
             <strong class="font-1 ws-nowrap text-overflow-ellipsis">{{ $data->name }}</strong>
                <span class="opacity-07">{{ $data->artist }}</span>
                <strong class="c-primary font-size-1">{{ $currency.number_format($data->reward,2) }}</strong>
               </div>
               {{-- new --}}
               <div  class="m-y-auto play-track c-primary pointer" onclick="PlayTrack('{{ asset('tracks/banners/'.$data->banner.'') }}','{{ asset('tracks/audios/'.$data->audio.'') }}','{{ $data->name }}','{{ $data->artist }}',this,{{ $loop->index + 1 }},{{ $loop->index - 1 }},'{{ $currency.number_format($data->reward,2) }}','{{ $data->id }}')">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM10.6219 8.41459C10.5562 8.37078 10.479 8.34741 10.4 8.34741C10.1791 8.34741 10 8.52649 10 8.74741V15.2526C10 15.3316 10.0234 15.4088 10.0672 15.4745C10.1897 15.6583 10.4381 15.708 10.6219 15.5854L15.5008 12.3328C15.5447 12.3035 15.5824 12.2658 15.6117 12.2219C15.7343 12.0381 15.6846 11.7897 15.5008 11.6672L10.6219 8.41459Z"></path></svg>

               </div>

                </div>
           @endforeach
          
           </section>
        
           <div style="border:1px solid var(--primary);background:radial-gradient(circle at 0% 0%,var(--primary-02),var(--bg))" class="column w-full max-w-500 m-x-auto p-20 br-10 g-10">
            <div class="row g-10">
                <svg class="h-40 w-40 c-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M161.36,130a40,40,0,1,0-66.72,0,28.35,28.35,0,0,0-4.52,4.51,27.86,27.86,0,0,0-5.42,23.67l12.75,56A27.87,27.87,0,0,0,124.77,236h6.46a27.87,27.87,0,0,0,27.32-21.79l12.75-56a27.86,27.86,0,0,0-5.42-23.67A28.35,28.35,0,0,0,161.36,130ZM128,92a16,16,0,1,1-16,16A16,16,0,0,1,128,92Zm19.89,60.88-12.74,56a4,4,0,0,1-3.92,3.12h-6.46a4,4,0,0,1-3.92-3.12l-12.74-56a3.92,3.92,0,0,1,.77-3.37A4,4,0,0,1,112,148H144a4,4,0,0,1,3.15,1.51A3.92,3.92,0,0,1,147.89,152.88ZM236,128a107.88,107.88,0,0,1-38,82.21A12,12,0,0,1,182.47,192a84,84,0,1,0-108.94,0A12,12,0,0,1,58,210.21,108,108,0,1,1,236,128Z"></path></svg>

               <div class="column g-5">
                 <strong class="font-1">Sponsored Music Hour: Afrobeats weekly</strong>
                <span class="opacity-07">Earn real cash streaming on Profitport</span>
               </div>
            </div>
            <div style="background:var(--primary-03)" class="h-40 font-1 br-10 w-fit p-10 g-5 p-x-10 row align-center justify-center no-select c-primary font-weight-900">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM10.6219 8.41459L15.5008 11.6672C15.6846 11.7897 15.7343 12.0381 15.6117 12.2219C15.5824 12.2658 15.5447 12.3035 15.5008 12.3328L10.6219 15.5854C10.4381 15.708 10.1897 15.6583 10.0672 15.4745C10.0234 15.4088 10 15.3316 10 15.2526V8.74741C10 8.52649 10.1791 8.34741 10.4 8.34741C10.479 8.34741 10.5562 8.37078 10.6219 8.41459Z"></path></svg>

                <span>Start Streaming</span>
            </div>

           </div>
       @endif
    </section>
    
    {{-- popup --}}
    <section onclick="this.classList.remove('active')" class="track-modal">
        <div onclick="event.stopPropagation()" class="child">
            <img src="" alt="Track Banner" class="w-full br-5 track-banner no-select no-pointer">
        {{-- new column --}}
        <div class="column w-full g-2">
                <div vitecss-marquee vitecss-marquee-check>
            <div>
                <strong class="font-1 track-name ws-nowrap font-weight-900"></strong>
            </div>
        </div>
         <div vitecss-marquee vitecss-marquee-check>
            <div>
                <strong class="font-size-09 ws-nowrap track-artist font-weight-600 opacity-05"></strong>
            </div>
        </div>
        </div>
        {{-- progress bar --}}
        <div style="background:var(--rgt-04);min-height:5px !important;" class="progress-bar w-full h-5 br-1000">
            <div style="background:var(--rgt-10);width:0%;" class="h-full"></div>
        </div>
        {{-- controls --}}
        <div class="row w-full align-center justify-center g-10">
            <i id="previous" class="track-skip disabled" onclick="Previous(this.dataset.index,this)">
                <!--
version: "2.0"
unicode: "f697"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M20.341 4.247l-8 7a1 1 0 0 0 0 1.506l8 7c.647 .565 1.659 .106 1.659 -.753v-14c0 -.86 -1.012 -1.318 -1.659 -.753z"></path>
  <path d="M9.341 4.247l-8 7a1 1 0 0 0 0 1.506l8 7c.647 .565 1.659 .106 1.659 -.753v-14c0 -.86 -1.012 -1.318 -1.659 -.753z"></path>
</svg>

            </i>
            <i onclick="StateControl(this)" class="state-controls">
              <!--
version: "2.0"
unicode: "f691"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"></path>
</svg>


            </i>
            <i id="next" class="track-skip disabled" onclick="Next(this.dataset.index,this)">
                <!--
version: "2.0"
unicode: "f696"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M2 5v14c0 .86 1.012 1.318 1.659 .753l8 -7a1 1 0 0 0 0 -1.506l-8 -7c-.647 -.565 -1.659 -.106 -1.659 .753z"></path>
  <path d="M13 5v14c0 .86 1.012 1.318 1.659 .753l8 -7a1 1 0 0 0 0 -1.506l-8 -7c-.647 -.565 -1.659 -.106 -1.659 .753z"></path>
</svg>
 
            </i>
        </div>
        {{--new column  --}}
        <div class="column g-2 align-center w-full">
             <span class="row m-x-auto font-weight-600" style="color:var(--primary)">Streaming Reward: <span class="streaming-reward font-weight-900">{{ $currency }}50</span></span>
       <small class="opacity-05">Full Stream</small>
        </div>
        
        
        </div>
    </section>

     @push('js')
               <script class="js">
                var allAudio=[];
                let currentaudio=null;
                let duration;
                let currenttime;
                async function PlayTrack(banner,song,name,artist,element,next_index,previous_index,streaming_reward,track_id){
                    element=element.querySelector('svg');
                    try{
                    //    document.querySelector('#next').dataset.index=next_index;
                    //    document.querySelector('#previous').dataset.index=previous_index;
                    document.querySelector('.streaming-reward').innerHTML=streaming_reward;
                       document.querySelector('.track-name').closest('[vitecss-marquee] > div').style.transform=`translateX(0)`;
                        document.querySelector('.track-banner').src=banner;
                        document.querySelector('.track-name').innerHTML=name;
                         document.querySelector('.track-artist').innerHTML=artist;
                         document.querySelector('.state-controls').innerHTML='<svg height="40" width="40" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><circle cx="12" cy="12" r="9.5" fill="none" stroke-width="3" stroke-linecap="round"><animate attributeName="stroke-dasharray" dur="1.5s" calcMode="spline" values="0 150;42 150;42 150;42 150" keyTimes="0;0.475;0.95;1" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" repeatCount="indefinite"/><animate attributeName="stroke-dashoffset" dur="1.5s" calcMode="spline" values="0;-16;-59;-59" keyTimes="0;0.475;0.95;1" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" repeatCount="indefinite"/></circle><animateTransform attributeName="transform" type="rotate" dur="2s" values="0 12 12;360 12 12" repeatCount="indefinite"/></g></svg>';  
                        CustomMarquee();
                          document.querySelector('.track-modal').style.transformOrigin=(element.getBoundingClientRect().left + (element.getBoundingClientRect().width /2)) + 'px ' + (element.getBoundingClientRect().top + (element.getBoundingClientRect().height/2)) + 'px';
                    document.querySelector('.track-modal').classList.add('active');
                    let audio=new Audio(song);
                    allAudio.push(audio);
                    await audio.play();
                    duration=audio.duration;
                    currenttime=audio.currentTime;
                    document.querySelector('.progress-bar > div').style.width=0;
                   audio.addEventListener('timeupdate',()=>{
                        currenttime=currentaudio.currentTime;

                        document.querySelector('.progress-bar > div').style.width=((currenttime / duration) * 100).toFixed(2) + '%'
                    });
                    if(currentaudio){
                    currentaudio.pause();
                    // currentaudio.addEventListener('timeupdate',()=>{
                    //     alert(10)
                    //     currenttime=currentaudio.currentTime;
                    //     CreateNotify('info',currenttime)

                    //     document.querySelector('.progress-bar > div').style.width=(currenttime * duration)/100 + '%'
                    // });

                    }
                    currentaudio=audio;
                    allAudio.push(currentaudio);

                  
                    
                    
                 
                       
                         document.querySelector('.state-controls').innerHTML=`<!--
version: "2.0"
unicode: "f690"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M9 4h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2z"></path>
  <path d="M17 4h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2z"></path>
</svg>`;

audio.addEventListener('ended',()=>{
      document.querySelector('.state-controls').innerHTML=`<!--
version: "2.0"
unicode: "f691"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"></path>
</svg>
`;
 
document.querySelector('.populate .reward-text').innerHTML=streaming_reward;
document.querySelector('.populate .child input[name=id]').value=track_id;
document.querySelector('.populate').classList.add('active');

});

                     
                    }catch(error){
                        alert(error)
                    }
                   
                }
                // new
                function StateControl(element){
                    if(currentaudio){
                        if(!currentaudio.paused){
                            currentaudio.pause();
                            element.innerHTML=`<!--
version: "2.0"
unicode: "f691"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"></path>
</svg>
`;
                        }else{
                            currentaudio.play();
                            element.innerHTML=`<!--
version: "2.0"
unicode: "f690"
-->
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="CurrentColor">
  <path d="M9 4h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2z"></path>
  <path d="M17 4h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2z"></path>
</svg>
`;
                        }
                    }
                }

                // new
                function Next(index,element){
                    try{
                        if(index > 0){
                            document.querySelector('#previous').classList.remove('disabled');
                        }
                        // alert(10)
                         if(document.querySelectorAll('.track-loops')[index]){
                    document.querySelectorAll('.track-loops')[index].querySelector('.play-track').click();
                    
                    }else{
                       element.classList.add('disabled');
                    }
                    }catch(error){
                        alert(error)
                    }
                   
                }

                // new
                 function Previous(index,element){
                    try{
                        // alert(10)
                         if(document.querySelectorAll('.track-loops')[index]){
                    document.querySelectorAll('.track-loops')[index].querySelector('.play-track').click();
                    
                    }else{
                       element.classList.add('disabled');
                    }
                    }catch(error){
                        alert(error)
                    }
                   
                }

                // new
                function Streamed(response){
                    let data=JSON.parse(response);
                    if(data.status == 'success'){
                        Redirect('{{ url()->current() }}')
                    }
                }
               </script>
           @endpush
@endsection