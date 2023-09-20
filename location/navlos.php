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
<span><small><?=$pic['username']?></small><img src="../images/badge-check.png" alt="king" class="icons" style='width:12px;margin-left:5px'></span>

    </div>
  
  </div>
<div class="home_opt" style='grid-template-columns:auto auto auto auto'>
 <a href="location.php?place=<?= $getname ?>"> <div>
   <p id='active-home'> <span <?php if($pagee == 'posts' ){?> class='active-home' <?php } ?>>Posts</span> </p>
  </div></a> 
  <a href="members.php?place=<?= $getname ?>">  <div>
   <span <?php if($pagee == 'membs' ){?> class='active-home' <?php } ?>> Members</span>
  </div></a> 
  <a href="direct.php?place=<?= $getname ?>"><div>
    <p> <span <?php if($pagee == 'post_D' ){?> class='active-home' <?php } ?>>Messages</span> </p>
  </div></a> 
  <a href="homeGroups.php?place=<?= $getname ?>">  <div>
    <p> <span <?php if($pagee == 'homeGees' ){?> class='active-home' <?php } ?>> <? $getname ?>Themes</span></p> 
  </div></a>
</div>
</div>
