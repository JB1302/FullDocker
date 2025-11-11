<?php
session_start();
$_SESSION["usuario"] = "Steven";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">
    <h1 class="text-center">Gestión de Tareas</h1>
    <?php if (!empty($_SESSION)) {
        include 'formulario.php';
    } else {
        include 'formulario.php';
    } ?>
    <script src="../public/js/script.js" defer></script>

</body>

</html>