<?php
include("conn.php");

if (isset($_GET["idevento"])) {
    $idevento = $_GET["idevento"];

    $sql = "SELECT fotoevento FROM eventos WHERE idevento = :idevento";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idevento", $idevento, PDO::PARAM_INT);
    $stmt->execute();

    $evento = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($evento && !empty($evento["fotoevento"]) && strlen($evento["fotoevento"]) > 50) {
        error_log("Mostrando imagen del evento");
        header("Content-Type: image/png");
        echo $evento["fotoevento"];
    } else {
        error_log("Redireccionando a imagen por defecto");
        header("Location: ./img/author/defaultFoto.png");
    }
} else {
    error_log("ID de evento no proporcionado, redireccionando a imagen por defecto");
    header("Location: ./img/author/defaultFoto.png");
}
exit;
?>
