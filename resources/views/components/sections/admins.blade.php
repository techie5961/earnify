@isset($css_var)
    <style class="css">
        :root{
             /* primary hsl number */
    --primary-hsl:247;
    /* primary color */
      --primary:rgb(108,92,230);
      /* primary rgb */
      --primary-rgb:108,92,230;
      --bg:whitesmoke;
      --bg-light:white;
      --text:black;
      --rgb:255,255,255;
      --rgt:0,0,0;
      --primary-text:white;
      }
      .cont{
    width:100%;
    height:50px;
    border:1px solid var(--rgt-01);
    border-radius:5px;
    display:flex;
    flex-direction:row;
    align-items:center;
    overflow:hidden;
    background:transparent;
    padding:0;
}

.cont:has(textarea){
    min-height:200px !important;
}
.cont .inp{
    width:100%;
    height:100%;
    border:none;
    background:transparent;
    border-radius:inherit;

}
.status.green{
    background:rgba(0, 255, 26, 0.1);
    color:#00a716;
    border-radius:1000px;
}
.status.red{
    background:rgba(255, 0, 0, 0.1);
    color:#ff0d00;
    border-radius:1000px;
}
.status.gold{
    background:rgba(255, 145, 0, 0.1);
    color:#ff6a00;
    border-radius:1000px;
}

.c-green{
    color:#4caf50;
}

.c-red{
    color:red;
}

.c-gold{
    color:goldenrod;
}
.notify{
    background:white;
    color:black;
}
button.post{
    background:var(--primary);
    color:var(--primary-text);
}
     
    </style>
@endisset