var input = document.querySelector('input');
input.addEventListener('keyup', (event) => {
  event.stopPropagation();
  var inputValue = event.target.value;
  console.log(inputValue);
});