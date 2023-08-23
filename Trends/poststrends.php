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
foreach($post_single as $post){ 
    $post_date = $post['date_created'];
    $formattedDate = format_post_date($post_date);
    ?>
        
    
        <div class="post-container">
        <div class="post-head">
        <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                       <img src="../images/incognito.png" alt="anonymouse" class="icons"><span><small>Anonymous</small></span><span><small><?= $formattedDate ?></small> at <small><?= $post['time']  ?></small> </span>
            <?php }else { ?> 
                <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'> <span id='username'><?= $post['username'] ?></span> 
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
               <div class="head-menu" id='head-menu<?php echo $idUnique;?>'>
               <form action="../classes_incs/bookmarks.inc.php" method='post'>
                <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
               <button name="bookmark"> Bookmark Post</button>
               </form>
                  
                <p> Share Post</p>
               </div>
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
    <p >  <?= $post['post_body'] ?></p>
    <div>
              
              <span class='span-loc'><a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                     -<?= $post['location'] ?>
                 </a> </span>
                        
                 </div>
        </div>
        

    </a>
</div>
    <?php if($userLogged){ ?>
 
        <div class="engage_btn">
                <span>..Read More</span>
            </div>
            <div class="engage">
           
            </div>
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
                
                <span class='thot'>Thoughts!?</span>
                     </div>      
            <?php } ?>
            </a>
    <?php } else{?>
        Sign In to ingage
       <?php } ?>

    
        </div>
        <?php } ?> 

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