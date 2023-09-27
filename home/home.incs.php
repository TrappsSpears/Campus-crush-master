<?php

        // Calculate age group based on the user's date of birth
        
        $selectTrendingPosts = $dbh->connect()->prepare('
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
                WHERE 
                     posts.date_created >= DATE_SUB(NOW(), INTERVAL 4 WEEK) -- Consider posts from the last week only
                    AND FLOOR(DATEDIFF(NOW(), users.dob) / 365.25 / 15) = :ageGroup -- Match users in the same age group
                GROUP BY posts.post_id
            ) AS subquery
            ORDER BY country = :userCountry DESC,  (school LIKE :userSchool) DESC,engagement_score DESC, (city LIKE :userCity) DESC,(country LIKE :userCountry) DESC, date_created DESC, time DESC
        ');
        $selectTrendingPosts->bindValue(':userCity', $userCity.'%', PDO::PARAM_STR);
        $selectTrendingPosts->bindValue(':userSchool', $userSchool.'%', PDO::PARAM_STR);
        $selectTrendingPosts->bindValue(':user_id', $userID, PDO::PARAM_INT);
        $selectTrendingPosts->bindValue(':ageGroup', $ageGroup, PDO::PARAM_INT);
        $selectTrendingPosts->bindValue(':userCountry', $userCountry, PDO::PARAM_STR);

        
        if (!$selectTrendingPosts->execute()) {
            echo 'Failed To Load  Posts';
        } else {
            $posts = $selectTrendingPosts->fetchAll(PDO::FETCH_ASSOC);
        }


        $selectTrendingPosts = $dbh->connect()->prepare(" 
        (SELECT
       theme,post_pic,profile_pic,
       MAX(posts.location) AS top_location,
       MAX(likes.type) AS type,
       COUNT(likes.id) AS like_count, 
       COUNT(post_body) AS post_count,
       COUNT(comments.id) AS comment_count,
       (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
   FROM posts
   JOIN users ON posts.user_id = users.id 
   LEFT JOIN likes ON posts.post_id = likes.post_id 
   LEFT JOIN comments ON posts.post_id = comments.post_id
   WHERE theme IS NOT NULL AND theme <> '' AND location LIKE :userSchool
   GROUP BY theme
   ORDER BY engagement_score DESC, like_count DESC
   LIMIT 3 -- Select 2 trending themes for the user's school
 )
 UNION ALL
 (
   SELECT
       theme,post_pic,profile_pic,
       MAX(location) AS top_location,
       MAX(likes.type) AS type,
       COUNT(likes.id) AS like_count, 
       COUNT(post_body) AS post_count,
       COUNT(comments.id) AS comment_count,
       (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
   FROM posts
   JOIN users ON posts.user_id = users.id 
   LEFT JOIN likes ON posts.post_id = likes.post_id 
   LEFT JOIN comments ON posts.post_id = comments.post_id
   WHERE theme IS NOT NULL AND theme <> '' AND users.country = :userCountry AND users.SCHOOL != :userSchool
   GROUP BY theme
   ORDER BY engagement_score DESC, like_count DESC
   LIMIT 2 -- Select 2 trending themes for the user's country
 )
 UNION ALL
 (
   SELECT
       theme,post_pic,profile_pic,
       MAX(location) AS top_location,
       MAX(likes.type) AS type,
       COUNT(likes.id) AS like_count, 
       COUNT(post_body) AS post_count,
       COUNT(comments.id) AS comment_count,
       (COUNT(likes.id) + COUNT(comments.id)) / POW((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(posts.date_created)), 1.8) AS engagement_score
   FROM posts
   JOIN users ON users.id = posts.user_id
   LEFT JOIN likes ON posts.post_id = likes.post_id 
   LEFT JOIN comments ON posts.post_id = comments.post_id
   WHERE theme IS NOT NULL AND theme <> '' AND users.country != :userCountry AND users.SCHOOL != :userSchool
   GROUP BY theme
   ORDER BY engagement_score DESC, like_count DESC
   LIMIT 2 -- Select 3 trending themes for everyone (every location)
 )
 ORDER BY engagement_score DESC, like_count DESC
 LIMIT 7 -- Total limit of 7 trending themes (2 for school, 2 for country, and 3 for everyone)
    ");
    $selectTrendingPosts->bindValue(':userSchool', '%' . $userSchool . '%', PDO::PARAM_STR);
 $selectTrendingPosts->bindValue(':userCountry', $userCountry, PDO::PARAM_STR);
 
 
    
    if (!$selectTrendingPosts->execute()) {
        echo 'Failed To Load  Posts';
    } else {
        $highlights = $selectTrendingPosts->fetchAll(PDO::FETCH_ASSOC);
    }

 