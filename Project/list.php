<?php
include_once('includes/init.php');

$stmt6 = $dbh->prepare('SELECT list_id FROM list WHERE list_name=? AND user_username=?');
$stmt6->execute(array($_GET['list'], $_SESSION['user']));
$list_id2= $stmt6->fetch();

$stmt2 = $dbh->prepare('SELECT user_username FROM list WHERE list_name=?');
$stmt2->execute(array($_GET['list']));
$list_owner= $stmt2->fetch();

$stmt5 = $dbh->prepare('SELECT list_public FROM list WHERE list_id=?');
$stmt5->execute(array($list_id2['list_id']));
$list_public= $stmt5->fetch();

if(($list_owner['user_username'] !== $_SESSION['user']) && ($list_public['list_public']!=0)){
  header("location:home.php");
  die;
}

include_once('includes/common/html_head_inside.php');
include_once('includes/common/html_header.php');
?>
<div class='tasks'>
<?php
    $stmt = $dbh->prepare('SELECT list_id,list_public FROM list WHERE list_name=?');
    $stmt->execute(array($_GET['list']));
    $list_id= $stmt->fetch();

    $stmt3 = $dbh->prepare('SELECT task_content,task_checkdone,task_id FROM task WHERE list_id=?');
    $stmt3->execute(array($list_id['list_id']));
    $task_content= $stmt3->fetchAll();

    $stmt4 = $dbh->prepare('SELECT user_username FROM list WHERE list_name=?');
    $stmt4->execute(array($_GET['list']));
    $list_owner= $stmt4->fetch();
  ?>
  <h1 id="listName"><?=$_GET['list'];?> <a style="font-size:0.5em;"href="profile.php?user=<?=$list_owner['user_username']?>">Owned by:<?=$list_owner['user_username']?></a></h1>


  <? if(  ($list_owner['user_username'] == $_SESSION['user']) || $list_id['list_public'] == 0) { ?>

   <? if($list_id['list_public'] == 0) { ?>
      <button id="btn" value="Change To Public">Change To Public</button>
  <?}else{?>
     <button id="btn" value="Change To Private">Change To Private</button>
  <?}?>

  <form  id="deletelist" action="action_deleteList.php?list=<?=$_GET['list'];?>" method="post">
    <input id= "deletebutton" type="submit" value="Delete List!">
  </form>
  <?}?>

  <div class="tasklisting">
    <?
      foreach($task_content as $row)
      {
    ?>
      <div class='listgrid'>
      <? if(  ($list_owner['user_username'] == $_SESSION['user']) || $list_id['list_public'] == 0) { ?>
          <div id="taskname">
          <h2 id="<?=$row['task_content'][0].$row['task_id'][1]?>"> <? echo $row['task_content']; ?></h2>
          </div>
      <?
      if($row['task_checkdone']==1)
      {
      ?>
      
        <style> #<?=$row['task_content'][0].$row['task_id'][1]?>{color:green;}</style>
        <form id="checkbuttondiv" action="action_uncheckTask.php?task=<?=$row['task_content'];?>" method="post" >
          <input id="checkbutton" type="submit" value="Uncheck Task!" >
        </form>
      <?
        }else{
      ?>
        <form id="checkbuttondiv" action="action_checkTask.php?task=<?=$row['task_content'];?>" method="post">
          <input id="checkbutton" type="submit" value="Check Task!">
        </form>
      <?
        }
      ?>
      <form id="deletetaskbuttondiv" action="action_deleteTask.php?task=<?=$row['task_content'];?>" method="post">
       <input id="deletetaskbutton" type="submit" value="Delete Task!">
     </form>
     <br>
    <?
      } else {
    ?>
    <h2> <? echo $row['task_content']; ?> </h2>
    <?
      }
    ?>
 </div>

 <?php
  }
  ?>
  </div>
  <? if($list_owner['user_username'] == $_SESSION['user'] ){?>

    <div class="formcontainer">
      <form action="action_new_task.php?list=<?=$_GET['list'];?>" method="post" >
        <div class="newtaskcontainer">
          <label id="LabelNewTask"><b>New Task</b></label>
          <input id="inputbox" type="text" name="newTask" placeholder="Add New Task" required>
          <br>
          <div class="clearfix">
          <input id="resetbutton" type="reset">
          <input id="submitbutton" type="submit" value="Create Task!">
        </div>
          </div>
        </form>
      </div>
    </div>


<script>
  let btn = document.getElementById('btn');
  btn.addEventListener("click", function() {
   let ourRequest= new XMLHttpRequest();
   ourRequest.open('POST',"action_changeListPrivacy.php?list=<?=$_GET['list'];?>");
   let button = btn.innerHTML;
   if(button=='Change To Public'){
    document.getElementById("btn").innerHTML="Change To Private";
    } else if(button=='Change To Private')  {
      document.getElementById("btn").innerHTML="Change To Public";
    }
    ourRequest.send();
    });
</script>

<? }?>

</body>
</html>
