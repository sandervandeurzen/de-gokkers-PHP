<?php
    include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>Home</h2>
        <?php
        if (isset($_SESSION['u_id']))
            echo "you are logged in!"
        ?>
    </div>
</section>
<div class="main-hero">
    <div class="hero">
        <video width="320" height="240" controls>
            <source src="" type="video/mp4">
            <source src="" type="video/ogg">
        </video>
        <a href="gokkers.zip" download="Gokkers zip"><button>Download</button></a>
    </div>
</div>

<?php
include_once 'footer.php';
?>



<?php
