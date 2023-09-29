<?php if(isset($_GET['get'])){

    $getname = $_GET['get'];
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

 
 ##-------------------Posts for All, HomePage--------------------------------------##

 
 $today = new DateTime();
 $userBirthDate = new DateTime($userDOB);
 $ageDifference = $userBirthDate->diff($today)->y;
 $ageGroup = floor($ageDifference / 15); // Group users into age groups of 15 years
 $msg = 'Whistle Blow';


 
 
     $selectHomePosts = $dbh->connect()->prepare('
         SELECT * FROM (
             SELECT posts.*, users.*, likes.type as type,
             COUNT(bookmarks.id) AS save_count, 
             COUNT(likes.id) AS like_count, 
             COUNT(comments.id) AS comment_count,
             (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
             FROM posts 
             JOIN users ON posts.user_id = users.id 
             LEFT JOIN likes ON posts.post_id = likes.post_id 
             LEFT JOIN bookmarks ON posts.post_id = bookmarks.post_id 
             LEFT JOIN comments ON posts.post_id = comments.post_id 
             WHERE (users.school LIKE :getname OR users.username LIKE :getname)    
                 AND posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
             GROUP BY posts.post_id
         ) AS subquery
         ORDER BY engagement_score DESC, date_created DESC, time DESC
     ');
 
     $selectHomePosts->bindValue(':getname', $getname.'%', PDO::PARAM_STR);
 
     if (!$selectHomePosts->execute()) {
         echo 'Failed To Load Trending Posts';
     } else {
         $postshomie = $selectHomePosts->fetchAll(PDO::FETCH_ASSOC);
     }
 
  

 
 // Define a cache key for the direct posts query based on the $msg parameter

    


##----------------------------------------------------------------------------------------------------------
?>
<?php     
    include_once('../classes_incs/functionsposts.php');
    foreach($postshomie as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }

        //For The GALLERY
     } elseif (isset($_GET['gal'])){
        $getname = $_GET['gal'];
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
    
     
     ##-------------------Posts for All, HomePage--------------------------------------##
    
     
     $today = new DateTime();
     $userBirthDate = new DateTime($userDOB);
     $ageDifference = $userBirthDate->diff($today)->y;
     $ageGroup = floor($ageDifference / 15); // Group users into age groups of 15 years
     $msg = 'Whistle Blow';
     
     $selectHomePosts = $dbh->connect()->prepare('
         SELECT * FROM (
             SELECT posts.*, users.*, likes.type as type,
             COUNT(bookmarks.id) AS save_count, 
             COUNT(likes.id) AS like_count, 
             COUNT(comments.id) AS comment_count,
             (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
             FROM posts 
             JOIN users ON posts.user_id = users.id 
             LEFT JOIN likes ON posts.post_id = likes.post_id 
             LEFT JOIN bookmarks ON posts.post_id = bookmarks.post_id 
             LEFT JOIN comments ON posts.post_id = comments.post_id 
             WHERE (users.school LIKE :getname OR users.username LIKE :getname)    
                 AND posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
             GROUP BY posts.post_id
         ) AS subquery
         ORDER BY engagement_score DESC, date_created DESC, time DESC
     ');
 
     $selectHomePosts->bindValue(':getname', $getname.'%', PDO::PARAM_STR);
 
     if (!$selectHomePosts->execute()) {
         echo 'Failed To Load Trending Posts';
     } else {
         $postshomie = $selectHomePosts->fetchAll(PDO::FETCH_ASSOC);
     }
 
        ?>



<div class="posts" >


    <?php  
    include_once('../classes_incs/functionsposts.php');
    foreach($postshomie as $post) {
         
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date); ?>
    <?php if($post['post_id']!= '' && $post['post_pic'] != 'Array'){ ?> 
<div class="post-container">
        <div class="post-head">
            <div class="heading-post">
            <?php if($post['anonymous'] == 'yes'){  if($post['theme'] != 'Message'){ ?>
        <a href="../location/location.php?place=<?=$post['location'] ?>">
        <?php } else { ?>
            <a href="#"></a>
           <?php } ?>
                    <a href="../location/location.php?place=<?= $post['location'] ?>">
                    <div class="post-heading-container">
                  <div class='post-heading' id='anymous_' style = ' filter: hue-rotate(<?= $rand?>deg);
'>
                       <img src="../images/W.png" alt="anonymouse" class="anymous_prof"   id='profile_pic'>
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
                <a href="../location/location.php?user=<?= $post['username'] ?>">
                <div class="post-heading-container">
                <div class='post-heading'>
                <?php if($post['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="profile" class="icons"  id='profile_pic'>
                        <?php } ?>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> <span id='name'> <b> <?= $post['name'] ?></b><small> . </small>  <?= $formattedDate ?>
                             <?php if($post['country'] != $_SESSION['country']) { echo $post['country'];} ?>
                            </span>
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
        <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
        <div class="post_b">    
    <div class="img_post" id='img_post'>
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
   
    <div class="locInfo">
 
       
              <span class='span-loc'><img src="../images/map-pin.png" alt="king" class="icons" style='width:12px'>    <?php   if($post['theme'] != 'Message'){ ?>
        <a href="../location/location.php?place=<?=$post['location'] ?>">
        <?php } else { ?>
            <a href="../location/location.php?user=<?=$post['location'] ?>"> 
           <?php } ?>   
                     <?= $post['location'] ?>     <?php if($post['country'] != $_SESSION['country']) { echo $post['country'];} ?>
                 </a> </span>
             <a href="../location/location.php?theme=<?= $post['theme'] ?>">   <span class='theme_span'>#<?= $post['theme'] ?></span></a>
                        
                 </div>
        </div>
        

    </a>
    
    <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
    <div class="post_insights">
            <span class='thot'>  
                    <span id='reaction_emoj'>
                <img src="../images/<?= $post['type'];?>.png" alt="<?= $post['type'] ?>" class='icons'>  
                <img src="../images/heart.png" alt="" class='icons' style='width:20px;position:relative;top:7px' >
               <small> 
                <?= $post['like_count']; ?> Reactions</small></span>
              <span id='comment'><img src="../images/comment2.png" alt=""><small><?= $post['comment_count']?> Comments</small></span>
                
            
              </span>
                 </div>          
       
        </a>
   
</div>


<div>
    <?php   
        $selectComment = $dbh->connect()->prepare('SELECT comments.post_id,school, profile_pic as profile_pic ,name as name ,username as username , comment as comment , user_id  as user_id , comments.id as id ,type as type , school as school 
        FROM comments JOIN users ON users.id=comments.user_id WHERE post_id = ?   ORDER BY comments.id DESC');
       if(!$selectComment->execute(array($post['post_id']))){
           echo 'Failed To Load Posts';
       }else{
            if($selectComment->rowCount() > 0){
                 $comment = $selectComment->fetch(PDO::FETCH_ASSOC);
            }else{
                $comment = null;
            }
          
       }
        $sql ='SELECT p.post_id, l.type, COUNT(*) AS like_count
        FROM posts p
        JOIN likes l ON p.post_id = l.post_id
        WHERE p.post_id = ? 
        GROUP BY p.post_id, l.type
        ORDER BY like_count DESC
        LIMIT 1';
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
        if($comment != null && $comment['post_id'] === $post['post_id'] && $comment['type'] == 'public'){ 
        ?>
        <div style="margin-bottom:10px;margin-top:-25px">
         <div class="post-head" >
            <div class="heading-post">
            <a href="../location/location.php?user=<?=$post['username'] ?>">
         <div class="post-heading-container">
        <div class='post-heading'>
            <img src="../images/users/<?= $comment['profile_pic'] ?>" alt=""  id='profile_pic'>
 
               <div id='post_info'>
                <div>
                     <b> <span id='username'><?= $comment['username'] ?></span></b> <span id='name'> <b><?= $comment['name'] ?></b>
                    <?php if($comment['school'] != $post['school']){ echo $comment['school'] ;} ?>
                    </span> 
                </div>   
            </div>   
        </div>
        </div></a>
            </div>
            </div>
            <div class="comments_posts" >
     
     <div class="comment-post"> <p id='type_com'> </small></p>
        <p> <?= $comment['comment'] ?></p>
         <div>
             <small>@ <?php if($user_id == $comment['user_id']){ ?> You <?php } ?>.<span><?= $comment['school'] ?></span> </small>
         </div>
     </div>
            </div>
 </div>
        <?php } ?>
        <div class='head_post_el'>
        
        <?php if($typeLikee !== null && $typeLikee['post_id']===$post['post_id']){ ?> 
        <a href="../Trends/trends.php?reaction=<?= $typeLikee['type']?>"> <span><img src="../images/<?= $typeLikee['type']?>.png" alt="<?= $typeLikee['type']?>" class='icons'> </span></a><?php } ?>
 </div>
    </div>
       
    </div>
    
    <?php } ?>
       <?php } ?>
</div>
<?php } elseif(isset($_GET['direct'])){
          $getname = $_GET['direct'];
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
      
       
       ##-------------------Posts for All, HomePage--------------------------------------##
      
       
       $today = new DateTime();
       $userBirthDate = new DateTime($userDOB);
       $ageDifference = $userBirthDate->diff($today)->y;
       $ageGroup = floor($ageDifference / 15); // Group users into age groups of 15 years
       $msg = 'Whistle Blow';
       $selectDirectPosts = $dbh->connect()->prepare('
       SELECT * FROM (
           SELECT posts.*, users.*, likes.type as type,
           COUNT(bookmarks.id) AS save_count, 
           COUNT(likes.id) AS like_count, 
           COUNT(comments.id) AS comment_count,
           (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
           FROM posts 
           JOIN users ON posts.user_id = users.id 
           LEFT JOIN likes ON posts.post_id = likes.post_id 
           LEFT JOIN bookmarks ON posts.post_id = bookmarks.post_id 
           LEFT JOIN comments ON posts.post_id = comments.post_id 
           WHERE (posts.theme = :theme AND posts.location LIKE :userSchool)    
               AND posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
           GROUP BY posts.post_id
       ) AS subquery
       ORDER BY engagement_score DESC, date_created DESC, time DESC
   ');

   $selectDirectPosts->bindValue(':theme', $msg, PDO::PARAM_STR);
   $selectDirectPosts->bindValue(':userSchool',"%".$_SESSION['school'].'%', PDO::PARAM_STR);
   if (!$selectDirectPosts->execute()) {
       echo 'Failed To Load Trending Posts';
   } else {
       $directPosts = $selectDirectPosts->fetchAll(PDO::FETCH_ASSOC);
   }

    ?>
<?php  
    include_once('../classes_incs/functionsposts.php');
    foreach($directPosts as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }
        ?>

<?php  } elseif(isset($_GET['themeH'])){ 
          $getname = $_GET['themeH'];
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
      
       
       ##-------------------Posts for All, HomePage--------------------------------------##
      
       
       $today = new DateTime();
       $userBirthDate = new DateTime($userDOB);
       $ageDifference = $userBirthDate->diff($today)->y;
       $ageGroup = floor($ageDifference / 15); // Group users into age groups of 15 years
       $msg = 'Whistle Blow';
    
    $selectThemes= $dbh->connect()->prepare('
    SELECT themes.*
    FROM themes
    WHERE ( themes.location = :getname)
   
');


$selectThemes->bindValue(':getname', $getname, PDO::PARAM_STR);

if (!$selectThemes->execute()) {
echo 'Failed To Load Trending Posts';
} else {
$themes_Home = $selectThemes->fetchAll(PDO::FETCH_ASSOC);
}?>
<div class="post_box">
    <div >
        <?php foreach($themes_Home as $trend){ ?>
        <a href="../location/location.php?theme=<?= $trend['theme_name'] ?>&topLocation=<?= $getname?>&cover=<?=$trend['cover_photo']?>">
        <div class='post-containe' style="margin-bottom: 20px;">
        <div class ='profileContainer'>
  
  <div class="img_profile" style="margin-top: 5px;">
    <img src="../images/imagePosts/<?= $trend['cover_photo']?>" alt=""  style="border-radius: 32px;">
    <div class='info'>
        <h4>
      #<?= $trend['theme_name'] ?> 
</h4>
  
<div>
        <span><small><?= $trend['theme_desc']?></small></span>
    </div>
       
                <div> <span> <?= $trend['location']?></span></div>
            </div>
  </div>
 
        </div>
        </div>
        </a>
 
    
   <?php } ?>
   
    
    </div>
  
</div>


    <?php } ?>
