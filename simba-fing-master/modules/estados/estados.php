<?php

//include '../../views/header.php';
//include '../../views/footer.php';

?>

<!--Vista-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h2>Estados</h2>
    </div>
    <div class="row">
        <p>
            <a class="btn btn-success" href="new.php">Agregar nuevo estado</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre del estado</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <!--Método para renderizar los datos de la tabla-->
                <?php
                include '../../config/database.php';
                $pdo = Database::connect();
                $sql = 'SELECT * FROM estados ORDER BY id_estado';
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['clave_estado'] . '</td>';
                    echo '<td>'. $row['nombre_estado'] . '</td>';
                    echo '<td>';
                    echo '<a class="btn btn-primary btn-sm" href="edit.php?id_estado='.$row['id_estado'].'">Editar</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger btn-sm" href="delete.php?id_estado='.$row['id_estado'].'">Eliminar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                Database::disconnect();
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>