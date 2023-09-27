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
include('../home/home.incs.php');

?>
 
<div class="posts">
   
    
<!--...............------------------- Now Posting --------------------------------------------------------------->

    <?php 
    include_once('../classes_incs/functionsposts.php');
    foreach($posts as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }

        include('script.php')
        ?>
        <div class="footer-about" id='info_App'>
        Share Stories - Confess - Share Ideas - <a href="../privacy/report.php"> Ask Ques</a> - Engage - Whats On Your Mind - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a> - <a href="../privacy/termsOfService.html"> Terms Of Use</a> -  <a href="../privacy/cookies.html"> Cookie Policy</a> 2023 WitterVerse Corp.
        </div>  
        
</div>

