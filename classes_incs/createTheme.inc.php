<?php
if (isset($_POST['submit'])) {
    $post = nl2br(htmlspecialchars($_POST['description']));
    $location = $_POST['location'];
    $user_id = $_POST['user_id'];
    $anonym = $_POST['show_profile'];
    $themename=nl2br(htmlspecialchars($_POST['themeName']));;
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
            header('Location: ../home/home.php.php?InvalidFormat');
            exit();
        } else {
            if (move_uploaded_file($_FILES["post_pic"]["tmp_name"], $targetFile)) {
                // Successfully uploaded the file
                $post_pic = $uniqueFilename; // Set the file path
            } else {
                // Error while moving the uploaded file
                header("Location: ../home/home.php.php?Error_MovingFile");
                exit();
            }
        }
    }

    // Prepare and execute the post insertion query
    $sql = "INSERT INTO themes(theme_desc, creator_id, location, cover_photo, anonymous,theme_name) VALUES ( ?, ?, ?, ?, ?,?)";
    $result = $dbh->connect()->prepare($sql);

    // Check if the query executed successfully
    if ($result->execute([$post, $user_id, $location,  $post_pic, $anonym,$themename])) {      
            header("Location: ../location/homeGroups.php?place=Eden&successfullyCreatedATheme");
        exit();
    } else {
        // Error while executing the query
        header("Location: ../home/home.php?Error_Query");
        exit();
    }
} else {
    // Form not submitted
    header("Location: ../home/home.php.php?FormNotSubmitted");
    exit();
}
?>
