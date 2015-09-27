<?php require_once('application.php'); ?>
<!DOCTYPE HTML>
<html>
<body>

<?php
$userId = $_SESSION['userId'];
if(isset($_GET['userId']))
  $userId = $_GET['userId'];

//VULNERABILITY: userId is not type-checked (should error out if it is not an integer).

//VULNERABILITY: SQL Injection
$selUser = $DBH->query("SELECT * FROM users WHERE id = $userId", PDO::FETCH_ASSOC)->fetchAll();

?>

<h2>Edit User</h2>

  <form method="POST" action="editUserStep2.php">
  
  <input type="hidden" name="userId" value="<?= $userId ?>" />
  
  <table width="100%">
    <tr>
      <td width="110">Login Name:</td>
      <!-- VULNERABILITY: XSS (value attribute is not escaped) -->
      <td><input type="text" name="username" value="<?= $selUser[0]['username'] ?>" style="width:100%" /></td>
    </tr>
    <tr>
      <td>Display Name:</td>
      <!-- VULNERABILITY: XSS (value attribute is not escaped) -->
      <td><input type="text" name="displayName" value="<?= $selUser[0]['displayname'] ?>" style="width:100%" required /></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="text" name="pw" style="width:100%" /></td>
    </tr>
    <tr>
      <td>Roles:</td>
      <!-- VULNERABILITY: XSS (value attribute is not escaped) -->
      <td><input type="text" name="roles" value="<?= $selUser[0]['roles'] ?>" style="width:100%" /></td>
    </tr>
  </table>
  
  <input type="submit" value="Submit" />
</form>

</body>
</html>

