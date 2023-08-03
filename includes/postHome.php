<div class="posts">
    <div class="con_form">
      <div class='conform_desgn_head'>
        <div>
            <button></button>
        </div>
        <div>
            <span>P</span>
        </div>
        <div>
            <button></button>
        </div>
      </div>
         
      <?Php if($userLogged){ ?>
      <button  id="post_choice">What's on Your Mind @<?= $username ?></button>
        <div class="post-choice-bg">
        <div class="post-choice">
            <h2>What do you wanna Post about</h2>
            <span class="close-btn"  id="closebtn_postchoice">X</span>
            <div class="select-post-type" >
               <p id="hot_con"> I got a HOT Conf <button class="dot" id="hotC_span"></button></p>
                <div id="post_formHC" class="post_formHC">
                    <form action="../classes_incs/posting.inc.php" method="post">
                    <div class="input-form">
                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <textarea name="post" placeholder="wtf did u do this time kkkkkkkk...."  id="textarea_Post"></textarea>
                        <div>
                        <input type="hidden" name="type_post" value="thrill">
                        <input type="hidden" name="page" value="home_page">
                        <input type="text" placeholder='#YourHashTag' name='topic'>
                        <input type="text" placeholder='@YourGeneralLocation' name='location'>                        
                        </div>
                        
                    </div>
                    <div>
                        <button type='submit' name='submit'>Post</button>
                    </div>
                    </form>
                    
                </div>
                
            </div>
            <div class="select-post-type">
                <p id="C_con">
                   I want H & C <button class="dot" id="CC_span"></button> 
                </p>
                
                <div class="post_formHC" id="post_formCC">
                <form action="../classes_incs/posting.inc.php" method="post">
                    <div class="input-form">
                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <textarea name="post" placeholder="what do you need...." id="textarea_Post" required></textarea>
                        <div>
                            <input type="hidden" name="type_post" value="linkup">
                            <input type="hidden" name="page" value="home_page">
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
            <small>Don Worry You got all the <a href="#" style="color:blueviolet"> privacy</a> YOU need...No one will ever know who post this</small>
        </div>
        </div>
        <script>
            //post-choice for choosing type of post
const hot_conDiv = document.querySelector('#hot_con'); //div for selecting hot_C
const hotC_span = document.querySelector('#hotC_span');//hotC span
const post_formHC = document.querySelector('#post_formHC');//HotC form
const C_con= document.querySelector('#C_con')//div for selecting C_con
const CC_span = document.querySelector('#CC_span');//hotC span
const post_formCC = document.querySelector('#post_formCC');//HotC form
const textarea_Post = document.querySelector("#textarea_Post");
const post_btn = document.querySelector('#post_btn');

hot_conDiv.addEventListener('click',function(){
    post_formHC.classList.toggle('post_formHC-active');
    post_formCC.classList.remove('post_formHC-active');
    hotC_span.classList.toggle('dot-active');
    CC_span.classList.remove('dot-active');
})

C_con.addEventListener('click',function(){
    post_formCC.classList.toggle('post_formHC-active');
    post_formHC.classList.remove('post_formHC-active');
    CC_span.classList.toggle('dot-active');
    hotC_span.classList.remove('dot-active');
})

textarea_Post.addEventListener('input', function() {
    textarea_Post.style.height = 'auto';
    textarea_Post.style.height = textarea_Post.scrollHeight + 'px';
  
  });
  
        </script>
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
        
    foreach($posts as $post){ 
        
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
        <div class="location_div">
            <a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                @<?= $post['location'] ?>
            </a> 
            <a href="../Trends/trends.php?trends=<?= $post['topic'] ?>">
                #<?= $post['topic']?>
            </a>
            
        </div>
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
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
<?php if($userLogged){ ?>
<?php if($post['post_type'] =='thrill'){ ?> 
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
                <small><?= $results['total']; ?></small>
                </div>
                </div>
            <?php }else{?>
                <div class="react">
                <img src="../images/happiness.png" alt="smiley" class='icons'>
                <small><?= $results['total']; ?></small>
                </div>
        <?php }} ?>
   
    <div class="react-emojis">
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
    
     <div class="comment_in" >
        <?php 
        $post_id = $post['post_id'];
             #counting comments
    $countComments = $dbh->connect()->prepare("SELECT COUNT(*) as total from comments where post_id = ?");
    if(!$countComments ->execute(array($post_id))){
        echo 'Failed To Load Posts';
    }else{
         $result = $countComments->fetch(PDO::FETCH_ASSOC);
        $total = $result['total']; 
    
    }

        ?>
        <input type="text" placeholder="Comment (<?= $total ?>)" id="commentBtn">
       <div class='reply-form-bg'id="commentDiv">
       <div class="reply-form" >
            <span class="close-btn" id="close_comment">
                X
            </span>
            <div><h2>Reply To Post</h2></div>
            <div class="post-reply">
                <div>
                    <?=$post['post_body'] ?>
                </div>
                <div style='background:inherit'>
                @<?=$post['location'] ?> , #<?=$post['topic'] ?> 
                </div>
            </div>
            <form action="../classes_incs/postcomments.php" method='post'>
            <div class="input-reply">
                <div>
                     <span>P</span>
                </div>
               <div>
               <input type="hidden" name="type" value='comm'>
                <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                <input type="hidden" name='page' value='<?= $page ?>'>
                <input type="hidden" name='type' value='comm'>
                <textarea name="comment" id="reply-textarea" placeholder="...whats your view"></textarea>
               </div>
                <div>
                    <button name="submit_comment">Comment</button>
                </div>            
            </div>
            </form>
        </div>
       </div>
       
    </div> 
</div>
<script src='http'></script>
<script>
    $(document).ready(function() {
        // Attach a click event handler to the like buttons with class 'like-button'
        $('.like-button').click(function() {
            // Get the type of like (like, love, funny, sad, fire) from the data-type attribute
            var type = $(this).data('type');

            // Get the post_id and user_id from the hidden input fields
            var post_id = <?= $post['post_id'] ?>;
            var user_id = <?= $user_id ?>;

            // Make the AJAX request to the server
            $.ajax({
                type: 'POST',
                url: '../classes_incs/liking.inc.php',
                data: {
                    post_id: post_id,
                    user_id: user_id,
                    type: type,
                },
                dataType: 'json', // Expect JSON response from the server
                success: function(response) {
                    // This function is executed if the AJAX request is successful
                    console.log('Like request successful!');
                    console.log(response); // Log the response for debugging (if needed)

                    // Update the like count or other UI elements based on the server's response
                    // For example, you can update the like count using the newLikeCount value
                    var likeCountElement = $('.react .react small');
                    likeCountElement.text(response.newLikeCount);
                },
                error: function(error) {
                    // This function is executed if there's an error in the AJAX request
                    console.error('Like request error:', error);
                }
            });
        });
    });

    //react
    const react =document.querySelector('.react');
  const react_emojis=document.querySelector('.react-emojis');
  react.addEventListener('click', () => {
    react_emojis.classList.toggle('react-emojis-active');
  })
</script>
<?php } else {?>
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
    <script>
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
  const react_emojiss=document.querySelector('.reacts');
  reacts.addEventListener('click', () => {
    react_emojiss.classList.toggle('react-emojis-active');
  })
    </script>

    <?php } ?>
    <?php } ?>
    </div>
<script >
    
//For The Post Head
const postChoice = document.querySelector('#post_choice');
const post_choice = document.querySelector('.post-choice-bg');
const closebtn_postchoice = document.querySelector('#closebtn_postchoice');
postChoice.addEventListener("click", function(){
    post_choice.classList.toggle('post-choice-active');
})
closebtn_postchoice.addEventListener('click', function(){
    post_choice.classList.remove('post-choice-active');
})
//Post head Ends

//For the comment Section
const commentBtn = document.querySelector('#commentBtn');
const commentDiv = document.querySelector('#commentDiv');
const closebtn_Comment = document.querySelector("#close_comment");
const textarea_comment = document.querySelector('#reply-textarea');
const reply_form =document.querySelector(".reply-form");

commentBtn.addEventListener("click", function(){
    commentDiv.classList.toggle('reply-form-active');
    commentBtn.style.pointerEvents ='none';
})
closebtn_Comment.addEventListener('click', function(){
    commentDiv.classList.remove('reply-form-active');
    textarea_comment.value = '';
    commentBtn.value = '';
    textarea_comment.style.height = '40px';
    commentBtn.style.pointerEvents ='all';
})


// textarea_comment.addEventListener('input', function() {
//   textarea_comment.style.height = '40px';
//   reply_form.style.maxheight = '';
//   textarea_comment.style.height = textarea_comment.scrollHeight + 'px';
// //   commentDiv.style.height = 'auto';
// });
//comment Section Ends



 

  const head_dots =document.querySelector('.head-dots');
  const head_menu =document.querySelector('.head-menu');
  head_dots.addEventListener('click',() =>{
    head_menu.classList.toggle('head-menu-active');
  })

</script>
    <?php } ?> 
    
</div>
