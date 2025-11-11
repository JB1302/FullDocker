<?php
require_once '../config/database.php';

class Reservas
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }


  //Select
  public function getID(int $id): array
  {
    try {
      $stmt = $this->conn->query("SELECT * FROM Reservas WHERE id = $id");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return ["error" => "Error al obtener Reserva: " . $e->getMessage()];
    }
  }

  //Update
  public function update(int $id, $clave): bool
  {
    try {
      // Hashear la clave recibida
      $claveHasheada = password_hash($clave, PASSWORD_DEFAULT);

      // Guardar la versión hasheada
      $stmt = $this->conn->prepare("UPDATE Reservas SET clave = :clave WHERE id = :id");
      return $stmt->execute(['id' => $id, 'clave' => $claveHasheada]);
    } catch (PDOException $e) {
      return false;
    }
  }
}
