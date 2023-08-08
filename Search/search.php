<?php 
$page = 'search';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <div class="main-content">
    <div class="nav">

<div>
      <h2>Search</h2>
 </div>

</div>
<div class="posts" id="search-conts">

    <div class="search-conts" id="search-conts">
        <div class="emojis">
            <div>
            <a href="../Trends/trends.php?reaction=like">   
            <img src="../images/like.png" class='icons' alt="like">
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
        <a href="../Trends/trends.php?trends=<?= $trend['location'] ?>">
            <div class='trndItms'>
                <div>
                    <small>Confessions.321K</small>
                </div>
                <div>
                <p>- <?= $trend['location'] ?></p>
                </div>
            
            </div>
        </a>
 
    
   <?php } ?>
   

    </div>
        </div>

    


</div>
    </div>


 
    </div>
  <<?php include('../includes/footer.php') ?>
</body>
</html>