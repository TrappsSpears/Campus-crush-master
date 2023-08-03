<?php 
$page = 'inbox';
include('../includes/headall.php'); 

?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav" style="border-bottom:2px solid rgb(1, 28, 47)">
        <div class="profile" id="prof_menuBtn">                          
         <div>
       <img src="../images/menu-button-of-three-horizontal-lines.png" alt="Menu" class='icons'>  Menu 
       </div>
      </div>
           <h3>Messages</h3>
        </div>
<?php 

    include('../includes/postInbox.php') ?>
    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
    <script src="./Js/script.js"></script>
</body>
</html>