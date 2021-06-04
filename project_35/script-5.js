// Получение данных в localStorage
var myKey = localStorage.getItem('userData');
if (myKey === null) {
  var inputName = prompt(`Добро пожаловать! Назовите, пожалуйста, ваше имя`);
  var inputDate = new Date();

  //JSON для записи
  const jsonString = `
  {
    "name": ${inputName},
    "date": ${inputDate}
  }`;

  //Запись в localStorage
  localStorage.setItem('userData', jsonString);
} else {
  alert(`Добрый день, ${myKey.name}! Давно не виделись. В последний раз вы были у нас ${myKey.date}`);

  //JSON для перезаписи
  const jsonString = `
  {
    "name": ${myKey.name},
    "date": ${new Date()}
  }`;

  //Перезапись localStorage
  localStorage.setItem('userData', jsonString);
}