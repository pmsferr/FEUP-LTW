
<?php
  include_once('includes/init.php');

  $stmt = $dbh->prepare('SELECT * FROM user WHERE user_username = ? ');
  $stmt->execute(array($_GET[user]));
  $result = $stmt->fetch();

  include_once('includes/common/html_head_inside.php');
?>
    <body>
      <header>
        <div class = "headerhome">
          <div class ="logohome">
            <a id="logohome" href="home.php"><img id="logoheader" src="images/checklogo.png" alt="checklist icon" ></a>
            <h1 id="titulohome">Done!</h1>
            <h2 id="subthome">Yesterday you said tomorrow. Just do it!</h2>
          </div>
        </div>
      </header>
      <br>
      <br>
      <br>
      <br>
    <div class="profileGrid">
      <img id="profilePic" src="<?=$result[user_photoId]?>" ><br>
      <div id="profileInfo">
        <p style="color:black">User name: <?=$result[user_username]?></p>
        <p style="color:black">Name: <?=$result[user_fullName]?></p>
        <p style="color:black">Birthday: <?=$result[user_birthDate]?></p>
        <p style="color:black">Gender: <?=$result[user_gender]?></p>
      </div>
    <?php
      if($_GET[user] == $_SESSION['user']){
    ?>
        <form id ="editButtondiv" action="editProfile.php">
          <input id ="editButton" type="submit" value="Edit Profile">
        </form>
    <?php
      }
   ?>
   <div class="profilelistas">
  <?php
    $stmt = $dbh->prepare('SELECT list_name,user_username FROM list WHERE list_public=1 AND user_username=?');
    $stmt->execute(array($_GET[user]));
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
