<cfif IsDefined("Session")>
	<cfset StructDelete(Session, 'UserID') />
</cfif>
<cflocation url="login.cfm" addtoken="false" />
