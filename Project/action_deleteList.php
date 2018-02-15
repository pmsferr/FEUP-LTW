<?php

  include_once('includes/init.php');

  $_SESSION['message']='';

  $stmt3 = $dbh->prepare('SELECT list_id FROM list  WHERE list_name=? AND user_username=?');
  $stmt3->execute(array($_GET['list'], $_SESSION['user']));
  $list_id = $stmt3->fetch();

  $stmt4 = $dbh->prepare('SELECT task_id FROM task  WHERE list_id=?');
  $stmt4->execute(array($list_id['list_id']));
  $task_ids = $stmt4->fetchAll();

  foreach($task_ids as $task_id){
    $stmt2 = $dbh->prepare('DELETE FROM task WHERE task_id=?');
    $stmt2->execute(array($task_id['task_id']));
  }

  $stmt = $dbh->prepare('DELETE FROM list  WHERE list_name=? AND user_username=?');
  $stmt->execute(array($_GET['list'], $_SESSION['user']));

  header("location:home.php");
 ?>
