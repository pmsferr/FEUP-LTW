<?php

  include_once('includes/init.php');

  $_SESSION['message']='';


  $stmt = $dbh->prepare('SELECT list_public FROM list WHERE list_name=?');
  $stmt->execute(array($_GET['list']));
  $res= $stmt->fetch();

  if($res['list_public']==0) {

    $stmt2 = $dbh->prepare('UPDATE list SET list_public = ? WHERE list_name = ?');
    $stmt2->execute(array(1,$_GET['list']));

  } else {

    $stmt2 = $dbh->prepare('UPDATE list SET list_public = ? WHERE list_name = ?');
    $stmt2->execute(array(0,$_GET['list']));

  }
?>
