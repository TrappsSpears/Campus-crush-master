<?php 
    $page = 'hotSeat';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
    <div class="nav">

<div>
      <h2>Hot Seat</h2>
 </div>

</div>
<div class="posts" id="search-conts">
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
        <button>Create Room</button>
        <form action="../classes_incs/posting.inc.php" method='Post' id='hotSeat_form'>
           <div class="img_hot">
           <label for="imageInput" class="custom-file-input">
        <span>Choose Image</span>
    </label>
           <input type="file" id="imageInput">
    <img id="imagePreview" src="#" alt="" style="max-width: 100%" accept="image/*">
           </div>
      
        <div  id ='hotSeat_header' >
            <div class='input_htSt'>
            <div>
                
                <input type="text" id="hostName" name="hostName" placeholder='Your Name'>
                  </div>
                  <div id='caption_div'>
                  
                    <textarea  name='post' placeholder='Your Story'  id='caption'></textarea>
                    <span id="remainingChars">300</span>
                    <div class="progress-container" id='prog_div'>
                    <div class="progress-bar" id="progressBar"></div>
                    </div>
                </div>
                <div>
                
                    <select name="location" id="location">
                    <option value="local">Local</option>
                    <option value="country">In Country</option>
                    <option value="global">Auto</option>
                </select>
                </div>
                
                
                
                <input type="hidden" name='user_id' value='<?= $user_id ?>'>
            </div>
            <div>
                <button name='submit'>Create</button>
            </div>
        </div>
        </form>
        <script>
            const postbtn =document.querySelector('.post_header');
       const textarea_Post = document.querySelector('#caption');
       const remainingCharsSpan = document.getElementById("remainingChars");
       const progressBar = document.getElementById("progressBar");
       const prog_div = document.getElementById("prog_div");
       const anoymousProfimg =document.querySelector('#anoymousProfimg');
       const maxLength = 300;
   // Get references to the input and image elements
   const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    // Add an event listener to the input element
    imageInput.addEventListener('change', function(event) {
        const selectedFile = event.target.files[0]; // Get the selected file
        
        if (selectedFile) {
            const reader = new FileReader(); // Create a FileReader object
            
            reader.onload = function(e) {
                imagePreview.src = e.target.result; // Set the source of the image to the selected file's data URL
            };
            
            reader.readAsDataURL(selectedFile); // Read the file as a data URL
        }
    });
    textarea_Post.addEventListener("input", function() {
            prog_div.style.display ='block';
            const currentLength = textarea_Post.value.length;
            const remainingChars = maxLength - currentLength;
            
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
  
        </script>
        <?php } ?>
    </div>


    


</div>
    </div>
    <?php   include('../includes/leftbar.php'); ?>
    </div>
  <?php 
  include('../includes/footer.php'); ?>
</body>
</html>
