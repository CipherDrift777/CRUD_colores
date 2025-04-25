<?php

include_once 'db/conexion.php';

// Sentencia SQL
$sql_leer = 'SELECT * FROM colores';

// Preparar 
$gsent =  $pdo->prepare($sql_leer);
// Ejecutar
$gsent->execute();
// Devolvemos un array con fetchAll
$resultado = $gsent->fetchAll();

var_dump($resultado);
