<?php
    
     ##-------------------Bookmarks--------------------------------------##
     $selectBookmarks = $dbh->connect()->prepare('SELECT posts.* ,MAX(likes.type) AS type,
            COUNT(likes.id) AS like_count, 
            COUNT(post_body) AS post_count,
            COUNT(comments.id) AS comment_count, users.* FROM posts 
            LEFT JOIN likes ON posts.post_id = likes.post_id 
     LEFT JOIN comments ON posts.post_id = comments.post_id
            JOIN bookmarks ON bookmarks.post_id = posts.post_id JOIN users on users.id =posts.user_id WHERE  bookmarks.user_id =?  ORDER BY date_created DESC , time DESC');
     if(!$selectBookmarks ->execute(array($user_id))){
         echo 'Failed To Load Posts';
     }else{
         $posts_B = $selectBookmarks->fetchAll(PDO::FETCH_ASSOC);
     }
     #//-------------------------------------------------------------------\\##