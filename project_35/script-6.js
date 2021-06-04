// ЗАДАНИЕ 6
console.log('ЗАДАНИЕ 6');

var num;

function setNum() {
  num = Math.ceil(Math.random() * 100);
}

const myPromise = new Promise((resolve, reject) => {
  setTimeout(setNum(), 3000);
  if (num % 2 == 0) {
    resolve(`Завершено успешно. Сгенерированное число ${num}`);
  } else {
    reject(`Завершено с ошибкой. Сгенерированное число ${num}`);
  }
});

myPromise
  .then((result) => {
    console.log('Обрабатываем resolve', result);
  })
  .catch((error) => {
    console.log('Обрабатываем reject', error);
  });