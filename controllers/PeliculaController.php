<?php

class PeliculaController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->view->render('pelicula/pelicula');
    }
    
    public function obtenerPelicula() {
        try {
            $this->model = new MovieApiModel();
            
            $pelicula = $_POST['nombre'];

            $pelicula = $this->model->obtenerDetallesPorNombre($pelicula);
            echo json_encode($pelicula);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerVideo() {
        try {
            $this->model = new MovieApiModel();
            
            $id = $_POST['id'];

            $videoURL = $this->model->obtenerVideo($id);
            echo json_encode($videoURL);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}

?>