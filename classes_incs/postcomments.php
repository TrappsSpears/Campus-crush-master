<?php

    if(isset($_POST['submit_comment'])){
        echo 'progress';
        $post_id = $_POST['post_id'];
        $comment = $_POST['comment'];
        $user_id =$_POST['user_id'];
        $date = date('Y-m-d H:i:s');
        $page = $_POST['page'];
        $type = $_POST['type'];
        
        include_once('dbh.class.php');
        $dbh = New Dbh();
        $sql = "INSERT INTO comments(post_id,comment,user_id,date_created,type) VALUES(?,?,?,?,?)";
        $result = $dbh->connect()->prepare($sql);
        if($result->execute(array($post_id,$comment,$user_id,$date,$type))){
            $sql = "INSERT INTO notifications(post_id, user_id, date_created, type) VALUES (?, ?, ?, 'comment')";
            $result = $dbh->connect()->prepare($sql);
            if ($result->execute([$post_id, $user_id, $date])) {
                header("Location: ../posts/posts.php?post=$post_id");
            }else{
                header("Location: ../home/home.php?Error_Query");
            }
            


         
        }else{
            echo'not done';
        }
        

    }else{
        echo 'error';
    }