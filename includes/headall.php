<?php
    session_start();
    if(isset($_SESSION['user_id'])){
         $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $userLogged = true;
        include('../classes_incs/phpfiles.inc.php');
    }else{
        header('Location: ../index.php');
        die();
    }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <?php 
    include('../styles/style.php');
    include('../userProfile/userprofilStyles.php') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Df+89N2JGQ3NVhJeCP1HbX9fzmKjV49+q+k19LH6JhC6Fv50VgE1mvDCdm+yTzX9JpSx+DnW8lQGw7B/ZLsB1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/witterlogo.png">
    <title>WitterVerse </title>
</head>