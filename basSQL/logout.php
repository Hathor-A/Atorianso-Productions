<?php
require 'config.php';

session_start();
session_unset();
session_destroy();
header("Location: AtoProd.html");
exit;




