<?php 
if(isset($_GET['place'])){
    $getname = $_GET['place'];
    $page = 'location';
    $pagee ='gallery';
include('../includes/headall.php'); 
?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" id="navOther">

    <h2><div class="back_btn">
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> <?= $getname ?> Gallery</button>
    </div></h2>
    
  
</div>
<?php include('skuldat.php'); ?>
  <div id='posts' >

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('GET','location.incs.php?gal=<?php echo $getname ?>',true);

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('posts');
      leftbarContentElement.innerHTML = this.response;
    }else{
      alert('error Loading postMessage')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadPosts();
</script>

    </div>
    <?php   include('../includes/lefty.php'); ?>

    </div>
<?php include('../includes/footer.php') ;
  include('../includes/script.php');
  ?>
 
</body>
</html>
<?php } ?>
