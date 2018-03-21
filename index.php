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
                        echo '   <form action="includes/logout.inc.php" method="post">
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

<section class="main-container">
    <div class="main-wrapper">

        <?php
        if (isset($_SESSION['u_id'])){
            echo '<h2>Welcome</h2>';
            echo ' <div class="download">
                        <h3><a href="gokkers.exe" download="De Gokkers">Download Gokkers</a></h3>
                   </div>';
        }else{
            echo '<h3>If you want to download my projects,You first need to <a href="signup.php">register </a>for free.</h3>';
        }

        ?>
    </div>
</section>
<div class="main-hero">
    <div class="hero">
        <video width="929" height="462" controls>
            <source src="video/gokkers.mp4" type="video/mp4"</source>
        </video>
    </div>
</div>
<div class="project">
    <div class="main-project">
        <div class="wrapper">
            <h2>The project</h2>
            <img src="img/gokkers_ontwerpp.png" alt="Gokkers ontwerp">
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>


<?php
