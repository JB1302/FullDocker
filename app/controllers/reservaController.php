<?php
require_once '../config/database.php';
require_once '../models/reserva.php';

$ReservasModel = new Reservas($conn);
header('Content-Type: application/json');

try {
  $method = $_SERVER['REQUEST_METHOD'];

      // Buscar reserva
  if ($method === 'GET' && !empty($_GET['id']) && empty($_GET['action'])) {
    $id = (int)$_GET['id'];
    $result = $ReservasModel->getID($id);
    echo json_encode($result);


        // Actualizar reserva
  }elseif ($method === 'POST' && !empty($_POST['id']) && $_POST['action'] === 'update') {
  $id = (int)$_POST['id'];
  $clave = $_POST['clave'] ?? '';
  $ok = $ReservasModel->update($id, $clave);
  echo json_encode(['success' => $ok]);

  } else {
    throw new Exception("Parámetros o método incorrectos.");
  }

} catch (Exception $e) {
  echo json_encode(["error" => $e->getMessage()]);
}
