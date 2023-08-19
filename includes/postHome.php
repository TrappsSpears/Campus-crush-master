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
                <img src="../images/users/<?= $user['profile_pic'] ?>" alt="">
            </div>
            <div>
               <textarea id="post_choice" placeholder=" What's Your Story <?= $username ?>?!" name="post" required></textarea> 
               
            </div>
            
        </div>
      
      
      <div class="progress-container" id='prog_div'>
        <span id="remainingChars" style='top: -45px;left:238%'>600</span>
        <div class="progress-bar" id="progressBar"></div>
    </div>
    <div class="uploaded_img">
        <img src="" alt="" id='post-image'>
    </div>
      
        <div class='post_header'>
        
        
           <div>
            <select name="location" id="location">
                <?php if($user['school']!= ''){ ?> 
                <option value="<?= $user['school'] ?>"><?= $user['school'] ?></option>
                <?php }?>
                <option value="<?= $user['city'] ?>"><?= $user['city'] ?></option>
                <option value="public">Public</option>
            </select>
           </div>
                
                <div class='label_upload'>
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                    <label for="upload_profile_pic" id='label_upload'> <img src="../images/image-gallery.png" alt="" class='icons'></label>
                    <input type="file" name='post_pic' id='upload_profile_pic'>
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
        <script>
            const postbtn =document.querySelector('.post_header');
       const textarea_Post = document.querySelector('#post_choice');
       const remainingCharsSpan = document.getElementById("remainingChars");
       const progressBar = document.getElementById("progressBar");
       const prog_div = document.getElementById("prog_div");
       const anoymousProfimg =document.querySelector('#anoymousProfimg');
       const maxLength = 600;

       textarea_Post.addEventListener("click", function() {
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

textarea_Post.addEventListener('click', function() {
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
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'];
        $formattedDate = format_post_date($post_date);
        ?>
        
    
    <div class="post-container">
        <div class="post-head">
            <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                       <img src="../images/incognito.png" alt="anonymouse" class="icons"><span><small>-Anonymous</small></span>
            <?php }else { ?> 
                <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'> <span>-<?= $post['username'] ?></span> 
                <?php } ?>   
                
                <span><small><?= $formattedDate ?></small></span>   
        </div>
            <div class="head-dots" id = 'head-dots<?php echo $idUnique;?>'>
                <div>
                  <img src="../images/menu.png" alt="..." class="icons">
                </div>
                <?php if($userLogged){ ?> 
               <div class="head-menu" id='head-menu<?php echo $idUnique;?>'>
               <form action="../classes_incs/bookmarks.inc.php" method='post'>
                <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
               <button name="bookmark"> Bookmark Post</button>
               </form>
                  
                <p> Share Post</p>
               </div>
               <?php } ?>
            </div>
        </div>
    <div class="post-box">
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        <div class="post_b">
        <?php if($post['post_pic'] != ''){?> 
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <?php } ?>
    <h4>Confession:</h4>
    <p >  <?= $post['post_body'] ?></p>
    <div>
              
              <span class='span-loc'><a href="../Trends/trends.php?location=<?= $post['location'] ?>">     
                     -<?= $post['location'] ?>
                 </a> </span>
                        
                 </div>
        </div>
        

    </a>
</div>
<?php if($userLogged){ ?>
        
        
            <div class="engage">
           
            </div>
        <a href="../singlePosts/singleposts.php?post_id=<?= $post['post_id'] ?>">
        
            

            <?php
            $post_id = $post['post_id'];
            $sql = "SELECT COUNT(*) as total FROM likes WHERE post_id = ? LIMIT 5;";

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

                <div class="post_insights">
                    <span id = 'bookmark'><img src="../images/saved.png" alt=""><small>0</small></span>
                        <span id='reaction_emoj'>
                    <?php foreach($resultsall as $type){ ?> 
                    <img src="../images/<?php echo $type['type'];?>.png" alt="<?= $type['type'] ?>" class='icons'>  
                       
                        <?php } ?>
                        <?php if($results==0){ ?>
                            <img src="../images/happiness.png" alt="smiley">
                            <?php } ?>
                   <small> <?php if($results>0){ ?>
                    <?= $results['total']; ?> <?php } ?></small></span>
                
                <span class='thot'>Thoughts!?</span>
                     </div>      
            <?php } ?>
            </a>
        
    <?php } else{?>
        Sign In to ingage
       <?php } ?>
    </div>
<script >

  const head_dots =document.querySelector('#head-dots<?php echo $idUnique;?>');
  const head_menu =document.querySelector('#head-menu<?php echo $idUnique;?>');
  head_dots.addEventListener('click',() =>{
    head_menu.classList.toggle('head-menu-active');
  })

</script>
    <?php } ?> 
    
</div>
