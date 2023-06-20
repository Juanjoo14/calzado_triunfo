<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
        <h2>Departamentos</h2>
        <p>Pulsa el boton agregar para añadir un nuevo departamento</p>
        <a href="agregardep.php" class="btn btn-primary">Agregar</a><br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Código de conexión a la base de datos
                include("conexion.php");

                // Consulta a la base de datos
                $sql = "SELECT id, nombre FROM departamentos";
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
                            echo "<td>";
                            echo "<a href='editardep.php?id=" . $row['id'] . "' class='btn btn-primary'>Editar</a>";
                            echo "<a class='btn btn-danger' href='eliminardep.php?id=" . $row['id'] . "' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este departamento?')\">Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se encontraron resultados</td></tr>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>