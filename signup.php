<?php
include_once 'header.php';

?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>Sign up</h2>

            <form action="includes/DB_Test_connection.php" class="signup-form" method="POST">
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
    <?php
    if (isset ($_GET['signup'] )){
        echo '<h5> User made!</h5>';
    }else{

    }
    ?>
    <p>Bij het registeren gaat u akkoord met de <a href="Terms.php" class="Termslink">algemene voorwaarden</a></p>
</div>

<?php
include_once 'footer.php';
?>




