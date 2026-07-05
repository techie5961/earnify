@extends('layout.users.index')
@section('title')
    Homepage
@endsection
@section('links')
    <link rel="preload" href="{{ asset('banners/IMG_7579-compressed.jpeg') }}" fetchpriority="high" as="image">
@endsection
@section('css')
  <style class="css">
    main{
      padding: 0;

    }
    .hero{
      width:100%;
      min-height: 100vh;
      background:var(--bg);
      background-image:url('{{ asset('banners/IMG_7579-compressed.jpeg') }}');
      background-size:cover;
      background-position:center;
      position:relative;
      display:flex;
    }
        .hero::before{
          content:'';
          position: absolute;
          inset:0;
          z-index:100;
          background:var(--rgb-07)
        }
        .hero > section{
          position:relative;
          z-index:200;
          display:flex;
          flex-direction: column;
          align-items:center;
          gap:10px;
          width:100%;
          padding:20px;
          text-align:center;
          padding-bottom:0;
        }
            .hero > section::after{
              content:'';
              position:absolute;
              bottom:0;
              width:100%;
              height:50px;
              left:0;
              right:0;
              background:linear-gradient(to top,var(--bg),transparent);
              z-index:600;

            }

            .hero > .title{
              font-family:anton;
              font-size:clamp(2.5rem,5vw,5rem);
              font-weight:400;
              color:var(--secondary);
            }

           .hero .title-bg{
              background:var(--secondary);
              width:fit-content;
              color:var(--bg);
              /* transform:rotate(-3deg); */
              overflow:hidden;
              border:2px solid var(--primary-darker);
           }
               .hero .title-bg  .title{
                  color:var(--bg);
                   padding:2px 5px;
                   color:var(--primary-darker)
                  }
            
           .hero .button{
              padding:10px 40px;
              background:var(--secondary);
              color:var(--primary-darker);
              width:fit-content;
              border-radius:5px;
              margin:15px 7px;
              font-family:anton;
              user-select:none;
              -webkit-user-select: none;
              cursor: pointer;
              margin-bottom:0;
              font-size:1.2rem !important;
              border:1px solid var(--secondary) !important;
            }
            .explore{
              padding:10px 40px;
              background:var(--rgt-01);
              color:var(--rgt-10);
              width:fit-content;
              border:1px solid var(--rgt-10);
              border-radius:5px;
              margin:15px 7px;
              font-family:anton;
              user-select:none;
              -webkit-user-select: none;
              cursor: pointer;
              margin-bottom:0;
              font-size:1.2rem !important;
              backdrop-filter: blur(10px);
              -webkit-backdrop-filter: blur(5px);

            }

            .hero .img{
              width:90%;
              margin-top:auto;
              max-width:500px;
              pointer-events: none;
              user-select:none;
              -webkit-user-select:none;
            }
       
    @keyframes scale-out{
      0%{
        transform:scaleX(0);
      },
      100%{
        transform:scaleX(1)
      }
    }
    .section2{
      width:100%;
      padding:40px 20px;
      background:hsl(var(--primary-hsl),50%,0%);
      text-align:center;
      display:flex;
      flex-direction: column;
      align-items: center;
      padding-top:0;
    }
       .section2 .title-bg{
          background:hsl(var(--primary-hsl),50%,70%);
          border-color:var(--bg)
       }
         .section2 .title-bg   .title{
              color:var(--bg)
            }
    .title{
      font-size:clamp(2.5rem,5vw,5rem);
      font-family:anton;
      font-weight:400;
      color:hsl(var(--primary-hsl),50%,85%);
      line-height:clamp(2.5rem,5vw,5rem);
    }
          .title.endless{
            color:hsla(calc(var(--primary-hsl) + 30),100%,50%,0.9);
          }
    .title.observe{
      overflow:hidden;
      
    }
    .title.observe span{
      transform: translateY(100%);
      display:flex;
      transition: all 1s ease;
    }
    .title.observe.active span{
      transform:translateY(0)
    }

    .title-bg{
              background:var(--secondary-light);
              width:fit-content;
              color:var(--bg);
              /* transform:rotate(-3deg); */
              overflow:hidden;
              border:2px solid var(--primary-darker);
    }
             
                .title-bg .title{
                  color:var(--bg);
                   padding:2px 5px;
                   color:var(--primary-darker)
                  }

                  
            
  .section{
    width:100%;
    padding:20px;
    display:flex;
    flex-direction: column;
    gap:10px;
    padding-bottom:40px;
  }
      .section.faqs{
          display:flex;
          flex-direction:column;
          gap:10px;
        }
    
        .title span{
          color:var(--secondary-lighter);
          background:linear-gradient(to right,hsl(var(--primary-hsl),40%,50%),hsl(var(--primary-hsl),100%,50%));
          background-clip:text;
          -webkit-background-clip:text;
          -webkit-text-fill-color:transparent;
        }
      .title-bg{
        background:hsl(var(--primary-hsl),100%,50%);
        border:none;
      }
         .section .title-bg title{
        color:var(--bg);

          }

      .capsule{
        background:var(--primary-02);
        border:1px solid hsl(var(--primary-hsl),100%,50%);
        color:hsl(var(--primary-hsl),100%,50%);
        border-radius:1000px;
        user-select:none;
        -webkit-user-select:none;
        padding:5px 15px;
        width:fit-content;
        font-size:0.7rem;
        font-weight:600;
      }
          .capsule.advert-hub{
            border-color:hsl(calc(var(--secondary-hsl) + 30),100%,50%);
            color:hsl(calc(var(--secondary-hsl) + 30),100%,50%);
            background:hsla(calc(var(--secondary-hsl) + 30),100%,50%,0.1)
          }

          .capsule.weekly-support{
            border:1px solid hsl(calc(var(--primary-hsl) + 30),100%,50%);
            color:hsl(calc(var(--primary-hsl) + 30),100%,50%);
          }


      .section-title{
        font-size:1.7rem;
        font-weight:900;
      }

      .info-card{
        background:var(--rgt-01);
        width:clamp(200px,100%,500px);
        padding:15px;
        border-left:4px solid hsl(calc(var(--secondary-hsl) + 30),100%,60%);
        border-radius:5px;
      }
         .info-card span{
            color:hsl(calc(var(--secondary-hsl) + 30),100%,60%);
            font-weight:600;
            opacity:0.8
          }

          .info-card > div{
            font-size:1.2rem;
            font-weight:900;
          }
             .info-card > div > span{
                color:hsl(calc(var(--secondary-hsl) + 30),100%,60%);
              }

          .info-card.weekly-support{
            border-color:hsl(calc(var(--primary-hsl) + 30),100%,50%);
          }
            .info-card.weekly-support  > span{
                color:hsl(calc(var(--primary-hsl) + 30),100%,50%);

              }

                  
                   .info-card.weekly-support > div > span{
                      color:hsl(calc(var(--primary-hsl) + 30),100%,50%);
                      font-size:1rem;
                    }
            
      .baton{
        padding:10px 20px;
        background:var(--rgt-01);
        border:1px solid var(--rgt-02);
        border-radius:10px;
        font-weight:900;
        user-select:none;
        -webkit-user-select: none;

      }

  .banner{
    width:clamp(200px,100%,700px);
    overflow:hidden;
  
  }

     .banner img{
        max-width:100%;
        width:100%;
        border-radius:10px;
        pointer-events:none;
        user-select:none;
        -webkit-user-select:none;
         
         
        
      }


 
 

  .primary-gradient{
    background:linear-gradient(to right,hsl(var(--primary-hsl),100%,50%),hsl(calc(var(--secondary-hsl) + 30),100%,60%));
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color:transparent;
  }
     .primary-gradient.advert-hub{
        background:linear-gradient(to right,hsl(calc(var(--secondary-hsl) + 30),100%,50%),hsl(var(--secondary-hsl),100%,50%));
        background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color:transparent;
      }
     .primary-gradient.weekly-support{
         background:linear-gradient(to right,hsl(calc(var(--primary-hsl) + 30),100%,50%),hsl(calc(var(--primary-hsl) + 30),100%,50%));
        background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color:transparent;
      }

  .analytics{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: center;
    /* gap:15px; */
  }
         .analytics > .column{
            display:flex;
            flex-direction:column;
            gap:0px;
            align-items:center;
             color:hsl(calc(var(--secondary-hsl) + 10),100%,50%);
               
              .analytics > .column  > .desc{
                      line-height:1.2rem;
                      font-size: 1.2rem;
                      color:hsl(calc(var(--primary-hsl)),50%,60%);
                     }
          }
  .card{
    cursor: pointer;
    transition:all 0.5s ease;
  }
     .card:hover{

        border:1px solid var(--primary) !important;
         box-shadow:0 0 10px var(--primary-06);
         transform:translateY(-3px)

      
      }
  .faq{
    width:100%;
    display:flex;
    flex-direction:column;
    gap:10px;
    background: var(--bg-light);
    border:1px solid var(--rgt-01);
    border-radius:10px;
    padding:20px;
  }
           .faq .question{
              font-size:1.2rem;
              font-weight:600;
              gap:20px;
           }

                    .faq .question  > i{
                        height:40px;
                        width:40px;
                        border:1px solid var(--rgt-005);
                        background:var(--rgt-002);
                        flex-shrink: 0;
                        display:flex;
                        flex-direction: column;
                        gap:10px;
                        align-items: center;
                        justify-content: center;
                        border-radius:50%;
                        transition:all 0.5s linear;
                      }

           .faq .answer{
              opacity:0.7;
              display:none;
            }

              
                      .faq.active .answer{
                        display:flex;
                      }
                      
                      .faq.active .question > i{
                        transform:rotate(45deg);
                        background:var(--primary)
                      }

  div.ready{
    background-color:var(--bg-light);
    padding:30px;
    border-radius:20px;
    background-image:url('{{ asset('banners/IMG_7581-compressed.jpeg') }}');
    background-size:cover;
    background-position:center;
    position:relative;
    width:clamp(200px,100%,500px);
    user-select:none;
    -webkit-user-select:none;
    gap:20px;
  }
            div.ready .desc{
              font-size:2rem;
              text-shadow:0 0 10px var(--rgt-02)
            }

            div.ready::before{
              content:'';
              position:absolute;
              inset: 0;
              background:rgba(0,0,0,0.4);
              z-index:50;
            }

           div.ready  > *{
              position: relative;
              z-index:100;
            }

           div.ready  .start-btn{
              width:100%;
              background:white;
              border-radius:10px;
              color:var(--primary-darker);
              display:flex;
              align-items:center;
              justify-content:center;
              font-weight:600;
              cursor:pointer;
            }
  
  .to-top{
    height: 50px;
    width:50px;
    background:var(--primary);
    color:var(--primary-text);
    cursor:pointer;
    border-radius:50%;
    position:fixed;
    bottom:20px;
    right:20px;
    z-index:1000;
    display:flex;
    flex-direction: column;
    align-items:center;
    justify-content: center;
    box-shadow: 0 0 10px rgba(255,255,255,0.2);
    display:none;
  }
            .to-top.active{
                display:flex;
              }

  /* media query (pc) */
  @media(min-width:800px){
    .section{
      width:100%;
      flex-direction:row;
      gap:20px;
      padding:20px 10vw;
    }
            .section:nth-of-type(even) .banner{
                    order:2;

          }
          
    }
  </style>
@endsection
@section('main')
<section class="to-top">
  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13 12V20H11V12H4L12 4L20 12H13Z"></path></svg>

</section>
   <section class="w-full column">
   <section class="hero">
    <section>
    <div class="column align-center g-2">
        <div data-class="active" class="title observe"> <span>FREAKING LUCRATIVE</span></div>
      <div class="title-bg">
        <span class="title">EARNINGS + LOANS</span>
      </div>
    </div>
    <div class="m-top-20 opacity-09">
      Take control of your future with EARNIFY:
Shatter financial limits and embrace your inner boss with every instant payout and free loan.
    </div>
    <div class="row align-center gf-10 w-full justify-center">
    <button onclick="window.location.href='{{ url('register') }}'" class="button"> Join Us </button>
    <button onclick="ScrollIntoView()" class="explore">Explore </button>

    </div>
    <img class="img" src="{{ asset('banners/IMG_7553.png') }}" alt="Banner">
    </section>
   </section>
   {{-- new section --}}
   <section class="section2">
    {{-- new --}}
   <strong class="title">
    EARN N100K - N200K
   </strong>
   {{-- new --}}
    <div class="title-bg">
      <strong class="title"> WEEKLY</strong>
    </div>
    {{-- new --}}
   <strong class="title">
    CREATOR, DRIVER OR ARTIST
   </strong>
   <span>
    Earnify transforms your daily activities into money. It's not just activities, It's money.
   </span>
   </section>
   {{-- new --}}
<div class="title endless m-x-auto observe">
  <span>Endless ways to</span>
</div>
<div class="title-bg endless m-x-auto">
  <span class="title">Earn</span>
</div>
   {{-- new section --}}
   <section class="section">

{{-- banner --}}
<div class="banner">
  <img class="observe" src="{{ asset('banners/IMG_7632.jpeg') }}" alt="Banner">
</div>
{{-- new group --}}
<div class="column g-10 w-full">
{{-- capsule --}}
<div class="capsule">MEGA GAMING RELEASE</div>
{{-- new --}}
  <strong class="section-title">
                    Introducing Earnify <br>
                    <span class="primary-gradient">GAMING & FUN</span>
  </strong>
  {{-- new --}}
  <span>
       Just by playing games on earnify. It's isn't just about finance—it's a fun tool. Join the excitement with our gaming feature where you can enjoy your favorite childhood board game and earn real money while playing.
          
  </span>
  {{-- new --}}
  <div class="info-card">
    <span>GUARANTEED REWARDS</span>
    <div>WIN OVER <span>&#8358;10k - &#8358;20k</span></div>
  </div>
</div>
   </section>
   {{-- new section --}}
   <section class="section">

{{-- banner --}}
<div class="banner">
  <img class="observe advert-hub" src="{{ asset('banners/IMG_7607.jpeg') }}" alt="Banner">
</div>
{{-- new group --}}
<div class="column g-10 w-full">
{{-- capsule --}}
<div class="capsule advert-hub">ADVERT HUB</div>
{{-- new --}}
  <strong class="section-title">
                    Showcase Your <br>
                    <span class="primary-gradient advert-hub">Product & Content</span>
  </strong>
  {{-- new --}}
  <span>
                        Create an <span class="font-weight-900" style="color:hsl(var(--primary-hsl),100%,50%)">Earnify</span> account today to begin promoting your content, or product across our network of premium websites. Reach thousands of highly engaged active users instantly.
       
  </span>
  {{-- new --}}
 <div class="row g-10 align-center">
  <div class="baton">No Risk</div>
  <div class="baton">No Stress</div>
 </div>
</div>
   </section>
  {{-- new section --}}
   <section class="section">

{{-- banner --}}
<div class="banner">
  <img class="observe" src="{{ asset('banners/IMG_7608.jpeg') }}" alt="Banner">
</div>
{{-- new group --}}
<div class="column g-10 w-full">
{{-- capsule --}}
<div class="capsule weekly-support">COMMUNITY CARE</div>
{{-- new --}}
  <strong class="section-title">
                    Introducing Earnify <br>
                    <span class="primary-gradient weekly-support">WEEKLY SUPPORT</span>
  </strong>
  {{-- new --}}
  <span>
                    Are you a widow or a widower seeking for help? Are you from a poor family or poor background with no help?
          
  </span>
  <span class="opacity-07">
                    Don't worry, as far as Earnify is concerned, you're rich. Join Earnify now and stand a chance to receive valuable disbursements directly to your account dynamically.

  </span>
  {{-- new --}}
  <div class="info-card weekly-support">
    <span>TARGET RANGE ALLOWANCE</span>
    <div>&#8358;20k to &#8358;40k <span>WEEKLY</span></div>
  </div>
</div>
   </section>

     {{-- new section --}}
   <section class="section">

{{-- banner --}}
<div class="banner">
  <img class="observe" src="{{ asset('banners/IMG_7604.jpeg') }}" alt="Banner">
</div>
{{-- new group --}}
<div class="column g-10 w-full">
{{-- capsule --}}
<div class="capsule">COMMUNITY CARE</div>
{{-- new --}}
  <strong class="section-title">
                   Learn Anytime, Anywhere&mdash;<br>
                    <span class="primary-gradient">On Any Device</span>
  </strong>
  {{-- new --}}
  <span>
                    Whether you're at home, at work, or on the go, access Earnify platforms directly from your mobile browser or laptop. Enjoy a seamless, interactive experience that fits perfectly into your custom schedule—<span class="font-weight-600">no complex native app install required</span>.
          
  </span>
  <span class="opacity-07 row g-5">
    <span style="color:hsl(calc(var(--primary-hsl) + 30),100%,50%);font-size:1rem;">
      <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

    </span>
Fast web engine, highly compressed performance asset framework
  </span>
   <span class="opacity-07 row g-5">
     <span style="color:hsl(calc(var(--primary-hsl) + 30),100%,50%);font-size:1rem;">
      <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

    </span>
Multi-tier encryption protects connection keys globally
  </span>
</div>
 
   </section>
{{-- new section --}}
   <section class="section analytics">
    {{-- new column --}}
    <div class="column align-center g-5">
      <strong class="font-size-3 font-weight-900"><span class="count" data-increment="10" data-current="10" data-min="10" data-max="150">10</span>k+</strong>
      <span class="desc font-weight-900">Registered Users</span>
    </div>
    {{-- new column --}}
    <div class="column align-center g-5">
      <strong class="font-size-3 font-weight-900">&#8358;<span class="count" data-increment="10" data-current="10" data-min="10" data-max="300">10</span>M+</strong>
      <span class="desc font-weight-900">Paid Out</span>
    </div>
      {{-- new column --}}
    <div class="column align-center g-5">
      <strong class="font-size-3 font-weight-900">&#8358;<span class="count" data-increment="1" data-current="1" data-min="1" data-max="15">1</span>M+</strong>
      <span class="desc font-weight-900">Loans Given</span>
    </div>
   </section>
{{-- new --}}
<div class="title endless m-x-auto observe">
  <span>What our Users</span>
</div>
<div class="title-bg endless m-x-auto">
  <span class="title">Say</span>
</div>
<span class="p-20 text-center">Thousands of active earners trust Earnify. Read genuine experiences from our family.</span>
{{-- section --}}
<section style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr))" class="section review">
{{-- new card --}}
<div style="border:1px solid var(--rgt-01)" onclick="void(0)" class="card bg-light no-select w-full column br-10 p-20 g-10">
{{-- new row --}}
<div style="color:orange;" class="row w-full g-5 align-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>

</div>
<span>
  “Cube game changed my life! I earned ₦15k in my first week just playing games. The weekly support is legit, received ₦40k directly. Best decision ever!”
</span>

{{-- new row --}}
<div class="row g-10 align-center">
  {{-- icon --}}
  <div class="h-40 w-40 no-shrink bold font-1 circle bg-primary primary-text column align-center justify-center no-select">
    A
  </div>
  {{-- new column --}}
  <div class="column g-2">
    <strong class="font-size-1">Amara O.</strong>
    <span class="opacity-07 font-size-07">Lagos, Nigeria</span>
  </div>
</div>
  <div style="background:hsla(calc(var(--primary-hsl) + 30),100%,50%,0.2);color:hsl(calc(var(--primary-hsl) + 30),100%,50%);font-weight:600;font-size:0.7rem;padding:4px 10px;" class="w-fit br-1000 row align-center g-10">
    Verified Winner
  </div>

</div>
{{-- new card --}}
<div style="border:1px solid var(--rgt-01)" onclick="void(0)" class="card bg-light no-select w-full column br-10 p-20 g-10">
{{-- new row --}}
<div style="color:orange;" class="row w-full g-5 align-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>

</div>
<span>
  “I was skeptical about online earning but Earnify is transparent. My widow allowance came through exactly as promised. The support team is responsive.”
</span>

{{-- new row --}}
<div class="row g-10 align-center">
  {{-- icon --}}
  <div class="h-40 w-40 no-shrink bold font-1 circle bg-primary primary-text column align-center justify-center no-select">
    G
  </div>
  {{-- new column --}}
  <div class="column g-2">
    <strong class="font-size-1">Grace M.</strong>
    <span class="opacity-07 font-size-07">Douala, Cameroon</span>
  </div>
</div>
  <div style="background:hsla(calc(var(--primary-hsl) + 30),100%,50%,0.2);color:hsl(calc(var(--primary-hsl) + 30),100%,50%);font-weight:600;font-size:0.7rem;padding:4px 10px;" class="w-fit br-1000 row align-center g-10">
    Weekly Support
  </div>

</div>
{{-- new card --}}
<div style="border:1px solid var(--rgt-01)" onclick="void(0)" class="card bg-light no-select w-full column br-10 p-20 g-10">
{{-- new row --}}
<div style="color:orange;" class="row w-full g-5 align-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792V14.6564ZM11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
</div>
<span>
“Great platform, fast payouts and the loan pool helped me start my small business. The UI is smooth and the agent rewards are huge boost.”</span>

{{-- new row --}}
<div class="row g-10 align-center">
  {{-- icon --}}
  <div class="h-40 w-40 no-shrink bold font-1 circle bg-primary primary-text column align-center justify-center no-select">
    G
  </div>
  {{-- new column --}}
  <div class="column g-2">
    <strong class="font-size-1">Chidi E.</strong>
    <span class="opacity-07 font-size-07">Abuja, NG</span>
  </div>
</div>
  <div style="background:hsla(calc(var(--primary-hsl) + 30),100%,50%,0.2);color:hsl(calc(var(--primary-hsl) + 30),100%,50%);font-weight:600;font-size:0.7rem;padding:4px 10px;" class="w-fit br-1000 row align-center g-10">
   Agent Partner
  </div>

</div>

{{-- new card --}}
<div style="border:1px solid var(--rgt-01)" onclick="void(0)" class="card bg-light no-select w-full column br-10 p-20 g-10">
{{-- new row --}}
<div style="color:orange;" class="row w-full g-5 align-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
</div>
<span>
“I’ve earned over ₦200k total through referrals & gameplay. Earnify is more than a platform — it’s a movement. The CAC registration gave me peace of mind.”
</span>
{{-- new row --}}
<div class="row g-10 align-center">
  {{-- icon --}}
  <div class="h-40 w-40 no-shrink bold font-1 circle bg-primary primary-text column align-center justify-center no-select">
    F
  </div>
  {{-- new column --}}
  <div class="column g-2">
    <strong class="font-size-1">Faith A.</strong>
    <span class="opacity-07 font-size-07">Port Harcourt</span>
  </div>
</div>
  <div style="background:hsla(calc(var(--primary-hsl) + 30),100%,50%,0.2);color:hsl(calc(var(--primary-hsl) + 30),100%,50%);font-weight:600;font-size:0.7rem;padding:4px 10px;" class="w-fit br-1000 row align-center g-10">
   Earner
  </div>

</div>

{{-- new card --}}
<div style="border:1px solid var(--rgt-01)" onclick="void(0)" class="card bg-light no-select w-full column br-10 p-20 g-10">
{{-- new row --}}
<div style="color:orange;" class="row w-full g-5 align-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
</div>
<span>
“Switching to Cameroon system was seamless. Received 5,800 XAF bonus immediately. The support and weekly distribution is real!”
</span>
{{-- new row --}}
<div class="row g-10 align-center">
  {{-- icon --}}
  <div class="h-40 w-40 no-shrink bold font-1 circle bg-primary primary-text column align-center justify-center no-select">
    S
  </div>
  {{-- new column --}}
  <div class="column g-2">
    <strong class="font-size-1">Samuel M.</strong>
    <span class="opacity-07 font-size-07">Yaoundé, CM</span>
  </div>
</div>
  <div style="background:hsla(calc(var(--primary-hsl) + 30),100%,50%,0.2);color:hsl(calc(var(--primary-hsl) + 30),100%,50%);font-weight:600;font-size:0.7rem;padding:4px 10px;" class="w-fit br-1000 row align-center g-10">
   Verified Member
  </div>

</div>

{{-- new card --}}
<div style="border:1px solid var(--rgt-01)" onclick="void(0)" class="card bg-light no-select w-full column br-10 p-20 g-10">
{{-- new row --}}
<div style="color:orange;" class="row w-full g-5 align-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z"></path></svg>
</div>
<span>
“I love the transparency with the free loan pool. I was able to borrow ₦500k for my retail shop and repay flexibly. Thank you Earnify team!”
</span>
{{-- new row --}}
<div class="row g-10 align-center">
  {{-- icon --}}
  <div class="h-40 w-40 no-shrink bold font-1 circle bg-primary primary-text column align-center justify-center no-select">
    T
  </div>
  {{-- new column --}}
  <div class="column g-2">
    <strong class="font-size-1">Tunde K.</strong>
    <span class="opacity-07 font-size-07">Ibadan</span>
  </div>
</div>
  <div style="background:hsla(calc(var(--primary-hsl) + 30),100%,50%,0.2);color:hsl(calc(var(--primary-hsl) + 30),100%,50%);font-weight:600;font-size:0.7rem;padding:4px 10px;" class="w-fit br-1000 row align-center g-10">
   Loan Beneficiary
  </div>

</div>
</section>

 {{-- new section --}}
   <section class="section">

{{-- banner --}}
<div class="banner">
  <img class="observe advert-hub" src="{{ asset('banners/pixellab_2026-06-05T09-53-01Z-compressed.jpeg') }}" alt="Banner">
</div>
{{-- new group --}}
<div class="column g-10 w-full">
{{-- capsule --}}
<div class="capsule advert-hub">REGULATED & VERIFIED</div>
{{-- new --}}
  <strong class="section-title">
                    Official Certified <br>
                    <span class="primary-gradient advert-hub">& Corporate Registered</span>
  </strong>
  {{-- new --}}
  <div class="p-left-10 row align-center g-10" style="border-left:4px solid var(--secondary)"><i class="opacity-07">"This is more than a badge — it is proof."</i></div>
  {{-- new --}}
  <span>
<span class="font-weight-600">Earnify Ventures</span>
 is now officially certified and fully incorporated under the
  <span class="font-weight-600" style="border-bottom:1px solid var(--secondary)">Federal Republic of Nigeria</span>. We comply fully with corporate affairs laws to secure operations long-term.
<br><br>
<span style="border:1px solid var(--rgt-01);color:var(--rgt-07);width:clamp(200px,100%,500px;)" class="bg-light br-10 p-15 row">
  Corporate Integrity Assured • CAC Active Business Identifier Verified
  
</span>        
  </span>

</div>
   </section>

   {{-- new --}}
<div class="title endless m-x-auto observe">
  <span>Frequently Asked</span>
</div>
<div class="title-bg endless m-x-auto">
  <span class="title">Questions</span>
</div>
{{-- new section --}}
<section class="section faqs">
{{-- faq --}}
<div class="faq">
  {{-- new row --}}
  <div class="row w-full question g-10 space-between">
    {{-- question --}}
    <div>
      How do I start earning on Earnify?
    </div>
    <i onclick="this.closest('.faq').classList.toggle('active')">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg>

    </i>
  </div>
  {{-- answer --}}
  <div class="answer">
    Simply sign up, choose your region (Nigeria or Cameroon), Purchase an active coupon code from our verified influencers to unlock instant bonus and start playing games, performing tasks, Maketplace or invite friends to earn agent rewards. You'll also get access to weekly support allowance.

  </div>
</div>

{{-- faq --}}
<div class="faq">
  {{-- new row --}}
  <div class="row w-full question g-10 space-between">
    {{-- question --}}
    <div>
     What is the Earnify game reward?
    </div>
    <i onclick="this.closest('.faq').classList.toggle('active')">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg>

    </i>
  </div>
  {{-- answer --}}
  <div class="answer">
Earnify Games are interactive games on Earnify. Every player who participates has guaranteed win amounts based on performance. It's designed for fun and real monetary returns.

  </div>
</div>

{{-- faq --}}
<div class="faq">
  {{-- new row --}}
  <div class="row w-full question g-10 space-between">
    {{-- question --}}
    <div>
     Can I really receive a free loan from the pool?
    </div>
    <i onclick="this.closest('.faq').classList.toggle('active')">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg>

    </i>
  </div>
  {{-- answer --}}
  <div class="answer">
Yes! The Earnify Free Loan Pool provides qualified members access to loans up to ₦500,000 (or 200,000 XAF) with zero interest and flexible repayment terms. Conditions apply based on activity level and loyalty.
  </div>
</div>
{{-- faq --}}
<div class="faq">
  {{-- new row --}}
  <div class="row w-full question g-10 space-between">
    {{-- question --}}
    <div>
    What payment methods are accepted?
    </div>
    <i onclick="this.closest('.faq').classList.toggle('active')">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg>

    </i>
  </div>
  {{-- answer --}}
  <div class="answer">
We support bank transfers, mobile money (for Cameroon), and secure in-app wallets. Withdrawals are processed within 24 hours on business days, and you can track your transaction history directly on your dashboard.  </div>
</div>
</section>

{{-- new section --}}
<section class="section align-center justify-center column">
<div class="column ready g-10 align-center text-center">
  <strong class="desc">Ready to start earning</strong>
  <span>Get your Unique coupon code, Join Earnify &mdash; Start earning today</span>
  <div onclick="window.location.href='{{ url('register') }}'" class="h-50 start-btn w-full br-1000">
    Start Earning Now
  </div>
</div>
</section>
   </section>
@endsection
@push('js')
    <script class="js">
       let observer=new IntersectionObserver(function(entries){
        entries.forEach((entry)=>{
          let class_name=entry.target.dataset.class || 'active';
          if(entry.isIntersecting){
            if(class_name != 'active'){
              class_name.split(' ').forEach((cls)=>{
                entry.target.classList.add(cls);
              })
            }else{
              entry.target.classList.add(class_name);
            }
            
          }else{
             if(class_name != 'active'){
              class_name.split(' ').forEach((cls)=>{
                entry.target.classList.remove(cls);
              })
            }else{
              entry.target.classList.remove(class_name);
            }
            
          }
        })
      },{
        threshold : 0.1
      });
      
         window.addEventListener('load',()=>{
        document.querySelector('.hero').style.minHeight=window.innerHeight - document.querySelector('header').offsetHeight + 'px'
      document.querySelectorAll('.observe').forEach((data)=>{
        observer.observe(data);
      });
      });
try {
    let observe_count = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                let element = entry.target;
                let current = parseInt(element.dataset.current);
                let max = parseInt(element.dataset.max);
                let increment = parseInt(element.dataset.increment);
                
                let interval = setInterval(() => {
                    try {
                        if (current >= max) {
                            clearInterval(interval);
                            return;
                        }
                        current += increment;
                        element.innerHTML = current;
                        element.dataset.current = current;
                    } catch(error) {
                        console.error(error);
                        clearInterval(interval);
                    }
                }, 100);
                
                // Unobserve to prevent multiple intervals
                observe_count.unobserve(element);
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.count').forEach((data) => {
        observe_count.observe(data);
    });
} catch(error) {
    console.error(error);
}

function ScrollIntoView(){
  window.scrollTo({
    top : document.querySelector('.endless').getBoundingClientRect().top,
    left:0,
    behavior : 'smooth'
  });
}

window.addEventListener('scroll',()=>{
  if(window.scrollY > 200){
    document.querySelector('.to-top').classList.add('active');
  }else{
    document.querySelector('.to-top').classList.remove('active');

  }
});

document.querySelector('.to-top').addEventListener('touchstart',()=>{
  window.scrollTo({
    top : 0,
    left : 0,
    behavior : 'smooth'
  })
})

     
     
    </script>
@endpush