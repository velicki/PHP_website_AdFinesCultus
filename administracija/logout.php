<?php
session_start();
include_once 'session.php';

session_unset();

session_destroy();

header ("location: index.php");