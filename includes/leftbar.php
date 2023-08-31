<div class="leftbar">

    <div class="leftbar-container">
        <form action="../Trends/trends.php" method="get">
    <div class="search_place" id='search_place'>
        <input type="text" style="width:60%" placeholder="Search..." id='search' name="word"><button type='submit'> Search</button>
    </div></form>
        <div class="emojis">
            <div>
            <a href="../Trends/trends.php?reaction=like">   
            <img src="../images/like.png" class='icons' alt="like">
            </a> 
            </div>
            <div>
            <a href="../Trends/trends.php?reaction=shoking">   
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
                    <small>Posts <?= $trend['post_count'] ?> - <?= $trend['top_location'] ?></small>
                </div>
                <div>
                <p>#<?= $trend['theme'] ?></p>
                </div>
                <div>
                 <small>Engagements <?php echo $trend['like_count'] + $trend['comment_count'] ?> <a href="../Trends/trends.php?reaction=<?= $trend['type'] ?>"> <span><img src="../images/<?= $trend['type'] ?>.png" alt="<?= $trend['type'] ?>"> </span></a></small>
                </div>
            </div>
        </a>
 
    
   <?php } ?>
   
    
    </div>
    <div class="trends">
        <div class="locs">
            <h2>Top Places</h2>
        </div>
    
    <?php foreach($location as $trend){ ?>
        <a href="../Trends/trends.php?word=<?= $trend['location'] ?>">
            <div class='trndItms'>
                <div>
                    <small>Posts <?= $trend['post_count'] ?> - <?= $trend['theme'] ?></small>
                </div>
                <div>
                <p>- <?= $trend['location'] ?></p>
                </div>
                <div>
                 <small>Engagements <?php echo $trend['like_count'] + $trend['comment_count'] ?> <a href="../Trends/trends.php?reaction=<?= $trend['type'] ?>"> <span><img src="../images/<?= $trend['type'] ?>.png" alt="<?= $trend['type'] ?>"> </span></a></small>
                </div>
            </div>
        </a>
 
    
   <?php } ?>
   

    </div>
        </div>

    </div>

