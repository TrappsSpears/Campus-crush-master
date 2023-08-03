<div class="posts">
    <div class="con_form">
    </div>
   
<!--...............------------------- Now Posting --------------------------------------------------------------->

<?php foreach($post_single as $post){ ?>
        
    
        <div class="post-container-comment">
            <div class="post-head">
            <div class="heading-post">
             <small> <img src="../images/incognito.png" alt="anonymouse" class="icons">  <span><?= $post['date_created'] ?></span> </small>   
            </div>
                <div class="head-dots">
                    <div>
                      <small>.</small><small>.</small><small>.</small>   
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
                <textarea placeholder="Comment" class="textarea_reply" id="reply-textarea" name="comment"></textarea> 
                     <input type="hidden" name = 'post_id' value="<?= $post['post_id'] ?>">
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                     <input type="hidden" name='page' value='<?= $page ?>'>
                     <input type="hidden" name="type" value='comm'>
        </div> 
        <button name='submit_comment'>Post</button>
        </form>
    </div>
    <?php }else{ ?>
            <div class="form-comment">
                <h4 style='text-align:center'>Sign in to comment and Like</h4>
            </div>
        <?php } ?>
        <div class="loc-trend-spost">
        <a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                @<?= $post['location'] ?>
            </a> 
            <a href="../Trends/trends.php?trends=<?= $post['topic'] ?>">
                #<?= $post['topic']?>
            </a>
          </div>
        </div>
        <?php } ?> 

        <div class="reply-container">
            <h3>Comments</h3>

        <?php
        if($userLogged){
        foreach($post_comment as $comment){ ?>
            <div class="comments_posts">
                <div class="comment-post">
                    <?= $comment['comment'] ?>
                    <div>
                        <small>@<?= $comment['username'] ?> <span>
                            <img src="../images/<?php echo $resultsall['type'];?>.png" alt="<?= $resultsall['type'] ?>" class='icons'></span></small>
                    </div>
                    
                </div>
                <div class="comm_likNreply"> 
                    <div class="react-emojis">
                        <div>like</div><div>love</div><div>funny</div><div>sad</div><div>fire</div>
                    </div>
                </div>
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
</script>