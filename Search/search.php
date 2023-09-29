<?php 
    $page = 'search';
include('../includes/headall.php'); 
include('search.incs.php');
?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" id="nav" >
    
    <form action="../Trends/trends.php" method="get" style='width:100%'>
    <div class="search_place">
        <input type="text" placeholder="Explore..." id='search' name="word"><button type='submit' >  <img src="../images/search.png" alt="search" class='icons'></button>
    </div></form>
</div>
<!-- Search Data Here -->
<h2 style='text-align:left;margin-left:15px;margin-top:10px'>Weekly Highlights</h2>
<div id='highlights'>

</div>
<!-- 
Main Content Here -->
<script>
// Function to fetch and insert content into the leftbar
function loadHighlights() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','../home/highlights.php',true);

         
         // Insert the fetched content into the specified element

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('highlights');
      leftbarContentElement.innerHTML = this.response;
    }else{
      alert('error')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadHighlights();
</script>
<div id='posts'>

</div>

<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','searhdata.php',true);

         
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
 <?php include('../includes/lefty.php'); ?>
    </div>
    </div>
  <?php include('../includes/footer.php') ?>
</body>
</html>
