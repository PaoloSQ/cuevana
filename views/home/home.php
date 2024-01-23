<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuevana</title>
    <?php require_once 'views/cssRequired.php' ?>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>home.css">
</head>
<body>
    <?php require_once 'views/header.php' ?>
    <main>
        <section class="estrenos-section">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                </div>
                <div class="carousel-inner">
                </div>
            </div>
        </section>
        <section class="peliculas-section preview-section">
            <div class="head-section">
                <h2>Películas Online</h2>
                <h3>ÚLTIMAS PELÍCULAS AGREGADAS</h3>
            </div>
            <div class="preview-container peliculas-container">
            </div>
        </section>
    </main>
    <?php require_once 'views/footer.php' ?>
</body>
<?php require_once 'views/scriptsRequired.php' ?>
<script src="<?php echo JS_URL; ?>models/peliculasModel.js"></script>
<script src="<?php echo JS_URL; ?>controllers/homeController.js"></script>
<script src="<?php echo JS_URL; ?>views/homeView.js"></script> 
<script>
    const myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
        interval: 3000,
    });
</script>
</html>
