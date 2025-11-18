@isset($alter_trx)
    @if ($action == 'approve')
        @if ($trx->type == 'withdrawal')
        <section class="column g-10 w-full">
            <svg class="m-x-auto" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#4caf50" viewBox="0 0 256 256"><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM224,48V208a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM208,208V48H48V208H208Z"></path></svg>
            <span class="text-center">Are you sure you want to approve this withdrawal?for safety reasons, please ensure you have actually sent the funds into the users provided bank details.</span>
         {{-- <button onclick="window.location.href='{{ url('admins/get/transaction/alter/confirm?action=approve&id='.$trx->id.'') }}'" class="w-full btn-green-3d">Yes! i confirm to Approve</button>
        --}}
            <button onclick="GetRequest(event,'{{ url('admins/get/transaction/alter/confirm?action=approve&id='.$trx->id.'') }}',this,MyFunc.Altered)" class="w-full btn-green-3d">Yes! i confirm to Approve</button>
        </section>
        @else
         <section class="column g-10 w-full">
            <svg class="m-x-auto" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#4caf50" viewBox="0 0 256 256"><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM224,48V208a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM208,208V48H48V208H208Z"></path></svg>
            <span class="text-center">Are you sure you want to approve this deposit?for safety reasons, please confirm the exact amount has been sent as the user would be creditted the sum of <strong class="c-green font-1">&#8358;{{ number_format($trx->amount,2) }}</strong> into his/her deposit wallet.</span>
        <button onclick="GetRequest(event,'{{ url('admins/get/transaction/alter/confirm?action=approve&id='.$trx->id.'') }}',this,MyFunc.Altered)" class="w-full btn-green-3d">Yes! i confirm to Approve</button>
        </section>
    @endif
    @else
        @if ($trx->type == 'withdrawal')
        <section class="column g-10 w-full">
            <svg class="m-x-auto" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" viewBox="0 0 256 256"><path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path></svg>
             <span class="text-center">Are you sure you want to reject this withdrawal?note that the sum of <strong class="c-green font-1">&#8358;{{ number_format($trx->amount,2) }}</strong> would be reversed back to the users withdrawal wallet. This action cannot be undone.</span>
        <button onclick="GetRequest(event,'{{ url('admins/get/transaction/alter/confirm?action=reject&id='.$trx->id.'') }}',this,MyFunc.Altered)" class="w-full btn-red-3d">Yes! i confirm to Reject</button>
        </section>
         @else
         <section class="column g-10 w-full">
            <svg class="m-x-auto" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" viewBox="0 0 256 256"><path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path></svg>
          
            <span class="text-center">Are you sure you want to reject this deposit?This action cannot be undone.</span>
        <button onclick="GetRequest(event,'{{ url('admins/get/transaction/alter/confirm?action=reject&id='.$trx->id.'') }}',this,MyFunc.Altered)" class="w-full btn-red-3d">Yes! i confirm to Reject</button>
        </section>
    @endif
    
    @endif

@endisset

@isset($search_users)
@if ($users->isEmpty())
<a class="row no-u text-dim clip-10 align-center g-5 space-between p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM80,108a12,12,0,1,1,12,12A12,12,0,0,1,80,108Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,176,108Zm-1.08,64a8,8,0,1,1-13.84,8c-7.47-12.91-19.21-20-33.08-20s-25.61,7.1-33.08,20a8,8,0,1,1-13.84-8c10.29-17.79,27.39-28,46.92-28S164.63,154.2,174.92,172Z"></path></svg>
                 <span class="m-right-auto">No User Found</span>
                   </a>
      @else
        @foreach ($users as $data)
       <a href="{{ url('admins/user?id='.$data->id.'') }}" class="row no-u text-dim clip-10 align-center g-5 space-between p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M221.35,104.11a8,8,0,0,0-6.57,9.21A88.85,88.85,0,0,1,216,128a87.62,87.62,0,0,1-22.24,58.41,79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75A88,88,0,0,1,128,40a88.76,88.76,0,0,1,14.68,1.22,8,8,0,0,0,2.64-15.78,103.92,103.92,0,1,0,85.24,85.24A8,8,0,0,0,221.35,104.11ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM237.66,45.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L200,60.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                <span class="m-right-auto">{{ $data->username }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
            </a> 
  @endforeach    
@endif
@endisset