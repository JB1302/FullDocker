<?php
require_once 'config/database.php';
?>

<!--Saludar al Usuario -->
<h5> Hola!! <?php echo $_SESSION["usuario"] ?></h5>

<div class="container mt-4">

  <!-- Buscar al Usuario por ID -->
  <h1 class="lead">Buscar Cliente</h1>
  <div class="input-group mb-3">
    <form id="buscar"
      method="GET"
      onsubmit="return buscarReserva(event)">
      <label for="id" class="display-7">ID</label>
      <input type="number" id="id" name="id" class="form-control" required>
      <br>
      <button type="submit" class="btn btn-success" id="add-task">Buscar</button>
    </form>
  </div>

  <!-- Mostrar datos del ID -->
  <h1 class="lead">Datos de la Reserva</h1>
  <div class="input-group mb-3">
    <form id="form-update">
      <label for="fecha" class="display-7">Fecha</label>
      <input type="text" id="fecha" class="form-control" >

      <label for="descripcion" class="display-7 mt-3">Descripción</label>
      <input type="text" id="descripcion" class="form-control" >

      <label for="clave" class="display-7 mt-3">Clave</label>
      <input type="text" id="clave" class="form-control">
      <button type="submit" class="btn btn-primary mt-3">Modificar</button>
    </form>
  </div>
</div>