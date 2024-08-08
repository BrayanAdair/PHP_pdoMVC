<?php
session_start();
include("../conn.php"); // Asegúrate de que este es el path correcto

if(isset($_SESSION["id"])) {
    $idusuario = $_SESSION["id"];

    $sql = "SELECT fotouser FROM usuarios WHERE idusuario = :idusuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idusuario", $idusuario, PDO::PARAM_INT);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if($usuario && $usuario["fotouser"]) {
        $fotouser = $usuario["fotouser"];
        header("Content-Type: image/png"); // Asegúrate de cambiar esto según el formato de tu imagen
        echo $fotouser;
    }
} else {
    // Si no hay sesión o no se encuentra la imagen, puedes dirigir a una imagen predeterminada
    header("Location: img/author/default.png");
}
exit;
?>
