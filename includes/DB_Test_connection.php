

<?php


error_reporting(E_ERROR | E_PARSE);

//laad de databaseconnector.php in

if (isset($_POST['submit'])) {

    include_once('../includes/DatabaseConnector.php');

    $fname = $_POST['first'];
    $lname = $_POST['last'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    if (empty($fname) || empty($lname) || empty($email) || empty($uid)
        || empty($pwd)){
        header("location: ../includes/DB_Test_connection.php?signup=empty");
        echo 'please fill in al columns.';
        exit();
    }else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location: ../includes/DB_Test_connection.php?signup=email");
            exit();
        }else{
               //checking if the email has been taken

                    $query = $database->prepare('SELECT * FROM users WHERE user_email = :email');
                    $query->bindValue(':email', $email);
                    $query->execute();


                    if($query->rowCount() > 1) {
                        // do your insert
                        header("location: ../includes/DB_Test_connection.php?signup=taken");
                        exit();

                    }else{
                        //hashing password
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                        //trim te space
                        $words = 'fname, lname, uid, email, pwd';
                        $words = trim($words);
                        $fname = trim($fname);
                        $lname = trim($lname);
                        $email = trim($email);
                        $uid = trim($uid);
                        $pwd = trim($pwd);


                        //insert user into database
                        $pdoQuery_users =  "INSERT INTO users(USER_first, USER_last, USER_email, USER_uid, USER_pwd) VALUES (:USER_first, :USER_last, :USER_email, :USER_uid, :USER_pwd)";

                        $pdoResult = $database->prepare($pdoQuery_users);

                        $pdoExec = $pdoResult->execute(array(":USER_first"=>$fname, ":USER_last"=>$lname, ":USER_email"=>$email, ":USER_uid"=>$uid, ":USER_pwd"=>$hashedPwd));

                            header("location: ../includes/DB_Test_connection.php?signup=succes");
                            exit();

                }



        }

    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gokkers</title>
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper" >
            <div class="header">
                <a href="../index.php"><h1>Gokkers</h1></a>
            </div>
            <div class="nav-login">
                <?php
                if (isset($_SESSION['username'])){
                    echo '   <form action="logout.inc.php" method="post">
                             <button type="submit" name="submit">Logout</button>
                             </form>';
                }else{
                    echo '<form action="../index.php" method="POST">
                    <input type="text" name="uid" placeholder="username/email">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" name="submit">Login</button>
                    </form>
                    <a href="DB_Test_connection.php">Sign up</a>';
                }
                ?>



            </div>
        </div>
    </nav>
</header>
    <link rel="stylesheet" type="text/css" href="../style.css">

    <section class="main-container">
        <div class="main-wrapper">
            <h2>Sign up</h2>

            <form action="DB_Test_connection.php" class="signup-form" method="POST">
                <input type="text" name="first" placeholder="Firstname">
                <input type="text" name="last" placeholder="Lastname">
                <input type="email" name="email" placeholder="E-mail">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password" minlength="7">
                <button type="submit" name="submit">Sign up</button>
            </form>


        </div>
    </section>
    <div class="middle">
<!--        --><?php
        if (($_GET['signup'] == 'succes' )){
            echo '<h5> User made!</h5>';
        }
        if ($_GET['signup'] == 'empty'){
            echo '<h5>please fill in al columns.</h5>';
        }
        if ($_GET['signup'] == 'taken')
        {
            echo '<h5>this email is already taken.</h5>';
        }
        if ($_GET['signup'] == 'email')
        {
            echo '<h5>the email or username is invalid or already taken.</h5>';
        }
       ?>

        <p>Bij het registeren gaat u akkoord met de <a href="../Terms.php" class="Termslink">algemene voorwaarden</a></p>
    </div>

<?php
include_once '../footer.php';
?>