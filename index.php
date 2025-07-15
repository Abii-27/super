<?php
include 'config.php';

// Lista de tablas y sus nombres amigables
$tablas = [
    "carnesymariscos" => "Carnes y Mariscos",
    "frutasyverduras" => "Frutas y Verduras",
    "dulcesygolosinas" => "Dulces y Golosinas",
    "productosdelimpieza" => "Productos de Limpieza",
    "cuidadopersonal" => "Cuidado Personal"
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aiven Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background: #f0f0f0;
        }
    </style>
</head>
<body>

    <h1>Aiven Viewer - Visualización de Datos</h1>

    <?php foreach ($tablas as $tabla => $titulo): ?>
        <h2><?php echo $titulo; ?></h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
            <?php
            try {
                $stmt = $conn->query("SELECT * FROM $tabla");
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$fila['id']}</td>";
                    echo "<td>{$fila['nombre']}</td>";
                    echo "<td>{$fila['tipo']}</td>";
                    echo "<td>\${$fila['precio']}</td>";
                    echo "<td>{$fila['stock']}</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='5'>Error al consultar $tabla: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </table>
    <?php endforeach; ?>

</body>
</html>
