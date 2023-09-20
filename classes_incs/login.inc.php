<?php 
session_start();

if (isset($_POST["submit"])) {
    // Grabbing data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Include the Dbh class
    include_once('dbh.class.php');
    $dbh = new Dbh();

    // Prepare the SQL statement
    $sql = "SELECT * FROM users WHERE email = ? OR username = ?;";

    // Execute the SQL statement using your Dbh class
    $result = $dbh->connect()->prepare($sql);

    if (!$result->execute(array($email,$email))) {
        header("Location: ../home/home.php?error=error");
        exit();
    } else {
        if ($result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $row['password'])) {
                // Set the session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username']; 
                $_SESSION['email'] = $row['email']; 
                $_SESSION['city'] = $row['city'];
                $_SESSION['school'] = $row['school'];
                $_SESSION['profile_pic'] = $row['profile_pic'];
                $_SESSION['name'] = $row['name'];     
                $_SESSION['dob'] = $row['DOB'];   
                $_SESSION['country'] = $row['country'];
                // Redirect to dashboard
                header("Location: ../home/home.php?loggedin=log_inSuccessful&username");                   
            } else {
                $_SESSION['error_log'] = 'Incorrect Usernme or Email or Password';
                header("Location: ../index.php?error=Incorrect Password");
                exit();
            }
        } else {
            $_SESSION['error_log'] = 'No user found, Sign-up instead';
            header("Location: ../index.php?error=No User Found, Signup instead");
            exit();
        }
    }
} else {
    $_SESSION['error_log'] = 'Error';
    header("Location: ../index.php?error=Error");
    exit();
}
?>
