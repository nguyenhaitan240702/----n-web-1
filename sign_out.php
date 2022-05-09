<?php

session_start();
unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['level']);
setcookie('remember',$token, -1);
header('location:index.php');
