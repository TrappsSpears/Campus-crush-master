<?php include('search.incs.php'); ?>
<div class="posts" >
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
   
   <a href="../Groups/groups.php">
            <div class='trndItms'>
                
                <div>
                <p style='color:aqua'>Show More</p>
                </div>
                
            </div>
        </a>
    </div>
    <div class="trends">
        <div class="locs">
            <h2>Top Places</h2>
        </div>
       
    <?php foreach($location as $trend){ 
        ?><a href="../location/location.php?place=<?=$trend['location'] ?>">
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
   
   <a href="../Groups/groupsLocs.php">
            <div class='trndItms'>
                
                <div>
                <p style='color:aqua'>Show More</p>
                </div>
                
            </div>
        </a>
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
    $rand = rand(0,1000);
    include('../includes/posts.php'); }
    ?> 
        </div>
   

    </div>
    
        </div>

    

        <div class="footer_">
         <a href="../privacy/about.html">About</a> || <a href="../privacy/privacy.html">  Privacy</a>
        </div>
</div>