<div class="posts">
    <?php 
        foreach($post_msg as $msg){ 
            $post_id =$msg['post_id'];
            include('phpfiles.msgs.php');
            ?> 
            <div class="msg-box">
               <div class="msg-body">
               <p><?= $msg['post']?></p> <p class='msg_username'>@Post</p>
               </div>
        <div class="msg">
            
            <div class="user-p">
                <div class="icon">
                    <img src="../images/user.png" alt="userProf" class='icons'>
                   
                </div>
            </div>
            <div class="msg-body">
                <div>
                    <p><?= $msg['comment']?></p> <p class='msg_username'>@<?= $msg['username']?></p>
                </div>
               
            </div>
        </div>
        <?php 
                $selectRep = $dbh->connect()->prepare("SELECT post_id FROM reply where post_id = ? ");
                if(!$selectRep->execute(array($post_id))){
                   echo 'Failed To Load Posts';
                }else{
                   $replyPost = $selectRep->fetch(PDO::FETCH_ASSOC);
                }
                if(!is_array($replyPost) && empty($replyPost['post_id'])) { 
                if($msg['poster_id'] == $user_id){ ?>

                
            <div class="reply-box">
            <div>
                <label for="reply"><small> Share chat link..whatsapp / Facebook / Insta / Telegram etc</small></label>
                
            </div>
            
                <form action="../classes_incs/postReply.inc.php" method='post'>
                <div>
                        <input type="hidden" name="type" value='pvt'>
                        <input type="text" name='reply' placeholder="Link..">
                        <input type="hidden" name='post_id' value='<?= $msg['post_id'] ?>'>
                        <input type="hidden" name='user_id' value='<?= $user_id ?>'>
                        <input type="hidden" name='page' value='<?= $page ?>'>
                        <button type='submit' name='submit_reply'>Send</button>  
                </div>
            </form>
                
            
        </div>    
              <?php } else{?>
                <div class="reply-box">
                    <div>
                        <label for="reply"> <small>Waiting For Responce</small> </label>
                    </div>
                </div>
                <?php } ?>

        <?php }else{ ?>
        <div class="msg-body">
            <?php foreach($post_reply as $reply){ ?>
               <p> <?= $reply['reply']?></p><p class='msg_username'>Responce</p>
          <?php }?>
        </div>
       <?php } ?>
        
    </div>
     <?php } ?>
</div>