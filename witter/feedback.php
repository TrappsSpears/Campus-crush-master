<?php 
$page = '';
$pagee = 'feedback';
include_once('../includes/headall.php');
include('witter.incs.php');
?>

<body>
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
        <div class="main-content">
        <?php include('nav.php') ?> 
        <div class="con_form">
      
         

       
        <form action="../classes_incs/reportsFeeds.php" method='Post' >
        <div class='input_img'>
            <div class='userImg'>
                <?php if($_SESSION['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $_SESSION['profile_pic'] ?>" alt="">
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
           <option value="Feed back"> FeedBack</option>
           <option value="Report"> Report</option>
           
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
                <?php if($_SESSION['school']!= ''){ ?> 
                <option value="<?= $_SESSION['school'] ?>">@<?= $_SESSION['school'] ?></option>
                <?php }?>
                <option value="<?= $_SESSION['city'] ?>">@<?= $_SESSION['city'] ?></option>
             
            </select>
        
            </div>
            
           
                    
               
                
                    
            
        </div>
        
            <div>
                <button name='submit_Feed'>Post</button>
            </div>
            
        </div>
        
        </form>
        <div class="footer-about" id='info_App'>
          Send a FeedBack - Make A Roport
        </div> 
    
    </div>
    <div class="post-container" style='padding:8px;text-align:center'>
        <h1>Helloo <?= $_SESSION['name'] ?>! </h1>
    </div>
    <?php foreach($witter_reps as $post){ ?> 
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
    
    
    <?php } ?>

        </div>
        <?php
        include('../includes/script.php');
        include('../includes/leftbar.php') ;?>
    </div>
    <?php include('../includes/footer.php') ?>
</body>
</html>