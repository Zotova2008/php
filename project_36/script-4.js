const btn4 = document.querySelector('.task__fourth-btn');
const status4 = document.querySelector('.task__fourth-status');
const url4 = document.querySelector('.task__fourth-url');

const error4 = () => {
  status4.textContent = 'Местоположение не найдено';
}

const getTimezone = async (latitude, longitude) => {
  const response = await fetch(`https://api.ipgeolocation.io/timezone?apiKey=32bcd4a6e4b548968e7afcdb682ac679&lat=${latitude}&long=${longitude}`);
  const timezoneJSON = await response.json();
  url4.innerHTML = `Временная зона = ${timezoneJSON.timezone}; Местные дата и время = ${timezoneJSON.date_time_txt}`;
}

const success4 = (position) => {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;
  status4.textContent = `Широта = ${latitude}, Долгота = ${longitude}`;
  const requestResult = getTimezone(latitude, longitude);
}

btn4.addEventListener('click', () => {
  if (!navigator.geolocation) {
    status4.textContent = 'Определение геолокации не поддерживается браузером';
  } else {
    navigator.geolocation.getCurrentPosition(success4, error4);
  }
});