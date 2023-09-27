<?php 
include('../Search/search.incs.php');

?>

   
 
    <div class="leftbar-container">
       
    
    <div class="trends">
        <div class="locs">
        <h2>
              Trends
        </h2> 
        </div>
        <?php foreach($trendingThemes as $trend){ ?>
            <a href="../location/location.php?theme=<?= $trend['theme'] ?>&post_count=<?= $trend['post_count'] ?>&topLocation=<?= $trend['top_location'] ?>">
            <div class='trndItms'>
                <div>
        <small style='margin-left:-5px'>Posts <?= $trend['post_count'] ?> - <?= $trend['top_location'] ?></small>
                </div>
                <div>
                <p> #<?= $trend['theme'] ?></p>
                </div>
                <div>
            <small style='margin-left:-5px'>Engagements <?php echo $trend['like_count'] + $trend['comment_count'] ?> <a href="../Trends/trends.php?reaction=<?= $trend['type'] ?>"> <span><img src="../images/<?= $trend['type'] ?>.png" alt="<?= $trend['type'] ?>"> </span></a></small>
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
    
    <?php foreach($location as $trend){ ?>
        <a href="../location/location.php?place=<?= $trend['location'] ?>">
            <div class='trndItms'>
                <div>
                    <small>Posts <?= $trend['post_count'] ?> - <?= $trend['theme'] ?></small>
                </div>
                <div>
                <p> <img src="../images/placeholder.png" alt="-" class='icons' style='width:15px;position:relative;top:3px;margin-right:5px'><?= $trend['location'] ?></p>
                </div>
                <div>
                 <small>Engagements <?php echo $trend['like_count'] + $trend['comment_count'] ?> <a href="../Trends/trends.php?reaction=<?= $trend['type'] ?>"> <span><img src="../images/<?= $trend['type'] ?>.png" alt="<?= $trend['type'] ?>"> </span></a></small>
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
    <div class="footer-about" id='info_App'>
        Share Stories - Confess - Share Ideas - <a href="../privacy/report.php"> Ask Ques</a> - Engage - Whats On Your Mind - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a> - <a href="../privacy/termsOfService.html"> Terms Of Use</a> -  <a href="../privacy/cookies.html"> Cookie Policy</a> 2023 WitterVerse Corp.
        </div>
        </div>
        
    
<?php  ?>
