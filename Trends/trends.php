
<?php if(isset($_GET['word'])){ 
     $loc= $_GET['word'];
     $searchTerm = $_GET['word'];
     include_once('../classes_incs/dbh.class.php');
 
 $dbh = New Dbh();
 
 $selectPostLoc = $dbh->connect()->prepare("
 SELECT posts.*, users.*, likes.type,posts.theme,
        COUNT(likes.id) AS like_count, 
        COUNT(comments.id) AS comment_count
 FROM posts 
 JOIN users ON users.id = posts.user_id
 LEFT JOIN likes ON posts.post_id = likes.post_id 
 LEFT JOIN comments ON posts.post_id = comments.post_id 
 WHERE location LIKE :loc OR post_body LIKE :searchTerm OR username LIKE :searchTerm OR name LIKE :searchTerm OR school LIKE :searchTerm or city LIKE :searchTerm or theme LIKE :searchTerm
 GROUP BY posts.post_id
 ORDER BY like_count DESC, comment_count DESC, date_created DESC
");
$selectPostLoc->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
$selectPostLoc->bindValue(':loc', '%' . $loc . '%', PDO::PARAM_STR);

if (!$selectPostLoc->execute()) {
 echo 'Failed To Load Posts';
} else {
 $post_single = $selectPostLoc->fetchAll(PDO::FETCH_ASSOC);
}

 $page = '';
 include('../includes/headall.php'); ?>
    <body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav">
    <form action="../Trends/trends.php" method="get">
    <div class="search_place">
        <input type="text" placeholder="<?= $loc ?>" id='search' name="word"><button type='submit' >  <img src="../images/search.png" alt="search" class='icons'></button>
    </div></form>
        </div>
<?php 

    include('poststrends.php') ?>
    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
</body>
</html>

<?php }elseif(isset($_GET['reaction'])) {
    $loc= $_GET['reaction'];
     include_once('../classes_incs/dbh.class.php');
 
 $dbh = New Dbh();
 $sql ="SELECT  p.post_id,p.post_body,p.user_id,p.date_created,p.location,p.time,p.anonymous,p.post_pic,u.username,u.profile_pic, u.name, COUNT(*) AS like_count,l.type,p.theme,
 COUNT(l.id) AS like_count, 
 COUNT(c.id) AS comment_count
                FROM posts p
                JOIN likes l ON p.post_id = l.post_id JOIN users u ON u.id =p.user_id
                LEFT JOIN comments c ON p.post_id = c.post_id 
                WHERE l.type = ? -- Replace 'specific_type' with the actual type you're interested in
                GROUP BY p.post_id, l.type
                ORDER BY like_count DESC";
     $selectPostLoc = $dbh->connect()->prepare($sql);
if(!$selectPostLoc ->execute(array($loc))){
    echo 'Failed To Load Posts';
}else{
    $post_single = $selectPostLoc->fetchAll(PDO::FETCH_ASSOC);
};
 $page = '';
 include('../includes/headall.php'); ?>
    <body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav">
       <form action="../Trends/trends.php" method="get">
    <div class="search_place">
        <input type="text" placeholder="<?= $loc ?>" id='search' name="word"><button type='submit' >  <img src="../images/search.png" alt="search" class='icons'></button>
    </div></form>
        </div>

<?php 

    include('poststrends.php') ?>
    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
</body>
</html>


<?php } ?>