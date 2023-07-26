<?php

include_once('../classes_incs/dbh.class.php');

$dbh = New Dbh();

     ##-------------------Posts Msgs--------------------------------------##
     
$selectReply = $dbh->connect()->prepare("SELECT * FROM reply where post_id = ? ");
if(!$selectReply->execute(array($post_id))){
   echo 'Failed To Load Posts';
}else{
   $post_reply = $selectReply->fetchAll(PDO::FETCH_ASSOC);
}
     #//-------------------------------------------------------------------\\##