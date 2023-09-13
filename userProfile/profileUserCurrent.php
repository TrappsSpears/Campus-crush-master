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
    <div class="con_form">  
     <a href="settings.php" id='settingsBtn'> 
                <div class="post_linkups" id="post_linkups">
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $user['profile_pic'] ?>" alt="" class="icons" >
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt=""  class="noProf" >
                        <?php } ?>
                 
                   <p><b> <?= $user['name']?></b> <small style='color:gray'>@ <?= $user['username']?></small> - <small> <?= $user['school']?> </small></p>
                </div> </a>
                <a href="settings.php" id='settingsBtn'>   <span >Edit Profile</span></a>     
            
                <div class="footer-about" id='info_App'>
        Share Stories - Confess - Share Ideas - <a href="../privacy/report.php"> Report</a> - Engage - Whats On Your Mind - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a> - <a href="../privacy/termsOfService.html"> Terms Of Use</a> -  <a href="../privacy/cookies.html"> Cookie Policy</a> 2023 WitterVerse Corp.
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
        
        <div class="footer_">
         <a href="../privacy/about.html">About</a> || <a href="../privacy/privacy.html">  Privacy</a>
        </div>
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