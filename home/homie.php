<?php 
$page = 'home';
$pagee = 'homie';
include_once('../includes/headall.php');
include('indexstyles.php');
?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
 
    <div class="nav">
    <div class="icon">
        <img src="../images/witterlogo.png" alt="" class='icons'>
      </div>
      <div>
        <h2> Home</h2>
      </div>
<div id="scrollButton" class="scroll-button">
    <button onclick="scrollToTop()">Back to Top</button>
  </div> 
<div class="home_opt">
    <a href="home.php"> <div>
 <p> <span> For You </span> </p> 
  </div></a>
  <div>
 <span class ='active-home'>  <?= $user['school'] ?> <?= $user['country'] ?> </span>
  </div>
</div>
    
</div>

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
        <p id="remainingChars">600</p>
        <div class="progress-bar" id="progressBar"></div>
    </div> 
                  <div class="custom-select">
                  <select id="themeSelect" name="theme" required>
                  <option value="" disabled selected>Select a Theme</option>
                  <option value="other">Unspecified</option>
            <option value="Confessions">Confessions and Secrets</option>
            <option value="Advice">Advice and Support</option>
            <option value="Humor">Funny Stories and Humor</option>
            <option value="Relationships">Relationships and Dating</option>
            <option value="Travel">Travel and Adventures</option>
            <option value="Career">Career and Education</option>
            <option value="Events">Local Events and News</option>
            <option value="Wellness">Wellness and Mental Health</option>
            <option value="Art">Art and Creativity</option>
            <option value="Technology">Technology and Innovations</option>
            <option value="Food">Food and Cooking</option>
            <option value="Fitness">Fitness and Health</option>
            <option value=" Books">Books and Literature</option>
            <option value="Parenting">Parenting and Family</option>
            <option value="Hobbies">Hobbies and Interests</option>
            <option value="Social-issues">Social Issues and Advocacy</option>
            <option value="Music">Music and Entertainment</option>
            <option value="Fashion">Fashion and Style</option>
            <option value="History">History and Culture</option>
            <option value="Pets">Pets and Animals</option>
            <!-- Add more options here -->
        </select>
        <input type="button" class='cancel_post' value='Cancel'>
         
      
     
                  </div>   
            
            </div>
               
            
        </div>
     
    <div class="uploaded_img">
        <img src="" alt="" id='post-image'>
    </div>
      
        <div class='post_header'>
        
        
           <div style='display:flex; gap:10px'>
            <div>
                <select name="location" id="location">
                <?php if($user['school']!= ''){ ?> 
                <option value="<?= $user['school'] ?>">@<?= $user['school'] ?></option>
                <?php }?>
                <option value="<?= $user['city'] ?>">@<?= $user['city'] ?></option>
                
            </select>
        
            </div>
            
                
              <div id="emojiContainer">
              <img src="../images/smile.png" alt="" class='icons' id="emojiButton" > 
              <div id="emojiMenu">
            <!-- Emoji buttons will be added dynamically using JavaScript -->
        </div>
              </div>
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                    <label for="upload_profile_pic" id='label_upload'> <img src="../images/gallery.png" alt="" class='icons'></label>
                    <input type="file" name='post_pic' id='upload_profile_pic' accept="image/*">
                
                
               
                
                    <div class='switch'>
                       
                    
            <div>
                <div>
                   <label class="toggle-switch">
                <input type="checkbox" name="show_profile" value="yes" checked>
                <span class="slider"></span> 
                </div>
               
              
            </label> 
            <div class="small">
                <small>Anonymous</small>
            </div>
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
       const maxLength = 600;

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
            const profileImage = document.getElementById('post-image');
    const profilePhotoInput = document.getElementById('upload_profile_pic');

textarea_Post.addEventListener('input', function() {
    textarea_Post.style.height = 'auto';
    textarea_Post.style.paddingBottom = '50px';
    textarea_Post.style.fontSize = '14px';
   
    textarea_Post.style.minHeight = '100px';
    customSelect.style.display = 'block';
    textarea_Post.style.border = '100px';
    textarea_Post.style.borderRadius = '6px';
    textarea_Post.style.height = textarea_Post.scrollHeight + 'px';
     postbtn.style.marginTop = '15px';
     profileImage.style.display = 'block';
  });
  cancel_post.addEventListener('click', function() {
    textarea_Post.style.height = '40px';
    textarea_Post.style.fontSize = '25px';
    textarea_Post.style.paddingBottom = '6px';
    textarea_Post.style.minHeight = '40px';
    textarea_Post.value = '';
    customSelect.style.display = 'none';
    textarea_Post.style.borderRadius = '32px';
    prog_div.style.display ='none';
    postbtn.style.margin = '-3px';
    profileImage.style.display = 'none';
  });
 
  

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
<div class="post-container" >
<?php if(isset($_GET['loggedin'])){ ?> 
    <div class="post-head">
        <div class="heading-post">
    <div class="post-heading-container">
        <div class="heading-post">
            <div class='post-heading'>
                <img src="../images/witterlogo.png" alt="" class="icons" id='profile_pic'> 

                       <div id='post_info'>
                        <div>
                        <b> <span id='username'>Witter</span></b> <span id="name">To you <?= $user['name'] ?></span> 
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
    foreach($posts_homie as $post){ 
      $idUnique = $post['post_id'];
      $post_date = $post['date_created'].' '.$post['time'];
      $formattedDate = format_post_date($post_date);
      include('../includes/posts.php'); }
        ?>
      



  

<div class="post-container" style='padding:20px'>
    <p>You've reached the end of the confessions. Thank you for exploring and engaging with our community's stories. If you'd like to see more, consider sharing your own confession or come back later for new posts.</p>
</div>
<div class="footer_">
         <a href="../privacy/about.html">About</a> || <a href="../privacy/privacy.html">  Privacy</a>
        </div>
</div>



    </div>

<?php include('../includes/leftbar.php') ;?>

    </div>
  <?php include('../includes/footer.php') ;
  include('../includes/script.php');
  ?>

</body>
</html>