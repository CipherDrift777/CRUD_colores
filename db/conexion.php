<?php

// Establecemos la conexion de la base de datos con $pdo

$link = 'mysql:host=localhost;dbname=CRUD_colores';
$usuario = 'root';
$pass = 'man777';

try {

    $pdo = new PDO($link, $usuario, $pass);
    echo 'Conectado';
} catch (PDOException $ex) {
    echo 'Error' . $ex->getMessage();
    die('No se pudo conectar a la base de datos.');
}
