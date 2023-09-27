<?php 
$page = 'profile';
include('../includes/headall.php');


    ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav" id='nav'>
        <h2>Profile</h2>
        </div>
        <?php $user_page = 'all'; 
?>
<div class="posts">
<div class ='profileContainer'>
  <div class="cover">
    <img src="../images/users/<?= $_SESSION['profile_pic'] ?>" alt="">
  </div>
  <div class="img_profile">
    <img src="../images/users/<?= $_SESSION['profile_pic'] ?>" alt="" >
    <div>
    <a href="settings.php" id='settingsBtn'>   <span >Edit Profile</span></a>  
    </div>
    
 
  </div> 
   <div class="info">
    <h4>
      <span><?= $_SESSION['username'] ?> <small> <?= $_SESSION['name']?></small> </span>
</h4>
    <div>
        <span>You are at <small><?=$_SESSION['school']?> . <?=$_SESSION['city']?></small></span>
       
    </div>
   
  </div>

 
  <div class='nav_prof'>
        <a href="../bookmarks/bookmarks.php"> <img src="../images/star2.png" alt="Starred" ></a>
        <a href="../Messages/message.php"> <img src="../images/envelope-dot(1).png" alt="messages" ></a>
        <a href="../location/location.php?place=<?=$user['school']?>"> <img src="../images/marker(1).png" alt="Location" ></a>
        <a href="../Groups/groups.php"><img src="../images/users(1).png" alt=""></a>
    </div>
  <div class="con_form">  
                
            
                <div class="footer-about" id='info_App'>
        Share Stories - Confess - Share Ideas - <a href="../privacy/report.php"> Report</a> - Engage - Whats On Your Mind - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a> - <a href="../privacy/termsOfService.html"> Terms Of Use</a> -  <a href="../privacy/cookies.html"> Cookie Policy</a> 2023 WitterVerse Corp.
        </div>
    
</div>
    
    </div>
       <div class="home_opt" style="border-bottom: 1px solid #333;">
  <div>
    <p id='active-home'> <span class='active-home'>Posts</span> </p>
  </div>
  <div>
   <a href="../location/direct.php?place=<?= $_SESSION['school'] ?>"> <p> <span >Blow A Whistle</span> </p></a>
  </div>
  
</div>
<!--...............------------------- Now Posting --------------------------------------------------------------->
<div id='posts'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','allPosts.php',true);

         
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
  
    </div>

    <?php include('../includes/lefty.php'); ?>
 
    </div>
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
</body>
</html>
