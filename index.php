<?php
// Código de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "gestion_empleados";

// Crear una conexión
$conn = mysqli_connect($servername, $username, $password, $database) or die("Problemas con la conexión");

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los valores ingresados en el formulario de inicio de sesión
  $enteredUsername = $_POST['username'] ?? '';
  $enteredPassword = $_POST['password'] ?? '';

  // Consultar la base de datos para verificar las credenciales
  $sql = "SELECT * FROM usuarios WHERE username = '$enteredUsername' AND contraseña = '$enteredPassword'";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    // Las credenciales son válidas, el usuario se ha autenticado correctamente
    header("Location: anadir.php");
    exit(); // Es importante terminar la ejecución después de redirigir
  } else {
    // Las credenciales son inválidas, mostrar mensaje de error
    $error = "Credenciales inválidas";
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Iniciar Sesión</title>
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
  <h1>Iniciar Sesión</h1>
  <br><br>
  <form method="post">
    <div class="custom-form-group">
      <label for="username">Usuario:</label>
      <input type="text" class="form-control rounded-4 border-2 custom-input" id="username" name="username" placeholder="JuanJ05">
    </div>
    <div class="custom-form-group">
      <label for="password">Contraseña:</label>
      <input type="password" class="form-control rounded-4 border-2 custom-input" id="password" name="password" placeholder="Introduce una contraseña">
    </div>
    <input type="submit" class="btn custom-button" value="Iniciar sesión">
    <p class="text-center">¿No tienes cuenta? <a class="text-dark" href="registrar.php">Registrate</a></p>
    <?php if (isset($error)) { ?>
      <p class="text-center text-danger"><?php echo $error; ?></p>
    <?php } ?>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
