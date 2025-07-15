<?php
$host = "ep-purple-forest-a2rclqki.eu-central-1.pg.koyeb.app";
$dbname = "koyebdb";
$user = "koyeb-adm";
$password = "npg_CrP9Sktf7FqV";
$port = "5432";

// Conexión a PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

// Lista de tablas
$tablas = [
    "carnesymariscos",
    "frutasverduras",
    "dulcesygolosinas",
    "productosdelimpieza",
    "cuidadopersonal"
];

// Mostrar contenido de cada tabla
foreach ($tablas as $tabla) {
    echo "<h2>Tabla: $tabla</h2>";
    $resultado = pg_query($conn, "SELECT * FROM $tabla");

    if (!$resultado) {
        echo "Error al consultar $tabla: " . pg_last_error();
        continue;
    }

    echo "<table border='1' cellpadding='5'>";
    echo "<tr>";
    $campos = pg_num_fields($resultado);
    for ($i = 0; $i < $campos; $i++) {
        echo "<th>" . pg_field_name($resultado, $i) . "</th>";
    }
    echo "</tr>";

    while ($fila = pg_fetch_assoc($resultado)) {
        echo "<tr>";
        foreach ($fila as $valor) {
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
}

pg_close($conn);
?>
