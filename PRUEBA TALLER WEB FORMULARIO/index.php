<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DATOS DE CONEXIÓN
$host = "localhost";
$user = "root";
$pass = "John1313@";
$db   = "proveedores_db";

// CONEXIÓN
$conn = new mysqli($host, $user, $pass, $db);

// VERIFICAR CONEXIÓN
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// INSERTAR DATOS
if (isset($_POST['guardar'])) {
    $ruc = $conn->real_escape_string($_POST['ruc']);
    $empresa = $conn->real_escape_string($_POST['empresa']);
    $contacto = $conn->real_escape_string($_POST['contacto']);
    $telefono = $conn->real_escape_string($_POST['telefono']);

    $sql = "INSERT INTO proveedores (ruc, empresa, contacto, telefono)
            VALUES ('$ruc', '$empresa', '$contacto', '$telefono')";

    if (!$conn->query($sql)) {
        echo "Error al guardar: " . $conn->error;
    }
}

// CONSULTAR DATOS
$proveedores = $conn->query("SELECT * FROM proveedores");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro de Proveedores</title>

<style>
body { font-family: Arial; background: #f2f2f2; }
.container { width: 80%; margin: auto; background: #fff; padding: 20px; }
input, button { width: 100%; padding: 8px; margin: 5px 0; }
button { background: #333; color: #fff; border: none; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
th { background: #333; color: #fff; }
</style>
</head>

<body>

<div class="container">

<h2>Registro de Proveedores</h2>

<form method="POST">
    <input type="text" name="ruc" placeholder="RUC" required>
    <input type="text" name="empresa" placeholder="Empresa" required>
    <input type="text" name="contacto" placeholder="Contacto" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <button type="submit" name="guardar">Guardar</button>
</form>

<h3>Listado de Proveedores</h3>

<table>
<tr>
    <th>ID</th>
    <th>RUC</th>
    <th>Empresa</th>
    <th>Contacto</th>
    <th>Teléfono</th>
    <th>Estado</th>
</tr>

<?php
if ($proveedores && $proveedores->num_rows > 0) {
    while ($row = $proveedores->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['ruc']}</td>
                <td>{$row['empresa']}</td>
                <td>{$row['contacto']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['estado']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No hay registros</td></tr>";
}
?>

</table>

</div>

</body>
</html>
