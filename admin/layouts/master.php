<?php
  session_start();
  if(!isset($_SESSION['auth_user'])){
      header("Location:/index.php");
  }
  $root = $_SERVER['DOCUMENT_ROOT'];
  require($root.'/shared/db_connect.php');
  date_default_timezone_set('Asia/Manila');
?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Foodjectives</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/skin-red.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="/plugins/bootstrap-select-1.12.4/dist/css/bootstrap-select.min.css">
  
</head>

<style>
  .message{
    position: absolute;
    right:250px;
    top:65px;
    z-index:9999;
  }
</style>
<body class="hold-transition skin-red sidebar-mini">
  <?php if(isset($_SESSION['message'])){?>
    <div class="alert alert-success message" id = "custom-message-box">
      <?=$_SESSION['message']?>
    </div>

    <?php unset($_SESSION['message']);
      }
    ?>
  <div class="wrapper">

    <!-- Main Header -->
    <?php 
      include('nav.php');
      include('side-nav.php');
    ?>    

