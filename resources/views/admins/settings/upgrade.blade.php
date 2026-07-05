@extends('layout.admins.app')
@section('title')
    Upgrade Settings 
@endsection
@section('main')
       <section class="w-full column g-10">
        {{-- settings form --}}
        <form onsubmit="PostRequest(event,this)" action="{{ url('admins/post/upgrade/settings/process') }}" style="border:1px solid var(--rgt-01)" class="w-full bg-light br-primary column g-10 p-20">
           {{-- title --}}
            <div class="row c-primary align-center g-10">
                <span class="h-fit row">
                 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M17 14H12.6586C11.8349 16.3304 9.61244 18 7 18C3.68629 18 1 15.3137 1 12C1 8.68629 3.68629 6 7 6C9.61244 6 11.8349 7.66962 12.6586 10H23V14H21V18H17V14ZM7 14C8.10457 14 9 13.1046 9 12C9 10.8954 8.10457 10 7 10C5.89543 10 5 10.8954 5 12C5 13.1046 5.89543 14 7 14Z"></path></svg>
                   </span>
                <strong class="desc">API Token Settings</strong>
            </div>
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
          
            {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Token Fee</label>
                <small class="opacity-07">Cost of token(the fee required to pay before getting token)</small>
                </label>
                <div class="cont">
                    <input value="{{ $settings->upgrade->fee ?? '' }}" name="upgrade_fee" type="number" placeholder="E.g {{ $currency }}1,000" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Cashback</label>
                <small class="opacity-07">Bonus received immediately after successfull token purchase(set to Zero if none)</small>
                </label>
                <div class="cont">
                    <input value="{{ $settings->upgrade->cashback ?? '' }}" name="cashback" type="number" placeholder="E.g {{ $currency }}300" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="row align-center space-between g-5 w-full">
               <div class="column g-2">
                 <label>API Token status</label>
                <small class="opacity-05">If turned on,The user would be required to purchase API token before being able to place withdrawal</small>
                </div> 
                <div class="toggle {{ ($settings->upgrade->portal ?? 'off') == 'on' ? 'active' : '' }}">
                    <div onclick="MyFunc.ToggleBar(this,'upgrade_portal')" class="child"></div>
                </div>
                <input type="hidden" name="upgrade_portal" value="{{ $settings->upgrade->portal ?? 'off' }}" class="inp input">
            </div>
            
           
           
            
            <button class="post">Save Changes</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
              ToggleBar : function(element,input_name){
                if(element.closest('.toggle').classList.contains('active')){
                    element.closest('.toggle').classList.remove('active');
                    element.closest('form').querySelector(`input[name=${input_name}]`).value='off';
                }else{
                    element.closest('.toggle').classList.add('active');
                    element.closest('form').querySelector(`input[name=${input_name}]`).value='on';
                }
            },
        }
    </script>
@endsection