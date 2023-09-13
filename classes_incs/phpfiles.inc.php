<?php
    include_once('dbh.class.php');
    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];  
    }
    
    $dbh = New Dbh();
    $selectUser = $dbh->connect()->prepare('SELECT * FROM users Where id = ?');
    if(!$selectUser ->execute(array($user_id))){
        echo 'Failed To Load Posts';
    }else{
        $user = $selectUser->fetch(PDO::FETCH_ASSOC);
    }
    
    ##-------------------Posts for All, HomePage--------------------------------------##
    $userCity = $user['city'];
    $userSchool = $user['school'];
    $userCountry = $user['country'];
    $userDOB = $user['DOB']; 
    $userID = $user_id; 
    
    // Calculate age group based on the user's date of birth
    $today = new DateTime();
    $userBirthDate = new DateTime($userDOB);
    $ageDifference = $userBirthDate->diff($today)->y;
    $ageGroup = floor($ageDifference / 15); // Group users into age groups of 15 years
    
    $selectTrendingPosts = $dbh->connect()->prepare('
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
            WHERE   
                 posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
                AND FLOOR(DATEDIFF(NOW(), users.dob) / 365.25 / 15) = :ageGroup -- Match users in the same age group
            GROUP BY posts.post_id
        ) AS subquery
        ORDER BY country = :userCountry DESC,  (school LIKE :userSchool) DESC,engagement_score DESC, (city LIKE :userCity) DESC,(country LIKE :userCountry) DESC, date_created DESC, time DESC
    ');
    $selectTrendingPosts->bindValue(':userCity', $userCity.'%', PDO::PARAM_STR);
    $selectTrendingPosts->bindValue(':userSchool', $userSchool.'%', PDO::PARAM_STR);
    $selectTrendingPosts->bindValue(':user_id', $userID, PDO::PARAM_INT);
    $selectTrendingPosts->bindValue(':ageGroup', $ageGroup, PDO::PARAM_INT);
    $selectTrendingPosts->bindValue(':userCountry', $userCountry, PDO::PARAM_STR);
    
    if (!$selectTrendingPosts->execute()) {
        echo 'Failed To Load  Posts';
    } else {
        $posts = $selectTrendingPosts->fetchAll(PDO::FETCH_ASSOC);
    }

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
        WHERE ( users.school LIKE :userSchool AND users.country = :userCountry)    
            AND posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
        GROUP BY posts.post_id
    ) AS subquery
    ORDER BY engagement_score DESC, date_created DESC, time DESC
');

$selectHomePosts->bindValue(':userSchool', $userSchool.'%', PDO::PARAM_STR);
$selectHomePosts->bindValue(':userCountry', $userCountry, PDO::PARAM_STR);



if (!$selectHomePosts->execute()) {
    echo 'Failed To Load Trending Posts';
} else {
    $posts_homie = $selectHomePosts->fetchAll(PDO::FETCH_ASSOC);
}

    #//-------------------------------------------------------------------\\##    
#//===================For random posts=====================================\\##


$selectRandomPosts = $dbh->connect()->prepare(' 
    SELECT posts.*, users.*, likes.type,
    COUNT(likes.id) AS like_count, 
    COUNT(comments.id) AS comment_count,
    (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
    FROM posts 
    JOIN users ON posts.user_id = users.id 
    LEFT JOIN likes ON posts.post_id = likes.post_id 
    LEFT JOIN comments ON posts.post_id = comments.post_id  
    WHERE FLOOR(DATEDIFF(NOW(), users.dob) / 365.25 / 15) = :ageGroup -- Match users in the same age group
        AND posts.user_id <> :user_id 
    GROUP BY posts.post_id 
    ORDER BY engagement_score DESC, like_count DESC, comment_count DESC, time DESC
' );
$selectRandomPosts->bindValue(':ageGroup', $ageGroup, PDO::PARAM_INT);
$selectRandomPosts->bindValue(':user_id', $userID, PDO::PARAM_INT);

if (!$selectRandomPosts->execute()) {
    echo 'Failed To Load Trending Posts';
} else {
    $postsRand = $selectRandomPosts->fetchAll(PDO::FETCH_ASSOC);
}
$selectRandomTrends = $dbh->connect()->prepare(' 
    SELECT posts.*, users.*, likes.type,
    COUNT(likes.id) AS like_count, 
    COUNT(comments.id) AS comment_count,
    (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
    FROM posts 
    JOIN users ON posts.user_id = users.id 
    LEFT JOIN likes ON posts.post_id = likes.post_id 
    LEFT JOIN comments ON posts.post_id = comments.post_id  
    WHERE FLOOR(DATEDIFF(NOW(), users.dob) / 365.25 / 15) = :ageGroup -- Match users in the same age group
    GROUP BY posts.post_id 
    ORDER BY engagement_score DESC, like_count DESC, comment_count DESC, time DESC
    LIMIT 5
');

$selectRandomTrends->bindValue(':ageGroup', $ageGroup, PDO::PARAM_INT);


if (!$selectRandomTrends->execute()) {
    echo 'Failed To Load Trending Posts';
} else {
    $postsTrends = $selectRandomTrends->fetchAll(PDO::FETCH_ASSOC);
}
     ##------------------Trends Location and Themes----------------------------------##
     $selectTrendingThemes = $dbh->connect()->prepare("
     (SELECT
         theme,
         MAX(location) AS top_location,
         MAX(likes.type) AS type,
         COUNT(likes.id) AS like_count, 
         COUNT(post_body) AS post_count,
         COUNT(comments.id) AS comment_count,
         (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
     FROM posts
     LEFT JOIN likes ON posts.post_id = likes.post_id 
     LEFT JOIN comments ON posts.post_id = comments.post_id
     WHERE theme IS NOT NULL AND theme <> '' AND location LIKE :userSchool
     GROUP BY theme
     ORDER BY engagement_score DESC, like_count DESC
     LIMIT 2 -- Select 2 trending themes for the user's school
 )
 UNION ALL
 (
     SELECT
         theme,
         MAX(location) AS top_location,
         MAX(likes.type) AS type,
         COUNT(likes.id) AS like_count, 
         COUNT(post_body) AS post_count,
         COUNT(comments.id) AS comment_count,
         (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
     FROM posts
     JOIN users ON posts.user_id = users.id 
     LEFT JOIN likes ON posts.post_id = likes.post_id 
     LEFT JOIN comments ON posts.post_id = comments.post_id
     WHERE theme IS NOT NULL AND theme <> '' AND users.country = :userCountry
     GROUP BY theme
     ORDER BY engagement_score DESC, like_count DESC
     LIMIT 2 -- Select 2 trending themes for the user's country
 )
 UNION ALL
 (
     SELECT
         theme,
         MAX(location) AS top_location,
         MAX(likes.type) AS type,
         COUNT(likes.id) AS like_count, 
         COUNT(post_body) AS post_count,
         COUNT(comments.id) AS comment_count,
         (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
     FROM posts
     LEFT JOIN likes ON posts.post_id = likes.post_id 
     LEFT JOIN comments ON posts.post_id = comments.post_id
     WHERE theme IS NOT NULL AND theme <> ''
     GROUP BY theme
     ORDER BY engagement_score DESC, like_count DESC
     LIMIT 3 -- Select 3 trending themes for everyone (every location)
 )
 ORDER BY engagement_score DESC, like_count DESC
 LIMIT 7 -- Total limit of 7 trending themes (2 for school, 2 for country, and 3 for everyone)
 ");
 
 $selectTrendingThemes->bindValue(':userSchool', '%' . $userSchool . '%', PDO::PARAM_STR);
 $selectTrendingThemes->bindValue(':userCountry', $userCountry, PDO::PARAM_STR);
 
 if (!$selectTrendingThemes->execute()) {
     echo 'Failed To Load Trending Themes';
 } else {
     $trendingThemes = $selectTrendingThemes->fetchAll(PDO::FETCH_ASSOC);
 }
 
 


     $selectLoc = $dbh->connect()->prepare('
     SELECT location,
     MAX(theme) AS theme,
     MAX(likes.type) AS type,
            COUNT(likes.id) AS like_count, 
            COUNT(post_body) AS post_count,
            COUNT(comments.id) AS comment_count,
            (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
     FROM posts
     JOIN users ON posts.user_id = users.id 
     LEFT JOIN likes ON posts.post_id = likes.post_id 
     LEFT JOIN comments ON posts.post_id = comments.post_id
     GROUP BY location
     ORDER BY users.country = :userCountry DESC, engagement_score DESC, like_count DESC
     LIMIT 4
 ');
 $selectLoc->bindValue(':userCountry', $userCountry, PDO::PARAM_STR);
 if (!$selectLoc->execute()) {
     echo 'Failed To Load Locations';
 } else {
     $location = $selectLoc->fetchAll(PDO::FETCH_ASSOC);
 }
 
    #//-------------------------------------------------------------------\\##
    
    ##-----------------------------User Posts--------------------------------##
    $selectUserPosts = $dbh->connect()->prepare('SELECT posts.* , COUNT(comments.id) AS comment_count,likes.type,COUNT(likes.id) AS like_count, users.* FROM posts 
    JOIN users ON posts.user_id = users.id
         LEFT JOIN likes ON posts.post_id = likes.post_id 
     LEFT JOIN comments ON posts.post_id = comments.post_id
    WHERE users.id = ? ORDER BY date_created DESC ');
    if(!$selectUserPosts ->execute(array($user_id))){
        echo 'Failed To Load Posts';
    }else{
        $posts_User = $selectUserPosts->fetchAll(PDO::FETCH_ASSOC);
    }



     ##-------------------Bookmarks--------------------------------------##
     $selectBookmarks = $dbh->connect()->prepare('SELECT posts.* ,MAX(likes.type) AS type,
            COUNT(likes.id) AS like_count, 
            COUNT(post_body) AS post_count,
            COUNT(comments.id) AS comment_count, users.* FROM posts 
            LEFT JOIN likes ON posts.post_id = likes.post_id 
     LEFT JOIN comments ON posts.post_id = comments.post_id
            JOIN bookmarks ON bookmarks.post_id = posts.post_id JOIN users on users.id =posts.user_id WHERE  bookmarks.user_id =?  ORDER BY date_created DESC , time DESC');
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