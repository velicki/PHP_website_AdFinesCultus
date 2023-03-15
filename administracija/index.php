<?php
session_start();

    if ($_SESSION['username'])
    {
      header ("location: password.php"); 
    }
?>
<p align="center"><img  src="../Images/logo.png" align="middle"></p>
<form action="login.php" method="POST" align="center" >
    Username: <input type="text" name="username"><p>
    Password: <input type="password" name="password"><p>
    <input type="submit" name="submit" value="Log In">