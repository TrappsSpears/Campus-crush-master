<?php 
$page = 'bookmarks';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav">
        <div class="conFess_icon" id='small_screen_icon'>
        <h2><span><img src="../images/witterLogo2.png" alt="W" class='icons' style="left:-10px">Bookmark</small></span></h2>
        <p> Speaking Unspoken Stories</p>
    </div>
           
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