<?php

class View {

    private $data = [];

    function __construct() {
        logMessage(__CLASS__, __METHOD__);
    }

    function render($nombre, $data = []) {
        logMessage(__CLASS__, __METHOD__, "NOMBRE: $nombre, DATA: $data");
        
        $this->data = $data;
        require 'views/' . $nombre . '.php';
    }

    public function showMessages() {
        logMessage(__CLASS__, __METHOD__);
        $this->handleMessages();
        $this->showError();
        $this->showSuccess();
    }

    private function handleMessages() {
        logMessage(__CLASS__, __METHOD__);
        if (isset($_GET['success']) && isset($_GET['error'])) {
        } elseif (isset($_GET['success'])) {
            $this->handleSuccess();
        } elseif (isset($_GET['error'])) {
            $this->handleError();
        }
    }

    private function handleError() {
        logMessage(__CLASS__, __METHOD__);
        if (isset($_GET['error'])) {
            $hash = $_GET['error'];
            $errors = new Error();

            if ($errors->existsKey($hash)) {
                error_log('View::handleError() existsKey =>' . $errors->get($hash));
                $this->data['error'] = $errors->get($hash);
            } else {
                $this->data['error'] = NULL;
            }
        }
    }

    private function handleSuccess() {
        logMessage(__CLASS__, __METHOD__);
        if (isset($_GET['success'])) {
            $hash = $_GET['success'];
            $success = new Success();

            if ($success->existsKey($hash)) {
                error_log('View::handleSuccess() existsKey =>' . $success->existsKey($hash));
                $this->data['success'] = $success->get($hash);
            } else {
                $this->data['success'] = NULL;
            }
        }
    }

    public function showError() {
        logMessage(__CLASS__, __METHOD__);
        if (isset($this->data['error'])) {
            echo '<div class="error">' . $this->data['error'] . '</div>';
        }
    }

    public function showSuccess() {
        logMessage(__CLASS__, __METHOD__);
        if (isset($this->data['success'])) {
            echo '<div class="success">' . $this->data['success'] . '</div>';
        }
    }
}

?>