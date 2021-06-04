// ЗАДАНИЕ 1
console.log('ЗАДАНИЕ 1');
// XML
const listXml = new DOMParser();
const xmlString = `
<list>
  <student>
    <name lang = "en">
      <first>Ivan</first>
      <second>Ivanov</second>
    </name>
    <age>35</age>
    <prof>teacher</prof>
  </student>
  <student>
    <name lang = "ru">
      <first>Петр</first>
      <second>Петров</second>
    </name>
    <age>58</age>
    <prof>driver</prof>  
  </student> 
</list>
`;

const xmlDOM = listXml.parseFromString(xmlString, 'text/xml');

const students = xmlDOM.querySelectorAll('student');
const list = [];
const ul = document.querySelector('.students');

students.forEach(function (item) {
  const firstName = item.querySelector('first').textContent;
  const secondName = item.querySelector('second').textContent;
  const fullName = firstName + ' ' + secondName;
  const age = item.querySelector('age').textContent;
  const prof = item.querySelector('prof').textContent;
  const lang = item.querySelector('name').getAttribute('lang');
  const result = {
    name: fullName,
    age: age,
    prof: prof,
    lang: lang
  }
  list.push(result);
});

list.forEach(function (item) {
  const name = item.name;
  const age = item.age;
  const prof = item.prof;
  const lang = item.lang;

  const li = document.createElement('li');
  li.innerHTML = 'name: ' + name + ', ' + 'age: ' + age + ', ' + 'prof: ' + prof + ', ' + 'lang: ' + lang;
  ul.appendChild(li);
});

console.log(list);