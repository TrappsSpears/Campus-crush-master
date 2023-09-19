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
      
         

       
        <form action="../classes_incs/posting.inc.php" method='Post' enctype="multipart/form-data">
        <div class='input_img'>
            <div class='userImg'>
                    <img src="../images/users/<?= $user['profile_pic'] ?>" alt="">
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
     
    </div>
    
<!--...............------------------- Now Posting --------------------------------------------------------------->

<?php if(isset($_GET['loggedin'])){ ?> 
    <div class="post-container" style='margin-top:-10px;'>
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
</div>
<?php }?>

    <?php 
    include_once('../classes_incs/functionsposts.php');
    foreach($posts as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }

        include('script.php')
        ?>
        <div class="footer-about" id='info_App'>
        Share Stories - Confess - Share Ideas - <a href="../privacy/report.php"> Ask Ques</a> - Engage - Whats On Your Mind - <a href="../privacy/about.html">About</a> - <a href="../privacy/privacy.html">  Privacy</a> - <a href="../privacy/termsOfService.html"> Terms Of Use</a> -  <a href="../privacy/cookies.html"> Cookie Policy</a> 2023 WitterVerse Corp.
        </div>  
</div>

