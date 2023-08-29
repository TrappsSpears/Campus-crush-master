<?php

include_once('../classes_incs/dbh.class.php');

$dbh = New Dbh();

##-------------------Posts for Single Post--------------------------------------##
$selectPost = $dbh->connect()->prepare("SELECT * FROM posts JOIN users ON users.id = posts.user_id WHERE post_id = ? ORDER BY date_created DESC");
if(!$selectPost ->execute(array($post_id))){
    echo 'Failed To Load Posts';
}else{
    $post_single = $selectPost->fetchAll(PDO::FETCH_ASSOC);
}
#//-------------------------------------------------------------------\\##

##-------------------Posts Comments --------------------------------------##
$selectComment = $dbh->connect()->prepare("SELECT profile_pic as profile_pic ,username as username , comment as comment , user_id  as user_id , comments.id as id ,type as type , school as school 
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

