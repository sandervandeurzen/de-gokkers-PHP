<?php
    include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">

        <?php
        if (isset($_SESSION['u_id'])){
            echo '<h2>Welcome</h2>';
            echo'<h2><a href="gokkers.zip" download="Gokkers zip">Dowload Gokkers</a></h2>';
        }else{
            echo '<h2>Home</h2>';
            echo '<h2>If you want to download my projects,You first need to <a href="signup.php">register </a>for free.</h2>';

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

<?php
include_once 'footer.php';
?>



<?php
