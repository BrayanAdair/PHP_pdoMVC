<?php
include_once './conn.php';

class Event{
    private $db;
    protected $idevento;
    protected $titulo;
    protected $fecha;
    protected $hora;
    protected $idusuario;
    protected $idciudad;
    protected $idcategoria;
    protected $fotoevento;
    protected $whatsapp;
    protected $linkexterno;
    protected $pgeneral;
    protected $pvip;
    protected $pregeneral;
    protected $previp;
    protected $tprincipal;
    protected $tsecundario;
    protected $tpie;
    protected $free;
    protected $idcategoriasecundaria;
    protected $destacado;
    protected $nombreCiudad;
    protected $nombreCategoria;
    protected $nombreCategoriaSecundaria;
    protected $ubicacion;
    protected $nombreUsuario;
    protected $fotouser;

    public function __construct($row){
        $this->idevento = $row["idevento"];
        $this->titulo = $row["titulo"];
        $this->fecha = $row["fecha"];
        $this->hora = $row["hora"];
        $this->idusuario = $row["idusuario"];
        $this->idciudad = $row["idciudad"];
        $this->idcategoria = $row["idcategoria"];
        $this->fotoevento = $row["fotoevento"];
        $this->whatsapp = $row["whatsapp"];
        $this->linkexterno = $row["linkexterno"];
        $this->pgeneral = $row["pgeneral"];
        $this->pvip = $row["pvip"];
        $this->pregeneral = $row["pregeneral"];
        $this->previp = $row["previp"];
        $this->tprincipal = $row["tprincipal"];
        $this->tsecundario = $row["tsecundario"];
        $this->tpie = $row["tpie"];
        $this->free = $row["free"];
        $this->idcategoriasecundaria = $row["idcategoriasecundaria"];
        $this->destacado = $row["destacado"];
        $this->nombreCiudad = $row["nombreCiudad"];
        $this->nombreCategoria = $row["nombreCategoria"];
        $this->nombreCategoriaSecundaria = $row["nombreCategoriaSecundaria"];
        $this->ubicacion = $row["ubicacion"];
        $this->nombreUsuario = $row["nombreUsuario"];
        $this->fotouser = $row["fotouser"];
    }

    public static function getAllEvents() {
        $db = DBConexion::connection();
        $data = $db->query("SELECT * FROM eventos");
        $events = array();

        while ( $row = $data->fetch_assoc() ) {
            $event = new Event($row);
            $events[] = $event;
        }

        return $events;
    }

    public static function getAllDestacados() {
        $query ="SELECT e.*, 
                ci.ciudad AS nombreCiudad, 
                c1.categoria AS nombreCategoria, 
                c2.categoria AS nombreCategoriaSecundaria, 
                u.ubicacion, 
                u.nombre AS nombreUsuario, 
                u.fotouser
            FROM eventos AS e
            LEFT JOIN ciudades AS ci ON e.idciudad = ci.idciudad 
            LEFT JOIN categorias AS c1 ON e.idcategoria = c1.idcategoria
            LEFT JOIN usuarios AS u ON e.idusuario = u.idusuario
            LEFT JOIN categorias AS c2 ON e.idcategoriasecundaria = c2.idcategoria
            WHERE destacado=1";

        $stmt = $pdo->prepare($query);  
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        $events = array();

        foreach ($resultados as $row) {
            $event = new Event($row);
            $events[] = $event;
        }
        return $events;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

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
     * Get the value of fotoevento
     */ 
    public function getFotoevento()
    {
        return $this->fotoevento;
    }

    /**
     * Set the value of fotoevento
     *
     * @return  self
     */ 
    public function setFotoevento($fotoevento)
    {
        $this->fotoevento = $fotoevento;

        return $this;
    }

    /**
     * Get the value of whatsapp
     */ 
    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    /**
     * Set the value of whatsapp
     *
     * @return  self
     */ 
    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    /**
     * Get the value of linkexterno
     */ 
    public function getLinkexterno()
    {
        return $this->linkexterno;
    }

    /**
     * Set the value of linkexterno
     *
     * @return  self
     */ 
    public function setLinkexterno($linkexterno)
    {
        $this->linkexterno = $linkexterno;

        return $this;
    }

    /**
     * Get the value of pgeneral
     */ 
    public function getPgeneral()
    {
        return $this->pgeneral;
    }

    /**
     * Set the value of pgeneral
     *
     * @return  self
     */ 
    public function setPgeneral($pgeneral)
    {
        $this->pgeneral = $pgeneral;

        return $this;
    }

    /**
     * Get the value of pvip
     */ 
    public function getPvip()
    {
        return $this->pvip;
    }

    /**
     * Set the value of pvip
     *
     * @return  self
     */ 
    public function setPvip($pvip)
    {
        $this->pvip = $pvip;

        return $this;
    }

    /**
     * Get the value of pregeneral
     */ 
    public function getPregeneral()
    {
        return $this->pregeneral;
    }

    /**
     * Set the value of pregeneral
     *
     * @return  self
     */ 
    public function setPregeneral($pregeneral)
    {
        $this->pregeneral = $pregeneral;

        return $this;
    }

    /**
     * Get the value of previp
     */ 
    public function getPrevip()
    {
        return $this->previp;
    }

    /**
     * Set the value of previp
     *
     * @return  self
     */ 
    public function setPrevip($previp)
    {
        $this->previp = $previp;

        return $this;
    }

    /**
     * Get the value of tprincipal
     */ 
    public function getTprincipal()
    {
        return $this->tprincipal;
    }

    /**
     * Set the value of tprincipal
     *
     * @return  self
     */ 
    public function setTprincipal($tprincipal)
    {
        $this->tprincipal = $tprincipal;

        return $this;
    }

    /**
     * Get the value of tsecundario
     */ 
    public function getTsecundario()
    {
        return $this->tsecundario;
    }

    /**
     * Set the value of tsecundario
     *
     * @return  self
     */ 
    public function setTsecundario($tsecundario)
    {
        $this->tsecundario = $tsecundario;

        return $this;
    }

    /**
     * Get the value of tpie
     */ 
    public function getTpie()
    {
        return $this->tpie;
    }

    /**
     * Set the value of tpie
     *
     * @return  self
     */ 
    public function setTpie($tpie)
    {
        $this->tpie = $tpie;

        return $this;
    }

    /**
     * Get the value of free
     */ 
    public function getFree()
    {
        return $this->free;
    }

    /**
     * Set the value of free
     *
     * @return  self
     */ 
    public function setFree($free)
    {
        $this->free = $free;

        return $this;
    }

    /**
     * Get the value of idcategoriasecundaria
     */ 
    public function getIdcategoriasecundaria()
    {
        return $this->idcategoriasecundaria;
    }

    /**
     * Set the value of idcategoriasecundaria
     *
     * @return  self
     */ 
    public function setIdcategoriasecundaria($idcategoriasecundaria)
    {
        $this->idcategoriasecundaria = $idcategoriasecundaria;

        return $this;
    }

    /**
     * Get the value of idevento
     */ 
    public function getIdevento()
    {
        return $this->idevento;
    }

    /**
     * Set the value of idevento
     *
     * @return  self
     */ 
    public function setIdevento($idevento)
    {
        $this->idevento = $idevento;

        return $this;
    }

    /**
     * Get the value of destacado
     */ 
    public function getDestacado()
    {
        return $this->destacado;
    }

    /**
     * Set the value of destacado
     *
     * @return  self
     */ 
    public function setDestacado($destacado)
    {
        $this->destacado = $destacado;

        return $this;
    }

    /**
     * Get the value of nombreCiudad
     */ 
    public function getNombreCiudad()
    {
        return $this->nombreCiudad;
    }

    /**
     * Set the value of nombreCiudad
     *
     * @return  self
     */ 
    public function setNombreCiudad($nombreCiudad)
    {
        $this->nombreCiudad = $nombreCiudad;

        return $this;
    }

    /**
     * Get the value of nombreCategoria
     */ 
    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    /**
     * Set the value of nombreCategoria
     *
     * @return  self
     */ 
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;

        return $this;
    }

    /**
     * Get the value of nombreCategoriaSecundaria
     */ 
    public function getNombreCategoriaSecundaria()
    {
        return $this->nombreCategoriaSecundaria;
    }

    /**
     * Set the value of nombreCategoriaSecundaria
     *
     * @return  self
     */ 
    public function setNombreCategoriaSecundaria($nombreCategoriaSecundaria)
    {
        $this->nombreCategoriaSecundaria = $nombreCategoriaSecundaria;

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
     * Get the value of nombreUsuario
     */ 
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set the value of nombreUsuario
     *
     * @return  self
     */ 
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

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
}
?>
