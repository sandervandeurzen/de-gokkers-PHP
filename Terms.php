
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gokkers</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>

    <header>
        <nav>
            <div class="main-wrapper" >
                <div class="header">
                    <a href="index.php"><h1>Gokkers</h1></a>
                </div>
                <div class="nav-login">
                    <?php
                    if (isset($_SESSION['u_id'])){
                        echo '   <form action="../logout.inc.php" method="post">
                             <button type="submit" name="submit">Logout</button>
                             </form>';
                    }else{
                        echo '<form action="includes/login.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="username/email">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" name="submit">Login</button>
                    </form>
                    <a href="includes/DB_Test_connection.php">Sign up</a>';
                    }
                    ?>



                </div>
            </div>
        </nav>
    </header>

<div class="main-container">
    <div class="container-voorwaarden">
        <h2>Algemene Voorwaarden</h2>
        <p>Er kunnen online gegevens worden opgeslagen van u in onze databases. De wachtwoorden kan niet worden gezien door ons.
            <br>
        Als de site eruit valt of door een bepaalde reden niet meer werken zijn wij niet verzekerd voor uw gegevens.
            <br>
        in geval van een illegale aanval op deze site zal der contact opgenomen worden met de politie en zullen der gevolgen aan komen.
            <br>
        als uw inlogegevens worden gejat of overgenomen door iemand anders die je niet wilt hebben kun je binnekort op de optie drukken dat je je wachtwoord kunt veranderen.
        Voor nu kunnen we nog niks aan doen maar we werken er nu aan dus wij zorgen ervoor dat het zo snel mogelijk op de site komt.</p>
    </div>
</div>


<?php
include_once 'footer.php';
?>




<?php
/**
 * Created by PhpStorm.
 * User: Sander van Deurzen
 * Date: 16-3-2018
 * Time: 15:10
 */