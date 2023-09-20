<?php

session_start();

// Include the database connection file
include_once('dbh.class.php');
$dbh = new Dbh();

// User ID from session
$userId = $_SESSION['user_id'];
if (isset($_POST["submit_prof"]) && isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] == UPLOAD_ERR_OK) {
    $targetDir = "../images/users/";

    $uniqueFilename = uniqid() . '_' . $_FILES["profile_photo"]["name"];
    $targetFile = $targetDir . $uniqueFilename;

    // Validate file type
    $imageFileType = strtolower(pathinfo($_FILES["profile_photo"]["name"], PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        header('Location: ../userProfile/settings.php?error=Wrong File Format');
    } else {
        // Delete current profile picture if it exists
        $queryDelete = "SELECT profile_pic FROM users WHERE id=?";
        $stmtDelete = $dbh->connect()->prepare($queryDelete);
        $stmtDelete->execute([$userId]);
        $currentProfilePic = $stmtDelete->fetchColumn();

        if ($currentProfilePic) {
            unlink($currentProfilePic); // Delete the file
        }

        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $targetFile)) {
            // Update the user's profile picture path in the database
            $queryUpdate = "UPDATE users SET profile_pic=? WHERE id=?";
            $stmtUpdate = $dbh->connect()->prepare($queryUpdate);
            if ($stmtUpdate->execute([$uniqueFilename, $userId])) {
                // Successfully uploaded the file and updated profile picture
                $_SESSION['profile_pic'] = $uniqueFilename;
                header('Location: ../userProfile/settings.php?msg=Profile Pic Updated');
            } else {
                // Error while updating profile picture
                header('Location: ../userProfile/settings.php?error=Failes');
            }
        } else {
            // Error while moving the uploaded file
            header('Location: ../userProfile/settings.php?error=error');;
        }
    }
} else {
    header('Location ../userProfile/settings.php?error=Err');;
}
