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
    <div class="nav" id="navOther">
    <h2><div class="back_btn" >
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> Settings</button>
    </div></h2>


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
                        <div class="post-container">
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
                        </div>
                       <div class="post-container" id='update'>
                        <form action="../classes_incs/update-user.inc.php" method="post">
                              <div>
                                <input type="text" placeholder="username" value="<?= $user['username'] ?>" name="username" required pattern="[A-Za-z -]+" minlength="3" maxlength="15">
                                <input type="hidden" value="<?= $user['username'] ?>" name="OldUsername" >
                                <div>
                                      <button name='updateUsername'> Update Username</button>  
                                </div>
                            
                            </div>
                        </form>
                       </div>
                        <div class="post-container" id='update'>
                            <form action="../classes_incs/update-user.inc.php" method="post">
                                <div>
                                <input type="email" placeholder='email' value="<?= $user['email'] ?>" name="email" required minlength="3" maxlength="20">
                                <div>
                                      <button name='updateEmail'> Update Email</button>
                                </div>
                              
                            </div>
                            </form>
                        </div>
                        <form action="../classes_incs/update-user.inc.php" method="post">
                        
                            <div>
                                <input type="text" placeholder='name' value="<?= $user['name'] ?>" name="name" pattern="[A-Za-z -]+" minlength="3" maxlength="15">
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
<?php } include('../includes/script.php')?>
