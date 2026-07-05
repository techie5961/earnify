@extends('layout.users.app')
@section('title')
    Daily Activities
@endsection
@section('main')
    <section class="w-full column g-10px">
      
       @if ($tasks->isEmpty())
           @include('components.utilities',[
            'empty' => true,
            'text' => 'No activity available',
            'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>'
           ])
       @else
            <div class="column">
         <strong class="desc font-weight-900">Daily Activities</strong>
        <span class="opacity-07">Perform daily tasks and earn rewards</span>
       </div>
       <div class="grid w-full pc-grid-2 g-10px place-center">
         @foreach ($tasks as $data)
           <div class="w-full card br-10px column g-10px bg-light border-width-1px border-color-rgt-01 border-style-solid p-15px">
            {{-- new row --}}
            <div class="row w-full align-center g-10px space-between">
                {{-- new --}}
                <div class="h-40px perfect-square circle no-shrink border-width-1px border-style-solid border-color-primary-03">
                    @isset($data->banner)
                        <img src="{{ asset('tasks/banners/'.$data->banner.'') }}" alt="" class="h-full w-full br-inherit no-pointer no-select">
                    @else
                        <img src="{{ asset('tasks/banners/IMG_7615.jpeg') }}" alt="" class="h-full w-full br-inherit no-pointer no-select">
                     @endisset
                </div>
                {{-- new column --}}
                <div class="column g-3px m-right-auto">
                <strong class="uppercase">{{ $data->title }}</strong>
                <small class="opacity-07">Click the button below to perform this task</small>
                </div>
                {{-- new --}}
                <strong class="c-secondary font-size-1 ws-nowrap block m-bottom-auto">{{ Auth::guard('users')->user()->currency.number_format($data->reward,2) }}</strong>
            </div>
            <script class="json">
               @json([
                "id" => $data->id,
                "_token" => @csrf_token()
               ])
            </script>
            {{-- new row --}}
            <div class="row align-center g-10px space-between">
                <div class="h-7px overflow-hidden m-top-auto br-1000 bg-rgt-01 flex-auto">
                    <div style="background:linear-gradient(to right,var(--primary),var(--secondary));width:{{ min(($data->proofs/$data->limit)*100,100) }}%;" class="h-full br-inherit bg-primary"></div>
                </div>
                <button x-data="{
                    'link' : '{{ $data->link }}',
                    'text' : 'Claim reward'
                }" x-on:click="
                         if(!$el.hasAttribute('data-clicked')){
                        window.open(link);
                        $el.setAttribute('data-clicked','true');
                        $el.innerHTML=text;
                    }else{
                        $el.innerHTML='Claiming...';
                        $el.classList.add('disabled');
                        SendPostRequest('{{ url('users/post/claim/task/reward/process') }}',JSON.parse($el.closest('.card').querySelector('.json').textContent.trim()),function(response){
                           let data=JSON.parse(response);
                           CreateNotify(data.status,data.message);
                           $el.innerHTML=text;
                           $el.classList.remove('disabled');
                           if(data.status == 'success'){
                            Redirect('{{ url()->current().'?'.http_build_query(request()->query()) }}')
                           }
                        })
                    }
                    
                " class="btn-primary m-right-auto p-5px p-x-10px br-5px clip-none">Perform Task</button>
            </div>
           
           </div>
       @endforeach
       </div>
      @if ($tasks->lastPage() > 1)
      @include('components.utilities',[
        'paginate' => true,
        'data' => $tasks
      ])
          
      @endif
       @endif
    </section>
@endsection
