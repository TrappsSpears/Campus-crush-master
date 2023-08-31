<?php

include_once('../classes_incs/dbh.class.php');

$dbh = New Dbh();

##-------------------Posts for Single Post--------------------------------------##
$selectPost = $dbh->connect()->prepare("SELECT posts.*, users.*, likes.type as type,
COUNT(bookmarks.id) AS save_count, 
COUNT(likes.id) AS like_count, 
COUNT(comments.id) AS comment_count
 FROM posts JOIN users ON posts.user_id = users.id 
        LEFT JOIN likes ON posts.post_id = likes.post_id 
        LEFT JOIN bookmarks ON posts.post_id = bookmarks.post_id 
        LEFT JOIN comments ON posts.post_id = comments.post_id  WHERE posts.post_id = ? ORDER BY date_created DESC");
if(!$selectPost ->execute(array($post_id))){
    echo 'Failed To Load Posts';
}else{
    $post_single = $selectPost->fetchAll(PDO::FETCH_ASSOC);
}
#//-------------------------------------------------------------------\\##

##-------------------Posts Comments --------------------------------------##
$selectComment = $dbh->connect()->prepare("SELECT profile_pic as profile_pic ,name as name ,username as username , comment as comment , user_id  as user_id , comments.id as id ,type as type , school as school 
 FROM comments JOIN users ON users.id=comments.user_id WHERE post_id = ?  ORDER BY date_created DESC");
if(!$selectComment->execute(array($post_id))){
    echo 'Failed To Load Posts';
}else{
    $post_comment = $selectComment->fetchAll(PDO::FETCH_ASSOC);
}
#//-------------------------------------------------------------------\\##

$selectUserLiked = $dbh->connect()->prepare("SELECT likes.type as type, likes.user_id as user_id FROM likes JOIN users on likes.user_id = users.id WHERE likes.post_id = ?");
if(!$selectUserLiked ->execute(array($post_id))){
    echo 'Failed To Load Posts';
}else{
    $liketypee = $selectUserLiked->fetchAll(PDO::FETCH_ASSOC);
}

