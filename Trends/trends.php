
<?php if(isset($_GET['word'])){ 
     $loc= $_GET['word'];
     include_once('../classes_incs/dbh.class.php');
 
 $dbh = New Dbh();
 
     $selectPostLoc = $dbh->connect()->prepare("SELECT * FROM posts JOIN users ON users.id =posts.user_id WHERE location LIKE '%$loc%' OR post_body LIKE '%$loc%' OR username LIKE '%$loc%' OR name LIKE '%$loc%' OR school LIKE '$loc%' or city LIKE '%$loc%'  ORDER BY date_created DESC");
if(!$selectPostLoc ->execute()){
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
        <div class="conFess_icon" id='small_screen_icon'>
        <h2>ConfessConnect</h2>
        <p>Speaking Unspoken Stories</p>
    </div>
            <h3>-<?= $loc ?></h3>
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
    $react= $_GET['reaction'];
     include_once('../classes_incs/dbh.class.php');
 
 $dbh = New Dbh();
 $sql ="SELECT p.post_id,p.post_body,p.user_id,p.date_created,p.location,p.time,p.anonymous,p.post_pic,u.username,u.profile_pic, COUNT(*) AS like_count
                FROM posts p
                JOIN likes l ON p.post_id = l.post_id JOIN users u ON u.id =p.user_id
                WHERE l.type = ? -- Replace 'specific_type' with the actual type you're interested in
                GROUP BY p.post_id, l.type
                ORDER BY like_count DESC";
     $selectPostLoc = $dbh->connect()->prepare($sql);
if(!$selectPostLoc ->execute(array($react))){
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
        
            <h3>Reactions - <?= $react ?></h3>
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