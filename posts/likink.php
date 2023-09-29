<?php if(isset($_GET['p_id'])){ 
              $post_id = $_GET['p_id'];
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

            $sql = "SELECT COUNT(*) as total FROM likes WHERE  post_id = ?;";
            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($post_id))){
                $result = null;
            }else{
                $totalLikes = $result->fetch(PDO::FETCH_ASSOC); }
            $sql = "SELECT COUNT(*) as total FROM likes WHERE user_id = ? AND post_id = ?;";

            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array($user_id,$post_id))){
                $result = null;
            }else{
                $results = $result->fetch(PDO::FETCH_ASSOC);
                if(!$results['total'] == 0) { 
                    $sql = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?;";
                    $resultlike = $dbh->connect()->prepare($sql);
                    if(!$resultlike->execute(array($user_id,$post_id))){
                        $resultlike = null;
                    }else{
                        $resultsall = $resultlike->fetch(PDO::FETCH_ASSOC); 
                       }
                       $sql = "SELECT COUNT(*) as total FROM likes WHERE post_id = ?;";

            $result = $dbh->connect()->prepare($sql);
            if(!$result->execute(array( $post_id))){
                $result = null;
            }else{
                $results = $result->fetch(PDO::FETCH_ASSOC);
                
                    $sql = "SELECT type FROM likes WHERE post_id = ? LIMIT 5;";
                    $result = $dbh->connect()->prepare($sql);
                    if(!$result->execute(array($post_id))){
                        $result = null;
                    }else{
                        $type = $result->fetchAll(PDO::FETCH_ASSOC);}}
                    ?>

                <div class="react">
                <div class="react">
                <img src="../images/<?php echo $resultsall['type'];?>.png" alt="<?= $resultsall['type'] ?>" class='icons' >
                <small style='background:inherit; margin-left:-4px'><?= $results['total']; ?></small> <small style='background-color:inherit;margin-top:40px'>
              <span style=' visibility: hidden;'>Reactions</span>  
                </small>
                </div>
                <div>
                <span id='reaction_emoj'>
                    <?php foreach($type as $type){ ?> 
                    <img src="../images/<?php echo $type['type'];?>.png" alt="<?= $type['type'] ?>" class='icons' style='width:18px'>  
                       
                        <?php } ?>
                        
                   </span>

                </div>
                </div>
            <?php }else{?>
                <div class="react" id='react' style="font-size: 23px;">
                <img src="../images/love2.png" alt="" class='icons' >
                <small style='background:inherit; margin-left:-4px'><?= $results['total']; ?></small>
                
                </div>
            <?php }}} ?>