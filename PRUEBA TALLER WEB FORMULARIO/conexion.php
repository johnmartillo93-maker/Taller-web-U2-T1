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
?>