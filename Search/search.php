<?php 
    $page = 'search';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav">
    <div class="conFess_icon" id='small_screen_icon'>
        <h2><span> Confess</span>Connect</h2>
        <p>Speaking Unspoken Stories</p>
    </div>
<div>
      <h2>Search</h2>
 </div>

</div>
<div class="posts" id="search-conts">
<form action="../Trends/trends.php" method="get">
    <div class="search_place">
        <input type="text" placeholder="Peak in..." id='search' name="word"><button type='submit'> Search</button>
    </div></form>
    <div class="search-conts" id="search-conts">
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
        <div class="locs">
        <h2>
              Randomized Discovery
        </h2> 
        <?php 
            function format_post_date($post_date) {
                // Convert the input date to a timestamp
                $timestamp = strtotime($post_date);
                
                // Get today's date at midnight
                $today = strtotime('today midnight');
                
                // Get yesterday's date at midnight
                $yesterday = strtotime('yesterday midnight');
            
                // Check if the post date is today
                if ($timestamp >= $today) {
                    return 'Today';
                }
                // Check if the post date is yesterday
                elseif ($timestamp >= $yesterday) {
                    return 'Yesterday';
                }
                // For other days, format the date as "Thursday 23 May 2023" using the date() function
                else {
                    return date('l j F Y', $timestamp);
                }
            }
            function formatPostContent($content) {
                // Search for URLs in the content
                $pattern = '/https?:\/\/\S+/i'; // Regular expression pattern to match URLs
                $formattedContent = preg_replace_callback($pattern, function($match) {
                    // Use the matched URL as the link text and href
                    return '<a style="color:#1e90ff" href="' . $match[0] . '" target="_blank">' . $match[0] . '</a>'; 
                }, $content);
            
                return $formattedContent;
            }
        foreach($postsRand as $post){ 
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'];
        $formattedDate = format_post_date($post_date);
        ?>
      
    
    <div class="post-container">
        <div class="post-head">
            <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                       <img src="../images/incognito.png" alt="anonymouse" class="icons"><span style='color:gainsboro;'><b><small>Anonymous</small></b></span><span><small><?= $formattedDate ?></small> at <small><?= $post['time']  ?></small> </span>
            <?php }else { ?> 
                <?php if($user['profile_pic']!='Array'){ ?> 
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    <?php } else{ ?> 
                     <img src="../images/noProf.jpeg" alt="profile" class="icons"  id='profile_pic'>>

                        <?php } ?>
                <b> <span id='username'><?= $post['username'] ?></span></b> 
                <div>
                <span><small id='date'><?= $formattedDate ?></small></span> <span><small id='time'>at <?= $post['time'] ?></small> </span>
                </div>
                <?php } ?>   
                
                  
        </div>
            <div class="head-dots" id = 'head-dots<?php echo $idUnique;?>'>
                <div>
                  <img src="../images/menu.png" alt="..." class="icons">
                </div>
                <?php if($userLogged){ ?> 
               
              
               <?php } ?>
            </div>
        </div>
    <div class="post-box">
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        <div class="post_b">    
    <p id='post-bAllP'>   <?= formatPostContent($post['post_body']) ?></p>
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <div>
              
              <span class='span-loc'><a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                     -<?= $post['location'] ?>
                 </a> </span>
                        
                 </div>
        </div>
        

    </a>
</div>
<?php if($userLogged){ ?>
        
        
            <div class="engage">
           
            </div>
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        
            

            <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM likes WHERE post_id = ?;";

            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array( $post_id))){
                $result = null;
            }else{
                $results = $result->fetch(PDO::FETCH_ASSOC);
                
                    $sql = "SELECT type FROM likes WHERE post_id = ?;";
                    $result = $dbh->connect()->prepare($sql);
                    if(!$result->execute(array($post_id))){
                        $result = null;
                    }else{
                        $resultsall = $result->fetchAll(PDO::FETCH_ASSOC);}
                    ?>
                    <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM comments WHERE  post_id = ?;";

            $resultC = $dbh->connect()->prepare($sql);
            if(!$resultC->execute(array($post_id))){
                $resultC = null;
            }else{
                $count= $resultC->fetch(PDO::FETCH_ASSOC);}
               
                    ?>
                <div class="post_insights">
                    <span id='comment'><img src="../images/bubble-chat.png" alt=""><small><?= $count['total']?></small></span>
                    <span id = 'bookmark'><img src="../images/saved.png" alt=""><small>0</small></span>
                        <span id='reaction_emoj'>
                    <?php foreach($resultsall as $type){ ?> 
                    <img src="../images/<?php echo $type['type'];?>.png" alt="<?= $type['type'] ?>" class='icons'>  
                       
                        <?php } ?>
                        
                   <small> <?php if($results>0){ ?>
                    <?= $results['total']; ?> <?php } ?></small></span>
                
                <span class='thot'>  Witt your thought...</span>
                     </div>      
            <?php } ?>
            </a>
        
    <?php } else{?>
        Sign In to ingage
       <?php } ?>
       <div class='head_post_el'>
        
                <?php   
                $sql ="SELECT p.post_id, l.type, COUNT(*) AS like_count
                FROM posts p
                JOIN likes l ON p.post_id = l.post_id
                WHERE p.post_id = ? -- Replace 'specific_type' with the actual type you're interested in
                GROUP BY p.post_id, l.type
                ORDER BY like_count DESC
                LIMIT 1";
                $typeResult = $dbh->connect()->prepare($sql);
                
                if(!$typeResult->execute(array($post['post_id']))){
                    $typeResult = null;
                }else{
                    $typeLike = $typeResult->fetch(PDO::FETCH_ASSOC);
                    if($typeLike!==false){
                        $typeLikee=$typeLike;
                    }else{
                        $typeLikee= null;
                    }
                }
                ?><?php if($typeLikee !== null && $typeLikee['post_id']===$post['post_id']){ ?> 
               <a href="../Trends/trends.php?reaction=<?= $typeLikee['type']?>"> <span><img src="../images/<?= $typeLikee['type']?>.png" alt="<?= $typeLikee['type']?>"> </span></a><?php } ?>
        </div>
    </div>


    <?php } ?> 
        </div>
   

    </div>
    <div class="trends">
        <div class="locs">
            <h2>Top Places</h2>
        </div>
       
    <?php foreach($location as $trend){ 
        $loc=$trend['location'];
        $sql = "SELECT COUNT(*) as total FROM posts WHERE  location = ?;";

            $resultC = $dbh->connect()->prepare($sql);
            if(!$resultC->execute(array($loc))){
                $resultC = null;
            }else{
                $count= $resultC->fetch(PDO::FETCH_ASSOC);}
        ?>
        <a href="../Trends/trends.php?location=<?= $trend['location'] ?>">
            <div class='trndItms'>
                <div>
                    <small>Confessions.<?= $count['total'] ?></small>
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
    <div class="leftbar"></div>
    </div>
  <?php include('../includes/footer.php') ?>
</body>
</html>
