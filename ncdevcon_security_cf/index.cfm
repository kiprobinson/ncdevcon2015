<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en">
<body>

<cfif NOT IsDefined('Session.UserID') OR Session.UserID LTE 0>
	No Session!<br/>
	<a href="login.cfm">log in again</a>
	<cfabort />
</cfif>

<h2>Available Actions</h2>
<cfif ListFindNoCase(Session.Roles, 'admin')>
	<a href="manageUsers.cfm">Manage users</a> <br/>
</cfif>
<a href="editUser.cfm">Change your name/password</a> <br/>
<a href="logout.cfm">Logout</a> <br/>



</body>
</html>