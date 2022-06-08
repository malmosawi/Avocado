<?php

include 'connection.php';

ob_start();
ob_end_flush();
session_start() ;


session_destroy();

header('location:login.php');
