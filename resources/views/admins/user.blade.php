@extends('layout.admins.app')
@section('title')
  User Details
@endsection
@section('main')
    <section class="grid pc-grid-2 g-10 p-10 w-full">
       
       
      
     
       
        
      
            <div class="w-full grid-full p-10 br-10 box-shadow bg-light">
                <div class="row space-between g-10">
                    <img src="{{ asset('images/avatar.jpeg') }}" class="h-50 w-50 clip-circle border-2 border-color-primary circle" alt="">
                    <div class="column g-2 m-right-auto">
                        <strong class="c-primary g-2 row align-center font-1">{{ ucfirst($data->username) }}  

                            @if ($data->type == 'promoter')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffd700" viewBox="0 0 256 256"><path d="M248,80a28,28,0,1,0-51.12,15.77l-26.79,33L146,73.4a28,28,0,1,0-36.06,0L85.91,128.74l-26.79-33a28,28,0,1,0-26.6,12L47,194.63A16,16,0,0,0,62.78,208H193.22A16,16,0,0,0,209,194.63l14.47-86.85A28,28,0,0,0,248,80ZM128,40a12,12,0,1,1-12,12A12,12,0,0,1,128,40ZM24,80A12,12,0,1,1,36,92,12,12,0,0,1,24,80ZM220,92a12,12,0,1,1,12-12A12,12,0,0,1,220,92Z"></path></svg>

                            @endif

                        </strong>
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
                  <div class="row g-5 align-center">
                    
                    <span class="text-dim">Total Second Level Referrals Referrals:</span>
                  <strong class="font-1 c-primary">{{ number_format($data->total_second_level_referrals) }}</strong>
        
                </div>
                 <div class="row g-5 align-center">
                    
                    <span class="text-dim">Total Referral Commission:</span>
                  <strong class="font-1 c-primary">&#8358;{{ number_format($data->total_referral_commission,2) }}</strong>
        
                </div>
                 <div class="row g-5 align-center">
                    
                    <span class="text-dim">Total Active Products:</span>
                  <strong class="font-1 c-primary">{{ number_format($data->total_active_products) }}</strong>
        
                </div>
                 <div class="row g-5 align-center">
                    
                    <span class="text-dim">Total Daily Income:</span>
                  <strong class="font-1 c-primary">&#8358;{{ number_format($data->total_daily_income,2) }}</strong>
        
                </div>
                <span class="desc bold c-green u">Bank Details</span>
                 <div class="row g-5 align-center">
                    
                    <span class="text-dim">Account Number:</span>
                  <strong class="font-1 c-primary">{{ json_decode($data->bank ?? '{}')->account_number ?? 'null' }}</strong>
        
                </div>
                 <div class="row g-5 align-center">
                    
                    <span class="text-dim">Bank Name:</span>
                  <strong class="font-1 c-primary">{{ json_decode($data->bank ?? '{}')->bank_name ?? 'null' }}</strong>
        
                </div>
                 <div class="row g-5 align-center">
                    
                    <span class="text-dim">Account Name:</span>
                  <strong class="font-1 c-primary">{{ json_decode($data->bank ?? '{}')->account_name ?? 'null' }}</strong>
        
                </div>
               <div class="row space-between w-full g-10 align-center">
                @if ($data->type == 'promoter')
                    <button onclick="window.location.href='{{ url('admins/users/mark/as/promoter?type='.$data->type.'&id='.$data->id.'') }}'" class="btn-gold-3d g-2 br-5 clip-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M248,80a28,28,0,1,0-51.12,15.77l-26.79,33L146,73.4a28,28,0,1,0-36.06,0L85.91,128.74l-26.79-33a28,28,0,1,0-26.6,12L47,194.63A16,16,0,0,0,62.78,208H193.22A16,16,0,0,0,209,194.63l14.47-86.85A28,28,0,0,0,248,80ZM128,40a12,12,0,1,1-12,12A12,12,0,0,1,128,40ZM24,80A12,12,0,1,1,36,92,12,12,0,0,1,24,80ZM193.22,192H62.78L48.86,108.52,81.79,149A8,8,0,0,0,88,152a7.83,7.83,0,0,0,1.08-.07,8,8,0,0,0,6.26-4.74l29.3-67.4a27,27,0,0,0,6.72,0l29.3,67.4a8,8,0,0,0,6.26,4.74A7.83,7.83,0,0,0,168,152a8,8,0,0,0,6.21-3l32.93-40.52ZM220,92a12,12,0,1,1,12-12A12,12,0,0,1,220,92Z"></path></svg>
                    
                    UnMark As Promoter</button>
                @else
                    <button onclick="window.location.href='{{ url('admins/users/mark/as/promoter?type='.$data->type.'&id='.$data->id.'') }}'" class="btn-blue-3d g-2 br-5 clip-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M248,80a28,28,0,1,0-51.12,15.77l-26.79,33L146,73.4a28,28,0,1,0-36.06,0L85.91,128.74l-26.79-33a28,28,0,1,0-26.6,12L47,194.63A16,16,0,0,0,62.78,208H193.22A16,16,0,0,0,209,194.63l14.47-86.85A28,28,0,0,0,248,80ZM128,40a12,12,0,1,1-12,12A12,12,0,0,1,128,40ZM24,80A12,12,0,1,1,36,92,12,12,0,0,1,24,80ZM193.22,192H62.78L48.86,108.52,81.79,149A8,8,0,0,0,88,152a7.83,7.83,0,0,0,1.08-.07,8,8,0,0,0,6.26-4.74l29.3-67.4a27,27,0,0,0,6.72,0l29.3,67.4a8,8,0,0,0,6.26,4.74A7.83,7.83,0,0,0,168,152a8,8,0,0,0,6.21-3l32.93-40.52ZM220,92a12,12,0,1,1,12-12A12,12,0,0,1,220,92Z"></path></svg>
                    
                    Mark As Promoter</button>
                @endif
               @if ($data->status == 'active')
                   <button onclick="window.location.href='{{ url('admins/get/ban/user?status='.$data->status.'&id='.$data->id.'') }}'" class="btn-red-3d br-5 clip-5">Ban User</button>
              
               @else
                   <button onclick="window.location.href='{{ url('admins/get/ban/user?status='.$data->status.'&id='.$data->id.'') }}'" class="btn-green-3d br-5 clip-5">UnBan User</button>
              
               @endif 
            </div>
            <buttton onclick="window.open('{{ url('admins/login/as/user?id='.$data->id.'') }}')" class="btn-primary-3d m-left-auto m-top-10 clip-5 br-5">Login As User 
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M141.66,133.66l-40,40A8,8,0,0,1,88,168V136H24a8,8,0,0,1,0-16H88V88a8,8,0,0,1,13.66-5.66l40,40A8,8,0,0,1,141.66,133.66ZM200,32H136a8,8,0,0,0,0,16h56V208H136a8,8,0,0,0,0,16h64a8,8,0,0,0,8-8V40A8,8,0,0,0,200,32Z"></path></svg>

            </buttton>
            </div>
            <form action="{{ url('admins/post/credit/user/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Actioned)" class="column w-full bg-light box-shadow p-10 g-10 br-10">
               <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
               <input type="hidden" name="id" value="{{ $data->id }}" class="input">
                <div class="row g-2 c-green align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#4caf50" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path></svg>
                    <span>Credit User</span>
                </div>
                <hr>
                 <label for="">Select Wallet</label>
                <div class="cont bg-dim w-full h-50 border-1 border-color-silver br-10">
                    <select name="wallet" class="no-border inp required br-10 bg-transparent input w-full h-full">
                        <option value="">Choose Wallet...</option>
                        <option value="deposit">Deposit Wallet</option>
                          <option value="withdrawal">Withdrawal Wallet</option>
                        
                    </select>
                </div>
                <label for="">Credit Amount</label>
                <div class="cont bg-dim w-full h-50 border-1 border-color-silver br-10">
                    <input type="number" name="amount" step="any" placeholder="e.g 1000" class="no-border inp input required br-10 bg-transparent w-full h-full">
                </div>
                <button class="btn-green-3d w-full justify-center row">Credit User</button>
            </form>


     <form action="{{ url('admins/post/debit/user/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Actioned)" class="column w-full bg-light box-shadow p-10 g-10 br-10">
               <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
               <input type="hidden" name="id" value="{{ $data->id }}" class="input">
                <div class="row g-2 c-red align-center">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128Z"></path></svg>
                     <span>Debit User</span>
                </div>
                <hr>
                 <label for="">Select Wallet</label>
                <div class="cont bg-dim w-full h-50 border-1 border-color-silver br-10">
                    <select name="wallet" class="no-border inp required br-10 bg-transparent input w-full h-full">
                        <option value="">Choose Wallet...</option>
                        <option value="deposit">Deposit Wallet</option>
                          <option value="withdrawal">Withdrawal Wallet</option>
                        
                    </select>
                </div>
                <label for="">Debit Amount</label>
                <div class="cont bg-dim w-full h-50 border-1 border-color-silver br-10">
                    <input type="number" name="amount" step="any" placeholder="e.g 1000" class="no-border inp input required br-10 bg-transparent w-full h-full">
                </div>
                <button class="btn-red-3d w-full justify-center row">Debit User</button>
            </form>
     


    </section>
   
@endsection

@section('js')
    <script class="js">
 
       window.MyFunc ={
       Actioned : function(){
        window.location.reload();
       }
    }
</script>
@endsection