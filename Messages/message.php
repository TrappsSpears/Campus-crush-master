<?php 
    $page = 'msgs';
include('../includes/headall.php'); 

?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav">

   <h2>Whistles</h2>
   <div class ='profileContainer'>
   <div class="home_opt" style="border-bottom: none;grid-template-columns:auto auto auto auto">
  <div>
    <p id='active-home'> <span class='active-home'>All</span> </p>
  </div>
  <div>
   <a href="sent.php"> <p id='active-home'> <span>Sent</span> </p> </a>
  </div>
  <a href="../location/members.php?place=<?= $_SESSION['school'] ?>">  <div>
   <span>Mates</span>
  </div></a> 
  <div>
   <a href="../location/direct.php?place=<?= $_SESSION['school'] ?>"> <p> <span >Blow A Wistle </span> </a> </p>
  </div>
</div>
   </div>
</div>
<div >
<!-- Search Data Here -->
<div id='posts'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','msgsPosts.php',true);

         
         // Insert the fetched content into the specified element

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('posts');
      leftbarContentElement.innerHTML = this.responseText;
    }else{
      alert('error')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadPosts();
</script>

    </div>
    </div>
   

    <?php include('../includes/lefty.php') ?>
    </div>
<?php include('../includes/footer.php') ?>
</body>
</html>
