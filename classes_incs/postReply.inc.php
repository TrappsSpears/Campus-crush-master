<?php

    if(isset($_POST['submit_reply'])){
        echo 'progress';
        $post_id = $_POST['post_id'];
        $comment = $_POST['reply'];
        $user_id =$_POST['user_id'];
        $page = $_POST['page'];
        $type = $_POST['type'];
        include_once('dbh.class.php');
        $dbh = New Dbh();
        $sql = "INSERT INTO reply(post_id,reply,user_id,type) VALUES(?,?,?,?)";
        $result = $dbh->connect()->prepare($sql);
        if($result->execute(array($post_id,$comment,$user_id,$type))){

            if($page == 'home'){
                header("Location: ../index/index.php?secceeded,Page=$page");
            }elseif($page == 'thrill_page'){
                header("Location: ../Hot/hots.php?secceeded,Page=$page");
            }elseif($page == 'linkup_page'){
                header("Location: ../linkups/linkups.php?secceeded,Page=$page");
            }elseif($page == 'postSingle'){
            
                header("Location: ../singlePosts/singleposts.php?post_id=$post_id");
            }elseif($page == 'inbox'){
            
                header("Location: ../inbox/inbox.php?post_id=$page");
            }
            else{
                header("Location: ../index/index.php?secceeded,Page=$page");
            }


         
        }else{
            echo'not done';
        }
        

    }else{
        echo 'error';
    }