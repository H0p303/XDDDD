<?php
//logs out user by destroying the active session
session_start();
session_unset();
session_destroy();
//redirect
header("Location: ../PHP/Index.php");