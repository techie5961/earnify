@extends('layout.admins.app')
@section('title')
   {{ ucfirst($status) }} Users
@endsection
@section('main')
    <section class="column g-10 p-10 w-full">
        <div class="bg-light p-10 br-10 column space-between box-shadow">
            <div class="row align-center w-full g-10">
                <div class=" h-50 w-50 clip-10 bg-primary-transparent column justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M32,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H40A8,8,0,0,1,32,64Zm8,72H96a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16Zm72,48H40a8,8,0,0,0,0,16h72a8,8,0,0,0,0-16Zm125.09-40.22-22.52,18.59,6.86,27.71a8,8,0,0,1-11.82,8.81L184,183.82l-25.61,15.07a8,8,0,0,1-11.82-8.81l6.85-27.71-22.51-18.59a8,8,0,0,1,4.47-14.14l29.84-2.31,11.43-26.5a8,8,0,0,1,14.7,0l11.43,26.5,29.84,2.31a8,8,0,0,1,4.47,14.14Zm-25.47.28-14.89-1.15a8,8,0,0,1-6.73-4.8l-6-13.92-6,13.92a8,8,0,0,1-6.73,4.8l-14.89,1.15,11.11,9.18a8,8,0,0,1,2.68,8.09l-3.5,14.12,13.27-7.81a8,8,0,0,1,8.12,0l13.27,7.81-3.5-14.12a8,8,0,0,1,2.68-8.09Z"></path></svg>
               
                </div>
                 <div class="column g-5">
                    <span class="text-dim">Total {{ $status == 'all' ? '' : ucfirst($status) }} Users</span>
                    <strong class="font-1">{{ number_format($total) }}</strong>
                </div>
            </div>
        </div>
        {{-- NEW --}}
          <div class="bg-light p-10 br-10 column space-between box-shadow">
            <div class="row align-center w-full g-10">
                <div class=" h-50 w-50 clip-10 bg-primary-transparent column justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

                </div>
                 <div class="column g-5">
                    <span class="text-dim">Active Users</span>
                    <strong class="font-1">{{ number_format($active) }}</strong>
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
                    <span class="text-dim">Today's Signups</span>
                    <strong class="font-1">{{ number_format($today) }}</strong>
                </div>
            </div>
        </div>
        <div class="p-10 pos-relative w-full bg-light box-shadow br-10">
            <div class="w-full row br-10 border-1 border-color-silver h-50">
             <div class="h-full perfect-square column justify-center">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>

             </div>
             <input oninput="SearchRequest(event,this,'{{ url('admins/search/users?status=all&q=') }}'+ this.value,document.querySelector('.search-result'))" type="search" placeholder="Search by Username or Email" class="h-full w-full no-border bg-transparent br-10">
            </div>
            <div class="pos-absolute display-none search-result low top-full left-0 right-0 column bg-white box-shadow br-0-0-10-10">
            <a href="" class="row no-u text-dim clip-10 align-center g-5 space-between p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M221.35,104.11a8,8,0,0,0-6.57,9.21A88.85,88.85,0,0,1,216,128a87.62,87.62,0,0,1-22.24,58.41,79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75A88,88,0,0,1,128,40a88.76,88.76,0,0,1,14.68,1.22,8,8,0,0,0,2.64-15.78,103.92,103.92,0,1,0,85.24,85.24A8,8,0,0,0,221.35,104.11ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM237.66,45.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L200,60.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                <span class="m-right-auto">Techie</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
            </a>
             <a href="" class="row no-u text-dim clip-10 align-center g-5 space-between p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M221.35,104.11a8,8,0,0,0-6.57,9.21A88.85,88.85,0,0,1,216,128a87.62,87.62,0,0,1-22.24,58.41,79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75A88,88,0,0,1,128,40a88.76,88.76,0,0,1,14.68,1.22,8,8,0,0,0,2.64-15.78,103.92,103.92,0,1,0,85.24,85.24A8,8,0,0,0,221.35,104.11ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM237.66,45.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L200,60.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                <span class="m-right-auto">Techie</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
            </a>
             <a href="" class="row no-u text-dim clip-10 align-center g-5 space-between p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M221.35,104.11a8,8,0,0,0-6.57,9.21A88.85,88.85,0,0,1,216,128a87.62,87.62,0,0,1-22.24,58.41,79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75A88,88,0,0,1,128,40a88.76,88.76,0,0,1,14.68,1.22,8,8,0,0,0,2.64-15.78,103.92,103.92,0,1,0,85.24,85.24A8,8,0,0,0,221.35,104.11ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM237.66,45.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L200,60.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                <span class="m-right-auto">Techie</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
            </a>
            </div>
        </div>

         @if ($users->isEmpty())
        @include('components.sections',[
            'null' => 'true',
            'text' => 'No Transactions Found'
        ])
    @else
       <div class="w-full grid pc-grid-2 g-10">
        
        @foreach ($users as $data)
            <div class="w-full p-10 br-10 box-shadow bg-light">
                <div class="row space-between g-10">
                    <img src="{{ asset('images/avatar.jpeg') }}" class="h-50 w-50 clip-circle border-2 border-color-primary circle" alt="">
                    <div class="column g-2 m-right-auto">
                        <strong class="c-primary row align-center g-2 font-1">{{ ucfirst($data->username) }}
                             @if ($data->type == 'promoter')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffd700" viewBox="0 0 256 256"><path d="M248,80a28,28,0,1,0-51.12,15.77l-26.79,33L146,73.4a28,28,0,1,0-36.06,0L85.91,128.74l-26.79-33a28,28,0,1,0-26.6,12L47,194.63A16,16,0,0,0,62.78,208H193.22A16,16,0,0,0,209,194.63l14.47-86.85A28,28,0,0,0,248,80ZM128,40a12,12,0,1,1-12,12A12,12,0,0,1,128,40ZM24,80A12,12,0,1,1,36,92,12,12,0,0,1,24,80ZM220,92a12,12,0,1,1,12-12A12,12,0,0,1,220,92Z"></path></svg>

                            @endif
                        </strong>
                        <div class="row g-2 align-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-8,144H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>
                            <span class="text-average text-dim">{{ $data->email }}</span>
                        </div>
                          <div class="row g-2 align-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                            <span class="text-average text-dim">Joined {{ $data->frame }}</span>
                        </div>


                    </div>
                    <div class="status {{ $data->status == 'active' ? 'green' : 'red' }}">{{ $data->status }}</div>

                </div>
                <hr>
                <div class="grid grid-2 g-10 w-full g-10">
                   <div class="w-full br-10 p-10 justify-center column align-center min-h-70 bg-dim">
                    <span class="text-dim">Deposit Balance</span>
                    <strong class="c-green font-1">&#8358;{{ number_format($data->deposit,2) }}</strong>
                   </div>
                   <div class="w-full br-10 p-10 justify-center column align-center min-h-70 bg-dim">
                    <span class="text-dim">Withdrawal Balance</span>
                    <strong class="c-green font-1">&#8358;{{ number_format($data->withdrawal,2) }}</strong>
                   </div>
                </div>
                <div class="row g-5 align-center">
                    
                    <span class="text-dim">Last Deposit:</span>
                    <strong class="font-1 c-primary">&#8358;{{ number_format($data->last_deposit,2) }}</strong>
                </div>
                 <div class="row g-5 align-center">
                    
                    <span class="text-dim">Last Withdrawal:</span>
                    <strong class="font-1 c-primary">&#8358;{{ number_format($data->last_withdrawal,2) }}</strong>
                </div>
                   <div class="row g-5 align-center">
                    
                    <span class="text-dim">Total Deposit:</span>
                    <strong class="font-1 c-primary">&#8358;{{ number_format($data->total_deposit,2) }}</strong>
                </div>
                  <div class="row g-5 align-center">
                    
                    <span class="text-dim">Total Withdrawn:</span>
                    <strong class="font-1 c-primary">&#8358;{{ number_format($data->total_withdrawn,2) }}</strong>
                </div>
                <div class="row g-5 align-center">
                    
                    <span class="text-dim">Referred By:</span>
                    <a href="{{ url('admins/user?id='.$data->ref.'') }}" class="font-1 no-select bold u c-primary">{{ $data->ref ?? '' }}</a>
                </div>
                <div class="row g-5 align-center">
                    
                    <span class="text-dim">Total Direct Referrals:</span>
                  <strong class="font-1 c-primary">{{ number_format($data->total_referrals) }}</strong>
        
                </div>
                <a href="{{ url('admins/user?id='.$data->id.'') }}">View More...</a>
            </div>
        @endforeach



             @if ($users->hasMorePages())
        @include('components.sections',[
            'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                'page' => 2,
                'paginate' => true,
               
     ])),
     'infinite_loading' => true
        ])
    @endif
       </div>
    @endif
   
    </section>
   
@endsection

@section('js')
    <script class="js">
   InfiniteLoading();
       window.MyFunc ={
        Populate : function(response){
            PopUp(response);
        },
        Altered : function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                CreateNotify(data.status,data.message);
                window.location.reload();

            }
        }
    }
</script>
@endsection