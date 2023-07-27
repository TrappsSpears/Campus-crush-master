<?php 
$page = 'inbox';
include('../includes/headall.php'); 

?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav" style="border-bottom:2px solid rgb(1, 28, 47)">
           <b>Messages</b>
        </div>
<?php 

    include('../includes/postInbox.php') ?>
    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
    <script src="./Js/script.js"></script>
</body>
</html>