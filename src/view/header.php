<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    
    <script src="../public_html/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../public_html/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public_html/css/map.css">
    <script src="../public_html/js/bootstrap.min.js"></script>
    
    <title><?= isset($title) ? $title : "Proyecto Web Expertos"; ?></title>
  </head>
  <body style="background-image: url('../public_html/assets/background.jpg');  background-attachment: fixed;">
    <div style="display: grid; background-color: rgba(255,255,255,0.5);">
    	<?php 
    		include_once 'navbar.php';
    	?>
    