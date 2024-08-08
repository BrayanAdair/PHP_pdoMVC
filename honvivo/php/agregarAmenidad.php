<?php
session_start();
include '../conn.php';

if (isset($_POST['nombreAmenidad']) && isset($_SESSION['id'])) {
    $nombreAmenidad = $_POST['nombreAmenidad'];
    $idUsuario = $_SESSION['id'];

    try {
        $stmt = $pdo->prepare("INSERT INTO amenidades (amenidad, idusuario) VALUES (:amenidad, :idusuario)");
        $stmt->execute(['amenidad' => $nombreAmenidad, 'idusuario' => $idUsuario]);
        
        // Redireccionar de vuelta a la página del perfil
        $_SESSION['agregaramenidad'] = 'true';
        header("Location: ../usuario.php");
    } catch (\PDOException $e) {
        $_SESSION['agregaramenidad'] = 'false';
        header("Location: ../usuario.php");
        // Opcional: Redireccionar a una página de error
    }
}
?>
