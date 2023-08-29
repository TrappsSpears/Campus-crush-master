<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witter</title>
    <?php include('styles/styleIndex.php') ?>
    <!-- Add this to your HTML -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>


</head>
<body>
    <div class="signup-container">
    <h1><span> W</span>itter</h1>
        <p  >Where Anonymity Meets Understanding, Sharing Unspoken Stories</p>
        <?php if(isset($_GET['error'])){ ?> <p style="color:brown"><?= $_GET['error'] ?></p> <?php } ?>
        <form class="signup-form" action="classes_incs/signup.inc.php" method="post" style="display:<?php if(isset($_GET['msg'])){ echo 'none';} ?>">
    <input type="text" placeholder="Full Name" required name="name" pattern="[A-Za-z -]+" minlength="3" maxlength="30">
    <input type="text" placeholder="Username" required name="username" pattern="[A-Za-z -]+" minlength="3" maxlength="20">
    <input type="email" placeholder="Email" required name="email">
    <input type="password" placeholder="Password" required name="password" minlength="6" maxlength="30">
    <input type="password" placeholder="Repaet Password" required name="password" minlength="6" maxlength="30">
    <input type="text" placeholder="City" required name="city" pattern="[A-Za-z -]+" minlength="3" maxlength="10">
    
    <p class="input-hint">Enter the name of your school/ university/ college or the community you're a part of.</p>
    <input type="text" placeholder="eg Eden university..." required name="school" id="school" minlength="3" maxlength="15">
    

    <button type="submit">Sign Up</button>
    <p class="toggle-button">Already have an account? Log in</p>
</form>


        <form class="login-form" action="classes_incs/login.inc.php" method="post" style='display:<?php if(isset($_GET['msg'])){ echo 'block';} ?>'>
            <input type="text" placeholder="Email or Username" required name='email'>
            <input type="password" placeholder="Password" required name='password'>
            <button type="submit" name='submit'>Log In</button>
  <p style='color:aqua'><?php if(isset($_GET['msg'])){ echo $_GET['msg'] ;} ?></p>
            <p class="toggle-button-sign" >Don't have an account? Sign up</p>
        </form>
    </div>
    <script>
         const signUpForm = document.querySelector('.signup-form');
        const logInForm = document.querySelector('.login-form');
        const toggleButton = document.querySelector('.toggle-button');
        const toggleButton_sign = document.querySelector('.toggle-button-sign');

        toggleButton.addEventListener('click', function() {
            signUpForm.style.display = 'none';
            logInForm.style.display = 'block';
        });
        toggleButton_sign.addEventListener('click', function() {
            signUpForm.style.display = 'block';
            logInForm.style.display = 'none';
        });
    </script>



</body>
</html>
