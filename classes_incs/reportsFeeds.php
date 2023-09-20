<?php
 include_once('dbh.class.php');
 $dbh = new Dbh();
    if(isset($_POST['submit_Report'])){

        $id_post = $_POST['post_id'];
        $user_id = $_POST['user_id']; 
        $desc = $_POST['post'];
        $repFor =$_POST['report_for'];
        $repType =$_POST['report_type'];
        $loc = $_POST['location'];

        $sql = "INSERT INTO msgs(post_id,user_id,type,Detaile,location,reporting_for,report_type) VALUES (?, ?, 'Report', ?, ?, ?, ?)";
        $result = $dbh->connect()->prepare($sql);
    
        // Check if the query executed successfully
        if ($result->execute([$id_post,$user_id,$desc,$loc,$repFor,$repType])) {      
                header("Location: ../witter/reports.php?succeeded");
            exit();
        } else {
            // Error while executing the query
            header("Location: ../home/home.php?Error_Query");
            exit();
        }
    
    }else{
        header("Location: ../home/home.php?Error_Query");
    }