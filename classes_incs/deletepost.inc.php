<?php
if (isset($_POST['submit'])) {

    $post_id = $_POST['post_id'];

    include_once('dbh.class.php');
    $dbh = new Dbh();

    $post_pic = $_POST['post_pic']; // Initialize the variable
    $queryDelete = "SELECT post_pic FROM posts WHERE post_id=?";
    $stmtDelete = $dbh->connect()->prepare($queryDelete);
    $stmtDelete->execute([$post_id]);
    $delPic = $stmtDelete->fetchColumn();
  
    $unlink = '../images/imagePosts/' . $delPic;
        if ($unlink) {
            unlink($unlink); // Delete the file
            echo 'Deleted';
        }        
        $delquery="DELETE FROM posts WHERE post_id=?";
        $result = $dbh->connect()->prepare($delquery);
        if ($result->execute([$post_id])) {
            // Successfully deleted the post
            header("Location: ../userProfile/profileUserCurrent.php?Deleted=$post_id");
        } else {
            // Error while Deleting
            header('Location: ../userProfile/profileUserCurrent.php?Failes');
        }
    

} else {
    // Form not submitted
    header("Location: ../index/index.php?FormNotSubmitted");
    exit();
}
?>
