<?php 
    $page = 'search';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" id="nav" >
    
    <form action="../Trends/trends.php" method="get" style='width:100%'>
    <div class="search_place">
        <input type="text" placeholder="Explore..." id='search' name="word"><button type='submit' >  <img src="../images/search.png" alt="search" class='icons'></button>
    </div></form>
</div>
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
    </div>
    <div class="leftbar">
    <div class="leftbar-container">
        <?php foreach($postsTrends as $post){ ?> 
            <div class="trends">
                <div class="trendItms">
                <div class="post-head">
            <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                    <a href="../posts/posts.php?post=Hidey">
                  <div class='post-heading'>
                       <img src="../images/noProf.jpeg" alt="anonymouse"   id='profile_pic'>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'>Hidey</span></b><span id='name'> Anonymouse<small> 
                        </div>
       
                    </div>   
                
                </div>       
                    </a>
             
            <?php }else { ?> 
                <a href="../Trends/trends.php?word=<?= $post['username'] ?>">
                <div class='post-heading'>
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="profile" class="icons"  id='profile_pic'>
                        <?php } ?>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> <span id='name'>  <?= $post['name'] ?><small> 
                        </div>
                    </div>   
                </div>
                </a>
                <?php } ?>   
                
                  
        </div>
            <div class="head-dots" id = 'head-dots<?php echo $idUnique;?>'>
                <div>
                  <img src="../images/menu.png" alt="..." class="icons">
                </div>
                
            </div>
        </div>      <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
        <div class="post_b">    
    <p id='post-bAllP' style= 'padding:25px;max-height:200px'>   <?= formatPostContent($post['post_body']) ?></p>
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <div style="padding: 12px;color:gray;font-size:14px">
 
       
              <span class='span-loc'><a href="../Trends/trends.php?word=<?= $post['location'] ?>">     
                     <img src="../images/placeholder.png" alt="" class='icons' style='width:20px;position:relative;top:5px'> <?= $post['location'] ?>
                 </a> </span>
             <a href="../Trends/trends.php?word=<?= $post['theme'] ?>">   <span class='theme_span'>#<?= $post['theme'] ?></span></a>
                        <span><small> <i>Reactions <?= $post['like_count'] ?></i>  <i>Comments <?= $post['comment_count'] ?></i></small>  </span>
                 </div>
        </div> </a>
                </div>
            </div>
        
        <?php } ?>
    </div>
    </div>
    </div>
  <?php include('../includes/footer.php') ?>
</body>
</html>
