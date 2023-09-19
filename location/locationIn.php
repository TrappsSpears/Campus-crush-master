<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" id="navOther">
    <h2><div class="back_btn" >
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> <?=$getname ?></button>
    </div></h2>


</div>
<?php if($userInfo  && $pic){ ?> 
<div class ='profileContainer'>
  <div class="cover">
    <img src="../images/users/<?= $pic['profile_pic'] ?>" alt="">
  </div>
  <div class="img_profile">
    <img src="../images/users/<?= $pic['profile_pic'] ?>" alt="" >
  </div>
  <div class="info">
  <h4>
      <span><?= $getname ?> <img src="../images/map-pin.png" alt="king" class="icons" style='width:12px'> </span>
</h4>
    <div>
      <span> Members <small><?= $userInfo['total_members'] ?></small></span>
    <span> Posts <small><?= $userInfo['total_posts'] ?></small></span>
    </div>
  
  </div>
 
<?php include('navlos.php'); ?>
  
</div>


<?php     include('../includes/script.php');
    include_once('../classes_incs/functionsposts.php');
    foreach($postshomie as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }
        ?>
                <?php } else{?>

<h2> Does Not Exist</h2>
 <?php 
   $delquery="DELETE FROM posts WHERE location=?";
   $result = $dbh->connect()->prepare($getname);

} ?>
    </div>
    <?php include('../includes/leftbar.php') ?>

  <?php include('../includes/footer.php');

  ?>
</body>
</html>