@extends('layout.admins.app')
@section('title')
    Site Settings
@endsection
@section('css')
   <style class="css">
    form{
        border:1px solid var(--rgt-01);
        
    }
     .group{
                        width:100%;
                        display:flex;
                        flex-direction:column;
                        padding:15px;
                        border:1px solid var(--primary);
                        background:var(--primary-01);
                        border-radius:10px;
                        gap:10px;
                    }
                    .group .cont{
                        background:var(--bg-light)
                    }
   </style>
@endsection
@section('main')
    <section class="w-full column g-20">
       <div class="column g-5">
         <strong style="font-size:1.5rem;">Settings</strong>
        <span class="opacity-07">preferences & configuration</span>

       </div>
       {{-- header row --}}
       {{-- <div class="row w-full align-center g-10 overflow-auto">
     
        

        <div onclick="MyFunc.SwitchForm(this,'.general-settings-form')" style="border:1px solid var(--primary-01)" class="p-10 g-10 p-x-20 row heads active settings-head align-center bg-light br-10 c-primary">
            <span>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M32,80a8,8,0,0,1,8-8H77.17a28,28,0,0,1,53.66,0H216a8,8,0,0,1,0,16H130.83a28,28,0,0,1-53.66,0H40A8,8,0,0,1,32,80Zm184,88H194.83a28,28,0,0,0-53.66,0H40a8,8,0,0,0,0,16H141.17a28,28,0,0,0,53.66,0H216a8,8,0,0,0,0-16Z"></path></svg> 
            </span>

            <span>General</span>
        </div>
        
        

        <div onclick="MyFunc.SwitchForm(this,'.social-settings-form')" style="border:1px solid var(--primary-01)" class="p-10 settings-head g-10 p-x-20 row align-center heads bg-light br-10 c-primary">
            <span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M254.3,107.91,228.78,56.85a16,16,0,0,0-21.47-7.15L182.44,62.13,130.05,48.27a8.14,8.14,0,0,0-4.1,0L73.56,62.13,48.69,49.7a16,16,0,0,0-21.47,7.15L1.7,107.9a16,16,0,0,0,7.15,21.47l27,13.51,55.49,39.63a8.06,8.06,0,0,0,2.71,1.25l64,16a8,8,0,0,0,7.6-2.1l40-40,15.08-15.08,26.42-13.21a16,16,0,0,0,7.15-21.46Zm-54.89,33.37L165,113.72a8,8,0,0,0-10.68.61C136.51,132.27,116.66,130,104,122L147.24,80h31.81l27.21,54.41Zm-41.87,41.86L99.42,168.61l-49.2-35.14,28-56L128,64.28l9.8,2.59-45,43.68-.08.09a16,16,0,0,0,2.72,24.81c20.56,13.13,45.37,11,64.91-5L188,152.66Zm-25.72,34.8a8,8,0,0,1-7.75,6.06,8.13,8.13,0,0,1-1.95-.24L80.41,213.33a7.89,7.89,0,0,1-2.71-1.25L51.35,193.26a8,8,0,0,1,9.3-13l25.11,17.94L126,208.24A8,8,0,0,1,131.82,217.94Z"></path></svg>
           </span>

            <span>Social</span>
        </div>
        
       </div> --}}
        {{-- GENERAL SETTINGS --}}
        <form method="POST" onsubmit="PostRequest(event,this)" action="{{ url('admins/post/general/settings/process') }}" class="w-full active column general-settings-form settings-form g-10 bg-light br-primary p-20">
           
            <div class="row m-bottom-10 c-primary g-5 align-center">
                <span>
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M128,24h0A104,104,0,1,0,232,128,104.12,104.12,0,0,0,128,24Zm78.36,64H170.71a135.28,135.28,0,0,0-22.3-45.6A88.29,88.29,0,0,1,206.37,88ZM216,128a87.61,87.61,0,0,1-3.33,24H174.16a157.44,157.44,0,0,0,0-48h38.51A87.61,87.61,0,0,1,216,128ZM128,43a115.27,115.27,0,0,1,26,45H102A115.11,115.11,0,0,1,128,43ZM102,168H154a115.11,115.11,0,0,1-26,45A115.27,115.27,0,0,1,102,168Zm-3.9-16a140.84,140.84,0,0,1,0-48h59.88a140.84,140.84,0,0,1,0,48Zm50.35,61.6a135.28,135.28,0,0,0,22.3-45.6h35.66A88.29,88.29,0,0,1,148.41,213.6Z"></path></svg>
                </span>
                <strong class="desc">General Settings</strong>
            </div>
            {{-- csrf token --}}
            <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
           
            
             {{-- new input --}}
            <div class="column g-5 w-full">
               <div class="column g-2">
                 <label >Welcome Bonus</label>
                <small class="opacity-05">Bonus received on signup/registration(set to Zero if no welcome bonus)</small>
                </div> 
                <div class="cont">
                    <input value="{{ $general_settings->welcome_bonus ?? '' }}" name="welcome_bonus" type="number" placeholder="E.g {{ $currency }}500" class="inp required input">
                </div>
              
                  </div>
                   {{-- new input --}}
            <div class="column g-5 w-full">
               <div class="column g-2">
                 <label >Referral commission</label>
                <small class="opacity-05">How much upline earns from their downlines(one time)</small>
                </div> 
                <div class="cont">
                    <input value="{{ $general_settings->referral_commission ?? '' }}" name="referral_commission" type="number" placeholder="E.g {{ $currency }}700" class="inp required input">
                </div>
              
                  </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
               <div class="column g-2">
                 <label >Task Penalty</label>
                <small class="opacity-05">This would be the default penalty fee for penalising tasks,it can always be updated anytime</small>
                </div> 
                <div class="cont">
                    <input value="{{ $general_settings->task->penalty ?? '' }}" name="task_penalty" type="number" placeholder="E.g 0" class="inp required input">
                </div>
              
                  </div>
          
            {{-- submit button --}}
            <button class="post">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,32H83.31A15.86,15.86,0,0,0,72,36.69L36.69,72A15.86,15.86,0,0,0,32,83.31V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM128,184a32,32,0,1,1,32-32A32,32,0,0,1,128,184ZM172,80a4,4,0,0,1-4,4H88a4,4,0,0,1-4-4V48h88Z"></path></svg>

                </span>
                <span>Save Changes</span>
            </button>
        </form>


         {{-- SOCIAL SETTINGS --}}
        <form method="POST" onsubmit="PostRequest(event,this)" action="{{ url('admins/post/social/settings/process') }}" class="w-full column social-settings-form settings-form g-10 bg-light br-primary p-20">
           
            <div class="row m-bottom-10 c-primary g-5 align-center">
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M111.59,181.47A8,8,0,0,1,104,192H24a8,8,0,0,1-7.59-10.53l40-120a8,8,0,0,1,15.18,0ZM208,76a52,52,0,1,0-52,52A52.06,52.06,0,0,0,208,76Zm16,68H136a8,8,0,0,0-8,8v56a8,8,0,0,0,8,8h88a8,8,0,0,0,8-8V152A8,8,0,0,0,224,144Z"></path></svg>
             </span>
                <strong class="desc">Social Settings</strong>
            </div>
            {{-- csrf token --}}
            <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new input --}}
            <div class="column g-5 w-full">
               <div class="column g-2">
                 <label>Whatsapp Community</label>
                <small class="opacity-05">Leave empty if the platform does not have a whatsappp community</small>
                </div> 
                <div class="cont">
                    <input value="{{ $social_settings->whatsapp_community ?? '' }}" name="whatsapp_community" type="url" placeholder="E.g https://wa.me/platform-whatsapp-community" class="inp input">
                </div>
              
                  </div>
                    {{-- new input --}}
            <div class="column g-5 w-full">
               <div class="column g-2">
                 <label>Telegram Community</label>
                <small class="opacity-05">Leave empty if the platform does not have a telegram community</small>
                </div> 
                <div class="cont">
                    <input value="{{ $social_settings->telegram_community ?? '' }}" name="telegram_community" type="url" placeholder="E.g https://t.me/platform-telegram-community" class="inp input">
                </div>
              
                  </div>

                          {{-- new input --}}
            <div class="column g-5 w-full">
               <div class="column g-2">
                 <label>Advert Link(Telegram)</label>
                <small class="opacity-05">Leave empty if the platform does not have a telegram advert link</small>
                </div> 
                <div class="cont">
                    <input value="{{ $social_settings->advert->telegram ?? '' }}" name="telegram_advert_link" type="url" placeholder="E.g https://t.me/platform-telegram-advert-link" class="inp input">
                </div>
              
                  </div>
                     {{-- new input --}}
            <div class="column g-5 w-full">
               <div class="column g-2">
                 <label>Advert Link(Whatsapp)</label>
                <small class="opacity-05">Leave empty if the platform does not have a whatsapp advert link</small>
                </div> 
                <div class="cont">
                    <input value="{{ $social_settings->advert->whatsapp ?? '' }}" name="whatsapp_advert_link" type="url" placeholder="E.g https://wa.me/platform-whatsapp-advert-link" class="inp input">
                </div>
              
                  </div>

                          {{-- new input --}}
            <div class="column g-5 w-full">
               <div class="column g-2">
                 <label>Site Notification</label>
                <small class="opacity-05">Leave empty if you are not sending any notification</small>
                </div> 
                <div class="cont">
                    <textarea placeholder="Enter site notification to be displayed to users on login...." name="site_notification" class="inp no-resize input required">{{ $social_settings->site_notification ?? '' }}</textarea>
                     </div>
              
                  </div>
           
           
            {{-- submit button --}}
            <button class="post">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208,32H83.31A15.86,15.86,0,0,0,72,36.69L36.69,72A15.86,15.86,0,0,0,32,83.31V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM128,184a32,32,0,1,1,32-32A32,32,0,0,1,128,184ZM172,80a4,4,0,0,1-4,4H88a4,4,0,0,1-4-4V48h88Z"></path></svg>

                </span>
                <span>Save Changes</span>
            </button>
        </form>

    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            ToggleBar : function(element,input_name){
                if(element.closest('.tg').classList.contains('active')){
                    element.closest('.tg').classList.remove('active');
                    element.closest('form').querySelector(`input[name=${input_name}]`).value='off';
                }else{
                    element.closest('.tg').classList.add('active');
                    element.closest('form').querySelector(`input[name=${input_name}]`).value='on';
                }
            },
            SwitchForm : function(element,form_type){
             try{
                
               
                document.querySelectorAll('.settings-head').forEach((data)=>{
                    data.classList.remove('active');
                    
                });
                document.querySelectorAll('.settings-form').forEach((data)=>{
                    data.classList.remove('active');
                });
                element.classList.add('active');
                document.querySelector(form_type).classList.add('active');
                
            
             }catch(error){
                alert(error.stack)
             }
            
            }

           
        }
       
    </script>
@endsection