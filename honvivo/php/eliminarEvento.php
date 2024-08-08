<?php
session_start();
include("../conn.php");

if(isset($_GET['idevento']) && isset($_SESSION['id'])) {
    $idevento = $_GET['idevento'];

    try {
        $query = "DELETE FROM eventos WHERE idevento = :idevento AND idusuario = :idUsuario";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':idevento', $idevento, PDO::PARAM_INT);
        $stmt->bindValue(':idUsuario', $_SESSION['id'], PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['eliminado'] = 'true';
        header("Location: ../usuario.php");
    } catch (\PDOException $e) {
        $_SESSION['eliminado'] = 'false';
        header("Location: ../usuario.php");
    }
} else {
    echo "Solicitud no válida.";
}
?>
