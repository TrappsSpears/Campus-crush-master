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
    <p> <span <?php if($pagee == 'homeGees' ){?> class='active-home' <?php } ?>> <? $getname ?> Groups</span></p> 
  </div></a>
</div>
