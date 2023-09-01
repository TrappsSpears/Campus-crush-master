<?php 
$page = 'home';
include_once('../includes/headall.php');
include('indexstyles.php');
?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
 
    <div class="nav">
<div class="conFess_icon" id='small_screen_icon'>
        <h2><span><img src="../images/witterLogo.png" alt="W" class='icons' style="left:-10px;margin-left:-35px">Home - <small> <?= $user['school'] ?></small></span></h2>
        <p> Speaking Unspoken Stories</p>
    </div> 
    <div id="scrollButton" class="scroll-button">
    <button onclick="scrollToTop()">Back to Top</button>
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