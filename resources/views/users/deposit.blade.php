@extends('layout.users.app')
@section('title')
    Recharge
@endsection
@section('css')
    <style class="css">
      .select-amt.active{
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
    
          <div class="column max-w-500 m-x-auto w-full g-10 p-10 bg-light box-shadow br-5">
            <strong class="desc">Deposit Details</strong>
            
        <div class="row w-full g-5 align-center">
           <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 7.28595 22 4.92893 20.5355 3.46447C19.0711 2 16.714 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.08405 8.37604C4.4287 8.14628 4.89435 8.23941 5.12412 8.58405L6.50008 10.648L7.87604 8.58405C8.10581 8.23941 8.57146 8.14628 8.9161 8.37604C9.12965 8.51841 9.24663 8.75133 9.25008 8.98992C9.25353 8.75133 9.37051 8.51841 9.58405 8.37604C9.9287 8.14628 10.3944 8.23941 10.6241 8.58405L12.0001 10.648L13.376 8.58405C13.6058 8.23941 14.0715 8.14628 14.4161 8.37604C14.6297 8.51841 14.7466 8.75135 14.7501 8.98995C14.7535 8.75135 14.8705 8.51841 15.0841 8.37604C15.4287 8.14628 15.8944 8.23941 16.1241 8.58405L17.5001 10.648L18.876 8.58405C19.1058 8.23941 19.5715 8.14628 19.9161 8.37604C20.2608 8.60581 20.3539 9.07146 20.1241 9.4161L18.4015 12.0001L20.1241 14.5841C20.3539 14.9287 20.2608 15.3944 19.9161 15.6241C19.5715 15.8539 19.1058 15.7608 18.876 15.4161L17.5001 13.3522L16.1241 15.4161C15.8944 15.7608 15.4287 15.8539 15.0841 15.6241C14.8705 15.4817 14.7535 15.2488 14.7501 15.0102C14.7466 15.2488 14.6297 15.4817 14.4161 15.6241C14.0715 15.8539 13.6058 15.7608 13.376 15.4161L12.0001 13.3522L10.6241 15.4161C10.3944 15.7608 9.9287 15.8539 9.58405 15.6241C9.37051 15.4818 9.25353 15.2488 9.25008 15.0102C9.24663 15.2488 9.12965 15.4818 8.9161 15.6241C8.57146 15.8539 8.10581 15.7608 7.87604 15.4161L6.50008 13.3522L5.12412 15.4161C4.89435 15.7608 4.4287 15.8539 4.08405 15.6241C3.73941 15.3944 3.64628 14.9287 3.87604 14.5841L5.59869 12.0001L3.87604 9.4161C3.64628 9.07146 3.73941 8.60581 4.08405 8.37604ZM14.6241 9.4161L12.9015 12.0001L14.6241 14.5841C14.7072 14.7087 14.7481 14.8492 14.7501 14.9886C14.7521 14.8492 14.7929 14.7087 14.876 14.5841L16.5987 12.0001L14.876 9.4161C14.7929 9.29146 14.7521 9.15099 14.7501 9.01158C14.7481 9.15099 14.7072 9.29146 14.6241 9.4161ZM7.40147 12.0001L9.12412 9.4161C9.2072 9.29147 9.24807 9.15102 9.25008 9.01162C9.25209 9.15102 9.29295 9.29147 9.37604 9.4161L11.0987 12.0001L9.37604 14.5841C9.29295 14.7087 9.25209 14.8491 9.25008 14.9885C9.24807 14.8491 9.2072 14.7087 9.12412 14.5841L7.40147 12.0001Z" fill="CurrentColor"></path>
</svg>
          <div class="column g-2">
           

            <span class="text-dim text-average">Account Number</span>
           <div class="row g-2">
             <strong class="font-1">{{ $deposit_settings->account_number }}</strong>
            <span onclick="copy('{{ $deposit_settings->account_number }}')">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M20.0616 12.6473L20.5793 10.7154C21.1835 8.46034 21.4856 7.3328 21.2581 6.35703C21.0785 5.58657 20.6744 4.88668 20.097 4.34587C19.3657 3.66095 18.2381 3.35883 15.9831 2.75458C13.728 2.15033 12.6004 1.84821 11.6247 2.07573C10.8542 2.25537 10.1543 2.65945 9.61351 3.23687C9.02709 3.86298 8.72128 4.77957 8.26621 6.44561C8.18979 6.7254 8.10915 7.02633 8.02227 7.35057L8.02222 7.35077L7.50458 9.28263C6.90033 11.5377 6.59821 12.6652 6.82573 13.641C7.00537 14.4115 7.40945 15.1114 7.98687 15.6522C8.71815 16.3371 9.84569 16.6392 12.1008 17.2435L12.1008 17.2435C14.1334 17.7881 15.2499 18.0873 16.165 17.9744C16.2652 17.9621 16.3629 17.9448 16.4592 17.9223C17.2296 17.7427 17.9295 17.3386 18.4703 16.7612C19.1552 16.0299 19.4574 14.9024 20.0616 12.6473Z" fill="CurrentColor"></path>
<path d="M2.50458 14.715L3.02222 16.6469C3.62647 18.902 3.92859 20.0295 4.61351 20.7608C5.15432 21.3382 5.85421 21.7423 6.62466 21.9219C7.60044 22.1494 8.72798 21.8473 10.9831 21.2431C13.2381 20.6388 14.3657 20.3367 15.097 19.6518C15.1577 19.5949 15.2164 19.5363 15.2733 19.4761C14.9391 19.448 14.602 19.3942 14.2594 19.3261C13.5633 19.1877 12.7362 18.9661 11.758 18.704L11.6512 18.6753L11.6264 18.6687C10.5621 18.3835 9.67281 18.1448 8.96277 17.8883C8.21607 17.6185 7.5376 17.286 6.96148 16.7464C6.16753 16.0028 5.61193 15.0404 5.36491 13.9811C5.18567 13.2123 5.23691 12.4585 5.37666 11.6769C5.51058 10.928 5.75109 10.0305 6.03926 8.95515L6.03926 8.95514L6.57365 6.96077L6.59245 6.89062C4.6719 7.40799 3.66101 7.71408 2.98687 8.34548C2.40945 8.88629 2.00537 9.58617 1.82573 10.3566C1.59821 11.3324 1.90033 12.4599 2.50458 14.715Z" fill="CurrentColor"></path>
</svg>
</span>

           </div>
          </div>
        </div>
         <hr class="gradient" style="background:linear-gradient(to right,transparent,var(--primary),transparent) !important">
         <div class="row w-full g-5 align-center">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<g opacity="0.3">
<path d="M4.66602 9C3.73413 9 3.26819 9 2.90065 8.84776C2.41059 8.64477 2.02124 8.25542 1.81826 7.76537C1.66602 7.39782 1.66602 6.93188 1.66602 6C1.66602 5.06812 1.66602 4.60217 1.81826 4.23463C2.02124 3.74458 2.41059 3.35523 2.90065 3.15224C3.26819 3 3.73413 3 4.66602 3H11.934C11.8905 3.07519 11.8518 3.15353 11.8183 3.23463C11.666 3.60217 11.666 4.06812 11.666 5L11.666 9H4.66602Z" fill="CurrentColor"></path>
<path d="M21.666 6C21.666 6.93188 21.666 7.39782 21.5138 7.76537C21.3108 8.25542 20.9214 8.64477 20.4314 8.84776C20.0638 9 19.5979 9 18.666 9H17.666V5C17.666 4.06812 17.666 3.60217 17.5138 3.23463C17.4802 3.15353 17.4415 3.07519 17.3981 3H18.666C19.5979 3 20.0638 3 20.4314 3.15224C20.9214 3.35523 21.3108 3.74458 21.5138 4.23463C21.666 4.60217 21.666 5.06812 21.666 6Z" fill="CurrentColor"></path>
</g>
<g opacity="0.7">
<path d="M17.5138 20.7654C17.666 20.3978 17.666 19.9319 17.666 19V15H18.666C19.5979 15 20.0638 15 20.4314 15.1522C20.9214 15.3552 21.3108 15.7446 21.5138 16.2346C21.666 16.6022 21.666 17.0681 21.666 18C21.666 18.9319 21.666 19.3978 21.5138 19.7654C21.3108 20.2554 20.9214 20.6448 20.4314 20.8478C20.0638 21 19.5979 21 18.666 21H17.3981C17.4415 20.9248 17.4802 20.8465 17.5138 20.7654Z" fill="CurrentColor"></path>
<path d="M11.934 21H4.66602C3.73413 21 3.26819 21 2.90065 20.8478C2.41059 20.6448 2.02124 20.2554 1.81826 19.7654C1.66602 19.3978 1.66602 18.9319 1.66602 18C1.66602 17.0681 1.66602 16.6022 1.81826 16.2346C2.02124 15.7446 2.41059 15.3552 2.90065 15.1522C3.26819 15 3.73413 15 4.66602 15H11.666V19C11.666 19.9319 11.666 20.3978 11.8183 20.7654C11.8518 20.8465 11.8905 20.9248 11.934 21Z" fill="CurrentColor"></path>
</g>
<g opacity="0.5">
<path d="M17.666 9H18.666C19.5979 9 20.0638 9 20.4314 9.15224C20.9214 9.35523 21.3108 9.74458 21.5138 10.2346C21.666 10.6022 21.666 11.0681 21.666 12C21.666 12.9319 21.666 13.3978 21.5138 13.7654C21.3108 14.2554 20.9214 14.6448 20.4314 14.8478C20.0638 15 19.5979 15 18.666 15H17.666V9Z" fill="CurrentColor"></path>
<path d="M11.666 9V15H4.66602C3.73413 15 3.26819 15 2.90065 14.8478C2.41059 14.6448 2.02124 14.2554 1.81826 13.7654C1.66602 13.3978 1.66602 12.9319 1.66602 12C1.66602 11.0681 1.66602 10.6022 1.81826 10.2346C2.02124 9.74458 2.41059 9.35523 2.90065 9.15224C3.26819 9 3.73413 9 4.66602 9H11.666Z" fill="CurrentColor"></path>
</g>
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.5138 3.23463C17.666 3.60218 17.666 4.06812 17.666 5L17.666 19C17.666 19.9319 17.666 20.3978 17.5138 20.7654C17.4802 20.8465 17.4415 20.9248 17.3981 21C17.1792 21.3792 16.8403 21.6784 16.4314 21.8478C16.0638 22 15.5979 22 14.666 22C13.7341 22 13.2682 22 12.9006 21.8478C12.4917 21.6784 12.1529 21.3792 11.934 21C11.8905 20.9248 11.8518 20.8465 11.8183 20.7654C11.666 20.3978 11.666 19.9319 11.666 19V5C11.666 4.06812 11.666 3.60218 11.8183 3.23463C11.8518 3.15353 11.8905 3.07519 11.934 3C12.1529 2.62082 12.4917 2.32164 12.9006 2.15224C13.2682 2 13.7341 2 14.666 2C15.5979 2 16.0638 2 16.4314 2.15224C16.8403 2.32164 17.1792 2.62082 17.3981 3C17.4415 3.07519 17.4802 3.15353 17.5138 3.23463ZM15.416 11C15.416 10.5858 15.0802 10.25 14.666 10.25C14.2518 10.25 13.916 10.5858 13.916 11L13.916 13C13.916 13.4142 14.2518 13.75 14.666 13.75C15.0802 13.75 15.416 13.4142 15.416 13L15.416 11Z" fill="CurrentColor"></path>
</svg>

          <div class="column g-2">
           

            <span class="text-dim text-average">Bank Name</span>
            <strong class="font-1">{{ $deposit_settings->bank_name }}</strong>

          </div>
        </div>
        <hr class="gradient" style="background:linear-gradient(to right,transparent,var(--primary),transparent) !important">
          <div class="row w-full g-5 align-center">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.90469 15.8918C4.149 13.8151 5.90904 12.25 8.00007 12.25H16.0001C18.0911 12.25 19.8511 13.8151 20.0955 15.8918L20.7449 21.4124C20.7933 21.8237 20.4991 22.1965 20.0877 22.2449C19.6763 22.2933 19.3036 21.999 19.2552 21.5876L18.6057 16.0671C18.4503 14.7458 17.3305 13.75 16.0001 13.75H8.00007C6.66967 13.75 5.54986 14.7458 5.39441 16.0671L4.74494 21.5876C4.69654 21.999 4.32382 22.2933 3.91244 22.2449C3.50106 22.1965 3.20681 21.8237 3.25521 21.4124L3.90469 15.8918Z" fill="CurrentColor"></path>
<circle cx="12" cy="6" r="4" fill="CurrentColor"></circle>
<path opacity="0.5" d="M8 13.75V18C8 19.8856 8 20.8284 8.58579 21.4142C9.17157 22 10.1144 22 12 22C13.8856 22 14.8284 22 15.4142 21.4142C16 20.8284 16 19.8856 16 18V13.75H8Z" fill="CurrentColor"></path>
</svg>


          <div class="column g-2">
           

            <span class="text-dim text-average">Account Name</span>
            <strong class="font-1">{{ $deposit_settings->account_name }}</strong>

          </div>
        </div>
        <hr class="gradient" style="background:linear-gradient(to right,transparent,var(--primary),transparent) !important">
         <div class="row w-full g-5 align-center">
         <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M3.77772 18.3259C4.78661 19 6.19108 19 9 19L15 19C17.8089 19 19.2134 19 20.2223 18.3259C20.659 18.034 21.034 17.659 21.3259 17.2223C22 16.2134 22 14.8089 22 12C22 9.19107 22 7.78661 21.3259 6.77772C21.034 6.34096 20.659 5.96595 20.2223 5.67412C19.2134 5 17.8089 5 15 5H9C6.19108 5 4.78661 5 3.77772 5.67412C3.34096 5.96596 2.96596 6.34096 2.67412 6.77772C2 7.78661 2 9.19108 2 12C2 14.8089 2 16.2134 2.67412 17.2223C2.96596 17.659 3.34096 18.034 3.77772 18.3259Z" fill="CurrentColor"></path>
<path d="M5.5 15.75C5.08579 15.75 4.75 15.4142 4.75 15L4.75 9C4.75 8.58579 5.08579 8.25 5.5 8.25C5.91421 8.25 6.25 8.58579 6.25 9L6.25 15C6.25 15.4142 5.91421 15.75 5.5 15.75Z" fill="CurrentColor"></path>
<path d="M17.75 15C17.75 15.4142 18.0858 15.75 18.5 15.75C18.9142 15.75 19.25 15.4142 19.25 15V9C19.25 8.58579 18.9142 8.25 18.5 8.25C18.0858 8.25 17.75 8.58579 17.75 9V15Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 12C8.25 14.0711 9.92893 15.75 12 15.75C14.0711 15.75 15.75 14.0711 15.75 12C15.75 9.92893 14.0711 8.25 12 8.25C9.92893 8.25 8.25 9.92893 8.25 12ZM9.75 12C9.75 13.2426 10.7574 14.25 12 14.25C13.2426 14.25 14.25 13.2426 14.25 12C14.25 10.7574 13.2426 9.75 12 9.75C10.7574 9.75 9.75 10.7574 9.75 12Z" fill="CurrentColor"></path>
</svg>

          <div class="column g-2">
           

            <span class="text-dim text-average">Deposit Amount</span>
            <strong class="font-1">&#8358;{{ number_format($amount,2) }}</strong>

          </div>
        </div>
       <div class="w-full bg p-10 br-5 column g-5">
        <strong class="font-1">Add money via bank transfer easily & faster</strong>
         <div><span class="c-green font-weight-900 bold">1.</span> Endeavour to fill the form below after a successful transfer to the account details above</div>
       
        <div><span class="c-green font-weight-900 bold">2.</span> Deposits are confirmed within 5 minutes</div>
        <div><span class="c-green font-weight-900 bold">3.</span>Contact our support team if you have issues with your deposit.</div>
        
        <span class="c-red text-average bold">Note: please only use this account for platform deposits only.</span>
      </div>
      <div class="column g-2"> <strong class="desc">Deposit Form</strong>
        <span class="c-red text-average bold">Note: Only fill this form after making transfer.</span>
    </div>
      <form action="{{ url('users/post/deposit/submit/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Initiated)" class="w-full column g-2">
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="input">
       <div class="column display-none g-5 w-full">
         <label for="" class="m-top-10">Amount Sent</label>
        <div class="cont w-full br-5 border-1 border-color-silver h-50 row align-center bg">
          <input type="number" value="{{ $amount }}" name="amount" placeholder="Enter amount transfered" class="input inp required border-none inp w-full h-full bg-transparent br-10">
        </div>
       </div>
         <label for="" class="m-top-10">Name on Account sent from</label>
        <div class="cont w-full br-5 border-1 border-color-silver h-50 row align-center bg">
          <input type="text" name="account_name" placeholder="Enter name on the account used in making transfer" class="input inp required border-none inp w-full h-full bg-transparent br-10">
        </div>
         <label for="" class="m-top-10">Bank sent from</label>
        <div class="cont w-full br-5 border-1 border-color-silver h-50 row align-center bg">
          <input type="text" name="bank_name" placeholder="Enter name of bank used in making transfer" class="input inp required border-none inp w-full h-full bg-transparent br-10">
        </div>
        <button class="post bold clip-5 br-5">I have sent the money</button>
      </form>
      </div>
     
   

        <div class="column display-none max-w-500 m-x-auto w-full g-10 p-10 bg-light box-shadow br-5">
           @if (!$auto->isEmpty())
                <div class="grid g-10 grid-3">
               @foreach ($auto as $data)
                   <div onclick="
                   document.querySelectorAll('.select-amt').forEach((amt)=>{
                   amt.classList.remove('active');
                   });
                   this.classList.add('active');

                   AutoFill('{{ $data->price }}',document.querySelector('input[name=amount]'))
                   " class="p-10 justify-center select-amt row max-w-full break-word bg-green clip-5 br-5 bold c-white no-select pointer">&#8358;{{ number_format($data->price,2) }}</div>
             
               @endforeach
        </div>
           @endif
          <form action="{{ url('users/post/deposit/initiate') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Initiated)" class="column w-full g-20">
            <input type="hidden" name="_token" class="input" value="{{ @csrf_token() }}">
            <div class="cont row space-between h-50 w-full br-5 border-color-silver border-1">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="h-full column c-primary no-select perfect-square justify-center text-center">&#8358;</div>
                <input placeholder="Enter Recharge Amount" type="number" name="amount" class="inp required amount input w-full h-full no-border br-10">
            </div>
            <button class="post clip-5 br-5">Deposit</button>
          </form>
        </div>
      
        <div class="w-full display-none bg-light box-shadow p-10 g-10 column br-5 m-top-20">
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