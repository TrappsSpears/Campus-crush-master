<?php
    include_once('dbh.class.php');
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


    #//-------------------------------------------------------------------\\##    
#//===================For random posts=====================================\\##




   

    #//-------------------------------------------------------------------\\##
    
  



//      ##-------------------Posts Msgs--------------------------------------##
// $selectMsg = $dbh->connect()->prepare("SELECT username as username , comment as comment , post_body as post , comments.id as post_id, posts.user_id as poster_id
// FROM comments JOIN users ON users.id=comments.user_id  JOIN posts on posts.post_id=comments.post_id WHERE (comments.user_id = ? OR posts.user_id = ?)
//     AND comments.type = 'reply'
//     AND (comments.user_id = ? OR posts.user_id = ?)ORDER BY comments.date_created DESC");
// if(!$selectMsg->execute(array($user_id,$user_id,$user_id,$user_id))){
//    echo 'Failed To Load Posts';
// }else{
//    $post_msg = $selectMsg->fetchAll(PDO::FETCH_ASSOC);
// }

// #//-------------------------------------------------------------------\\##

