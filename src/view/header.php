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
  <body>
    <div class="container-fluid" style="display: grid;">
    	<?php 
    		include_once 'navbar.php';
    	?>
    