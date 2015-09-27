<?php require_once('application.php'); ?>
<!DOCTYPE HTML>
<html>
<body>

<?php

//VULNERABILITY: No type validation on submitted data.
//one way to prevent sql/xss vulnerability:
/*
if(preg_match('/[^\\w ]/', $_POST['displayName'])) {
  echo 'ILLEGAL DISPLAY NAME!';
  exit();
}
*/

//VULNERABILITY: No check on user privileges
//prevent user from gaining unauthorized access to direct objects
/*
if($_POST['userId'] != $_SESSION['userId'] && (array_search('admin', $_SESSION['roles']) === false)) {
  echo "YOU CAN'T EDIT THAT USER!";
  exit();
}
*/

//VULNERABILITY: SQL INJECTIONS GALORE!
$sql = "UPDATE Users ";
$sql .= "SET DisplayName = '${_POST['displayName']}' ";
$sql .= ", username = '${_POST['username']}' ";
if($_POST['roles'] != '')
  $sql .= ", roles = '${_POST['roles']}' ";
if($_POST['pw'] != '')
  $sql .= ", password = '${_POST['pw']}' ";
$sql .= "WHERE id = ${_POST['userId']} ";
$DBH->query($sql, PDO::FETCH_ASSOC);

?>


<h2>Successfully edited user!</h2>

<a href="index.php">Return to home</a><br/>
<a href="manageUsers.php">Return to manage users </a><br/>

</body>
</html>

