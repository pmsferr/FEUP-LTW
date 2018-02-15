<?php
$stmt7 = $dbh->prepare('SELECT * FROM user WHERE user_username = ? ');
$stmt7->execute(array($_SESSION['user']));
$result1 = $stmt7->fetch();

 ?>
<body>
  <header>
  <div class = "headerhome">
    <div class ="logohome">
    <a id="logohome" href="home.php"><img id="logoheader" src="images/checklogo.png" alt="checklist icon" ></a>
    <h1 id="titulohome">Done!</h1>
    <h2 id="subthome">Yesterday you said tomorrow. Just do it!</h2>
    </div>
    <div class = "profilesection">
      <img id="proilepichome" src="<?=$result1[user_photoId]?>" >
      <a  id="profilelink" href="profile.php?user=<?=$_SESSION['user'];?>"><?= $_SESSION['user']; ?> </a>
      <a id="logouthome" href="action_logout.php">Logout</a>
    </div>
</div>

</header>
