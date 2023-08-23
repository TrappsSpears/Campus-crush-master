<div class="footer-nav" id='menue_mob'>
    <div class="footer_items">
        <div <?php if ($page == 'home'){ echo 'class="icons-active"';} ?>><a href="../index/index.php"><img src="../images/homeall.png" alt="Home" class='icons-nav'></a></div>
        <div <?php if ($page == 'search'){ echo 'class="icons-active"';} ?>><a href="../Search/search.php"><img src="../images/explore.png" alt="explore" class='icons-nav'></a></div>
        <div <?php if ($page == 'nots'){ echo 'class="icons-active"';} ?>><a href="../Notifications/notifications.php"><img src="../images/bell.png" alt="nots" class='icons-nav'></a></div>
        <div <?php if ($page == 'bookmarks'){ echo 'class="icons-active"';} ?>><a href="../bookmarks/bookmarks.php"><img src="../images/bookmark.png" alt="bookmarks" class='icons-nav'></a></div>
        <div <?php if ($page == 'profile'){ echo 'class="icons-active"';} ?>><a href="../userProfile/profileUserCurrent.php"><img src="../images/profile-user.png" alt="Profile" class='icons-nav'></a></div>
                <script>
                    const toggleBtn = document.getElementById('toggleBtn');
const menu = document.getElementById('menu');

toggleBtn.addEventListener('click', () => {
    menu.classList.toggle('menu_show');
});

                </script>
    </div>
  </div>