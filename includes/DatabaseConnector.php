



<?php

$message;

require ('../includes/database.php');

try{
    $database = new PDO("mysql:dbname=$DB_NAME;host=$DB_HOST" , $DB_USER, $DB_PASS);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit'])){

        if (empty($_POST['user'])){
            $message = '<label>Please fill in al fields</label>';
        }else{
            include_once ("DatabaseConnector.php");

            $query = "SELECT * FORM users WHERE username = :USER_uid AND password = :USER_pwd";
            $statement = $database->prepare($query);
            $statement->execute(
                array(
                    'username' => $_POST["username"],
                    'password' => $_POST["password"]
                )
            );
            $count = $statement->rowCount();
            if ($count > 0){
                $_SESSION['username'] = $_POST['username'];
                header("location: ../index.php?login=success");
                exit();
            }else{
                $message = '<label>wrong data</label>';

            }
        }

}
}catch (PDOException $exception){
    die('er is een fout opgetreden'. $exception->getMessage());
}