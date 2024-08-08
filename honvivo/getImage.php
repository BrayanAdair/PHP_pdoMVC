<?php
include("conn.php"); // Asegúrate de que este es el path correcto

if(isset($_GET["idusuario"])) {
    $idusuario = $_GET["idusuario"];

    $sql = "SELECT fotouser FROM usuarios WHERE idusuario = :idusuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idusuario", $idusuario, PDO::PARAM_INT);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if($usuario && $usuario["fotouser"] && strlen($usuario["fotouser"]) > 0) {
        $fotouser = $usuario["fotouser"];
        header("Content-Type: image/png");
        echo $fotouser;
    } else {
        header("Location: img/author/default.png");
    }
} else {
    header("Location: img/author/default.png");
}
exit;
?>
