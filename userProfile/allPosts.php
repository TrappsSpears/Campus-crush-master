<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
 include_once('../classes_incs/dbh.class.php');
 if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $userCity = $_SESSION['city'];
   $userSchool = $_SESSION['school'];
   $userCountry = $_SESSION['country'];
   $userDOB = $_SESSION['dob']; 
   $userID = $user_id; 
   $userName = $_SESSION['username'];  
 }
 $dbh = New Dbh();

 
 ##-------------------Posts User--------------------------------------##

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

?>
<?php 
    include('../classes_incs/functionsposts.php');
        
    foreach($posts_User as $post){ 
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].''.$post['time'];
        $formattedDate = format_post_date($post_date); ?>
        <div class="engage_btn">
        <form action="../classes_incs/deletepost.inc.php" method="post">
            <input type="hidden" value="<?=$post['post_id']?>" name='post_id'>
            <button name='submit'> <small>X</small>Delete</button>
        </form>
    </div>
       <?php  include('../includes/posts.php'); }
        ?> 