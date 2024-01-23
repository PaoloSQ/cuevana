<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuevana</title>
    <?php require_once 'views/cssRequired.php' ?>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>pelicula.css">
</head>
<body>
    <?php require_once 'views/header.php' ?>
    <main>
        <section class="info-section">
        </section> 
        <section class="pelicula-container">
            <div class="reacciones-container">
                <p>What do you think?</p>
                <p>719 Responses</p>
                <div class="reacciones">
                    <div class="reaccion">
                        <img class="reaccion-img" src="<?php echo IMG_URL; ?>base/like.png" alt="">
                        <span class="link white-text">Like</span>
                    </div>
                    <div class="reaccion">
                        <img class="reaccion-img" src="<?php echo IMG_URL; ?>base/funny.png" alt="">
                        <span class="link white-text">Funny</span>
                    </div>
                    <div class="reaccion">
                        <img class="reaccion-img" src="<?php echo IMG_URL; ?>base/love.png" alt="">
                        <span class="link white-text">Love</span>
                    </div>
                    <div class="reaccion">
                        <img class="reaccion-img" src="<?php echo IMG_URL; ?>base/surprised.png" alt="">
                        <span class="link white-text">Surprised</span>
                    </div>
                    <div class="reaccion">
                        <img class="reaccion-img" src="<?php echo IMG_URL; ?>base/angry.png" alt="">
                        <span class="link white-text">Angry</span>
                    </div>
                    <div class="reaccion">
                        <img class="reaccion-img" src="<?php echo IMG_URL; ?>base/sad.png" alt="">
                        <span class="link white-text">Sad</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once 'views/footer.php' ?>
</body>
<?php require_once 'views/scriptsRequired.php' ?>
<script src="<?php echo JS_URL; ?>models/peliculasModel.js"></script>
<script src="<?php echo JS_URL; ?>controllers/peliculaController.js"></script>
<script src="<?php echo JS_URL; ?>views/peliculaView.js"></script>
</html>