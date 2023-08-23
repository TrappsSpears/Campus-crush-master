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
               <a href="../bookmarks/bookmarks.php?post_id=<?= $post['post_id'] ?>">
               <p> Bookmark Post</p>
               </a>     
                <p> Copy Link</p>
               </div>
            </div>
        </div>
<div class="post-box">
        <div class="location_div">
            <a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                @<?= $post['location'] ?>
            </a> 
  
        </div><a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">

    <p> <?= $post['post_body'] ?></p>
    </a>
</div>

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