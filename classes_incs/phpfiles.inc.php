<?php
    include_once('dbh.class.php');
    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];  
    }
    
    $dbh = New Dbh();
    $selectUser = $dbh->connect()->prepare("SELECT * FROM users Where id = ?");
    if(!$selectUser ->execute(array($user_id))){
        echo 'Failed To Load Posts';
    }else{
        $user = $selectUser->fetch(PDO::FETCH_ASSOC);
    }
    
    ##-------------------Posts for All, HomePage--------------------------------------##
    $userCity = $_SESSION['city']; 
$userSchool = $_SESSION['school']; 

$selectTrendingPosts = $dbh->connect()->prepare("
       SELECT posts.*, users.*, 
    COUNT(likes.id) AS like_count, 
    COUNT(comments.id) AS comment_count,
    (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
    FROM posts 
    JOIN users ON posts.user_id = users.id 
    LEFT JOIN likes ON posts.post_id = likes.post_id 
    LEFT JOIN comments ON posts.post_id = comments.post_id 
    WHERE (posts.location LIKE :userCity OR posts.location LIKE :userSchool) AND (posts.location != :userSchool OR posts.location = 'public')
    GROUP BY posts.post_id 
    HAVING engagement_score > 0
    ORDER BY (posts.location = :userSchool) DESC,engagement_score DESC,like_count DESC, comment_count DESC,  date_created DESC, time DESC
");
$selectTrendingPosts->bindValue(':userCity', "%$userCity%", PDO::PARAM_STR);
$selectTrendingPosts->bindValue(':userSchool', "%$userSchool%", PDO::PARAM_STR);



if (!$selectTrendingPosts->execute()) {
    echo 'Failed To Load Trending Posts';
} else {
    $posts = $selectTrendingPosts->fetchAll(PDO::FETCH_ASSOC);
}

    #//-------------------------------------------------------------------\\##    
#//===================For random posts=====================================\\##
$selectRandomPosts = $dbh->connect()->prepare("
    SELECT posts.*, users.*, 
    COUNT(likes.id) AS like_count, 
    COUNT(comments.id) AS comment_count
    FROM posts 
    JOIN users ON posts.user_id = users.id 
    LEFT JOIN likes ON posts.post_id = likes.post_id 
    LEFT JOIN comments ON posts.post_id = comments.post_id  
    GROUP BY posts.post_id 
    ORDER BY like_count DESC, comment_count DESC,  time DESC
    LIMIT 5
");

if (!$selectRandomPosts->execute()) {
    echo 'Failed To Load Trending Posts';
} else {
    $postsRand = $selectRandomPosts->fetchAll(PDO::FETCH_ASSOC);
}
     ##------------------Trends Location Tops----------------------------------##
         $selectLoc = $dbh->connect()->prepare("SELECT DISTINCT location FROM posts WHERE location IS NOT NULL AND location <> ''  ORDER BY date_created DESC LIMIT 3");
         if(!$selectLoc ->execute()){
            echo 'Failed To Load Posts';
         }else{
             $location = $selectLoc->fetchAll(PDO::FETCH_ASSOC);
         }
    #//-------------------------------------------------------------------\\##
    
    ##-----------------------------User Posts--------------------------------##
    $selectUserPosts = $dbh->connect()->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY date_created DESC , time DESC");
    if(!$selectUserPosts ->execute(array($user_id))){
        echo 'Failed To Load Posts';
    }else{
        $posts_User = $selectUserPosts->fetchAll(PDO::FETCH_ASSOC);
    }



     ##-------------------Bookmarks--------------------------------------##
     $selectBookmarks = $dbh->connect()->prepare("SELECT * FROM posts 
            JOIN bookmarks ON bookmarks.post_id = posts.post_id JOIN users on users.id =posts.user_id WHERE  bookmarks.user_id =?  ORDER BY date_created DESC , time DESC");
     if(!$selectBookmarks ->execute(array($user_id))){
         echo 'Failed To Load Posts';
     }else{
         $posts_B = $selectBookmarks->fetchAll(PDO::FETCH_ASSOC);
     }
     #//-------------------------------------------------------------------\\##

     ##-------------------Posts Msgs--------------------------------------##
$selectMsg = $dbh->connect()->prepare("SELECT username as username , comment as comment , post_body as post , comments.id as post_id, posts.user_id as poster_id
FROM comments JOIN users ON users.id=comments.user_id  JOIN posts on posts.post_id=comments.post_id WHERE (comments.user_id = ? OR posts.user_id = ?)
    AND comments.type = 'reply'
    AND (comments.user_id = ? OR posts.user_id = ?)ORDER BY comments.date_created DESC");
if(!$selectMsg->execute(array($user_id,$user_id,$user_id,$user_id))){
   echo 'Failed To Load Posts';
}else{
   $post_msg = $selectMsg->fetchAll(PDO::FETCH_ASSOC);
}

#//-------------------------------------------------------------------\\##