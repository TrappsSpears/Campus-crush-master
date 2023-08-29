<?php

    if(isset($_POST['submit_reply'])){
        echo 'progress';
        $post_id = $_POST['post_id'];
        $reply = $_POST['reply'];
        $replied_user_id=$_POST['repliedId'];
        $user_id =$_POST['user_id'];
        $date = date('Y-m-d H:i:s');
        $page = $_POST['page'];
        
        include_once('dbh.class.php');
        $dbh = New Dbh();
        $sql = "INSERT INTO replys(post_id,reply,replied_user_id,user_id,date_created) VALUES(?,?,?,?,?)";
        $result = $dbh->connect()->prepare($sql);
        if($result->execute(array($post_id,$reply,$replied_user_id,$user_id,$date))){

                header("Location: ../singlePosts/singleposts.php?post_id=$post_id");
            


         
        }else{
            echo'not done';
        }
        

    }else{
        echo 'error';
    }