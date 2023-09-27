<?php 
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


    $selectMessages = $dbh->connect()->prepare('
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
        WHERE (users.username = :username AND posts.theme = :theme OR posts.location = :username)
        GROUP BY posts.post_id
    ) AS subquery
    ORDER BY engagement_score DESC, date_created DESC, time DESC
');

$selectMessages->bindValue(':username', $userName, PDO::PARAM_STR);

$selectMessages->bindValue(':theme', $msg, PDO::PARAM_STR);




if (!$selectMessages->execute()) {
    echo 'Failed To Load Trending Posts';
} else {
    $messages = $selectMessages->fetchAll(PDO::FETCH_ASSOC);
}
