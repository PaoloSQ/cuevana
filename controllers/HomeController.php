<?php

class HomeController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->view->render('home/home');
    }

    public function cargarUltimosEstrenos() {
        try {
            $this->model = new MovieApiModel();

            $ultimosEstrenos = $this->model->obtenerUltimosEstrenos();
            echo json_encode($ultimosEstrenos);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function cargarPeliculas() {
        try {
            $this->model = new MovieApiModel();

            $peliculasRecientes = $this->model->obtenerPeliculasRecientes();
            echo json_encode($peliculasRecientes);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

}

?>