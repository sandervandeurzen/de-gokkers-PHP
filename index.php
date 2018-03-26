<?php
//session_start();
//error_reporting(E_ERROR | E_PARSE);
//include_once ('includes/DatabaseConnector.php');
//
//require ('includes/database.php');
//
//try{
//    $database = new PDO("mysql:dbname=$DB_NAME;host=$DB_HOST" , $DB_USER, $DB_PASS);
//    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    if(isset($_POST['submit'])){
//
//        if (empty($_POST['user'])){
//            $message = '<label>Please fill in al fields</label>';
//        }else{
//            $query = "SELECT * FORM users WHERE username = :USER_uid AND password = :USER_pwd";
//            $statement = $database->prepare($query);
//            $statement->execute(
//                array(
//                    'username' => $_POST["username"],
//                    'password' => $_POST["password"]
//                )
//            );
//            $count = $statement->rowCount();
//            if ($count > 0){
//                $_SESSION['username'] = $_POST['username'];
//                header("location:login_succes.php");
//                exit();
//            }else{
//                $message = '<label>wrong data</label>';
//
//            }
//        }
//
//    }
//}catch (PDOException $exception){
//    die('er is een fout opgetreden'. $exception->getMessage());
//}
//
//?>


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
<h2>test</h2>
    <header>
        <nav>
            <div class="main-wrapper" >
                <div class="header">
                    <a href="index.php"><h1>Gokkers</h1></a>
                </div>
                <div class="nav-login">
<!--                    --><?php
//                    if (isset($_SESSION['username'])){
//                        echo 'welcome - '.$_SESSION["username"];
//                        echo '   <form action="includes/logout.inc.php" method="post">
//                             <button type="submit" name="submit">Logout</button>
//                             </form>';
//                    }else{
//                        echo '<form action="index.php" method="POST">
//                    <input type="text" name="uid" placeholder="username/email">
//                    <input type="password" name="pwd" placeholder="password">
//                    <button type="submit" name="submit">Login</button>
//                    </form>
//                    <a href="includes/DB_Test_connection.php">Sign up</a>';
//                    }
//
//                    ?>



                </div>
            </div>
        </nav>
    </header>

<section class="main-container">
    <div class="main-wrapper">
        <?php
        if ($_GET['login'] == 'empty'){
            echo '<h4>please fill in al field in the login columns.</h4>';
        }
        if ($_GET['login'] == 'firsterror'){
            echo '<h4>wrong username/password</h4>';
        }
        if (isset($message)){
            echo '<label class="text">'.$message.'</label>';
        }



        ?>
        <?php
        if (isset($_SESSION['username'])){
                echo '<h2>welcome - '.$_SESSION["username"].'</h2>';
            echo ' <div class="download">
                        <h3><a href="Gokkers.exe" download="Gokkers.exe">Download Gokkers</a></h3>
                   </div>';
        }else{
            echo '<h3>If you want to download my projects,You first need to <a href="includes/DB_Test_connection.php">register </a>for free.</h3>';
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

