async function buscarReserva(event) {
  event.preventDefault();
  const id = document.getElementById('id').value.trim();
  if (!id) return alert("Ingrese un ID válido.");

  try {
const response = await fetch(`controllers/reservaController.php?id=${id}`);



    const data = await response.json();

    if (data.error) {
      alert(data.error);
      return;
    }

    if (Array.isArray(data) && data.length > 0) {
      const reserva = data[0];
      document.getElementById('fecha').value = reserva.fecha || '';
      document.getElementById('descripcion').value = reserva.descripcion || '';
      document.getElementById('clave').value = reserva.clave || '';
    } else {
      alert("No se encontró ninguna reserva con ese ID.");
      document.getElementById('fecha').value = '';
      document.getElementById('descripcion').value = '';
      document.getElementById('clave').value = '';
    }

  } catch (error) {
    console.error(error);
    alert("Error al consultar la reserva.");
  }
}

//Actualizar
document.getElementById('form-update').addEventListener('submit', async (e) => {
  e.preventDefault();
  const id = document.getElementById('id').value.trim();
  const clave = document.getElementById('clave').value.trim();

  if (!id) return alert("Primero busque una reserva válida.");

  try {
    const response = await fetch('controllers/reservaController.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ id: id, action: 'update', clave: clave })
    });

    const data = await response.json();

    if (data.success) {
      alert('Reserva actualizada correctamente');
    } else {
      alert('Error al actualizar la reserva.');
    }
  } catch (error) {
    console.error(error);
    alert("Error al conectar con el servidor.");
  }
});