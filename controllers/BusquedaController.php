<?php

class BusquedaController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->view->render('busqueda/busqueda');
    }

    public function cargarPeliculas() {
        try {
            $this->model = new MovieApiModel();
    
            $filtros = isset($_POST['filtros']) ? $_POST['filtros'] : null;
            $pagina = isset($_POST['page']) ? $_POST['page'] : 1;

            $titulo = null;
            $peliculas = [];
    
            $filtroPrincipal = isset($filtros[1]) ? $filtros[1] : null;
            error_log($filtroPrincipal);
    
            switch ($filtroPrincipal) {
                case 'search':
                    $titulo = sprintf('Buscar \'%s\'', $filtros[2]);
                    $peliculas = $this->model->obtenerPeliculasPorBusqueda($filtros[2], $pagina);
                    break;
    
                case 'generos':
                    $genero = isset($filtros[2]) ? $filtros[2] : "";
                    $titulo = sprintf('Género - %s', $this->model->obtenerNombreGenero($genero));
                    $peliculas = $this->model->obtenerPeliculasPorGenero($filtros[2], $pagina);
                    break;
    
                default:
                    $titulo = 'Últimas publicadas';
                    $peliculas = $this->model->obtenerUltimasPublicadas($pagina);
                    break;
            }
    
            echo json_encode(['titulo' => $titulo, 'peliculas' => $peliculas]);
    
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
?>