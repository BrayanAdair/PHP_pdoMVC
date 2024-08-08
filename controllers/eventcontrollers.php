<?php
// Call model
require_once "models/eventModel.php";
//$events = Event::getAllEvents();
//echo __DIR__ . '/models/eventModel.php';
//require_once __DIR__ . '/models/eventModel.php';
//require_once  __DIR__ . '/../models/eventModel.php';
echo "entro 1";

class EventController{

    private $eventModel;
    private $respuesta;

    public function __construct(){
       // $row = array();
        //$this->eventModel = new Event();
        //$this->eventModel = null;
        echo "entro";   
    }

    public function getEventsController()
    {
        try {
            //$resultados = $this->eventModel->getAllEvents();
            $resultados = Event::getAllEvents();
            $this->respuesta = array(
                "state" => true,
                "events" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function getEventsDestacadosController()
    {
        try {
            //$resultados = $this->eventModel->getAllDestacados();
            $resultados = Event::getAllDestacados();
            //print_r($resultados); 
            $this->respuesta = array(
                "state" => true,
                "events" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }
}
?>