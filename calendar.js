// Obtener referencias a los elementos HTML
const monthAndYear = document.getElementById('monthAndYear');
const daysContainer = document.getElementById('days');

// Obtener la fecha actual
let currentDate = new Date();

// Función para generar el calendario
function generateCalendar() {
  let firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
  let lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
  
  monthAndYear.textContent = `${getMonthName(currentDate.getMonth())} ${currentDate.getFullYear()}`;

  let days = '';
  for (let i = 0; i < firstDay.getDay(); i++) {
    days += '<div></div>';
  }

  for (let i = 1; i <= lastDay.getDate(); i++) {
    if (currentDate.getDate() === i) {
      days += `<div class="today">${i}</div>`;
    } else {
      days += `<div>${i}</div>`;
    }
  }

  daysContainer.innerHTML = days;
}

// Función auxiliar para obtener el nombre del mes
function getMonthName(monthIndex) {
  const months = [
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
  ];
  return months[monthIndex];
}

// Generar el calendario inicial
generateCalendar();
