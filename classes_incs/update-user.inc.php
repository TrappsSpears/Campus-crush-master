<?php

// Check if the form has been submitted
if(isset($_POST['update'])) {
    session_start();
    $userId = $_SESSION['user_id'];
    // Retrieve updated values from form fields
    $updatedName = $_POST['name'];
    $updatedSurname = $_POST['surname'];
    $updatedUsername = $_POST['username'];
    $updatedEmail = $_POST['email'];
    include_once('dbh.class.php');
    $dbh = new Dbh();
    

    // Update the database
    $query = "UPDATE users SET name=?, surname=?, username=?, email=? WHERE id=?";
    
    // Prepare and execute the query
    $stmt = $dbh->connect()->prepare($query);
    if($stmt->execute([$updatedName, $updatedSurname, $updatedUsername, $updatedEmail, $userId])){
        header('Location: ../userProfile/profileUserCurrent.php?msg=Updated'); 
    }else{
        header('Location: ../userProfile/profileUserCurrent.php?msg=Failed'); 
    };

    // Redirect or display a success message
    // Redirect to a success page
    // echo "User information updated successfully!";
}else{
    echo'err';
}
?>
