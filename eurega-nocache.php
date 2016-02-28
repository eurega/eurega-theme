<?php
/*
Template Name: Eurega NoCache
*/
?>
<?php

// Set No-Cache Header
header('Cache-Control: no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');

// Include the original page.php
include('page.php');