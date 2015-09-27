<!DOCTYPE HTML>
<html>
<body>

<cfset UserID = Session.UserID />
<cfif IsDefined("URL.UserID")>
	<cfset UserID = URL.UserID />
</cfif>

<!--- VULNERABILITY: userId is not type-checked (should error out if it is not an integer). --->


<!--- VULNERABILITY: SQL Injection --->
<cfquery name="selUser">
	SELECT *
	FROM Users
	WHERE id = #UserID#
</cfquery>

<h2>Edit User</h2>

<cfoutput>
	<form method="POST" action="editUserStep2.cfm">
		
		<input type="hidden" name="UserID" value="#UserID#" />
		
		<table width="100%">
			<tr>
				<td width="110">Login Name:</td>
				<!--- VULNERABILITY: XSS (value attribute is not escaped) --->
				<td><input type="text" name="username" value="#selUser.username#" style="width:100%" /></td>
			</tr>
			<tr>
				<td>Display Name:</td>
				<!--- VULNERABILITY: XSS (value attribute is not escaped) --->
				<td><input type="text" name="displayName" value="#selUser.DisplayName#" style="width:100%" required /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="pw" style="width:100%" /></td>
			</tr>
			<tr>
				<td>Roles:</td>
				<!--- VULNERABILITY: XSS (value attribute is not escaped) --->
				<td><input type="text" name="roles" value="#selUser.Roles#" style="width:100%" /></td>
			</tr>
		</table>
		
		<input type="submit" value="Submit" />
	</form>
</cfoutput>

</body>
</html>

