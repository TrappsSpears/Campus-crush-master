<?php if(isset($_GET['skuldat'])){ 
$getname = $_GET['skuldat'];
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
    $msg = 'Message';

##----------------------------------------------------------------------------------------------------------


    // Data is not cached or has expired, so fetch it from the database
    $selectHomeUsersIn = $dbh->connect()->prepare('
        SELECT users.school,
            COUNT(users.id) AS total_members, SUM(post_count) AS total_posts, school, city 
        FROM users
        LEFT JOIN (
            SELECT user_id, COUNT(*) AS post_count
            FROM posts
            GROUP BY user_id
        ) AS user_posts ON users.id = user_posts.user_id
        WHERE users.school LIKE :getname OR users.school LIKE :userSkul
    ');

    $selectHomeUsersIn->bindValue(':getname', $getname.'%', PDO::PARAM_STR);
    $selectHomeUsersIn->bindValue(':userSkul', $_SESSION['school'].'%', PDO::PARAM_STR);

    if (!$selectHomeUsersIn->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $userInfo = $selectHomeUsersIn->fetch(PDO::FETCH_ASSOC);
       
    }


##----------------------------------------------------------------------------------------------------------


    // Data is not cached or has expired, so fetch it from the database
    $selectHomeRandPic = $dbh->connect()->prepare('
        SELECT profile_pic, username FROM users WHERE school LIKE :getname OR users.school LIKE :userSkul ORDER BY RAND()
    ');

    $selectHomeRandPic->bindValue(':getname', $getname.'%', PDO::PARAM_STR);
    $selectHomeRandPic->bindValue(':userSkul', $_SESSION['school'].'%', PDO::PARAM_STR);

    if (!$selectHomeRandPic->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $pic = $selectHomeRandPic->fetch(PDO::FETCH_ASSOC);

    }


##----------------------------------------------------------------------------------------------------------


// Check if the data is already cached

    // Data is not cached or has expired, so fetch it from the database
    $selectHomeUsers = $dbh->connect()->prepare('
        SELECT * FROM (
            SELECT users.*
            FROM users
            WHERE (users.school LIKE :userSchool OR users.school LIKE :userSkul)    
        ) AS subquery
    ');

    $selectHomeUsers->bindValue(':userSchool', $getname.'%', PDO::PARAM_STR);
    $selectHomeUsers->bindValue(':userSkul', $_SESSION['school'].'%', PDO::PARAM_STR);

    if (!$selectHomeUsers->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $users = $selectHomeUsers->fetchAll(PDO::FETCH_ASSOC);
    } if($userInfo && $pic){ 
?>
<div class ='profileContainer'>
 
  <div class="img_profile" style='margin-top:10px'>
    <img src="../images/users/<?= $pic['profile_pic'] ?>" alt="" >
    <div class="info" style='position:relative;top:-15px'>
  <h4>
      <span><img src="../images/map-pin.png" alt="king" class="icons" style='width:12px' id='img'>  <?= $getname ?> </span>
</h4>
    <div>
    <span><img src="../images/blog-text.png" alt="king" class="icons" style='width:12px;margin-left:5px' id='img'>  Posts <small><?= $userInfo['total_posts'] ?></small></span>
    <a href="members.php?place=<?= $getname ?>"> 
    <div>
         <span ><img src="../images/users.png" alt="" class='icons' style='width:14px' id='img'>  Members <small><?= $userInfo['total_members'] ?></small> </span>
    </div>

  </a>
<span><small><?=$pic['username']?></small><img src="../images/user3.png" alt="king" class="icons" style='width:12px;margin-left:5px' id='img'></span>

    </div>
  
  </div>
  </div>
  <div class="story" style='display:flex;margin-top:-25px'>
<?php 
   
    foreach($users as $user){ 
      ?>
        <a href="../location/location.php?user=<?= $user['username'] ?>">
          <div class="user_prof">
            <img src="../images/users/<?= $user['profile_pic']?>" alt="" id='profile_pic' >
          </div>
          <div>
            <p style="font-size: 10px;color:gray"><?= $user['username'] ?></p>
          </div>
            </a>
       <?php } ?>
       
  


</div>


</div>
<?php }else{ echo '<h2> Location Not Found</h2>';} } ?>