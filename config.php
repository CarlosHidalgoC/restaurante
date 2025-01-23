<?php
// Datos de conexión a la base de datos
$servername = "localhost";    // Para servidores locales como XAMPP o WAMP
$username = "root";           // Usuario predeterminado en XAMPP o WAMP
$password = "";               // Contraseña en blanco en XAMPP por defecto
$dbname = "restaurantly";      // Nombre de la base de datos que creaste

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configuración de la codificación para evitar problemas con caracteres especiales
$conn->set_charset("utf8");
?>
