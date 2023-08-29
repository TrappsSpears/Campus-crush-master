<?php 
$page = 'home';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav">
<div class="conFess_icon" id='small_screen_icon'>
        <h2><span> W</span>itter</h2>
        <p> Speaking Unspoken Stories</p>
    </div>
     <div>
          <h2>Home - <small> <?= $user['school'] ?></small></h2>
       </div>
   
</div>
<?php include('../includes/postHome.php') ?>

    </div>

<?php include('../includes/leftbar.php') ;?>
 
    </div>
  <?php include('../includes/footer.php') ?>
</body>
</html>