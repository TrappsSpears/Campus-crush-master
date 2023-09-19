<?php 
    $page = 'msgs';
include('../includes/headall.php'); 
include('msgsphpFiles.php');
?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav">

   <h2>Messages</h2>
   <div class ='profileContainer'>
   <div class="home_opt" style="border-bottom: none;grid-template-columns:auto auto auto auto">
  <div>
    <p id='active-home'> <span class='active-home'>All</span> </p>
  </div>
  <div>
   <a href="sent.php"> <p id='active-home'> <span>Sent</span> </p> </a>
  </div>
  <a href="../location/members.php?place=<?= $user['school'] ?>">  <div>
   <span>Mates</span>
  </div></a> 
  <div>
   <a href="../location/direct.php?place=<?= $user['school'] ?>"> <p> <span >Direct Post </span> </a> </p>
  </div>
</div>
   </div>
</div>
<div class="posts" >
<?php     include('../includes/script.php');
    include_once('../classes_incs/functionsposts.php');
    foreach($messages as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }
        ?>
  

    </div>
    </div>
    <?php include('../includes/leftbar.php') ?>

  <?php include('../includes/footer.php') ?>
</body>
</html>
