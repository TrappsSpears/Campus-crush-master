<style>
*{
    font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    padding: 0;
    margin: 0;
    outline: none;
    box-sizing: border-box;
}
body{
    background-color: #121212;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;
    color: white;
    min-width: 450px;

}

.noProf{
    filter: invert(100%);
    border:none;
    width: 30px;
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
.main{
    display: flex;
    justify-content: center;
 
}
/* Side-Bar */
.conFess_icon {
    
    position: relative;
    top: -76px;
    margin-bottom: 25px;
    
}
.conFess_icon h2{
    transform: scale(1.3);
    color:#1e90ff;
    margin-bottom: 10px;
}
.conFess_icon p{
    position: relative;
    left:-25px;
    color: gainsboro;
    font-size: 12px;
}
.conFess_icon span{
    margin-right: 10px;
}
.conFess_icon span img{
    position: relative;
    top: 5px;
    left:8px;
}
#small_screen_icon{
    position: relative;
    top: 0;
    margin-bottom: 0;
    
}
#small_screen_icon h2{
transform: scale(1.0);
font-size: 19px;
left:-33px;
position: relative;
}
#small_screen_icon p{
    left: 5px;
    font-size: 10px;
}
.footer-about{
    position: absolute;
    bottom: 0;
    color: gray;
    font-size: 10px;
    left: 0;
    padding: 8px;
    border-top: 1px solid #201f1f;
}
#info_App{
    position: relative;
    font-size: 10px;
    text-align: left;
}
.footer-about a{
    color: #880281;
}
.sidebar-nav{
   flex: 0.2;
   height: 100vh;
  max-width: 20%;
    padding: 90px 40px;
    color: white;

position: fixed;
left: 0;
top:0;
z-index: 400;

}

.sidebar-nav ul div{
    display: flex;
    
}
.sidebar-nav ul li{
    list-style: none;
    padding: 12px;
    margin-top: 20px;
    background-color: #121212;;
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
        background-color: #333333;
    color: white;
    animation: span 1s infinite linear;
    }
.sidebar-nav ul li:hover{
    transform: scale(1.1);
    transition: 0.3s ease;
    box-shadow: 0px 2px 3px 0px orange;
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
    position: sticky;
    bottom: 0;
    padding: 10px 25px;
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    background-color: #111;
}
.footer_items div{
   
    padding: 12px;
    border-radius: 32px;
    width: 60%;
    max-width: 50px;
    min-width: 40px;
    cursor: pointer;

    text-align: center;
}
.footer-nav img{
    width: 20px;
    filter: brightness(89);
}
 .icons-nav{
    width: 20px;
    transform: scale(1.4);
   
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
 justify-content: center;
 margin-left: 21%;
 position: relative;
 border-left: 1px solid #333;
        border-right: 1px solid #333;
}

.nav{
    backdrop-filter: blur(44px);
    z-index: 100;
    text-align: left;
    position:sticky;
    top: 0;
    padding: 5px;
    border-bottom: 1px solid #333;
    display: flex;
    justify-content: center;
    padding-bottom: 30px;
   min-width:300px;
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

    width: 100%;  
   
}
.footer_{
    margin-top: 50px;
}
.footer_ a{
    color: #880281;
}
#search-conts .trends{
    max-width: 600px;
   min-width: 200px;
}
 .search_place{
    padding: 6px;
   display: flex;
   margin-right: 10px;
   margin-left: 25px;
}
.search_place button{
    padding: 5px 10px;
    height: 37px;
    border:none;
    border-top: 1px solid #313131;
    border-bottom: 1px solid #313131;
    border-right: 1px solid #313131;
   
    background: inherit;
    border-radius: 6px;
    color: white;
    border-radius: 0px 63px 63px 0px;
    position: relative;
    
}
 .search_place input{
    width: 100%;
    border-radius: 63px 0px 0px 63px;
    padding: 6px 10px;
    font-size: 18px;
    border:none;
    border-top: 1px solid #313131;
    border-bottom: 1px solid #313131;
    border-left: 1px solid #313131;
   
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

.posts .search-conts .trends{
    width: 100%;
    text-align: left;
    max-width: 450px;
    min-width: 200px;
}
.progress-container {
            width: 50%;
            height: 5px;
            border-radius: 10px;
            display: none;
            position: relative;
            margin-left: 21%;
                
            
        }
.progress-bar {
            height: 100%;
            border-radius: 10px;
            background-color: #4caf50;
            position: relative;
            margin-left: 21%;
            margin-top: -10px;
            
   }
   .progress-container span{
    background-color: none;
}
#emojiContainer {
    position: relative;

    left: 50px;
}
#emojiContainer span{
    margin-top: -16px;
    font-size: 17px;
}
#emojiMenu {
    position: absolute;
    top: 100%;
    left: 0;
    font-size: 15px;
    grid-template-columns: auto auto auto auto auto auto auto auto auto auto auto auto auto;
    border: 1px solid #ccc;
    padding: 5px;
    display: none;
    background-color: gray;
    z-index: 400;
    border: 6px;
    cursor:default;
    margin-left: 55px;
    border-radius: 6px;
    height: 300px;
    overflow-y: scroll;
    scrollbar-width: thin;
}
#emojiMenu small{
    cursor: pointer;
    font-size: 16px;
}

#emojiButton {
    background: none;
    border: none;
    cursor: pointer;
    margin-left: 15px;
}
#emojiButton img{
    width: 30px;
    height: auto;
    filter: invert(10%);
}

.con_form{
    
    padding: 20px 5%;
    background-color: #121212;
    max-width: 100%;
    margin-top: 10px;
    min-width: 260px;
    border-radius: 6px;
    
}
.con_form textarea{
    padding: 10px 13px;

    font-size: 25px;
    background-color:  inherit;
    resize: none;
    border: none;
    color: white;
    min-width: 98%;
   max-width: 100%;
    height: 40px;
    outline: none;
    border-radius: 38px;
  
    
}
.custom-select{
    margin-top: 10px;
    text-align: left;
    margin-left: 10%;
    display: none;
    margin-bottom: -50px;
}
.custom-select select{
    border-radius: 32px;
    padding: 6px 10px;
    color: gainsboro;
     background-color: #212121;
    width:fit-content;
    position: relative;
    top: -50px;
    color: gainsboro;
}
.cancel_post{
    border-radius: 8px;
    padding: 6px;
    color: gainsboro;
     background-color: #121212;
    width:fit-content;
    position: relative;
    border: 1px solid #1a1a1a;
    top: -50px;
    color: gainsboro;
}
.con_form .post_header{
    display: flex;
    width: 100%;
    text-align: center;
    margin-top: 10px;   
}

.switch{
    position: relative;
    border-radius: 6px;
   color: gainsboro;
   width: auto;
    display: flex;
    left: 8%;
}
.switch img{
    position: relative;
    left: -3px;
}
.uploaded_img{
    position: relative;
margin-top: 10px;
    width: 74%;
    left: 18%;
}


#label_upload{
    display: flex;   
}
#upload_profile_pic{
    display: none;
}
.uploaded_img img{
    
    max-height: 300px;
    width: 100%;
    border-radius: 8px;
    object-fit: cover;
    object-position: top;
}

.input_img{
    
    padding-left: 5%;
    display: grid;
    grid-template-columns: 40px auto;
}
.input_img img{
    height: 50px;
    width: 50px;
    border: 1px solid #222;
    border-radius: 32px;
    position: relative;
    top: -5px;
    object-fit: cover;
    background: url('../images/profile-user.png');
    
}
#remainingChars{
    position: relative;
  margin-left: 100%;
}
.prof_img{
    margin-top: -20px;
    object-fit: cover;
}
.img_hot{
    text-align: center;
    width: 100%;
    margin-top: 10px;
}
.img_hot img{
    height: auto;
    max-height: 300px;
    width: auto;
    border-radius: 8px;
    border: 1px solid #313131;
    object-fit: contain;
}
#imageInput{
    display: none;
}
.custom-file-input span {
            display: inline-block;
            background: #ccc;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

#hotSeat_form{
    margin-top: 10PX;
    display: flex;
}
#hotSeat_form .post_header{
    width: 100%;
}

#hotSeat_header {
    margin-bottom: 10px;
   background-color: inherit;
   margin-left: 0px;
   width: 100%;
}#caption {
    max-width: 99%;
    height: 50px;
}
#caption , select , input{
    text-align: left;
    background-color: inherit;
    margin-bottom: 10px;
    outline: none;
    color: floralwhite;
    width: 100%;
    border-radius: 0px;
    border-bottom:2px solid #313131 ;
    padding: 6px;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    
}
.caption_div{
    width: 100%;
}


.post_header select{
    border-radius: 32px;
    padding: 6px 10px;
    color: gainsboro;
   
     background-color: #212121;
    width: fit-content;
}

.input_htSt select option{
    background-color: #313131;
    color: floralwhite;
}
.con_form .post_header input{
    width: 90%;
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
    margin-right: 10px;
}
.con_form span{
   
    padding: 6px;
    border-radius: 54px;
    background-color: #3a3938e1;
    cursor: pointer;
    font-size: 8px;
    position: absolute;
    
}
.back_btn{
    border-radius: 6px;
   position: absolute;
   top: 45px;
   margin-left: -75%;
   border: 1px solid rgb(0, 101, 196);
}
.back_btn button{
    border: none;
    padding: 6px;
    border-radius: 6px;
    background-color: #201f1f;
    color: gainsboro;
    font-size: 16px;
    
}
.con_form button{
    font-size: 16px;
    width:100%;
    padding: 8px;
    border-radius: 8px;
    border: none;
    background-color:#1e90ff ;
    cursor: pointer;
    outline: none;
    color: white;
    font-weight: 600;
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
    background-color: #121212;
    height: auto;
    text-align: left;
   padding: 10px 1%;
border-bottom: 1px solid #333;
  min-width: 450px;

    
   }
   #profile_pic{
    height: 50px;
    width: 50px;
    border-radius: 32px;
    object-fit: cover;
   border: none;
    margin-left: 10px;
   }

    .toggle-switch {        
        position: relative;
        width: 50px;
        height: 24px;
    }

    .toggle-switch input[type="checkbox"] {
        opacity: 0;
        width: 50px;
        height: 0;
    }
    #profile-photo-input{
        display: none;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 34px;
        height: 24px;
        width: 50px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input[type="checkbox"]:checked + .slider {
        background-color: #880281;
    }

    input[type="checkbox"]:checked + .slider:before {
        transform: translateX(26px);
    }

    #profile-photo-container {
        display: non;
    }

    input[type="checkbox"]:checked ~ #profile-photo-container {
        display: block;
    }

    #profile-image {
        border-radius: 32px;
        height: 80px;
        width: 80px;
        background-color: #fff;
    }
   
  


.post-box{
    padding: 12px;
    height:auto;
    min-height: 100px;
    margin-bottom: 8px;
    text-align: left;
     overflow: hidden;
    text-overflow:ellipsis;
    cursor: pointer; 
    border-radius: 8px;
    color: white;
    line-height: 1.2;
}

.post-box .post_b{
   
    border-radius: 10px;
    padding-bottom: 10px;
    margin-bottom: 10px;
    padding: 10px 10%;
    margin-top: 10px;
}
.post-box p{
   margin-bottom: 10px;
    font-style: thin;
    font-size: 18px;
    overflow: hidden;
    text-overflow: ellipsis;   
   line-height: 1.5;
   padding: 0 10px;
  margin-top: 10px;
    
}
#post-bAllP{
    max-height: 400px;
}
.post-box .span-loc{
    font-style: arial;
    font-weight: 600;
    padding: 10px 6px;
    margin-bottom: 10px;
    
    margin-top: 10px;
}
.post-box .theme_span{
    padding: 6px;
    font-size: 12px;

    border-radius: 6px;
    color: gainsboro;
    margin-right: 10px;
}

.post-box h4{
    padding-left: 10px;
}
.img_post{
    
    border-radius:10px ;
    padding: 0 10px;
    margin-bottom: 10px;
}

.img_post img{    
    border: 1px solid #121212;
    border-radius: 10px;
   max-height: 450px;
   max-width: 100%;
    
    object-fit: cover;
    text-align: center;
    object-position: top;
}
.engage_btn button small{
    position: relative;
    font-weight: 600;
    color: red;
}
.engage_btn button{
    position: relative;
    text-align: right;
    font-size: 13px;
    margin-top: -60px;
    background-color: #1a1a1a;
    color: gainsboro;
    border: none;
    padding: 6px;
    border-radius: 10px;
    left: 83%;
    top: -55px;
    cursor: pointer;
}

.engage_btn img{
    width: 15px;
    position: relative;
    margin-right: 10px;
    top: 4px;
}
.post_insights{
    text-align: right;
    margin-bottom: 10px;
    margin-top: -15px;
    color: gray;
}
.post_insights #comment img{
    filter: invert(100%);
    position: relative;
    top: 5px;
    width: 24px;
}
.post_insights small{
    left: 2px;
    background-color: inherit;
}
 #reaction_emoj img{
    width: 15px;
    margin-left: -10px;
    position: relative;
    left: 8px;
}
.post_insights #bookmark img{
    filter: invert(10%);
    position: relative;
    top: 2px;
}

.post_insights small{
    position: relative;
    font-size: 10px;
    left: -2px;
    top: 3px;
    color: gainsboro;
    padding: 4px 4px 4px 6px;
    border-radius: 43px;
}
.thot{
    text-align: left;
    border-radius: 43px;
   background-color: #212121;
    padding: 6px 10px ;
    font-size: 15px;
    cursor: pointer;
    color: white;
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
    padding: 6px;
    border-radius: 6px;
    border: 1px solid #212121;
    font-size: 12px;
}
.engage div{
    margin-left: 100px;
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
.post-heading{
    display: flex;
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
.post-heading-container{
    background-color: #121212;
    padding: 4px;
    margin-bottom: 20px;
    width: fit-content;
    border-radius: 6px;
    
}
.post-heading{
    
   
        border-radius: 6px;
        width: fit-content;
   padding: 4px 10px 0px 0px;
}
.heading-post  #post_info{
    margin-top: 10px;
}
.heading-post  #post_info #username{
    color: white;
    font-weight: 700;
    
}
.heading-post  #post_info #name{
    color: gainsboro;
   
}
.heading-post small{
    color: gray;
}
 .head_post_el{
    font-size: 13px;
    border-radius: 32px;
    background-color: #121212;
    padding: 6px;
    width: fit-content;
    position: relative;
    top: -25px;
    margin-left: 10px;
}
 .head_post_el img{
    width: 15px;
    position: relative;
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
    border-top: 1px solid #333333;
        display: grid;
    padding: 14px 1px 12px 12px;
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

.react_select select > option{
    background-color: #2c2d2e;
    padding: 6px;
    border: none;
    border-radius: 8px;
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
    
    margin-left: -10px;
    margin-top: 10px;
}

.icons {
    width:30px;
    height: auto;
}

.react-emojis{
    display: none;
    position: relative;
    margin-top: -100px;
    background-color: #212121;
    padding: 8px 10px;
    min-width: 300px;
    left: -20px;
    z-index: 400;
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
    padding: 10px;
    font-size: 20px;
    height: 45px;
    resize: none;
    border-radius:8px;
    background-color: inherit;
    outline: none;
    width: 100%;
    overflow-y: hidden;
    margin-left: 20px;
    cursor: pointer;
    border: none;
    color: floralwhite;
}

.form-comment button:hover{
    background-color: #ff9b05;
    box-shadow: 2px 2px 3px 0px black;
    transition: 0.2s ease;
}
.form-comment button{
    width: 20%;
    cursor: pointer;
    background-color: #880281;
    border-radius: 8px;
    border: none;
    border-left:1px solid #000;
    height: 35px;
    color: white;
    font-weight: 600;
    position: relative;
    left: 53%;
}
.form-comment{
    z-index:100;
}
.comments_posts{
    text-align: left;
    border-left:2px solid gray;
    padding-left: 25px;
    width:100%;
    margin-left: 50px;
    margin-top: 30px;
    display: flex;
}
.comments_posts small{
    font-size: 8px;
    margin-top: -10px;
}
.comment-post #type_com{
    margin-top: -10px;
    color: salmon;
}
#pvt_com{
    
    font-style: italic;
    color: gray;
    border-left: 2px solid rgb(44, 47, 60);
}
.comment-post{
    
    padding: 10px ;
    font-size: 15px;
    max-width: 100%;
}
.comments_posts img{
    width: 20px;
    margin-left: 10px;
    cursor: pointer;
}
.replys{
    background-color: #1f1f1f;
    border-radius: 6px;
    padding: 6px 30px ;
    font-size: 15px;
    max-width: 200px;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 10%;
    color: white;
    text-align: left;
}
.emoji_cont{
    text-align: left;
    padding: 6px;
    margin-left: 15%;
    margin-top: 10px;
}
.emoji_cont .icons{
    width: 30px;
}


.replys small ,.emoji_cont small{
    color: rgb(0, 101, 196);
    font-size: 11px;
}
.reply_com{
    margin-left: 10px;
    margin-top: 10px;
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
    border:none;
    
    color: white;
    width: 60%;
    padding: 6px ;
    
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
    color: gray;
    cursor: pointer;
}.comment-post div small span{
    position: relative;
    left: -10px;
    color: salmon;
}
.comOpt{
    display: flex;
    margin-top: 10px;
}
.comOpt select{
    background-color: #201f1f;
    width: fit-content;
    margin-left: 24px;
    border-radius: 6px;
}
.comOpt select option{
    background-color:#201f1f;
}
.comOpt #emojiContainer{
    position: relative;left: 0;
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
    width: 650px;
    padding: 40px;
}
#search_place input{
    width: 60%;
}
 
.leftbar .leftbar-container{
    position: relative;
    top: 100px;
    position: sticky;
    top:0;
}


.leftbar .leftbar-container h2{
    font-size: 20px;
}
.emojis{
    position: relative;
    top: 0px;
    
    border-radius: 32px;
    
    background-color: #000;
    padding: 8px;
    display: grid;
   grid-template-columns: auto auto auto auto auto auto;
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
    background-color: rgb(4, 28, 46);
    margin-top: 12px;
    border-radius: 8px;
    font-size: 15px;
    margin-bottom: 20px;
    padding-bottom: 12px;
    text-align: left;
}
.trends .trndItms{
    padding: 5px 20px;
    cursor: pointer;
    margin-top: 10px;
}
.trends .trndItms img{
    width: 16px;
    position: relative;
    top: 7px;
}
.trends  .trndItms:hover{
    background-color: rgb(18, 33, 46);
}
.trends .trndItms small{
    color: gainsboro;
    font-size: 10px;
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
.reply-container h3{
    text-align: left;
}
.reply-container{
    background-color: #121212;
    margin-bottom: 100px;
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
    .main-content{
        margin-left: 0;
    }
    .nav{
        border-left: none;
        border-right: none;
     
    }
    #small_screen_icon{
        display: block;
    }
    .leftbar{
        width: 400px;
    }
    .sidebar-nav{
       display: none;
    }
    nav{
        margin-left: -20px;
    }
    .con_form{
        padding: 0;
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
.posts{
    padding: 20px;
    margin-bottom: 100px;
    border: none;
}
#emojiContainer{
    display: none;
}
.con_form .post_header{
    display: flex;
    width: 100%;
    text-align: center;
    margin-top: 10px;
    margin-left: 1%;
}
#emojiContainer{
    display: none;
}
.form-comment button{
    left: 40%;
}
.post-container{
        padding: 0;
    }
    #search_place input{
        width: 200px;
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
  #post_linkups img{
    width: 80px;
    border-radius: 32px;
    height: 80px;
    object-fit: cover;
    background-color: orange;
    border: none;
  }
  #profile-image{
    object-fit: cover;
  }
  #settings{
    padding: 12px
  }
  #sbmit_picChange{
    margin-bottom: 15px;
  }
  #prof_imgLab span{
    border: 8px;
    background-color:#313131 ;
    padding: 6px;
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
  #settings .center {
        height: auto;
    }

    #settings .center input {
        display: none;
    }

    #settings .center label.profile-photo-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    #settingsBtn{
       position: relative;
      
    }
    #settingsBtn span{ font-size: 15px;
        padding: 8px;
        left: 40px;
        border-radius: 6px;
        background-color: #111;
        border-radius: 1px solid gainsboro;
    }

    #settings .center img {
        border-radius: 32px;
        height: 80px;
        width: 80px;
        background-color: #fff;
    }

    #settings .center span {
        margin-top: 8px;
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
    #small_screen_icon{
        display: block;
    }
    .nav{
        border-left: none;
        border-right: none;
        width: 100%;
    }
    .leftbar{
        display: none;
    }
    #logOut{
        margin-bottom: 50px;
    }
    .posts{
        padding: 10px 0px;
        margin-bottom: 100px;
        border: none;
    }
    .post-container ,.reply-container,.con_form{
        border-radius: 0px;
    }
    .post-container{
        padding: 0;
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
   
    
}
.form-comment button{
    left: 43%;
}
.con_form .post_header{
    display: flex;
    width: 100%;
    
    margin-left: -1%;
}
.con_form .post_header select{
    width: fit-content;
}
.react-emojis{
    left: 5px;
    top: -25px;
    z-index: 100;
}
.react-emojis img{
    width: 25px;
}

body{
    opacity: 1;
}
.switch small{
font-size: 10px;
position: relative;
top: -5px;
left: 10px;
}
#emojiContainer{
    display: none;
}
.main-content{
    margin-left: 0;
}
.img_post img{    
    border: 1px solid #121212;
    border-radius: 10px;
   max-height: 400px;
   width: 100%;
}
#emojiContainer{
    display: none;
}
  }
  
 
  </style>