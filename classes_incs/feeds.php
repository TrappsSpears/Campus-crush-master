<?php 
 include_once('dbh.class.php');
 $dbh = new Dbh();
session_start();
   if(isset($_POST['submit_Feed'])){
        $user_id = $_POST['users_i']; 
        $desc = $_POST['post'];
        $loc = $_POST['location'];
        $type = $_POST['type'];
        $sql = "INSERT INTO feedbacks(user_id,type,Detaile,location) VALUES ( ?, ?, ?, ?)";
        $result = $dbh->connect()->prepare($sql);
    
        // Check if the query executed successfully
        if ($result->execute([$user_id,$type,$desc,$loc])) {      
                header("Location: ../witter/home.php?succeeded");
            exit();
        } else {
            // Error while executing the query
            header("Location: ../home/home.php?Error_Query");
            exit();
        } }else{
            header("Location: ../home/home.php?Error_Query");
        }