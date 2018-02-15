<?php
  include_once('includes/init.php');

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['newlist_message']='Something went wrong';
    header('location:newList.php');
    die;
  }

  $stmt4 = $dbh->prepare('SELECT * FROM list');
  $stmt4->execute();
  $lists= $stmt4->fetchAll();
  foreach($lists as $list){
    if(($list['list_name'] == $_POST['titulo']) && ($list[user_username]==$_SESSION['user'])) {
    $_SESSION['newlist_message']='You already have a list with that name! Choose another...';
    header('location:newList.php');
    die;
    }
  }


  $titulo=$_POST['titulo'];
  $task=$_POST['task'];

  if($_POST['public'] == 'checked') {
    $public=1;
  } else {
     $public=0;
  }

  $stmt = $dbh->prepare('INSERT INTO list VALUES (?,?,?,?)');
  $stmt->execute(array(NULL,$titulo,$public,$_SESSION['user']));

  $stmt2 = $dbh->prepare('SELECT list_id FROM list WHERE list_name=? AND user_username=?');
  $stmt2->execute(array($titulo, $_SESSION['user']));
  $list_id= $stmt2->fetch();
  if($task != ''){
    $stmt3 = $dbh->prepare('INSERT INTO task VALUES (?,?,?,?)');
    $stmt3->execute(array(NULL,$task,0,$list_id['list_id']));
  }
  $_SESSION['newlist_message']='';
  header('location:home.php');
?>
