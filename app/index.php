<?php
# app/index.php
// Usaremos los datos definidos en el .env
$host = 'db'; // Nombre del servicio en docker-compose
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');
$db = getenv('MYSQL_DATABASE');

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "<h1 style='color: green;'>✅ ¡El Entorno Samantha está operativo!</h1>";
    echo "<p>Nginx está sirviendo la página, PHP-FPM está ejecutando el código y se ha conectado exitosamente al contenedor de MySQL (db).</p>";
} catch (PDOException $e) {
    echo "<h1 style='color: red;'>❌ ERROR: Conexión a la base de datos fallida.</h1>";
    echo "<p>Verifica que las variables en .env sean correctas y que el servicio 'db' esté corriendo.</p>";
}
?>
