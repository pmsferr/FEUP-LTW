<?php
  include_once('includes/init.php');
  if(!isset($_SESSION['user'])){
    header("location:index.php");
    die;
  }

  //html head with title, charset, icon, scripts, etc...
  include_once('includes/common/html_head_inside.php');
  //include header
  include_once('includes/common/html_header.php');
?>

    <p id="failed_login"><?= $_SESSION[message];?> </p>

    <div class='listas'>
      <a id ="newlist" href="newList.php">New List</a>
      <h1 id="listaprivh1">Listas Privadas</h1>
      <input  class="butao2" id="hidePriv" type="submit" value="Show/Hide" onclick=showhide()>
      <div class="listas_priv">
        <?php
         $stmt = $dbh->prepare('SELECT list_name FROM list WHERE user_username=?');
         $stmt->execute(array($_SESSION['user']));
         $result = $stmt->fetchAll();

         foreach($result as $row)
         {
        ?>
          <div class='lista'>
          <a href="list.php?list=<?=$row['list_name']?>"><h2 class="linklista"> <?=$row['list_name'];?> </h2> </a>
          </div>
        <?
          }
        ?>
      </div>
      <br>
      <br>
      <h1 id="listapubh1">Listas Publicas</h1>
      <input class="butao2" id="hidePub" type="submit" value="Show/Hide" onclick=showhide2()>
      <div class="listas_pub">
        <?php
         $stmt = $dbh->prepare('SELECT list_name,user_username FROM list WHERE list_public=1');
         $stmt->execute();
         $result = $stmt->fetchAll();

         foreach($result as $row)
         {
        ?>
          <div class='lista'>
            <a href="list.php?list=<?=$row['list_name']?>"><h2 class="linklista"> <?=$row['list_name'];?></h2></a>
          </div>
        <?
          }
        ?>
      </div>
    </div>
  </body>
</html>
