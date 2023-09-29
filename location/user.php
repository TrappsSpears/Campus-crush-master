<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" id="navOther">
    <h2><div class="back_btn" >
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> <?=$getname ?></button>
    </div></h2>


</div>
<?php if($getname)
{ ?>
<!-- User'sInfo Here -->
<div id='userInfo' >

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadUserInfo() {
   var xhr = new XMLHttpRequest();
   xhr.open('GET','userInfo.php?getdat=<?php echo $getname ?>',true);

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('userInfo');
      leftbarContentElement.innerHTML = this.response;
    }else{
      alert('error Loading postMessage')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadUserInfo();
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
               <textarea id="post_choice" placeholder="<?= $getname ?>...?! " name="post" required minlength="2    0"></textarea> 
               <div class="progress-container" id='prog_div'>
        <p id="remainingChars">600</p>
        <div class="progress-bar" id="progressBar"></div>
    </div> 
                  <div class="custom-select">
                  <select id="themeSelect" name="theme">
             <option value="Whistle Blow">whistle</option>
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
            <select name="location" id="location" required>
                <option value="<?= $getname ?>"> - <?= $getname ?></option>
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
        
    </div>

<!-- Response message container -->
<div id="responseMessage"></div>
      <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm");
    const submitButton = document.getElementById("submitButton");
    const loadingBar = document.getElementById("loadingBarPost");
    const linksInForm = form.querySelectorAll("a");
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

    <div id='posts' >

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('GET','user.inc.php?get=<?php echo $getname ?>',true);

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('posts');
      leftbarContentElement.innerHTML = this.response;
    }else{
      alert('error Loading postMessage')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadPosts();
</script>
        <?php } else{?>

          
           <?php  } ?>
    </div>
    <?php   include('../includes/lefty.php'); ?>

</div>
<?php include('../includes/footer.php') ;
include('../includes/script.php');
?>
</body>
</html>