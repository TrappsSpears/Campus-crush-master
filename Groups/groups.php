<?php 
    $page = 'groups';
    $pagee = 'themes';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
<?php  include('navrps.php')?>
<div class="posts">

<div class="post_box">
    <div class="trends">
        <?php foreach($themes as $trend){ ?>
            <div class='post-container' style="margin-bottom: 20px;">
        <a href="../location/location.php?theme=<?= $trend['theme'] ?>&post_count=<?= $trend['post_count'] ?>&topLocation=<?= $trend['top_location'] ?>" >
         
            <div class ='profileContainer'>
  <div class="cover" >
    <img src="../images/users/<?= $trend['profile_pic']?>" alt="" >
  </div>
  <div class="img_profile">
    <img src="../images/users/<?= $trend['profile_pic']?>" alt="" >
  </div>
  <div class='info'>
  <small>Posts <?= $trend['post_count'] ?>  - <?= $trend['top_location'] ?> </small>
        <h4>
      <span>#<?= $trend['theme'] ?> </span>
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
    <?php include('../includes/leftbar.php') ?>

  <?php include('../includes/footer.php') ?>
</body>
</html>
