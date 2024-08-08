<?php
include_once 'conn.php';

class Category{
    private $db;
    protected $idgaleria;
    protected $foto;
    protected $idusuario;

    public function __construct($row){
        $this->idgaleria = $row["idgaleria"];
        $this->foto = $row["foto"];
        $this->idusuario = $row["idusuario"];
    }

    /**
     * Get the value of idgaleria
     */ 
    public function getIdgaleria()
    {
        return $this->idgaleria;
    }

    /**
     * Set the value of idgaleria
     *
     * @return  self
     */ 
    public function setIdgaleria($idgaleria)
    {
        $this->idgaleria = $idgaleria;

        return $this;
    }

    /**
     * Get the value of foto
     */ 
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setFoto($foto)
    {
        $this->foto = $foto;

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
