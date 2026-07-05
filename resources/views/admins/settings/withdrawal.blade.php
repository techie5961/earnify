@extends('layout.admins.app')
@section('title')
    Withdrawal Portal
@endsection
@section('main')
    <section class="w-full column g-10">
        <form method="POST" action="{{ url('admins/post/withrawal/portal/process') }}" onsubmit="PostRequest(event,this)" class="w-full column p-20px g-10px bg-light br-10px">
          {{-- csrf token --}}
          <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            <div class="w-full row g-10px align-center p-bottom-10px border-bottom-width-1px border-bottom-style-dashed border-bottom-color-rgt-01">
                <i class="c-primary">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V9.99979H22.0049ZM22.0049 7.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V7.99979ZM15.0049 15.9998V17.9998H19.0049V15.9998H15.0049Z"></path></svg>
                </i>   
                <strong class="font-weight-800 font-size-1-2 c-primary no-select">Withdrawal Portal</strong>
            </div>
           @foreach (collect(json_decode(file_get_contents(database_path('data/wallets.json'))))->where('class','!==','deposit')->all() as $data)
               <strong class="font-weight-800 m-top-7px font-size-1">{{ $data->name }}</strong>
           <div class="w-full wallet-group column g-10px bg-primary-007 br-5px border-width-1px border-style-solid border-color-primary-01 p-10px">
                {{-- new row --}}
                <div class="row align-center w-full g-10">
                    {{-- new column --}}
                    <div class="column g-2px">
                        <strong class="font-weight-700">Withdrawal Portal</strong>
                        <small class="opacity-07">Toggle on/Toggle off withdrawal portal for {{ $data->name }}.</small>
                    </div>
                    {{-- toggle --}}
                    <div class="toggle-label  {{ ($settings->{$data->key}->portal ?? 'off') == 'on' ? 'active' : '' }} tg">
                        <div onclick="ToggleWallet(this)" class="child"></div>
                    </div>
                </div>
                
                {{-- portal --}}
                <input type="hidden" value="{{ $settings->{$data->key}->portal ?? 'off' }}" name="wallet[{{ $data->key }}][portal]" class="inp input" withdrawal-portal>
                {{-- new column --}}
                <div class="column g-3px w-full">
                    <label>Minimum Withdrawal</label>
                    <div style="background:var(--bg-light)" class="cont">
                        <input value="{{ $settings->{$data->key}->minimum ?? '' }}" name="wallet[{{ $data->key }}][minimum]" placeholder="Enter minimum withdrawal" type="number" inputmode="numeric" class="inp input required">
                    </div>
                </div>

            </div>
           @endforeach
        
           <button class="post">Update Settings</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        function ToggleWallet(element){
            if(element.closest('.tg').classList.contains('active')){
                element.closest('.tg').classList.remove('active');
                element.closest('.wallet-group').querySelector('input[withdrawal-portal]').value='off';
            }else{
                element.closest('.tg').classList.add('active');
                element.closest('.wallet-group').querySelector('input[withdrawal-portal]').value='on';
            }
        }
    </script>
@endsection