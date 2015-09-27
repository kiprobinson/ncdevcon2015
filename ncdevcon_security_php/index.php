<?php require_once('application.php'); ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en">
<body>

<?php if(!isset($_SESSION['userId']) || $_SESSION['userId'] <= 0): ?>
  No Session!<br/>
  <a href="login.php">log in again</a>
  <?php exit(); ?>
<?php endif; ?>


<h2>Available Actions</h2>
<?php if(array_search('admin', $_SESSION['roles']) !== false): ?>
  <a href="manageUsers.php">Manage users</a> <br/>
<?php endif; ?>
<a href="editUser.php">Change your name/password</a> <br/>
<a href="logout.php">Logout</a> <br/>


</body>
</html>