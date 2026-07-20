@extends('layout.users.app')
@section('title')
    Free Loan
@endsection
@section('css')
    <style class="css">
        body.overlayed header,body.overlayed .main-section{
            transform:scale(0.9) translateY(10px);
            border-radius:20px 20px 0 0 !important;
            background:var(--bg-light);
        }
        header,.main-section{
            transition:all 0.5s ease;
        }
    </style>
@endsection
@section('main')
   @if ($loan)
       <section class="w-full column align-center g-10px">
        <div class="w-full column align-center br-20px g-10px {{ $loan->status == 'processing' ? 'bg-secondary' : ($loan->status == 'rejected' ? 'bg-red' : 'bg-green') }} p-20px">
           <div class="column w-full align-center">
             <span>Your Loan Amount</span>
            <strong style="line-height:1;" class="font-size-2-5 font-weight-900">
           </div>
                &#8358;{{ number_format($loan->amount) }}
            </strong>
           <div class="column w-full align-center g-5px">
             <span class="opacity-07 m-top-20px">Application status</span>
            <button class="w-full no-pointer no-select font-size-1-2 font-weight-900 p-15px br-1000px no-select pointer bg-white border-none {{ $loan->status == 'processing' ? 'c-secondary' : ($loan->status == 'rejected' ? 'c-red' : 'c-green') }} uppercase row align-center justify-center">
                {{ $loan->status }}
            </button>
           </div>
        </div>
       </section>
   @else
        <section x-data="{ 
        BankOverlay : false,
        Bank : '',
        BankSelected : false
     }" x-init="
     $watch('BankOverlay', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden');
            document.body.classList.add('overlayed');
        }else{
            document.body.classList.remove('overflow-hidden');
            document.body.classList.remove('overlayed');
        }
     })
     " class="w-full column">

    <section x-data="{ 
        ApplySection : true,
        FormSection : false
     }" class="w-full main-section column g-10px">
        {{-- apply section --}}
      <template x-if="ApplySection">
         <div class="w-full column g-10px align-center">
         <div style="background:linear-gradient(to bottom,var(--primary),var(--secondary))" class="w-full column br-15px p-20px">
            <strong class="font-size-1 font-weight-900">Earnify Free Loan</strong>
            <div class="w-full bg-white c-black br-20px m-top-20px p-20px column">
                <span class="opacity-07">Get a loan up to</span>
               <div class="row align-center w-full space-between">
                 <strong class="font-size-1-5 font-weight-900 c-primary">&#8358;500,000</strong>
                 <button x-on:click="
                 ApplySection = false;
                 FormSection = true;
                 " class="w-fit br-1000px bg-primary primary-text no-select pointer no-border p-10px p-x-20px">Apply</button>
               </div>
            </div>
        </div>
        <small class="opacity-07 text-center">All loan services are powered by Earnify</small>
    </div>
      </template>
      {{-- form section --}}
      <template x-if="FormSection">
        <form x-on:submit="PostRequest(event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Vitecss.navigate('{{ url()->current() }}')
            }
        })" action="{{ url('users/post/free/loan/request/process') }}" method="POST" class="w-full bg-primary-01 text-align-start p-20px br-5px border-width-1px border-style-solid border-color-rgt-01 column g-10px">
           <strong class="font-size-1 m-right-auto c-primary-light font-weight-900"><span class="c-secondary">Earnify</span> Free Loan</strong>
            <div class="w-full row align-center g-10px">
               {{-- csrf token --}}
               <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>First Name</label>
                    <div class="cont bg">
                        <input readonly name="First_Name" value="{{ explode(' ',Auth::guard('users')->user()->name)[0] ?? '' }}" placeholder="First Name" type="text" class="inp input required">
                    </div>
                </div>
                  {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Last Name</label>
                    <div class="cont bg">
                        <input name="Last_Name" readonly value="{{ explode(' ',Auth::guard('users')->user()->name)[1] ?? '' }}" placeholder="First Name" type="text" class="inp input required">
                    </div>
                </div>
            </div>
              {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Date of Birth</label>
                    <div class="cont">
                        <input name="Date_of_Birth" x-mask="99 / 99 / 9999" placeholder="DD / MM / YYYY" inputmode="numeric" type="text" class="inp input required">
                    </div>
                </div>
                  {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Home Address</label>
                    <div class="cont">
                        <input name="Address" placeholder="Enter your home address" type="text" class="inp input required">
                    </div>
                </div>
                  {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>How much do you need?</label>
                    <div class="cont">
                        <input name="Amount" max="500000" placeholder="Max: ₦500,000" type="text" inputmode="numeric" class="inp input required">
                    </div>
                </div>
                {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Disbursement account number</label>
                    <div class="cont">
                        <input name="Account_Number" placeholder="Enter account number" type="number" inputmode="numeric" class="inp input required">
                    </div>
                </div>
                {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Disbursement bank</label>
                    <div x-on:click="
                    BankOverlay = true;
                    " class="cont p-10px">
                    <template x-if="!BankSelected">
                       <div class="row align-center w-full opacity-07 space-between">
                        <span>Select Bank</span>
                        <i>
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                        </i>
                    </div>
                    </template>
                    <template x-if="BankSelected">
                       <div class="row align-center w-full space-between">
                        <span class="ws-nowrap text-overflow-ellipsis" x-text="Bank"></span>
                        
                    </div>
                    </template>
                    <input x-bind:value="Bank" type="hidden" class="inp input required" name="Bank">
                    </div>
                </div>
                {{-- new input --}}
                <div class="column g-5px w-full">
                    <label>Disbursement account name</label>
                    <div class="cont">
                        <input name="Account_Name" placeholder="Enter account name" type="text" class="inp input required">
                    </div>
                </div>
                <button class="post">Submit</button>
              
        </form>
      </template>
    </section>
    <section x-on:click="BankOverlay=false;" x-show="BankOverlay" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-data="{  }" class="pos-fixed inset-0 column align-center transition-all bg-black-transparent backdrop-blur-5px justify-end z-index-3000">
        <div x-show="BankOverlay" x-transition:enter-start="bottom-enter" x-transition:enter-end="bottom-enter-end" x-transition:leave-start="bottom-leave" x-transition:leave-end="bottom-leave-end" x-on:click.stop="" class="w-full transition-all overflow-hidden max-h-semi-full bg br-top-right-15px br-top-left-15px column">
            {{-- head --}}
            <div class="w-full row pos-sticky top-0 bg-inherit p-20px align-center space-between">
                <strong class="font-size-1 font-weight-800">Select Bank</strong>
                <div x-on:click="BankOverlay=false;" class="h-30px perfect-square bg-rgt-01 column align-center justify-center pc-pointer no-select circle">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

                </div>
            </div>
            {{-- body --}}
            <div class="w-full overflow-auto column">
                @foreach (collect(json_decode(file_get_contents(database_path('data\nigeriabanks.json'))))->sortBy('name') as $data)
                    <div x-on:click="
                    Bank = '{{ $data->name }}';
                    BankSelected = true;
                    BankOverlay = false;
                    " x-on:touchstart="
                    $el.classList.add('bg-rgt-01')
                    " x-on:touchend="$el.classList.remove('bg-rgt-01')" class="w-full no-select pc-pointer p-10px row align-center space-between">
                        <span>{{ $data->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    </section>

   @endif
@endsection