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
            <img src="../images/incognito.png" alt="anonymouse" class="icons"> <span><?= $formattedDate ?></span>   
            </div>
            <div class="head-dots">
                <div>
                  <small>.</small><small>.</small><small>.</small>   
                </div>
               <div class="head-menu">
               <form action="../classes_incs/bookmarks.inc.php" method='post'>
                <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
               <button name="bookmark"> Bookmark Post</button>
               </form>
                  
                <p> Copy Link</p>
               </div>
            </div>
        </div>
    <div class="post-box">
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
       
        <p class='post_b'> <?= $post['post_body'] ?></p>
        </a>
    </div>

    <?php if($userLogged){ ?>
        <div class="engage">
            <div>
                <span class='span'> <a href="../Trends/trends.php?trends=<?= $post['topic'] ?>">
                #<?= $post['topic']?>
                </a>
        </span>
         <span class='span'><a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                -<?= $post['location'] ?>
            </a> </span>
                   

            </div>
             
        </div>
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        <div class='engage_btn'>
            <span><img src="../images/group.png" alt="Engage"><small>Engage</small></span>   
            </div>
            <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM likes WHERE user_id = ? AND post_id = ?;";

            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($user_id,$post_id))){
                $result = null;
            }else{
                $results = $result->fetch(PDO::FETCH_ASSOC);
                if(!$results['total'] == 0) { 
                    $sql = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?;";
                    $result = $dbh->connect()->prepare($sql);
                    if(!$result->execute(array($user_id,$post_id))){
                        $result = null;
                    }else{
                        $resultsall = $result->fetch(PDO::FETCH_ASSOC);}
                    ?>

                <div class="post_insights">
                    <span><img src="../images/<?php echo $resultsall['type'];?>.png" alt="<?= $resultsall['type'] ?>" class='icons'>  <small>
                    <?php if($results>0){ ?>
                    <?= $results['total']; ?> <?php } ?> Reactions</small>
                </span>
                <span><img src="../images/social-media.png" alt="engagement"><small>Engagements</small></span>
                
            <?php }else{?>
                <div class="post_insights">
                    <span><img src="../images/happiness.png" alt="react">  <small>
                    <?= $results['total']; ?> Reactions </small>
                    </span>
                    <span><img src="../images/social-media.png" alt="engagement"><small>Engagements</small></span>
                    
            <?php }} ?>
            </a>
        </div>
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