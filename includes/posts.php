<?php if($post['post_id']!= ''){ ?> 
<div class="post-container">
        <div class="post-head">
            <div class="heading-post">
            <?php if($post['anonymous'] == 'yes'){  if($post['theme'] != 'Message'){ ?>
        <a href="../location/location.php?place=<?=$post['location'] ?>">
        <?php } else { ?>
            <a href="#"></a>
           <?php } ?>
                    <a href="../location/location.php?place=<?= $post['location'] ?>">
                    <div class="post-heading-container">
                  <div class='post-heading' id='anymous_' style = ' filter: hue-rotate(<?= $rand?>deg);
'>
                       <img src="../images/W.png" alt="anonymouse" class="anymous_prof"   id='profile_pic'>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'> <?= $post['theme'] ?> </span></b><span id='name'>@hideMe<small> . </small>  <?= $formattedDate ?>
                            </span>
                        </div>
       
                    </div>   
                
                </div>       
                    </div>
                    </a>
            <?php }else { ?> 
                <a href="../location/location.php?user=<?= $post['username'] ?>">
                <div class="post-heading-container">
                <div class='post-heading'>
                <?php if($post['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="profile" class="icons"  id='profile_pic'>
                        <?php } ?>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> <span id='name'> <b> <?= $post['name'] ?></b><small> . </small>  <?= $formattedDate ?>
                             <?php if($post['country'] != $user['country']) { echo $post['country'];} ?>
                            </span>
                        </div>
                 
                    </div>   
                </div>
                </div></a>
                <?php } ?>   
                
                  
        </div>
            <div class="head-dots" id = 'head-dots<?php echo $idUnique;?>'>
                <div>
                  <img src="../images/menu.png" alt="..." class="icons">
                </div>
                
            </div>
        </div>
    <div class="post-box">
        <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
        <div class="post_b">    
    <p id='post-bAllP'>   <?= formatPostContent($post['post_body']) ?></p>
    <div class="img_post">
        <img src="../images/imagePosts/<?= $post['post_pic'] ?>" alt="">
    </div>
    <div class='head_post_el'>
        
        <?php   
        $selectComment = $dbh->connect()->prepare('SELECT comments.post_id,school, profile_pic as profile_pic ,name as name ,username as username , comment as comment , user_id  as user_id , comments.id as id ,type as type , school as school 
        FROM comments JOIN users ON users.id=comments.user_id WHERE post_id = ?   ORDER BY comments.id DESC');
       if(!$selectComment->execute(array($post['post_id']))){
           echo 'Failed To Load Posts';
       }else{
            if($selectComment->rowCount() > 0){
                 $comment = $selectComment->fetch(PDO::FETCH_ASSOC);
            }else{
                $comment = null;
            }
          
       }
        $sql ='SELECT p.post_id, l.type, COUNT(*) AS like_count
        FROM posts p
        JOIN likes l ON p.post_id = l.post_id
        WHERE p.post_id = ? 
        GROUP BY p.post_id, l.type
        ORDER BY like_count DESC
        LIMIT 1';
        $typeResult = $dbh->connect()->prepare($sql);
        
        if(!$typeResult->execute(array($post['post_id']))){
            $typeResult = null;
        }else{
            $typeLike = $typeResult->fetch(PDO::FETCH_ASSOC);
            if($typeLike!==false){
                $typeLikee=$typeLike;
            }else{
                $typeLikee= null;
            }
        }
        if($comment != null && $comment['post_id'] === $post['post_id'] && $comment['type'] == 'public'){ 
        ?>
        <div style="margin-left:35px;margin-top:-25px">
         <div class="post-head" >
            <div class="heading-post">
            <a href="../location/location.php?user=<?=$post['username'] ?>">
         <div class="post-heading-container">
        <div class='post-heading'>
            <img src="../images/users/<?= $comment['profile_pic'] ?>" alt=""  id='profile_pic'>
 
               <div id='post_info'>
                <div>
                     <b> <span id='username'><?= $comment['username'] ?></span></b> <span id='name'> <b><?= $comment['name'] ?></b>
                    <?php if($comment['school'] != $post['school']){ echo $comment['school'] ;} ?>
                    </span> 
                </div>   
            </div>   
        </div>
        </div></a>
            </div>
            </div>
            <div class="comments_posts" >
     
     <div class="comment-post"> <p id='type_com'> </small></p>
        <p> <?= $comment['comment'] ?></p>
         <div>
             <small>@ <?php if($user_id == $comment['user_id']){ ?> You <?php } ?>.<span><?= $comment['school'] ?></span> </small>
         </div>
     </div>
            </div>
 </div>
        <?php } if($typeLikee !== null && $typeLikee['post_id']===$post['post_id']){ ?> 
       <a href="../Trends/trends.php?reaction=<?= $typeLikee['type']?>"> <span><img src="../images/<?= $typeLikee['type']?>.png" alt="<?= $typeLikee['type']?>" class='icons'> </span></a><?php } ?>
</div>
    <div class="locInfo">
 
       
              <span class='span-loc'><img src="../images/map-pin.png" alt="king" class="icons" style='width:12px'>    <?php   if($post['theme'] != 'Message'){ ?>
        <a href="../location/location.php?place=<?=$post['location'] ?>">
        <?php } else { ?>
            <a href="../location/location.php?user=<?=$post['location'] ?>"> 
           <?php } ?>   
                     <?= $post['location'] ?>     <?php if($post['country'] != $user['country']) { echo $post['country'];} ?>
                 </a> </span>
             <a href="../location/location.php?theme=<?= $post['theme'] ?>">   <span class='theme_span'>#<?= $post['theme'] ?></span></a>
                        
                 </div>
        </div>
        

    </a>
    <?php if($page == 'profile' && $post['user_id'] == $user_id){ ?>
    <div class="engage_btn">
        <form action="../classes_incs/deletepost.inc.php" method="post">
            <input type="hidden" value="<?=$post['post_id']?>" name='post_id'>
            <button name='submit'> <small>X</small>Delete</button>
        </form>
    </div>
    <?php } ?>
    <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
    <div class="post_insights">
            <span class='thot'>  
                    <span id='reaction_emoj'>
                <img src="../images/<?= $post['type'];?>.png" alt="<?= $post['type'] ?>" class='icons'>  
                <img src="../images/heart.png" alt="" class='icons' style='width:20px;position:relative;top:7px' >
               <small> 
                <?= $post['like_count']; ?> Reactions</small></span>
              <span id='comment'><img src="../images/comment2.png" alt=""><small><?= $post['comment_count']?> Comments</small></span>
                
            
              </span>
                 </div>          
       
        </a>
   
</div>


      
       
    </div>
    <?php } ?>