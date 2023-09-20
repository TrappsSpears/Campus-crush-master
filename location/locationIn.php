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

 
<?php include('navlos.php'); ?>
  
<?php     
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
    <?php
    include('../includes/script.php');
    include('../includes/leftbar.php') ?>

  <?php include('../includes/footer.php');

  ?>
</body>
</html>