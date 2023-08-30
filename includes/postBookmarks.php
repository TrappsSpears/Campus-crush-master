<div class="posts">
    <div class="con_form">
    <div class="post_head">
            <div class="select-post-type">
                <p id="C_con">
                  
                  Your saved Posts
                </p>
            </div>    
        </div>
    </div>
   
 
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
    foreach($posts_B as $post){ 
        $post_date = $post['date_created'];
        $formattedDate = format_post_date($post_date);  ?>
    <div class="post-container">
        <div class="post-head">
        <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                    <div class="post-heading-container">
                  <div class='post-heading'>
                       <img src="../images/unkownface1.png" alt="anonymouse" class="icons" id='profile_pic'>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'>Hidey</span></b> <span id='name'>_Anonymouse</span> 
                        </div>
                        <div>
                          <span><small id='date'><?= $formattedDate ?></small><small> at <?= $post['time'] ?></small> </span>
                      </div>     
                    </div>   
                
                </div>       
                    </div>
             
            <?php }else { ?> 
                <a href="../Trends/trends.php?word=<?= $post['username'] ?>">
                <div class="post-heading-container">
                <div class='post-heading'>
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="profile" class="icons"  id='profile_pic'>
                        <?php } ?>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> <span id='name'> - <?= $post['name'] ?></span> 
                        </div>
                        <div>
                          <span><small id='date'><?= $formattedDate ?></small><small> . <?= $post['time'] ?></small> </span>
                      </div>     
                    </div>   
                </div>
                </div></a>
                </div>
                <?php } ?>   
                
                  
        </div>
            <div class="head-dots">
                <div>
                  <small>.</small><small>.</small><small>.</small>   
                </div>
               <div class="head-menu">
               <a href="../bookmarks/bookmarks.php?post_id=<?= $post['post_id'] ?>">
               <p> Bookmark Post</p>
               </a>     
                <p> Copy Link</p>
               </div>
            </div>
        </div>
<div class="post-box">
<a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
<div class="post_b">
        <?php if($post['post_pic'] != 'Array'){?> 
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <?php } ?>
    
    <p id='post-bAllP'>  <?= $post['post_body'] ?></p>
    <div>
              
              <span class='span-loc'><a href="../Trends/trends.php?location=<?= $post['location'] ?>" style='border-top:1px solid #212121'>     
                     -<?= $post['location'] ?>
                 </a> </span>
                        
                 </div>
        </div>
    </a>
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
                
                <span class='thot'> <img src="../" alt=""> Write a thought...</span>
                     </div>      
            <?php } ?>
            </a>
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
    <?php } ?> 

</div>
<script>
    
    
</script>