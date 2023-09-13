<div class="sidebar-nav">
    
    
        <nav><a href="../index/index.php">
    <div class="conFess_icon">
    <h2><span><img src="../images/witterLogo.png" alt="W" class='icons'></span>itterVerse</h2>


    </div>
    </a>
            <ul>
                <div <?php if ($page == 'home'){ echo 'class="active"';} ?>> 
                    <a href="../home/home.php" class='nav-a'> <?php if ($page == 'home'){ echo '<span></span>';} ?>
                       <span></span><span></span>  <li>  
                        
                       
                       <img src="../images/<?php if ($page == 'home'){ ?>house-blank2.png <?php }else { ?>house-blank.png <?php } ?>" alt="" class='icons'>  Home</li>
                    </a>
                </div>
        

                <div <?php if ($page == 'search'){ echo 'class="active"';} ?>>
                    <a href="../Search/search.php" class="nav-a"><?php if ($page == 'search'){ echo '<span></span>';} ?>
                        <span></span><span></span><li>
                            <img src="../images/<?php if ($page == 'search'){ ?>search2.png <?php }else { ?>search.png <?php } ?>" alt="" class='icons'>Explore</li>
                    </a>
                </div>
                <div <?php if ($page == 'nots'){ echo 'class="active"';} ?>>
                    <a href="../Notifications/notifications.php" class="nav-a"><?php if ($page == 'nots'){ echo '<span></span>';} ?>
                        <span></span><span></span><li>
                            <img src="../images/<?php if ($page == 'nots'){ ?>bell2.png <?php }else { ?>bell1.png <?php } ?>" alt="" class='icons'>Unseen</li>
                    </a>
                </div>
                <div <?php if ($page == 'bookmarks'){ echo 'class="active"';} ?>>
                    <a href="../bookmarks/bookmarks.php" class="nav-a">
                        <?php if ($page == 'bookmarks'){ echo '<span></span>';} ?>
                        <span></span><span></span><li>
                            <img src="../images/<?php if ($page == 'bookmarks'){ ?>star2.png <?php }else { ?>star(1).png <?php } ?>" alt="" class='icons'>Starred</li>
                    </a>
                </div>
                <div <?php if ($page == 'profile'){ echo 'class="active"';} ?>>
                    <a href="../userProfile/profileUserCurrent.php" class="nav-a"><?php if ($page == 'profile'){ echo '<span></span>';} ?>
                        <span></span><span></span><li><img src="../images/<?php if ($page == 'profile'){ ?>user.png <?php }else { ?>user2.png <?php } ?>" alt="" class='icons'>Profile</li>
                    </a>
                </div>
                
               
                
             
            </ul>
        </nav>
        <div class="footer-about">
           Share Express Engage - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a>
        </div>
    </div>