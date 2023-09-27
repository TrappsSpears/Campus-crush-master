<?php     

     
include('msgsphpFiles.php');
include('../includes/script.php');
    include_once('../classes_incs/functionsposts.php');
    foreach($messages as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }
        ?>
  