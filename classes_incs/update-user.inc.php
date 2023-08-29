<?php
session_start();

// Include the database connection file
include_once('dbh.class.php');
$dbh = new Dbh();

// User ID from session
$userId = $_SESSION['user_id'];

// Check if the form has been submitted for profile update
if (isset($_POST['update'])) {
    // Retrieve updated values from form fields
    $updatedName = $_POST['name'];
    $updatedSchool = $_POST['school'];
    $updatedUsername = $_POST['username'];
    $updatedEmail = $_POST['email'];

    // Update the user's profile information
    $query = "UPDATE users SET name=?, school=?, username=?, email=? WHERE id=?";
    $stmt = $dbh->connect()->prepare($query);
    if ($stmt->execute([$updatedName, $updatedSchool, $updatedUsername, $updatedEmail, $userId])) {
        $_SESSION['user_name'] = $updatedUsername; 
        $_SESSION['school'] = $updatedSchool; 
       
        header('Location: ../userProfile/profileUserCurrent.php?msg=Updated');
    } else {
        header('Location: ../userProfile/profileUserCurrent.php?msg=Failed');
    }
}

// Check if the form has been submitted for profile photo update

?>
