<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $city = $_POST['city'];
    $school = $_POST['school'];
    $date = $_POST['dob'];
    $country = $_POST['country'];
    include_once('dbh.class.php');
        $dbh = new Dbh();
    // Check if username or email is already in the database
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $dbh->connect()->prepare($sql);
    $stmt->execute([$username, $email]);

    if ($stmt->rowCount() > 0) {
        header("Location: ../index.php?error=username_email_taken");
        exit();
    }

    // Insert user data into the database
    $sql = "INSERT INTO users (name, username, email, password, city, school,country,DOB,profile_pic) VALUES (?, ?, ?, ?, ?, ?,?,?,'noProf.jpeg')";
    $stmt = $dbh->connect()->prepare($sql);
    $stmt->execute([$fullName, $username, $email, $password, $city, $school,$country,$date]);

    
    $successMsg = 'SignUp successful..Now LogIn';

    header("Location: ../index.php?msg=$successMsg"); 
    exit();
} else {
    header("Location: ../index.php"); // Redirect if accessed directly
    exit();
}
?>
