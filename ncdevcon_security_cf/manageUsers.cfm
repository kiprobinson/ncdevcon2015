<!DOCTYPE HTML>
<html>
<body>

<!--- VULNERABILITY: No permissions check. Uncomment below to add check. --->
<!---
<cfif NOT ListFindNoCase(Session.Roles, 'admin')>
	INSUFFICIENT PRIVILEGES
	<cfabort />
</cfif>
--->

<cfquery name="selUsers">
	SELECT *
	FROM Users
</cfquery>

<h2>Edit Users</h2>
<cfoutput>
	<cfloop query="selUsers">
    <!--- VULNERABILITY: XSS (no escaping of display name) --->
    <a href="editUser.cfm?UserID=#id#">#DisplayName#</a><br/>
    
    <!--- SECURE VERSION: --->
		<!--- <a href="editUser.cfm?UserID=#id#">#encodeForHtml(DisplayName)#</a><br/> --->
    
	</cfloop>
</cfoutput>

<hr />

<a href="index.cfm">Return to home</a><br/>

</body>
</html>