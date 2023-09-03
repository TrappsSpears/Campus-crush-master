<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/witterlogo2.png">
    <title>WitterVerse</title>
    <?php include('styles/styleIndex.php') ?>
    <!-- Add this to your HTML -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>


</head>
<body>
    <div class="signup-container">
    <h1><span> W</span>itterVerse</h1>
        <p  >Where Anonymity Meets Understanding, Sharing Unspoken Stories</p>
        <?php if(isset($_GET['error'])){ ?> <p style="color:brown"><?= $_GET['error'] ?></p> <?php } ?>
        
    <form class="signup-form" action="classes_incs/signup.inc.php" method="post" onsubmit="return validateForm()" style="display:<?php if(isset($_GET['msg'])){ echo 'none';} ?>">
        <input type="text" placeholder="Full Name" required name="name" pattern="[A-Za-z -]+" minlength="3" maxlength="30">
        
        <div class="input-container">
            <input type="text" placeholder="Username" required name="username" pattern="[A-Za-z -]+" minlength="3" maxlength="20">
            <input type="email" placeholder="Email" required name="email">
        </div>
        
        <div class="input-container">
            <input type="password" placeholder="Password" required name="password" minlength="6" maxlength="30" id='password'>
            <input type="password" placeholder="Repeat Password" required name="password_repeat" minlength="6" maxlength="30" id='password_repeat'>
       
        </div>
             <p id="password_match_error" style="color: red;"></p>
     
        <p>When is your Birthday</p>
        <input type="date" placeholder="Date of Birth" required name="dob" id="dob">
<p id="dob_error" style="color: red;"></p>
        <!-- Instructions for School -->
        <p class="input-hint">Enter the name of your school/university/college or the community you're a part of.</p>
        
        <div class="input-container">
            <input type="text" placeholder="e.g. Eden University..." required name="school" id="school" minlength="3" maxlength="15">
            
            <!-- Country Dropdown -->
            <select name="country" required class='select_country'>
             
                <!-- Add more country options here -->
            </select>
        </div>
        <input type="text" placeholder="City" required name="city" pattern="[A-Za-z -]+" minlength="3" maxlength="10">

        
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
<script>
const countries = [
  "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia",
  "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin",
  "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi",
  "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
  "Comoros", "Congo", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
  "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia",
  "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala",
  "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq",
  "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South",
  "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania",
  "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius",
  "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia",
  "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman",
  "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal",
  "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa",
  "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore",
  "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain", "Sri Lanka", "Sudan",
  "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo",
  "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates",
  "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen",
  "Zambia", "Zimbabwe"
];


const countryDropdown = document.querySelector('select[name="country"]');

countries.forEach(country => {
    const option = document.createElement("option");
    option.value = country;
    option.textContent = country;
    countryDropdown.appendChild(option);
});
</script>
<script>
    // JavaScript code for password validation
    const passwordInput = document.getElementById('password');
    const passwordRepeatInput = document.getElementById('password_repeat');
    const passwordMatchError = document.getElementById('password_match_error');

    function validatePassword() {
        const password = passwordInput.value;
        const passwordRepeat = passwordRepeatInput.value;

        if (password !== passwordRepeat) {
            passwordMatchError.textContent = "Passwords do not match";
            passwordMatchError.style.display = "block";
        } else {
            passwordMatchError.textContent = "";
            passwordMatchError.style.display = "none";
        }
    }

    // Add event listeners to both password inputs
    passwordInput.addEventListener('keyup', validatePassword);
    passwordRepeatInput.addEventListener('keyup', validatePassword);
</script>

<script>
    // JavaScript code for date of birth validation
    const dobInput = document.getElementById('dob');
    const dobError = document.getElementById('dob_error');

    function validateDateOfBirth() {
        const dob = new Date(dobInput.value);
        const today = new Date();
        const minAgeDate = new Date();
        minAgeDate.setFullYear(today.getFullYear() - 10); // Minimum age of 10 years

        if (dob > minAgeDate) {
            dobError.textContent = "You must be at least 10 years old.";
            dobError.style.display = "block";
        } else {
            dobError.textContent = "";
            dobError.style.display = "none";
        }
    }

    // Add event listener to date of birth input
    dobInput.addEventListener('change', validateDateOfBirth);
</script>
<script>
    function validateForm() {
        const password = document.getElementById('password').value;
        const passwordRepeat = document.getElementById('password_repeat').value;
        const dob = new Date(document.getElementById('dob').value);
        const today = new Date();
        const minAgeDate = new Date();
        minAgeDate.setFullYear(today.getFullYear() - 10); // Minimum age of 10 years

        // Validate passwords match
        if (password !== passwordRepeat) {
            alert("Passwords do not match.");
            return false; // Prevent form submission
        }

        // Validate minimum age requirement
        if (dob > minAgeDate) {
            alert("You must be at least 10 years old.");
            return false; // Prevent form submission
        }

        // If all validations pass, allow form submission
        return true;
    }
</script>

</body>
</html>
