@extends('layout.users.app')
@section('title')
    Recharge
@endsection
@section('css')
    <style class="css">
      .select-amt.active{
        background:var(--primary-transparent);
        /* color:var(--primary-text) !important; */
        animation: scale-in-out 0.5s linear forwards;
      }
      @keyframes scale-in-out {
        0%,100%{
          transform:scale(1)
        }
        50%{
          transform:scale(0.95);
        }
      }
    </style>
@endsection
@section('main')
    <section class="section1 column g-10 p-10">

   
    <div class="column m-x-auto g-5 align-center">
        <span class="desc c-primary" style="font-family:alfa slab">Recharge your Account</span>
      <span>Add Funds to your Account</span>
    </div>
        <div class="column max-w-500 m-x-auto w-full g-10 p-10 bg-light box-shadow br-5">
          <span>Select Recharge Amount</span>
           @if (!$auto->isEmpty())
                <div class="grid g-10 grid-3">
               @foreach ($auto as $data)
                   <div onclick="
                   document.querySelectorAll('.select-amt').forEach((amt)=>{
                   amt.classList.remove('active');
                   });
                   this.classList.add('active');

                   AutoFill('{{ $data->price }}',document.querySelector('input[name=amount]'))
                   " class="p-10 justify-center select-amt row max-w-full break-word bg-dim clip-5 br-5 bold c-white no-select pointer">&#8358;{{ number_format($data->price,2) }}</div>
             
               @endforeach
        </div>
           @endif
          <div class="w-full row align-center g-5">
            <hr class="gradient" style="background:linear-gradient(to left,var(--primary),transparent) !important">
             <span>OR</span>
             <hr class="gradient" style="background:linear-gradient(to right,var(--primary),transparent) !important">
           
          </div>
           <span>Manually enter amount</span>
          <div class="column w-full g-20">
            <input type="hidden" name="_token" class="input" value="{{ @csrf_token() }}">
            <div class="cont bg row space-between h-50 w-full br-5 border-color-silver border-1">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="h-full column c-primary no-select perfect-square justify-center text-center">&#8358;</div>
                <input oninput="
                if(this.value !== ''){
                 document.querySelectorAll('.select-amt').forEach((amt)=>{
                   amt.classList.remove('active');
                   });
                }
                " placeholder="Enter Recharge Amount" type="number" name="amount" class="inp bg-transparent required amount input w-full h-full no-border br-10">
            </div>
            <button onclick="
            // alert(10)
          try{
            if((document.querySelector('input[name=amount]').value).trim() == ''){
            CreateNotify('error','Please enter a valid amount');
            return;
            }
            if(document.querySelector('input[name=amount]').value < {{ $auto[0]->price }}){
            CreateNotify('error','Minimum deposit is &#8358;{{ number_format($auto[0]->price,2) }}');
            return;
            }
            spa(event,'{{ url('users/recharge/checkout?amount=')  }}' + document.querySelector('input[name=amount]').value)
          }catch(error){
          alert(error.stack)
          }
            " class="post bold clip-5 br-5">Deposit</button>
            <div class="w-fit p-10 m-x-auto no-select h-50 border-1 border-color-silver bg g-5 br-5 row justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM10.6935 15.8458L15.4137 13.059C16.1954 12.5974 16.1954 11.4026 15.4137 10.941L10.6935 8.15419C9.93371 7.70561 9 8.28947 9 9.21316V14.7868C9 15.7105 9.93371 16.2944 10.6935 15.8458Z" fill="CurrentColor"></path>
</svg>
  
              <span>Video on how to deposit</span>
            </div>
          </div>
        </div>
      
        <div class="w-full bg-light box-shadow p-10 g-10 column br-5 m-top-20">
            <strong class="desc c-primary">Recharge Instructions</strong>
            <span>- Minimum Deposit is &#8358;{{ number_format($auto[0]->price,2) }}</span>
             <span>- Recharge Portal is open 247.</span>
              <span>- For safety ,use only the official app or website to make a deposit.</span>
                <span>- Only send funds to the exact account provided.</span>
                  <span>- If you encounter any issues in deposit ,endeavour to contact our support team and we would resolve it.</span>

        </div>
    </section>
@endsection
@section('js')
    <script class="js">
      window.MyFunc = {
        Initiated : function(response){
          let data=JSON.parse(response);
          if(data.status == 'success'){
            window.location.href=data.url;
          }
        }
      }
    </script>
@endsection