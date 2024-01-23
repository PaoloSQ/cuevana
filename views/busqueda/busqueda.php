<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuevana | Busqueda</title>
    <?php require_once 'views/cssRequired.php' ?>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>busqueda.css">
</head>
<body>
    <?php require_once 'views/header.php' ?>
    <main>
        <section class="busqueda-section preview-section">
            <h2 class="titulo">Peliculas</h2>
            <div class="preview-container">
            </div>
        </section>
        <div class="paginacion-container">
            
        </div>
    </main>
    <?php require_once 'views/footer.php' ?>
</body>
<?php require_once 'views/scriptsRequired.php' ?>
<script src="<?php echo JS_URL; ?>models/peliculasModel.js"></script>
<script src="<?php echo JS_URL; ?>controllers/busquedaController.js"></script>
<script src="<?php echo JS_URL; ?>views/busquedaView.js"></script>
</html>