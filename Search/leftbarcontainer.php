<div class="leftbar-container">
        <?php foreach($postsTrends as $post){ ?> 
            <div class="trends">
                <div class="trendItms">
                 <a href="../posts/posts.php?post=<?= $post['post_id'] ?>">
        <div class="post_b">    
    <p id='post-bAllP' style= 'padding:25px;max-height:200px;line-height:1.6'>   <?= formatPostContent($post['post_body']) ?></p>
   
    <div style="padding: 12px;color:gray;font-size:14px">
 
       
              <span class='span-loc'><a href="../Trends/trends.php?word=<?= $post['location'] ?>">     
                     <img src="../images/placeholder.png" alt="" class='icons' style='width:20px;position:relative;top:5px'> <?= $post['location'] ?>
                 </a> </span>
             <a href="../Trends/trends.php?word=<?= $post['theme'] ?>">   <span class='theme_span'>#<?= $post['theme'] ?></span></a>
                        <span><small> <i>Reactions <?= $post['like_count'] ?></i>  <i>Comments <?= $post['comment_count'] ?></i></small>  </span>
                 </div>
        </div> </a>
                </div>
            </div>
        
        <?php } ?>
    </div>