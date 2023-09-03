<?php

    if(isset($_POST['submit_reply'])){
        echo 'progress';
        $post_id = $_POST['post_id'];
        $com_id = $_POST['com_id'];
        $comment = $_POST['reply'];
        $user_id =$_POST['user_id'];
        $emoji =$_POST['emoji'];
        include_once('dbh.class.php');
        $dbh = New Dbh();
        $sql = "INSERT INTO reply(com_id,reply,user_id,emoji) VALUES(?,?,?,?)";
        $result = $dbh->connect()->prepare($sql);
        if($result->execute(array($com_id,$comment,$user_id,$emoji))){
            header("Location: ../posts/posts.php?post=$post_id");  
        }else{
            header("Location: ../home/home.php?Notsecceed");   
        }
        

    }else{
        echo 'error';
    }