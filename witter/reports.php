<?php 
$page = '';
$pagee = 'reports';
include_once('../includes/headall.php');
include('witter.incs.php');
?>

<body>
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
        <div class="main-content">
        <?php include('nav.php') ?> 
        <div class="con_form">
        <?php if(isset($_POST['report'])){
                    $post = $_POST['post'];
                    $id_post = $_POST['post_id'];
                    $user_id = $_POST['user_id']; ?>
        <form action="../classes_incs/reportsFeeds.php" method='Post' enctype="multipart/form-data">
        <div class='input_img'>
            <div class='userImg'>
                <?php if($_SESSION['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $_SESSION['profile_pic'] ?>" alt="">
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="" class="noProf" style="filter: invert(100%);border:none">
                        <?php } ?>
               
            </div>
            
            <div >
               <textarea id="post_choice" placeholder="What Happened?! Please describe the issue in detail... " name="post" required minlength="2    0"></textarea> 
               <div class="progress-container" id='prog_div'>
        <p id="remainingChars">600</p>
        <div class="progress-bar" id="progressBar"></div>
    </div> 
                  <div class="custom-select">
                
                <select name="report_type">
                <option value="Bulling">Im being Bullied</option>
                    <option value="Spam">Spam</option>
                    <option value="Hate Speech">Hate Speech</option>
                    <option value="Harassment">Harassment</option>
                    <option value="Sensitive">Shown Sensitive or Disturbing content</option>
                    <option value="Other">Other (Please specify in the description)</option>
                </select>
                
       
            <section class="report-section" style='margin-top:-30px'>
                  <h2>Who is this reporting for?</h2>
            <select name="report_for" style="top:-0px;left:60px;">
                <option value="Myslef">Myself</option>
                    <option value="Community">Community at <?= $_SESSION['school'] ?></option>
                    <option value="Everyone">Everyone at Witter</option>
                    <option value="Someone">Other</option>
                </select>
              
            </section>
            
        <input type="button" class='cancel_post' value='Cancel' style='top:0'>
         
      
     
                  </div>   
                
                    <input type="hidden" value='<?= $id_post ?>' name ='post_id'>
                    <input type="hidden" value='<?= $user_id ?>' name ='user_id'>
                
            <section class="report-section" style="margin-top: 45px;">
                
                        <div id="post-bAllP">
                        <H2>The Post</H2>
                            <p>
                                <?= $post ?>
                            </p>
                        </div>

            </section>
            
            </div>
               
            
        </div>
     
   
      
        <div class='post_header' style='margin-top:10px'>
        
        
           <div style='display:flex; gap:10px'>
            <div>
            <select name="location" id="location">
                <?php if($_SESSION['school']!= ''){ ?> 
                <option value="<?= $_SESSION['school'] ?>">@<?= $_SESSION['school'] ?></option>
                <?php }?>
                <option value="<?= $_SESSION['city'] ?>">@<?= $_SESSION['city'] ?></option>
             
            </select>
        
            </div>
            
           
                    
               
                
                    
            
        </div>
        
            <div>
                <button name='submit_Report'>Post</button>
            </div>
            
        </div>
        
        </form>
        <?php }?>
        <div class="footer-about" id='info_App'>
          Send a FeedBack - Make A Roport
        </div> 
        <footer>
        <p>&copy; 2023 <a href="../home/home.php"> Witter </a>. All rights reserved.</p>
    </footer>
    
    </div>
    <div class="post-container" style='text-align:center;padding:8px'>
    <?php if(isset($_GET['succeeded'])){ ?>
            <p>Your Report has been sumbitted , We really appreciate. We will try our best to meet your requirements</p>
            <?php } ?>
    </div>
    <?php foreach($witter_reps as $post) {if($post['type'] == 'Report'){  ?> 
    <div class="post-container">
    <div class="post-head">
        <div class="heading-post">
    <div class="post-heading-container">
        <div class="heading-post">
            <div class='post-heading'>
                <img src="../images/users/<?=$post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'> 
                <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> 
                        </div>
                 
                    </div>     
            </div>

        </div>
    </div>
    </div>
    </div>
    <div class="post-box">
        <div class="post_b">
            <p> <?= $post['Detaile'] ?></p>
            <span id='name'> <b> <?= $post['type'] ?></b><small> . </small>  <?= $post['report_type'] ?> -
                            </span>
            <span class='span-loc' style='color:#888'>Reporting for  <?= $post['reporting_for'] ?>
       </span>
        </div>
    </div>
    </div>
    
    
    <?php }} ?>
 
        </div>
        <?php
        include('../includes/script.php');
        include('../includes/leftbar.php') ;?>
    </div>
    <?php include('../includes/footer.php') ?>
</body>
</html>