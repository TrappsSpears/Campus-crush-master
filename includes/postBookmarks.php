<div class="posts">
    <div class="con_form">
    <div class="post_head">
            <div class="select-post-type">
                <p id="C_con">
                  
                  Your saved Posts
                </p>
            </div>    
        </div>
    </div>
   
 
    <?php 
    include_once('../classes_incs/functionsposts.php');
        
    foreach($posts as $post){ 
        $idUnique = $post['post_id'];
        $post_date = $post['date_created'];
        $formattedDate = format_post_date($post_date);
        include_once('../includes/posts.php'); }
    
        ?>

</div>
<script>
    
    
</script>