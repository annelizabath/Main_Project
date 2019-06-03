<?php
include 'dbconnection,php';
include 'db2.php';
session_start();
session_destroy();
header("location:index.php");
?>