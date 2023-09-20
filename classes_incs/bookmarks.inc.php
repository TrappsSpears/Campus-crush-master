<?php
 
 if(isset($_POST['bookmark'])){
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $page = $_POST['page'];

    include_once('dbh.class.php');
    $dbh = New Dbh();
    $sql = "SELECT user_id FROM bookmarks WHERE  user_id = ? AND post_id = ?;";
    $result = $dbh->connect()->prepare($sql);
    if(!$result->execute(array($user_id , $post_id))){
        $result = null;
    }else{
        if($result->rowCount()>0){
            $sql = "DELETE FROM bookmarks where user_id = ?";
        $result = $dbh->connect()->prepare($sql);
        if(!$result->execute(array($user_id))){
            header('location: ../index/index.php?error=Failed');
        }else{
            
                header("Location: ../posts/posts.php?post=$post_id&msg=UnStarred Post");
        
        }
        }else{
            $sql = "INSERT INTO bookmarks(post_id,user_id) VALUES(?,?)";
            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($post_id,$user_id))){
                header('location: ../index/index.php?error=Failed');
            }else{
                
                    header("Location: ../posts/posts.php?post=$post_id&msg=Starred Post");
            
            }
        } }
    
 }else{
    echo 'error';
 }