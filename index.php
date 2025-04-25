<?php
// Hicimos la conexion
include_once 'db/conexion.php';

// Sentencia SQL (LEER)
$sql_leer = 'SELECT * FROM colores';

// Preparar 
$gsent =  $pdo->prepare($sql_leer);
// Ejecutar
$gsent->execute();
// Devolvemos un array con fetchAll
$resultado = $gsent->fetchAll();

// var_dump($resultado);

// AGREGAR
if ($_POST) {
    $color = $_POST['color'];
    $descripcion = $_POST['descripcion'];

    $sql_agregar = 'INSERT INTO colores (color,descripcion) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($color, $descripcion));

    header('location: index.php');
}

?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <!-- Empezamos la prueba con Bootstrap -->
    <h1>Hello, world!</h1>

    <!-- Creamos la alerta para traer los datos -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php foreach ($resultado as $dato): ?>
                    <div
                        class="alert alert-<?php echo $dato['color'] ?> text-uppercase
                        d-flex justify-content-between align-items-center" role="alert">
                        <?php echo $dato['color'] ?>
                        -
                        <?php echo $dato['descripcion']
                        ?>
                        <a href="" class="ms-auto d-block text-end">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </div>

                <?php endforeach ?>
            </div>
            <!-- Implementamos formulario para  agregar los elementos -->
            <div class="col-md-6">
                <h2>Agregar Elementos</h2>
                <form method="POST">
                    <input type="text" class="form-control" name="color"
                        placeholder="Color">
                    <input type="text" class="form-control mt-3" name="descripcion" placeholder="Descripcion">
                    <button class="btn btn-primary mt-3">Agregar</button>
                </form>
            </div>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>