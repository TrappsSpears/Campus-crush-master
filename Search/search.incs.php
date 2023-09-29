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
    $trendingPostsCacheKey = 'trending_posts';
$trendingThemesCacheKey = 'trending_themes';
$locationCacheKey = 'location';
if (file_exists($trendingPostsCacheKey) && time() - filemtime($trendingPostsCacheKey) < 3600) {
  // Data is still fresh, so use the cached version
  $postsRand = unserialize(file_get_contents($trendingPostsCacheKey));
} else {
  // Data is not cached or has expired, so fetch it from the database
  // Execute the $selectRandomPosts query and store the result in $postsRand
  
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
  // Cache the data for future use
  file_put_contents($trendingPostsCacheKey, serialize($postsRand));
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


// Check if trending themes are already cached
if (file_exists($trendingThemesCacheKey) && time() - filemtime($trendingThemesCacheKey) < 3600) {
  // Data is still fresh, so use the cached version
  $trendingThemes = unserialize(file_get_contents($trendingThemesCacheKey));
} else {
  // Data is not cached or has expired, so fetch it from the database
  // Execute the $selectTrendingThemes query and store the result in $trendingThemes
   ##------------------Trends Location and Themes----------------------------------##
   $selectTrendingThemes = $dbh->connect()->prepare("
   (SELECT
       theme,
       MAX(posts.location) AS top_location,
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
   LIMIT 1 -- Select 2 trending themes for the user's school
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
   LIMIT 2 -- Select 3 trending themes for everyone (every location)
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
 
  // Cache the data for future use
  file_put_contents($trendingThemesCacheKey, serialize($trendingThemes));
}

 



// Check if locations are already cached

  $selectLoc = $dbh->connect()->prepare(" 
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
  WHERE posts.theme != 'Whistle Blow'
  GROUP BY location
  ORDER BY users.country = :userCountry DESC, engagement_score DESC, like_count DESC
  LIMIT 4
");
$selectLoc->bindValue(':userCountry', $userCountry, PDO::PARAM_STR);
if (!$selectLoc->execute()) {
  echo 'Failed To Load Locations';
} else {
  $location = $selectLoc->fetchAll(PDO::FETCH_ASSOC);
}
  // Cache the data for future use

 

