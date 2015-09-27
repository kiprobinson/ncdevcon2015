<!DOCTYPE HTML>
<html>
<body>
	
<!--- VULNERABILITY: No type validation on submitted data. --->
<!--- one way to prevent sql/xss vulnerability: --->
<!---
<cfif REFind('[^\w ]', Form.displayName)>
	ILLEGAL DISPLAY NAME!
	<cfabort />
</cfif>
--->

<!--- VULNERABILITY: No check on user privileges --->
<!--- prevent user from gaining unauthorized access to direct objects --->
<!---
<cfif Form.User_ID NEQ Session.UserID AND NOT ListFindNoCase(Session.Roles, 'admin')>
  YOU CAN'T EDIT THAT USER!
</cfif>
--->


<!--- VULNERABILITY: SQL INJECTIONS GALORE! --->
<cfquery name="updUser">
	UPDATE Users
	SET DisplayName = '#Form.displayName#'
	  , username = '#Form.username#'
	<cfif Form.roles NEQ "">
	  , roles = '#Form.roles#'
	</cfif>
	<cfif Form.pw NEQ "">
	  , Password = '#Form.pw#'
	</cfif>
	WHERE id = #Form.userID#
</cfquery>

<h2>Successfully edited user!</h2>

<a href="index.cfm">Return to home</a><br/>
<a href="manageUsers.cfm">Return to manage users </a><br/>

</body>
</html>

