<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    $response = array();
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
                echo 'Commented';
            }else{
                echo 'Error';
            }
            


         
        }else{
            echo'not done';
        }
        

    }else{
        echo 'error';
    }