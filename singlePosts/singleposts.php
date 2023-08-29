<?php 
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    include('phpfiles.post-single.php');

$page = 'postSingle';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav">
            
            <h3>Post</h3><div class="back_btn">
            <button id="backButton">< Go Back</button>
    </div>
        </div>
<?php 

    include('postsSingle.php') ?>
    </div>

<?php include('../includes/leftbar.php') ;?>
 
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