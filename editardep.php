<?php
// Código de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "gestion_empleados";

// Crear una conexión
$conn = mysqli_connect($servername, $username, $password, $database) or die("Problemas con la conexión");

// Obtener el ID del departamento a editar
$departamentoID = $_GET['id'];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el nuevo valor del campo "Nombre"
    $nuevoNombre = $_POST["Nombre"];

    // Actualizar el campo "Nombre" en la base de datos
    $query = "UPDATE departamentos SET Nombre = '$nuevoNombre' WHERE ID = $departamentoID";
    $result = $conn->query($query);

    // Verificar si la actualización se realizó correctamente
    if ($result) {
        header("Location: departamentos.php");
        echo "Departamento actualizado correctamente";
    } else {
        echo "Error al actualizar el departamento: " . $conn->error;
    }
}

// Obtener los datos del departamento a editar
$query = "SELECT * FROM departamentos WHERE ID = $departamentoID";
$result = $conn->query($query);
$departamento = $result->fetch_assoc();

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

  <title>Editar Dpto</title>
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
    <h1>Editar Departamento</h1>
    <br><br>
    <form method="post">
      <div class="custom-form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text" class="form-control rounded-4 border-2 custom-input " id="Nombre" name="Nombre" value="<?php echo isset($departamento['Nombre']) ? $departamento['Nombre'] : ''; ?>">
      </div>
      <input type="submit" class="btn custom-button" value="Actualizar">
      <?php if (isset($error)) { ?>
        <p class="text-center text-danger"><?php echo $error; ?></p>
      <?php } ?>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
