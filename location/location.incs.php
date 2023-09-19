<?php

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
    WHERE ( users.school LIKE :getname OR users.username = :getname)    
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
}


$selectDirectPosts= $dbh->connect()->prepare('
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
    WHERE ( posts.theme= :theme)    
        AND posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
    GROUP BY posts.post_id
) AS subquery
ORDER BY engagement_score DESC, date_created DESC, time DESC
');

$selectDirectPosts->bindValue(':theme', $msg, PDO::PARAM_STR);

if (!$selectDirectPosts->execute()) {
echo 'Failed To Load Trending Posts';
} else {
$directPosts = $selectDirectPosts->fetchAll(PDO::FETCH_ASSOC);
}

##----------------------------------------------------------------------------------------------------------

$selectHomeUsersIn = $dbh->connect()->prepare('
SELECT users.school,
       COUNT(users.id) AS total_members, SUM(post_count) AS total_posts , school , city
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

}
##----------------------------------------------------------------------------------------------------------

$selectHomeRandPic = $dbh->connect()->prepare('
SELECT  profile_pic from users WHERE school LIKE :getname OR  users.username = :getname ORDER BY RAND()

');

$selectHomeRandPic->bindValue(':getname', $getname.'%', PDO::PARAM_STR);


if (!$selectHomeRandPic->execute()) {
echo 'Failed To Load Trending Posts';
} else {
$pic= $selectHomeRandPic->fetch(PDO::FETCH_ASSOC);

}

##----------------------------------------------------------------------------------------------------------
$selectHomeUsers = $dbh->connect()->prepare('
SELECT * FROM (
    SELECT users.*
    FROM users
    WHERE ( users.school LIKE :userSchool )    
       
) AS subquery

');

$selectHomeUsers->bindValue(':userSchool', $getname.'%', PDO::PARAM_STR);


if (!$selectHomeUsers->execute()) {
echo 'Failed To Load Trending Posts';
} else {
$users = $selectHomeUsers->fetchAll(PDO::FETCH_ASSOC);
}
##----------------------------------------------------------------------------------------------------------