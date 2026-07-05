@extends('layout.admins.app')
@section('title')
   Edit Task
@endsection
@section('main')
    <section class="w-full column g-10">
         <form style="border:1px solid var(--rgt-01);" action="{{ url('admins/post/edit/task/process') }}" onsubmit="PostRequest(event,this,Posted)" class="w-full bg-light br-10 p-20 column g-10">
            <strong class="desc">Edit Task</strong>
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
            {{-- task id --}}
            <input type="hidden" name="id" class="inp input" value="{{ $data->id }}">
            {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Task Title</label>
                <small>Enter display title of the task</small>
                 <div class="cont">
               <input value="{{ $data->title }}" placeholder="Enter Task Title ( E.g Whatsapp Group)" type="text" class="inp input required" name="title">
            </div>
            </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Task Link</label>
                <small>Enter the link to the task</small>
                 <div class="cont">
               <input value="{{ $data->link }}" name="link" type="url" placeholder="Enter task link" class="inp input required">
                 </div>
                 </div>
                  {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Reward per User</label>
                <small>How much each user earns when he/she performs this task</small>
                 <div class="cont">
               <input value="{{ $data->reward }}" placeholder="Enter Task Reward" type="number" inputmode="numeric" class="inp input required" name="reward">
            </div>
            </div>
                  {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Members</label>
                <small>The task is automatically removed from users dashboard if the members limit is reached( <span class="font-weight-900">For Example, For a 100 members task,the task is automatically removed when 100 users have performed  the task</span> ),you don't need to manually delete it</small>
                 <div class="cont">
               <input value="{{ $data->limit }}" name="members" inputmode="numeric" type="number" placeholder="I.e 100 members" class="inp input required">
                 </div>
                 </div>
                   {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Banner(Optional)</label>
                 <label class="column g-5px w-full h-150px border-width-1px border-style-solid border-color-rgt-01 p-20px align-center justify-center text-center">
                    <span class="opacity-05">Tap to change Banner( Optional )</span>
                    <span class="opacity-05 font-size-07">JPG, PNG, WEBP (MAX: 2MB)</span>
                  
               <input onchange="PreviewPhoto(this,this.closest('label'))" name="banner" type="file" accept="image/*" class="inp display-none input">
                 </label>
                 </div>
                   {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Caption(Optional)</label>
                 <div class="cont">
              <textarea name="caption" placeholder="Enter caption..." class="inp no-resize input">{{ $data->caption ?? '' }}</textarea>
                 </div>
                 </div>
                

                 {{-- submit btn --}}
                 <button class="post">Save Changes</button>
           
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
     
            function  Posted(response){
               
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    
                    window.location.href=data.link;
                }
            }
            function PreviewImage(element){
                let file=element.files[0];
                if(file){
                    
                    element.closest('.banner').querySelector('img').src=URL.createObjectURL(file);
                    element.closest('.banner').classList.add('active');
                }else{
                    element.closest('.banner').classList.remove('active');
                }
            }
        
    </script>
@endsection