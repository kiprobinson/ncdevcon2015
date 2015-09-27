<?php
require_once('application.php');

//below copied from PHP docs...
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
);

// Finally, destroy the session.
session_destroy();


header('HTTP/1.1 302 Found', true, 302);
header("Location: login.php");
