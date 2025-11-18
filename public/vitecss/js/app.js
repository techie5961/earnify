

function SpaLoader(element){
    // spa loader to be updated nased on script
    let loader=`
    <div style="z-index:12000" class="spa-loader pos-fixed top-0 left-0 right-0 bottom 0 z-index-10000">
    <div style="height:2px;margin-top:auto" class="child  m-top-auto row h-1 w-full bg-primary"></div>
  </div>
`;
let div=document.createElement('div');
div.innerHTML=loader;
document.querySelector('main').appendChild(div);
   // element.innerHTML=loader;
}
//  btn loader
function BtnLoader(element){
    // button loaders on submission to be updated based on script
    let loader=` <!--SPINNER--><svg version="1.1" class="svg-loader" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 80" xml:space="preserve"><path fill="currentColor" d="M10,40c0,0,0-0.4,0-1.1c0-0.3,0-0.8,0-1.3c0-0.3,0-0.5,0-0.8c0-0.3,0.1-0.6,0.1-0.9c0.1-0.6,0.1-1.4,0.2-2.1
		c0.2-0.8,0.3-1.6,0.5-2.5c0.2-0.9,0.6-1.8,0.8-2.8c0.3-1,0.8-1.9,1.2-3c0.5-1,1.1-2,1.7-3.1c0.7-1,1.4-2.1,2.2-3.1
		c1.6-2.1,3.7-3.9,6-5.6c2.3-1.7,5-3,7.9-4.1c0.7-0.2,1.5-0.4,2.2-0.7c0.7-0.3,1.5-0.3,2.3-0.5c0.8-0.2,1.5-0.3,2.3-0.4l1.2-0.1
		l0.6-0.1l0.3,0l0.1,0l0.1,0l0,0c0.1,0-0.1,0,0.1,0c1.5,0,2.9-0.1,4.5,0.2c0.8,0.1,1.6,0.1,2.4,0.3c0.8,0.2,1.5,0.3,2.3,0.5
		c3,0.8,5.9,2,8.5,3.6c2.6,1.6,4.9,3.4,6.8,5.4c1,1,1.8,2.1,2.7,3.1c0.8,1.1,1.5,2.1,2.1,3.2c0.6,1.1,1.2,2.1,1.6,3.1
		c0.4,1,0.9,2,1.2,3c0.3,1,0.6,1.9,0.8,2.7c0.2,0.9,0.3,1.6,0.5,2.4c0.1,0.4,0.1,0.7,0.2,1c0,0.3,0.1,0.6,0.1,0.9
		c0.1,0.6,0.1,1,0.1,1.4C74,39.6,74,40,74,40c0.2,2.2-1.5,4.1-3.7,4.3s-4.1-1.5-4.3-3.7c0-0.1,0-0.2,0-0.3l0-0.4c0,0,0-0.3,0-0.9
		c0-0.3,0-0.7,0-1.1c0-0.2,0-0.5,0-0.7c0-0.2-0.1-0.5-0.1-0.8c-0.1-0.6-0.1-1.2-0.2-1.9c-0.1-0.7-0.3-1.4-0.4-2.2
		c-0.2-0.8-0.5-1.6-0.7-2.4c-0.3-0.8-0.7-1.7-1.1-2.6c-0.5-0.9-0.9-1.8-1.5-2.7c-0.6-0.9-1.2-1.8-1.9-2.7c-1.4-1.8-3.2-3.4-5.2-4.9
		c-2-1.5-4.4-2.7-6.9-3.6c-0.6-0.2-1.3-0.4-1.9-0.6c-0.7-0.2-1.3-0.3-1.9-0.4c-1.2-0.3-2.8-0.4-4.2-0.5l-2,0c-0.7,0-1.4,0.1-2.1,0.1
		c-0.7,0.1-1.4,0.1-2,0.3c-0.7,0.1-1.3,0.3-2,0.4c-2.6,0.7-5.2,1.7-7.5,3.1c-2.2,1.4-4.3,2.9-6,4.7c-0.9,0.8-1.6,1.8-2.4,2.7
		c-0.7,0.9-1.3,1.9-1.9,2.8c-0.5,1-1,1.9-1.4,2.8c-0.4,0.9-0.8,1.8-1,2.6c-0.3,0.9-0.5,1.6-0.7,2.4c-0.2,0.7-0.3,1.4-0.4,2.1
		c-0.1,0.3-0.1,0.6-0.2,0.9c0,0.3-0.1,0.6-0.1,0.8c0,0.5-0.1,0.9-0.1,1.3C10,39.6,10,40,10,40z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 40 40" to="360 40 40" dur="0.8s" repeatCount="indefinite"/></path><path fill="currentColor" d="M62,40.1c0,0,0,0.2-0.1,0.7c0,0.2,0,0.5-0.1,0.8c0,0.2,0,0.3,0,0.5c0,0.2-0.1,0.4-0.1,0.7
		c-0.1,0.5-0.2,1-0.3,1.6c-0.2,0.5-0.3,1.1-0.5,1.8c-0.2,0.6-0.5,1.3-0.7,1.9c-0.3,0.7-0.7,1.3-1,2.1c-0.4,0.7-0.9,1.4-1.4,2.1
		c-0.5,0.7-1.1,1.4-1.7,2c-1.2,1.3-2.7,2.5-4.4,3.6c-1.7,1-3.6,1.8-5.5,2.4c-2,0.5-4,0.7-6.2,0.7c-1.9-0.1-4.1-0.4-6-1.1
		c-1.9-0.7-3.7-1.5-5.2-2.6c-1.5-1.1-2.9-2.3-4-3.7c-0.6-0.6-1-1.4-1.5-2c-0.4-0.7-0.8-1.4-1.2-2c-0.3-0.7-0.6-1.3-0.8-2
		c-0.2-0.6-0.4-1.2-0.6-1.8c-0.1-0.6-0.3-1.1-0.4-1.6c-0.1-0.5-0.1-1-0.2-1.4c-0.1-0.9-0.1-1.5-0.1-2c0-0.5,0-0.7,0-0.7
		s0,0.2,0.1,0.7c0.1,0.5,0,1.1,0.2,2c0.1,0.4,0.2,0.9,0.3,1.4c0.1,0.5,0.3,1,0.5,1.6c0.2,0.6,0.4,1.1,0.7,1.8
		c0.3,0.6,0.6,1.2,0.9,1.9c0.4,0.6,0.8,1.3,1.2,1.9c0.5,0.6,1,1.3,1.6,1.8c1.1,1.2,2.5,2.3,4,3.2c1.5,0.9,3.2,1.6,5,2.1
		c1.8,0.5,3.6,0.6,5.6,0.6c1.8-0.1,3.7-0.4,5.4-1c1.7-0.6,3.3-1.4,4.7-2.4c1.4-1,2.6-2.1,3.6-3.3c0.5-0.6,0.9-1.2,1.3-1.8
		c0.4-0.6,0.7-1.2,1-1.8c0.3-0.6,0.6-1.2,0.8-1.8c0.2-0.6,0.4-1.1,0.5-1.7c0.1-0.5,0.2-1,0.3-1.5c0.1-0.4,0.1-0.8,0.1-1.2
		c0-0.2,0-0.4,0.1-0.5c0-0.2,0-0.4,0-0.5c0-0.3,0-0.6,0-0.8c0-0.5,0-0.7,0-0.7c0-1.1,0.9-2,2-2s2,0.9,2,2C62,40,62,40.1,62,40.1z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 40 40" to="-360 40 40" dur="0.6s" repeatCount="indefinite"/></path></svg>
    `;
 
    if(!element.classList.contains('active')){
        element.classList.add('active');
    }
    let svg_loader=element.querySelector('.svg-loader');
    if(!svg_loader){
      let div=document.createElement('div');
      div.classList.add('svg-loader');
      div.classList.add('row');
      div.classList.add('align-center');
      div.classList.add('g-10');
      div.innerHTML=loader;  
      
      element.appendChild(div);
    
    }
}
// wrap button raw text
function WrapBtnText(element) {
  // Go through all child nodes
  element.childNodes.forEach(node => {
    // Only target raw text nodes
    if (node.nodeType === Node.TEXT_NODE) {
      let text = node.textContent.trim();
      if (text.length > 0) {
        // Replace the text node with a span wrapping it
        let span = document.createElement('span');
        span.textContent = text;
        node.replaceWith(span);
      }
    }
  });
}
//  show ball loading
function BallLoad(){
    document.body.classList.add('loading');
}
//  hide ball loading
function HideBallLoad(){
   document.body.classList.remove('loading');
}
function IsJSONABLE(data){
    try{
      JSON.parse(data);
      return true;
    }catch{
        return false;
    }
}
// post request
async function PostRequest(event,element,callback=null){
  try{
      event.preventDefault();
 let inputs=element.querySelectorAll('.inp.required');
 
 
 let isEmpty = false;

 if(inputs){
    
    
    inputs.forEach((input)=>{
         let cont=input.closest('.cont');
        //  FIRST REMOVE EMPTY STATE
         if(cont){
         
        
            cont.classList.remove('empty');
           
           }else{
          
             input.classList.remove('empty');
            
           }
        //    CHECK FOR EMPTY INPUTS THAT ARE REQUIRED

        if(input.value.trim() == ''){
            isEmpty=true;
          
           
        if(cont){
            cont.classList.add('empty');
            
        }else{
              input.classList.add('empty');
        }
        }

    });
 }
 
 if(!isEmpty){
  WrapBtnText(element.querySelector('button'));
    element.querySelector('button').classList.add('active');
    BtnLoader(element.querySelector('button'));
    let inps=element.querySelectorAll('.input');
    let form=new FormData();
   
    inps.forEach((inp)=>{
       form.append(inp.name,inp.value);
    });
    // check for photos
    let files=element.querySelectorAll('input[type=file]');
    if(files){
        files.forEach((inp)=>{
            let file=inp.files[0];
            if(file){
                form.append(inp.name,file);
            }
        })
    }

    
    let response=await fetch(element.action,{
        method : 'POST',
        body : form
     });
     
     if(response.ok){
        let data=await response.text();
        if(IsJSONABLE(data)){
            let json=JSON.parse(data);
            CreateNotify(json.status,json.message);
        }else{
            CreateNotify('error',data);
        }
        if(callback !== null){
            callback(data,event);
        }
        element.querySelector('button').classList.remove('active');
     }else{
        CreateNotify('error','Internal Error: ' + response.status + ' Error');
          element.querySelector('button').classList.remove('active');
     }
     
 }
  }catch(error){
   
    CreateNotify('error',error.stack);
    element.querySelector('button').classList.remove('active');
  }
}

//  hide prompt
function HidePrompt(){
    let conts=document.querySelectorAll('.cont.required');
  if(conts){
      conts.forEach((cont)=>{
        let inp=cont.querySelector('.input');
        inp.addEventListener('focus',()=>{
            conts.forEach((required)=>{
                required.querySelector('.prompt').style.display="none";
            })
        })
    })
  }
}
function CreateNotify(status,message){
    let notifies=document.querySelectorAll('.notify');
    if(notifies){
        notifies.forEach((notify)=>{
            notify.remove();
        })
    }
  let section=document.createElement('section');
  section.classList.add('notify');
  section.classList.add(status);
  section.innerHTML=` <div class="row g-5 w-full p-5 body space-between">
            <div class="icon"></div>
            <div class="message m-right-auto">
            ${message}
        </div>
        <div onclick="HideNotify()" class="close c-dim pc-pointer m-bottom-auto">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="CurrentColor"></path>
</svg>

        </div>
        </div>
        <div class="footer display-none">
            <span></span>
        </div>`;
       
        section.addEventListener('touchstart',function(){
       ScheduledTimeout=setTimeout(()=>{
       clearTimeout(RemoveNotify);
       section.querySelector('.footer span').style.animationPlayState='paused';
       },500)

        });
        section.addEventListener('touchend',()=>{
            clearTimeout(ScheduledTimeout);
        })
       
        document.body.appendChild(section);
        let RemoveNotify=setTimeout(()=>{
            section.remove();
        },5000);
    
}
function HideNotify(){
  let notify= document.querySelector('.notify');
    if(notify){
     notify.remove();
    }
}
// get request
async function GetRequest(event,url,element=null,callback=null){
    try{
        event.preventDefault();
        if(element !== null){
            WrapBtnText(element);
            element.classList.add('active');
            BtnLoader(element);
        }
        let response=await fetch(url);
        if(response.ok){
           
            if(element !== null){
            element.classList.remove('active');
        }
             if(callback !== null){
                callback(await response.text(),event);
            }
        } else{
            CreateNotify('error',response.status + ' Error');
           if(element !== null){
            element.classList.remove('active');
        }
        }
    }catch(error){
        CreateNotify('error',error.stack);
       if(element !== null){
            element.classList.remove('active');
        }
    }
}
// search request
async function SearchRequest(event,element,url,result){
    event.preventDefault();
    if(element.value == ''){
        result.classList.add('display-none');
    }else{

       
        let response=await fetch(url);
        if(response.ok){
           
            result.innerHTML=await response.text();
             result.classList.remove('display-none');
        }else{
             result.classList.remove('display-none');
            result.innerHTML=` <a class="row no-u text-dim clip-10 align-center g-5 space-between p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM80,108a12,12,0,1,1,12,12A12,12,0,0,1,80,108Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,176,108Zm-1.08,64a8,8,0,1,1-13.84,8c-7.47-12.91-19.21-20-33.08-20s-25.61,7.1-33.08,20a8,8,0,1,1-13.84-8c10.29-17.79,27.39-28,46.92-28S164.63,154.2,174.92,172Z"></path></svg>
                 <span class="m-right-auto">${response.status} Error</span>
                   </a>`
        }
    }
    
}
// copy
function copy(data){
    if(navigator.clipboard.writeText(data)){
        CreateNotify('success','copied successfully');
    }
} 
// show popup
function PopUp(data=null){
    if(data !== null){
        document.querySelector('.popup .child').innerHTML=data;
    }
    document.querySelector('.popup').classList.add('active');
    document.body.classList.add('overflow-hidden');
    document.body.style.overflow="hidden";
}
// create notify 2
function CreateNotify2(status,message,data=null){
    let notify2=document.createElement('div');
    notify2.classList.add('notify2');
    let icon;
    let btn_text;
    let btn_function;
    if(data == null){
      btn_text='Understood';
      btn_function=function(){
        notify2.remove();
      }
    }else{
        btn_text = data.btn_text;
        btn_function=data.btn_function;
    }

    if(status == 'success'){
        icon=`<div class="c-green h-70 w-70 bg-green-transparent column justify-center circle">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z" fill="CurrentColor"></path>
</svg>

    </div>`;
    }else{
        icon=` <div class="c-red h-70 w-70 bg-red-transparent column justify-center circle">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="CurrentColor"></path>
</svg>


    </div>`;
    }
    notify2.innerHTML=`
    <section  style="z-index:90000" class="notify2 column p-10 bg-black-transparent justify-center pos-fixed top-0 left-0 bottom-0 right-0 z-index-9000">
<div class="w-full child align-center max-w-500 column br-10 p-10 g-10 bg-light">
    ${icon}
    <strong class="desc">${status}</strong>
    <span>${message}</span>
    <span></span>
<div class="w-full action-btn no-shrink br-10 clip-10 pointer no-select bg-primary primary-text p-10 h-50 row justify-center">${btn_text}</div>

</div>
</section>
    `;
    notify2.querySelector('.action-btn').onclick=function(){
        btn_function();
    }
     document.body.classList.add('overflow-hidden');
    document.body.appendChild(notify2);
}
// hide notify 2
function HideNotify2(){
    document.querySelector('.notify-2').remove();
    document.body.classList.remove('overflow-hidden');
}
// hide popup
function HidePopUp(callback=null){
   try{
     document.querySelector('.popup').classList.remove('active');
    document.body.classList.remove('overflow-hidden');
    document.body.style.overflow="auto";
    callback?.();
   }catch(error){
    CreateNotify('error',error.stack);
   }
}
// slideup
function SlideUp(content=null){
    if(content !== null){
        document.querySelector('.slideup .child').innerHTML=content;
    }
    document.querySelector('.slideup').classList.add('active');
    document.body.classList.add('overflow-hidden');
}
//  hide side up
function HideSlideUp(){
      document.querySelector('.slideup').classList.remove('active');
   document.body.classList.remove('overflow-hidden');
}
// stop propagation
function StopPropagation(event){
    event.stopPropagation();
}
// Infinite lloading
function InfiniteLoading(){
  
  let observer=new IntersectionObserver((entries)=>{
    entries.forEach(async (entry)=>{
        if(entry.isIntersecting){
          //  observer.unobserve(entry.target);
            let url=entry.target.dataset.url;
           
           
           let response=await fetch(url);
           if(response.ok){
            let data=await response.text();
         entry.target.outerHTML=data;
        
           //entry.target.remove();
        InfiniteLoading();
           }
        }
    })
  })
//   observe
let element=document.querySelector('.infinite-loading');
if(element){
    observer.observe(element);
}
}
// preview photo
function PreviewPhoto(element,label){
    let file=element.files[0];
    
    if(file){
        label.children[0].style.display='none';
        label.style.backgroundImage=`url('${URL.createObjectURL(file)}')`;
        label.classList.remove('bg');

    }else{
        label.style.backgroundImage='';
        label.children[0].style.display='flex';
         label.classList.add('bg');
    }

}
// hide loading
function HideLoading(){
    let loading=document.querySelector(".loading");
    if(loading){
        loading.style.display='none'
    }
   

}
// set vh
function SetWindowHeight(){
    let height=window.innerHeight;
    document.body.style.minHeight=height + 'px';
}
// remove empty class from inputs and conts

function UnEmpty(){
    let inps=document.querySelectorAll('.inp.required');
 //   alert(10)
    if(inps){
        inps.forEach((inp)=>{
           inp.addEventListener('focus',()=>{
             let cont=inp.closest('.cont');
            if(cont){
                cont.classList.remove('empty');
            }else{
                inp.classList.remove('empty');
            }
           })
        })
    }
}

// single page navigation
async function spa(event,url,element=null){
  try{
      // select main 
    let main=document.querySelector('main');
    //    add active class to the bottom nav
    if(element !== null){
        let navs=document.querySelectorAll('footer .nav');
        navs.forEach((nav)=>{
            nav.classList.remove('active');
        })
            element.classList.add('active');
        }
        SpaLoader();

        // fetch page
        let response=await fetch(url);
        if(response.ok){
            let data=await response.text();
            // create a div and put fetched data in it to be able to select
            let div=document.createElement('div');
            div.innerHTML=data;
            // remove old link with .css class if exists
            let old_css=document.querySelectorAll('link.css');
            if(old_css){
                old_css.forEach((css)=>{
                   css.remove();
                });
            }
            // remove old styles with .css class if exists
            let old_styles=document.querySelectorAll('style.css');
            if(old_styles){
                old_styles.forEach((style)=>{
                    style.remove();
                });
            }
            //  attach page link with css class if exists
            let new_css=div.querySelectorAll('link.css');
            if(new_css){
                new_css.forEach(async (css)=>{
                  await new Promise((resolve)=>{
                      let link=document.createElement('link');
                    link.classList.add('css');
                    link.href=css.href;
                    link.rel='stylesheet';
                    document.head.appendChild(link);
                    return resolve();
                  })
                })
            }
            //  attach page styles with .css tag if exists
            let new_styles=div.querySelectorAll('style.css');
            if(new_styles){
               new_styles.forEach(async (css)=>{
                await new Promise((resolve)=>{
                    let style=document.createElement('style');
                    style.classList.add('css');
                    style.textContent=css.textContent;
                    document.head.appendChild(style);
                    return resolve();
                })
               })
            }
            // redeclare my func to be an empty object
            window.MyFunc={};
            // attach new header
            await new Promise((resolve)=>{
                document.querySelector('header').outerHTML=div.querySelector('header').outerHTML;
                return resolve();
            })
            // attach new main
            await new Promise((resolve)=>{
                main.className=div.querySelector('main').className;
                main.innerHTML=div.querySelector('main').innerHTML;
                return resolve();
            })
            
            // remove old js if exists
            let old_js=document.querySelectorAll('script.js');
            
            if(old_js){
                old_js.forEach((js)=>{
                    js.remove();
                })
            }

            // attach new js if exists
            let new_js=div.querySelectorAll('script.js');
            if(new_js){
                new_js.forEach((js)=>{
                    let script=document.createElement('script');
                    script.classList.add('js');
                    if(js.src){
                        script.src=js.src;
                    }else{
                        script.textContent=js.textContent;
                    }
                    document.body.appendChild(script);
                })
            }
            
            // push state
            history.pushState({},'',url);
            document.title=div.querySelector('title').innerText;
            
            
        }else{
            main.innerHTML=` <section class="column grid-full m-y-auto align-center no-select m-x-auto g-5">
        <div class="spa-error h-100 w-100"></div>
        <span class="desc bold  c-primary">${response.status} Error</span>
        <span>Oops! an unknown error occured</span>

    </section>`;
        }
  }catch(error){
    CreateNotify('error',error.stack);
  }
}
// toggle nav group
function ToggleNavGroup(element){
    let group=element.closest('.group');
    if(group.classList.contains('active')){
 group.classList.remove('active');
    }else{
         group.classList.add('active');
    }
   
}
// toggle nav
function ToggleNav(){
    document.querySelector('nav').classList.add('active');
}
// Hide nav
function HideNav(){
    document.querySelector('nav').classList.remove('active');
}
// auto fill
function AutoFill(val,input,element){
   // alert(10)
   input.value=val;
   if(element !== null){
    element.classList.add('active');
   }


}
// calling functions


window.addEventListener('load',function(){
    HideLoading();
    SetWindowHeight();
    UnEmpty();
    
})
