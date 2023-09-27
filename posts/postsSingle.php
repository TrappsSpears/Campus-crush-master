<div class="posts" style='margin-top: 0px'>
 
   
   
<!--...............------------------- Now Posting --------------------------------------------------------------->
<?php if(isset($_GET['post_id'])){
$post_id = $_GET['post_id'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
    include_once('../classes_incs/dbh.class.php');
    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
      $userCity = $_SESSION['city'];
      $userSchool = $_SESSION['school'];
      $userCountry = $_SESSION['country'];
      $userDOB = $_SESSION['dob']; 
      $userID = $user_id; 
      $userName = $_SESSION['username'];  
    }
    $dbh = New Dbh();
    

##-------------------Posts for Single Post--------------------------------------##

// Check if the data is already cached

    // Data is not cached or has expired, so fetch it from the database
    $selectPost = $dbh->connect()->prepare("SELECT posts.*, users.*, likes.type as type,
        COUNT(bookmarks.id) AS save_count, 
        COUNT(likes.id) AS like_count, 
        COUNT(comments.id) AS comment_count
        FROM posts JOIN users ON posts.user_id = users.id 
        LEFT JOIN likes ON posts.post_id = likes.post_id 
        LEFT JOIN bookmarks ON posts.post_id = bookmarks.post_id 
        LEFT JOIN comments ON posts.post_id = comments.post_id  
        WHERE posts.post_id = ? ORDER BY date_created DESC");

    if (!$selectPost->execute(array($post_id))) {
        echo 'Failed To Load Posts';
    } else {
        $post = $selectPost->fetch(PDO::FETCH_ASSOC);

    }
 
      include_once('../classes_incs/functionsposts.php');

    $post_date =$post['date_created'].''.$post['time'];
    $formattedDate = format_post_date($post_date);
    
    ?>
        
    
        <div class="post-container">
        <div class="post-head">
      
       <div class="heading-post">
       <?php if($post['anonymous'] == 'yes'){  if($post['theme'] != 'Message'){ ?>
        <a href="../location/location.php?place=<?=$post['location'] ?>">
        <?php } else { ?>
            <a href="#"></a>
           <?php } ?>
        
                    <div class="post-heading-container">
                  <div class='post-heading'>
                       <img src="../images/W.png" alt="anonymouse" class="noProf"  id='profile_pic'>
                       <div id='post_info'>
                       <div>
                             <b> <span id='username'> <?= $post['theme'] ?> </span></b><span id='name'>@hideMe<small> . </small>  <?= $formattedDate ?>
                            </span>
                        </div>
       
                    </div>   
                
                </div>       
                    </div>
        </a>
            <?php }else { ?>
                <a href="../location/location.php?user=<?=$post['username'] ?>"> 
                <div class="post-heading-container">
                <div class='post-heading'>
        
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
           
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> <span id='name'> <b><?= $post['name'] ?></b><small> . </small>  <?= $formattedDate ?></span>
                        </div>
                 
                    </div>   
                </div>
                </div></a>
                <?php } ?>   
                
                  
        </div>
        
            <div class="head-dots">
            <div>
                  <img src="../images/menu.png" alt="..." class="icons" style='width:20px'>
                </div>
               <div class="head-menu">       
               <form action="../witter/reports.php?reporting" method='post'>
               <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
               <input type="hidden" name="post" value="<?= $post['post_body'] ?>">
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
               <button name="report">Report </button>
               </form>
               </div>
            </div>
        </div>
    <div class="post-box" >
        <a href="#">
            <div class="post_b">

            
        
        <p > <?= formatPostContent($post['post_body']) ?></p>
        <?php if($post['post_pic'] != ''){?> 
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="" style='height:auto'>
    </div>
    <?php } ?>
        </a>
        <div>
              
              <span class='span-loc'>
                    <?php   if($post['theme'] != 'Message'){ ?>
        <a href="../location/location.php?place=<?=$post['location'] ?>">
        <?php } else { ?>
            <a href="../location/location.php?user=<?=$post['location'] ?>"> 
           <?php } ?>  
            -<?= $post['location'] ?> 
            <a href="../Trends/trends.php?word=<?= $post['theme'] ?>">   <span class='theme_span'>#<?= $post['theme'] ?></span></a>
                 </a> </span>
                        
                 </div>
    </div>
    <div class="bookmark">

    <form action="../classes_incs/bookmarks.inc.php" method='post'>
               <input type="hidden" name="page" value="postSingle">
                <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                <?php
            $post_id = $post['post_id'];
            $sql = "SELECT user_id FROM bookmarks WHERE  user_id = ? AND post_id = ?;";
            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($user_id , $post_id))){
                $result = null;
            }else{
                if($result->rowCount()>0){ ?>
                      <button name="bookmark"> <img src="../images/star2.png" alt="" class='icons' ></button>
               <?php }else{ ?> 
                <button name="bookmark"> <img src="../images/star(1).png" alt="" class='icons' ></button>
                <?php } }?>
             
               </form>
               <div>

                <img src="../images/share-square.png" alt="share" class='icons'>
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
                       $sql = "SELECT COUNT(*) as total FROM likes WHERE post_id = ?;";

            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array( $post_id))){
                $result = null;
            }else{
                $results = $result->fetch(PDO::FETCH_ASSOC);
                
                    $sql = "SELECT type FROM likes WHERE post_id = ? LIMIT 5;";
                    $result = $dbh->connect()->prepare($sql);
                    if(!$result->execute(array($post_id))){
                        $result = null;
                    }else{
                        $type = $result->fetchAll(PDO::FETCH_ASSOC);}}
                    ?>

                <div class="react">
                <div class="react">
                <img src="../images/<?php echo $resultsall['type'];?>.png" alt="<?= $resultsall['type'] ?>" class='icons' >
                <small style='background:inherit; margin-left:-4px'><?= $results['total']; ?></small> <small style='background-color:inherit;margin-top:40px'>
              <span style=' visibility: hidden;'>Reactions</span>  
                </small>
                </div>
                <div>
                <span id='reaction_emoj'>
                    <?php foreach($type as $type){ ?> 
                    <img src="../images/<?php echo $type['type'];?>.png" alt="<?= $type['type'] ?>" class='icons' style='width:18px'>  
                       
                        <?php } ?>
                        
                   </span>

                </div>
                </div>
            <?php }else{?>
                <div class="react" id='react' style="font-size: 23px;">
                <img src="../images/love2.png" alt="" class='icons' >
                <small style='background:inherit; margin-left:-4px'><?= $results['total']; ?></small>
                
                </div>
            <?php }} ?>
    <div class="react-emojis" id="reacts">
        <div>
            <form action="../classes_incs/liking.inc.php" method='post'>
            <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='like'>
            <button name='submit_like' ><img src="../images/like.png" class='icons' alt="like"> </button>
            </form>
        </div>
        <div>
            <form action="../classes_incs/liking.inc.php" method='post'>
            <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='shocking'>
            <button name='submit_like' ><img src="../images/shocking.png" class='icons' alt="like"> </button>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post'>
        <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='love'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like'><img src="../images/love.png" class='icons' alt="love"></button>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post'>
        <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='funny'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like'><img src="../images/funny.png" class='icons' alt="funny"></button>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post'>
        <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='sad'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like'><img src="../images/sad.png" class='icons' alt="sad"></button>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post'>
        <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post['post_id'] ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='fire'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like'><img src="../images/fire.png" class='icons' alt="fire"></button>
            </form>
        </div>
    </div>
    </div>
   
        <form action="../classes_incs/postcomments.php" method="post" class='form-comment' id='myForm'>
         <div class="comment_in" >
                <textarea placeholder="What are your Thoughts" class="textarea_reply" id="reply-textarea" name="comment" required  ></textarea> 
                     <input type="hidden" name = 'post_id' value="<?= $post['post_id'] ?>">
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                     <input type="hidden" name='page' value='<?= $page ?>'>
                 
                    <span id='remainingChars' style="position: absolute;margin-left:10px"></span>
                 
        </div>
        <script>
                   const textarea_Reply = document.querySelector('#reply-textarea');
       const remainingCharsSpan = document.getElementById("remainingChars");

       const maxLength = 300;

       textarea_Reply.addEventListener("input", function() {
            const currentLength = textarea_Post.value.length;
            const remainingChars = maxLength - currentLength;
           
            if (remainingChars >= 0) {
               
                remainingCharsSpan.textContent = remainingChars;
          
            } else {
                // If the text exceeds the limit, truncate the text
                textarea_Reply.value = textarea_Reply.value.substring(0, maxLength);
                remainingCharsSpan.textContent = 0;
            } });
        </script>
                <div class="comOpt">
                <div id="emojiContainer">
        <span id="emojiButton"><img src="../images/smile.png" alt="" class='icons' style='width:20px'></span>
        <div id="emojiMenu">
            <!-- Emoji buttons will be added dynamically using JavaScript -->
        </div>
    </div>
    <div>
            <select name="type" >
                <option value='public'>Public</option>
                 <option value='private'>Private</option>
            </select>
            <div>
               <small>Private- To Message the poster</small> 
            </div>
            
             </div>   
             
            <button name='submit_comment' type='button' id='submitButton'>Post</button>
        
       </div>
    
        
        </form>
        <div id="loadingBarPost">
        Commenting
    </div>

<!-- Response message container -->
<div id="responseMessage"></div>
      <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm");
    const submitButton = document.getElementById("submitButton");
    const loadingBar = document.getElementById("loadingBarPost");
    const linksInForm = document.querySelector("a");
    const postChoice = document.getElementById("reply-textarea");
    

    submitButton.addEventListener("click", function () {
        // Hide the form and show the loading bar
  
        if (postChoice.value.trim() === "" ) {
            alert("Textarea and/or file input cannot be empty.");
            return; // Prevent form submission if validation fails
        }
        form.style.display = "none";
        loadingBar.style.display = "block";
        setTimeout(function(){
          form.style.display = 'block'; 
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 2000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
  
        xhr.open("POST", "../classes_incs/postscomments.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

        xhr.onload = function () {
                    if (xhr.status === 200) {
         
             
                // Show the form again and hide the loading bar
                loadComms();
                linksInForm.style.pointerEvents = 'all';
                // Reset the form if needed
                form.reset();
            } else {
                // Handle other HTTP status codes or errors here
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };

        xhr.send(formData);
        
    });
});


    </script>
    </div>
</div>
   
        
        </div>
        

        <div class="reply-container">
      
            <h3>Comments <small> <?= $post['comment_count'] ?></small></h3>
            <div id='posts-com'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadComms() {
   var xhr = new XMLHttpRequest();
   xhr.open('GET','comments.php?p_id=<?php echo $post['post_id'] ?>',true);

         
         // Insert the fetched content into the specified element

   xhr.onload =function(){
    if(this.status==200){
      var postsCom = document.getElementById('posts-com');
      postsCom.innerHTML = this.responseText;
    }else{
      alert('error')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadComms();
</script>
        </div>
        <div class="footer_">
         <a href="../privacy/about.html">About</a> || <a href="../privacy/privacy.html">  Privacy</a>
        </div>
</div>
<?php  }?> 
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
    head_menu.style.display = head_menu.style.display === 'block' ? 'none' : 'block';
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
<script>
        // Add a click event listener to the back button
        document.getElementById("backButton").addEventListener("click", function() {
            // Use the history object's back() method to navigate to the previous page
            history.back();
        });
    </script>
    