// ЗАДАНИЕ 8
console.log('ЗАДАНИЕ 8');
let myKey = localStorage.getItem('numKey');

//Получение данных из страницы
const pageNum = document.querySelector('.task__eighth-num');
const pageLimit = document.querySelector('.task__eighth-limit');
const requestBtn = document.querySelector('.task__eighth-btn');
const result = document.querySelector('.task__eighth-result');

//Отображение результата
function CreateViewImg(imgList) {
  let imgNew = '';
  console.log(imgList);
  for (var key in imgList) {
    const imgUrl = imgList[key].download_url;
    const imgAuthor = imgList[key].author;
    const imgHTML = `<div class="card-img__item"><img src="${imgUrl}" alt=""><p>${imgAuthor}</p></div>`;
    imgNew = imgNew + imgHTML;
  }
  result.innerHTML = imgNew;
}

//Функция для возврата fetch
const useRequest8 = () => {
  return fetch(`https://picsum.photos/v2/list?page=${pageNum.value}&pageLimit=${pageLimit.value}`)
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

function CheckNum(num) {
  if (num >= 1 && num <= 10) {
    return true;
  } else {
    return false;
  }
}

requestBtn.addEventListener('click', async () => {
  if (CheckNum(pageNum.value) === false) {
    console.log('Номер страницы вне диапазона от 1 до 10');
  }

  if (CheckNum(pageLimit.value) === false) {
    console.log('Лимит вне диапазона от 1 до 10');
  }

  if (CheckNum(pageNum.value) === false && CheckNum(pageLimit.value) === false) {
    console.log('Номер страницы и лимит вне диапазона от 1 до 10');
  }

  if (CheckNum(pageNum.value) === true && CheckNum(pageLimit.value) === true) {
    const requestResult8 = await useRequest8();
    CreateViewImg(requestResult8);
    localStorage.setItem('numKey', JSON.stringify(requestResult8));
  } else {
    if (myKey !== null) {
      CreateViewImg(JSON.parse(myKey));
    }
  }
});