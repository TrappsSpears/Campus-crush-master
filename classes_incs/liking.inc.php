<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    $response = array();
        $post_id = $_POST['post_id'];
        $type = $_POST['type'];
        $user_id =$_POST['user_id'];
        $date = date('Y-m-d H:i:s');
        $page = $_POST['page'];
        
        include_once('dbh.class.php');
        $dbh = New Dbh();

        $sql = "SELECT user_id , type FROM likes WHERE user_id = ? AND post_id = ?;";

        $result = $dbh->connect()->prepare($sql);
        if(!$result->execute(array($user_id,$post_id))){
            $result = null;
           echo 'error';
            exit();
        }else{
            $results = $result->fetch(PDO::FETCH_ASSOC);
            if($results > 0) {
                if($results['type'] == $type){
                    $sql = "DELETE FROM likes WHERE user_id = ? AND post_id = ?;";
                $result = $dbh->connect()->prepare($sql);
                if(!$result->execute(array($user_id,$post_id))){
                  echo 'error';
                }else{
                    echo 'UnLiked';
                }  
                }else{
                    $sql = "DELETE FROM likes WHERE user_id = ? AND post_id = ?;";
                    $result = $dbh->connect()->prepare($sql);
                    if(!$result->execute(array($user_id,$post_id))){
                      echo 'error';
                    }else{
                        echo 'UnLiked';
                    } 
                    $sql = "INSERT INTO likes(post_id,type,user_id,created_at) VALUES(?,?,?,?)";
                $result = $dbh->connect()->prepare($sql);
                if($result->execute(array($post_id,$type,$user_id,$date))){
                    $lastInsertedPostId = $dbh->connect()->lastInsertId();
                    $sql = "INSERT INTO notifications(post_id, user_id, date_created, type) VALUES (?, ?, ?, 'like')";
                    $result = $dbh->connect()->prepare($sql);
                    if ($result->execute([$post_id, $user_id, $date])) {
                       echo 'Done';
                    }else{
                        header("Location: ../home/home.php?Error_Query");
                    }
                }else{
                    header("Location: ../home/home.php?Error_Query");
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
                       echo 'Done';
                    }else{
                        header("Location: ../home/home.php?Error_Query");
                    }
                }else{
                    header("Location: ../home/home.php?Error_Query");
                }
              }
        }        
    }else{
        header("Location: ../home/home.php?Error_Query");
    }