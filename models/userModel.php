<?php
include_once 'conn.php';

class User{
    private $db;
    protected $idusuario;
    protected $nombre;
    protected $correo;
    protected $contrasena;
    protected $idrol;
    protected $fotouser;
    protected $ubicacion;
    protected $idciudad;
    protected $ubicacionlink;
    protected $telefono;

    public function __construct($row){
        $this->idusuario = $row["idusuario"];
        $this->nombre = $row["nombre"];
        $this->correo = $row["correo"];
        $this->contrasena = $row["contrasena"];
        $this->idrol = $row["idrol"];
        $this->fotouser = $row["fotouser"];
        $this->ubicacion = $row["ubicacion"];
        $this->idciudad = $row["idciudad"];
        $this->ubicacionlink = $row["ubicacionlink"];
        $this->telefono = $row["telefono"];
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

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of contrasena
     */ 
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     *
     * @return  self
     */ 
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get the value of idrol
     */ 
    public function getIdrol()
    {
        return $this->idrol;
    }

    /**
     * Set the value of idrol
     *
     * @return  self
     */ 
    public function setIdrol($idrol)
    {
        $this->idrol = $idrol;

        return $this;
    }

    /**
     * Get the value of fotouser
     */ 
    public function getFotouser()
    {
        return $this->fotouser;
    }

    /**
     * Set the value of fotouser
     *
     * @return  self
     */ 
    public function setFotouser($fotouser)
    {
        $this->fotouser = $fotouser;

        return $this;
    }

    /**
     * Get the value of ubicacion
     */ 
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set the value of ubicacion
     *
     * @return  self
     */ 
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get the value of idciudad
     */ 
    public function getIdciudad()
    {
        return $this->idciudad;
    }

    /**
     * Set the value of idciudad
     *
     * @return  self
     */ 
    public function setIdciudad($idciudad)
    {
        $this->idciudad = $idciudad;

        return $this;
    }

    /**
     * Get the value of ubicacionlink
     */ 
    public function getUbicacionlink()
    {
        return $this->ubicacionlink;
    }

    /**
     * Set the value of ubicacionlink
     *
     * @return  self
     */ 
    public function setUbicacionlink($ubicacionlink)
    {
        $this->ubicacionlink = $ubicacionlink;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}