@extends('layout.admins.app')
@section('title')
    Manage Products
@endsection
@section('main')
    <section class="grid w-full p-10 g-10 pc-grid-2">
        @if ($products->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Products Available'
            ])
        @else
           <strong class="desc grid-full c-primary">All Products</strong>
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
         
        @endif
       @if ($products->hasMorePages())
           @include('components.sections',[
            'infinite_loading' => true,
            'url' => url('admins/products/manage?'.http_build_query(array_merge(['page' => $products->currentPage() + 1,'paginate' => 'true'],request()->query())).'')
           ])
       @endif
    </section>

@endsection


@section('js')
    <script class="js">
      InfiniteLoading();
        window.MyFunc = {
            PromptUser : function(url,name){
                let prompt=` <div class="column align-center text-center w-full g-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
        <span>Are you sure you want to delete <strong class="desc c-primary">${name}</strong>? this action cannot be undone.</span>
        <button onclick="GetRequest(event,'${url}',this,MyFunc.Deleted)" class="btn-red-3d w-full">Yes! I confirm to delete</button>
    </div>`;
    PopUp(prompt);
            },
            Deleted : function(response){
                let data=JSON.parse(response);
                CreateNotify(data.status,data.message);
                if(data.status == 'success'){
                    window.location.reload();
                }
            }
        }
    </script>
@endsection