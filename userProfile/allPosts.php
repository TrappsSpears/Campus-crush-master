<?php 
      ##-----------------------------User Posts--------------------------------##
      $selectHomePosts = $dbh->connect()->prepare('
      SELECT * FROM (
          SELECT posts.*, users.*, likes.type as type,
          COUNT(bookmarks.id) AS save_count, 
          COUNT(likes.id) AS like_count, 
          COUNT(comments.id) AS comment_count,
          (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
          FROM posts 
          JOIN users ON posts.user_id = users.id 
          LEFT JOIN likes ON posts.post_id = likes.post_id 
          LEFT JOIN bookmarks ON posts.post_id = bookmarks.post_id 
          LEFT JOIN comments ON posts.post_id = comments.post_id 
          WHERE ( users.id = :id)    
              AND posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
          GROUP BY posts.post_id
      ) AS subquery
      ORDER BY engagement_score DESC, date_created DESC, time DESC
  ');
  $id = $_SESSION['user_id'];
  $selectHomePosts->bindValue(':id', $id, PDO::PARAM_STR);
  
  
  
  
  if (!$selectHomePosts->execute()) {
      echo 'Failed To Load Trending Posts';
  } else {
      $posts_User = $selectHomePosts->fetchAll(PDO::FETCH_ASSOC);
  }