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
    
    $updatedName = nl2br(htmlspecialchars($_POST['name']));
    $updatedSchool = nl2br(htmlspecialchars($_POST['school']));
    $updatedUsername = nl2br(htmlspecialchars($_POST['username']));
    $updatedEmail = nl2br(htmlspecialchars($_POST['email']));
    $updatedCity = nl2br(htmlspecialchars($_POST['city']));
    $updatedCountry = $_POST['country'];

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $dbh->connect()->prepare($sql);
    $stmt->execute([$updatedUsername, $updatedEmail]);

    if ($stmt->rowCount() > 0) {
        header("Location: ../userProfile/settings.php?error=username email taken _Update Both of them");
        exit();
    }
    // Update the user's profile information
    $query = "UPDATE users SET name=?, school=?, username=?, email=? ,city = ? , country = ? WHERE id=?";
    $stmt = $dbh->connect()->prepare($query);
    if ($stmt->execute([$updatedName, $updatedSchool, $updatedUsername, $updatedEmail, $updatedCity, $updatedCountry ,$userId ])) {
        $_SESSION['user_name'] = $updatedUsername; 
        $_SESSION['school'] = $updatedSchool; 
       
        header('Location: ../userProfile/settings.php?msg=Profile Updated');
    } else {
        header('Location: ../userProfile/settings.php?error=Failed');
    }
}

// Check if the form has been submitted for profile photo update

?>
