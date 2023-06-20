<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registro</title>
    <style>
    .custom-form-group {
      margin-bottom: 15px;
    }
    .custom-input {
      border: 2px solid pink;
      border-radius: 20px;
      width: 400px;
      background-color: white;
      text-align:center;
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
  <img src="img/logo.png" alt="">
  <br>
    <h1>Ingresar Empleador y Deptos</h1>
    <br><br>
    <form>
        <div class="custom-form-group">
            <input type="text" class="form-control rounded-4 border-2 custom-input " id="empleado" placeholder="Empleado" disabled>
        </div>
        <a href="empleado.php" type="submit" class="btn custom-button" name="ingresarempleado">Ingresar</a>
        <br></br>
        <div class="custom-form-group">
            <input type="text" class="form-control rounded-4 border-2 custom-input " id="departamento" placeholder="Departamento" disabled>
        </div>
        <a href="departamentos.php" type="submit" class="btn custom-button" name="ingresarempleado">Ingresar</a>
        <br></br>
    </form>
</body>
<?php

?>
</html>