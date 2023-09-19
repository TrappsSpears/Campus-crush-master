<?php

$selectThemes= $dbh->connect()->prepare('
    SELECT themes.*
    FROM themes
    WHERE ( themes.location = :getname)
   
');


$selectThemes->bindValue(':getname', $getname, PDO::PARAM_STR);

if (!$selectThemes->execute()) {
echo 'Failed To Load Trending Posts';
} else {
$themes_Home = $selectThemes->fetchAll(PDO::FETCH_ASSOC);
}