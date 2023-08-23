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
                <?php if($post['anonymous'] == 'yes'){ ?>
                       <img src="../images/incognito.png" alt="anonymouse" class="icons"><span><small>Anonymous</small></span><span><small><?= $formattedDate ?></small> at <small><?= $post['time']  ?></small> </span>
            <?php }else { ?> 
                <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'> <span id='username'><?= $post['username'] ?></span> 
                <div>
                <span><small id='date'><?= $formattedDate ?></small></span> <span><small id='time'>at <?= $post['time'] ?></small> </span>
                </div>
                <?php } ?>   
                
                  
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
    <div class="post-box" >
        <a href="#">
            <div class="post_b">

            
        <?php if($post['post_pic'] != ''){?> 
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <?php } ?>
        <p > <?= $post['post_body'] ?></p>
        </a>
    </div>
    </div>
    <?php 
    if($userLogged) { ?>
    <div class="engage">
            <div>
                
        </span>
         <span class='span'><a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                -<?= $post['location'] ?>
            </a> </span>
                   
            </div>
            </div>
      
    <div class="comment" style='height:fit-content'>
    <div>
            <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM likes WHERE  post_id = ?;";
            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($post_id))){
                $result = null;
            }else{
                $totalLikes = $result->fetch(PDO::FETCH_ASSOC); }
            $sql = "SELECT COUNT(*) as total FROM likes WHERE user_id = ? AND post_id = ?;";

            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($user_id,$post_id))){
                $result = null;
            }else{
                $results = $result->fetch(PDO::FETCH_ASSOC);
                if(!$results['total'] == 0) { 
                    $sql = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?;";
                    $resultlike = $dbh->connect()->prepare($sql);
                    if(!$resultlike->execute(array($user_id,$post_id))){
                        $resultlike = null;
                    }else{
                        $resultsall = $resultlike->fetch(PDO::FETCH_ASSOC); 
                       }
                    ?>

                <div class="react">
                <div class="react">
                <img src="../images/<?php echo $resultsall['type'];?>.png" alt="<?= $resultsall['type'] ?>" class='icons'>
                <small>
                    
                    <?= $totalLikes['total']; ?> </small>
                </div>
                </div>
            <?php }else{?>
                <div class="react" id='react' style="font-size: 23px;">
                🙂
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
                 
        </div>
                <div class="comOpt">
                <div id="emojiContainer">
        <span id="emojiButton">😀</span>
        <div id="emojiMenu">
            <!-- Emoji buttons will be added dynamically using JavaScript -->
        </div>
    </div>
    <div>
            <select name="type" >
                <option value='public'>Public</option>
                 <option value='private'>Private</option>
            </select>
             </div>   
             
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
$selectReply = $dbh->connect()->prepare("SELECT username, reply ,emoji FROM reply JOIN users ON users.id=reply.user_id WHERE com_id = ? ");
if(!$selectReply ->execute(array($com_id))){
    echo 'Failed To Load Posts';
}else{
    $reply = $selectReply->fetchAll(PDO::FETCH_ASSOC);
}
$selectPostIDUSER = $dbh->connect()->prepare("SELECT user_id FROM posts WHERE post_id = ? ");
if(!$selectPostIDUSER ->execute(array($post_id))){
    echo 'Failed To Load Posts';
}else{
    $userPost_id = $selectPostIDUSER->fetch(PDO::FETCH_ASSOC);
    if($userPost_id!==false){
        $posterId=$userPost_id;
    }else{
        $posterId= null
        ;
    }
}

            ?> 
            <?php if($comment['type']=='private'){ if($comment['user_id'] == $user_id || $posterId['user_id']==$user_id){ ?>
            <div class="comments_posts" style="border-left: 2px solid green;">
             
                <div class="comment-post"> <p id='type_com'> <small style='color:green'><?= $comment['type'] ?></small></p>
                   <p> <?= $comment['comment'] ?></p>
                    <div>
                        <small>@ <?php if($user_id == $comment['user_id']){ ?> You <?php }else{ echo $comment['username'];} ?>.<span><?= $comment['school'] ?></span> </small>
                    </div>
                </div>
                   
               
                
                <div class="reply_com">
              
               
                    
                    <form action="../classes_incs/postReply.inc.php" method='Post'>
                       
                        <div class="replyform">
                        <input type="hidden" name='emoji' value=''>
                            <input type="hidden" name="user_id"  value="<?= $user_id?>">
                            <input type="hidden" name='com_id' value='<?= $comment['id']?>'>
                                <textarea name="reply" id="reply_input" placeholder="reply"></textarea>
                                <button type='submit' name='submit_reply'><img src="../images/reply.png" alt="reply" class='icons'></button>
                            </div>
                    </form>
                            
                        
                </div>
         
            </div>
            <?php 
                foreach($reply as $reply){ 
                    if($reply['reply'] != ''){?>

            <div class="replys">
                       <p><?=$reply['reply'] ?></p>  
                       <div>
                        <small>@<?= $reply['username'] ?></small>
                       </div>                       
            </div>
                        <?php }elseif($reply['emoji']!=''){ ?> 
                            <div class="emoji_cont">
                                
                               <img src="../images/<?= $reply['emoji'] ?>.png" alt="<?= $reply['emoji'] ?>" class='icons'> <small>@<?= $reply['username'] ?></small>
                            </div>

                            <?php } ?>
                      
            <?php } ?>
            <?php }else{ ?> 
                <div class="comments_posts" id="pvt_com">
                <div class="comment-post">
                this comment is private
             </div></div>
            <?php }}else{ ?> 
                <div class="comments_posts">
             
             <div class="comment-post"> <p id='type_com'> <small style='color:#880281'><?= $comment['type'] ?></small></p>
                <p> <?= $comment['comment'] ?></p>
                 <div>
                     <small>@
                     <?php if($user_id == $comment['user_id']){ ?> You <?php }else{ echo $comment['username'];} ?> 
                     .<span><?= $comment['school'] ?></span> </small>
                 </div>
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
    head_menu.style.display = head_menu.style.display=== 'block' ? 'none' : 'block';
  })
  const textarea_Post = document.querySelector('#reply-textarea');
  const emojis = [
    '😀', '😃', '😄', '😁', '😆', '😅', '😂', '🤣', '😊', '😇',
    '🙂', '🙃', '😉', '😍', '🥰', '😘', '😗', '😚', '😙', '😋',
    '😛', '😜', '🤪', '🤨', '🧐', '🤓', '😎', '🤩', '🥳', '😏',
    '😒', '😞', '😔', '😟', '😕', '🙁', '☹️', '😣', '😖', '😫',
    '😩', '🥺', '😢', '😭', '😤', '😠', '😡', '🤬', '🤯', '😳',
    '😱', '😨', '😰', '😥', '😓', '🤗', '🤔', '🤭', '🤫', '🤥',
    '😶', '😐', '😑', '😬', '🙄', '😯', '😦', '😧', '😮', '😲',
    '🥱', '😴', '🤤', '😪', '😵', '🥴', '🤢', '🤮', '🤑', '😎',
    '😍', '🥰', '😘', '😗', '😚', '😙', '😋', '😛', '😜', '🤪',
    '🤨', '🧐', '🤓', '😎', '🤩','✋', '🤚', '🖐️', '✌️', '🤞', '🤟', '🤘', '🤙', '👈', '👉',
    '👆', '👇', '☝️', '👍', '👎', '✊', '👊', '🤛', '🤜', '👏',
    '🙌', '👐', '🤲', '🤝', '🙏', '✍️', '💅', '🤳', '💪', '🦵',
    '🦶', '👂', '🦻', '👃', '🥳', '😏', '😒', '😞', '😔',
    '😟', '😕', '🙁', '☹️', '😣', '😖', '😫', '😩', '🥺', '😢',
    '😭', '😤', '😠', '😡', '🤬', '🤯', '😳', '😱', '😨', '😰',
    '😥', '😓', '🤗', '🤔', '🤭', '🤫', '🤥', '😶', '😐', '😑',
    '😬', '🙄', '😯', '😦', '😧', '😮', '😲', '🥱', '😴', '🤤',
    '😪', '😵', '🥴', '🤢', '🤮', '🤑', '😀', '😃', '😄', '😁',
    '😆', '😅', '😂', '🤣', '😊', '😇', '🙂', '🙃', '😉', '😍',
    '🥰', '😘', '😗', '😚', '😙', '😋', '😛', '😜', '🤪', '🤨',
    '🧐', '🤓', '😎', '🤩', '🥳', '😏', '😒', '😞', '😔', '😟',
    '😕', '🙁', '☹️', '😣', '😖', '😫', '😩', '🥺', '😢', '😭',
    '😤', '😠', '😡', '🤬', '🤯', '😳', '😱', '😨', '😰', '😥',
    '😓', '🤗', '🤔', '🤭', '🤫', '🤥', '😶', '😐', '😑', '😬',
    '🙄', '😯', '😦', '😧', '😮', '😲', '🥱', '😴', '🤤', '😪',
    '😵', '🥴', '🤢', '🤮', '🤑', '😲', '🤑', '😲', '🤑', '😲',
    '😶', '😐', '😶', '😐', '😶', '😐', '🤐', '😴', '🤤', '😪',
    '😵', '🥴', '🤢', '🤮', '🤑', '😲', '🤑', '😲', '🤑', '😲',
    // ... More emojis can be added here
];



const emojiButton = document.getElementById('emojiButton');
const emojiMenu = document.getElementById('emojiMenu');


emojis.forEach(emoji => {
    const emojiOption = document.createElement('small');
    emojiOption.textContent = emoji;
    emojiOption.addEventListener('click', () => {
        textarea_Post.value += emoji;
    });
    emojiMenu.appendChild(emojiOption);
});

emojiButton.addEventListener('click', () => {
    emojiMenu.style.display = emojiMenu.style.display === 'grid' ? 'none' : 'grid';
});

// Close emoji menu when user clicks outside of it
document.addEventListener('click', (event) => {
    if (!emojiButton.contains(event.target) && !emojiMenu.contains(event.target)) {
        emojiMenu.style.display = 'none';
    }
});
</script>