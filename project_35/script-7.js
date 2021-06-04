// ЗАДАНИЕ 7

console.log('ЗАДАНИЕ 7');

const btnGet = document.querySelector('.task__seventh-btn');
const usrId = document.querySelector('.task__seventh-input');
const error = document.querySelector('.task__seventh-error');
const todoList = document.querySelector('.task__seventh-list');

const userRequest7 = () => {
  return fetch(`https://jsonplaceholder.typicode.com/users/${usrId.value}/todos`)
    .then((response) => {
      return response.json();
    })
    .then((json) => {
      return json;
    })
    .catch(() => {
      console.log('Ошибка')
    });
}

function CreateView(list) {

  for (var key in list) {
    error.innerHTML = 'Список';
    const listTitle = list[key]["title"];
    const listCompleted = list[key]["completed"];
    const listItem = document.createElement('li');
    listItem.innerHTML = listTitle;
    if (listCompleted) {
      listItem.classList.add('completed');
    }
    todoList.appendChild(listItem);
  }
}

btnGet.addEventListener('click', async () => {
  const requestResult7 = await userRequest7();
  if (requestResult7.length > 0) {
    CreateView(requestResult7);
  } else {
    error.innerHTML = "Пользователь с указанным id не найден";
    todoList.innerHTML = '';
    CreateView(null);
  }
});