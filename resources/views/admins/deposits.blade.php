@extends('layout.admins.app')
@section('title')
   {{ $status }} Deposits
@endsection
@section('main')
    <section class="column g-10 p-10 w-full">
        <div class="bg-light p-10 br-10 column space-between box-shadow">
            <div class="row align-center w-full g-10">
                <div class=" h-50 w-50 clip-10 bg-primary-transparent column justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M32,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H40A8,8,0,0,1,32,64Zm8,72H96a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16Zm72,48H40a8,8,0,0,0,0,16h72a8,8,0,0,0,0-16Zm125.09-40.22-22.52,18.59,6.86,27.71a8,8,0,0,1-11.82,8.81L184,183.82l-25.61,15.07a8,8,0,0,1-11.82-8.81l6.85-27.71-22.51-18.59a8,8,0,0,1,4.47-14.14l29.84-2.31,11.43-26.5a8,8,0,0,1,14.7,0l11.43,26.5,29.84,2.31a8,8,0,0,1,4.47,14.14Zm-25.47.28-14.89-1.15a8,8,0,0,1-6.73-4.8l-6-13.92-6,13.92a8,8,0,0,1-6.73,4.8l-14.89,1.15,11.11,9.18a8,8,0,0,1,2.68,8.09l-3.5,14.12,13.27-7.81a8,8,0,0,1,8.12,0l13.27,7.81-3.5-14.12a8,8,0,0,1,2.68-8.09Z"></path></svg>
               
                </div>
                 <div class="column g-5">
                    <span class="text-dim">Total {{ $status }} Deposits</span>
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
                    <span class="text-dim">Today's {{ $status }} Deposits</span>
                    <strong class="font-1">{{ number_format($today) }}</strong>
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
                    <span class="text-dim">Total Amount</span>
                    <strong class="font-1">&#8358;{{ number_format($sum,2) }}</strong>
                </div>
            </div>
        </div>

         @if ($trx->isEmpty())
        @include('components.sections',[
            'null' => 'true',
            'text' => 'No Transactions Found'
        ])
    @else
       <div class="w-full grid pc-grid-2 g-10">
         @foreach ($trx as $data)
            <div class="column w-full bg-light br-10 box-shadow g-10 p-10">
                <div class="row space-between g-10 w-full">
                    <img src="{{ asset('images/avatar.jpeg') }}" class="h-50 w-50 clip-circle border-2 border-color-primary circle" alt="">
                <div class="column g-5 m-right-auto">
                    <a href="{{ url('admins/user?id='.$data->user_id.'') }}" class="bold font-1 c-primary u">{{ ucfirst($data->user->username) }}</a>
                    <span class=" text-dim">{{ $data->uniqid ?? 'null' }}</span> 
                    <span class="text-average g-2 capitalize row align-center text-dim">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                        Submitted {{ $data->frame }}
                    </span>
                </div>
                <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'rejected' ? 'red' : 'gold') }}">{{ $data->status }}</div>
                </div>
                <hr>
                  <div class="row space-between">
                            <div class="column g-2">
                                <span class="text-dim m-right-auto">Type</span>
                                <strong class="m-right-auto">{{ ucfirst($data->type) }}</strong>
                            </div>
                             <div class="column g-2">
                                <span class="text-dim m-left-auto">Class</span>
                                <strong class="m-left-auto {{ $data->class == 'credit' ? 'c-green' : 'c-red' }}">{{ ucfirst($data->class) }}</strong>
                            </div>
                        </div>
                @switch($data->type)
                    @case('deposit')
                    
                        <div class="row space-between">
                            <div class="column g-2">
                                <span class="text-dim m-right-auto">Bank sent from</span>
                                <strong class="m-right-auto">{{ $data->json->details->bank_name ?? ''.ucfirst($data->json->gateway ?? '').' Auto' }}</strong>
                            </div>
                             <div class="column g-2">
                                <span class="text-dim m-left-auto">Name on Account</span>
                                <strong class="m-left-auto">{{ $data->json->details->account_name ?? ''.ucfirst($data->json->gateway ?? '').' Auto' }}</strong>
                            </div>
                        </div>
                        
                        @break
                    @case('withdrawal')
                        
                        <div class="row space-between">
                            <div class="column g-2">
                                <span class="text-dim m-right-auto">Account Number</span>
                                 <strong class="m-right-auto row align-center">{{ json_decode($data->json->details->bank ?? '{}')->account_number ?? 'null' }} 
                                    <svg class="pc-pointer" onclick="copy('{{ json_decode($data->json->details->bank ?? '{}')->account_number ?? 'null' }}')" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M216,32H88a8,8,0,0,0-8,8V80H40a8,8,0,0,0-8,8V216a8,8,0,0,0,8,8H168a8,8,0,0,0,8-8V176h40a8,8,0,0,0,8-8V40A8,8,0,0,0,216,32Zm-8,128H176V88a8,8,0,0,0-8-8H96V48H208Z"></path></svg>
                                </strong>
                                 </div>
                             <div class="column g-2">
                                <span class="text-dim m-left-auto">Bank Name</span>
                                <strong class="m-left-auto">{{ json_decode($data->json->details->bank ?? '{}')->bank_name ?? 'null' }}</strong>
                            </div>
                        </div>
                         <div class="row space-between">
                            <div class="column g-2">
                                <span class="text-dimm-right-auto">Account Name</span>
                                <strong class="m-right-auto">{{ json_decode($data->json->details->bank ?? '{}')->account_name ?? 'null' }}</strong>
                            </div>
                             <div class="column g-2">
                                <span class="text-dim m-left-auto">Fee</span>
                                <strong class="m-left-auto font-1 c-red">&#8358;{{ number_format($data->json->fee ?? '0',2) }}</strong>
                            </div>
                        </div>
                        @break
                        @case('commission')
                       
                         <div class="row space-between">
                            <div class="column g-2">
                                <span class="text-dimm-right-auto">Referral Level</span>
                                <strong class="m-right-auto">{{ ucfirst($data->json->level).' Level Commission ' ?? 'null' }}</strong>
                            </div>
                             <div class="column g-2">
                                <span class="text-dim m-left-auto">DownLine</span>
                                <strong class="m-left-auto"><a href="{{ url('admins/user?id='.$data->json->user_id.'') }}" class="c-primary u">{{ $data->user->username }}</a> </strong>
                            </div>
                        </div>
                        
                        @break
                          @case('income')
                          
                              <div class="row space-between">
                            <div class="column g-2">
                                <span class="text-dimm-right-auto">Product</span>
                                <strong class="m-right-auto">{{ json_decode($data->json->json)->name ?? 'null' }}</strong>
                            </div>
                             <div class="column g-2">
                                <span class="text-dim m-left-auto">Reward Cycle</span>
                              <strong class="m-left-auto">24 HRS</strong>
                            
                            </div>
                        </div>

                          @break
                    @default
                    
                @endswitch
                @if ($data->type == 'withdrawal')
                    <div class="column g-2">
                         <strong class="desc c-greenm-right-auto">
                    &#8358;{{ number_format($data->amount - $data->json->fee,2) }}
                </strong>
                <span class="">After &#8358;{{ number_format($data->json->fee,2) }} fee deduction</span>
                    </div>

                @else
                <strong class="desc c-greenm-right-auto">
                    &#8358;{{ number_format($data->amount,2) }}
                </strong>
                @endif
               @if ($data->status == 'pending')
                    <hr>

                    <div class="row w-full space-between g-10 align-center">
                        <button onclick="GetRequest(event,'{{ url('admins/get/transaction/alter?action=approve&id='.$data->id.'') }}',this,MyFunc.Populate)" class="btn-green-3d m-left-auto">Approve</button>
                        <button onclick="GetRequest(event,'{{ url('admins/get/transaction/alter?action=reject&id='.$data->id.'') }}',this,MyFunc.Populate)" class="btn-red-3d">Reject</button>
                    </div>
               @endif
                
            </div>
        @endforeach


             @if ($trx->hasMorePages())
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