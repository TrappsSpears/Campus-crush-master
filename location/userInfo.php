<?php  // Data is not cached or has expired, so fetch it from the database
      if(isset($_GET['getdat'])){
        $getname = $_GET['getdat'];
        
        
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
      
      $selectHomeUsersIn = $dbh->connect()->prepare('
      SELECT *
      FROM users
      WHERE users.username = :getname OR users.name = :getname OR users.username LIKE :username
  ');

  $selectHomeUsersIn->bindValue(':getname', $getname, PDO::PARAM_STR);
  $selectHomeUsersIn->bindValue(':username', $_SESSION['username'].'%', PDO::PARAM_STR);
  if (!$selectHomeUsersIn->execute()) {
      echo 'Failed To Load Trending Posts';
  } else {
      $userInfo = $selectHomeUsersIn->fetch(PDO::FETCH_ASSOC);


  } if($userInfo){?> 
<div class ='profileContainer'>
  <div class="cover">
    <img src="../images/users/<?= $userInfo['profile_pic'] ?>" alt="">
  </div>
  <div class="img_profile">
    <img src="../images/users/<?= $userInfo['profile_pic'] ?>" alt="" >
    
  </div>
  <div class="info">
    <h4>
      <span><?= $getname ?> <small><?= $userInfo['name'] ?></small></span>
</h4>
    <div>
      <span><small>Member @ </small><?= $userInfo['school'] ?> . <?= $userInfo['city'] ?></span>
    </div>
  
  </div>  
</div>
<div class="home_opt">
  <div>
    <p id='active-home'> <span class='active-home'>Posts</span> </p>
  </div>
  <a href="location.php?place=<?= $userInfo['school']?>">  <div>
   <span> Visit <?= $userInfo['school']?></span>
  </div></a> 
  
</div>
<?php }else{
echo '<h3> USER NOT FOUND </h4>';
}} ?>