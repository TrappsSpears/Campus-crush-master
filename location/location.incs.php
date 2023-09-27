<?php
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


 
 // Define a cache key for the home posts query based on the $getname parameter
 $homePostsCacheKey = 'home_posts_' . md5($getname);
 
 // Check if the data is already cached
 if (file_exists($homePostsCacheKey) && time() - filemtime($homePostsCacheKey) < 3600) {
     // Data is still fresh, so use the cached version
     $postshomie = unserialize(file_get_contents($homePostsCacheKey));
 } else {
     // Data is not cached or has expired, so fetch it from the database
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
             WHERE (users.school LIKE :getname OR users.username = :getname)    
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
 
         // Cache the data for future use
         file_put_contents($homePostsCacheKey, serialize($postshomie));
     }
 }
  

 
 // Define a cache key for the direct posts query based on the $msg parameter

     // Data is not cached or has expired, so fetch it from the database
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
     $selectDirectPosts->bindValue(':userSchool',"%" .$_SESSION['school'].'%', PDO::PARAM_STR);
     if (!$selectDirectPosts->execute()) {
         echo 'Failed To Load Trending Posts';
     } else {
         $directPosts = $selectDirectPosts->fetchAll(PDO::FETCH_ASSOC);
     }
 
 

##----------------------------------------------------------------------------------------------------------


// Define a cache key for the home users query based on the $getname parameter
$homeUsersCacheKey = 'home_users_' . md5($getname);

// Check if the data is already cached
if (file_exists($homeUsersCacheKey) && time() - filemtime($homeUsersCacheKey) < 3600) {
    // Data is still fresh, so use the cached version
    $userInfo = unserialize(file_get_contents($homeUsersCacheKey));
} else {
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
        WHERE users.school LIKE :getname OR users.username = :getname
    ');

    $selectHomeUsersIn->bindValue(':getname', $getname.'%', PDO::PARAM_STR);

    if (!$selectHomeUsersIn->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $userInfo = $selectHomeUsersIn->fetch(PDO::FETCH_ASSOC);

        // Cache the data for future use
        file_put_contents($homeUsersCacheKey, serialize($userInfo));
    }
}

##----------------------------------------------------------------------------------------------------------

// Define a cache key for the home random profile picture query based on the $getname parameter
$homeRandPicCacheKey = 'home_rand_pic_' . md5($getname);

// Check if the data is already cached
if (file_exists($homeRandPicCacheKey) && time() - filemtime($homeRandPicCacheKey) < 600) {
    // Data is still fresh, so use the cached version
    $pic = unserialize(file_get_contents($homeRandPicCacheKey));
} else {
    // Data is not cached or has expired, so fetch it from the database
    $selectHomeRandPic = $dbh->connect()->prepare('
        SELECT profile_pic, username FROM users WHERE school LIKE :getname OR users.username = :getname ORDER BY RAND()
    ');

    $selectHomeRandPic->bindValue(':getname', $getname.'%', PDO::PARAM_STR);

    if (!$selectHomeRandPic->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $pic = $selectHomeRandPic->fetch(PDO::FETCH_ASSOC);

        // Cache the data for future use
        file_put_contents($homeRandPicCacheKey, serialize($pic));
    }
}

##----------------------------------------------------------------------------------------------------------


// Check if the data is already cached

    // Data is not cached or has expired, so fetch it from the database
    $selectHomeUsers = $dbh->connect()->prepare('
        SELECT * FROM (
            SELECT users.*
            FROM users
            WHERE (users.school LIKE :userSchool)    
        ) AS subquery
    ');

    $selectHomeUsers->bindValue(':userSchool', $getname.'%', PDO::PARAM_STR);

    if (!$selectHomeUsers->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $users = $selectHomeUsers->fetchAll(PDO::FETCH_ASSOC);
    }


##----------------------------------------------------------------------------------------------------------

