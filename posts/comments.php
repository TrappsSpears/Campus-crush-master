
<?php if(isset($_GET['p_id'])){ 
    $p_id = $_GET['p_id'];
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
    include_once('../classes_incs/dbh.class.php');
    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
      $userCity = $_SESSION['city'];
      $userSchool = $_SESSION['school'];
      $userCountry = $_SESSION['country'];
      $userDOB = $_SESSION['dob']; 
      $userID = $user_id; 
      $userName = $_SESSION['username'];  
    }
    $dbh = New Dbh();
    
##-------------------Posts Comments --------------------------------------##
$selectComment = $dbh->connect()->prepare("SELECT profile_pic as profile_pic ,name as name ,username as username , comment as comment , user_id  as user_id , comments.id as id ,type as type , school as school 
 FROM comments JOIN users ON users.id=comments.user_id WHERE post_id = ?  ORDER BY date_created DESC");
if(!$selectComment->execute(array($p_id))){
    echo 'Failed To Load Posts';
}else{
    $post_comment = $selectComment->fetchAll(PDO::FETCH_ASSOC);
}
#//-------------------------------------------------------------------\\##

$selectUserLiked = $dbh->connect()->prepare("SELECT likes.type as type, likes.user_id as user_id FROM likes JOIN users on likes.user_id = users.id WHERE likes.post_id = ?");
if(!$selectUserLiked ->execute(array($p_id))){
    echo 'Failed To Load Posts';
}else{
    $liketypee = $selectUserLiked->fetchAll(PDO::FETCH_ASSOC);
}

       
        foreach($post_comment as $comment){ 
            $com_id =$comment['id'];
            $dbh = New Dbh();

##-------------------Replys for comments--------------------------------------##
$selectReply = $dbh->connect()->prepare('SELECT username, reply ,emoji, profile_pic FROM reply JOIN users ON users.id=reply.user_id WHERE com_id = ? ');
if(!$selectReply ->execute(array($com_id))){
    echo 'Failed To Load Posts';
}else{
    $reply = $selectReply->fetchAll(PDO::FETCH_ASSOC);
}
$selectPostIDUSER = $dbh->connect()->prepare('SELECT user_id, post_id FROM posts WHERE post_id = ? ');
if(!$selectPostIDUSER ->execute(array($p_id))){
    echo 'Failed To Load Posts';
}else{
    $userPost_id = $selectPostIDUSER->fetch(PDO::FETCH_ASSOC);
    if($userPost_id!==false){
        $posterId=$userPost_id;
    }else{
        $posterId= null
        ;
    }
}

            ?> 
            <?php if($comment['type']=='private'){ if($comment['user_id'] == $user_id || $posterId['user_id']==$user_id){ ?>
                <div class="post-container">
                <div class="post-head">
                    <div class="heading-post">
                    <a href="../location/location.php?user=<?=$comment['username']?>">">
                 <div class="post-heading-container">
                <div class='post-heading'>
                
                    <img src="../images/users/<?= $comment['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $comment['username'] ?></span></b> <span id='name'>  <?= $comment['name'] ?></span> 
                        </div>   
                    </div>   
                </div>
                </div></a>
                    </div>
                    </div>
                    <div class="comments_posts" style="border-left: 2px solid green;">
             
                <div class="comment-post"> <p id='type_com'> </small></p>
                   <p> <?= $comment['comment'] ?></p>
                    <div>
                        <small>@ <?php if($user_id == $comment['user_id']){ ?> You <?php } ?>.<span><?= $comment['school'] ?></span> </small>
                    </div>
                </div>
                   
               
                
         
            </div>
            <?php 
                foreach($reply as $reply){ 
                    if($reply['reply'] != ''){?>

            <div class="replys">
                       <p><?=$reply['reply'] ?></p>  
                       <div>
                        <small>@<?= $reply['username'] ?></small>
                       </div>                       
            </div>
                        <?php } ?>
                      
            <?php } ?>
            
            <div class="reply_com">
              
               
                    
              <form action="../classes_incs/postReply.inc.php" method='Post'>
                 
                  <div class="replyform">
                  <input type="hidden" name='emoji' value=''>
                  
                  <input type="hidden" name='post_id' value='<?= $posterId['post_id'] ?>'>
                      <input type="hidden" name="user_id"  value="<?= $user_id?>">
                      <input type="hidden" name='com_id' value='<?= $comment['id']?>'>
                          <textarea name="reply" id="reply_input" placeholder="reply"></textarea>
                          <button type='submit' name='submit_reply'><img src="../images/reply.png" alt="reply" class='icons'></button>
                      </div>
              </form>
                      
                  
          </div>
                </div>
            
            <?php }else{ ?> 
                <div class="comments_posts" id="pvt_com">
                <div class="comment-post">
                this comment is private
             </div></div>
            <?php }}else{ ?> 
                <div class="post-container">
                <div class="post-head">
                    <div class="heading-post">
                    <a href="../location/location.php?user=<?=$comment['name'] ?>">
                 <div class="post-heading-container">
                <div class='post-heading'>
       
                    <img src="../images/users/<?= $comment['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
           
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $comment['username'] ?></span></b> <span id='name'>  <?= $comment['name'] ?></span> 
                        </div>   
                    </div>   
                </div>
                </div></a>
</div>
                    </div>
                <div class="comments_posts">
             
             <div class="comment-post"> <p id='type_com'> <small style='color:#880281'><?= $comment['type'] ?></small></p>
                <p> <?= $comment['comment'] ?></p>
                 <div>
                     <small>@
                     <?php if($user_id == $comment['user_id']){ ?> You <?php }else{ echo $comment['username'];} ?> 
                     .<span><?= $comment['school'] ?></span> </small>
                 </div>
             </div>      
         </div>
         <?php 
                foreach($reply as $reply){ 
                    if($reply['reply'] != ''){?>

            <div class="replys">
                <div>
                    <img src="../images/users/<?=$reply['profile_pic'] ?>" class="icons" alt="" id='profile_pic'>
                </div>
                        
                       <div>
                        <div>
                        <small>@<?= $reply['username'] ?></small>
                       </div> 
                            <p><?=$reply['reply'] ?></p>  
                       
                        </div>
                                             
            </div>
                        <?php }elseif($reply['emoji']!=''){ ?> 
                            <div class="emoji_cont">
                                
                               <img src="../images/<?= $reply['emoji'] ?>.png" alt="<?= $reply['emoji'] ?>" class='icons'> <small>@<?= $reply['username'] ?></small>
                            </div>

                            <?php } ?>
                      
            <?php } ?>
         <div class="reply_com">
              
               
                    
              <form action="../classes_incs/postReply.inc.php" method='Post'>
                 
                  <div class="replyform">
                  <input type="hidden" name='emoji' value=''>
                  
                  <input type="hidden" name='post_id' value='<?= $posterId['post_id'] ?>'>
                      <input type="hidden" name="user_id"  value="<?= $user_id?>">
                      <input type="hidden" name='com_id' value='<?= $comment['id']?>'>
                          <textarea name="reply" id="reply_input" placeholder="reply"></textarea>
                          <button type='submit' name='submit_reply'><img src="../images/reply.png" alt="reply" class='icons'></button>
                      </div>
              </form>
                      
                  
          </div>  
                </div>
                
                <?php } ?>
        
           
            <div class="divider">
                
               </div>
        <?php } }?>