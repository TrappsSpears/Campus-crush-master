<?php 
$page = 'home';
$pagee = 'forYou';
include_once('../includes/headall.php');
include('indexstyles.php');
?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
 
    <div class="nav">
      <div class="icon">
        <img src="../images/witterlogo.png" alt="" class='icons'>
      </div>
      <div class='nav_prof' id='nav_prof'>
        <a href="../bookmarks/bookmarks.php"> <img src="../images/star(1).png" alt="Starred" ></a>
        <a href="../Messages/message.php"> <img src="../images/envelope-dot(1).png" alt="messages" ></a>
        <a href="../Groups/groups.php"><img src="../images/users.png" alt=""></a>
    </div>
      <div>
        <h2 class='home_h2'> <span >Home</span> </h2>
      </div>
<div id="scrollButton" class="scroll-button">
    <button onclick="scrollToTop()">Back to Top</button>
  </div> 
<div class="home_opt">
  <div>
    <p id='active-home'> <span class='active-home'>For You</span> </p>
  </div>
  <a href="../location/location.php?place=<?= $user['school'] ?> ">  <div>
   <span> <?= $user['school'] ?> </span>
  </div></a> 
</div>
    
</div>

<?php include('../includes/postHome.php') ?>

    </div>

<?php include('../includes/leftbar.php') ;?>

    </div>
  <?php include('../includes/footer.php') ?>
  <script>
// Show the scroll button when user scrolls down and hide when scrolling up
var prevScrollPos = window.pageYOffset;

window.onscroll = function() {
  showHideScrollButton();
};

function showHideScrollButton() {
  var currentScrollPos = window.pageYOffset;
  var scrollButton = document.getElementById("scrollButton");
  
  if (prevScrollPos > currentScrollPos) {
    // Scrolling up
    scrollButton.style.display = "none";
  } else {
    // Scrolling down
    if (currentScrollPos > 5300) {
      scrollButton.style.display = "block";
    } else {
      scrollButton.style.display = "none";
    }
  }
  
  prevScrollPos = currentScrollPos;
}

// Scroll to the top and refresh the page
function scrollToTop() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  location.reload();
}



  </script>
</body>
</html>