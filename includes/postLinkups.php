<div class="posts">
    <div class="con_form">
        <?php if($userLogged){ ?>
    <div class="post_head">
            <div class="select-post-type">
                <p id="C_con">
                  Link up?  
                    <button class="dot" id="CC_span"></button> 
                </p>
                
                <div class="post_linkups" id="post_linkups">
                <form action="../classes_incs/posting.inc.php" method="post">
                    <div class="input-form">
                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <textarea name="post" placeholder="what do you need...." id="textarea_Post" required></textarea>
                        <div>
                            <input type="hidden" name="type_post" value="linkup">
                            <input type="hidden" name="page" value="linkup_page">
                        <input type="text" placeholder='#YourType' name='topic'>
                        <input type="text" placeholder='@YourGeneralLocation' name='location'>                        
                        </div>
                    </div>
                    <div>
                        <button id="post_btn" type='submit' name='submit'>Post</button>
                    </div>
                </form>
                </div>

            </div>   
            <small id='privacy_msg' class='privacy_msg'>Don Worry You got all the <a href="#" style="color:blueviolet"> privacy</a> YOU need...No one will ever know who post this</small> 
        </div>
        <?php } ?>
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
 
foreach($posts_links as $post){ 
 
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
                   
                </div>
            </div>
    <div class="post-box">
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        <div class="location_div">
            <a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                @<?= $post['location'] ?>
            </a> 
            <a href="../Trends/trends.php?trends=<?= $post['topic'] ?>">
                #<?= $post['topic']?>
            </a>
            
        </div>
            <?php if(strlen($post['post_body']) > 500){ ?>
                
            <div class='readmoreBtn'>
            <button> Read More</button>
            </div>
                <?php } ?>
        <p <?php if(strlen($post['post_body']) < 60){echo "style='font-size:48px'";}
                elseif(strlen($post['post_body']) <45){echo "style='font-size:58px'";}
        ?>> <?= $post['post_body'] ?></p>
        </a>
    </div>
    <div class="comment">
    <div>
            <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM likes WHERE  post_id = ?;";

            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($post_id))){
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

                <div class="react">
                
                <img src="../images/<?php echo $resultsall['type'];?>.png" alt="<?= $resultsall['type'] ?>" class='icons'>
                <small>
                    <?php if($results>0){ ?>
                    <?= $results['total']; ?> <?php } ?></small>
                </div>
                
            <?php }else{?>
                <div class="react" id='react'>
                <img src="../images/happiness.png" alt="smiley" class='icons'>
                <small><?= $results['total']; ?></small>
                </div>
            <?php }} ?>
    <div class="react-emojis" id="reacts">
        <div>
            <form action="../classes_incs/liking.inc.php" method='post'>
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='like'>
            <button name='submit_like' ><img src="../images/like.png" class='icons' alt="like"> </button>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post'>
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='love'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like'><img src="../images/love.png" class='icons' alt="love"></button>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post'>
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='funny'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like'><img src="../images/funny.png" class='icons' alt="funny"></button>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post'>
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='sad'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like'><img src="../images/sad.png" class='icons' alt="sad"></button>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post'>
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='fire'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like'><img src="../images/fire.png" class='icons' alt="fire"></button>
            </form>
        </div>
    </div>
    </div>
         <div class="comment_in">
         <button class='btn_reply' id="connectBtn" style="color:aliceblue">Lets Deal</button>
        </div> 
    </div>
    <div class="deal-input" id='connect'>
        <form action="../classes_incs/postcomments.php" method='post'>
            <textarea type="text" name="comment" id="deal" placeholder='Are you/is this still available...'></textarea> 
            <input type="hidden" name="type" value='reply'>
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name='user_id' value='<?= $user_id ?>'>
            <input type="hidden" name='page' value='<?= $page ?>'>
            <button type="submit" name='submit_comment'> Connect</button>
            <button type="button" class='cancel' id='cancelBtn'>Cancel</button>
        </form>
    </div>
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

       
        //For the dealBtn
    const connect = document.querySelector('#connectBtn');
    const connect_div = document.querySelector('#connect');
    const cancelBtn = document.querySelector('#cancelBtn');

    connect.addEventListener("click", function() {
        connect_div.classList.toggle('deal-input-active');
        commentBtn.style.pointerEvents = 'none';
    });
    cancelBtn.addEventListener("click", function() {
        connect_div.classList.remove('deal-input-active');
    });

    //react
    const reacts =document.querySelector('.react');
  const react_emojiss=document.querySelector('#reacts');
  reacts.addEventListener('click', () => {
    react_emojiss.classList.toggle('react-emojis-active');
  })
</script>