<?php
// Obtener el ID del empleado a editar
$empleadoID = $_GET['id'];

// Código de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "gestion_empleados";

// Crear una conexión
$conn = mysqli_connect($servername, $username, $password, $database) or die("Problemas con la conexión");

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los nuevos valores del formulario de edición
  $nombre = $_POST['Nombre'];
  $apellido = $_POST['Apellido'];
  $departamentoID = $_POST['DepartamentoId'];
  $fechaContrato = $_POST['FechaContrato'];

  // Actualizar los datos del empleado en la base de datos
  $sql = "UPDATE empleados SET Nombre = '$nombre', Apellido = '$apellido', DepartamentoID = '$departamentoID', FechaContrato = '$fechaContrato' WHERE ID = $empleadoID";
  $result = $conn->query($sql);

  if ($result) {
    // Los datos del empleado se han actualizado correctamente
    header("Location: empleado.php");
    exit(); // Es importante terminar la ejecución después de redirigir
  } else {
    // Ocurrió un error al actualizar los datos del empleado
    $error = "Error al actualizar los datos del empleado";
  }
}

// Obtener los datos del empleado a editar
$query = "SELECT * FROM empleados WHERE ID = $empleadoID";
$result = $conn->query($query);
$empleado = $result->fetch_assoc();

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Editar Empleado</title>
  <style>
    .custom-form-group {
      margin-bottom: 15px;
    }

    .custom-input {
      border: 2px solid pink;
      border-radius: 20px;
      width: 400px;
      background-color: black;
      color: white;
    }

    .custom-button {
      background-color: black;
      color: white;
    }

    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
</head>

<body>
  <div class="container">
    <img src="img/calzado_triunfo.png" alt="">
    <br>
    <h1>Editar Empleado</h1>
    <br><br>
    <form method="post">
      <div class="custom-form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text" class="form-control rounded-4 border-2 custom-input " id="Nombre" name="Nombre" value="<?php echo isset($empleado['Nombre']) ? $empleado['Nombre'] : ''; ?>">
      </div>
      <div class="custom-form-group">
        <label for="Apellido">Apellido:</label>
        <input type="text" class="form-control rounded-4 border-2 custom-input " id="Apellido" name="Apellido" value="<?php echo isset($empleado['Apellido']) ? $empleado['Apellido'] : ''; ?>">
      </div>
      <div class="custom-form-group">
        <label for="DepartamentoId">DepartamentoID:</label>
        <input type="text" class="form-control rounded-4 border-2 custom-input " id="DepartamentoId" name="DepartamentoId" value="<?php echo isset($empleado['DepartamentoID']) ? $empleado['DepartamentoID'] : ''; ?>">
      </div>
      <div class="custom-form-group">
        <label for="FechaContrato">Fecha Contrato:</label>
        <input type="text" class="form-control rounded-4 border-2 custom-input " id="FechaContrato" name="FechaContrato" value="<?php echo isset($empleado['FechaContrato']) ? $empleado['FechaContrato'] : ''; ?>">
      </div>
      <input type="submit" class="btn custom-button" value="Actualizar">
      <p class="text-center">¿No tienes cuenta? <a class="text-dark" href="registrar.php">Registrate</a></p>
      <?php if (isset($error)) { ?>
        <p class="text-center text-danger"><?php echo $error; ?></p>
      <?php } ?>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
