<?php 
$page = 'bookmarks';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav">
        <div class="conFess_icon" id='small_screen_icon'>
        <h2><span> Confess</span>Connect</h2>
        <p> Speaking Unspoken Stories</p>
    </div>
           <b> Bookmarks </b>
        </div>
<?php 

    include('../includes/postBookmarks.php') ?>
    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
</body>
</html>