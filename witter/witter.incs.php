<?php 
        $dbh = New Dbh();
        $selectTot = $dbh->connect()->prepare('SELECT  COUNT(users.id) AS total_users,COUNT(users.school) AS Totalplaces  FROM users
      ');
      if (!$selectTot->execute()) {
        echo 'Failed To Load Locations';
      } else {
        $witter_dat = $selectTot->fetch(PDO::FETCH_ASSOC);
      }
      
      $selectReports = $dbh->connect()->prepare('SELECT msgs.* ,users.* , posts.*  FROM msgs JOIN users on users.id = msgs.user_id JOIN posts ON posts.post_id = msgs.post_id
      ');
      if (!$selectReports->execute()) {
        echo 'Failed To Load Locations';
      } else {
        $witter_reps = $selectReports->fetchAll(PDO::FETCH_ASSOC);
      }
      
      