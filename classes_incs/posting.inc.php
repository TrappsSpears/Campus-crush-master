<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    $response = array();

    $post = nl2br(htmlspecialchars($_POST['post']));
    $location = $_POST['location'];
    $user_id = $_POST['user_id'];
    $date = date('Y-m-d H:i:s');
    if(isset($_POST['show_profile'])){
        $anonym = $_POST['show_profile']; 
    }else{
        $anonym = '';
    }
   
    $theme = $_POST['theme'];
    include_once('dbh.class.php');
    $dbh = new Dbh();

    $post_pic = $_FILES['post_pic']; // Initialize the variable

    // Upload the image if it's set
    if (isset($_FILES["post_pic"]) && $_FILES["post_pic"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "../images/imagePosts/";

        $uniqueFilename = uniqid() . '_' . $_FILES["post_pic"]["name"];
        $targetFile = $targetDir . $uniqueFilename;

        // Validate file type
        $imageFileType = strtolower(pathinfo($_FILES["post_pic"]["name"], PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo "InvalidFormat";
        } else {
            if (move_uploaded_file($_FILES["post_pic"]["tmp_name"], $targetFile)) {
                // Successfully uploaded the file
                $post_pic = $uniqueFilename; // Set the file path
            } else {
                // Error while moving the uploaded file
                echo  "Error_MovingFile";
            }
        }
    }

    // Prepare and execute the post insertion query
    $sql = "INSERT INTO posts(post_body, user_id, date_created, location, time, post_pic, anonymous, theme) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $result = $dbh->connect()->prepare($sql);

    if (!$result->execute(array($post, $user_id, $date, $location, $date, $post_pic, $anonym, $theme))) {
        echo "Error_Query";
        
    } else {
   
        echo  "Post successfully created!";
    }


} else {
    // Form not submitted or invalid request
    header('HTTP/1.1 400 Bad Request');
    exit();
}
?>
