<?php 
    $page = 'groups';
    $pagee = 'location';
include('../includes/headall.php');
include('grps.incs.php');  ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
<?php  include('navrps.php')?>
<div class="posts">

<div class="post_box">
    <div >
        <?php foreach($locations as $trend){ ?>
            <div class='post-container' style="margin-bottom: 20px;">
        <a href="../location/location.php?place=<?= $trend['location'] ?>" >
         
            <div class ='profileContainer'>
  <div class="cover" >
    <img src="../images/users/<?= $trend['profile_pic']?>" alt="" >
  </div>
  <div class="img_profile">
    <img src="../images/users/<?= $trend['profile_pic']?>" alt="" >
  </div>
  <div class='info'>
    <span>
          <small>Posts <?= $trend['post_count'] ?>  - Trending<?= $trend['theme'] ?> </small>
    </span>

        <h4>
      <span>-<?= $trend['location'] ?> </span>
        </h4>
  
    <div>
     <small>Engagements <?php echo $trend['like_count'] + $trend['comment_count'] ?>  <a href="../Trends/trends.php?reaction=<?= $trend['type'] ?>"> <span><img src="../images/<?= $trend['type'] ?>.png" alt="<?= $trend['type'] ?>" style='width:12px'> </span></a></small>
     </div>
            </div>
        </div>
        </a>
        </div>
    
   <?php } ?>
   
    
    </div>
  
</div>
 
  
      



    </div>
    </div>
    <?php
     include('../includes/script.php');
    include('../includes/leftbar.php') ?>

  <?php include('../includes/footer.php') ?>
</body>
</html>
