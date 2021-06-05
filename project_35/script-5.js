// Получение данных в localStorage
var jsonMyKey = localStorage.getItem('userData');

if (jsonMyKey === null) {
  var inputName = prompt(`Добро пожаловать! Назовите, пожалуйста, ваше имя`);
  var inputDate = String(new Date().toLocaleString());
  //   //JSON для записи
  const jsonString = `
    {
      "name": "${inputName}",
      "date": "${inputDate}"
    }`;
  localStorage.setItem('userData', jsonString);
} else {
  var myKey = JSON.parse(jsonMyKey);
  alert(`Добрый день, ${myKey.name}! Давно не виделись. В последний раз вы были у нас ${myKey.date}`);
  var inputDate = String(new Date().toLocaleString());
  const jsonString = `
    {
      "name": "${myKey.name}",
      "date": "${inputDate}"
    }`;

  localStorage.setItem('userData', jsonString);
}