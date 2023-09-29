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
    
     
  $selectThemes = $dbh->connect()->prepare('
     SELECT
         theme,
         MAX(location) AS top_location,
         MAX(likes.type) AS type,
         profile_pic,
         COUNT(likes.id) AS like_count, 
         COUNT(post_body) AS post_count,
         COUNT(comments.id) AS comment_count,
         (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
     FROM posts
     JOIN Users ON users.id = posts.user_id
     LEFT JOIN likes ON posts.post_id = likes.post_id 
     LEFT JOIN comments ON posts.post_id = comments.post_id
     GROUP BY theme
     ORDER BY engagement_score DESC, like_count DESC
     ');
     if (!$selectThemes->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $themes = $selectThemes->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $thm = 'Whistle Blow';
    $selectLocation = $dbh->connect()->prepare('
    SELECT location,
         MAX(theme) AS theme,
         MAX(likes.type) AS type,
         profile_pic,
                COUNT(likes.id) AS like_count, 
                COUNT(post_body) AS post_count,
                COUNT(comments.id) AS comment_count,
                (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
         FROM posts
         JOIN users ON posts.user_id = users.id 
         LEFT JOIN likes ON posts.post_id = likes.post_id 
         LEFT JOIN comments ON posts.post_id = comments.post_id
         WHERE posts.theme != ?
         GROUP BY location
         ORDER BY  engagement_score DESC, like_count DESC
    ');
    if (!$selectLocation->execute(array($thm))) {
       echo 'Failed To Load Trending Posts';
    } else {
       $locations = $selectLocation->fetchAll(PDO::FETCH_ASSOC);
    }