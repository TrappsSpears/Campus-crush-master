<?php 
session_start();
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
include('home.incs.php'); ?>
<div class="story">
<?php 
    include_once('../classes_incs/functionsposts.php');
    foreach($highlights as $post){ 
      ?>
        <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
          <div class="story-container">
            <div class="story-cover">
            <div class="cover"><?php if($post['post_pic'] != 'Array') { ?>
                <img src="../images/imagePosts/<?= $post['post_pic']?>" alt="" >
              
              <?php } else {?>
                <img src="../images/users/<?= $post['profile_pic']?>" alt="" >
                <?php } ?>
          
          </div>
            <div class="user_prof">
            <?php if($post['anonymous'] != 'yes') { ?>
                <img src="../images/users/<?= $post['profile_pic']?>" alt="" class='icons'>
              
              <?php } else {?>
                <img src="../images/W.png" alt="" class='icons'>
                <?php } ?>
        
      </div>
      
            <p><?= $post['theme']?> </p>
     
                </div>
            </div>
            </a>
       <?php } ?>
       
  


</div>


