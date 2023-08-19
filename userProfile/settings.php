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
            <div class="post-box">
                    
                    <div>
                        <form action="../classes_incs/update_profPic.php" method="post" enctype="multipart/form-data">
                           <div class="center">
                        <label for="profile-photo-input" class="profile-photo-label">
                          <img id="profile-image" src="path_to_default_image.jpg" alt="Profile Photo">
                         <span>Upload Photo</span>
                          </label>
                           <input type="file" name="profile_photo" id="profile-photo-input" accept="image/*">
                           <button type='submit' name='submit_prof'>Update Photo</button>
                        </div> 
                        </form>
                        
                        <form action="../classes_incs/update-user.inc.php" method="post">
                        
                            <div>
                                <input type="text" placeholder='name' value="<?= $user['name'] ?>" name="name">
                            </div>
                            <div>
                                <input type="text" placeholder="username" value="<?= $user['username'] ?>" name="username" required>
                            </div>
                            <div>
                                <input type="email" placeholder='email' value="<?= $user['email'] ?>" name="email" required>
                            </div>
                            <div>
                                <input type="text" placeholder='school' value="<?= $user['school'] ?>" name="school" required>
                            </div>
                            <div>
                                <button type="submit" name='update'>Update</button>
                            </div>
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