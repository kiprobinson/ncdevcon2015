<?php require_once('application.php'); ?>
<!DOCTYPE HTML>
<html>
<body>

<?php
//VULNERABILITY: No permissions check. Uncomment below to add check.
/*
if(array_search('admin', $_SESSION['roles']) === false) {
  echo 'INSUFFICIENT PRIVILEGES';
  exit();
}
*/

$selUsers = $DBH->query("SELECT * FROM users", PDO::FETCH_ASSOC)->fetchAll();
?>


<h2>Edit Users</h2>
<?php
  foreach($selUsers as $row) {
    //VULNERABILITY: XSS (no escaping of display name)
    echo '<a href="editUser.php?userId=' . $row['id'] . '">' . $row['displayname'] . '</a><br/>';
    
    //SAFE VERSION:
    //echo '<a href="editUser.php?userId=' . $row['id'] . '">' . htmlspecialchars($row['displayname'], ENT_COMPAT, 'UTF-8') . '</a><br/>';
  }
?>

<hr />

<a href="index.php">Return to home</a><br/>

</body>
</html>