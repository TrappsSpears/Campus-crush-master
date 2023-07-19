<?php

    if(isset($_POST['submit'])){
        echo 'progress';
        $post = $_POST['post'];
        $topic = $_POST['topic'];
        $location = $_POST['location'];
        $user_id =$_POST['user_id'];
        $date = date('Y-m-d H:i:s');
        $post_type = $_POST['type_post'];
        $location = $_POST['location'];
        $page = $_POST['page'];
        
        include_once('dbh.class.php');
        $dbh = New Dbh();
        $sql = "INSERT INTO posts(title,post_body,user_id,date_created,topic,post_type,location,time) VALUES(?,?,?,?,?,?,?,?)";
        $result = $dbh->connect()->prepare($sql);
        if($result->execute(array($topic,$post,$user_id,$date,$topic,$post_type,$location,$date))){

            if($page == 'home'){
                header("Location: ../index/index.php?secceeded,Page=$page");
            }elseif($page == 'thrill_page'){
                header("Location: ../Hot/hots.php?secceeded,Page=$page");
            }elseif($page == 'linkup_page'){
                header("Location: ../linkups/linkups.php?secceeded,Page=$page");
            }else{
                header("Location: ../index/index.php?secceeded,Page=$page");
            }


         
        }else{
            echo'not done';
        }
        

    }else{
        echo 'error';
    }