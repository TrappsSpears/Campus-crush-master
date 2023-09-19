<?php 
if(isset($_GET['place'])){
    $getname = $_GET['place'];
    $page = 'location';
    $pagee ='post_D';
include('../includes/headall.php'); 
include('location.incs.php');?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav" id="navOther">

    <h2><div class="back_btn">
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> Post A Message</button>
    </div></h2>
    
  
</div>
<div class ='profileContainer'>
  <div class="cover">
    <img src="../images/users/<?= $pic['profile_pic'] ?>" alt="">
  </div>
  <div class="img_profile">
    <img src="../images/users/<?= $pic['profile_pic'] ?>" alt="" >  
  </div>
  <div class="info">
    <h4>
      <span><?= $getname ?> <img src="../images/map-pin.png" alt="king" class="icons" style='width:12px'> </span>
</h4>
    <div>
      <span> Members <small><?= $userInfo['total_members'] ?></small></span>
    <span> Posts <small><?= $userInfo['total_posts'] ?></small></span>
    </div>
  
  </div>
  <?php include('navlos.php'); ?>
  
</div>
<div class="posts" >
<div class="con_form">
      
         

       
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
                  <select id="themeSelect" name="theme">
           <option value="Message"> Message</option>
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
            <select name="location" id="location" required>
                <option value="" disabled selected>Send To...</option>
                <?php foreach($users as $users){ ?>
                    <option value="<?= $users['username'] ?>"><?= $users['name'] ?></option>
                <?php } ?>
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

    <?php  
    include_once('../classes_incs/functionsposts.php');
    foreach($directPosts as $post){ 
        $rand = rand(0,1000);
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'].' '.$post['time'];
        $formattedDate = format_post_date($post_date);
        include('../includes/posts.php'); }
        ?>
</div>
    </div>
    <?php include('../includes/leftbar.php') ?>

  <?php include('../includes/footer.php') ;
  include('../includes/script.php');
  ?>
 
</body>
</html>
<?php } ?>
