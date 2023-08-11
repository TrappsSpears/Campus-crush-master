<style>
*{
    font-family: Arial, Helvetica, sans-serif;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: rgb(44, 47, 60);
    max-width: 1800px;
    margin-left: auto;
    margin-right: auto;
    color: white;
}
.nav-a{
   
    display: flex;
    min-width: 10px;
}
a{
     color: inherit;
    text-decoration: none;
}

/* Main things */
.main{height: 100vh;
    display: flex;
    justify-content: center;
}
/* Side-Bar */
.sidebar-nav{
   flex: 0.2;
  max-width: 20%;
    padding: 90px 40px;
    color: white;

}

.sidebar-nav ul div{
    display: flex;
}
.sidebar-nav ul li{
    list-style: none;
    padding: 12px;
    margin-top: 20px;
    background-color: #1a1a1a;;
    border-radius: 42px;
    font-size: 18px;
    font-weight: 550;
    margin-right: 20px;
    cursor: pointer;
    box-shadow: 2px 6px 5px 0px rgb(29, 28, 28);
  
}
.sidebar-nav ul .active li{
    background-color: rgb(0, 101, 196);
    color: white;
    
    }
    .sidebar-nav ul .active span{
        background-color: #1a1a1a;
    color: white;
    animation: span 1s infinite linear;
    }
.sidebar-nav ul li:hover{
    transform: scale(1.1);
    transition: 0.3s ease;
    background-color: #1d1c1c;
    box-shadow: 0px 2px 3px 0px;
}
.sidebar-nav ul span:hover {
    transform: scale(1.2);
    transition: 0.3s ease;
}
.sidebar-nav ul span{
    background-color: rgb(0, 101, 196);
    padding: 6px;
    border-radius: 30px;
    height: 4px;
    position:relative;
    top: 48px;
    margin-right: 10px;
    box-shadow: 2px 2px 3px 0px black;
    
}
@keyframes span{
    0% {
        transform: scale(1, 1);
      }
      25% {
        transform: scale(1, 1);
      }
      50% {
        transform: scale(1, 1.1);
      }
      75% {
        transform: scale(1, 1);
      }
      100% {
        transform: scale(1, 1);
      }
}
/* Sidebar Ends*/
.footer-nav{
   background-color: inherit;
    position: fixed;
    bottom: 0;
    z-index: 100;
    width: 100%;
    border-top: 1px solid #252323;
}
.footer_items{
    padding: 10px 25px;
    display: grid;
    grid-template-columns: auto auto auto auto auto 20px;
}
.footer_items div{
   
    padding: 8px;
    border-radius: 32px;
    width: 60%;
    max-width: 50px;
    min-width: 40px;
    cursor: pointer;

    text-align: center;
}
 .icons-nav{
    width: 20px;
    transform: scale(1.4);
    filter: brightness(0) invert(1) sepia(100%) hue-rotate(30deg) saturate(500%);
}
.icons-active img{
    filter: invert(100%);
}
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

#menu {
    display: none;
    position: fixed;
    top: 72%;
    right: 20px;
    background-color: #333;
    width: auto;
    border-radius: 12px;
}

#menu ul {
    list-style-type: none;
    padding: 0;
}

#menu ul li {
    padding: 10px;
    text-align: center;
}

#menu ul li a {
    color: white;
    text-decoration: none;
    display: block;
}
.menu_show{
    display: block;
}

    
    
    #menu ul {
        display: flex;
        flex-direction: column;
    }
    
    #toggleBtn {
        display: block;
    }


/* Main Content */
.main-content{
    z-index: 100;
    width: 100%;
    text-align: center;
    justify-content: center;
    height: 100%;
    -ms-overflow-style: none;
  scrollbar-width: none;
    overflow-y: scroll; 
 justify-content: center;
}
.nav{
    backdrop-filter: blur(4px);
    z-index: 100;
    text-align: left;
    position: sticky;
    top: 0;
    padding: 5px;
    border-bottom: 2px solid rgb(0, 101, 196);
    display: flex;
}
.nav h2 ,h3{
    margin-left: 35px;
}
.nav .profile .icons{
    width: 10px;
}
 #menue_mob{
    box-shadow: 0 0 0 0;
    cursor: pointer;
    display: none;
}
.posts{
    padding: 10px 50px; 
    width: 100%;  
   height: 91%;
  
}
#search-conts .trends{
    max-width: 600px;
   min-width: 200px;
   background-color: #111;
}

#search-conts .search-conts .emojis{
   top: 0; 
   left: 0;
   background-color: #111;
   width: 100%;
   display: grid;
   grid-template-columns: auto auto auto auto auto auto;
   max-width: 600px;
   min-width: 200px;
   margin-top: 10px;
}
#search-conts h3{
    text-align: left;

}
.posts .search-conts .trends{
    width: 100%;
    text-align: left;
    max-width: 450px;
    min-width: 200px;
}
.con_form{
    padding: 20px;
    background-color: #1d1c1c;
    max-width: 100%;
    margin-top: 10px;
    min-width: 260px;
    border-radius: 6px;
    position: sticky;
    top: 0;
}
.con_form textarea{
    padding: 6px;
    font-size: 20px;
    background-color: inherit;
    resize: none;
    border: none;
    color: white;
    min-width: 85%;
    max-width: 90%;
    height: auto;
    text-align: center;
    outline: none;
    border-bottom: 2px solid #2c2d2e;
}
.con_form .post_header{
    display: flex;
    margin-top: 10px;
    display: none;
}
.post_header .input_hme{
    display: flex;
   margin-left:7%;
}
.con_form .post_header input{
    width: 50%;
    border: 1px solid #2c2d2e ;
    background-color: inherit;
    border-radius: 8px;
    padding: 6px;
    color: white;
    outline: none;
    margin-right: 10px;
}
.con_form .post_header div{
    width: 50%;
}
.con_form span{
    box-shadow: 1px 3px 3px 0px black;
    padding: 6px;
    border-radius: 54px;
    background-color: #3a3938e1;
    cursor: pointer;
    font-size: 8px;
    position: absolute;
    
}
.con_form span:hover{
    box-shadow: 1px 3px 3px 0px rgb(0, 101, 196);
}
.con_form button{
    font-size: 16px;
    width:60%;
    padding: 8px;
    border-radius: 8px;
    border: none;
    background-color: rgb(0, 101, 196);
    cursor: pointer;
    outline: none;
    color: white;
}
.con_form button:hover{
    background-color: rgb(0, 131, 196);
    color: #000000;
    transition: 0.3s;
}
.conform_desgn_head{
    display: grid;
    grid-template-columns: 45% 10% 45%;
}
.conform_desgn_head button{
    width: 100%;
    position: relative;
    top: -10px;
    padding: 2px;
    backdrop-filter: blur(4px);
    border: 1px solid rgb(20, 20, 20);
    box-shadow: 0px 1px 3px 0px rgb(0, 101, 196);
}
.post-container{
    box-shadow: 2px 3px 10px 0px #111;
    background-color: #1a1a1a;
    height: auto;
    max-width: 650px;
    min-width: 260px;
    margin-top: 16px;
    border-radius: 8px;
  margin-bottom: 20px;
    text-align: left;
    padding: 0px 12px 12px 12px;
   }
   
  
.post-container:hover{
    box-shadow: 2px 6px 14px 0px #111;
}
.post-box{
    border:2px solid #2c2d2e;
    padding: 12px;
    height:auto;
    min-height: 100px;
    margin-bottom: 8px;
    text-align: center;
     overflow: hidden;
    text-overflow:ellipsis;
    cursor: pointer; 
    border-radius: 32px;
    background-color: inherit;
    color: white;
    line-height: 1.9;
}
.post-box .post_b{
    font-weight: 100;
    font-style: thin;
    font-size: 18px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;   
    border-radius: 10px;
    padding:0 10px 10px 20px;
    max-height: 200px;
    
}
.engage_btn span{
    position: relative;
    text-align: right;
    font-size: 20px;
    margin-top: -60px;
    background-color: #252323;
    border: 3px solid #2c2d2e;
    padding: 8px 4px 8px 8px;
    border-radius: 8px;
    left: 73%;
    top: -40px;
    cursor: pointer;
}
.engage_btn small{
    position: relative;
    top: -4px;
}
.engage_btn img{
    width: 22px;
    margin-right: 10px;
}
.post_insights{
    text-align: right;
    
    margin-top: -20px;
    color: gray;
}
.post_insights small{
    position: relative;
    top: -5px;
    left: 3px;
    font-size: 10px;
}
.post_insights img{
    width: 20px;
}
.post_insights span{
    margin-right: 10px;
}
.engage{
    position: relative;
    display: flex;
    align-items: center;
    margin-bottom: -10px;
    
}
.engage .span{
    position: relative;
    top: -20px;
    background-color: #252323;
    padding: 6px;
    border-radius: 32px;
    border: 2px solid #2c2d2e;
    font-size: 12px;
    left: -40%;
}
.engage div{
    margin-left: 100px;
}
.readmoreBtn{
    position:relative;
    top: 108%;
    left: 30%;
    margin-top: -40px;
    color: gray;
}
.location_div{
    position:relative;
    top: 100%;
    padding-left: 12px;
    text-align: left;
    margin-top: -30px;
    font-size: 16px;
    color: #1a1a1a;
}
.readmoreBtn button{
    padding: 8px ;
    font-size: 18px;
    color: #1a1a1a;
    border: 1px solid black;
    cursor: pointer;
    max-width: 100%;
    background-color: inherit;
}.readmoreBtn button:hover{
    color: #880281;
}

.post-head{
    padding: 12px;
    height: 40px;
    display: flex;
}
.post-head span{
    color: #383838;
}
.post_head{
    padding: 12px;
    height: auto;
    display: block; 
}
.post_head div:hover{
    background-color: #242323;
    
}
.post_head .input-form-linkups input{
    padding: 12px;
    border-radius: 6px;
    outline: none;
    background-color:#2c2d2e ;
    border: none;
    margin-right: 10px;
    margin-top: 10px;
}
.heading-post{
    flex: 1;
}
.heading-post span{
    position: relative;
    top: -5px;
    margin-left: 10px;
}
.heading-post img{
    width: 20px;
}
.head-dots{
    display: block;
    cursor: pointer;
    border-radius: 32px;
}
.head-dots img{
    text-align: center;
    position: relative;
    filter: invert(100%);
    cursor: pointer;
  height: 10px;
  width: 10px;
}
.head-dots:hover{
    transform: scale(1.1);
    transition: 0.3s ease;
    background-color: #1d1c1c;
}

.head-menu{
    position: relative;
    margin-left: -120px;
    background-color: #fff;
    border-radius: 6px;
    background-color: #292929;
    display: none;
}
.head-menu p, .head-menu button{
    padding: 12px;
    font-weight: 600;
    background-color: inherit;
    cursor: pointer;
    color: white;
    border: none;
    width: 100%;
    text-align:center;

}
.head-menu p:hover{
    background-color: #383838;
}
.head-menu button:hover{
    background-color: #383838;
}
.head-menu-active{
    display: block;
}
.comment{
    height: 50px;
    display: grid;
    padding: 4px 1px 12px 12px;
    grid-template-columns: 13% 80%;
}
.deal-input{
    text-align: center;
    display: flex;
    justify-content:center;
    position: relative;
    margin-top:-75px;
    background-color: #201f1f;
    padding:12px 5px 0px 0px;
    display: none;
}
.deal-input-active{
    display: block;
}
.deal-input textarea{
    border-radius: 32px ;
    height: 45px;
    border: none;
    resize: none;
    background-color: #242323;
    color: wheat;
    padding: 12px 16px;

}
.deal-input button{
    height: 35px;
    border: none;
    border-radius: 8px;
    width: auto;
    color: white;
    font-weight: 600;
    background-color: green;
    cursor: pointer;
    padding:2px 8px ;
    position: relative;
    top:-13px;
}
.deal-input .cancel{
    background-color:red;
}
.deal-input button:hover{
    transform:scale(1.2);
    transition:0.2s ease;
}
.deal-input textarea:focus{
    outline: 1px solid wheat;
}
.react{
text-align: center;
padding: 5px 0px 0px 0px;
cursor: pointer;
}
.react img:hover{
    transform:scale(1.2);
    transition:0.2s ease;
}
.react img{
    position: relative;
    margin-top: -6px;
}
.react small{
    position: relative;
    color:inherit;
    font-size: 12px;
    font-weight:100 ;
    border-radius: 43px;
    padding: 5px 7px;
    background-color: #201f1f;
    margin-left: -10px;
    margin-top: 10px;
}

.icons {
    width:30px
}

.react-emojis{
    display: none;
    position: relative;
    margin-top: -100px;
    background-color: #313131;
    padding: 8px 10px;
    min-width: 300px;
    left: -50px;
    border-radius: 90px;
    box-shadow: 0px 2px 16px 0px #1a1a1a;
    
}
.react-emojis-active{
  display: grid; 
  grid-template-columns: auto auto auto auto auto auto;
}
.react-emojis button{
    padding: 2px;
    background-color: inherit;
    cursor: pointer;
    background-color: none;
    border:none;
}
.react-emojis button:hover{
    transform: scale(1.1);
    transition: 0.3s ease;
}
.comment_in input{
    padding: 8px;
    border-radius: 32px;
    border: none;
    outline: none;
    width: 90%;
    margin-left: 20px;
    font-weight: 600;
    cursor: pointer;
    
}

.comment_in .textarea_reply{
    padding: 9px;
    font-size: 16px;
    height: 35px;
    resize: none;
    border-radius:8px;
    border: none;
    outline: none;
    width: 100%;
    overflow-y: hidden;
    margin-left: 20px;
    cursor: pointer;
    background-color: #383838;
}

.form-comment button:hover{
    background-color: #ff9b05;
    box-shadow: 2px 2px 3px 0px black;
    transition: 0.2s ease;
}
.form-comment button{
    width: 40%;
    cursor: pointer;
    background-color: #880281;
    border-radius: 8px;
    border: none;
    border-left:1px solid #000;
    height: 35px;
    color: white;
    font-weight: 600;
    margin-top: 10px;
    position: relative;
    left: 70%;
}
.comments_posts{
    text-align: left;
    border-left:2px solid #880281;
    padding-left: 12px;
    width: fit-content;
    margin-left: 20px;
    margin-top: 10px;
    display: flex;
}
.comment-post{
    border-radius: 6px;
    background-color: #2b2a2a;
    padding: 6px ;
    font-size: 15px;
    max-width: 100%;
}
.comments_posts img{
    width: 20px;
    margin-left: 10px;
    cursor: pointer;
}
.replys{
    border-radius: 6px;
    background-color: #2b2a2a;
    padding: 6px ;
    font-size: 15px;
    max-width: 200px;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 10%;
    text-align: left;
}
.replys small{
    color: rgb(0, 101, 196);
}
.reply_com{
    margin-left: 10px;
}
.reply_com button{
    background-color: inherit;
    border: none;
    border-radius: 6px;
    color: white;
}
.divider{
    border-radius: 6px;
    padding: 6px ;
    font-size: 15px;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 10px;
    
}
.reply_com textarea{
    outline: none;
    height: 40px;
    background-color: inherit;
    resize: none;
    padding: 6px;
    border: none;
    border-bottom: 2px solid #201f1f;
    color: white;
    width: 60%;
    
    font-size: 13px;
}
.reply_react input[type="checkbox"] {
    display: none;
}
.reply_react #emoji_reply:checked ~ #reply_emoji{
    visibility: visible;
}

.reply_react #reply_emoji{
  display: none;
}
.reply_react{
    margin-bottom: -35px;
}
.reply_react img{
    filter: invert(100%);
    display: flex;
    width: 15px;
}
.reply_react #reply_emoji{
      display: grid;
    grid-template-columns: auto auto auto auto auto auto;  
    background-color: inherit;
    position: relative;
    top: -23px;
    margin-bottom: 0;
    visibility: hidden;
}
.comment-post div small{
    font-size: 10px;
    color: green;
    cursor: pointer;
}
.comments_posts div span{
    padding: 6px;
    margin-left: 5px;
    
    border-radius: 98px;
    cursor: pointer;
    color: #fff;
}
.comments_posts div span img{
    width: 15px;
}

.post_head .dot{
    margin-top: 10px;
    padding:1px;
    width: 100%;
    border-radius: 43px;
    backdrop-filter: blur(4px);
    border: 1px solid rgb(20, 20, 20);
    box-shadow: 0px 1px 3px 0px blueviolet;
}
.dot-active{
    box-shadow:1px 3px 3px 0px rgb(19, 199, 19);
}
.close-btn{
    position: relative;
    left: 50%;
    top: -60px;
    padding: 18px;
    backdrop-filter: blur(42px);
    border-radius: 44px;
    cursor: pointer;
    box-shadow: 0px 3px 3px 0px black;
    color: #000;
    font-weight: 600;
}
.close-btn:hover{
    transform: scale(1.2);
    transition: 0.3s ease;
    background-color: #242323;
    color: floralwhite;
}
.post-reply{
   padding-left: 80px;
   margin-top: 20px;
   border-left: 4px solid #880281;
}
.post-reply div{
    max-height: 320px;
    background-color: #2c2d2e;
    font-size: 22px;
    overflow-y: scroll;
    padding: 12px;
    border-radius: 8px;
    scrollbar-width: thin;
}

.input-reply{
    display: flex;
    position: absolute;
    margin-left: 40px;
    top:90%;
    background-color: inherit;
}
.input-reply span{
    margin-right: 14px;
    padding: 20px;
    background-color: #050505;
    border-radius: 43px;
}
.input-reply textarea{
    max-width: 360px;
    min-width: 360px;
    height: 40px;
    resize: none;
    position: relative;
    top: -12px;
    border-radius: 32px;
    background-color: #1f1d1d;
    border: none;
    margin-right: 15px;
    outline: none;
    padding: 4px;
    font-size: 18px;
    font-weight: 600;
    padding:5px 12px;
    color: white;
   
}
.input-reply button{
    padding: 10px;
    border: none;
    margin-top: -8px;
    background: #880281;
    border-radius: 12px;
    width: 70px;
    font-weight: 600;
    color: white;
    cursor: pointer;
    box-shadow: 2px 3px 4px 0px black;
}
/* Main things End */
/*Left bar*/
.leftbar{
    width: 450px;
    padding: 40px;
    overflow-y: scroll;
}
.leftbar .leftbar-container{
    position: relative;
    top: 100px;
}


.leftbar .leftbar-container h2{
    font-size: 20px;
}
.emojis{
    position: relative;
    top: -40px;
    left: 10%;
    border-radius: 32px;
    width: fit-content;
    background-color: #000;
    padding: 8px;
    display: flex;
    text-align: center;
}
#emojis_post{
    position: relative;
    top: 10px;
    left: 0;
    background-color: inherit;

}

.emojis div:hover{
    transform: scale(1.2);
    transition: 0.3s ease;
}
.icons-men{
   margin-top: 85px;
   display: flex;
}
.icons-menn{
    position: relative;
    top: 60%;
}
.icons-men .icons{
    width: 20px;
}
.icons-men span{
    background-color: black;
    padding: 6px;
    margin-right: 8px;
    position: relative;
    top: 32px;
    border-radius: 30px;
    height: 4px;
    color: black;
    box-shadow: 2px 3px 3px 0px rgb(0, 101, 196);
}
.icons div{
    margin-bottom: 15px;
}
.profile, .settings{
    padding: 10px;
    cursor: pointer;
    background: #000;
    border-radius: 43px;
    margin-right: 12px;
    font-weight: 600;
    box-shadow: 2px 3px 3px 0px rgb(0, 101, 196);
    margin-bottom: 10px;
    width: fit-content;
}

.profile div span{
    background-color: inherit ;
    box-shadow: inherit;
    padding: 6px;
}
.settings{
    background-color: #0e0d0d;
    
}
.settings:hover{
    background-color: #000000;
    box-shadow: 0px 2px 3px 0px;
}
.profile:hover{
    box-shadow: 0px 2px 3px 0px;
}
.leftbar-container h2{
    margin-left: 12px;
}
.logout_confirm{
    background-color: #0e0d0d;
    text-align: center;
    margin-top: 10px;
    display: none;
    border-radius: 8px;
    box-shadow: 0px 3px 5px 0px #050522;
}
.logout_confirm button{
    width: 100%;
    padding: 12px;
    margin-right: 10px;
    font-weight: 600;
    color: white;
    border-radius: 8px;
    border: none;
    cursor:pointer;

}
.logout_confirm-active{
    display: block;
}
.logout_confirm .yes{
    background-color: red;
}
.yes:hover,.no:hover{
    transform: scale(1.1);
    transition: 0.2s ease;
}
.logout_confirm .no{
    background-color: #313131;
}
.logout_confirm div{
    display: flex;

}

.trends{
    background-color:#1a1a1a;;
    margin-top: 12px;
    border-radius: 8px;
    font-size: 15px;
    margin-bottom: 20px;
    padding-bottom: 12px;
}
.trends .trndItms{
    padding: 5px 20px;
    cursor: pointer;
    margin-top: 10px;
}
.trends  .trndItms:hover{
    background-color: #383838;
}
.trends .trndItms small{
    color: #201f1f;
    font-size: 15px;
    padding: 5px;
}
.trends .trndItms div{
    margin-bottom: 5px;
}


.log-in-form {
    position: absolute;
    top: -220px;
    padding: 12px;
    left: 0;
    background-color: #1a1a1a;
    border-radius: 6px;
    display: none;
}
.log-in-form div, .sign-up-form div{
    padding: 4px;
    display: flex;
}
.log-in-form  input, .sign-up-form input{
    padding: 4px;
    width: 100%;
    background-color: #fff;
    border-radius: 4px;
    outline: 1px solid #8b078b;
    margin-right: 10px;
}
.log-in-form button , .sign-up-form button{
    padding: 12px;
    width: 100%;
    font-weight: 600;
    background-color:#1a1a1a;
    color: white;
    border-radius: 8px;
    border: none;
}
.log-in-form button:hover , .sign-up-form button:hover{
    background-color: #8b078b;
    transition: 0.3s ease;
    transform: scale(1.01);
}
.log-in-form .footer ,.sign-up-form .footer{
    cursor: pointer;
    text-align: center;
    margin-top: 4px;
    border-top:1px solid #2e2e2e;
}
.sign-up-form{
    position: absolute;
    top: -310px;
    padding: 12px;
    left: 0;
    background-color: #1a1a1a;
    border-radius: 6px;
    display: none;
}
.sign-up-form-active{
    display: block;
}
.log-in-form-active{
    display: block;
}
#span_signup, #span_login{
    color: #8b078b;
    cursor: pointer;
}
.profile-menue{
    position:fixed;
    top:52%;
    left:90px;
    padding: 12px;
    
    backdrop-filter: blur(2px);
    border-radius: 6px;
    font-weight: 600;
    display: none;
}
 
.profile-menue div{
    padding: 8px;
    cursor: pointer;
}
.profile-menue .div:hover{
    background-color: #313131;
    border-radius: 9px;
    transition: 0.1s ease;
}
.profile-menue .profife_view{
    padding: 18px;
    display: flex;
    text-align: center;
}
.profile-menue .profife_view span{
    padding: 12px 16px;
    border-radius: 54px;
    background-color: orange;
    margin-right: 16px;
    position: relative;
}
.profile-menue .profife_view div{
    padding-bottom: 26px;
    border-bottom: 4px solid grey;
    border-radius: 0;
}
.profile-menue-active{
    display: block;
}
.errormsg{
    text-align: center;
    color: red;
    margin-top: -40px;
    position: absolute;
}
.locs{
    padding: 10px;
}
.locs p{
    margin-top: 5px;
}
.msg-box{
    padding: 12px;
    border-radius: 6px;
    box-shadow: 2px 6px 10px 0px 
    rgb(29, 28, 28);
    width: 100%;
    margin-bottom: 13px;
    background-color:#201f1f;
}
.msg_username{
    color:#383838;
}
.msg-box small{
    color:#0e0d0d;
}
.msg{
    display: grid;
    grid-template-columns: 10% 90%;
}
.user-p{
    border-radius: 45px;
    height: 20px;
    padding: 8px;
}
.user-p .icons{

    width: 20px;
}
.msg-body{
    margin-left: 10px;
    padding: 12px;
    border-radius: 8px;
    background-color: #252323;
    font-weight: 600;
    margin-bottom: 10px;
}
.msg-body button{
    border-radius: 6px;
    padding: 8px;
    background-color: inherit;
    border: 2px solid #201f1f;
    font-weight: 700;
    cursor: pointer;
    color: green ;
    margin-right: 10px;
}
.msgBody_btn{
    display: flex;
}
.msg-body p{
    text-align: left;
}
.reply-box{
    margin-top: 10px;
    width: 100%;
    border-radius: 8px;
    background-color: #383838;
    text-align: center;
    padding: 12px;
}
.reply-container{
    background-color: #111;
    margin-bottom: 70px;
    padding: 8px;
    border-radius: 8px;
}
.reply-box div{
    display: flex;
    margin-bottom: 10px;
}
.reply-box input{
    width: 80%;
    padding: 4px;
    border: none;
    background-color:inherit;
    border-bottom: 2px solid #292929;
    outline: none;
    font-weight: 700;
    color:wheat;    
}
.reply-box button{
    padding: 4px 8px;
    background-color:#383838;
    border: 2px solid #1a1a1a;
    cursor: pointer;
}
.Responce{
    border-top: 3px solid green;
    border-right:  3px solid green;
    border-bottom: 3px solid rgb(2, 70, 118);
    border-left:  3px solid rgb(2, 70, 118);
}

/* Responcive Design*/

/* Tablets */
@media only screen and (min-width: 700px) and (max-width: 1023px) {
    /* CSS styles here */
    .leftbar{
        width: 400px;
    }
    .sidebar-nav{
       display: none;
    }
    nav{
        margin-left: -20px;
    }
    .emojis{
        left: 0;
        width: fit-content;
    }
    .emojis .icons{
        width: 20px;
    }
    #menue_mob{
    display: block;
  }
  .react small{
    position: relative;
    color:inherit;
    font-size: 12px;
    font-weight:100 ;
    border-radius: 43px;
    padding: 5px 7px;
    background-color: #201f1f;
    margin-left: -10px;
    margin-top: 10px;
}
  }
  .nav .profile{
    display: block;
  }
  #C_con{
    font-size: 16px;
  }
  #post_linkups p {
    margin-top: 10px;
   font-weight: 300;
    font-size: 14px;
  }
  #post_linkups div input{
    margin-bottom: 10px;
  }
  #settings{
    padding: 12px
  }
  #settings input{
    background-color: inherit;
    padding: 8px;
    width: 70%;
    margin-bottom: 10px;
    color: wheat;
    border-radius: 8px;
    border: 2px solid #2b2a2a;
  }
#settings button{
    width: 80%;
    background-color: rgb(0, 101, 196);
    border-radius: 8px;
    border: none;
    color: white;
    font-weight: 600;
    padding: 8px;
    cursor: pointer;
}
#settings h3{
    text-align: center;
    margin-left: -10px;
    margin-bottom: 10px;
}
 #logOut button{
    background-color: brown;
    padding: 10px;
    border-radius: inherit;
    color: whitesmoke;
    width: 100%;
    font-weight: 600;
    border: none;
}
  /* Smartphones */
@media only screen and (max-width: 700px) {
    /* CSS styles here */
    .leftbar{
        display: none;
    }
    .posts{
        padding: 10px 20px;
    }
    .sidebar-nav{
        z-index: 200;
        position: fixed;
        left: 0;
        display: none;
    }
    .sidebar-nav span {
        display: none;
    }
    .sidebar-nav .nav-a{
        width: 5px;
    }
    #post_choice{
        font-size: 15px;
    }
    .post-choice-active{
        width: 100%;
        z-index: 300;  
    }
    .post-choice{
        left: 0;
        width: 100%;
    }
    .input-form textarea{
        min-width: 20px;
    }
    
    .post-choice .dot{
        left: 110%;
    }
    .reply-form-active{
        width: 100%;
        display:none;
        margin-top: -90px;
    }
    
     #menue_mob{
    display: block;
  }
  .react small{
    position: relative;
    color:inherit;
    font-size: 12px;
    font-weight:100 ;
    border-radius: 43px;
    padding: 5px 7px;
    background-color: #201f1f;
    margin-left: -10px;
    margin-top: 10px;
}
  }
  .form-comment button{
    margin-left: 0;
  }
 
  </style>