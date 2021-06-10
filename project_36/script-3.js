const btn3 = document.querySelector('.task__third-btn');
const dataScreen = document.querySelector('.task__third-screen');
const dataCoords = document.querySelector('.task__third-coords');

function getScreenSize() {
  dataScreen.innerText = `Ширина экрана:${window.screen.width}px Высота экрана:  ${window.screen.height}px`;
}

const error3 = () => {
  status.textContent = 'Информация о местоположении недоступна';
}

const success3 = (position) => {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;

  dataCoords.textContent = `Широта: ${latitude} °, Долгота: ${longitude} °`;
}

btn3.addEventListener('click', () => {
  getScreenSize();
  if (!navigator.geolocation) {
    status.textContent = 'Определение геолокации не поддерживается браузером';
  } else {
    navigator.geolocation.getCurrentPosition(success3, error3);
  }
});