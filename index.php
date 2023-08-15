<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConfessConnect</title>
    <?php include('styles/styleIndex.php') ?>
</head>
<body>
    <div class="signup-container">
        <h1>ConfessConnect</h1>
        <p>Share your confessions and connect with others.</p>
        <form class="signup-form" action="classes_incs/signup.inc.php" method="post">
            <input type="text" placeholder="Full Name" required name='name'>
            <input type="text" placeholder="Username" required name='username'>
            <input type="email" placeholder="Email" required name='name' name='email'>
            <input type="password" placeholder="Password" required name='password'>
            <input type="text" placeholder="City" required name='city'>
            <input type="text" placeholder="School (optional)" name='school'>
            <button type="submit">Sign Up</button>
            <p class="toggle-button" >Already have an account? Log in</p>
        </form>
        <form class="login-form" action="classes_incs/login.inc.php" method="post">
            <input type="email" placeholder="Email" required name='email'>
            <input type="password" placeholder="Password" required name='password'>
            <button type="submit">Log In</button>
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
