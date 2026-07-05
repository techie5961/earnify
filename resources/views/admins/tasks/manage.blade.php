@extends('layout.admins.app')
@section('title')
    Manage Tasks
@endsection
@section('css')
    <style class="css">
       
       
      
      
    </style>
@endsection
@section('main')
    <section class="column w-full g-10">
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M11 4H21V6H11V4ZM11 8H17V10H11V8ZM11 14H21V16H11V14ZM11 18H17V20H11V18ZM3 4H9V10H3V4ZM5 6V8H7V6H5ZM3 14H9V20H3V14ZM5 16V18H7V16H5Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Tasks</span>
                <strong class="font-size-1-2 font-weight-900">{{ number_format($total) }}</strong>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M13 4H21V6H13V4ZM13 11H21V13H13V11ZM13 18H21V20H13V18ZM6.5 19C5.39543 19 4.5 18.1046 4.5 17C4.5 15.8954 5.39543 15 6.5 15C7.60457 15 8.5 15.8954 8.5 17C8.5 18.1046 7.60457 19 6.5 19ZM6.5 21C8.70914 21 10.5 19.2091 10.5 17C10.5 14.7909 8.70914 13 6.5 13C4.29086 13 2.5 14.7909 2.5 17C2.5 19.2091 4.29086 21 6.5 21ZM5 6V9H8V6H5ZM3 4H10V11H3V4Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Active Tasks</span>
                <strong class="font-size-1-2 font-weight-900">{{ number_format($total_active) }}</strong>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
             <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Completed Tasks</span>
                <strong class="font-size-1-2 font-weight-900">{{ number_format($total_completed) }}</strong>
            </div>
        </div>
        @if ($tasks->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Task available'
            ])
        @else
            <div class="grid pc-grid-2 w-full place-center g-10">
                @foreach ($tasks as $data)
                    <div style="border:1px solid var(--rgt-01)" class="column w-full g-10 br-primary p-20 bg-light">
                             {{--new row  --}}
                             <div class="row w-full align-center space-between">
                                
                                <div class="column g-2px">
                                <strong class="font-weight-900 font-1">{{ $data->title ?? 'null' }}</strong>
                                    <small class="opacity-07">Posted {{ $data->frame }}</small>
                                </div>
                            <div class="status {{ $data->status == 'active' ? 'green' : ($data->status == 'completed' ? 'primary' : 'red') }}">{{ $data->status }}</div>
                             </div>
                             <div class="hr" vitecss-type="dashed"></div>
                            
                             
                             {{-- new row --}}
                             <div class="row w-full g-10 space-between">
                                {{-- new item --}}
                                <div class="column g-5 text-start">
                                    <small>Total Charged</small>
                                    <strong>{{ $currency }}{{ number_format($data->user_id == 0 ? 0 : ($data->type->cost ?? 0 * $data->limit),2) }}</strong>
                                </div>
                                {{-- new item --}}
                                 <div class="column g-5 text-end">
                                    <small>Earning per user</small>
                                    <strong>{{ $currency }}{{ number_format($data->reward,2) }}</strong>
                                </div>
                             </div>
                              {{-- new row --}}
                             <div class="row w-full g-10 space-between">
                                {{-- new item --}}
                                <div class="column g-5 text-start">
                                    <small>Task Limit</small>
                                    <strong>{{ number_format($data->limit) }} Users</strong>
                                </div>
                                {{-- new item --}}
                                 <div class="column g-5 text-end">
                                    <small>Total Proofs Submitted</small>
                                    <strong>{{ number_format($data->proofs) }}</strong>
                                </div>
                             </div>
                              {{-- new row --}}
                             <div style="border-bottom:1px dashed var(--rgt-01);padding-bottom:10px;" class="row w-full g-10 space-between">
                                {{-- new item --}}
                                <div class="column g-5 text-start">
                                    <small>Task Banner</small>
                                 @isset($data->banner)
                                        <a href="{{ asset('tasks/banners/'.$data->banner.'') }}" target="_blank" class="c-primary no-select row align-center g-5">
                                        Click to View
                                       <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M10 6V8H5V19H16V14H18V20C18 20.5523 17.5523 21 17 21H4C3.44772 21 3 20.5523 3 20V7C3 6.44772 3.44772 6 4 6H10ZM21 3V12L17.206 8.207L11.2071 14.2071L9.79289 12.7929L15.792 6.793L12 3H21Z"></path></svg>

                                    </a>
                                    @else
                                       <a class="c-primary no-select row align-center g-5">No Banner Attached
                                    </a>
                                 @endisset
                                </div>
                               @if(isset($data->caption) && $data->caption != '')
                                   <div onclick="this.querySelector('.caption').classList.contains('display-none') ? this.querySelector('.caption').classList.remove('display-none') : this.querySelector('.caption').classList.add('display-none')" class="pc-pointer pos-relative p-5px h-fit br-4px row align-center justify-center no-select bg-primary primary-text">
                                    View Caption
                                        <div style="box-shadow: 0 0 10px rgba(0,0,0,0.1)" class="display-none caption pos-absolute diplay-none c-text min-w-200px max-w-500px bottom-full right-0 p-15px text-align-start bg-light z-index-100 br-6px">
                                            {!! nl2br($data->caption) !!}
                                        </div>
                                   </div>
                               @endif
                             </div>
                             {{-- new row --}}
                             <div class="row align-center w-full space-between">
                                <button onclick="window.open('{{ $data->link }}')" class="btn-blue-3d">
                                    Visit Task Link
                                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 6V8H5V19H16V14H18V20C18 20.5523 17.5523 21 17 21H4C3.44772 21 3 20.5523 3 20V7C3 6.44772 3.44772 6 4 6H10ZM21 3V12L17.206 8.207L11.2071 14.2071L9.79289 12.7929L15.792 6.793L12 3H21Z"></path></svg>

                                </button>
                                  <button onclick="window.location.href='{{ url('admins/task/proofs?task_id='.$data->id.'') }}'" class="btn-primary-3d">
                                   View Proofs
                                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>
                                </button>
                             </div>
                              {{-- new row --}}
                             <div class="row align-center w-full space-between">
                                <button onclick="window.location.href='{{ url('admins/task/edit?id='.$data->id.'') }}'" class="btn-green-3d">
                               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L9.29145 10.4627L9.29886 14.7099L13.537 14.7024L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>
                               
                                    Edit
                                    
                                </button>
                                  <button onclick="ShowDeletePrompt('{{ $data->id }}','{{ $data->user_id }}')" class="btn-red-3d">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9ZM9 12V18H11V12H9ZM13 12V18H15V12H13Z"></path></svg>

                                   Delete
                                     </button>
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
    <section onclick="this.classList.remove('active')" class="modal delete">
        <div onclick="event.stopPropagation()" class="child align-center justify-center">
            <div class="w-50 perfect-square circle column no-shrink align-center justify-center bg-red c-white">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M7 6V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7ZM13.4142 13.9997L15.182 12.232L13.7678 10.8178L12 12.5855L10.2322 10.8178L8.81802 12.232L10.5858 13.9997L8.81802 15.7675L10.2322 17.1817L12 15.4139L13.7678 17.1817L15.182 15.7675L13.4142 13.9997ZM9 4V6H15V4H9Z"></path></svg>

            </div>
            <strong class="desc">Delete this task</strong>
            <span class="text-center">Are you sure you want to delete this task? this action is irreversible</span>
            {{-- form --}}
            <form method="POST" action="{{ url('admins/post/task/delete/process') }}" onsubmit="PostRequest(event,this,Deleted,'Deleting...')" class="w-full column g-10">
              <div class="w-full refund-policy column g-10">
                 <small class="opacity-07 text-center c-red">Toggle on if you want to refund the user who posted the task for the remaining members yet to perform the task,( For example: if the user paid for 100 members and received 30 members, on delete he/she would be refunded for the remaining 70 members,No worries the system automatically does the calculation).</small>

                 {{-- toggle --}}
                <div class="w-full row space-between g-10">
                    <div class="column g-5">
                        <strong class="font-1">Refund the user</strong>
                       
                    </div>
                    <div class="toggle">
                    <div style="max-height:20px;" onclick="Toggle(this)" class="child"></div>
                </div>
                </div>
              </div>
              {{-- toggle input --}}
              <input type="hidden" class="inp input" name="refund" value="no">
              {{-- task id --}}
              <input type="hidden" class="inp input" value="0" name="id">
              {{-- csrf token --}}
              <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                <button class="post">Yes delete</button>
            </form>
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        function Deleted(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.reload();
            }
        }
        function ViewCaption(element){
                let is_shown=element.querySelector('.child').classList.contains('active') ? true : false;
                let captions=document.querySelectorAll('.caption .child');
                captions.forEach((caption)=>{
                    caption.classList.remove('active');
                });
                if(is_shown){
                    element.querySelector('.child').classList.remove('active');
                }else{
                    element.querySelector('.child').classList.add('active');
                }
                
        }
        function Toggle(element){
            if(element.closest('.toggle').classList.contains('active')){
                element.closest('.toggle').classList.remove('active');
                document.querySelector('input[name=refund]').value='no';
            }else{
                 element.closest('.toggle').classList.add('active');
                document.querySelector('input[name=refund]').value='yes';
            }
        }

        function ShowDeletePrompt(task_id,user_id){
         try{
               document.querySelector('.modal.delete input[name=id]').value=task_id;
             document.querySelector('.modal.delete input[name=refund]').value='no';
            document.querySelector('.modal.delete form .toggle').classList.remove('active');
             document.querySelector('.modal.delete').classList.add('active');
            
            if(user_id != 0){
                document.querySelector('.modal.active form .refund-policy').classList.remove('display-none');
            }else{
                document.querySelector('.modal.active form .refund-policy').classList.add('display-none');
            }
         }catch(error){
            alert(error.stack)
         }
               
        }
    </script>
@endsection