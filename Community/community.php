<?php 
    $page = 'community';
include('../includes/headall.php');
include('stylesComm.php')
?>

<body>  
    <div class="main">

    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" style='border-bottom:none;'>
<div>
      <h2>Community</h2>
 </div>

</div>
<div class='comm_container'>
<div class="comm_name">
<div class="profil_user">
    <img src="../images/users/<?= $user['profile_pic']?>" alt="" class='icons'>
    <p><?= $user['username'] ?></p>
</div>
<div class="user_home">
    <div class="shcool">
       Yours.<?= $user['school'] ?>
       <p><small>213k members</small></p>
</div>
  

<h3></h3>
<div>
    +Community 1
    <p><small>33k members</small></p>

</div>
<div>
    +Community 2
    <p><small>78k members</small></p>

</div>
<div>
    +Community 3
    <p><small>4k members</small></p>

</div>
<div>
    +Community 4
    <p><small>13k members</small></p>

</div>
<div>
    +Community 5
    <p><small>21k members</small></p>

</div>

</div>

</div>
<div class="comm_chat">
<div class="post_chat">

</div>
<div class="header_comm">
    <h3>Comm Name</h3>
</div>
<div class="btn_create">
    <button>Create</button>
</div>
</div>
</div>
    </div>
   
    </div>
  <?php include('../includes/footer.php') ?>
</body>
</html>
