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
                        <form action="../classes_incs/update-user.inc.php" method="post">
                            <div>
                                <input type="text" placeholder='name' value="<?= $user['name'] ?>" name="name">
                            </div>
                            <div>
                                <input type="text" placeholder='surname' value="<?= $user['surname'] ?>" name="surname" required>
                            </div>
                            <div>
                                <input type="text" placeholder="username" value="<?= $user['username'] ?>" name="username" required>
                            </div>
                            <div>
                                <input type="text" placeholder='email' value="<?= $user['email'] ?>" name="email" required>
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