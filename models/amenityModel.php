<?php
include_once 'conn.php';

class Amenity{
    private $db;
    protected $idamenidad;
    protected $amenidad;
    protected $idusuario;

    public function __construct($row){
        $this->idamenidad = $row["idamenidad"];
        $this->amenidad = $row["amenidad"];
        $this->idusuario = $row["idusuario"];
    }

    /**
     * Get the value of idamenidad
     */ 
    public function getIdamenidad()
    {
        return $this->idamenidad;
    }

    /**
     * Set the value of idamenidad
     *
     * @return  self
     */ 
    public function setIdamenidad($idamenidad)
    {
        $this->idamenidad = $idamenidad;

        return $this;
    }

    /**
     * Get the value of amenidad
     */ 
    public function getAmenidad()
    {
        return $this->amenidad;
    }

    /**
     * Set the value of amenidad
     *
     * @return  self
     */ 
    public function setAmenidad($amenidad)
    {
        $this->amenidad = $amenidad;

        return $this;
    }

    /**
     * Get the value of idusuario
     */ 
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     *
     * @return  self
     */ 
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }
}
?>