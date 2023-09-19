<?php 
$page = 'profile';
include('../includes/headall.php');
if(isset($_SESSION['user_id'])){ 
    
    $dbh = New Dbh();
    $selectUser = $dbh->connect()->prepare("SELECT * FROM users WHERE id = ?");
    if(!$selectUser->execute(array($user_id))){
        echo 'Failed To Load User';
        
    }else{

        $user = $selectUser->fetch(PDO::FETCH_ASSOC);
        
    }
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
    <img src="../images/users/<?= $user['profile_pic'] ?>" alt="">
  </div>
  <div class="img_profile">
    <img src="../images/users/<?= $user['profile_pic'] ?>" alt="" >
    <div>
    <a href="settings.php" id='settingsBtn'>   <span >Edit Profile</span></a>  
    </div>
    
 
  </div> 
   <div class="info">
    <h4>
      <span><?= $user['username'] ?> <small> <?= $user['name']?></small> </span>
</h4>
    <div>
        <span>You are at <small><?=$user['school']?> . <?=$user['city']?></small></span>
       
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
   <a href="../location/direct.php?place=<?= $user['school'] ?>"> <p> <span >Post A Message</span> </p></a>
  </div>
  
</div>
<!--...............------------------- Now Posting --------------------------------------------------------------->
<?php 
    include('../classes_incs/functionsposts.php');
        
    foreach($posts_User as $post){ 
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].''.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }
        ?>  
        </div>
  
    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
</body>
</html>
<?php }else{ ?>
<body>
    <div class="posts">
        <div class="post-container">
            <div class="post-box">
                <h3>Page Not available</h3>
                <p>Go <a href="../index.php">Log In</a> </p>
            </div>
        </div>
    </div>
</body>
<?php }?>