<?php

  include_once('includes/init.php');

  $_SESSION['message']='';

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['message']='Something went wrong';
    header('location:new_list.php');
    die;
  }

  $content=$_POST['newTask'];

  $stmt2 = $dbh->prepare('SELECT list_id FROM list WHERE list_name=?');
  $stmt2->execute(array($_GET['list']));
  $list_id= $stmt2->fetch();

  $stmt = $dbh->prepare('INSERT INTO task VALUES (?,?,?,?)');
  $stmt->execute(array(NULL,$content,0,$list_id['list_id']));

  header("location: {$_SERVER['HTTP_REFERER']}");
?>
