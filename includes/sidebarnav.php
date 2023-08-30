<div class="sidebar-nav">
    
    
        <nav>
<div class="conFess_icon">
    <h2><span><img src="../images/witterLogo2.png" alt="W" class='icons'></span>itter</h2>

    </div>
            <ul>
                <div <?php if ($page == 'home'){ echo 'class="active"';} ?>> 
                    <a href="../index/index.php" class='nav-a'> <?php if ($page == 'home'){ echo '<span></span>';} ?>
                       <span></span><span></span>  <li>   Home</li>
                    </a>
                </div>
        

                <div <?php if ($page == 'search'){ echo 'class="active"';} ?>>
                    <a href="../Search/search.php" class="nav-a"><?php if ($page == 'linkups'){ echo '<span></span>';} ?>
                        <span></span><span></span><li>Explore</li>
                    </a>
                </div>
                <div <?php if ($page == 'nots'){ echo 'class="active"';} ?>>
                    <a href="../Notifications/notifications.php" class="nav-a"><?php if ($page == 'hot'){ echo '<span></span>';} ?>
                        <span></span><span></span><li>Notifications</li>
                    </a>
                </div>
                <div <?php if ($page == 'bookmarks'){ echo 'class="active"';} ?>>
                    <a href="../bookmarks/bookmarks.php" class="nav-a"><?php if ($page == 'bookmarks'){ echo '<span></span>';} ?>
                        <span></span><span></span><li>Bookmarks</li>
                    </a>
                </div>
                <div <?php if ($page == 'profile'){ echo 'class="active"';} ?>>
                    <a href="../userProfile/profileUserCurrent.php" class="nav-a"><?php if ($page == 'bookmarks'){ echo '<span></span>';} ?>
                        <span></span><span></span><li>Profile</li>
                    </a>
                </div>
                
               
                
             
            </ul>
        </nav>
        <div class="footer-about">
            Your Confessions Platform - DailyDee - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a>
        </div>
    </div>