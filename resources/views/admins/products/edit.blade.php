@extends('layout.admins.app')
@section('title')
    Edit Product
@endsection
@section('main')
    <section class="column p-10 w-full">
        <form action="{{ url('admins/post/edit/products/process') }}" onsubmit="PostRequest(event,this,MyFunc.Added)" method="POST" class="column g-10 p-10 bg-white box-shadow w-full br-10">
            <strong class="desc c-primary">Edit {{ $product->name }}</strong>
           <input type="hidden" value="{{ $product->id }}" name="id" class="input">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <label for="">Product Photo</label>
            <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="file" accept="image/*" name="photo" class="w-full bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Product Name</label>
            <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input value="{{ $product->name }}" type="text" name="name" placeholder="Product Name" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Product Price(&#8358;)</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input value="{{ $product->price }}" type="number" step="any" name="price" placeholder="Product Price" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Daily Income(&#8358;)</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input value="{{ $product->daily_income }}" type="number" step="any" name="daily_income" placeholder="Daily Income" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Product Cycle (days)</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input value="{{ $product->cycle }}" type="number" name="cycle" placeholder="Product Cycle" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <button class="post">Edit Product</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc={
            Added : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href=data.url;
                }

            }
        }
    </script>
@endsection