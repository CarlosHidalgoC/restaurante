<?php
session_start();
include 'config.php';
$username = $_SESSION['username'];

$query = "SELECT * FROM reservas WHERE username = '$username' ORDER BY fecha DESC";
$result = mysqli_query($conn, $query);
?>

<h2>Historial de Reservas</h2>
<ul>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
    <li><?php echo $row['fecha'] . " - " . $row['hora'] . " - " . $row['personas'] . " personas"; ?></li>
<?php endwhile; ?>
</ul>
