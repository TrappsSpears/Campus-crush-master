<div class="footer-nav" id='menue_mob'>

    <div class="footer_items">
       
        <div <?php if ($page == 'home'){ echo 'class="icons-active"';} ?>>
        <a href="../home/home.php">  
         <img src="../images/<?php if ($page == 'home'){ ?>house-blank2.png <?php }else { ?>house-blank.png <?php } ?>" alt="" class='icons-nav'>
        </a>
        </div>
        <div <?php if ($page == 'search'){ echo 'class="icons-active"';} ?>>
        <a href="../Search/search.php">
        <img src="../images/<?php if ($page == 'search'){ ?>search2.png <?php }else { ?>search.png <?php } ?>" alt="" class='icons-nav'>
        </a>
        </div>
        <div <?php if ($page == 'groups'){ echo 'class="icons-active"';} ?> id='unW'>
        <a href="../Groups/groups.php">
        <img src="../images/<?php if ($page == 'groups'){ ?>users(1).png  <?php }else { ?>users.png <?php } ?>" alt="" class='icons-nav'>
        </a>
        </div>
        <div <?php if ($page == 'msgs'){ echo 'class="icons-active"';} ?> id='unW'>
        <a href="../Messages/message.php">
        <img src="../images/<?php if ($page == 'msgs'){ ?>envelope-dot.png  <?php }else { ?>envelope-dot(1).png<?php } ?>" alt="" class='icons-nav'>
        </a>
        </div>
        <div <?php if ($page == 'nots'){ echo 'class="icons-active"';} ?>>
        <a href="../Notifications/notifications.php">
        <img src="../images/<?php if ($page == 'nots'){ ?>bell2.png <?php }else { ?>bell1.png <?php } ?>" alt="" class='icons-nav'>
        </a>
        </div>
      
        <div <?php if ($page == 'profile'){ echo 'class="icons-active"';} ?>><a href="../userProfile/profileUserCurrent.php"><img src="../images/<?php if ($page == 'profile'){ ?>user.png <?php }else { ?>user2.png <?php } ?>" alt="" class='icons-nav'></a></div>
        <div></div>
               <script>
                    const toggleBtn = document.getElementById('toggleBtn');
const menu = document.getElementById('menu');

toggleBtn.addEventListener('click', () => {
    menu.classList.toggle('menu_show');
});

                </script>
    </div>
  </div>