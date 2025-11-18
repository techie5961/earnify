@extends('layout.admins.app')
@section('title')
    Site Settings
@endsection
@section('main')
    <section class="column p-10 w-full g-10">
          <div class="column bg-light box-shadow w-full br-10 p-10 g-10">
            <div class="border-bottom-thin p-10 w-full row align-center g-5">
           <span class="c-primary">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.4105 9.86058C20.3559 9.8571 20.2964 9.85712 20.2348 9.85715L20.2194 9.85715H17.8015C15.8086 9.85715 14.1033 11.4382 14.1033 13.5C14.1033 15.5618 15.8086 17.1429 17.8015 17.1429H20.2194L20.2348 17.1429C20.2964 17.1429 20.3559 17.1429 20.4105 17.1394C21.22 17.0879 21.9359 16.4495 21.9961 15.5577C22.0001 15.4992 22 15.4362 22 15.3778L22 15.3619V11.6381L22 11.6222C22 11.5638 22.0001 11.5008 21.9961 11.4423C21.9359 10.5506 21.22 9.91209 20.4105 9.86058ZM17.5872 14.4714C18.1002 14.4714 18.5162 14.0365 18.5162 13.5C18.5162 12.9635 18.1002 12.5286 17.5872 12.5286C17.0741 12.5286 16.6581 12.9635 16.6581 13.5C16.6581 14.0365 17.0741 14.4714 17.5872 14.4714Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.2341 18.6C20.3778 18.5963 20.4866 18.7304 20.4476 18.8699C20.2541 19.562 19.947 20.1518 19.4542 20.6485C18.7329 21.3755 17.8183 21.6981 16.6882 21.8512C15.5902 22 14.1872 22 12.4158 22H10.3794C8.60803 22 7.20501 22 6.10697 21.8512C4.97692 21.6981 4.06227 21.3755 3.34096 20.6485C2.61964 19.9215 2.29953 18.9997 2.1476 17.8608C1.99997 16.7541 1.99999 15.3401 2 13.5548V13.4452C1.99998 11.6599 1.99997 10.2459 2.1476 9.13924C2.29953 8.00031 2.61964 7.07848 3.34096 6.35149C4.06227 5.62451 4.97692 5.30188 6.10697 5.14876C7.205 4.99997 8.60802 4.99999 10.3794 5L12.4158 5C14.1872 4.99998 15.5902 4.99997 16.6882 5.14876C17.8183 5.30188 18.7329 5.62451 19.4542 6.35149C19.947 6.84817 20.2541 7.43804 20.4476 8.13012C20.4866 8.26959 20.3778 8.40376 20.2341 8.4L17.8015 8.40001C15.0673 8.40001 12.6575 10.5769 12.6575 13.5C12.6575 16.4231 15.0673 18.6 17.8015 18.6L20.2341 18.6ZM5.61446 8.88572C5.21522 8.88572 4.89157 9.21191 4.89157 9.61429C4.89157 10.0167 5.21522 10.3429 5.61446 10.3429H9.46988C9.86912 10.3429 10.1928 10.0167 10.1928 9.61429C10.1928 9.21191 9.86912 8.88572 9.46988 8.88572H5.61446Z" fill="CurrentColor"></path>
<path d="M7.77668 4.02439L9.73549 2.58126C10.7874 1.80625 12.2126 1.80625 13.2645 2.58126L15.2336 4.03197C14.4103 3.99995 13.4909 3.99998 12.4829 4H10.3123C9.39123 3.99998 8.5441 3.99996 7.77668 4.02439Z" fill="CurrentColor"></path>
</svg>
    
        </span> 
            <span>Deposit Bank Settings</span>
            </div>
            <form action="{{ url('admins/post/deposit/settings/process') }}" onsubmit="PostRequest(event,this)"  method="POST" class="w-full column g-10">
              <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label for="">Account Number</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $deposit_settings->account_number ?? '' }}" type="number" name="account_number" placeholder="E.g 5005016577" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Bank Name</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $deposit_settings->bank_name ?? '' }}" type="text" name="bank_name" placeholder="E.g {{ config('app.name') }} Bank" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                 <label for="">Bank Name</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $deposit_settings->account_name ?? '' }}" type="text" name="account_name" placeholder="E.g John Doe" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                
               
                <button class="post">
                    Update Deposit Settings
                </button>
            </form>
        </div>
         <div class="column bg-light box-shadow w-full br-10 p-10 g-10">
            <div class="border-bottom-thin p-10 w-full row align-center g-5">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path></svg>
                <span>General Settings</span>
            </div>
            <form action="{{ url('admins/post/general/settings/process') }}" onsubmit="PostRequest(event,this)"  method="POST" class="w-full column g-10">
              <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label for="">Whatsapp Group Link</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $general_settings->whatsapp_group }}" type="url" name="whatsapp_group" placeholder="E.g https://wa.me/your-group-link" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Telegram Group Link</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $general_settings->telegram_group }}" type="url" name="telegram_group" placeholder="E.g https:://t.me/your-group-link" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label class="display-none" for="">Site Notification</label>
                <div class="cont display-none h-200  w-full border-1 h-50 border-color-silver bg-dim br-10">
                   <textarea class="h-full br-10 inp input required no-border bg-transparent p-10 font-primary w-full" name="notification_message">{{ $general_settings->notification_message }}</textarea>  
                 </div>
               
                <button class="post">
                    Update General Settings
                </button>
            </form>
        </div>
        <div class="column bg-light box-shadow w-full br-10 p-10 g-10">
            <div class="border-bottom-thin p-10 w-full row align-center g-5">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M216,64H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,56V184a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V80A16,16,0,0,0,216,64Zm0,128H56a8,8,0,0,1-8-8V78.63A23.84,23.84,0,0,0,56,80H216Zm-48-60a12,12,0,1,1,12,12A12,12,0,0,1,168,132Z"></path></svg>
                <span>Finance Settings</span>
            </div>
            <form action="{{ url('admins/post/finance/settings/process') }}" onsubmit="PostRequest(event,this)"  method="POST" class="w-full column g-10">
              <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label for="">Daily Check-In Bonus(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $finance_settings->daily_check_in ?? 0 }}" type="number" step="any" name="daily_check_in" placeholder="E.g 500" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                 <label for="">Welcome Bonus(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $finance_settings->welcome_bonus ?? 0 }}" type="number" step="any" name="welcome_bonus" placeholder="E.g 100" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
              <label for="">Minimum Withdrawal(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $finance_settings->min_withdrawal }}" type="number" step="any" name="min_withdrawal" placeholder="E.g 1000" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Maximum Withdrawal(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $finance_settings->max_withdrawal }}" type="number" step="any" name="max_withdrawal" placeholder="E.g 1000000" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Withdrawal Fee (%)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $finance_settings->withdrawal_fee }}" type="number" step="any" name="withdrawal_fee" placeholder="E.g 5" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Withdrawal Portal</label>
                <hr>
                <input type="hidden" name="withdrawal_status" value="{{ $finance_settings->withdrawal_status }}" class="input">
                <div class="row space-between w-full g-10 align-center">
                    <span>Toggle on or Toggle off withdrawal portal</span>
                    <div class="toggle {{ $finance_settings->withdrawal_status == 'open' ? 'active' : '' }}">
                        <div onclick="MyFunc.Toggle(this)"  class="child"></div>
                    </div>
                </div>
                <button class="post">
                    Update Finance Settings
                </button>
            </form>
        </div>
         <div class="column bg-light box-shadow w-full br-10 p-10 g-10">
            <div class="border-bottom-thin p-10 w-full row align-center g-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M237.66,106.35l-80-80A8,8,0,0,0,144,32V72.35c-25.94,2.22-54.59,14.92-78.16,34.91-28.38,24.08-46.05,55.11-49.76,87.37a12,12,0,0,0,20.68,9.58h0c11-11.71,50.14-48.74,107.24-52V192a8,8,0,0,0,13.66,5.65l80-80A8,8,0,0,0,237.66,106.35ZM160,172.69V144a8,8,0,0,0-8-8c-28.08,0-55.43,7.33-81.29,21.8a196.17,196.17,0,0,0-36.57,26.52c5.8-23.84,20.42-46.51,42.05-64.86C99.41,99.77,127.75,88,152,88a8,8,0,0,0,8-8V51.32L220.69,112Z"></path></svg>
                <span>Referral Settings</span>
            </div>
            <form action="{{ url('admins/post/referral/settings/process') }}" onsubmit="PostRequest(event,this)"  method="POST" class="w-full column g-10">
              <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label for="">First Level Commission(%)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $referral_settings->first_level ?? '' }}" type="number" step="any" name="first_level" placeholder="E.g 15" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Second Level Commission(%)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $referral_settings->second_level ?? '' }}" type="number" step="any" name="second_level" placeholder="E.g 10" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Third Level Commission (%)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg-dim br-10">
                    <input value="{{ $referral_settings->third_level ?? '' }}" type="number" step="any" name="third_level" placeholder="E.g 5" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
               
                <button class="post">
                    Update Referral Settings
                </button>
            </form>
        </div>
        

    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Toggle : function(element){
                let parent=element.closest('.toggle');
                if(parent.classList.contains('active')){
                    parent.classList.remove('active');
                    document.querySelector('input[name=withdrawal_status]').value='closed';
                }else{
                      parent.classList.add('active');
                    document.querySelector('input[name=withdrawal_status]').value='open';
                }
            }
        }
    </script>
@endsection