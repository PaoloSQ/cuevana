<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>"><img src="<?php echo IMG_URL; ?>base/logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active link" aria-current="page" href="<?php echo BASE_URL ?>">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle link" href="<?php echo BUSQUEDA_URL ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Películas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item link" href="<?php echo BUSQUEDA_URL ?>ultimas-publicadas">Últimas publicadas</a></li>
                            <li><a class="dropdown-item link" href="<?php echo BUSQUEDA_URL ?>estrenos">Estrenos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle link" href="<?php echo GENEROS_URL ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Generos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-separated">
                            <div class="dropdown-contenedor">
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>28">Acción</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>12">Aventura</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>18">Drama</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>10751">Familia</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>16">Animación</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>878">Ciencia ficción</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>35">Comedia</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>80">Crimen</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>53">Suspenso</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>9648">Misterio</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>27">Terror</a></li>
                                <li><a class="dropdown-item link" href="<?php echo GENEROS_URL ?>14">Fantasía</a></li>
                            </div>
                        </ul>
                    </li>
                    <li>
                        <span class="link">
                            <?php  ?>
                        </span>
                    </li>
                </ul>
                <div class="search-container">
                    <input type="text" class="search-input" id="search-input-default" placeholder="Buscador..." autocomplete="off">
                    <i id="search-button-default" class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <span id="menu-boton"><i class="fa-solid fa-bars"></i></span>
        </div>
    </nav>
    <span id="sombra"></span>
    <div id="nav-mobile">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="search-container">
                <input type="text" class="search-input" id="search-input-mobile" placeholder="Buscador..." autocomplete="off">
                <i id="search-button-mobile" class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="accordion-item">
                <a class="inicio-button" href="<?php echo BASE_URL ?>">Inicio</a>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Películas
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <a href="<?php echo BUSQUEDA_URL ?>ultimas-publicadas">Últimas publicadas</a>
                        <a href="<?php echo BUSQUEDA_URL ?>estrenos">Estrenos</a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Géneros
                </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <a href="<?php echo GENEROS_URL ?>28">Acción</a>
                        <a href="<?php echo GENEROS_URL ?>12">Aventura</a>
                        <a href="<?php echo GENEROS_URL ?>18">Drama</a>
                        <a href="<?php echo GENEROS_URL ?>10751">Familia</a>
                        <a href="<?php echo GENEROS_URL ?>16">Animación</a>
                        <a href="<?php echo GENEROS_URL ?>878">Ciencia ficción</a>
                        <a href="<?php echo GENEROS_URL ?>35">Comedia</a>
                        <a href="<?php echo GENEROS_URL ?>80">Crimen</a>
                        <a href="<?php echo GENEROS_URL ?>53">Suspenso</a>
                        <a href="<?php echo GENEROS_URL ?>9648">Misterio</a>
                        <a href="<?php echo GENEROS_URL ?>27">Terror</a>
                        <a href="<?php echo GENEROS_URL ?>14">Fantasía</a>
                        <a href="<?php echo GENEROS_URL ?>99">Documental</a>
                        <a href="<?php echo GENEROS_URL ?>36">Historia</a>
                        <a href="<?php echo GENEROS_URL ?>10749">Romance</a>
                        <a href="<?php echo GENEROS_URL ?>10402">Música</a>
                        <a href="<?php echo GENEROS_URL ?>37">Western</a>
                        <a href="<?php echo GENEROS_URL ?>10752">Guerra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>