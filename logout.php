<?php
include 'php/db.php';

// Destroy session and logout
session_unset();
session_destroy();

header("Location: login.php");
exit();
?>
