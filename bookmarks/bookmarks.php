<?php 
$page = 'bookmarks';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav">
        <div class="profile" id="prof_menuBtn">                          
         <div>
       <img src="../images/menu-button-of-three-horizontal-lines.png" alt="Menu" class='icons'>  Menu 
       </div>
      </div>
           <b> Bookmarks </b>
        </div>
<?php 

    include('../includes/postBookmarks.php') ?>
    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
    <script src="./Js/script.js"></script>
</body>
</html>