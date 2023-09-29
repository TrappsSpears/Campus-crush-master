<?php if(isset($_GET['select'])){
          $getname = $_GET['select'];
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
      
       
       ##-------------------Posts for All, HomePage--------------------------------------##
      
       
       $today = new DateTime();
       $userBirthDate = new DateTime($userDOB);
       $ageDifference = $userBirthDate->diff($today)->y; 
       $selectHomeUsers = $dbh->connect()->prepare('
       SELECT * FROM (
           SELECT users.*
           FROM users
           WHERE (users.school LIKE :userSchool)    
       ) AS subquery
   ');

   $selectHomeUsers->bindValue(':userSchool', $getname.'%', PDO::PARAM_STR);
   

   if (!$selectHomeUsers->execute()) {
       echo 'Failed To Load Trending Posts';
   } else {
       $users = $selectHomeUsers->fetchAll(PDO::FETCH_ASSOC);
   }
       ?>

<select name="location" id="location" required>
                <?php foreach($users as $users){ ?>
                    <option value="<?= $users['school']?> - <?= $users['username'] ?>"><?= $users['username'] ?></option>
                <?php } ?>
            </select>

            <?php } ?>