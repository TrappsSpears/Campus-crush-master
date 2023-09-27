<div class="sidebar-nav">
    
    <a href="../witter/home.php">
    <div class="conFess_icon">
    <h2>
     <b> <img src="../images/witterlogo2.png" alt="" class='icons'></b></h2>


    </div>
    </a>
            <ul>
                <div <?php if ($page == 'home'){ echo 'class="active"';} ?>> 
                    <a href="../home/home.php" class='nav-a'> 
                        <li>  
                        
                       
                       <img src="../images/<?php if ($page == 'home'){ ?>house-blank2.png <?php }else { ?>house-blank.png <?php } ?>" alt="" class='icons'>  Home</li>
                    </a>
                </div>
        

                <div <?php if ($page == 'search'){ echo 'class="active"';} ?>>
                    <a href="../Search/search.php" class="nav-a">
                      <li>
                            <img src="../images/<?php if ($page == 'search'){ ?>search2.png <?php }else { ?>search.png <?php } ?>" alt="" class='icons'>Explore</li>
                    </a>
                </div>
                <div <?php if ($page == 'groups'){ echo 'class="active"';} ?>>
                    <a href="../Groups/groups.php" class="nav-a">
                        <li>
                            <img src="../images/<?php if ($page == 'groups'){ ?>users(1).png <?php }else { ?>users.png <?php } ?>" alt="" class='icons'>Grouped</li>
                    </a>
                </div>
            
                <div <?php if ($page == 'msgs'){ echo 'class="active"';} ?>>
                    <a href="../Messages/message.php" class="nav-a">
                        <li><img src="../images/<?php if ($page == 'msgs'){ ?>envelope-dot.png <?php }else { ?>envelope-dot(1).png <?php } ?>" alt="" class='icons'>Whistles</li>
                    </a>
                </div>
                <div <?php if ($page == 'nots'){ echo 'class="active"';} ?>>
                    <a href="../Notifications/notifications.php" class="nav-a">
                       <li>
                            <img src="../images/<?php if ($page == 'nots'){ ?>bell2.png <?php }else { ?>bell1.png <?php } ?>" alt="" class='icons'>Unseen</li>
                    </a>
                </div>
                <div <?php if ($page == 'bookmarks'){ echo 'class="active"';} ?>>
                    <a href="../bookmarks/bookmarks.php" class="nav-a">
                        <li>
                            <img src="../images/<?php if ($page == 'bookmarks'){ ?>star2.png <?php }else { ?>star(1).png <?php } ?>" alt="" class='icons'>Starred</li>
                    </a>
                </div>
                <div>
                    <a href="../witter/home.php" class="nav-a">
                   <li><img src="../images/menu.png" alt="" class='icons' style="filter: invert(100%);transform:rotate(90deg)">More</li>
                    </a>
                </div>
                <div <?php if ($page != 'profile'){ echo 'class="active"';} ?>>
                    <a href="../userProfile/profileUserCurrent.php" class="nav-a">
                   <li class='prof_i'><img src="../images/<?php if ($page == 'profile'){ ?>user.png <?php }else { ?>user2.png <?php } ?>" alt="" class='icons'>Profile</li>
                    </a>
                </div>
              
            </ul>
        </nav>
       
    </div>