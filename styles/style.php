<style>
@import url('https://fonts.googleapis.com/css2?family=Clicker+Script&family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
:root{
--bg-default-dark: #000;
--bg-light:#f2f2fc;
--text-default:#f2f2f2;
--text-light:#000;
--bg-trends-dark: rgb(25, 27, 32, 0.616);
--bg-trends-light:rgba(119, 127, 148, 0.616);
--brd-dark:#222;
--brd-light:#888;
}
*{  
    
    font-family: 'Poppins' sans-serif;
    padding: 0;
    margin: 0;
    outline: none;
    box-sizing: border-box;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
#data_witt{
    margin-left: 10px;
border-radius: 6px;
    border: 1px solid #333;
    margin-top: 10px;
}
.reported{
    padding: 6px;
    border-radius: 6px;
    max-height: 400px;
    min-height: 100px;
    overflow-y: scroll;
    border: 1px solid #333;
}
#data_witt h2{
    font-size: 20px;
    padding: 6px;
    margin-bottom: 10px;
    width: fit-content;
}
.report-section{
    border-radius: 6px;
    padding: 6px;
    border: 2px solid #333;
    margin-bottom: 10px;
    width: fit-content;
}
.report-section label{
    display: block;
}
body{
    background-color: var(--bg-default-dark);
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    color: var(--text-default);
    min-width: 200px;
    overflow-x: hidden;
}
input,textarea,button,a,select{
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
::-webkit-scrollbar {
    display: none; /* Hide the scrollbar on Webkit-based browsers (e.g., Chrome, Safari) */
}
.noProf{
    border:none;
    width: 30px;
    height: auto;
}

.nav-a{
   
    display: flex;
    min-width: 10px;
}
::selection {
  background-color: yellow;
  color: inherit; /* Optionally, you can set the text color to the default color */
}
a{
     color: inherit;
    text-decoration: none;
}
a:focus,a:visited,a:active{
    outline: none;
}

a:focus, a:active {
  background-color: transparent;
  outline: none;
  -webkit-tap-highlight-color: transparent;

  /* Override focus styles in Chrome and Safari */
  -webkit-focus-ring-color: transparent;
}
/* Main things */
.main{
    display: flex;
    justify-content: center;
 
}
/* Side-Bar */

.conFess_icon h2{
    display: flex;
    margin-bottom: 10px;
    font-size: 35px;
    margin-left: -10px;
}


.conFess_icon img {
    width: 40px;
    margin-right: 5px;
    position: relative;
    top: 5px;
}
.conFess_icon small{
    background-color: rgb(0, 101, 196);
    padding: 5px;
    border-radius: 30px;
    height: 4px;
    position:relative;
    top: 15px;
    margin-right: 10px;
    box-shadow: 2px 2px 3px 0px black;
   
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
    font-size: 14px;
    left: 0;
    padding: 8px;
    
}
#info_App{
    line-height: 1.8;
    position: relative;
    font-size: 14px;
    text-align: left;
    margin-top: 10px;
}
.footer-about a{
    color: #880281;
}
.sidebar-nav{
   flex: 0.2;
   height: 100vh;
  max-width: 24%;
    padding: 50px 40px;
   
position: fixed;
left: 0;
top:0;
z-index: 400;

}
.prof_i{
    background-color: #1e90ff;
    font-weight: 700;
    font-size: 20px;
 
}
.sidebar-nav ul div{
    display: flex;
    margin-left: -20px;
}
.sidebar-nav ul li{
    list-style: none;
    padding: 12px 20px;
    margin-top: 10px;
    border-radius: 42px;
    font-size: 25px;
    margin-right: 20px;
    cursor: pointer;
    display: flex;
   max-width: fit-content;
    overflow: hidden;
    text-overflow: ellipsis;
    height: 53px;
  
}
.sidebar-nav ul li img{
    margin-right: 10px;
    width: 25px;
    height: 25px;
    position: relative;
    
}
.sidebar-nav ul .active li{
    color: var(--text-default);
    font-weight: 600;
    }
    .sidebar-nav ul .active span{
        background-color: #212121;
    animation: span 1s infinite linear;
    }
.sidebar-nav ul li:hover{
    transition: 0.3s ease;
    background-color: #111;
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
    top: 35px;
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
    padding: 10px;
    padding-left: 30px;
    display: grid;
    grid-template-columns: auto auto auto auto;
    background-color: var(--bg-default-dark);
}
.footer_items div{
    border-radius: 32px;
    width: 60%;
    max-width: 60px;
    min-width: 40px;
    cursor: pointer;
padding: 4px;
    text-align: center;
}

 .icons-nav{
    width: 20px;
    transform: scale(1.4);
}
.footer_items .icons{
width: 20px;
    height: auto;
    border-radius: 63px;
}
.icons-active img{
    padding: 3px;
    border-bottom:4px solid #1e90ff;
    border-radius: 3px;
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
    color: var(--text-default);
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
    max-width: 600px;
    line-height: 1.5;
    text-align: center;
    justify-content: center;
    height: 100%;
    min-height: 100vh;
    padding-bottom: 70px;
 justify-content: center;
 margin-left: 24%;
 position: relative;
border-left: 1px solid var(--brd-dark);
border-right: 1px solid var(--brd-dark);
     
}

.nav{
    width: 100%;
    z-index: 100;
    text-align: left;
    position:sticky;
    top: 0;
    padding: 5px;
    border-bottom: 2px solid var(--brd-dark);
    background-color: var(--bg-default-dark);
    min-width:300px;
}
#nav{
    border-bottom: none;
}
#navOther{
    padding-bottom: 20px;
}
.nav .icon{
    position: absolute;
    text-align: center;
    margin-left: 5%;
    margin-top: 5px;
   margin-bottom: 30px;
    display: none;
}
.nav .icon .icons{
    width: 30px;
}
 .home_opt{
    display: grid;
    grid-template-columns: auto auto;
   font-weight: 700;
   
}
.home_opt div span{
    padding-bottom: 5px;
    color: #777777b6;
}
.home_opt .active-home{
    border-bottom: 4px solid #1e8fffe2;
    border-radius: 3px;
    color: var(--text-default);
}

 .home_opt div{
padding-top: 10px;
padding-bottom: 10px;
    text-align: center; 
    margin-top: 15px;
    cursor: pointer;
    border-radius: 6px;
}
.home_opt div:hover{
    background-color:  var(--bg-trends-dark);
    backdrop-filter: blur(42px);
}
 .home_opt div p{
    padding: 4px;
    text-align: center;
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
#unW{
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
#search-conts{
    padding: 10px 4%;
}
#search-conts .trends{
    max-width: 600px;
   min-width: 200px;
}
 .search_place{
    padding: 6px 10px;
   display: flex;
   font-size: 16px;
   width:100%;
   background-color: var(--bg-trends-dark);
   border-radius: 63px;
   justify-content: center;
   margin-top: 10px;

}
.search_place img{
    width: 17px;
}
.search_place button{
    padding: 4.3px 10px;

    border:none;
   
    font-size: 25px;
    background-color: transparent;
    border-radius: 6px;
    color: var(--text-default);
    border-radius: 0px 63px 63px 0px;
    position: relative;
    
    
}
 .search_place input{
    width: 100%;
   border: none;
    font-size: 18px;
     position: relative;
     top: 6px;
     color: var(--text-default);
background-color: transparent;
   
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
            width: 25%;
            height: 5px;
            border-radius: 10px;
            display: none;
            position: absolute;
        margin-top: -35px;
              margin-left: 51%;  
            
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
    margin-right: -5px;
    width: fit-content;

}
#emojiContainer img{
    width: 25px;
}

#emojiMenu {
    position: absolute;
    margin-top: -50px;
    grid-template-columns: auto auto auto auto auto auto auto auto auto ;
    border: 1px solid #ccc;
    padding: 5px;
    margin-left: 70px;
    background-color: var(--bg-default-dark);
    box-shadow: 0px 2px 5px 0px white;
    z-index: 100;
    border: 6px;
    display: none;
    cursor:default;
        border-radius: 6px;
        max-height: 400px;
        overflow-y: scroll;
}
#emojiMenu small{
    cursor: pointer;
    font-size: 26px;
}
#label_upload{
    margin-right: -5px;
}
#emojiButton {
    width: 30px;
    height: auto;
    
}
.story{
    
    width: 100%;
    overflow-x: scroll;
    display: grid;
    grid-template-columns: auto auto auto auto auto auto;
    gap: 10px;
    text-align: left;
    padding: 10px;
  
}
.story-container{
    height: 190px;
    border-radius: 6px;
    overflow: hidden;
    width: 200px;
}
.story-container .icons{
    position: relative;
    top:-40px;
    left: 15px;
    margin-top: -20px;
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 63px;
    border: 4px solid var(--bg-default-dark);
}
.story-container .cover img{
    width: 100%;
    height: 180px;
    object-fit: cover;
    position: relative;
    border-radius: 6px;
    filter: brightness(60%);
}
.story-container p{
    text-align: center;
    padding: 6px;
    width: 100%;
    position: relative;
    margin-top: -90px;
    font-weight: 600;
    margin-left: 15px;
}
.con_form{
text-align: left;
    padding: 20px 5PX;
    border-bottom: 1px solid var(--brd-dark);
    width: 100%;
    margin-top: 5px;
    min-width: 200px;
    
}
 #theme_input{
    border-radius: 6px;
    border: 2px solid var(--brd-dark);
    font-size: 15px;
    width: 40%;
    margin-left: 15px;
    margin-top: 10px;
    margin-bottom: 30px;
}
#create{
    background-color: #fff;
    color: var(--bg-default-dark);
}
#loadingBarPost {
            display:none ; /* Initially hide the loading bar */
            
            padding: 2px;
            border-radius: 65px;
            font-size: 10px;
            background-color: #1e90ff;
            animation: loadingAnimation 1.5s infinite;/* Blue background color */
        }

      

        /* Keyframes for the loading animation */
        @keyframes loadingAnimation {
            0% {
                width: 0;
            }
            100% {
                width: 100%;
            }
        }
.con_form textarea{
    padding: 10px 13px;
    position: relative;
    font-size: 25px;
    background-color:  inherit;
    resize: none;
    border: none;
    color: var(--text-default);

    margin-top: -10px;
   width: 100%;
    height: 40px;
    outline: none;
    border-radius: 38px;
  overflow: hidden;
    
}
.custom-select{
    margin-top: 10px;
    text-align: left;
    margin-left: 10%;
    display: none;
    margin-bottom: -50px;
}
select{
    background-color:var(--bg-trends-dark) ;
    width: fit-content;
    border-radius: 32px;
    color: white;
    border:none;
    font-weight: 400;
    max-width: 100%;

}
select option{
    background-color: #121212;
    padding: 6px;
    font-size: 16px;
    border: 2px solid #201f1f;
}
.custom-select select{
    padding: 4px 6px;
    width:fit-content;
    position: relative;
    top: -50px;
   
    font-weight: 700;
}
.cancel_post{
    border-radius: 8px;
    padding: 6px;
    color: gainsboro;
     background-color: var(--bg-default-dark);
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
    padding-left: 10px;
}

.switch{
    position: relative;
    border-radius: 6px;
   color: gray;
   width: auto;
    display: flex;

}
.switch img{
    position: relative;
    left: -3px;
}
.uploaded_img{
    position: relative;

    width: 74%;
    left: 18%;
}
#upload_cover{

    margin-bottom: 30px;

    margin-left: -40px;
}
#upload_cover small{
    position: absolute;
  margin-left: 150px;
    color: #333;
}


#upload_profile_pic{
    display: none;
}

.uploaded_img img{
    border: 1px solid var(--brd-dark);
    border-radius: 10px;
   max-height: 450px;
   max-width: 100%;
    object-fit: cover;
    text-align: center;
    object-position: top;
}

.input_img{
    margin-left: 15px;
    display: grid;
    grid-template-columns: 40px auto;
}
.input_img img{
    height: 40px;
    width: 40px;
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
  left: 3px;
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
#caption  , input{
    text-align: left;
    background-color: inherit;
    margin-bottom: 10px;
    outline: none;
    color: var(--text-default);
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
    
    padding: 4px 6px;
}
#theme_form_create{
    display: none;
}
.con_form .post_header{
    margin-top: -15px;
}

.con_form .post_header input{
    width: 90%;
    border: 1px solid #2c2d2e ;
    background-color: inherit;
    border-radius: 8px;
    padding: 6px;
    color: var(--text-default);
    outline: none;
    margin-right: 10px;
}
.create_theme{
    position: relative;
}
.create_theme button{
    padding: 6px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 65px;
    border: none;
    background-color: var(--bg-light);
    color: var(--bg-default-dark);

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
    margin-bottom: -15px;
   margin-top: 10px;
   font-size: 30px;
   margin-left: -40px;

}
.back_btn img{
    width: 25px;
    margin-right: 15px;
    position: relative;
    top: 5px;
}
.back_btn button{ border-radius: 63px;
    border: none;
    padding: 6px 10px;
       font-weight: 600;
    background-color: inherit;
    color: var(--text-default);
    font-size: 16px;
    
}
.con_form button{
    font-size: 16px;
    width:60px;
    
    padding: 8px;
    border-radius: 64px;
    border: none;
    background-color:#1e90ff ;
    cursor: pointer;
    outline: none;
    color: var(--text-default);
    font-weight: 600;
    position: relative;
    left: 55px;
}
.con_form button:hover{
    background-color: rgb(0, 131, 196);
    color: var(--bg-default-dark);
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
    height: auto;
    
    text-align: left;
  min-width: 200px;    
  width: 100%;
  border-bottom: 1px solid var(--brd-dark);
   }
   #profile_pic{
    height: 45px;
    width: 45px;
    border-radius: 32px;
    object-fit: cover;
   border: none;

   }
  
 
   .anymous_prof{
        transform: scale(0.8);
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
    .switch .small{
        font-size: 12px;
    
        color: var(--text-default);
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color:  rgb(25, 27, 32, 0.616);
        transition: 0.4s;
        border-radius: 34px;
        height: 26px;
        width: 55px;
       
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 24px;
        left: 2px;
        bottom: 2px;
        background-color: #1e90ff;
        transition: 0.4s;
        border-radius: 50%;
    }

    input[type="checkbox"]:checked + .slider {
        background: linear-gradient(to bottom, green,green);
    }

    input[type="checkbox"]:checked + .slider:before {
        transform: translateX(26px);
        background-color: var(--bg-default-dark);
    }

   

    input[type="checkbox"]:checked ~ #profile-photo-container {
        display: block;
    }

    #profile-image {
        border-radius: 63px;
        height: 80px;
        width: 80px;
        background-color:var(--bg-default-dark);
        object-fit: cover;
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
    line-height: 1.2;
}

.post-box .post_b{
position: relative;
left: 48px;
    border-radius: 10px;
    padding-bottom: 10px;
    padding-right: 45px;
    margin-bottom: 10px;
    margin-top: -15px;
    width: 99%;


}
.locInfo{
   margin-left: -6px;
}
.post-box p{
   margin-bottom: 10px;
    font-style: thin;
    font-size: 17px;
    overflow: hidden;
    text-overflow: ellipsis;   
   line-height: 1.5;
   padding: 0 10px;
  margin-top: 10px;
    
}
#post-bAllP{
    max-height: 355px;
    overflow-y:scroll;
    text-overflow: ellipsis;
    
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
    font-size: 15px;

    border-radius: 6px;
    color: gray;
    margin-right: 10px;
}

.post-box h4{
    padding-left: 10px;
}
.img_post{
    margin-left: 10px;
}
#img_post img{
    width: 80%;
    height: auto;
    margin-top: 25px;
}

.img_post img{    
    border: 1px solid #121212;
    border-radius: 10px;
   max-height: 450px;
   max-width: 100%;
    border-radius:10px ;
    margin-bottom: 10px;
    
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
    cursor: pointer;
}
.engage_btn{
    text-align: left;
    margin-top: 10px;
    margin-left:15px;
}
.engage_btn img{
    width: 15px;
    position: relative;
    margin-right: 10px;
    top: 4px;
}
.post_insights{
    padding-left: 50px;
    margin-top: -15px;
    color: gray;
}

.post_insights #comment img{
   
    position: relative;
    top: 5px;
    width: 15px;
}
.post_insights small{
    left: 2px;
    background-color: inherit;
}
 #reaction_emoj img{
    width: 15px;
    margin-left: -13px;
    position: relative;
    left: 8px;
    top: 4px;
}
.post_insights #bookmark img{
    filter: invert(10%);
    position: relative;
    top: 2px;
}

.post_insights small{
    position: relative;
    font-size: 15px;
    top: 3px;
    color: gainsboro;
    padding: 4px 4px 4px 6px;
    border-radius: 43px;
}
.thot{
    padding: 10px ;
    font-size: 15px;
    cursor: pointer;
    color: gray;
    text-align: left;
    display: grid;
    grid-template-columns: auto auto auto auto;
    
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
    color:var(--text-default);
    font-weight: 700;
    
}
.heading-post  #post_info #name{
    color: gray;
   margin-left: 0px;
}
#name b{
    font-weight:600;
}
.heading-post  #post_info small{
    position: relative;
    top: -3px;
    font-weight: 800;
}
.heading-post small{
    color: gray;
}
 .head_post_el{
    font-size: 13px;
    border-radius: 32px;
    margin-left: -40px;
    padding: 6px;
    width: fit-content;
    position: relative;
   

}
 .head_post_el .icons{
    width: 15px;
    position: relative;
    left: 65px;
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
    color: var(--text-default);
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
    border-top: 1px solid var(--brd-dark);
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
    color: var(--text-default);
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
    
    margin-left: -10px;
    margin-top: 10px;
}

.icons {
    width:25px;
    height: auto;
}

.react-emojis{
    display:grid;
    grid-template-columns: auto auto auto auto auto auto auto;
    gap: 10px;
    width: 300px;
    position: relative;
    padding: 8px 10px;
    min-width: 300px;
    z-index: 400;
    border-radius: 90px;
    margin-top: 10px;
    box-shadow: 0px 2px 16px 0px #1a1a1a;
    margin-left: 10px;
    margin-bottom: 10px;
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
    font-size: 16px;
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
    color: var(--text-default);
}
.bookmark{
    position: absolute;
    margin-top: -35px;
    margin-left: 75%;
    display: flex;
    gap:20px;

}
.bookmark button{
    background-color: inherit;
    border: none;
   
    margin-bottom: 10px;
}
.bookmark img{
    width: 20px;
    
}

.form-comment button:hover{
    background-color: #ff9b05;
    box-shadow: 2px 2px 3px 0px black;
    transition: 0.2s ease;
}
.form-comment button{
    width: 20%;
    cursor: pointer;
    background-color: #1e90ff;
    border-radius: 8px;
    border: none;
    border-left:1px solid var(--bg-default-dark);
    height: 35px;
    color: var(--text-default);
    font-weight: 600;
    position: relative;
    left: 20%;
}
.form-comment{
    z-index:100;
}
.comments_posts{
    text-align: left;
    border-left:2px solid var(--brd-dark);
    padding-left: 25px;
    width:93%;
    margin-left: 37px;
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
    width: 80%;
}
.comments_posts img{
    width: 20px;
    margin-left: 10px;
    cursor: pointer;
}
.replys{
    gap: 10px;
    display: flex;
    
    font-size: 15px;
    max-width: 300px;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 22px;
    text-align: left;
}
.replys #profile_pic{
    width: 30px;
    height: 30px;
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
    color: gray;
    font-size: 11px;
}
.reply_com{
    margin-left: 20px;
    margin-top: 10px;
}
.reply_com button{
    background-color: inherit;
    border: none;
    border-radius: 6px;
    color: var(--text-default);
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
    
    color: var(--text-default);
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
    margin-top: -5px;
}
.comOpt select{
    padding: 4px 6px;
    margin-left: 24px;
  
}


.comOpt #emojiContainer{
    position: relative;left: 0;
    z-index: 100;
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
    color: var(--bg-default-dark);
    font-weight: 600;
}
.close-btn:hover{
    transform: scale(1.2);
    transition: 0.3s ease;
    background-color: #242323;
    color: var(--text-default);
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
    color: var(--text-default);
   
}
.input-reply button{
    padding: 10px;
    border: none;
    margin-top: -8px;
    background: #880281;
    border-radius: 12px;
    width: 70px;
    font-weight: 600;
    color: var(--text-default);
    cursor: pointer;
    box-shadow: 2px 3px 4px 0px black;
}
/* Main things End */
/*Left bar*/
.leftbar{
    width: 800px;
    padding: 40px;

    padding-bottom: 80px;
}
#leftbar-content{
    position: sticky;
    top: 0;
  
}

#search_place input{
    width: 100%;

}
#search_place {
    
    margin-bottom: 10px;
}
.search-con{
    width: 100%;
    padding: 6px;
    background-color: var(--bg-default-dark);
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

.profileContainer .cover{
    width: 100%;
}
.profileContainer .cover img{
    width: 100%;
    height: 400px;
    object-fit: cover;  
    object-position: top;
}
.profileContainer .img_profile {
    text-align: left;
    margin-top: -140px;
    display: flex;
}
.profileContainer .img_profile img{
    margin-left: 15px;
    background-color: var(--bg-default-dark);
    width: 120px;
    height: 120px;
    padding: 6px;
    border-radius: 63px;
    object-fit: cover;
}
.profileContainer .img_profile #img{
    width: 12px;
    height: auto;
    border-radius: 0px;
    margin: 0;
    padding: 0;
}
.nav_prof{
    margin-bottom: -20px;
    display: none;
    text-align: right;
}
#nav_prof{
    margin-bottom: 10px;
    margin-top: 5px;
}
#nav_prof img{
    width: 25px;
}
.nav_prof img{
    width: 30px;
    margin-right: 10px;
}
.profileContainer .info{
   padding: 20px;
    font-size: 20px;  
    width: fit-content;
   text-align: left;
}
.profileContainer .social{
    display: flex;
    gap: 15px;
    padding: 12px;
    margin-top: -10px;
}
.profileContainer .home_opt{
    display: grid;
    grid-template-columns:auto auto auto  ;
    border-bottom: 1px solid var(--brd-dark)
}
.profileContainer{
    text-align: left;
}

.follow_btn {
    text-align: left;
    margin-top: 15px;
    margin-left:15px;
}
.info  button{

    font-size: 15px;
    padding: 6px 12px;
    font-weight: 600;
    background-color: var(--text-default);
    color: black;
    border-radius:66px;
    border: none;
}

#group_info {
 margin-bottom: 15px;
}
#group_info .home_opt{
    border-bottom: none;
}

#group_info .post_b p{
    max-height: 180px;
    border-bottom: 2px solid purple;
    padding-bottom: 10px;
    overflow-y: scroll;
    margin-bottom: 10px;
}
#group_info .post_b{
    backdrop-filter: blur(43px);
    padding: 6px;
    margin-top: 20px;
    margin-left: 130px;
    position: absolute;
    max-width: 60%;
    min-width: 40%;
    height: 250px;
    border: 2px solid purple;
    border-radius: 6px;
}
.profileContainer .info small{
    font-size: 15px;
    color: gray;
    font-weight: 700;
}

.profile, .settings{
    padding: 10px;
    cursor: pointer;
    background: var(--bg-default-dark);
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
    background-color: var(--bg-default-dark);
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
    color: var(--text-default);
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
    background-color: var(--bg-trends-dark);
    margin-top: 12px;
    border-radius: 10px;
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
    color: gray;;
    font-size: 14px;
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
    color: var(--text-default);
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
    width: 95%;
    margin-bottom: 100px;
    
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

/* Tablets */
@media only screen and (min-width: 700px) and (max-width: 1023px) {
    /* CSS styles here */
    .main-content{
        padding-left: 10px;
        border: none;
        margin-left: 0;
    }
    #unW{
    display: block;
}
.footer_items{
    grid-template-columns: auto auto auto auto auto auto;
}
#comments-container-mob{
    margin-top: -100px;
}
    .nav{
        border-left: none;
        border-right: none;
     
    }
    .home_h2{
        display: none;
    }
    #small_screen_icon{
        display: block;
    }
    
    .leftbar{
        width: 300px;
    }
    .leftbar .emojis{
        display: none;
    }
    .sidebar-nav{
       display: none;
    }
   
    nav{
        margin-left: -20px;
    }
    .con_form{
        padding: 0;
        padding-top: 10px;
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
    
    margin-bottom: 100px;
    border: none;
}

.con_form .post_header{
    display: flex;
    width: 100%;
    text-align: center;
    margin-top: 10px;
    margin-left: 1%;
}
.nav_prof{
    display: block;
    margin-left: 120px;
    margin-bottom: 20px;
}

.nav .icon{
    display: block;
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
    width: 60px;
    border-radius: 32px;
    height: 60px;
    object-fit: cover;
    border: none;
  }
  
  
  #settings{
    padding: 12px
  }
  #settings .post-container{
    text-align: center;
    padding: 10px;
  border: 1px solid #333;
  border-radius: 6px;
  margin-bottom: 10px;
  }
  #settings #update div{
    display: flex;
    gap: 10px;
    justify-content: center;
  }
  #soclials {
    margin-bottom: 10px;
  }
  #soclials .select{
    margin-top: -10px;
  }
  #soclials select{
    margin-left: 20px;
    color: white;
    border: none;
  }
 
  #soclials .post_header{
    margin-top: 15px;
  }
  #soclials button{
    width: fit-content;
  }
  #soclials input{
    width: 80%;
    margin-left: 13px;
    border: none;
  }
  #settings .post-container input {
    width: fit-content;
    
  }
  #settings .post-container button{
    width: fit-content;
    padding: 4px;
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
  
    #settingsBtn span{ font-size: 15px;
        padding: 8px;
        left: 40px;
        background-color: #111;
        border-radius: 6px;
        border: 2px solid gainsboro;
        width: fit-content;
        margin-top: -30px;
    }

    #settings .center img {
        border-radius: 64px;
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
    color: var(--text-default);
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
    color: var(--text-default);
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
        backdrop-filter: blur(44px);
    }
    .home_h2{
        display: none;
    }
    .leftbar{
        display: none;
       
    }
    #logOut{
        margin-bottom: 50px;
    }
    .posts{
        
        margin-bottom: 100px;
        border: none;
    }
    
    .post-container ,.reply-container,.con_form{
        border-radius: 0px;
    }
    .post-container{
        padding: 0;
        width: 100%;
    }
    #comments-container-mob{
    margin-top: -100px;
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

.con_form .post_header{
    display: flex;
    width: 100%;
    
    margin-left: -1%;
}
.con_form {
    width: fit-content;
    width: 100%;
}



body{
    opacity: 1;
    
    overflow-x: hidden;
}


.main-content{
    margin-left: 0;
    
    border: none;
}
.img_post img{    
    border: 1px solid #121212;
    border-radius: 10px;
   max-height: 400px;
   max-width: 100%;
   object-fit: contain;
   object-position: left;
}
.nav .icon{
    display: block;
}
#name{
    font-size: 13px;
    width: 10px;
}
#emojiContainer {
    display: none;
}
.nav_prof{
    display: block;
    margin-left: 120px;
}
.react-emojis{
    margin-top:110px;
}
  }
  @media only screen and (max-width: 400px) { 
    #name b{
    display: none;
}

  }
  
 
  </style>