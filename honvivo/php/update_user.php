<?php
session_start();
include("../conn.php"); // Asegúrate de que este es el path correcto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ID del usuario logueado
    $idusuario = $_SESSION["id"];
    
    // Preparar la consulta SQL inicial
    $sql = "UPDATE usuarios SET ";
    $params = array();
    
    // Verificar y añadir los campos a actualizar
    
    if (!empty($_POST["nombre"])) {
        $sql .= "nombre = :nombre, ";
        $params[":nombre"] = $_POST["nombre"];
    }
    if (!empty($_POST["correo"])) {
        $sql .= "correo = :correo, ";
        $params[":correo"] = $_POST["correo"];
    }
    if (!empty($_POST["contrasena"])) {
        $sql .= "contrasena = :contrasena, ";
        $params[":contrasena"] = $_POST["contrasena"];
    }
    if (!empty($_POST["ubicacion"])) {
        $sql .= "ubicacion = :ubicacion, ";
        $params[":ubicacion"] = $_POST["ubicacion"];
    }
    if (!empty($_POST["SelectCiudad"])) {
        $sql .= "idciudad = :idciudad, ";
        $params[":idciudad"] = $_POST["SelectCiudad"];
    }
    if (!empty($_POST["ubicacionlink"])) {
        $sql .= "ubicacionlink = :ubicacionlink, ";
        $params[":ubicacionlink"] = $_POST["ubicacionlink"];
    }
   

    if (isset($_FILES["perfil"]) && $_FILES["perfil"]["error"] == 0) {
        // Verificar el tamaño del archivo
        if ($_FILES["perfil"]["size"] > 2097152) { // Límite de 2MB
            echo "El archivo es demasiado grande.";
            exit; // Detiene la ejecución del script si el archivo es demasiado grande
        }
    
        $imagen = $_FILES["perfil"]["tmp_name"];
        $imgContent = file_get_contents($imagen);
    
        $sql .= "fotouser = :fotouser, ";
        $params[":fotouser"] = $imgContent;
    } else {
        echo "Error en la carga: ";
        print_r($_FILES["perfil"]);
        // Considera si quieres detener la ejecución del script aquí también
    }
    


    if (!empty($_POST["telefono"])) {
        $sql .= "telefono = :telefono, ";
        $params[":telefono"] = $_POST["telefono"];
    }
    // Eliminar la última coma y espacio del string de SQL
    $sql = rtrim($sql, ", ");
    
    // Completar la consulta SQL
    $sql .= " WHERE idusuario = :idusuario";
    $params[":idusuario"] = $idusuario;
    
    // Preparar y ejecutar la consulta
    $stmt = $pdo->prepare($sql);
    foreach ($params as $key => &$val) {
        $stmt->bindParam($key, $val);
    }
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        $_SESSION['updateuser'] = 'true';
        header("Location: ../usuario.php");
    } else {
        $_SESSION['updateuser'] = 'false';
        header("Location: ../usuario.php");
    }
}
?>
