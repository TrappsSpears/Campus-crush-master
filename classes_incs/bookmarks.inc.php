<?php
 
 if(isset($_POST['bookmark'])){
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $page = $_POST['page'];

    include_once('dbh.class.php');
    $dbh = New Dbh();
    $sql = "INSERT INTO bookmarks(post_id,user_id) VALUES(?,?)";
        $result = $dbh->connect()->prepare($sql);
        if(!$result->execute(array($post_id,$user_id))){
            header('location: ../index/index.php?error=Failed');
        }else{
            
                header("Location: ../posts/posts.php?post_id=$post_id");
           

        }
 }else{
    echo 'error';
 }