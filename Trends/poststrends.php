<div class="posts">
    <div class="con_form">
    </div>
   
<!--...............------------------- Now Posting --------------------------------------------------------------->

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
foreach($post_single as $post){ 
    $post_date = $post['date_created'];
    $formattedDate = format_post_date($post_date);
    $highlightedContent = preg_replace('/(' . preg_quote($loc, '/') . ')/i', '<strong style="color:black;background:white;padding:0 4px">$1</strong>', formatPostContent($post['post_body']));

    ?>
        
    
        <div class="post-container">
        <div class="post-head">
            <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                       <img src="../images/anonymousPic.avif" alt="anonymouse" class="icons" id='profile_pic'>
                       <b> <span id='username'>Hidey</span></b><span id='name'>-Anonymouse</span> 
                <div>
                <span><small id='date'><?= $formattedDate ?></small></span> <span><small id='time'>at <?= $post['time'] ?></small> </span>
                </div>
            <?php }else { ?> 
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="profile" class="icons"  id='profile_pic'>
                        <?php } ?>
                <b> <span id='username'><?= $post['username'] ?></span></b><span id='name'>-<?= $post['name'] ?></span> 
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
        <?php if($post['post_pic'] != ''){?> 
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <?php } ?>
    <h4>Confession:</h4>
    <p >  <?= $highlightedContent ?></p>
    <div>
              
              <span class='span-loc'><a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                     -<?= $post['location'] ?>
                 </a> </span>
                        
                 </div>
        </div>
        

    </a>
    <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        
            

            <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM likes WHERE post_id = ? LIMIT 5;";

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

                <div class="post_insights">
                    <span id = 'bookmark'><img src="../images/saved.png" alt=""><small>0</small></span>
                        <span id='reaction_emoj'>
                    <?php foreach($resultsall as $type){ ?> 
                    <img src="../images/<?php echo $type['type'];?>.png" alt="<?= $type['type'] ?>" class='icons'>  
                       
                        <?php } ?>
                        <?php if($results==0){ ?>
                            <img src="../images/happiness.png" alt="smiley">
                            <?php } ?>
                   <small> <?php if($results>0){ ?>
                    <?= $results['total']; ?> <?php } ?></small></span>
                
                <span class='thot'>Witt your Thoughts...</span>
                     </div>      
            <?php } ?>
            </a>
</div>
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
        <div class="footer_">
         <a href="../privacy/about.html">About</a> || <a href="../privacy/privacy.html">  Privacy</a>
        </div>
</div>
<script>
    // when user wanna post somthing
    const openPostBtn = document.querySelector('#C_con');
    const post_Box = document.querySelector('#post_linkups');
    const privacy_msg = document.querySelector('#privacy_msg');
    const CC_span = document.querySelector('#CC_span');

    openPostBtn.addEventListener('click', function(){
        post_Box.classList.toggle('post_linkups_active');
        privacy_msg.classList.toggle('privacy_msg-active');
        CC_span.classList.toggle('dot-active');
    })
     //react
     const reacts =document.querySelector('.react');
  const react_emojiss=document.querySelector('.react-emojis');
  reacts.addEventListener('click', () => {
    react_emojiss.classList.toggle('react-emojis-active');
  })
</script>