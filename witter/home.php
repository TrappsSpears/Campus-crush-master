<?php 
$page = '';
$pagee = 'home';
include_once('../includes/headall.php');
include('witter.incs.php');
?>

<body>
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
        <div class="main-content">
        <?php include('nav.php') ?> 
        <div class="con_form">
      
         

       
        <form action="../classes_incs/reportsFeeds.php" method='Post' enctype="multipart/form-data">
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
                  <select id="themeSelect" name="type">
           <option value="Feed back"> Feed Back</option>
           <option value="Report">Report</option>
           
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
        <?php if(isset($_GET['succeeded'])){ ?>
            <p>Your FeedBack has been sumbitted , We really appreciate. We will try our best to meet your requirements</p>
            <?php } ?>
    </div>
        <div class="post-container">
        <div class="post-head">
        <div class="heading-post">
    <div class="post-heading-container">
        <div class="heading-post">
            <div class='post-heading'>
                <img src="../images/witterlogo.png" alt="" class="icons" id='profile_pic'> 

                      
                
                </div>

        </div>
    </div>
    </div>
    </div>
            <div class="post-box">
                <div class="post_b" id='data_witt'>
                <p><h2>Founder - Tapuwa mapfumo</h2>
            <h2>Users - <?= $witter_dat['total_users'] ?></h2>
            <h2>Places - <?= $witter_dat['Totalplaces'] ?></h2>   </p>
          
                </div>
             
            </div>
          

        </div>

        <div class="post-container" >
    <div class="post-head">
        <div class="heading-post">
    <div class="post-heading-container">
        <div class="heading-post">
            <div class='post-heading'>
                <img src="../images/witterlogo.png" alt="" class="icons" id='profile_pic'> 

                      
                
                </div>

        </div>
    </div>
    </div>
    </div>
<div class="post-box">
    <div class="post_b" style="line-height: 1.6;">    
    <div id="post-bAllP" style='margin-top:20px;min-height:500px'>

   <h1> About Witter </h1>
   <div class="img_post">
        <img src="../images/users/noProf.jpeg" alt="Witer">
    </div>
Welcome to Witter, a unique digital platform designed for open and anonymous sharing of thoughts, experiences, and stories. We understand the power of sharing and the importance of being heard, which is why we've created a space that encourages open conversations.

Witter goes beyond being just a collection of posts; it's a community bound by authenticity and empathy. We believe that by sharing your confessions, you contribute to the tapestry of human experiences and connect with others who have walked similar paths.

Your Community, Your Confessions
One of the distinctive features of Witter is our innovative algorithm that ensures your confessions reach people within your provided school or university and town/city. This localization adds a layer of relevance that enhances the depth of interactions. Sharing experiences with those who understand your local context can be profoundly impactful.

<h2>Advantages of Localized Confessions:</h2> 

Forge connections with individuals in your immediate community.
Engage in discussions that resonate with your local surroundings.
Build a sense of unity and belonging within your school or town.
Anonymity and Empowerment
We recognize that not all confessions are easy to share openly. That's why we offer the option to post anonymously. Whether you're unveiling a personal story, seeking advice, or sharing a question that's been on your mind, you have the freedom to do so without revealing your identity.

Your anonymity is our priority. We are committed to providing a safe and judgment-free space where you can express yourself openly without fear. This anonymity empowers you to discuss your thoughts, emotions, and experiences without hesitation. 
</div>
 <div>
              
       <span class='span-loc'><a href="../Trends/trends.php?location=<?= $_SESSION['city'] ?>">     
       <?= $_SESSION['school'] ?></a> ,<a href="../Trends/trends.php?location=<?= $_SESSION['city'] ?>"><?= $_SESSION['city'] ?></a>
       </span>
                        
    </div>
    </div>
    
   

</div>
</div>
<div class="post-container" >
    <div class="post-head">
        <div class="heading-post">
    <div class="post-heading-container">
        <div class="heading-post">
            <div class='post-heading'>
                <img src="../images/witterlogo.png" alt="" class="icons" id='profile_pic'> 

                      
                
                </div>

        </div>
    </div>
    </div>
    </div>
<div class="post-box">
    <div class="post_b" style="line-height: 1.6;">    
    <div id="post-bAllP" style='margin-top:20px;min-height:500px'>
   <h2>Privacy Policy</h2> 
   <div class="img_post">
        <img src="../images/W.png" alt="Witer">
    </div>
At ConfessConnect Platform, we value your privacy and are committed to protecting your personal information. This Privacy Policy outlines how we collect, use, disclose, and safeguard your data. By using our ConfessConnect, you consent to the practices described in this policy.

<h3>Information Collection and Use</h3> 
Personal Information: We may collect personal information, such as your name, email address, location, and other identifying data when you register or use our Platform. This information is used to provide you with a personalized experience and to communicate with you regarding our services, promotions, and updates. Non-Personal Information: We may also collect non-personal information, such as device information, browser type, and usage data. This data helps us understand how users interact with our platform and improve our services.

<h3>Data Security</h3> 
We employ industry-standard security measures to protect your personal information from unauthorized access, alteration, or disclosure. Despite these efforts, no method of transmission over the internet or electronic storage is entirely secure, and we cannot guarantee absolute security.

<h3>  Information Sharing  </h3> 
We do not sell, trade, or rent your personal information to third parties. However, we may share your information with trusted service providers who assist us in operating our platform and delivering services to you. We may disclose your information in response to legal requests, enforce our policies, or protect our rights, property, or safety.

<h3> Cookies and Tracking Technologies</h3> 
This App may use cookies and similar tracking technologies to enhance user experience and collect usage information. You can manage your cookie preferences through your browser settings.

<h3>Third-Party Links</h3> 
Our platform may contain links to third-party websites or services. We are not responsible for the privacy practices or content of these third parties. We encourage you to review their respective privacy policies.

 <h3>Children's Privacy</h3>
This App is not intended for use by individuals under the age of 13. We do not knowingly collect personal information from minors. If you believe a child has provided us with their data without parental consent, please contact us to remove the information.
 <h3>
Changes to the Privacy Policy</h3>
We may update this Privacy Policy from time to time to reflect changes in our practices or for legal, operational, or regulatory reasons. Any significant changes will be communicated to you via email or prominent notice on our platform. 
</div>
 <div>
              
       <span class='span-loc'><a href="../Trends/trends.php?location=<?= $_SESSION['city'] ?>">     
       <?= $_SESSION['school'] ?></a> ,<a href="../Trends/trends.php?location=<?= $_SESSION['city'] ?>"><?= $_SESSION['city'] ?></a>
       </span>
                        
    </div>
    </div>
    
   

</div>
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
            <p class="reported">
            <?= $post['post_body'] ?> 
            </p>
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