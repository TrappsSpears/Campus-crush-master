<?php 
    $page = 'search';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav">
    <div class="conFess_icon" id='small_screen_icon'>
        <h2><span><img src="../images/witterLogo.png" alt="W" class='icons' style="left:-10px;margin-left:10px">Explore</span></h2>
        <p> Speaking Unspoken Stories</p>
    </div>
    <form action="../Trends/trends.php" method="get">
    <div class="search_place">
        <input type="text" placeholder="Search..." id='search' name="word"><button type='submit' >  <img src="../images/search.png" alt="search" class='icons'></button>
    </div></form>
</div>
<div class="posts" id="search-conts" >
    <div class="search-conts" id="search-conts">
    <div class="post_box">
    <div class="trends">
        <div class="locs">
        <h2>
              Trends
        </h2> 
        </div>
        <?php foreach($trendingThemes as $trend){ ?>
        <a href="../Trends/trends.php?word=<?= $trend['theme'] ?>">
            <div class='trndItms'>
                <div>
                    <small>Posts <?= $trend['post_count'] ?>  - <?= $trend['top_location'] ?> </small>
                </div>
                <div>
                <p>#<?= $trend['theme'] ?></p>
                </div>
                <div>
                 <small>Engagements <?php echo $trend['like_count'] + $trend['comment_count'] ?>  <a href="../Trends/trends.php?reaction=<?= $trend['type'] ?>"> <span><img src="../images/<?= $trend['type'] ?>.png" alt="<?= $trend['type'] ?>"> </span></a></small>
                </div>
            </div>
        </a>
 
    
   <?php } ?>
   
    
    </div>
    <div class="trends">
        <div class="locs">
            <h2>Top Places</h2>
        </div>
       
    <?php foreach($location as $trend){ 
        ?>
        <a href="../Trends/trends.php?word=<?= $trend['location'] ?>">
            <div class='trndItms'>
                <div>
                    <small>Posts <?= $trend['post_count'] ?> - <?= $trend['theme'] ?></small>
                </div>
                <div>
                <p> <img src="../images/placeholder.png" alt="-" class='icons' style='width:15px;position:relative;top:3px;margin-right:5px'><?= $trend['location'] ?></p>
                <div>
                 <small>Engagements <?php echo $trend['like_count'] + $trend['comment_count'] ?> <a href="../Trends/trends.php?reaction=<?= $trend['type'] ?>"> <span><img src="../images/<?= $trend['type'] ?>.png" alt="<?= $trend['type'] ?>"> </span></a></small>
                </div>
                </div>
            
            </div>
        </a>
 
    
   <?php } ?>
   

    </div>
</div>
        <h3>Filter Posts By their reactions</h3>
        <div class="emojis">
            <div>
            <a href="../Trends/trends.php?reaction=like">   
            <img src="../images/like.png" class='icons' alt="like">
            </a> 
            </div>
            <div>
            <a href="../Trends/trends.php?reaction=shocking">   
            <img src="../images/shocking.png" class='icons' alt="like">
            </a> 
            </div>
            <div>
            <a href="../Trends/trends.php?reaction=love">
            <img src="../images/love.png" class='icons' alt="love">
            </a>    
            </div>
            <div>
                <a href="../Trends/trends.php?reaction=funny">
                <img src="../images/funny.png" class='icons' alt="funny">
                </a>
            </div>
            <div>
                <a href="../Trends/trends.php?reaction=sad" >
                <img src="../images/sad.png" class='icons' alt="sad">
                </a>            
            </div>
            <div>
                <a href="../Trends/trends.php?reaction=fire">
                <img src="../images/fire.png" class='icons' alt="fire">
                </a>
            </div>
        </div>
           
    <div>
        <div>
        <h2>
              Randomized Discovery
        </h2> 
        <?php
    include('../classes_incs/functionsposts.php');
foreach($postsRand as $post){ 
    $post_date = $post['date_created'];
    $formattedDate = format_post_date($post_date);
   
    include_once('../includes/posts.php'); }
    ?> 
        </div>
   

    </div>
    
        </div>

    

        <div class="footer_">
         <a href="../privacy/about.html">About</a> || <a href="../privacy/privacy.html">  Privacy</a>
        </div>
</div>
    </div>
    <div class="leftbar"></div>
    </div>
  <?php include('../includes/footer.php') ?>
</body>
</html>
