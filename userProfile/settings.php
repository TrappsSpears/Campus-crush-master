<?php 
$page = 'profile';
include('../includes/headall.php');
if(isset($_SESSION['user_id'])){ 
    $dbh = New Dbh();
    $selectUser = $dbh->connect()->prepare("SELECT * FROM users WHERE id = ?");
    if(!$selectUser->execute(array($user_id))){
        echo 'Failed To Load User';
        
    }else{

        $user = $selectUser->fetch(PDO::FETCH_ASSOC);
        
    }
    ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav">
            <h3>Settings</h3>
        </div>
        <div class="posts">
            <div class="post-container" id='settings'>
            <h3>Update Profile</h3>    
            <div class="post-box" style="text-align: center;">
                    
                    <div>
                        <p style='color:brown'>
                            <?php if(isset($_GET['error'])){ echo $_GET['error'];} ?>
                        </p>
                        <p style='color:aqua'>
                            <?php if(isset($_GET['msg'])){ echo $_GET['msg'];} ?>
                        </p>
                        
                        <form action="../classes_incs/update_profPic.php" method="post" enctype="multipart/form-data">
                            <div class="center">
                        <label for="profile-photo-input" class="profile-photo-label" id='prof_imgLab'>
                            <div><?php if($user['profile_pic']!= ''){ ?>
                                  <img id="profile-image" src="../images/users/<?= $user['profile_pic']?> " alt="Profile Photo">
                                  <?php } else{?>
                                  <img src="../images/noProf.jpeg " alt="">
                                  <?php } ?>
                            </div>
                        
                         <span>Change</span>
                          </label>
                           <input type="file" name="profile_photo" id="profile-photo-input" accept="image/*">
                           <button type='submit' name='submit_prof' id="sbmit_picChange" style='width:fit-content'>Update Photo</button>
                        </div> 
                        </form>
                        
                        <form action="../classes_incs/update-user.inc.php" method="post">
                        
                            <div>
                                <input type="text" placeholder='name' value="<?= $user['name'] ?>" name="name" pattern="[A-Za-z -]+" minlength="3" maxlength="15">
                            </div>
                            <div>
                                <input type="text" placeholder="username" value="<?= $user['username'] ?>" name="username" required pattern="[A-Za-z -]+" minlength="3" maxlength="15">
                            </div>
                            <div>
                                <input type="email" placeholder='email' value="<?= $user['email'] ?>" name="email" required minlength="3" maxlength="20">
                            </div>
                            <div>
                                <input type="text" placeholder='school' value="<?= $user['school'] ?>" name="school" required pattern="[A-Za-z -]+" minlength="3" maxlength="20">
                            </div>
                            <div>
                                <input type="text" placeholder='city' value="<?= $user['city'] ?>" name="city" required pattern="[A-Za-z -]+" minlength="3" maxlength="20">
                            </div>
                            <div style='padding:10px'>
                            <select name="country" required class='select_country' style='padding:10px'>
                                      <option value="<?= $user['country']?>" ><?= $user['country']?> ?</option>
                                       <!-- Add more country options here -->
                                </select>
                            </div>
                            <div>
                                <button type="submit" name='update'>Update</button>
                            </div>
                        </form>
                        <form action="">
                        
                        </form>
                    </div>
                </div>
            </div>
            <div class="post-container" id='logOut'>
             <form action="../classes_incs/log-out.inc.php">
                  <button>LogOut</button> 
               </form>
            </div>
        </div>
    </div>
    <script>
    const profileImage = document.getElementById('profile-image');
    const profilePhotoInput = document.getElementById('profile-photo-input');

    profilePhotoInput.addEventListener('change', function(event) {
        const selectedFile = event.target.files[0];

        if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function() {
                profileImage.src = reader.result;
            };

            reader.readAsDataURL(selectedFile);
        }
    });
</script>
 
    </div>
    <?php include('../includes/footer.php') ?>
</body>
</html>
<?php }else{ ?>
<body>
    <div class="posts">
        <div class="post-container">
            <div class="post-box">
                <h3>Page Not available</h3>
                <p>Go <a href="../index/index.php">Log In</a> </p>
            </div>
        </div>
    </div>
</body>
<?php }?>
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