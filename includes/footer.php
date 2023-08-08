<div class="footer-nav" id='menue_mob'>
    <div class="footer_items">
        <div <?php if ($page == 'home'){ echo 'class="icons-active"';} ?>><a href="../index/index.php"><img src="../images/home.png" alt="Home" class='icons-nav'></a></div>
        <div <?php if ($page == 'search'){ echo 'class="icons-active"';} ?>><a href="../Search/search.php"><img src="../images/search.png" alt="Home" class='icons-nav'></a></div>
        <div <?php if ($page == 'hot'){ echo 'class="icons-active"';} ?>><a href="../Hot/hots.php"><img src="../images/man.png" alt="Thrills" class='icons-nav'></a></div>
        <div <?php if ($page == 'linkups'){ echo 'class="icons-active"';} ?>><a href="../linkups/linkups.php"><img src="../images/link.png" alt="Linckups" class='icons-nav'></a></div>
        <div <?php if ($page == 'profile'){ echo 'class="icons-active"';} ?>><a href="../userProfile/profileUserCurrent.php"><img src="../images/user.png" alt="Profile" class='icons-nav'></a></div>
        <div id='toggleBtn'><img src="../images/menu.png" alt="Profile" class='icons-nav'>
        <nav id="menu">
        <ul>
            <li><a href="../bookmarks/bookmarks.php"> Bookmarks</a></li>
            <li><a href="../classes_incs/log-out.inc.php">LogOut</a></li>
            <li><a href="../privacy/privacy.html">About</a></li>            
        </ul>
       </nav>
    
        </div>
                <script>
                    const toggleBtn = document.getElementById('toggleBtn');
const menu = document.getElementById('menu');

toggleBtn.addEventListener('click', () => {
    menu.classList.toggle('menu_show');
});

                </script>
    </div>
  </div>