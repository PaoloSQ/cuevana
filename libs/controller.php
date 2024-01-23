<?php

class Controller {

    protected $view;
    protected $model;

    public function __construct() {
        $this->view = new View();
        logMessage(__CLASS__, __METHOD__);
    }

    public function loadModel($model) {
        $url = 'models/' . $model . 'ApiModel.php';
        logMessage(__CLASS__, __METHOD__, "URL: $url");

        if (file_exists($url)) {
            require_once $url;

            $modelName = $model . 'ApiModel';
            $this->model = new $modelName();
        }
    }
}

?>