<?php
  include_once('includes/init.php');
  if(!isset($_SESSION['user'])){
    header("location:home.php");
    die;
  }
  //html head with title, charset, icon, scripts, etc...
  include_once('includes/common/html_head_inside.php');
  //include header
  include_once('includes/common/html_header.php');
?>
    <br>
    <br>
    <form action="action_newList.php" method="post">
      <p id="newlisttitle">New List!</p>
      <p id="failed_login"><?= $_SESSION[newlist_message];?> </p>
      <input type="text" name="titulo" placeholder="Title" required>
      <br>
      <label><input type='checkbox' name="public" value='checked'>Public</label>
      <br>
      <input type="text" name="task" placeholder="Task">
      <br>
      <input type="submit" value="Create List!">
    </form>
   </body>
</html>
