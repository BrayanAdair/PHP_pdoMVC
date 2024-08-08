<?php
session_start();

$tiempo_inactivo = 1800; //30 minutos

// Verifica eltiempo sino cierra sesion
if (isset($_SESSION['ultimo_acceso'])) {
    $tiempo_transcurrido = time() - $_SESSION['ultimo_acceso'];
    if ($tiempo_transcurrido > $tiempo_inactivo) {
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }
}

// Actualiza el tiempo de último acceso
$_SESSION['ultimo_acceso'] = time();

// Validacion de auth
if (!isset($_SESSION["id"]) || !isset($_SESSION["correo"])) {
    header("Location: /");
    exit;
}

// Resto del código
?>
