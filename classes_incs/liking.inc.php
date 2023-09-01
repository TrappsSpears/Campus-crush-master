<?php

    if(isset($_POST['submit_like'])){
        echo 'progress';
        $post_id = $_POST['post_id'];
        $type = $_POST['type'];
        $user_id =$_POST['user_id'];
        $date = date('Y-m-d H:i:s');
        $page = $_POST['page'];
        
        include_once('dbh.class.php');
        $dbh = New Dbh();

        $sql = "SELECT COUNT(*) as total FROM likes WHERE user_id = ? AND post_id = ?;";

        $result = $dbh->connect()->prepare($sql);
        if(!$result->execute(array($user_id,$post_id))){
            $result = null;
            header("location ../posts/posts.php?error=error,post=$post_id");
            exit();
        }else{
            $results = $result->fetch(PDO::FETCH_ASSOC);
            if($results > 0) {
                $sql = "DELETE FROM likes WHERE user_id = ? AND post_id = ?;";
                $result = $dbh->connect()->prepare($sql);
                if(!$result->execute(array($user_id,$post_id))){
                    header("Location: ../index/index.php?error=error Del like");
                }else{
                    $sql = "INSERT INTO likes(post_id,type,user_id,created_at) VALUES(?,?,?,?)";
                    $result = $dbh->connect()->prepare($sql);
                    if($result->execute(array($post_id,$type,$user_id,$date))){
            
                        header("Location: ../posts/posts.php?post=$post_id");
            
            
                     
                    }else{
                        echo'not done';
                    }
                }
              } else { 
                $sql = "INSERT INTO likes(post_id,type,user_id,created_at) VALUES(?,?,?,?)";
                $result = $dbh->connect()->prepare($sql);
                if($result->execute(array($post_id,$type,$user_id,$date))){
                    $lastInsertedPostId = $dbh->connect()->lastInsertId();
                    $sql = "INSERT INTO notifications(post_id, user_id, date_created, type) VALUES (?, ?, ?, 'like')";
                    $result = $dbh->connect()->prepare($sql);
                    if ($result->execute([$post_id, $user_id, $date])) {
                        header("Location: ../singlePosts/singleposts.php?post_id=$post_id");
                    }else{
                        header("Location: ../index/index.php?Error_Query");
                    }
                }else{
                    echo'not done';
                }
              }
        }        
    }else{
        echo 'error';
    }