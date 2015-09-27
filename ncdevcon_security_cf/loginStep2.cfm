<!DOCTYPE HTML>
<html>
	<body>

<!--- VULNERABILITY: Password is stored in database unencrypted. --->

<!--- VULNERABILITY: SQL INJECTION --->
<!--- CFQUERY VERSION --->
<!--- 
<cfquery name="selLogin">
	SELECT *
	FROM Users
	WHERE username = '#Form.un#'
	AND password = '#Form.pw#'
</cfquery>
 --->

<!--- VULNERABILITY: SQL INJECTION --->
<!--- QUERY IN CFSCRIPT VERSION --->
<cfscript>
	q = new Query(name='selLogin');
	selLogin = q.execute(SQL="
		SELECT *
		FROM Users
		WHERE username = '#Form.un#'
		AND password = '#Form.pw#'
	").getResult();
</cfscript>

<!--- SECURE VERSION --->
<!---
<cfscript>
	q = new Query(name='selLogin');
	q.addParam(name='Username', value=Form.un, cfsqltype='CF_SQL_CHAR');
	q.addParam(name='Password', value=Form.pw, cfsqltype='CF_SQL_CHAR');
	selLogin = q.execute(SQL="
		SELECT *
		FROM Users
		WHERE username = (:Username)
		AND password = (:Password)
	").getResult();
</cfscript>
--->

<cfif selLogin.RecordCount EQ 0>
	Login failed! <a href="login.cfm">Click here to try again.</a>
	<cfabort />
</cfif>

<cfset Session.UserID = selLogin.id />
<cfset Session.username = selLogin.username />
<cfset Session.DisplayName = selLogin.displayName />
<cfset Session.Roles = selLogin.Roles />

Login Successful!<br/>
<a href="index.cfm">Go to home.</a>

</body>
</html>

