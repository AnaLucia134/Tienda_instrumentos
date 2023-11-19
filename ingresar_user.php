<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tempo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$codigo_trabajador = $_POST['codigo_trabajador'];
$user = $_POST['user'];
$correo = $_POST['correo'];
$contra = $_POST['contra'];
$fecha_nacimiento = $_POST['edad'];

$fechaNac = new DateTime($fecha_nacimiento);
$hoy = new DateTime();
$edad = $hoy->diff($fechaNac)->y;

$sql = "INSERT INTO usuarios (codigo_trabajador, user, correo, contra, fecha_nacimiento, edad) 
        VALUES ('$codigo_trabajador', '$user', '$correo', '$contra', '$fecha_nacimiento', '$edad')";

if ($conn->query($sql) === TRUE) {
    header("Location: datos_correctos.html");
    exit();
} else {
    header("Location: datos_incorrectos.html");
    exit();
}

$conn->close();
?>



