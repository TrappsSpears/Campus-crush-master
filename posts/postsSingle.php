<div class="posts" style='margin-top: 0px'>
 
   
   
<!--...............------------------- Now Posting --------------------------------------------------------------->
<?php if(isset($_GET['post_id'])){
$post_id = $_GET['post_id'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
    include_once('../classes_incs/dbh.class.php');
    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
      $userCity = $_SESSION['city'];
      $userSchool = $_SESSION['school'];
      $userCountry = $_SESSION['country'];
      $userDOB = $_SESSION['dob']; 
      $userID = $user_id; 
      $userName = $_SESSION['username'];  
    }
    $dbh = New Dbh();
    

##-------------------Posts for Single Post--------------------------------------##

// Check if the data is already cached

    // Data is not cached or has expired, so fetch it from the database
    $selectPost = $dbh->connect()->prepare("SELECT posts.*, users.*, likes.type as type,
        COUNT(bookmarks.id) AS save_count, 
        COUNT(likes.id) AS like_count, 
        COUNT(comments.id) AS comment_count
        FROM posts JOIN users ON posts.user_id = users.id 
        LEFT JOIN likes ON posts.post_id = likes.post_id 
        LEFT JOIN bookmarks ON posts.post_id = bookmarks.post_id 
        LEFT JOIN comments ON posts.post_id = comments.post_id  
        WHERE posts.post_id = ? ORDER BY date_created DESC");

    if (!$selectPost->execute(array($post_id))) {
        echo 'Failed To Load Posts';
    } else {
        $post = $selectPost->fetch(PDO::FETCH_ASSOC);

    }
    if($post){ 
 
      include_once('../classes_incs/functionsposts.php');

    $post_date =$post['date_created'].''.$post['time'];
    $formattedDate = format_post_date($post_date);

    ?>
        
    
        <div class="post-container" style='border:none'>
        <div class="post-head">
      
       <div class="heading-post">
       <?php if($post['anonymous'] == 'yes'){  if($post['theme'] != 'Message'){ ?>
        <a href="../location/location.php?place=<?=$post['location'] ?>">
        <?php } else { ?>
            <a href="#"></a>
           <?php } ?>
        
                    <div class="post-heading-container">
                  <div class='post-heading'>
                       <img src="../images/W.png" alt="anonymouse" class="noProf"  id='profile_pic'>
                       <div id='post_info'>
                       <div>
                             <b> <span id='username'> <?= $post['theme'] ?> </span></b><span id='name'>@hideMe<small> . </small>  <?= $formattedDate ?>
                            </span>
                        </div>
       
                    </div>   
                
                </div>       
                    </div>
        </a>
            <?php }else { ?>
                <a href="../location/location.php?user=<?=$post['username'] ?>"> 
                <div class="post-heading-container">
                <div class='post-heading'>
        
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
           
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> <span id='name'> <b><?= $post['name'] ?></b><small> . </small>  <?= $formattedDate ?></span>
                        </div>
                 
                    </div>   
                </div>
                </div></a>
                <?php } ?>   
                
                  
        </div>
        
            <div class="head-dots">
            <div>
                  <img src="../images/menu.png" alt="..." class="icons" style='width:20px'>
                </div>
               <div class="head-menu">       
               <form action="../witter/reports.php?reporting" method='post'>
               <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
               <input type="hidden" name="post" value="<?= $post['post_body'] ?>">
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
               <button name="report">Report </button>
               </form>
               </div>
            </div>
        </div>
    <div class="post-box" >
        <a href="#">
            <div class="post_b">

            
        
        <p > <?= formatPostContent($post['post_body']) ?></p>
        <?php if($post['post_pic'] != ''){?> 
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="" style='height:auto'>
    </div>
    <?php } ?>
        </a>
        <div class="locInfo">
 
       
 <span class='span-loc'><img src="../images/map-pin.png" alt="king" class="icons" style='width:12px'>    <?php   if($post['theme'] != 'Whistle Blow'){ ?>
<a href="../location/location.php?place=<?=$post['location'] ?>">
<?php } else { ?>
<a href="../location/direct.php?place=<?=$post['school'] ?>"> 
<?php } ?>   
        <?= $post['location'] ?>     <?php if($post['country'] != $_SESSION['country']) { echo $post['country'];} ?>
    </a> </span>
<a href="../location/location.php?theme=<?= $post['theme'] ?>">   <span class='theme_span'>#<?= $post['theme'] ?></span></a>
           
    </div>
    </div>
    <div class="bookmark">

    <form action="../classes_incs/bookmarks.inc.php" method='post'>
               <input type="hidden" name="page" value="postSingle">
                <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                <?php
            $post_id = $post['post_id'];
            $sql = "SELECT user_id FROM bookmarks WHERE  user_id = ? AND post_id = ?;";
            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($user_id , $post_id))){
                $result = null;
            }else{
                if($result->rowCount()>0){ ?>
                      <button name="bookmark"> <img src="../images/star2.png" alt="" class='icons' ></button>
               <?php }else{ ?> 
                <button name="bookmark"> <img src="../images/star(1).png" alt="" class='icons' ></button>
                <?php } }?>
             
               </form>
               <div>

                <img src="../images/share-square.png" alt="share" class='icons'>
               </div>
    </div>

   
 
 
</div>
   
        
        </div>
        

      


    
<?php } }?> 
