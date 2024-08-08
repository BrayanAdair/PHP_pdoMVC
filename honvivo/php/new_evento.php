<?php
session_start();
if (isset($_SESSION["idciudad"])) {
    $idciudad = $_SESSION["idciudad"];
} else {
    echo "Error no se obtuvo la ciudad";
    exit;
}
include("../conn.php"); // Asegúrate de que este es el path correcto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $titulo = $_POST["titulo"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $idusuario = $_SESSION["id"]; //ID DE USUARIO LOGEADO
    $idciudad = $_SESSION["idciudad"]; //IDCIUDAD DE USUARIO LOGEADO
    $idcategoria  = $_POST["idcategoria"]; //LLAVE FORANEA desde ubicacion perfil
    $whatsapp = $_POST["whatsapp"];
    $linkexterno = $_POST["linkexterno"];
    $pgeneral = $_POST["pgeneral"];
    $pvip = $_POST["pvip"];
    $pregeneral = $_POST["pregeneral"];
    $previp = $_POST["previp"];
    $tprincipal = $_POST["tprincipal"];
    $tsecundario = $_POST["tsecundario"];
    $tpie = $_POST["tpie"];
    $eventoGratis = isset($_POST["eventoGratis"]) && $_POST["eventoGratis"] == '1' ? true : false;
    // Subir y procesar la foto del evento
    $imgContentEvento = null; // Inicializar la variable para el contenido de la imagen

    // Subir y procesar la foto del evento
    $imgContentEvento = null; // Inicializar la variable para el contenido de la imagen

    // Subir y procesar la foto del evento
    if (isset($_FILES["fotoevento"]) && $_FILES["fotoevento"]["error"] == 0) {
        // Verificar el tamaño del archivo
        if ($_FILES["fotoevento"]["size"] > 2097152) { // Límite de 2MB
            echo "El archivo es demasiado grande.";
            exit; // Detiene la ejecución del script si el archivo es demasiado grande
        }

        $imgContentEvento = file_get_contents($_FILES["fotoevento"]["tmp_name"]);
    } else {
        echo "Error en la carga: ";
        print_r($_FILES["fotoevento"]);
        exit; // Agregar un 'exit' para detener la ejecución en caso de error
    }

    // Preparar la consulta SQL para inserción
    $sql = "INSERT INTO eventos (titulo, fecha, hora, idusuario, idciudad, idcategoria, fotoevento, whatsapp, linkexterno, pgeneral, pvip, pregeneral, previp, tprincipal, tsecundario, tpie, free) VALUES (:titulo, :fecha, :hora, :idusuario, :idciudad, :idcategoria, :fotoevento, :whatsapp, :linkexterno, :pgeneral, :pvip, :pregeneral, :previp, :tprincipal, :tsecundario, :tpie, :eventoGratis )";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":hora", $hora);
    $stmt->bindParam(":idusuario", $idusuario);
    $stmt->bindParam(":idciudad", $idciudad);
    $stmt->bindParam(":idcategoria", $idcategoria);
    $stmt->bindParam(":fotoevento", $imgContentEvento, PDO::PARAM_LOB);
    $stmt->bindParam(":whatsapp", $whatsapp);
    $stmt->bindParam(":linkexterno", $linkexterno);
    $stmt->bindParam(":pgeneral", $pgeneral);
    $stmt->bindParam(":pvip", $pvip);
    $stmt->bindParam(":pregeneral", $pregeneral);
    $stmt->bindParam(":previp", $previp);
    $stmt->bindParam(":tprincipal", $tprincipal);
    $stmt->bindParam(":tsecundario", $tsecundario);
    $stmt->bindParam(":tpie", $tpie);
    $stmt->bindParam(":eventoGratis", $eventoGratis, PDO::PARAM_BOOL);
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redireccionar o mostrar un mensaje de éxito
        $_SESSION['creadoevento'] = 'true';
        header("Location: ../usuario.php");
    } else {
        $_SESSION['creadoevento'] = 'false';
        header("Location: ../usuario.php");
    }
}
?>
