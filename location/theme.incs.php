<?php

// Define a cache key for the user's posts query based on the $getname parameter
$userPostsCacheKey = 'user_posts_' . md5($getname);

// Check if the data is already cached
if (file_exists($userPostsCacheKey) && time() - filemtime($userPostsCacheKey) < 3600) {
    // Data is still fresh, so use the cached version
    $postsUser = unserialize(file_get_contents($userPostsCacheKey));
} else {
    // Data is not cached or has expired, so fetch it from the database
    $selectUserP = $dbh->connect()->prepare('
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
            WHERE (theme = :getname)    
                AND posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
            GROUP BY posts.post_id
        ) AS subquery
        ORDER BY engagement_score DESC, date_created DESC, time DESC
    ');

    $selectUserP->bindValue(':getname', $getname, PDO::PARAM_STR);

    if (!$selectUserP->execute()) {
        echo 'Failed To Load Trending Posts';
    } else {
        $postsUser = $selectUserP->fetchAll(PDO::FETCH_ASSOC);

        // Cache the data for future use
        file_put_contents($userPostsCacheKey, serialize($postsUser));
    }
}




