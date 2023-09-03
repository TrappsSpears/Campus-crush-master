<div class="post-container">
        <div class="post-head">
            <div class="heading-post">
                <?php if($post['anonymous'] == 'yes'){ ?>
                    <div class="post-heading-container">
                  <div class='post-heading'>
                       <img src="../images/noProf.jpeg" alt="anonymouse" class="noProf"  id='profile_pic'>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'>Hidey</span></b> <span id='name'>_Anonymouse</span> 
                        </div>
                        <div>
                          <span><small id='date'><?= $formattedDate ?></small><small> at <?= $post['time'] ?></small> </span>
                      </div>     
                    </div>   
                
                </div>       
                    </div>
             
            <?php }else { ?> 
                <a href="../Trends/trends.php?word=<?= $post['username'] ?>">
                <div class="post-heading-container">
                <div class='post-heading'>
                <?php if($user['profile_pic']!=''){ ?> 
                    <img src="../images/users/<?= $post['profile_pic'] ?>" alt="" class="icons" id='profile_pic'>
                    <?php } else{ ?> 
                        <img src="../images/noProf.jpeg" alt="profile" class="icons"  id='profile_pic'>
                        <?php } ?>
                       <div id='post_info'>
                        <div>
                             <b> <span id='username'><?= $post['username'] ?></span></b> <span id='name'> - <?= $post['name'] ?></span> 
                        </div>
                        <div>
                          <span><small id='date'><?= $formattedDate ?></small><small> . <?= $post['time'] ?></small> </span>
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
    <div>
 
       
              <span class='span-loc'><a href="../Trends/trends.php?word=<?= $post['location'] ?>">     
                     <img src="../images/placeholder.png" alt="" class='icons' style='width:20px;position:relative;top:5px'> <?= $post['location'] ?>
                 </a> </span>
             <a href="../Trends/trends.php?word=<?= $post['theme'] ?>">   <span class='theme_span'><?= $post['theme'] ?></span></a>
                        
                 </div>
        </div>
        

    </a>
    <?php if($page == 'profile'){ ?>
    <div class="engage_btn">
        <form action="../classes_incs/deletepost.inc.php" method="post">
            <input type="hidden" value="<?=$post['post_id']?>" name='post_id'>
            <button name='submit'> <small>X</small>Delete</button>
        </form>
    </div>
    <?php } ?>
    <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
    <div class="post_insights">
            <span class='thot'>    <span id='comment'><img src="../images/comment.png" alt=""><small><?= $post['comment_count']?> Comments</small></span>
                
                    <span id='reaction_emoj' >
                        <img src="../images/happiness.png" alt="">
                <img src="../images/<?= $post['type'];?>.png" alt="<?= $post['type'] ?>" class='icons'>  
               <small> 
                <?= $post['like_count']; ?> Reactions</small></span>
            
              </span>
                 </div>       
       
        </a>
</div>

       <div class='head_post_el'>
        
                <?php   
                $sql ="SELECT p.post_id, l.type, COUNT(*) AS like_count
                FROM posts p
                JOIN likes l ON p.post_id = l.post_id
                WHERE p.post_id = ? -- Replace 'specific_type' with the actual type you're interested in
                GROUP BY p.post_id, l.type
                ORDER BY like_count DESC
                LIMIT 1";
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
                ?><?php if($typeLikee !== null && $typeLikee['post_id']===$post['post_id']){ ?> 
               <a href="../Trends/trends.php?reaction=<?= $typeLikee['type']?>"> <span><img src="../images/<?= $typeLikee['type']?>.png" alt="<?= $typeLikee['type']?>"> </span></a><?php } ?>
        </div>
    </div>