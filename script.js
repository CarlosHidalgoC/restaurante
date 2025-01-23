// Función para cerrar el popup de promoción
document.getElementById('close-promo').onclick = function() {
    document.getElementById('promo-popup').classList.add('hidden');
  };
  
  // Función de reserva
  document.getElementById('reservaForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('confirmacion').classList.remove('hidden');
    event.target.reset();
    setTimeout(function() {
      document.getElementById('confirmacion').classList.add('hidden');
    }, 3000);
  });
  