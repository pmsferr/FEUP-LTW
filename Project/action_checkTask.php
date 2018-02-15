<?php

  include_once('includes/init.php');

  $_SESSION['message']='';

  $stmt = $dbh->prepare('UPDATE task SET task_checkdone=1 WHERE task_content=? ');
  $stmt->execute(array($_GET['task']));

  header("location: {$_SERVER['HTTP_REFERER']}");  
 ?>
