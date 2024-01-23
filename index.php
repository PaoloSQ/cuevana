<?php
header('Content-Type: text/html; charset=utf-8');

error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set("error_log", "php-errors.log");

error_log("");
error_log("---------------------------- Hello, errors! ----------------------------");

$currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
error_log("Abriendo desde la URL: " . $currentURL);

function logMessage($clase, $metodo, $mensaje = "Sin mensajes.") {
    if (is_array($mensaje) || is_null($mensaje)) {
        $mensaje = json_encode($mensaje, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } elseif (is_object($mensaje)) {
        $mensaje = json_encode((array)$mensaje, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    $logString = $clase . '::' . $metodo . ' - ' . $mensaje;
    error_log($logString);
}

require 'vendor/autoload.php';
require 'config/config.php';

require 'libs/controller.php';
require 'libs/model.php';
require 'libs/view.php';
require 'libs/app.php';

require 'controllers/errores.php';
require 'models/movieApiModel.php';

try {
    $app = new App();
} catch (Exception $e) {
    error_log("Error al inicializar la aplicación: " . $e->getMessage());
}

?>
