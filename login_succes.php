<?php
//login_succes.php

session_start();
if (isset($_SESSION['username']))
{
    echo '<h3>Login succes, welcome - '. '$_SESSION["username"]'. '</h3>';

}