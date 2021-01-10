<?php

session_start();
unset($_SESSION); // empty $_SESSION
session_destroy(); // kill session_start()

header('refresh:1; url=home'); // Forward to sign in page

?>
