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
        <div class="nav">
            <h3>Profile</h3>
        </div>
        <?php $user_page = 'all'; 
?>
<div class="posts">
    <div class="con_form">  
                <div class="post_linkups" id="post_linkups">
                   <img src="../images/users/<?= $user['profile_pic'] ?>" alt="" class='icons'>
                   <p><?= $user['username']?></p>
                </div>
            <small id='privacy_msg' class='privacy_msg'>
                Feel Free to say whats in your mind..Your <a href="../privacy/privacy.html" style="color:blueviolet"> privacy</a> is all urs
            </small> 
 <a href="settings.php" id='settingsBtn'>   <span > Settings</span></a> 
    </div>
   
<!--...............------------------- Now Posting --------------------------------------------------------------->

<?php foreach($posts_User as $post){ ?>
        
    
        <div class="post-container">
            <div class="post-head">
            <div class="heading-post">
            <img src="../images/incognito.png" alt="anonymouse" class="icons"> <span><?= $post['date_created'] ?></span>   
            </div>
                <div class="head-dots">
                    <div>
                      <small>.</small><small>.</small><small>.</small>   
                    </div>
                   
                </div>
            </div>
    <div class="post-box">
    <?php if($post['post_pic'] != ''){?> 
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <?php } ?>
        <a href="../singlePosts/singleposts.php">
        
        <p <?php if(strlen($post['post_body']) < 60){echo "style='font-size:48px'";}
                    elseif(strlen($post['post_body']) <45){echo "style='font-size:58px'";}
        
        ?>> <?= $post['post_body'] ?></p>
        </a>
       - <?= $post['location'] ?>  
    </div>
    
        </div>
        <?php } ?> 
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
                <p>Go <a href="../index/index.php">Log In</a> </p>
            </div>
        </div>
    </div>
</body>
<?php }?>