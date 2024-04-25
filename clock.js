function updateClock() {
  const dateDisplay = document.getElementById('dateDisplay');
  const timeDisplay = document.getElementById('timeDisplay');
  const formatDisplay = document.getElementById('formatDisplay');
  const now = new Date();
  
  const daysOfWeek = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
  const dayOfWeek = daysOfWeek[now.getDay()];

  let hours = now.getHours();
  let minutes = String(now.getMinutes()).padStart(2, '0');
  const ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12 || 12; // Convierte las horas a formato de 12 horas

  dateDisplay.textContent = dayOfWeek;
  timeDisplay.textContent = `${hours}:${minutes}`;
  formatDisplay.textContent = ampm;
}

// Actualizar el reloj cada segundo
setInterval(updateClock, 1000);

// Llamar a la función para mostrar la hora por primera vez
updateClock();
