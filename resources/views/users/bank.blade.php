@extends('layout.users.app')
@section('title')
    Add Bank
@endsection
@section('css')
    <style class="css">
        .display-name.active .load{
            display:none;
        }
        .display-name.error .error{
            display:flex !important;
        }
        .display-name.success .success{
            display:flex !important;
        }
       

      
      
    </style>
@endsection
@section('main')
    <section class="column m-x-auto max-w-500 w-full g-10 p-10">
        <form onsubmit="PostRequest(event,this,MyFunc.Updated)" action="{{ url('users/post/add/bank/process') }}" method="POST" class="column bg-light g-10 w-full p-10 br-5 box-shadow">
           <strong class="desc c-primary">Add New Bank</strong>
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="input">
            <label for="">Bank Name</label>
            <div class="cont h-50 w-full border-color-silver border-1 br-5 bg">
              <input name="bank_id" type="hidden" class="inp required input bank_id">
                <div onclick="SlideUp()" class="row p-10 pc-pointer space-between w-full h-full br-10 align-center no-select">
                    <span class="bank_name">Select Bank</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="var(--text)" viewBox="0 0 256 256"><path d="M72.61,83.06a8,8,0,0,1,1.73-8.72l48-48a8,8,0,0,1,11.32,0l48,48A8,8,0,0,1,176,88H80A8,8,0,0,1,72.61,83.06ZM176,168H80a8,8,0,0,0-5.66,13.66l48,48a8,8,0,0,0,11.32,0l48-48A8,8,0,0,0,176,168Z"></path></svg>

                </div>
            </div>
            <label for="">Account Number</label>
            <div class="cont h-50 w-full border-color-silver border-1 br-5 bg">
                    <input name="account_number" oninput="MyFunc.AutoVerify()" type="text" maxlength="10" inputmode="numeric" placeholder="Enter 10 digits Account Number" class="account_number inp input required h-full w-full br-10 no-border bg-transparent">
            </div>
          <div class="row w-full display-name display-none g-5 p-10 clip-10 align-center no-select bg-green-transparent">
            <svg fill="var(--text)" height="20" class="load" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><circle cx="3" cy="12" r="2"/><circle cx="21" cy="12" r="2"/><circle cx="12" cy="21" r="2"/><circle cx="12" cy="3" r="2"/><circle cx="5.64" cy="5.64" r="2"/><circle cx="18.36" cy="18.36" r="2"/><circle cx="5.64" cy="18.36" r="2"/><circle cx="18.36" cy="5.64" r="2"/><animateTransform attributeName="transform" type="rotate" dur="1.5s" values="0 12 12;360 12 12" repeatCount="indefinite"/></g></svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="status display-none success" width="20" height="20" fill="#4caf50" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" class="status display-none error" height="20" fill="red" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>

            <span class="verified-name">Verifying Account Name</span>
          </div>
          <input type="hidden" value=""  name="account_name" class="input account_name">
           
            <button class="post m-top-20 br-5 clip-5 disabled bold add-bank">Update Bank Details</button>
        </form>

       @if (!empty((array) $bank))
            <div class="column max-w-500 g-10 space-between bg-light br-5 box-shadow p-10 w-full">
            <div class="row w-full g-10 align-center">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>

                 <span>Bank Details</span>
            </div>
            <hr>
            <div class="row g-10 align-center">
                <strong>Account Number:</strong>
                <span>{{ $bank->account_number }}</span>
            </div>
             <div class="row g-10 align-center">
                <strong>Bank Name:</strong>
                <span>{{ $bank->bank_name }}</span>
            </div>
             <div class="row g-10 align-center">
                <strong>Account Name:</strong>
                <span>{{ $bank->account_name }}</span>
            </div>
        </div>
       @endif
    </section>
   
@endsection
@section('slideup_child')
    <section style="overflow:none;" class="column p-10 w-full no-select">
        <strong class="desc c-primary p-10 m-bottom-10">Select Bank</strong>
         {{-- <input type="search" placeholder="Search bank...." class="w-full border-none bg-light h-40 br-5"> --}}
     
      <div class="h-full overflow-auto w-full column">
         @foreach (Banks()->data as $data)
            <div onclick="MyFunc.Choosebank('{{ $data->id }}','{{ $data->name }}')" class="row pointer clip-10 space-between w-full align-center p-10 g-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208ZM16.3,98.18a8,8,0,0,1,3.51-9l104-64a8,8,0,0,1,8.38,0l104,64A8,8,0,0,1,232,104H208v64h16a8,8,0,0,1,0,16H32a8,8,0,0,1,0-16H48V104H24A8,8,0,0,1,16.3,98.18ZM144,160a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Zm-48,0a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Z"></path></svg>
            <span class="m-right-auto">{{ $data->name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>

        </div>
       @endforeach
      </div>

    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc={
            Choosebank : function(id,name){
                document.querySelector(".bank_id").value=id;
                document.querySelector('.bank_name').innerHTML=name;
                HideSlideUp();
                MyFunc.AutoVerify();
            },
            AutoVerify : function(){
              try{
                  let bank_id=document.querySelector('.bank_id').value;
                let account_number=document.querySelector('.account_number').value;
                if(bank_id !== '' && account_number.length == 10){
                   let display_name=document.querySelector('.display-name');
                   display_name.classList.remove('display-none');
                   display_name.classList.remove('active');
                    display_name.classList.remove('success');
                     display_name.classList.remove('error');
                     document.querySelector('.verified-name').innerHTML='Verifying Account Name';
                      document.querySelector('button.add-bank').classList.add('disabled');
                    document.querySelector('.verified-name').classList.remove('c-red');
                     document.querySelector('.verified-name').classList.remove('c-green');
                   GetRequest(event,'{{ url('users/get/bank/auto/verify') }}' + '?account_number=' + account_number + '&bank_id=' + bank_id ,document.createElement('div'),MyFunc.Verified);
                }

              }catch(error){
                CreateNotify('error',error.stack);
              }
            },
            Verified : function(response){
                let data=JSON.parse(response);
                 let display_name=document.querySelector('.display-name');
                     display_name.classList.add('active');
                     display_name.classList.add(data.status);
                if(data.status == 'success'){
                    document.querySelector('input.account_name').value=data.account_name;
                     document.querySelector('.verified-name').classList.add('c-green');
                    document.querySelector('.verified-name').innerHTML=data.account_name;
                    document.querySelector('button.add-bank').classList.remove('disabled');
                }else{
                    document.querySelector('.verified-name').innerHTML=data.message;
                    document.querySelector('.verified-name').classList.add('c-red');
                     document.querySelector('button.add-bank').classList.add('disabled');
                }
            },
            Updated : function(response,event){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,data.url);
                }
                
            }
        }

    </script>
@endsection