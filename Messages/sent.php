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
    <a href="message.php"><p id='active-home'> <span>All</span> </p></a>
  </div>
  <div>
    <p id='active-home'> <span class='active-home'>Sent</span> </p>
  </div>
  <a href="../location/members.php?place=<?= $_SESSION['school'] ?>">  <div>
   <span>Mates</span>
  </div></a> 
  <div>
   <a href="../location/direct.php?place=<?= $_SESSION['school'] ?>"> <p> <span >Blow A Wistle  </span> </a> </p>
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
        if($post['username'] == $username){
        include('../includes/posts.php'); }}
        ?>
  

    </div>
    </div>
    <?php include('../includes/leftbar.php') ?>

  <?php include('../includes/footer.php') ?>
</body>
</html>
