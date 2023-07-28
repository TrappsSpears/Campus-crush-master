<?php
    include_once('dbh.class.php');
    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];  
    }
    
    $dbh = New Dbh();
    
    ##-------------------Posts for All, HomePage--------------------------------------##
    $selectAllPosts = $dbh->connect()->prepare("SELECT * FROM posts ORDER BY date_created DESC , time DESC");
    if(!$selectAllPosts ->execute()){
        echo 'Failed To Load Posts';
    }else{
        $posts = $selectAllPosts->fetchAll(PDO::FETCH_ASSOC);
    }
    #//-------------------------------------------------------------------\\##
    
    ##------------------Posts for Linkups-----------------------------------##
    $selectLinkPosts = $dbh->connect()->prepare("SELECT * FROM posts WHERE post_type = 'linkup' ORDER BY date_created DESC , time DESC");
    if(!$selectLinkPosts ->execute()){
        echo 'Failed To Load Posts';
    }else{
        $posts_links = $selectLinkPosts->fetchAll(PDO::FETCH_ASSOC);
    }
    #//-------------------------------------------------------------------\\##
    
    ##------------------Posts for Thrills----------------------------------##
    $selectThrillsPosts = $dbh->connect()->prepare("SELECT * FROM posts WHERE post_type = 'thrill' ORDER BY date_created DESC ,  time DESC");
    if(!$selectThrillsPosts ->execute()){
        echo 'Failed To Load Posts';
    }else{
        $posts_Thrills = $selectThrillsPosts->fetchAll(PDO::FETCH_ASSOC);
    }
    #//-------------------------------------------------------------------\\##

        ##------------------Trends #tags----------------------------------##
        $selectTrends = $dbh->connect()->prepare("SELECT DISTINCT topic FROM posts  ORDER BY date_created DESC LIMIT 5");
        if(!$selectTrends ->execute()){
            echo 'Failed To Load Posts';
        }else{
            $trends = $selectTrends->fetchAll(PDO::FETCH_ASSOC);
        }
        #//-------------------------------------------------------------------\\##

     ##------------------Trends Location Tops----------------------------------##
         $selectLoc = $dbh->connect()->prepare("SELECT DISTINCT location FROM posts  ORDER BY date_created DESC LIMIT 3");
         if(!$selectLoc ->execute()){
            echo 'Failed To Load Posts';
         }else{
             $location = $selectLoc->fetchAll(PDO::FETCH_ASSOC);
         }
    #//-------------------------------------------------------------------\\##
    
    ##-----------------------------User Posts--------------------------------##
    $selectUserPosts = $dbh->connect()->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY date_created DESC , time DESC");
    if(!$selectUserPosts ->execute(array($user_id))){
        echo 'Failed To Load Posts';
    }else{
        $posts_User = $selectUserPosts->fetchAll(PDO::FETCH_ASSOC);
    }

    $selectUserPosts_Thrills = $dbh->connect()->prepare("SELECT * FROM posts WHERE user_id = ? AND post_type='thrill' ORDER BY date_created DESC , time DESC");
    if(!$selectUserPosts_Thrills ->execute(array($user_id))){
        echo 'Failed To Load Posts';
    }else{
        $posts_User_thrills = $selectUserPosts_Thrills->fetchAll(PDO::FETCH_ASSOC);
    }

    $selectUserPosts_Linkups = $dbh->connect()->prepare("SELECT * FROM posts WHERE user_id = ? AND post_type='linkup' ORDER BY date_created DESC , time DESC");
    if(!$selectUserPosts_Linkups ->execute(array($user_id))){
        echo 'Failed To Load Posts';
    }else{
        $posts_User_linkups = $selectUserPosts_Linkups->fetchAll(PDO::FETCH_ASSOC);
    }
    #//-------------------------------------------------------------------\\##

     ##-------------------Bookmarks--------------------------------------##
     $selectBookmarks = $dbh->connect()->prepare("SELECT * FROM posts 
            JOIN bookmarks ON bookmarks.post_id = posts.post_id WHERE  bookmarks.user_id =?  ORDER BY date_created DESC , time DESC");
     if(!$selectBookmarks ->execute(array($user_id))){
         echo 'Failed To Load Posts';
     }else{
         $posts_B = $selectBookmarks->fetchAll(PDO::FETCH_ASSOC);
     }
     #//-------------------------------------------------------------------\\##

     ##-------------------Posts Msgs--------------------------------------##
$selectMsg = $dbh->connect()->prepare("SELECT username as username , comment as comment , post_body as post , comments.id as post_id, posts.user_id as poster_id
FROM comments JOIN users ON users.id=comments.user_id  JOIN posts on posts.post_id=comments.post_id WHERE (comments.user_id = ? OR posts.user_id = ?)
    AND comments.type = 'reply'
    AND (comments.user_id = ? OR posts.user_id = ?)ORDER BY comments.date_created DESC");
if(!$selectMsg->execute(array($user_id,$user_id,$user_id,$user_id))){
   echo 'Failed To Load Posts';
}else{
   $post_msg = $selectMsg->fetchAll(PDO::FETCH_ASSOC);
}

#//-------------------------------------------------------------------\\##