<?php
// Obtener el ID del empleado a eliminar
$empleadoID = $_GET['id'];

// Código de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "gestion_empleados";

// Crear una conexión
$conn = mysqli_connect($servername, $username, $password, $database) or die("Problemas con la conexión");

// Eliminar el empleado de la base de datos
$sql = "DELETE FROM empleados WHERE ID = $empleadoID";
$result = $conn->query($sql);

if ($result) {
  // El empleado se ha eliminado correctamente
  header("Location: empleado.php");
  exit(); // Es importante terminar la ejecución después de redirigir
} else {
  // Ocurrió un error al eliminar el empleado
  $error = "Error al eliminar el empleado";
}

// Cerrar la conexión
$conn->close();
?>
