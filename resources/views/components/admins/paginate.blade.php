{{-- MANAGE PRODUCTS --}}
@isset($manage_products)
     @foreach ($products as $data)
               <div class="w-full column br-10 bg-light p-10 g-10 box-shadow">
                <div class="row g-10 space-between">
                    <img src="{{ asset('products/'.$data->photo.'') }}" class="br-10" height="70" width="70" alt="Product Photo">
                <div class="m-right-auto column">
                    <strong class="font-1">{{ $data->name }}</strong>
                    <strong class="desc c-primary">&#8358;{{ number_format($data->price,2) }}</strong>
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z"></path></svg>

                        <span class=" text-small">Last Updated {{ $data->frame }}</span>
                    </div>
                </div>
                <div class="status {{ $data->status == 'active' ? 'green' : gold }}">{{ $data->status }}</div>
                </div>
                <hr>
                <div class="row space-between">
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                        <strong>Cycle:</strong>
                        <span class="c-primary">{{ number_format($data->cycle) }} Days</span>
                    </div>
                     
                </div>
                <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

                        <strong>Daily Income:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->daily_income,2) }}</span>
                    </div>
                      <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>

                        <strong>Total Income:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->daily_income * $data->cycle,2) }}</span>
                    </div>
                    <div class="row space-between">
                        <button onclick="MyFunc.PromptUser('{{ url('admins/get/delete/product/confirm?id='.$data->id.'') }}','{{ $data->name }}')" class="btn-red-3d">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>

                            Delete</button>
                         <button onclick="window.location.href='{{ url('admins/product/edit?id='.$data->id.'') }}'" class="btn-green-3d">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M201.54,54.46A104,104,0,0,0,54.46,201.54,104,104,0,0,0,201.54,54.46ZM96,210V152h64v58a88.33,88.33,0,0,1-64,0Zm48-74H112V100.94l32-16Zm46.22,54.22A88.09,88.09,0,0,1,176,201.77V152a16,16,0,0,0-16-16V72a8,8,0,0,0-11.58-7.16l-48,24A8,8,0,0,0,96,96v40a16,16,0,0,0-16,16v49.77a88,88,0,1,1,110.22-11.55Z"></path></svg>
                            
                            Edit</button>
                    </div>
                    
               </div>
           @endforeach
     
       @if ($products->hasMorePages())
           @include('components.sections',[
            'infinite_loading' => true,
            'url' => url('admins/products/manage?'.http_build_query(array_merge(
                request()->query(),[
                'page' => $products->currentPage() + 1,
                'paginate' => 'true'
             ])).'')
           ])
       @endif
@endisset

@isset($transactions)
       @foreach ($trx as $data)
            <div class="column w-full bg-light br-10 box-shadow g-10 p-10">
                <div class="row space-between g-10 w-full">
                    <img src="{{ asset('images/avatar.jpeg') }}" class="h-50 w-50 clip-circle border-2 border-color-primary circle" alt="">
                <div class="column g-5m-right-auto">
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
                                <span class="text-dimm-right-auto">Type</span>
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
                                <span class="text-dimm-right-auto">Bank sent from</span>
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
                                <span class="text-dimm-right-auto">Account Number</span>
                                <strong class="m-right-auto">{{ json_decode($data->json->details->bank ?? '{}')->account_number ?? 'null' }}</strong>
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
                'page' => ($trx->currentPage() + 1),
                'paginate' => true,
               
     ])),
     'infinite_loading' => true
        ])
    @endif

@endisset
@isset($users)
      @foreach ($users as $data)
            <div class="w-full p-10 br-10 box-shadow bg-light">
                <div class="row space-between g-10">
                    <img src="{{ asset('images/avatar.jpeg') }}" class="h-50 w-50 clip-circle border-2 border-color-primary circle" alt="">
                    <div class="column g-2 m-right-auto">
                        <strong class="c-primary font-1">{{ ucfirst($data->username) }}</strong>
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
                'page' => $users->currentPage() + 1,
                'paginate' => true,
               
     ])),
     'infinite_loading' => true
        ])
    @endif
@endisset
@isset($system_logs)

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
       
        @if ($logs->hasMorePages())
            @include('components.sections',[
                'infinite_loading' => true,
                'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                    'page' => $logs->currentPage() + 1,
                    'paginate' => true
                ]))
            ])
        @endif
@endisset

@isset($notifications)
     @foreach ($notifications as $data)
                <div class="w-full p-10 g-10 br-10 bg-light box-shadow">
                    <div class="row w-full space-between g-10">
                        <div class="h-50 w-50 bg-primary br-10 column justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary-text)" viewBox="0 0 256 256"><path d="M224,71.1a8,8,0,0,1-10.78-3.42,94.13,94.13,0,0,0-33.46-36.91,8,8,0,1,1,8.54-13.54,111.46,111.46,0,0,1,39.12,43.09A8,8,0,0,1,224,71.1ZM35.71,72a8,8,0,0,0,7.1-4.32A94.13,94.13,0,0,1,76.27,30.77a8,8,0,1,0-8.54-13.54A111.46,111.46,0,0,0,28.61,60.32,8,8,0,0,0,35.71,72Zm186.1,103.94A16,16,0,0,1,208,200H167.2a40,40,0,0,1-78.4,0H48a16,16,0,0,1-13.79-24.06C43.22,160.39,48,138.28,48,112a80,80,0,0,1,160,0C208,138.27,212.78,160.38,221.81,175.94ZM150.62,200H105.38a24,24,0,0,0,45.24,0Z"></path></svg>
                    </div>
                    <div class="column m-right-auto g-2">
                        <span>Notification ID : {{ $data->id }}</span>
                         <span class="text-average g-2 capitalize row align-center text-dim">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                        Logged {{ $data->frame }}
                    </span>
                    </div>
                    <div class="status {{ $data->status == 'read' ? 'green' : 'gold' }} ">{{ $data->status }}</div>
                    </div>
                    <hr>
                    <span>{{ $data->message }}</span>
                    @if ($data->status !== 'read')
                        <button onclick="window.location.href='{{ url('admins/get/mark/as/read?id='.$data->id.'') }}'" class="btn-green-3d m-left-auto">Mark As Read</button>
                    @endif
                </div>
            @endforeach
            @if ($notifications->hasMorePages())
                @include('components.sections',[
                    'infinite_loading' => true,
                    'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                        'page' => $notifications->currentPage() + 1,
                        'paginate' => true
                    ]))
                ])
            @endif
@endisset
@isset($purchased)
    @foreach ($purchased as $data)
                    <div class="column w-full g-10 p-10 bg-light box-shadow br-10">
                        <div class="row space-between w-full g-10">
                            <img src="{{ asset('products/'.$data->json->photo.'') }}" alt="" class="h-70 w-70 clip-10 br-10">
                            <div class="column m-right-auto g-2">
                                <strong class="desc">{{ $data->json->name }}</strong>
                                 <span class="text-average g-2 capitalize row align-center text-dim">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>
                       Purchased {{ $data->frame }}
                    </span>
                    <a href="{{ url('admins/user?id='.$data->user->id.'') }}" class="font-1 c-primary row align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                       {{ $data->user->username }}
                    </a>
                            </div>
                            <div class="status {{ $data->status == 'active' ? 'green' : ($data->status == 'expired' ? 'red' : 'gold
                            |') }}">{{ $data->status }}</div>
                        </div>
                        <hr>
                          <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M243.31,136,144,36.69A15.86,15.86,0,0,0,132.69,32H40a8,8,0,0,0-8,8v92.69A15.86,15.86,0,0,0,36.69,144L136,243.31a16,16,0,0,0,22.63,0l84.68-84.68a16,16,0,0,0,0-22.63Zm-96,96L48,132.69V48h84.69L232,147.31ZM96,84A12,12,0,1,1,84,72,12,12,0,0,1,96,84Z"></path></svg>
                         <strong>Purchase Price:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->json->price,2) }}</span>
                    </div>
                        <div class="row space-between">
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                        <strong>Cycle:</strong>
                        <span class="c-primary">{{ number_format($data->json->cycle) }} Days</span>
                    </div>
                     
                </div>
                <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

                        <strong>Daily Income:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->json->daily_income,2) }}</span>
                    </div>
                      <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>

                        <strong>Total Income:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->json->daily_income * $data->json->cycle,2) }}</span>
                    </div>
                     <div class="row g-5 align-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>

                        <strong>Next Income Time:</strong>
                        <span class="c-primary">{{ $data->next_income }}</span>
                    </div>
                    @if ($data->status == 'active')
                          <div class="row g-5 align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z"></path></svg>

                        <strong>Expires:</strong>
                        <span class="c-primary">{{ $data->expires }}</span>
                    </div>
                    @else
                        <div class="row g-5 align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z"></path></svg>

                        <strong>Expired:</strong>
                        <span class="c-primary">{{ $data->expires }}</span>
                    </div> 
                    @endif
                    @if ($data->status !== 'expired')
                        <button onclick="window.location.href='{{ url('admins/get/product/suspend?status='.$data->status.'&id='.$data->id.'') }}'" class="m-left-auto {{ $data->status == 'active' ? 'btn-red-3d' : 'btn-green-3d' }}">{{ $data->status == 'active' ? 'Suspend' : 'Resume' }}</button>
                    @endif
                    </div>
                @endforeach
                @if ($purchased->hasMorePages())
                    @include('components.sections',[
                        'infinite_loading' => true,
                        'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                            'page' => $purchased->currentPage() + 1,
                            'paginate' => 'true'
                        ]))
                    ])

                @endif
@endisset