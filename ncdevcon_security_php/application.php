<?php

/* File to be included in each page. Sets global variables. */

$DB_HOST = 'FILL_THIS_IN';
$DB_NAME = 'FILL_THIS_IN';
$DB_USER = 'FILL_THIS_IN';
$DB_PASS = 'FILL_THIS_IN';

//$DBH = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$DBH = new PDO("mysql:dbname=$DB_NAME;host=$DB_HOST", $DB_USER, $DB_PASS);


session_start();
