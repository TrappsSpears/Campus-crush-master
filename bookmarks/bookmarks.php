<?php 
$page = 'bookmarks';
include('../includes/headall.php'); include('bkmarks.incs.php');?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav" id='nav'>
       <h2>Starred Posts</h2>
           
        </div>
<?php 

    include('../includes/postBookmarks.php') ?>
    </div>

   <?php   include('../includes/lefty.php'); ?>
 
    </div>
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
</body>
</html>