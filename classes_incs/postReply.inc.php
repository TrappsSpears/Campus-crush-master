<?php

    if(isset($_POST['submit_reply'])){
        echo 'progress';
        $com_id = $_POST['com_id'];
        $comment = $_POST['reply'];
        $user_id =$_POST['user_id'];
        include_once('dbh.class.php');
        $dbh = New Dbh();
        $sql = "INSERT INTO reply(com_id,reply,user_id) VALUES(?,?,?)";
        $result = $dbh->connect()->prepare($sql);
        if($result->execute(array($com_id,$comment,$user_id))){
                header("Location: ../index/index.php?secceed");   
        }else{
            header("Location: ../index/index.php?Notsecceed");   
        }
        

    }else{
        echo 'error';
    }