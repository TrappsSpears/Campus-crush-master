<div class="leftbar">
    <div class="leftbar-container">
        <div class="emojis">
            <div><img src="../images/like.png" class='icons' alt="like"></div>
            <div><img src="../images/love.png" class='icons' alt="love"></div>
            <div><img src="../images/funny.png" class='icons' alt="funny"></div>
            <div><img src="../images/sad.png" class='icons' alt="sad"></div>
            <div><img src="../images/fire.png" class='icons' alt="fire"></div>
        </div>
           
    <div class="trends">
        <div class="locs">
        <h2>
              Trends
        </h2> 
        </div>
    <?php foreach($trends as $trend){ ?>
        <a href="../Trends/trends.php?trends=<?= $trend['topic'] ?>" >
        <div class='trndItms'>
            <div>
                <small>Location.Loc</small>
            </div>
          <div>
              <p>  #<?= $trend['topic'] ?></p>
            </div> 
            <div>
               <small>Reactions:Like</small> 
            </div>   
        </div>    
                   
        </a>
   <?php } ?>

  
    <h3 class='locs'>Top Places</h3>
    <?php foreach($location as $trend){ ?>
        <a href="#"><div class='trndItms'>
            <p>#<?= $trend['location'] ?></p>
        </div></a>
 
    
   <?php } ?>
   

    </div>
        </div>

    </div>

