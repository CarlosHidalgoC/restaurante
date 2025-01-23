<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $personas = $_POST['personas'];

    $query = "INSERT INTO reservas (username, fecha, hora, personas) VALUES ('$username', '$fecha', '$hora', '$personas')";
    mysqli_query($conn, $query);

    echo "Reserva realizada con éxitoaa!";
}
?>
<form method="POST" action="">
    <label>Fecha:</label>
    <input type="date" name="fecha" required>
    <label>Hora:</label>
    <input type="time" name="hora" required>
    <label>Personas:</label>
    <input type="number" name="personas" min="1" max="10" required>
    <button type="submit">Reservar</button>
</form>
