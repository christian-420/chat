<?php

session_start();

$conn = new mysqli("localhost", "root", "code123456", "mydata");

$_SESSION = array();
session_destroy();
header("location: index.html");
