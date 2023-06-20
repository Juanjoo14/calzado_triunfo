<?php
// Código de conexión a la base de datos
include("conexion.php");

// Obtener el ID del departamento a eliminar
$departamentoID = $_GET['id'];

// Consulta para eliminar el departamento
$sql = "DELETE FROM departamentos WHERE id = $departamentoID";

if ($conn->query($sql) === TRUE) {
    header("Location: anadir.php");
    echo "Departamento eliminado exitosamente";
} else {
    echo "Error al eliminar el departamento: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
