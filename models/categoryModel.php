<?php
include_once 'conn.php';

class Category{
    private $db;
    protected $idcategoria;
    protected $categoria;

    public function __construct($row){
        $this->idcategoria = $row["idcategoria"];
        $this->categoria = $row["categoria"];
    }

    /**
     * Get the value of idcategoria
     */ 
    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

    /**
     * Set the value of idcategoria
     *
     * @return  self
     */ 
    public function setIdcategoria($idcategoria)
    {
        $this->idcategoria = $idcategoria;

        return $this;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}