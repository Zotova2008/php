// ЗАДАНИЕ 3
console.log('ЗАДАНИЕ 3,4. Результат выполнения смотрите страницу');
const jsonFile = [{
  "year": 2017,
  "sales": {
    "q1": 86720,
    "q2": 58893,
    "q3": 27942,
    "q4": 71854
  }
}, {
  "year": 2018,
  "sales": {
    "q1": 73795,
    "q2": 54490,
    "q3": 48248,
    "q4": 63032
  }
}, {
  "year": 2019,
  "sales": {
    "q1": 60242,
    "q2": 79213,
    "q3": 42297,
    "q4": 45298
  }
}];

function useRequest(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);

  xhr.onload = function () {
    if (xhr.status != 200) {
      console.log('Статус ответа: ', xhr.status);
    } else {
      const result = JSON.parse(xhr.response);
      if (callback) {
        callback(result);
      }
    }
  };

  xhr.onerror = function () {
    console.log('Ошибка! Статус ответа: ', xhr.status);
  };

  xhr.send();
};

const resultNode = document.querySelector('.select-result');
const selectMes = document.querySelector('.select-mes');
const btnNode = document.querySelector('.task__third-result');
const select = document.querySelector('#js-select');
const selectOptions = select.options;

function displayResult(apiData) {
  const selectedYear = select.value;

  if (selectedYear == '') {
    selectMes.classList.remove('none');
    resultNode.innerHTML = '';
  } else {
    selectMes.classList.add('none');
  }
  apiData.forEach(function (item) {
    const year = item.year;
    if (year == selectedYear) {
      const tableBlock = `
      <a href = "https://quickchart.io/chart?c={type:'bar',data:{labels:['Кв.1','Кв.2','Кв.3','Кв.4'], datasets:[{label:'Выручка за ${item.year} год',data:[${item.sales.q1}, ${item.sales.q2}, ${item.sales.q3}, ${item.sales.q4}]}]}}" target="_blank">Открыть график</a>  
      <table>
          <tr>
            <th>1кв.</th>
            <th>2кв.</th>
            <th>3кв.</th>
            <th>4кв.</th>
          </tr>
          <tr>
            <td>${item.sales.q1}</td>
            <td>${item.sales.q2}</td>
            <td>${item.sales.q3}</td>
            <td>${item.sales.q4}</td>
          </tr>
        </table>
      `;
      resultNode.innerHTML = tableBlock;
    }
  });
}

btnNode.addEventListener('click', () => {
  useRequest('https://my.api.mockaroo.com/revenue_2017-2019.json?key=fd36b440', displayResult);
  // displayResult(jsonFile);
});