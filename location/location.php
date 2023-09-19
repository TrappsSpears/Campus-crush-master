<?php 
if(isset($_GET['place'])){
$getname = $_GET['place'];

  $page = 'location';
  $pagee = 'posts';
include_once('../includes/headall.php'); 
include('location.incs.php');
include_once('locationIn.php');
} else if(isset($_GET['user'])){
  $getname =$_GET['user'];
  $page = 'profile';
  include_once('../includes/headall.php'); 
  include('user.inc.php');
  include_once('user.php');
 }elseif(isset($_GET['theme'])){
  $getname =$_GET['theme'];
  $page = 'profile';
  include_once('../includes/headall.php'); 
  include('theme.incs.php');
  include_once('themes.php');

 }elseif(isset($_GET['group'])){


  
 }else{ header('location: ../home/home.php');}?>
