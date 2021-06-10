const chatInput = document.querySelector('.task__fifth-chatinput');
const btnSend = document.querySelector('.task__fifth-send');
const btnGeo = document.querySelector('.task__fifth-geo');
const chatList = document.querySelector('.task__fifth-list');

btnSend.disabled = true;
btnGeo.disabled = true;

const websocketUri = "wss://echo.websocket.org/";
let websocket;

window.onload = (event) => {
  websocket = new WebSocket(websocketUri);
  websocket.onopen = function (evt) {
    console.log("CONNECTED");
    btnSend.disabled = false;
    btnGeo.disabled = false;
  };
  websocket.onclose = function (evt) {
    console.log("DISCONNECTED");
    btnSend.disabled = true;
    btnGeo.disabled = true;
  };
  websocket.onmessage = function (evt) {
    if (evt.data.indexOf('https://www.openstreetmap.org/#map=12') === -1) {
      appendMessage(
        evt.data, 'response'
      );
    }
  };
  websocket.onerror = function (evt) {
    appendMessage(
      'ERROR:' + evt.data, 'error'
    );
  };
}

function appendMessage(messageText, type) {
  var li = document.createElement("li");
  li.setAttribute("id", type);
  li.appendChild(document.createTextNode(messageText));
  chatList.appendChild(li);
}

btnSend.addEventListener('click', () => {
  const message = chatInput.value;
  appendMessage(message, 'request');
  chatInput.value = '';
  websocket.send(message);
});

const error = () => {
  appendMessage('Не удалось определить местоположение', 'error');
}

const success = (position) => {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;
  const openRequest = `https://www.openstreetmap.org/#map=12/${latitude}/${longitude}`;
  appendMessage(openRequest, 'geodata');
}

btnGeo.addEventListener('click', () => {
  if (!navigator.geolocation) {
    appendMessage('Определение геолокации не поддерживается браузером', 'error');
  } else {
    navigator.geolocation.getCurrentPosition(success, error);
  }
});