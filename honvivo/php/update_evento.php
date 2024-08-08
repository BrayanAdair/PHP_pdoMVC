<?php
include("../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger el ID del evento
    $idevento = isset($_POST['idevento']) ? $_POST['idevento'] : '';
    if (empty($idevento)) {
        die("El ID del evento está vacío.");
    }

    // Preparar la consulta SQL inicial
    $sql = "UPDATE eventos SET ";
    $params = array();

    // Verificar y añadir los campos a actualizar
    $fields = [
        'titulo', 'fecha', 'hora', 'whatsapp', 'linkexterno', 'pgeneral', 
        'pvip', 'pregeneral', 'previp', 'tprincipal', 'tsecundario', 'tpie', 'idcategoria'
    ];
    

    foreach ($fields as $field) {
        if (!empty($_POST[$field])) {
            $sql .= "$field = :$field, ";
            $params[":$field"] = $_POST[$field];
        }
    }

    // Tratar la foto del evento, si está presente
    if (isset($_FILES["fotoevento"]) && $_FILES["fotoevento"]["error"] == 0) {
        if ($_FILES["fotoevento"]["size"] > 2097152) {
            echo "El archivo es demasiado grande.";
            exit;
        }

        $imgContentEvento = file_get_contents($_FILES["fotoevento"]["tmp_name"]);
        $sql .= "fotoevento = :fotoevento, ";
        $params[':fotoevento'] = $imgContentEvento;
        echo "Archivo de imagen procesado.<br>"; // Mensaje de depuración
    }

    // Verificar que haya al menos un campo para actualizar
    if (count($params) == 0) {
        die("No hay campos para actualizar.");
    }

    // Eliminar la última coma y espacio del string de SQL
    $sql = rtrim($sql, ", ");

    // Completar la consulta SQL
    $sql .= " WHERE idevento = :idevento";
    $params[":idevento"] = $idevento;

    // Preparar y ejecutar la consulta
    $stmt = $pdo->prepare($sql);
    foreach ($params as $key => &$val) {
        if ($key == ':fotoevento') {
            $stmt->bindParam($key, $val, PDO::PARAM_LOB);
        } else {
            $stmt->bindParam($key, $val);
        }
    }
    // Ejecutar la consulta
    if ($stmt->execute()) {
        $_SESSION['updateevento'] = 'true';
        header("Location: ../usuario.php");
    } else {
        $_SESSION['updateevento'] = 'false';
        header("Location: ../usuario.php");
        //print_r($stmt->errorInfo());
    }
}
?>
