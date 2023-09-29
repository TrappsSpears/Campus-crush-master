<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" id="navOther">
    <h2><div class="back_btn" >
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> <?=$getname ?></button>
    </div></h2>


</div>
<?php if($getname){ ?> 

<div class ='profileContainer'>
<?php if(isset($_GET['cover'])){ ?> 
  <div class="cover">
    <img src="../images/imagePosts/<?= $_GET['cover'] ?>" alt="">
  </div>
  <div class="img_profile">
    <img src="../images/imagePosts/<?= $_GET['cover'] ?>" alt="" >
  </div>
  <?php } ?>
   <div class="info">
    <h4>
      <span>#<?= $getname ?> </span>
</h4>

    <div>
    <?php if(isset($_GET['topLocation'])){?>
   <a href="location.php?place=<?= $_GET['topLocation']?>">   <span>  
    <small> <?php if($getname == 'WhistleBlow'){  ?> 
        <?= $_GET['topLocation']?> <img src="../images/badge-check2.png" alt="king" class="icons" style='width:12px'><?php } ?></small> <?php if(isset($_GET['creator'])){ echo '-'. $_GET['creator'] ?><img src="../images/badge-check.png" alt="king" class="icons" style='width:12px'> <?php } ?></span></a>
      <?php } ?>
      <?php if(isset($_GET['desc'])){?>
        <span><small><?= $_GET['desc']?></small></span>
        <?php } ?>
    </div>
  
  </div>

  
</div>
<div class="con_form">
      
         

       
        <form action="../classes_incs/posting.inc.php" method='Post' enctype="multipart/form-data" id = 'myForm'>
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
             <option value="<?= $getname ?>"><?= $getname ?></option>
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
                <?php if($_SESSION['school']!= ''){ ?> 
                <option value="<?= $_SESSION['school'] ?>">@<?= $_SESSION['school'] ?></option>
                <?php }?>
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
                <button name='submit' type='button' id = 'submitButton'>Post</button>
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

    submitButton.addEventListener("click", function () {
        // Hide the form and show the loading bar
        form.style.display = "none";
        loadingBar.style.display = "block";
        setTimeout(function(){
          form.style.display = 'block'; 
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
   xhr.open('GET','theme.incs.php?get=<?php echo $getname ?>',true);

         
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
        <?php } else{?>

          <h2> Does Not Exist</h2>
           <?php  } ?>
    </div>
    <?php   include('../includes/lefty.php'); ?>

</div>
<?php include('../includes/footer.php') ;
include('../includes/script.php');
?>
</body>
</html>