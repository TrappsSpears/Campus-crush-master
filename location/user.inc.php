<?php
if(isset($_GET['get'])){
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


    // Data is not cached or has expired, so fetch it from the database
    $selectUserP = $dbh->connect()->prepare('
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
            WHERE (users.username = :getname OR users.name = :getname)    
                AND posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
            GROUP BY posts.post_id
        ) AS subquery
        ORDER BY engagement_score DESC, date_created DESC, time DESC
    ');

    $selectUserP->bindValue(':getname', $getname, PDO::PARAM_STR);

    if (!$selectUserP->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $postsUser = $selectUserP->fetchAll(PDO::FETCH_ASSOC);

    }




// Define a cache key for the home users query based on the $getname parameter
 ?>
    <?php 
    include_once('../classes_incs/functionsposts.php');
    foreach($postsUser as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        if($post['anonymous'] != 'yes'){
            include('../includes/posts.php');
        }
         } }
        ?>

