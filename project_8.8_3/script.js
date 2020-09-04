var form = document.querySelector('form');
var input = document.querySelector('input');
var submit = document.querySelector('button');

form.addEventListener('click', (event) => {
  if (event.target === input) {
    event.stopPropagation();
  } else if (event.target === submit) {
    event.preventDefault();
    event.stopPropagation();
    var inputValue = input.value;
    alert('Спасибо за нажатие на нашу замечательную кнопку. Значение вашего поля — ' + inputValue);
  } else {
    alert('Здесь ничего нет, нажмите, пожалуйста, на кнопку или заполните поле ввода');
  }
});