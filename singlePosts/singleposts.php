<?php 
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    include('phpfiles.post-single.php');

$page = 'postSingle';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav">
            <h3>Post</h3>
        </div>
<?php 

    include('postsSingle.php') ?>
    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
</body>
</html>
<?php } ?>