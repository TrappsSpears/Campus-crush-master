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
    $formattedDate = format_post_date($post_date);?>
        
    
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
                  
                <p> Share Post</p>
               </div>
            </div>
        </div>
    <div class="post-box" style='height:auto'>
        <a href="#">
        <p <?php if(strlen($post['post_body']) < 60){echo "style='font-size:48px'";}
                elseif(strlen($post['post_body']) <45){echo "style='font-size:58px'";}

            ?> style='height:auto'> <?= $post['post_body'] ?></p>
        </a>
    </div>
    
    <?php 
    if($userLogged) { ?>
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
        <div class="engage_btn">
            <span></span>
        </div>
    <div class="comment">
    <div>
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

                <div class="react">
                <div class="react">
                <img src="../images/<?php echo $resultsall['type'];?>.png" alt="<?= $resultsall['type'] ?>" class='icons'>
                <small>
                    <?php if($results>0){ ?>
                    <?= $results['total']; ?> <?php } ?></small>
                </div>
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
            <input type="hidden" name="type" value='shocking'>
            <button name='submit_like' ><img src="../images/shocking.png" class='icons' alt="like"> </button>
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
    
        <form action="../classes_incs/postcomments.php" method="post" class='form-comment'>
         <div class="comment_in" >
                <textarea placeholder="What are your Thoughts" class="textarea_reply" id="reply-textarea" name="comment" required></textarea> 
                     <input type="hidden" name = 'post_id' value="<?= $post['post_id'] ?>">
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                     <input type="hidden" name='page' value='<?= $page ?>'>
                     <input type="hidden" name="type" value='comm'>
        </div>
        <div>
            <button name='submit_comment'>Post</button>
        </div> 
        
        </form>
    </div>
    <?php }else{ ?>
            <div class="form-comment">
                <h4 style='text-align:center'>Sign in to comment and Like</h4>
            </div>
        <?php } ?>
        
        </div>
        <?php } ?> 

        <div class="reply-container">
        <?php 
         $sql = "SELECT COUNT(*) as total FROM comments WHERE  post_id = ?;";

         $result = $dbh->connect()->prepare($sql);
         if(!$result->execute(array($post_id))){
             $result = null;}else{
                $total = $result->fetch(PDO::FETCH_ASSOC);
             }
    ?>
            <h3>Comments <small> <?= $total['total'] ?></small></h3>

        <?php
        if($userLogged){
        foreach($post_comment as $comment){ 
            $com_id =$comment['id'];
            $dbh = New Dbh();

##-------------------Replys for comments--------------------------------------##
$selectReply = $dbh->connect()->prepare("SELECT username, reply FROM reply JOIN users ON users.id=reply.user_id WHERE com_id = ? ");
if(!$selectReply ->execute(array($com_id))){
    echo 'Failed To Load Posts';
}else{
    $reply = $selectReply->fetchAll(PDO::FETCH_ASSOC);
}
            ?>
            <div class="comments_posts">
                <div class="comment-post">
                    <?= $comment['comment'] ?>
                    <div>
                        <small>@<?= $comment['username'] ?> <span>
                         
                            </span></small>
                    </div>
                </div>
                
                <div class="reply_com">
                    
                    <form action="../classes_incs/postReply.inc.php" method='Post'>
                        <div class="reply_react">
                            <div>
                                
                                <input type="checkbox" name="reply" id="emoji_reply">
                               <label for="emoji_reply"> <img src="../images/happiness.png" alt="react" class='icons'></label>
                           
                            <div class="emojis" id='reply_emoji'>
                                    <button type='submit' name='submit_reply'><img src="../images/like.png" alt="like"></button>
                                    <button type='submit' name='submit_reply'><img src="../images/shocking.png" alt="like"></button>
                                    <button type='submit' name='submit_reply'> <img src="../images/love.png" alt="like"></button>
                                    <button type='submit' name='submit_reply'><img src="../images/funny.png" alt="like"></button>
                                    <button type='submit' name='submit_reply'><img src="../images/sad.png" alt="like"></button>
                                    <button type='submit' name='submit_reply'><img src="../images/fire.png" alt="like"></button>
                            </div>
                         </div>
                        </div>
                        <div class="replyform">
                            <input type="hidden" name="user_id"  value="<?= $user_id?>">
                            <input type="hidden" name='com_id' value='<?= $comment['id']?>'>
                                <textarea name="reply" id="reply_input" placeholder="reply"></textarea>
                                <button type='submit' name='submit_reply'><img src="../images/reply.png" alt="reply" class='icons'></button>
                            </div>
                    </form>
                            
                        
                </div>
         
            </div>
        
            <?php 
                foreach($reply as $reply){ ?>
            <div class="replys">
                       <p><?=$reply['reply'] ?></p>  
                       <div>
                        <small>@<?= $reply['username'] ?></small>
                       </div>                       
            </div>
                      
            <?php } ?>
            <div class="divider">
                
               </div>
        <?php } }else{?>
            <small>Please log in</small>
            <?php } ?>
        </div>

</div>
<script>
    // when user wanna post somthing

    const commentDiv = document.querySelector('.post-container');
    const textarea_reply = document.querySelector('#reply-textarea');
    textarea_reply.addEventListener('input', function() {
  textarea_reply.style.height = '35px';
  textarea_reply.style.height = textarea_reply.scrollHeight + 'px';
  commentDiv.style.height = 'auto';
});

const react =document.querySelector('.react');
  const react_emojis=document.querySelector('.react-emojis');
  react.addEventListener('click', () => {
    react_emojis.classList.toggle('react-emojis-active');
  })

  const head_dots =document.querySelector('.head-dots');
  const head_menu =document.querySelector('.head-menu');
  head_dots.addEventListener('click',() =>{
    head_menu.classList.toggle('head-menu-active');
  })


</script>