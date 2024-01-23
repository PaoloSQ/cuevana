<?php

class Errores extends Controller {

    function __construct() {
        logMessage(__CLASS__, __METHOD__);
        parent::__construct();
    }

    function render() {
        logMessage(__CLASS__, __METHOD__);
        header('Location: ' . BASE_URL);
        exit();
    }
    
}

?>
