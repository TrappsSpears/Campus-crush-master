<?php 
    $page = 'groups';
    $pagee = 'location';
include('../includes/headall.php');
include('grps.incs.php');  ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
<?php  include('navrps.php')?>
<div class="posts">

<!-- PostBox Here -->
 
<div id='posts'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','placesdata.php',true);

         
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
    <?php
     include('../includes/script.php');
include('../includes/lefty.php'); ?>
    </div>

  <?php include('../includes/footer.php') ?>
</body>
</html>
