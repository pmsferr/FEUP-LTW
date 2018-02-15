<?php
  include_once('includes/init.php');
  if(!isset($_SESSION['user'])){
    header("location:home.php");
    die;
  }

  $stmt = $dbh->prepare('SELECT * FROM user WHERE user_username = ? ');
  $stmt->execute(array($_SESSION['user']));
  $result = $stmt->fetch();

  $_SESSION['edit_profile_message']='';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['fullname']!=''){
      $name = $_POST['fullname'];
    }else{
      $name = $result[user_fullName];
    }

    if($_POST['birthday']!=''){
      $bday = $_POST['birthday'];
    }else{
      $bday = $result[user_birthDate];
    }

    if($_POST['passwordedit']==''){
      $password = $result[user_password];
    } else if($_POST['passwordedit'] == $_POST['confirmpasswordedit']){
        $password = md5($_POST['passwordedit']);
      }else{
        $_SESSION['edit_profile_message']='Passwords do not match!';
        header("location:editProfile.php");
        die;
      }

    if($_FILES['profilepic']['name']!=''){
      $pic_path  = 'images/profile/'.$_FILES['profilepic']['name'];
      copy($_FILES['profilepic']['tmp_name'], $pic_path);
    }else{
      $pic_path = $result[user_photoId];
   }

    //update database
    $stmt2 = $dbh->prepare('UPDATE user SET user_fullName = ?, user_birthDate = ?, user_password = ?, user_photoId = ? WHERE user_username = ?');
    $stmt2->execute(array($name, $bday,$password,$pic_path,$_SESSION['user']));
    $_SESSION['edit_profile_message']='User updated sucessfully';
    header("location:home.php");
    }
?>
