<!DOCTYPE HTML>
<html>
<body>

Please log in:<br/>

<form method="POST" action="loginStep2.cfm">
	Username: <input type="text" name="un" style="width:500px" /> <br />
  <!--- VULNERABILITY: Password is not masked. (Left unmasked for easier demo.) --->
	Password: <input type="text" name="pw" style="width:500px" /> <br />
	
	<input type="submit" value="Login" />
</form>

</body>
</html>

