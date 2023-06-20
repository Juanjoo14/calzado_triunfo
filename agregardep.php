<?php
// Código de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "gestion_empleados";

// Crear una conexión
$conn = mysqli_connect($servername, $username, $password, $database) or die("Problemas con la conexión");

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["Nombre"];

    // Insertar los datos en la base de datos
    $query = "INSERT INTO departamentos (Nombre) VALUES ('$nombre')";
    $result = $conn->query($query);

    // Verificar si la inserción se realizó correctamente
    if ($result) {
        header("Location: departamentos.php");
        echo "Empleado agregado correctamente";
    } else {
        echo "Error al agregar el empleado: " . $conn->error;
    }
}

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

  <title>Agregar</title>
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
    <h1>Agregar Departamento</h1>
    <br><br>
    <form method="post">
      <div class="custom-form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text" class="form-control rounded-4 border-2 custom-input " id="Nombre" name="Nombre" value="">
      </div>
      <input type="submit" class="btn custom-button" value="Agregar">
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
