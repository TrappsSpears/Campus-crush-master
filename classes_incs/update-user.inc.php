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
    $updatedCity = nl2br(htmlspecialchars($_POST['city']));
    $updatedCountry = $_POST['country'];

    // Update the user's profile information
    $query = "UPDATE users SET name=?, school=?, city = ? , country = ? WHERE id=?";
    $stmt = $dbh->connect()->prepare($query);
    if ($stmt->execute([$updatedName, $updatedSchool, $updatedCity, $updatedCountry ,$userId ])) {
        $_SESSION['city'] = $updatedCity;
        $_SESSION['school'] = $updatedSchool;
        $_SESSION['name'] = $updatedName;
         
        header('Location: ../userProfile/settings.php?msg=Profile Updated');
    } else {
        header('Location: ../userProfile/settings.php?error=Failed');
    }


}else if(isset($_POST['updateUsername'])){
    $Username =$_POST['OldUsername'];
    $updatedUsername = nl2br(htmlspecialchars($_POST['username']));
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $dbh->connect()->prepare($sql);
    $stmt->execute([$updatedUsername]);

    if ($stmt->rowCount() > 0) {
        header("Location: ../userProfile/settings.php?error=username  taken ");
        exit();
    }
    // Update the user's profile information
    $query = "UPDATE users SET username=? WHERE id=?";
    $stmt = $dbh->connect()->prepare($query);
    if ($stmt->execute([$updatedUsername ,$userId])) {
        $queryy = "UPDATE posts SET location=? WHERE location=?";
        $stmte = $dbh->connect()->prepare($queryy);
        if($stmte->execute([$Username ,$Username])){
            $_SESSION['username'] = $updatedUsername; 
                
             header('Location: ../userProfile/settings.php?msg=Username Updated'); }
        }

       
}elseif(isset($_POST['updateEmail'])){
    $updatedEmail = nl2br(htmlspecialchars($_POST['email']));
    $sql = "SELECT * FROM users WHERE  email = ?";
    $stmt = $dbh->connect()->prepare($sql);
    $stmt->execute([$updatedEmail]);

    if ($stmt->rowCount() > 0) {
        header("Location: ../userProfile/settings.php?error=Email taken ");
        exit();
    }
    // Update the user's profile information
    $query = "UPDATE users SET  email=?  WHERE id=?";
    $stmt = $dbh->connect()->prepare($query);
    if ($stmt->execute([$updatedEmail,$userId])) {
        $_SESSION['email'] = $updatedEmail;
        header('Location: ../userProfile/settings.php?msg=Email Updated'); }


}else{
    header('Location: ../userProfile/settings.php?error=what are you tryna do');
}

// Check if the form has been submitted for profile photo update

?>
