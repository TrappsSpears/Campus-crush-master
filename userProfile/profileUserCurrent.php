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
        <h2><span><img src="../images/witterLogo.png" alt="W" class='icons' style="left:-10px;margin-left:10px">Profile</span></h2>
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
                        <img src="../images/noProf.jpeg" alt=""  class="noProf" >
                        <?php } ?>
                 
                   <p><b> <?= $user['name']?></b> <small style='color:gray'>@ <?= $user['username']?></small> - <small> <?= $user['school']?> </small></p>
                </div> </a>
            <small id='privacy_msg' class='privacy_msg'>
                Feel Free to say whats in your mind..Your <a href="../privacy/privacy.html" style="color:blueviolet"> privacy</a> is all urs
            </small> 
            
    
    </div>
   
<!--...............------------------- Now Posting --------------------------------------------------------------->
<?php 
    include_once('../classes_incs/functionsposts.php');
        
    foreach($posts as $post){ 
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'];
        $formattedDate = format_post_date($post_date);
        ?>
      
    
    <div class="post-container">
        <div class="post-head">
            <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                    <div class="post-heading-container">
                  <div class='post-heading'>
                       <img src="../images/noProf.jpeg" alt="anonymouse" class="noProf" id='profile_pic'>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'>Hidey</span></b> <span id='name'>_Anonymouse</span> 
                        </div>
                        <div>
                          <span><small id='date'><?= $formattedDate ?></small><small> at <?= $post['time'] ?></small> </span>
                      </div>     
                    </div>   
                
                </div>       
                    </div>
             
            <?php }else { ?> 
                <a href="../Trends/trends.php?word=<?= $post['username'] ?>">
                <div class="post-heading-container">
                <div class='post-heading'>
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="profile" class="icons"  id='profile_pic'>
                        <?php } ?>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> <span id='name'> - <?= $post['name'] ?></span> 
                        </div>
                        <div>
                          <span><small id='date'><?= $formattedDate ?></small><small> . <?= $post['time'] ?></small> </span>
                      </div>     
                    </div>   
                </div>
                </div></a>
                <?php } ?>   
                
                  
        </div>
            <div class="head-dots" id = 'head-dots<?php echo $idUnique;?>'>
                <div>
                  <img src="../images/menu.png" alt="..." class="icons">
                </div>
    
            </div>
        </div>
    <div class="post-box">
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        <div class="post_b">    
    <p id='post-bAllP'>   <?= formatPostContent($post['post_body']) ?></p>
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <div>
 
             <a href="../Trends/trends.php?word=<?= $post['theme'] ?>">   <span class='theme_span'><?= $post['theme'] ?></span></a>
       
              <span class='span-loc'><a href="../Trends/trends.php?word=<?= $post['location'] ?>">     
                     -<?= $post['location'] ?>
                 </a> </span>
                        
                 </div>
        </div>
        

    </a>
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
            
            <span class='thot'> Witt your thought</span>
                 </div>      
        <?php } ?>
        </a>
</div>

       <div class='head_post_el'>
        
                <?php   
                $sql ="SELECT p.post_id, l.type, COUNT(*) AS like_count
                FROM posts p
                JOIN likes l ON p.post_id = l.post_id
                WHERE p.post_id = ? -- Replace 'specific_type' with the actual type you're interested in
                GROUP BY p.post_id, l.type
                ORDER BY like_count DESC
                LIMIT 1";
                $typeResult = $dbh->connect()->prepare($sql);
                
                if(!$typeResult->execute(array($post['post_id']))){
                    $typeResult = null;
                }else{
                    $typeLike = $typeResult->fetch(PDO::FETCH_ASSOC);
                    if($typeLike!==false){
                        $typeLikee=$typeLike;
                    }else{
                        $typeLikee= null;
                    }
                }
                ?><?php if($typeLikee !== null && $typeLikee['post_id']===$post['post_id']){ ?> 
               <a href="../Trends/trends.php?reaction=<?= $typeLikee['type']?>"> <span><img src="../images/<?= $typeLikee['type']?>.png" alt="<?= $typeLikee['type']?>"> </span></a><?php } ?>
        </div>
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