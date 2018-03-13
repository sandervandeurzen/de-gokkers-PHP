<?php
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper" >
            <ul>
                <li><a href="index.php">home</a></li>
            </ul>
            <div class="nav-login">
                <form action="includes/login.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="username/email">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" name="submit">Login</button>

                </form>
                <a href="signup.php">Sign up</a>
            </div>
        </div>
    </nav>
</header>




<?php
/**
 * Created by PhpStorm.
 * User: Sander van Deurzen
 * Date: 12-3-2018
 * Time: 15:06
 */