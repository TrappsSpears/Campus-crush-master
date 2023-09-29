<?php 
    $page = 'groups';
    $pagee = 'homeGees';
include('../includes/headall.php'); 

if(isset($_GET['place'])){
$getname = $_GET['place'];?>
<body>  
  
    <div class="main">
    <?php include('../includes/sidebarnav.php');
    include('../location/location.incs.php') ?>
    <div class="main-content">
    <div class="nav" id="navOther">
    <h2><div class="back_btn" >
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> <?=$getname ?> Groups
</button>
    </div></h2>


</div>
<?php if($getname){ ?> 

    <?php include('skuldat.php'); ?>
<div class="create_theme">
    <button id='create_theme'> + Create A Theme</button>
</div>
<div class="con_form" id="theme_form_create">
      
         

       
        <form action="../classes_incs/createTheme.inc.php" method='Post' enctype="multipart/form-data" id='myForm'>
        <div class='input_img'>
            <div class='userImg'>
                <?php if($_SESSION['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $_SESSION['profile_pic'] ?>" alt="">
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="" class="noProf" style="filter: invert(100%);border:none">
                        <?php } ?>
               
            </div>
            
            <div>  
               <textarea id="post_choice"  placeholder="  Caption..." name="description" required minlength="2" maxlength="100"></textarea> 
               <input type="text" placeholder="Theme ..." name='themeName' id='theme_input' minlength="2" maxlength="20"> 
               <div class="custom-select">
                
        <input type="button" class='cancel_post' value='Cancel' style='display:none'>
         
      
     
                  </div> 
            
            </div>
               
            
        </div>
     
    <div class="uploaded_img" id="upload_cover">

        <img src="" alt="" id='post-image'>
    </div>
   
        <div class='post_header'>
        
        
           <div style='display:flex; gap:10px'>
            <div>
            <select name="location" id="location" required>
              <option value="<?= $_SESSION['school'] ?>"><?= $_SESSION['school'] ?></option>
              <option value="<?= $_SESSION['city'] ?>"><?= $_SESSION['city'] ?></option>
            </select>
        
                </div>
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                    <label for="upload_profile_pic" id='label_upload'> <img src="../images/gallery.png" alt="" class='icons'></label>
                    <input type="file" name='post_pic' id='upload_profile_pic' accept="image/*" required>
                
                
               
                
                    <div class='switch'>
                       
                    
            <div>
                <div>
                   <label class="toggle-switch">
                <input type="checkbox" name="show_profile" value="yes">
                <span class="slider"></span> 
                </div>
               
              
            </label> 
            <div class="small">
                <small>Hide_Identity</small>
            </div>
            </div> 
                    </div>
            
        </div>
        
            <div>
                <button name='submit' id='create' >Create</button>
            </div>
            
        </div>
        
        </form>
       
        <div class="footer-about" id='info_App'>
          Create Hot #Themes and Engage with Your Community Friends From Your Theme- Add A Cover Photo 
        </div> 

    </div>


    <div id='posts' >

</div>
<script>
    var create_theme_btn =document.getElementById('create_theme');
    var theme_form =document.getElementById('theme_form_create');
    create_theme_btn.addEventListener('click' , ()=>{
        if(theme_form.style.display='none'){
            theme_form.style.display='block';
            create_theme_btn.textContent ='- Cancel';
            create_theme_btn.style.color ='brown';
        }
    })

// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('GET','location.incs.php?themeH=<?php echo $getname ?>',true);

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('posts');
      leftbarContentElement.innerHTML = this.response;
    }else{
      alert('error Loading postMessage')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadPosts();
</script>

                <?php } else{?>

<h2> Does Not Exist</h2>
 <?php  } ?>
    </div>
    <?php   include('../includes/lefty.php'); ?>

</div>
<?php include('../includes/footer.php') ;
include('../includes/script.php');
?>

  ?>
</body>
</html>
<?php } ?>