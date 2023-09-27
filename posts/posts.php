<?php 

if(isset($_GET['post'])){
    $post_id = $_GET['post'];


$page = 'postSingle';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav" id  style='padding-bottom:15px'>
            
            <h3><div class="back_btn">
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> Post</button>
    </div></h3>
        </div>
<!-- The post will appear Here -->
<div id='posts'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('GET','postsSingle.php?post_id=<?php echo $post_id ?>',true);

         
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
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
    <script>
        // Add a click event listener to the back button
        document.getElementById("backButton").addEventListener("click", function() {
            // Use the history object's back() method to navigate to the previous page
            history.back();
        });
    </script>
</body>
</html>
<?php } ?>