



<?php



require ('../includes/database.php');

try{
    $database = new PDO("mysql:dbname=$DB_NAME;host=$DB_HOST" , $DB_USER, $DB_PASS);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $exception){
    die('er is een fout opgetreden'. $exception->getMessage());
}