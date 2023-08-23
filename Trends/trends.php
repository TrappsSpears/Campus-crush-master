
<?php if(isset($_GET['location'])){ 
     $loc= $_GET['location'];
     include_once('../classes_incs/dbh.class.php');
 
 $dbh = New Dbh();
     $selectPostLoc = $dbh->connect()->prepare("SELECT * FROM posts JOIN users ON users.id =posts.user_id WHERE location = ?  ORDER BY date_created DESC");
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
        
            <h3>@<?= $loc ?></h3>
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
     $selectPostLoc = $dbh->connect()->prepare("SELECT * FROM posts JOIN users ON users.id =posts.user_id JOIN likes ON posts.post_id=likes.post_id WHERE likes.type = ?  
     ORDER BY date_created DESC");
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
        
            <h3>Reaction.<?= $react ?></h3>
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