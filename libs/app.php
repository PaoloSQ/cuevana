<?php
class App{

    private $url;

    public function __construct(){
        $this->url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : null;
        logMessage(__CLASS__, __METHOD__, 'URL: ' . $this->url);

        if (!empty($this->url)) {
            $this->url = explode('/', $this->url);
        }

        $this->processUrl();
    }

    private function processUrl(){
        logMessage(__CLASS__, __METHOD__, $this->url[0]);

        if (empty($this->url[0])) {
            $this->loadDefaultController();
        } else {
            $this->loadRequestedController();
        }
    }

    private function loadDefaultController(){
        logMessage(__CLASS__, __METHOD__);
        require_once 'controllers/HomeController.php';
        $controllerName = 'HomeController';
        $controller = new $controllerName();
        $controller->render();
    }

    private function loadRequestedController(){
        $controllerName = ucfirst($this->url[0]) . "Controller";
        logMessage(__CLASS__, __METHOD__, "ControllerName: " . $controllerName);

        if ($this->loadController($controllerName)) {
            $this->initializeController($controllerName);
        } else {
            $this->loadErrorController();
        }
    }

    private function loadController($controllerName){
        $controllerFile = 'controllers/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            return true;
        }

        return false;
    }

    private function initializeController($controllerName){
        $controller = new $controllerName();
        $method = isset($this->url[1]) ? $this->url[1] : '';

        logMessage(__CLASS__, __METHOD__, "controller: " . var_export($controller, true) . ", method: $method");

        $this->callControllerMethod($controller, $method);
    }

    private function callControllerMethod($controller, $method){
        $controller->loadModel($this->url[0]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jsonData = json_decode(file_get_contents("php://input"), true);
            $_POST = array_merge($_POST, $jsonData);
            logMessage(__CLASS__, __METHOD__, "RQ_METHOD: POST, JSONDATA: $jsonData");
        }

        if (method_exists($controller, $method)) {
            $controller->{$method}();
        } else {
            $controller->render();
        }
    }
}
?>