<?php 
 include_once('../classes_incs/dbh.class.php');

 
 $dbh = New Dbh();
 $selectUser = $dbh->connect()->prepare("SELECT * FROM users WHERE id = ?");
 if(!$selectUser ->execute(array($user_id))){
     echo 'Failed To Load Posts';
 }else{
     $user = $selectUser->fetch(PDO::FETCH_ASSOC);
 }
?>
<div class="posts">
    <div class="con_form">
      <div class='conform_desgn_head'>
        <div>
            <button></button>
        </div>
        <div>
            
        </div>
        <div>
            <button></button>
        </div>
      </div>
         
      <?Php if($userLogged){ ?>
        <div class="prof_img">
            <img src="../images/incognito.png" alt="." class='icons'>
        </div>
        <form action="../classes_incs/posting.inc.php" method='Post' enctype="multipart/form-data">
        <div class='input_img'>
            <div class='userImg'>
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $user['profile_pic'] ?>" alt="">
                    <?php } else{ ?> 
                        <img src="../images/profile-user.png" alt="" style="filter: invert(100%);border:none">
                        <?php } ?>
               
            </div>
            <div>
               <textarea id="post_choice" placeholder="What Happened?! @<?= $username ?> " name="post" required minlength="2    0"></textarea> 
         
            </div>
                  <div id="emojiContainer">
        <span id="emojiButton" style='left:-10px;font-size:23px'>🙂</span>
        <div id="emojiMenu">
            <!-- Emoji buttons will be added dynamically using JavaScript -->
        </div>
    </div>
            
        </div>
      
      
      <div class="progress-container" id='prog_div'>
        <span id="remainingChars">1050</span>
        <div class="progress-bar" id="progressBar"></div>
    </div>
    <div class="uploaded_img">
        <img src="" alt="" id='post-image'>
    </div>
      
        <div class='post_header'>
        
        
           <div style='display:flex'>
   
            <select name="location" id="location">
                <?php if($user['school']!= ''){ ?> 
                <option value="<?= $user['school'] ?>"> <?= $user['school'] ?></option>
                <?php }?>
                <option value="<?= $user['city'] ?>"><?= $user['city'] ?></option>
                <option value="public">Public</option>
            </select>
           </div>
                
                <div class='label_upload'>
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                    <label for="upload_profile_pic" id='label_upload'> <img src="../images/imagegallery.png" alt="" class='icons'></label>
                    <input type="file" name='post_pic' id='upload_profile_pic' accept="image/*">
                </div>
                
               
                
                    <div class='switch'>
                       
                    
            <div>
                <div>
                   <label class="toggle-switch">
                <input type="checkbox" name="show_profile" value="yes" checked>
                <span class="slider"></span> 
                </div>
               
              
            </label> 
            <div>
                <small style='margin-left:-15px'>Anonymouse</small>
            </div>
            </div> 
                    </div>
            
            
        
            <div>
                <button name='submit'>Post</button>
            </div>
            
        </div>
        
        </form>
        <div class="footer-about" id='info_App'>
         Your Confessions Platform -  Share Stories - Share Ideas - Ask Ques - Engage - Whats On Your Mind - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a>
        </div> 
        <script>
            const postbtn =document.querySelector('.post_header');
       const textarea_Post = document.querySelector('#post_choice');
       const remainingCharsSpan = document.getElementById("remainingChars");
       const progressBar = document.getElementById("progressBar");
       const prog_div = document.getElementById("prog_div");
       const anoymousProfimg =document.querySelector('#anoymousProfimg');
       const maxLength = 1050;

       textarea_Post.addEventListener("input", function() {
            prog_div.style.display ='block';
            const currentLength = textarea_Post.value.length;
            const remainingChars = maxLength - currentLength;
            if (currentLength < maxLength){
                postbtn.style.display = 'flex';
                
            }
            if (remainingChars >= 0) {
                const progressPercentage = (currentLength / maxLength) * 100;
                remainingCharsSpan.textContent = remainingChars;
                progressBar.style.width = progressPercentage + "%";
            } else {
                // If the text exceeds the limit, truncate the text
                textarea_Post.value = textarea_Post.value.substring(0, maxLength);
                remainingCharsSpan.textContent = 0;
            } });

textarea_Post.addEventListener('input', function() {
    textarea_Post.style.height = 'auto';
    textarea_Post.style.height = textarea_Post.scrollHeight + 'px';
    // postbtn.style.display = 'flex';
  });
 
  const profileImage = document.getElementById('post-image');
    const profilePhotoInput = document.getElementById('upload_profile_pic');

    profilePhotoInput.addEventListener('change', function(event) {
        const selectedFile = event.target.files[0];

        if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function() {
                profileImage.src = reader.result;
            };

            reader.readAsDataURL(selectedFile);
        }
    });
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
        <?php } ?>
    </div>
    
<!--...............------------------- Now Posting --------------------------------------------------------------->
<div class="post-container" style='margin-top:-10px;'>
<?php if(isset($_GET['log_inSuccessful&username'])){ ?> <?php }?>
    <div class="post-head">
        <div class="heading-post">
    <div class="post-heading-container">
        <div class="heading-post">
            <div class='post-heading'>
                <img src="../images/witterlogo.png" alt="" class="icons" id='profile_pic'> 

                       <div id='post_info'>
                        <div>
                        <b> <span id='username'>Witter</span></b>
                        </div>
                        <div>
                        <span><small id='date'>To you <?= $user['name'] ?></small></span> 
                      </div>     
                    </div>   
                
                </div>

        </div>
    </div>
    </div>
    </div>
<div class="post-box">
    <div class="post_b" >    
        <p>
    Welcome to Witter! Your spot for local confessions and shared stories. Dive into the buzz around from your city and school.If you can't find yours, try checking the spelling or <a href="../userProfile/settings.php" style='color:#880281'> updating your info </a>. Happy discovering!! - unfiltered, anonymous, and real
    </p> <div>
              
       <span class='span-loc'><a href="../Trends/trends.php?location=<?= $user['city'] ?>">     
              - <?= $user['school'] ?></a> ,<a href="../Trends/trends.php?location=<?= $user['city'] ?>"><?= $user['city'] ?></a>
       </span>
                        
    </div>
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
        function formatPostContent($content) {
            // Search for URLs in the content
            $pattern = '/https?:\/\/\S+/i'; // Regular expression pattern to match URLs
            $formattedContent = preg_replace_callback($pattern, function($match) {
                // Use the matched URL as the link text and href
                return '<a style="color:#1e90ff" href="' . $match[0] . '" target="_blank">' . $match[0] . '</a>'; 
            }, $content);
        
            return $formattedContent;
        }
        
    foreach($posts as $post){ 
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'];
        $formattedDate = format_post_date($post_date);
        ?>
      
    
    <div class="post-container">
        <div class="post-head">
            <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                    <div class="post-heading-container">
                  <div class='post-heading'>
                       <img src="../images/Unkown.jpeg" alt="anonymouse" class="icons" id='profile_pic'>
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
                <?php } ?>   
                
                  
        </div>
            <div class="head-dots" id = 'head-dots<?php echo $idUnique;?>'>
                <div>
                  <img src="../images/menu.png" alt="..." class="icons">
                </div>
                <?php if($userLogged){ ?> 
               
              
               <?php } ?>
            </div>
        </div>
    <div class="post-box">
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        <div class="post_b">    
    <p id='post-bAllP'>   <?= formatPostContent($post['post_body']) ?></p>
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <div>
              
              <span class='span-loc'><a href="../Trends/trends.php?word=<?= $post['location'] ?>">     
                     -<?= $post['location'] ?>
                 </a> </span>
                        
                 </div>
        </div>
        

    </a>
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
            
            <span class='thot'> Witt your thought</span>
                 </div>      
        <?php } ?>
        </a>
</div>

       <div class='head_post_el'>
        
                <?php   
                $sql ="SELECT p.post_id, l.type, COUNT(*) AS like_count
                FROM posts p
                JOIN likes l ON p.post_id = l.post_id
                WHERE p.post_id = ? -- Replace 'specific_type' with the actual type you're interested in
                GROUP BY p.post_id, l.type
                ORDER BY like_count DESC
                LIMIT 1";
                $typeResult = $dbh->connect()->prepare($sql);
                
                if(!$typeResult->execute(array($post['post_id']))){
                    $typeResult = null;
                }else{
                    $typeLike = $typeResult->fetch(PDO::FETCH_ASSOC);
                    if($typeLike!==false){
                        $typeLikee=$typeLike;
                    }else{
                        $typeLikee= null;
                    }
                }
                ?><?php if($typeLikee !== null && $typeLikee['post_id']===$post['post_id']){ ?> 
               <a href="../Trends/trends.php?reaction=<?= $typeLikee['type']?>"> <span><img src="../images/<?= $typeLikee['type']?>.png" alt="<?= $typeLikee['type']?>"> </span></a><?php } ?>
        </div>
    </div>


    <?php } ?> 
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Your JavaScript code here
    const headDotsContainers = document.querySelectorAll('.head-dots-container');

    headDotsContainers.forEach(container => {
        const headDots = container.querySelector('.head-dots');
        const headMenu = container.querySelector('.head-menu');

        headDots.addEventListener('click', event => {
            event.stopPropagation();

            headMenu.classList.toggle('head-menu-active');

            headDotsContainers.forEach(otherContainer => {
                if (otherContainer !== container) {
                    const otherMenu = otherContainer.querySelector('.head-menu');
                    otherMenu.classList.remove('head-menu-active');
                }
            });
        });
    });
});

</script>
<div class="post-container" style='padding:20px'>
    <p>You've reached the end of the confessions. Thank you for exploring and engaging with our community's stories. If you'd like to see more, consider sharing your own confession or come back later for new posts.</p>
</div>
<div class="footer_">
         <a href="../privacy/about.html">About</a> || <a href="../privacy/privacy.html">  Privacy</a>
        </div>
</div>

