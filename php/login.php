<?php
// Incluye el archivo de conexión a la base de datos
include("../conn.php");

// Inicializa la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores ingresados por el usuario
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT idusuario, correo, idrol, nombre, idciudad, telefono FROM usuarios WHERE correo = :correo AND contrasena = :contrasena";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":correo", $correo);
    $stmt->bindParam(":contrasena", $contrasena);
    $stmt->execute();

    // Verifica si se encontraron resultados
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Guarda la información del usuario en variables de sesión
        $_SESSION["id"] = $row["idusuario"];
        $_SESSION["correo"] = $row["correo"];
        $_SESSION["idrol"] = $row["idrol"];
        $_SESSION["nombre"] = $row["nombre"];
        $_SESSION["idciudad"] = $row["idciudad"];
        $_SESSION["telefono"] = $row["telefono"];
        
        
        // Redirige al usuario según su rol
        if ($_SESSION["idrol"] == 1) {
            echo '<script type="text/javascript">';
            echo 'window.location.href="../usuario.php";';
            echo '</script>';
        } elseif ($_SESSION["idrol"] == 2) {
            echo '<script type="text/javascript">';
            echo 'window.location.href="../usuario.php";';
            echo '</script>';
        } elseif ($_SESSION["idrol"] == 3) {
            echo '<script type="text/javascript">';
            echo 'window.location.href="../usuario.php";';
            echo '</script>';
        } else {
            // En caso de que el rol no sea válido, puedes redirigir a una página de error o hacer algo más
            header("Location: error.php");
        }
    } else {
        $error_message = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}
?>