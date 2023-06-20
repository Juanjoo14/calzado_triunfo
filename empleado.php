<?php
include "conexion.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Botones con Tablas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <h2>Empleados</h2>
        <p>Pulsa el boton agregar para añadir un nuevo empleado</p>
        <a href="agregaremp.php" class="btn btn-primary">Agregar</a><br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Código de conexión a la base de datos
                include("conexion.php");

                // Consulta a la base de datos
                $sql = "SELECT id, nombre, apellido FROM empleados";
                $result = $conn->query($sql);

                // Verificar si la consulta se ejecutó correctamente
                if ($result) {
                    // Verificar si se encontraron resultados
                    if ($result->num_rows > 0) {
                        // Recorrer los resultados y mostrarlos en la tabla
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["apellido"] . "</td>";
                            echo "<td>";
                            echo "<a href='editaremp.php?id=" . $row['id'] . "' class='btn btn-primary'>Editar</a>";
                            echo "<a class='btn btn-danger' href='eliminaremp.php?id=" . $row['id'] . "' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este empleado?')\">Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
                    }
                } else {
                    echo "Error en la consulta: " . $conn->error;
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </tbody>
        </table>

        <a class="text-dark" href="anadir.php">Regresar al menu principal</a>
    </div>
</body>
</html>
