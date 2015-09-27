<?php require_once('application.php'); ?>
<!DOCTYPE HTML>
<html>
  <body>

<?php

//VULNERABILITY: Password is stored in database unencrypted.

//VULNERABILITY: SQL INJECTION
//INSECURE VERSION
$selLogin = $DBH->query("
  SELECT *
  FROM users
  WHERE username = '${_POST['un']}'
  AND password = '${_POST['pw']}'
", PDO::FETCH_ASSOC)->fetchAll();

//SECURE VERSION
/*
$stmt = $DBH->prepare("
  SELECT *
  FROM Users
  WHERE username = :un
  AND password = :pw
");
$stmt->execute([':un'=>$_POST['un'], ':pw'=>$_POST['pw'] ]);
$selLogin = $stmt->fetchAll();
*/


if(count($selLogin) == 0) {
  echo 'Login failed! <a href="login.php">Click here to try again.</a>';
  exit();
}

$_SESSION['userId'] = $selLogin[0]['id'];
$_SESSION['username'] = $selLogin[0]['username'];
$_SESSION['displayName'] = $selLogin[0]['displayname'];
$_SESSION['roles'] = explode(',', $selLogin[0]['roles']);


?>

Login Successful!<br/>
<a href="index.php">Go to home.</a>

</body>
</html>

