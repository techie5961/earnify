@extends('layout.admins.app')
@section('title')
    User
@endsection
@section('css')
    <style class="css">
      
     
        
      
      
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
          <div style="border:1px solid var(--rgt-01)" class="w-full overflow-hidden bg-light p-20 br-10 column g-10">
                    {{-- new row --}}
                    <div class="w-full row flex-wrap g-10 space-between">
                        {{-- new --}}
                        <div class="h-50 w-50 p-5 no-shrink bg-primary primary-text circle no-select column align-center justify-center">
                            @isset($data->photo)
                                <img src="{{ asset('photos/users/'.$data->photo.'') }}" alt="" class="w-full h-full circle">
                            @else
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>

                            @endisset
                        </div>
                        {{-- new column --}}
                        <div class="column m-right-auto g-5">
                            <strong class="row align-center g-5" class="font-size-1">{{ ucwords($data->username) }} 
                                @if ($data->type == 'vendor')
                                <svg viewBox="0 0 24 24" fill="orange" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 19H22.0049V21H2.00488V19ZM2.00488 5L7.00488 8L12.0049 2L17.0049 8L22.0049 5V17H2.00488V5Z"></path></svg>
                                    
                                @endif
                            </strong>
                            <small class="opacity-07">Registered {{ $data->frame }}</small>
                        </div>
                        {{-- new --}}
                        <div class="status {{ $data->status == 'active' ? 'green' : 'red' }}">{{ $data->status }}</div>
                    </div>
                    <hr>
                    {{-- balances --}}
                    <div style="grid-template-columns: repeat(auto-fit,minmax(100px,1fr))" class="w-full overflow-hidden grid g-10 place-center">
                        @foreach (collect(json_decode(file_get_contents(database_path('data/wallets.json')))) as $wallet)
                            <div style="border:1px solid var(--rgt-01);background:var(--rgt-005)" class="w-full overflow-hidden g-10 br-5 p-10 align-center column">
                                <small>{{ $wallet->name }}</small>
                                <strong class="font-size-09 row overflow-hidden ">{{ $data->currency.number_format($data->{$wallet->key}) }}</strong>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">User ID:</span>
                        <span class="font-weight-500">{{ $data->uniqid }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Email:</span>
                        <span class="font-weight-500">{{ $data->email }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Name:</span>
                        <span class="font-weight-500">{{ ucwords($data->name) }}</span>
                    </div>
                     {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Registration Date:</span>
                        <span class="font-weight-500">{{ $data->date_format.$data->meridian }}</span>
                    </div>
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Package:</span>
                        <span class="font-weight-500">{{ $data->package }} Package ({{ucwords($data->country)}})</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Activation Fee:</span>
                        <span class="font-weight-500">{{ $data->currency.number_format(collect(json_decode(file_get_contents(database_path('data/packages.json'))))->where('id',$data->pkg)->first()->activation_fee->value ?? 0,2) }}</span>
                    </div>
                     {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Coupon Code Used:</span>
                        <span class="font-weight-500">{{ json_decode($data->coupon)->uniqid ?? 'null' }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Country:</span>
                        <span class="font-weight-500">{{ ucwords($data->country) }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Account Type:</span>
                        <span class="font-weight-500">{{ ucwords($data->type) }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Phone Number:</span>
                        <span class="font-weight-500">{{ $data->phone }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Referred By:</span>
                        <span onclick="if(this.dataset.ref != '') window.location.href='{{ url('admins/user?id=') }}' + this.dataset.ref " data-ref="{{ $data->ref_id }}" class="font-weight-500 capitalize no-select  {{ isset($data->ref) ? 'c-primary u' : '' }}">{{ $data->ref ?? 'None' }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <span class="opacity-07">Total Withdrawals:</span>
                        <span class="font-weight-500">{{ $data->currency.number_format($data->total_withdrawals,2) }}</span>
                    </div>

                    {{-- new row --}}
                    <div class="row flex-wrap w-full g-10 align-center">
                        <button onclick="window.open('{{ url('admins/login/as/user?user_id='.$data->id.'') }}')" style="border-bottom:4px solid black;background:#444;" class="btn-blue-3d">Login as User</button>
                        @if ($data->status == 'active')
                        <button onclick="window.location.href='{{ url('admins/ban/user?user_id='.$data->id.'') }}'" style="border-bottom:4px solid red;background:coral;" class="btn-blue-3d">Ban User</button>
                            
                        @else
                        <button onclick="window.location.href='{{ url('admins/ban/user?user_id='.$data->id.'') }}'" style="border-bottom:4px solid navy;background:rgb(0, 119, 255);" class="btn-blue-3d">UnBan User</button>
                            
                        @endif

                        @if ($data->type == 'user')
                        <button onclick="window.location.href='{{ url('admins/mark/as/vendor?id='.$data->id.'') }}'" style="border-bottom:4px solid #008505;background:#4caf50;" class="btn-blue-3d">Mark as Vendor</button>
                            
                        @else
                        <button onclick="window.location.href='{{ url('admins/mark/as/vendor?id='.$data->id.'') }}'" style="border-bottom:4px solid goldenrod;background:gold;color:black;" class="btn-blue-3d">UnMark as Vendor</button>
                            
                        @endif
                        <button onclick="window.location.href='{{ url('admins/transactions?user_id='.$data->id.'') }}'" style="border-bottom:4px solid rgb(1, 114, 114);background:aqua;color:black;" class="btn-blue-3d">View Transaction Logs</button>

                    </div>

                    
                  </div>

                  

                    {{-- credit form --}}
                    <form style="border:1px solid var(--rgt-01)" action="{{ url('admins/post/credit/user/process') }}" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full credit-form forms br-10 active column p-20 bg-light g-10">
                      <strong class="font-size-1-2 row wlign-center font-weight-900 c-primary">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11H7V13H11V17H13V13H17V11H13V7H11V11Z"></path></svg>

                        Credit User
                    </strong>
                        {{-- csrf token --}}
                       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
                      {{-- user id --}}
                       <input type="hidden" name="user_id" value="{{ $data->id }}" class="inp input">
                       
                       {{-- new input --}}
                        <div class="w-full column g-5">
                            <label>Select Wallet</label>
                            <div class="cont">
                            <select name="wallet" class="inp input required">
                                <option value="" selected disabled>Choose Wallet....</option>
                        @foreach (collect(json_decode(file_get_contents(database_path('data/wallets.json')))) as $wallet)
                                   <option value="{{ $wallet->key }}">{{ $wallet->name }}</option>
                               @endforeach
                            </select>
                        </div>
                        </div>
                         {{-- new input --}}
                        <div class="w-full column g-5">
                            <label>Credit Amount({{ $data->currency }})</label>
                            <div class="cont">
                           <input inputmode="numeric" name="amount" placeholder="E.g {{ $data->currency }}5,000" type="number" class="inp input required">
                        </div>
                        </div>
                        {{-- new input --}}
                        <div class="w-full title column g-5">
                            <label>Transaction Title</label>
                            <div class="cont">
                           <input name="title" placeholder="E.g Admin Bonus" type="text" class="inp">
                        </div>
                        </div>
                        
                        <label class="row align-center w-full">
                            <input onchange="MyFunc.VerifyCheck(this)" type="checkbox">
                            <span>Log this Transaction</span>
                        </label>
                        <button style="background:#4caf50;" class="post">Credit User</button>
                    </form>

                      {{-- debit form --}}
                    <form style="border:1px solid var(--rgt-01)" action="{{ url('admins/post/debit/user/process') }}" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full debit-form forms br-10 active column p-20 bg-light g-10">
                       <strong class="font-size-1-2 row wlign-center font-weight-900 c-primary">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM7 11V13H17V11H7Z"></path></svg>

                        Debit User
                    </strong>
                        {{-- csrf token --}}
                       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
                      {{-- user id --}}
                       <input type="hidden" name="user_id" value="{{ $data->id }}" class="inp input">
                       
                       {{-- new input --}}
                        <div class="w-full column g-5">
                            <label>Select Wallet</label>
                            <div class="cont">
                            <select name="wallet" class="inp input required">
                                <option value="" selected disabled>Choose Wallet....</option>
                        @foreach (collect(json_decode(file_get_contents(database_path('data/wallets.json')))) as $wallet)
                                   <option value="{{ $wallet->key }}">{{ $wallet->name }}</option>
                               @endforeach
                            </select>
                        </div>
                        </div>
                         {{-- new input --}}
                        <div class="w-full column g-5">
                            <label>Debit Amount({{ $data->currency }})</label>
                            <div class="cont">
                           <input inputmode="numeric" name="amount" placeholder="E.g {{ $data->currency }}5,000" type="number" class="inp input required">
                        </div>
                        </div>
                        {{-- new input --}}
                        <div class="w-full title column g-5">
                            <label>Transaction Title</label>
                            <div class="cont">
                           <input name="title" placeholder="E.g Admin Bonus" type="text" class="inp">
                        </div>
                        </div>
                        
                        <label class="row align-center w-full">
                            <input onchange="MyFunc.VerifyCheck(this)" type="checkbox">
                            <span>Log this Transaction</span>
                        </label>
                        <button style="background:red;" class="post">Debit User</button>
                    </form>
                  
    </section>
@endsection
@section('js')
   <script class="js">
   window.MyFunc = {
    Restyle : function(){
         document.querySelectorAll('.wallet-heading .bar').forEach((data)=>{
        data.style.width=data.closest('.wallet-heading').querySelector('.title').getBoundingClientRect().width + 'px'
    });
    },
    SwitchForm : function(element,form_type){
        document.querySelectorAll('.wallet-heading').forEach((data)=>{
            data.classList.remove('active');
        });

        document.querySelectorAll('form').forEach((data)=>{
            data.classList.remove('active');
        });
        document.querySelector(form_type).classList.add('active');
        element.classList.add('active');
    },
    VerifyCheck : function(element){
      
         if(element.checked){
        
            element.closest('form').classList.add('log');
        //    alert(element.closest('form').querySelector('.title').innerHTML);
            element.closest('form').querySelector('.title .cont input').classList.add('input');
            element.closest('form').querySelector('.title .cont input').classList.add('required');
        }else{
            element.closest('form').classList.remove('log');
             element.closest('form').querySelector('.title .cont input').classList.remove('input');
            element.closest('form').querySelector('.title .cont input').classList.remove('required');
        }
       
    },
    Completed : function(response){
        let data=JSON.parse(response);
        if(data.status == 'success'){
            window.location.reload();
        }
    }
   }
   MyFunc.Restyle();
    </script> 
@endsection