@isset($wallet)
      @foreach ($trx as $data)
           <div class="row space-between bg-light br-5 p-10 w-full g-10">
             @if ($data->class == 'debit')
              <div class="h-30 w-30 justify-center column br-1000 bg-red-transparent">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" viewBox="0 0 256 256"><path d="M205.66,117.66a8,8,0,0,1-11.32,0L136,59.31V216a8,8,0,0,1-16,0V59.31L61.66,117.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0l72,72A8,8,0,0,1,205.66,117.66Z"></path></svg>
              </div> 
            @else
              <div class="h-30 w-30 justify-center column br-1000 bg-green-transparent">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#4caf50" viewBox="0 0 256 256"><path d="M205.66,149.66l-72,72a8,8,0,0,1-11.32,0l-72-72a8,8,0,0,1,11.32-11.32L120,196.69V40a8,8,0,0,1,16,0V196.69l58.34-58.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                       </div>
                    @endif
                    <div class="column m-right-auto g-5">
                        <strong>{{ $data->description }}</strong>
                        <span class="text-dim text-small">{{ $data->frame }}</span>
                    </div>
                    <div class="column g-5">
                       @if ($data->class == 'debit')
                            <strong class="font-1">-&#8358;{{ number_format($data->amount,2) }}</strong>
                       @else
                            <strong style="color:#4caf50;" class="font-1">+&#8358;{{ number_format($data->amount,2) }}</strong>
                       @endif
                       <div class="status m-left-auto {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : 'red') }}">{{ $data->status }}</div>
                    </div>
        </div>
       
       @endforeach
       @if ($trx->hasMorePages())
           @include('components.sections',[
            'infinite_loading' => true,
            'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),['page' => $trx->currentPage() + 1,'paginate' => true]))
            ])
       @endif
@endisset
@isset($products)
     @foreach ($purchased as $data)

                <div class="w-full br-10 g-10 column p-10 box-shadow bg-light">
                    <div class="row space-between g-10 w-full">
                        <img class="h-70 perfect-square clip-10" src="{{ asset('products/'.$data->json->photo.'') }}" alt="">
                    <div class="column m-right-auto g-2">
                        <strong class="font-1">{{ $data->json->name }}</strong>
                     
                         <span class="text-dim row align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M230.14,58.87A8,8,0,0,0,224,56H62.68L56.6,22.57A8,8,0,0,0,48.73,16H24a8,8,0,0,0,0,16h18L67.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42A27.75,27.75,0,0,0,160,204a28,28,0,1,0,28-28H91.17a8,8,0,0,1-7.87-6.57L80.13,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,230.14,58.87ZM104,204a12,12,0,1,1-12-12A12,12,0,0,1,104,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,200,204Zm4-74.57A8,8,0,0,1,196.1,136H77.22L65.59,72H214.41Z"></path></svg>

                        Purchased For &#8358;{{ number_format($data->json->price,2) }}</span>
                          <span class="text-dim row align-center text-average">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                        Purchased {{ $data->frame }}</span>
                    </div>
                    <div class="status {{ $data->status == 'active' ? 'green' : 'gold' }}">{{ $data->status }}</div>
                     </div>
                       <hr class="gradient" style="background:linear-gradient(to right,transparent,var(--primary),transparent) !important">
             
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
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,237.66,69.66ZM184,128a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V80a8,8,0,0,1,16,0v48Z"></path></svg>

                        <strong>Next Income Time:</strong>
                        <span class="c-primary">{{ $data->next_income }}</span>
                    </div>
                    <div class="row g-5 align-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M200,75.64V40a16,16,0,0,0-16-16H72A16,16,0,0,0,56,40V76a16.07,16.07,0,0,0,6.4,12.8L114.67,128,62.4,167.2A16.07,16.07,0,0,0,56,180v36a16,16,0,0,0,16,16H184a16,16,0,0,0,16-16V180.36a16.08,16.08,0,0,0-6.35-12.76L141.27,128l52.38-39.6A16.05,16.05,0,0,0,200,75.64ZM178.23,176H77.33L128,138ZM72,216V192H184v24ZM184,75.64,128,118,72,76V40H184Z"></path></svg>

                        <strong>Expires:</strong>
                        <span class="c-primary">{{ $data->expires }}</span>
                    </div>
                </div>
            @endforeach
            @if ($purchased->hasMorePages())
                @include('components.sections',[
                    'infinite_loading' => true,
                    'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                        'page' => $purchased->currentPage() + 1,
                        'paginate' => true
                    ]))
                ])
            @endif
@endisset
@isset($team)
    @foreach ($ref as $data)
                <div class="w-full bg-light column p-10 g-10 box-shadow br-10">
                 <div class="row w-full g-10">
                       <img src="{{ asset('images/avatar.jpeg') }}" alt="" class="h-50 w-50 clip-circle circle">
                <div class="column m-right-auto g-2">
                    <strong class="desc c-primary">{{ ucfirst($data->username) }}</strong>
                    <span class="text-small row align-center g-2  text-dim">
                         <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                        Registered {{ $data->frame }}
                    </span>

                </div>

                <div class="status {{ $data->status == 'active' ? 'green' : 'gold' }}">{{ $data->status }}</div>
                 </div>
                   <hr class="gradient" style="background:linear-gradient(to right,transparent,var(--primary),transparent) !important">
             
                  <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>


                        <strong>Total Purchase Amount:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->total_purchase,2) }}</span>
                    </div>
                     <div class="row g-5 align-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M184,89.57V84c0-25.08-37.83-44-88-44S8,58.92,8,84v40c0,20.89,26.25,37.49,64,42.46V172c0,25.08,37.83,44,88,44s88-18.92,88-44V132C248,111.3,222.58,94.68,184,89.57ZM232,132c0,13.22-30.79,28-72,28-3.73,0-7.43-.13-11.08-.37C170.49,151.77,184,139,184,124V105.74C213.87,110.19,232,122.27,232,132ZM72,150.25V126.46A183.74,183.74,0,0,0,96,128a183.74,183.74,0,0,0,24-1.54v23.79A163,163,0,0,1,96,152,163,163,0,0,1,72,150.25Zm96-40.32V124c0,8.39-12.41,17.4-32,22.87V123.5C148.91,120.37,159.84,115.71,168,109.93ZM96,56c41.21,0,72,14.78,72,28s-30.79,28-72,28S24,97.22,24,84,54.79,56,96,56ZM24,124V109.93c8.16,5.78,19.09,10.44,32,13.57v23.37C36.41,141.4,24,132.39,24,124Zm64,48v-4.17c2.63.1,5.29.17,8,.17,3.88,0,7.67-.13,11.39-.35A121.92,121.92,0,0,0,120,171.41v23.46C100.41,189.4,88,180.39,88,172Zm48,26.25V174.4a179.48,179.48,0,0,0,24,1.6,183.74,183.74,0,0,0,24-1.54v23.79a165.45,165.45,0,0,1-48,0Zm64-3.38V171.5c12.91-3.13,23.84-7.79,32-13.57V172C232,180.39,219.59,189.4,200,194.87Z"></path></svg>

                        <strong>Total Commission:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->total_commission,2) }}</span>
                    </div>
                     <div class="row g-5 align-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M240,56v64a8,8,0,0,1-16,0V75.31l-82.34,82.35a8,8,0,0,1-11.32,0L96,123.31,29.66,189.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0L136,140.69,212.69,64H168a8,8,0,0,1,0-16h64A8,8,0,0,1,240,56Z"></path></svg>

                        <strong>Referral Level:</strong>
                        <span class="c-primary">{{ $data->referral_level }}</span>
                    </div>
                </div>
            @endforeach
            @if ($ref->hasMorePages())
                @include('components.sections',[
                    'infinite_loading' => true,
                    'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                        'page' => $ref->currentPage() + 1,
                        'paginate' => true
                    ]))
                ])
            @endif
@endisset