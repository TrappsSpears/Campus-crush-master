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
        <div class="conFess_icon" id='small_screen_icon'>
        <h2><span><img src="../images/witterLogo2.png" alt="W" class='icons' style="left:-10px;margin-left:10px">Profile</span></h2>
        <p> Speaking Unspoken Stories</p>
    </div>
         
        </div>
        <?php $user_page = 'all'; 
?>
<div class="posts">
    <div class="con_form">           <div>
             <a href="settings.php" id='settingsBtn'>   <span > Settings</span></a>     
            </div> <a href="settings.php" id='settingsBtn'> 
                <div class="post_linkups" id="post_linkups">
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $user['profile_pic'] ?>" alt="" class="icons" >
                    <?php } else{ ?> 
                        <img src="../images/profile-user.png" alt="" style="filter: invert(100%);" class="icons" >
                        <?php } ?>
                 
                   <p><b> <?= $user['name']?></b> <small style='color:gray'>@ <?= $user['username']?></small> - <small> <?= $user['school']?> </small></p>
                </div> </a>
            <small id='privacy_msg' class='privacy_msg'>
                Feel Free to say whats in your mind..Your <a href="../privacy/privacy.html" style="color:blueviolet"> privacy</a> is all urs
            </small> 
            
    
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
    <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
    <?php if($post['post_pic'] != ''){?> 
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <?php } ?>
      
        
        <p> <?= $post['post_body'] ?></p>
        </a>
       - <?= $post['location'] ?>  
    </div>
    <div class="engage_btn">
        <form action="../classes_incs/deletepost.inc.php" method="post">
        <input type="hidden" value="<?=$post['post_pic'] ?>" name="post_pic">
            <input type="hidden" value="<?=$post['post_id'] ?>" name='post_id'>
            <button name='submit'> <small>X</small> Delete</button>
        </form>
    </div>
    <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        
            

            <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM likes WHERE post_id = ?;";

            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array( $post_id))){
                $result = null;
            }else{
                $results = $result->fetch(PDO::FETCH_ASSOC);
                
                    $sql = "SELECT type FROM likes WHERE post_id = ?;";
                    $result = $dbh->connect()->prepare($sql);
                    if(!$result->execute(array($post_id))){
                        $result = null;
                    }else{
                        $resultsall = $result->fetchAll(PDO::FETCH_ASSOC);}
                    ?>
                    <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM comments WHERE  post_id = ?;";

            $resultC = $dbh->connect()->prepare($sql);
            if(!$resultC->execute(array($post_id))){
                $resultC = null;
            }else{
                $count= $resultC->fetch(PDO::FETCH_ASSOC);}
               
                    ?>
                <div class="post_insights">
                    <span id='comment'><img src="../images/bubble-chat.png" alt=""><small><?= $count['total']?></small></span>
                    <span id = 'bookmark'><img src="../images/saved.png" alt=""><small>0</small></span>
                        <span id='reaction_emoj'>
                    <?php foreach($resultsall as $type){ ?> 
                    <img src="../images/<?php echo $type['type'];?>.png" alt="<?= $type['type'] ?>" class='icons'>  
                       
                        <?php } ?>
                        
                   <small> <?php if($results>0){ ?>
                    <?= $results['total']; ?> <?php } ?></small></span>
                
              
                     </div>      
            <?php } ?>
            </a>
    
        </div>
        <?php } ?> 
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