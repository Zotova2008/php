// ЗАДАНИЕ 2
console.log('ЗАДАНИЕ 2');
const jsonObject = {
  name: "Anton",
  age: 36,
  skills: ["Javascript", "HTML", "CSS"],
  salary: 80000
}

const jsonString = JSON.stringify(jsonObject);

const taskSecond = document.querySelector('.task__second-content');
taskSecond.innerHTML = jsonString;

console.log(jsonString);