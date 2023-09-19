<?php 
if(isset($_GET['place'])){
    $getname = $_GET['place'];
    $page = 'location';
    $pagee ='membs';
include('../includes/headall.php'); 
include('location.incs.php');?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" id="navOther">

    <h2><div class="back_btn">
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> Members</button>
    </div></h2>
    
  
</div>
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
<div class="posts" >
  
<?php 
    include_once('../classes_incs/functionsposts.php');
    foreach($users as $users){ 
        ?>
<div class="post-container">
        <div class="post-box">
        <div class="post-head" >
            <div class="heading-post">
            <a href="location.php?user=<?= $users['username'] ?>">
         <div class="post-heading-container">
        <div class='post-heading'>
   
            <img src="../images/users/<?= $users['profile_pic'] ?>" alt=""  id='profile_pic'>
            
               <div id='post_info'>
                <div>
                     <b> <span id='username'><?= $users['username'] ?></span></b> <span id='name'> <b><?= $users['name'] ?></b>
                    <?= $users['school'] ?>
                    </span> 
                </div>   
            </div>   
        </div>
        </div></a>
            </div>
            </div>
        </div>

</div>
  <?php } ?>

</div>
    </div>
    <?php include('../includes/leftbar.php') ?>

  <?php include('../includes/footer.php') ;
  include('../includes/script.php');
  ?>
 
</body>
</html>
<?php } ?>
