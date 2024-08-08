<?php
include("conn.php");

if(isset($_GET["idevento"])) {
    $idevento = $_GET["idevento"];

    $sql = "SELECT fotoevento FROM eventos WHERE idevento = :idevento";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idevento", $idevento, PDO::PARAM_INT);
    $stmt->execute();

    $evento = $stmt->fetch(PDO::FETCH_ASSOC);
    if($evento && $evento["fotoevento"] && strlen($evento["fotoevento"]) > 0) {
        header("Content-Type: image/png");
        echo $evento["fotoevento"];
    } else {
        header("Location: img/author/defaulEvento.png");
    }
} else {
    header("Location: img/author/defaulEvento.png");
}
exit;
?>
