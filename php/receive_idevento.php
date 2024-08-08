<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idevento = isset($_POST['idevento']) ? $_POST['idevento'] : 'No recibido';
    echo "ID del evento recibido: " . $idevento;
}
?>
