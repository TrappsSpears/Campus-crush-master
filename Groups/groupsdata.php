<?php include('grps.incs.php'); 
?>
<div class="post_box">
    <div >
        <?php foreach($themes as $trend){ ?>
            <div class='post-containe' style="margin-bottom: 20px;">
        <a href="../location/location.php?theme=<?= $trend['theme'] ?>&post_count=<?= $trend['post_count'] ?>&topLocation=<?= $trend['top_location'] ?>" >
         
            <div class ='profileContainer'>
  <div class="img_profile" style="margin-top: 5px;">
    <img src="../images/users/<?= $trend['profile_pic']?>" alt="" style="border-radius: 32px;">
    <div class='info'>
  
   
  <small>Posts <?= $trend['post_count'] ?>  - <?= $trend['top_location'] ?>  </small>
        <h4>
      <span>#<?= $trend['theme'] ?> </span>
        </h4>
        <small>Engagements  <?php echo $trend['like_count'] + $trend['comment_count'] ?>     
</small>
  
    
            </div>
            
  </div>
  <a href="../Trends/trends.php?reaction=<?= $trend['type'] ?>" style='margin-left:20px'> <span><img src="../images/<?= $trend['type'] ?>.png" alt="<?= $trend['type'] ?>" style='width:12px'> </span></a>

        </div>
        </a>
        </div>
    
   <?php } ?>
   
    
    </div>
  
</div>