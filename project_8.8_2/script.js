var form = document.querySelector('form');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  var input = document.querySelector('input');
  var inputValue = input.value;
  alert('Спасибо за нажатие на нашу замечательную кнопку. Значение вашего поля — ' + inputValue);
});