<?php
// Código de conexión a la base de datos
include("conexion.php");

// Verificar si se han enviado los datos del formulario
if(isset($_POST['username']) && isset($_POST['password'])) {
  // Obtener los datos del formulario
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Verificar si el usuario ya existe en la base de datos
  $sql = "SELECT * FROM usuarios WHERE username = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "El usuario ya existe. Por favor, elige otro nombre de usuario.";
  } else {
    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (username, contraseña) VALUES ('$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
      header("Location: index.php");
      echo "Registro exitoso. Ahora puedes iniciar sesión con tu nuevo usuario.";
    } else {
      echo "Error al registrar el usuario: " . $conn->error;
    }
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

    <title>Iniciar Sesion</title>
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
    <h1>Registrar</h1>
    <br><br>
    <form method="post">
      
      <div class="custom-form-group">
        <label for="username">Usuario:</label>
        <input type="text" class="form-control rounded-4 border-2 custom-input" name="username" id="username" placeholder="JuanJ05">
      </div>
      <div class="custom-form-group">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control custom-input" name="password" id="password" placeholder="Introduce una contraseña">
      </div>
      <button type="submit" class="btn custom-button">Registrar</button>
      <p class="text-center">¿Ya tienes cuenta? <a class="text-secondary" href="index.php">Inicia Sesion</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    
  </body>
</html>
