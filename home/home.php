<?php 
$page = 'home';
$pagee = 'forYou';
include_once('../includes/headall.php');
include('indexstyles.php');
?>


<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
 
    <div class="nav">
      <div class="icon">
        <img src="../images/witterlogo.png" alt="" class='icons'>
      </div>
      <div class='nav_prof' id='nav_prof'>
        <a href="../bookmarks/bookmarks.php"> <img src="../images/star(1).png" alt="Starred" ></a>
        <a href="../Messages/message.php"> <img src="../images/envelope-dot(1).png" alt="messages" ></a>
        <a href="../Groups/groups.php"><img src="../images/users.png" alt=""></a>
    </div>
      <div>
        <h2 class='home_h2'> <span >Home</span> </h2>
      </div>
<div id="scrollButton" class="scroll-button">
    <button onclick="scrollToTop()">Back to Top</button>
  </div> 
<div class="home_opt">
  <div>
    <p id='active-home'> <span class='active-home'>For You</span> </p>
  </div>
  <a href="../location/location.php?place=<?= $_SESSION['school'] ?> ">  <div>
   <span> <?= $_SESSION['school'] ?> </span>
  </div></a> 
</div>
    
</div>
<div id='highlights'>

</div>
<!-- 
Main Content Here -->
<script>
// Function to fetch and insert content into the leftbar
function loadHighlights() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','highlights.php',true);

         
         // Insert the fetched content into the specified element

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('highlights');
      leftbarContentElement.innerHTML = this.response;
    }else{
      alert('error')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadHighlights();
</script>
<div class="con_form">
      
         

       
<form action="../classes_incs/posting.inc.php" method='Post' enctype="multipart/form-data" id='myForm'>
        <div class='input_img'>
            <div class='userImg'>
                <?php if($_SESSION['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $_SESSION['profile_pic'] ?>" alt="">
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="" class="noProf" style="filter: invert(100%);border:none">
                        <?php } ?>
               
            </div>
            
            <div>
               <textarea id="post_choice" placeholder="What Happened..?! " name="post" required minlength="20"></textarea> 
               <div class="progress-container" id='prog_div'>
        <p id="remainingChars">600</p>
        <div class="progress-bar" id="progressBar"></div>
    </div> 
                  <div class="custom-select">
                   <select id="themeSelect" name="theme" required >
            
          <option value="Confessions">Confessions and Secrets</option>
          <option value="Relationships">Relationships and Dating</option>
          <option value="Whistle Blow">Whistle Blow</option>
          <option value="Advice">Advice and Support</option>
          <option value="Humor">Funny Stories and Humor</option>
          <option value="Career">Career and Education</option>
          <option value="Events">Local Events and News</option>
          <option value="Business">Local Business And Deals</option>
          <option value="other">Unspecified</option>
      </select>
        <input type="button" class='cancel_post' value='Cancel'>
         
      
     
                  </div>   
            
            </div>
               
            
        </div>
     
    <div class="uploaded_img">
        <img src="" alt="" id='post-image'>
    </div>
      
        <div class='post_header'>
        
        
           <div style='display:flex; gap:10px'>
            <div>
            <select name="location" id="location">
              
              <option value="<?= $_SESSION['school'] ?>">@<?= $_SESSION['school'] ?></option>
      
              <option value="<?= $_SESSION['city'] ?>">@<?= $_SESSION['city'] ?></option>
           
          </select>
        
            </div>
            
                
              <div id="emojiContainer">
              <img src="../images/smile.png" alt="" class='icons' id="emojiButton" > 
              <div id="emojiMenu">
            <!-- Emoji buttons will be added dynamically using JavaScript -->
        </div>
              </div>
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                    <label for="upload_profile_pic" id='label_upload'> <img src="../images/gallery.png" alt="" class='icons'></label>
                    <input type="file" name='post_pic' id='upload_profile_pic' accept="image/*">
                
                
               
                
                    <div class='switch'>
                       
                    
            <div>
                <div>
                   <label class="toggle-switch">
                <input type="checkbox" name="show_profile" value="yes" checked>
                <span class="slider"></span> 
                </div>
               
              
            </label> 
            <div class="small">
                <small>Anonymous</small>
            </div>
            </div> 
                    </div>
            
        </div>
        
            <div>
                <button name='submit' type ='button' id='submitButton'>Post</button>
            </div>
            
        </div>
        
        </form>
        <div id="loadingBarPost">
        Posting
    </div>

<!-- Response message container -->
<div id="responseMessage"></div>
      <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm");
    const submitButton = document.getElementById("submitButton");
    const loadingBar = document.getElementById("loadingBarPost");
    const linksInForm = document.querySelector("a");
    const postChoice = document.getElementById("post_choice");
    const postImage = document.getElementById("upload_profile_pic");
    const profileImage = document.getElementById('post-image');

    submitButton.addEventListener("click", function () {
        // Hide the form and show the loading bar
  
        if (postChoice.value.trim() === "" && postImage.files.length === 0) {
            alert("Textarea and/or file input cannot be empty.");
            return; // Prevent form submission if validation fails
        }
        form.style.display = "none";
        loadingBar.style.display = "block";
        setTimeout(function(){
          form.style.display = 'block'; 
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 5000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
  
        xhr.open("POST", "../classes_incs/posting.inc.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

        xhr.onload = function () {
                    if (xhr.status === 200) {
         
             
                // Show the form again and hide the loading bar
                loadPosts();
                linksInForm.style.pointerEvents = 'all';
                // Reset the form if needed
                form.reset();
            } else {
                // Handle other HTTP status codes or errors here
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };

        xhr.send(formData);
        
    });
});


    </script>
      <div class="footer-about" id='info_App'>
         Share Stories - Share Ideas - Ask Ques - Engage - Whats On Your Mind - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a>
      </div> 
   
  </div>


<?php if(isset($_GET['loggedin'])){ ?> 
   <style>
    /* CSS for the loader container */
.loader-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: black; /* Semi-transparent background */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Ensure it's on top of other content */
}

/* CSS for the loader animation */
.loader {
    border: 4px solid #3498db; /* Loader color */
    border-top: 4px solid transparent; /* Transparent top border */
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite; /* Animation */
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}  
    </style>
    <div class="loader-container">
        <div class="loader"></div>
    </div>
 <script>

window.addEventListener("load", function () {
    const loaderContainer = document.querySelector(".loader-container");
    loaderContainer.style.display = "none";
});
 </script>
    <div class="post-container" style='margin-top:-10px;'>
    <div class="post-head">
        <div class="heading-post">
    <div class="post-heading-container">
        <div class="heading-post">
            <div class='post-heading'>
                <img src="../images/witterlogo.png" alt="" class="icons" id='profile_pic'> 

                       <div id='post_info'>
                        <div>
                        <b> <span id='username'>Witter</span></b> <span id="name">To you <?= $_SESSION['name'] ?></span> 
                        </div>  
                    </div>   
                
                </div>

        </div>
    </div>
    </div>
    </div>
<div class="post-box">
    <div class="post_b" >    
    <p>
    Welcome, <?= $_SESSION['name'] ?>! Witter - Your Hub for Local Stories and Anonymously Shared Experiences. Dive into the latest buzz from <?= $_SESSION['school'] ?> and communitys in <?= $_SESSION['city'] ?>. If you can't find your location, feel free to check and update your information in the <a href="../userProfile/settings.php" style='color:#880281'>settings</a>. Happy discovering! It's unfiltered, anonymous, and real.
</p>
 <div>
              
       <span class='span-loc'><a href="../Trends/trends.php?location=<?= $_SESSION['city'] ?>">     
       <?= $_SESSION['school'] ?></a> ,<a href="../Trends/trends.php?location=<?= $_SESSION['city'] ?>"><?= $_SESSION['city'] ?></a>
       </span>
                        
    </div>
    </div>
    
   

</div>
</div>
<?php }?>

<div id='posts'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','../includes/postHome.php',true);

         
         // Insert the fetched content into the specified element

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('posts');
      leftbarContentElement.innerHTML = this.response;
    }else{
      alert('error')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadPosts();
</script>

    </div>
    <div class="leftbar">
      <!-- leftbar here -->
      <div class="search-con">
         <form action="../Trends/trends.php" method="get">
    <div class="search_place" id='search_place' style='margin-bottom: 10px;'>
        <input type="text"  placeholder="Search..." id='search' name="word"><button type='submit' required> <img src="../images/search.png" alt="search" class='icons'></button>
    </div></form>
    </div>

    <div class="emojis">
            <div>
            <a href="../Trends/trends.php?reaction=like">   
            <img src="../images/like.png" class='icons' alt="like">
            </a> 
            </div>
            <div>
            <a href="../Trends/trends.php?reaction=shoking">   
            <img src="../images/shocking.png" class='icons' alt="like">
            </a> 
            </div>
            <div>
            <a href="../Trends/trends.php?reaction=love">
            <img src="../images/love.png" class='icons' alt="love">
            </a>    
            </div>
            <div>
                <a href="../Trends/trends.php?reaction=funny">
                <img src="../images/funny.png" class='icons' alt="funny">
                </a>
            </div>
            <div>
                <a href="../Trends/trends.php?reaction=sad" >
                <img src="../images/sad.png" class='icons' alt="sad">
                </a>            
            </div>
            <div>
                <a href="../Trends/trends.php?reaction=fire">
                <img src="../images/fire.png" class='icons' alt="fire">
                </a>
            </div>
        </div>
      <div  id="leftbar-content">
        <!-- Content will be dynamically loaded here -->
    </div>
      <script>
// Function to fetch and insert content into the leftbar
function loadLeftbarContent() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','../includes/leftbar.php',true);

         
         // Insert the fetched content into the specified element

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('leftbar-content');
      leftbarContentElement.innerHTML = this.responseText;
    }else{
      alert('error')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadLeftbarContent();
</script>

    </div>


    </div>
  <?php include('../includes/footer.php') ?>
  <script>
// Show the scroll button when user scrolls down and hide when scrolling up
var prevScrollPos = window.pageYOffset;

window.onscroll = function() {
  showHideScrollButton();
};

function showHideScrollButton() {
  var currentScrollPos = window.pageYOffset;
  var scrollButton = document.getElementById("scrollButton");
  
  if (prevScrollPos > currentScrollPos) {
    // Scrolling up
    scrollButton.style.display = "none";
  } else {
    // Scrolling down
    if (currentScrollPos > 5300) {
      scrollButton.style.display = "block";
    } else {
      scrollButton.style.display = "none";
    }
  }
  
  prevScrollPos = currentScrollPos;
}

// Scroll to the top and refresh the page
function scrollToTop() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  location.reload();
}
  </script>
  <?php include('../includes/script.php'); ?>
</body>
</html>