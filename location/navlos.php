<div class ='profileContainer'>
 
  <div class="img_profile" style='margin-top:10px'>
    <img src="../images/users/<?= $pic['profile_pic'] ?>" alt="" >
    <div class="info" style='position:relative;top:-15px'>
  <h4>
      <span><img src="../images/map-pin.png" alt="king" class="icons" style='width:12px' id='img'>  <?= $getname ?> </span>
</h4>
    <div>
    <span><img src="../images/blog-text.png" alt="king" class="icons" style='width:12px;margin-left:5px' id='img'>  Posts <small><?= $userInfo['total_posts'] ?></small></span>
    <a href="members.php?place=<?= $getname ?>"> 
    <div>
         <span <?php if($pagee == 'membs' ){?> class='active-home' <?php } ?>><img src="../images/users.png" alt="" class='icons' style='width:14px' id='img'>  Members <small><?= $userInfo['total_members'] ?></small> </span>
    </div>

  </a>
<span><small><?=$pic['username']?></small><img src="../images/user3.png" alt="king" class="icons" style='width:12px;margin-left:5px' id='img'></span>

    </div>
  
  </div>
  </div>
  <div class="story" style='display:flex;margin-top:-25px'>
<?php 
   
    foreach($users as $user){ 
      ?>
        <a href="../location/location.php?user=<?= $user['username'] ?>">
          <div class="user_prof">
            <img src="../images/users/<?= $user['profile_pic']?>" alt="" id='profile_pic' >
          </div>
          <div>
            <p style="font-size: 10px;color:gray"><?= $user['username'] ?></p>
          </div>
            </a>
       <?php } ?>
       
  


</div>
<div class="home_opt" style='grid-template-columns:auto auto auto auto'>
 <a href="location.php?place=<?= $getname ?>"> <div>
   <p id='active-home'> <span <?php if($pagee == 'posts' ){?> class='active-home' <?php } ?>>Posts</span> </p>
  </div></a> 
  <a href="gallery.php?place=<?= $getname ?>"> <div>
   <p id='active-home'> <span <?php if($pagee == 'gallery' ){?> class='active-home' <?php } ?>>Gallery</span> </p>
  </div></a> 
  
  <a href="direct.php?place=<?= $getname ?>"><div>
    <p> <span <?php if($pagee == 'post_D' ){?> class='active-home' <?php } ?>>Whistle Blows</span> </p>
  </div></a> 
  <a href="homeGroups.php?place=<?= $getname ?>">  <div>
    <p> <span <?php if($pagee == 'homeGees' ){?> class='active-home' <?php } ?>> <? $getname ?>Themes</span></p> 
  </div></a>
</div>

</div>
