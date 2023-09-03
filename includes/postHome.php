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
      
         
      <?Php if($userLogged){ ?>
       
        <form action="../classes_incs/posting.inc.php" method='Post' enctype="multipart/form-data">
        <div class='input_img'>
            <div class='userImg'>
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $user['profile_pic'] ?>" alt="">
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="" class="noProf" style="filter: invert(100%);border:none">
                        <?php } ?>
               
            </div>
          
            <div>
               <textarea id="post_choice" placeholder="What Happened?! " name="post" required minlength="2    0"></textarea> 
               <div class="progress-container" id='prog_div'>
        <span id="remainingChars">1050</span>
        <div class="progress-bar" id="progressBar"></div>
    </div> 
                  <div class="custom-select">
                  <select id="themeSelect" name="theme" required>
                  <option value="" disabled selected>Select a Theme</option>
                  <option value="other">Unspecified</option>
            <option value="confessions">Confessions and Secrets</option>
            <option value="advice">Advice and Support</option>
            <option value="humor">Funny Stories and Humor</option>
            <option value="relationships">Relationships and Dating</option>
            <option value="travel">Travel and Adventures</option>
            <option value="career">Career and Education</option>
            <option value="events">Local Events and News</option>
            <option value="wellness">Wellness and Mental Health</option>
            <option value="art">Art and Creativity</option>
            <option value="technology">Technology and Innovations</option>
            <option value="food">Food and Cooking</option>
            <option value="fitness">Fitness and Health</option>
            <option value="books">Books and Literature</option>
            <option value="parenting">Parenting and Family</option>
            <option value="hobbies">Hobbies and Interests</option>
            <option value="social-issues">Social Issues and Advocacy</option>
            <option value="music">Music and Entertainment</option>
            <option value="fashion">Fashion and Style</option>
            <option value="history">History and Culture</option>
            <option value="pets">Pets and Animals</option>
            <!-- Add more options here -->
        </select>
        <input type="button" class='cancel_post' value='Cancel'>
         
      
     
                  </div>   
            
            </div>
                  <div id="emojiContainer">
        <span id="emojiButton" style='left:-10px;font-size:23px'>🙂</span>
        <div id="emojiMenu">
            <!-- Emoji buttons will be added dynamically using JavaScript -->
        </div>
    </div>
            
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
           Share Stories - Share Ideas - Ask Ques - Engage - Whats On Your Mind - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a>
        </div> 
        <script>
            const cancel_post =document.querySelector('.cancel_post');
            const customSelect =document.querySelector('.custom-select');
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
    textarea_Post.style.paddingBottom = '50px';
    textarea_Post.style.minHeight = '100px';
    customSelect.style.display = 'block';
    textarea_Post.style.border = '100px';
    textarea_Post.style.borderRadius = '6px';
    textarea_Post.style.height = textarea_Post.scrollHeight + 'px';
    // postbtn.style.display = 'flex';
  });
  cancel_post.addEventListener('click', function() {
    textarea_Post.style.height = '40px';
    textarea_Post.style.paddingBottom = '6px';
    textarea_Post.style.minHeight = '40px';
    textarea_Post.value = '';
    customSelect.style.display = 'none';
    textarea_Post.style.borderRadius = '32px';
    prog_div.style.display ='none';
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
<?php if(isset($_GET['loggedin'])){ ?> 
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
    Welcome, <?= $user['name'] ?>! Witter - Your Hub for Local Stories and Anonymously Shared Experiences. Dive into the latest buzz from <?= $user['school'] ?> and communitys in <?= $user['city'] ?>. If you can't find your location, feel free to check and update your information in the <a href="../userProfile/settings.php" style='color:#880281'>settings</a>. Happy discovering! It's unfiltered, anonymous, and real.
</p>
 <div>
              
       <span class='span-loc'><a href="../Trends/trends.php?location=<?= $user['city'] ?>">     
       <?= $user['school'] ?></a> ,<a href="../Trends/trends.php?location=<?= $user['city'] ?>"><?= $user['city'] ?></a>
       </span>
                        
    </div>
    </div>
    
   

</div>
<?php }?>
</div>
    <?php 
    include_once('../classes_incs/functionsposts.php');
        
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
                       <img src="../images/noProf.jpeg" alt="anonymouse" class="noProf"  id='profile_pic'>
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
        <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
        <div class="post_b">    
    <p id='post-bAllP'>   <?= formatPostContent($post['post_body']) ?></p>
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <div>
 
       
              <span class='span-loc'><a href="../Trends/trends.php?word=<?= $post['location'] ?>">     
              <img src="../images/placeholder.png" alt="-" class='icons' style='width:20px;position:relative;top:5px'><?= $post['location'] ?>
                 </a> </span>
             <a href="../Trends/trends.php?word=<?= $post['theme'] ?>">   <span class='theme_span'><?= $post['theme'] ?></span></a>
                        
                 </div>
        </div>
        

    </a>
    <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
       
            <div class="post_insights">
            <span class='thot'>    <span id='comment'><img src="../images/comment.png" alt=""><small><?= $post['comment_count']?> Comments</small></span>
                
                    <span id='reaction_emoj'>
                        <img src="../images/happiness.png" alt="">
                <img src="../images/<?= $post['type'];?>.png" alt="<?= $post['type'] ?>" class='icons'>  
               <small> 
                <?= $post['like_count']; ?> Reactions</small></span>
            
              </span>
                 </div>      
       
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
    

<div class="post-container" style='padding:20px'>
    <p>You've reached the end of the confessions. Thank you for exploring and engaging with our community's stories. If you'd like to see more, consider sharing your own confession or come back later for new posts.</p>
</div>
<div class="footer_">
         <a href="../privacy/about.html">About</a> || <a href="../privacy/privacy.html">  Privacy</a>
        </div>
</div>

