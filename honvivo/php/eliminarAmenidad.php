<?php
session_start();
include '../conn.php'; // Incluir conexión a la base de datos

if (isset($_GET['id']) && isset($_SESSION['id'])) {
    $idAmenidad = $_GET['id'];
    $idUsuario = $_SESSION['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM amenidades WHERE idamenidad = :idamenidad AND idusuario = :idusuario");
        $stmt->execute(['idamenidad' => $idAmenidad, 'idusuario' => $idUsuario]);

        // Redireccionar de vuelta a la página del perfil
        $_SESSION['eliminaramenidad'] = 'true';
        header("Location: ../usuario.php");
    } catch (\PDOException $e) {
        $_SESSION['eliminaramenidad'] = 'false';
        header("Location: ../usuario.php");
        // Opcional: Redireccionar a una página de error
    }
}
?>
