<?php
session_start();
$name=$_POST['username'];
$_SESSION['username']=$name;
echo ("Name: $name");
?>