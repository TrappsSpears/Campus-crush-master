<?php 

if(isset($_GET['post'])){
    $post_id = $_GET['post'];


$page = 'postSingle';
include('../includes/headall.php'); ?>

<body>  
    <div class="main">
    <?php include('../includes/sidebarnav.php'); ?>
    <div class="main-content">
        <div class="nav" id  style='padding-bottom:15px'>
            
            <h3><div class="back_btn">
            <button id="backButton"> <img src="../images/arrow.png" alt="Go Back" class='icons'> Post</button>
    </div></h3>
        </div>
<!-- The post will appear Here -->

<div id='posts'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadPosts() {
   var xhr = new XMLHttpRequest();
   xhr.open('GET','postsSingle.php?post_id=<?php echo $post_id ?>',true);

         
         // Insert the fetched content into the specified element

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('posts');
      leftbarContentElement.innerHTML = this.responseText;
    }else{
      alert('error')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadPosts();
</script>
  

<div class="post-container" id ='comments-container-mob'>
<div class="react-emojis" id="reacts" >
        <div>
            <form action="../classes_incs/liking.inc.php" method='post' id='myForm1'>
            <input type="hidden" name='post_id' value='<?= $post_id?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='like'>
            <button name='submit_like' type="button" id='submitButton1'><img src="../images/like.png" class='icons' alt="like"> </button>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm1");
    const submitButton = document.getElementById("submitButton1");
    const loadingBar = document.getElementById("loadingBarPost");
    submitButton.addEventListener("click", function () {
        loadingBar.style.display = "block";
        setTimeout(function(){
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 2000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../classes_incs/liking.inc.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.onload = function () {
                    if (xhr.status === 200) {
                        loadLike();
                        loadingBar.style.display = "none";
                linksInForm.style.pointerEvents = 'all';
            } else {
                loadingBar.style.display = "none";
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };
        xhr.send(formData);
    });

});
    </script>
            </form>
        </div>
        <div>
            <form action="../classes_incs/liking.inc.php" method='post' id='myForm2'>
            <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post_id?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='shocking'>
            <button name='submit_like' id="submitButton2" type='button'><img src="../images/shocking.png" class='icons' alt="like"> </button>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm2");
    const submitButton = document.getElementById("submitButton2");
    const loadingBar = document.getElementById("loadingBarPost");
    submitButton.addEventListener("click", function () {
        loadingBar.style.display = "block";
        setTimeout(function(){
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 2000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../classes_incs/liking.inc.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.onload = function () {
                    if (xhr.status === 200) {
                        loadLike();
                        loadingBar.style.display = "none";
                linksInForm.style.pointerEvents = 'all';
            } else {
                loadingBar.style.display = "none";
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };
        xhr.send(formData);
    });

});
    </script>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post' id='myForm3'>
        <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post_id?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='love'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like' id="submitButton3" type='button'><img src="../images/love.png" class='icons' alt="love"></button>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm3");
    const submitButton = document.getElementById("submitButton3");
    const loadingBar = document.getElementById("loadingBarPost");
    submitButton.addEventListener("click", function () {
        loadingBar.style.display = "block";
        setTimeout(function(){
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 2000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../classes_incs/liking.inc.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.onload = function () {
                    if (xhr.status === 200) {
                        loadLike();
                        loadingBar.style.display = "none";
                linksInForm.style.pointerEvents = 'all';
            } else {
                loadingBar.style.display = "none";
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };
        xhr.send(formData);
    });

});
    </script>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post' id='myForm4'>
        <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post_id ?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='funny'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like' id='submitButton4' type='button'><img src="../images/funny.png" class='icons' alt="funny"></button>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm4");
    const submitButton = document.getElementById("submitButton4");
    const loadingBar = document.getElementById("loadingBarPost");
    submitButton.addEventListener("click", function () {
        loadingBar.style.display = "block";
        setTimeout(function(){
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 2000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../classes_incs/liking.inc.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.onload = function () {
                    if (xhr.status === 200) {
                        loadLike();
                        loadingBar.style.display = "none";
                linksInForm.style.pointerEvents = 'all';
            } else {
                loadingBar.style.display = "none";
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };
        xhr.send(formData);
    });

});
    </script>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post' id='myForm5'>
        <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post_id?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='sad'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like' type='button' id='submitButton5'><img src="../images/sad.png" class='icons' alt="sad"></button>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm5");
    const submitButton = document.getElementById("submitButton5");
    const loadingBar = document.getElementById("loadingBarPost");
    submitButton.addEventListener("click", function () {
        loadingBar.style.display = "block";
        setTimeout(function(){
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 2000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../classes_incs/liking.inc.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.onload = function () {
                    if (xhr.status === 200) {
                        loadLike();
                        loadingBar.style.display = "none";
                linksInForm.style.pointerEvents = 'all';
            } else {
                loadingBar.style.display = "none";
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };
        xhr.send(formData);
    });

});
    </script>
            </form>
        </div>
        <div>
        <form action="../classes_incs/liking.inc.php" method='post' id='myForm6'>
        <input type="hidden" name="user_id"  value="<?= $user_id?>">
            <input type="hidden" name='post_id' value='<?= $post_id?>'>
            <input type="hidden" name="user_id" value='<?= $user_id ?>'>
            <input type="hidden" name="type" value='fire'>
            <input type="hidden" name="page" value='home'>
            <button name='submit_like' type='button' id='submitButton6'><img src="../images/fire.png" class='icons' alt="fire"></button>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm6");
    const submitButton = document.getElementById("submitButton6");
    const loadingBar = document.getElementById("loadingBarPost");
    submitButton.addEventListener("click", function () {
        loadingBar.style.display = "block";
        setTimeout(function(){
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 2000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../classes_incs/liking.inc.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.onload = function () {
                    if (xhr.status === 200) {
                        loadLike();
                        loadingBar.style.display = "none";
                linksInForm.style.pointerEvents = 'all';
            } else {
                loadingBar.style.display = "none";
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };
        xhr.send(formData);
    });

});
    </script>
            </form>
        </div>
    </div>

<div class="comment" style='height:fit-content'>

    <div>
    <div id='posts-like'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadLike() {
var xhr = new XMLHttpRequest();
xhr.open('GET','likink.php?p_id=<?php echo $post_id ?>',true);

   
   // Insert the fetched content into the specified element

xhr.onload =function(){
if(this.status==200){
var postsCom = document.getElementById('posts-like');
postsCom.innerHTML = this.responseText;
}else{
alert('error')
}
}
xhr.send();  
}

// Call the function to load the content when the page loads
loadLike();
</script>
  
    </div>
   
        <form action="../classes_incs/postcomments.php" method="post" class='form-comment' id='myForm'>
         <div class="comment_in" >
                <textarea placeholder="What are your Thoughts" class="textarea_reply" id="reply-textarea" name="comment" required  ></textarea> 
                     <input type="hidden" name = 'post_id' value="<?= $post_id?>">
                     <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                     <input type="hidden" name='page' value='<?= $page ?>'>
                 
                    <span id='remainingChars' style="position: absolute;margin-left:10px"></span>
                 
        </div>
        <script>
                   const textarea_Reply = document.querySelector('#reply-textarea');
       const remainingCharsSpan = document.getElementById("remainingChars");

       const maxLength = 300;

       textarea_Reply.addEventListener("input", function() {
            const currentLength = textarea_Post.value.length;
            const remainingChars = maxLength - currentLength;
           
            if (remainingChars >= 0) {
               
                remainingCharsSpan.textContent = remainingChars;
          
            } else {
                // If the text exceeds the limit, truncate the text
                textarea_Reply.value = textarea_Reply.value.substring(0, maxLength);
                remainingCharsSpan.textContent = 0;
            } });
        </script>
                <div class="comOpt">
                <div id="emojiContainer">
        <span id="emojiButton"><img src="../images/smile.png" alt="" class='icons' style='width:20px'></span>
        <div id="emojiMenu">
            <!-- Emoji buttons will be added dynamically using JavaScript -->
        </div>
    </div>
    <div>
            <select name="type" >
                <option value='public'>Public</option>
                 <option value='private'>Private</option>
            </select>
            <div>
               <small>Private- To Message the poster</small> 
            </div>
            
             </div>   
             
            <button name='submit_comment' type='button' id='submitButton'>Post</button>
        
       </div>
    
        
        </form>
        <div id="loadingBarPost">
     </div>

<!-- Response message container -->
<div id="responseMessage"></div>
      <script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm");
    const submitButton = document.getElementById("submitButton");
    const loadingBar = document.getElementById("loadingBarPost");
    const linksInForm = document.querySelector("a");
    const postChoice = document.getElementById("reply-textarea");
    

    submitButton.addEventListener("click", function () {
        // Hide the form and show the loading bar
  
        if (postChoice.value.trim() === "" ) {
            alert("Textarea and/or file input cannot be empty.");
            return; // Prevent form submission if validation fails
        }
        
        loadingBar.style.display = "block";
        setTimeout(function(){
          profileImage.style.display = 'none';
          loadingBar.style.display = "none";
        } , 2000);
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
  
        xhr.open("POST", "../classes_incs/postcomments.php", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

        xhr.onload = function () {
                    if (xhr.status === 200) {
         
                        loadingBar.style.display = "none";
                // Show the form again and hide the loading bar
                loadComms();
                linksInForm.style.pointerEvents = 'all';
                // Reset the form if needed
                form.reset();
            } else {
                loadingBar.style.display = "none";
                // Handle other HTTP status codes or errors here
                responseMessage.textContent = "An error occurred.";
                responseMessage.style.color = "red";
            }
        };

        xhr.send(formData);
        
    });
});


    </script>
    </div>
    <div class="reply-container">
      
      <h3>Comments <small></small></h3>
      <div id='posts-com'>

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadComms() {
var xhr = new XMLHttpRequest();
xhr.open('GET','comments.php?p_id=<?php echo $post_id ?>',true);

   
   // Insert the fetched content into the specified element

xhr.onload =function(){
if(this.status==200){
var postsCom = document.getElementById('posts-com');
postsCom.innerHTML = this.responseText;
}else{
alert('error')
}
}
xhr.send();  
}

// Call the function to load the content when the page loads
loadComms();
</script>
  </div>
</div>

    </div>

    <?php include('../includes/lefty.php'); ?>
 
    </div>
    <script src="./Js/script.js"></script>
    <?php include('../includes/footer.php') ?>
    <script>
        // Add a click event listener to the back button
        document.getElementById("backButton").addEventListener("click", function() {
            // Use the history object's back() method to navigate to the previous page
            history.back();
        });
    </script>
    <script>
    // when user wanna post somthing

    const commentDiv = document.querySelector('.post-container');
    const textarea_reply = document.querySelector('#reply-textarea');
    textarea_reply.addEventListener('input', function() {
  textarea_reply.style.height = '35px';
  textarea_reply.style.height = textarea_reply.scrollHeight + 'px';
  commentDiv.style.height = 'auto';
});

const react =document.querySelector('.react');
  const react_emojis=document.querySelector('.react-emojis');
  react.addEventListener('click', () => {
    react_emojis.classList.toggle('react-emojis-active');
  })
 

  const head_dots =document.querySelector('.head-dots');
  const head_menu =document.querySelector('.head-menu');
  head_dots.addEventListener('click',() =>{
    head_menu.style.display = head_menu.style.display === 'block' ? 'none' : 'block';
  })
  const textarea_Post = document.querySelector('#reply-textarea');
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
<script>
        // Add a click event listener to the back button
        document.getElementById("backButton").addEventListener("click", function() {
            // Use the history object's back() method to navigate to the previous page
            history.back();
        });
    </script>
</body>
</html>
<?php } ?>