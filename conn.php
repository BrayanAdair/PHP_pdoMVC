<?php
require_once 'config/config.php';

try {
     $pdo = new PDO($dsn, $user, $pass, $options);

} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
     echo 'Error con nuestra base de datos contacte a soporte: ' . $e->getMessage();
}
?>