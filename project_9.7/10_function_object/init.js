window.onload = function () {

    var surname = document.querySelector('#surnameNameOutput');
    var first = document.querySelector('#firstNameOutput');
    var patronymic = document.querySelector('#patronymicNameOutput');
    var gender = document.querySelector('#genderOutput');
    var post = document.querySelector('#postOutput');
    var dataBox = document.querySelector('.data-box');
    var displayBox = document.querySelector('.display');
    var btnReset = document.querySelector('.buttons__reset');
    var btnGener = document.querySelector('.buttons__generation');
    var birthDateOutput = document.querySelector('#birthDateOutput');

    function renderData() {
        var initPerson = personGenerator.getPerson();
        surname.innerText = initPerson.surnameName;
        first.innerText = initPerson.firstName;
        patronymic.innerText = initPerson.patronymicName;
        gender.innerText = initPerson.gender;
        post.innerText = initPerson.post;
        birthDateOutput.innerText = initPerson.date;
    };

    btnGener.addEventListener('click', function () {
        if (!dataBox.classList.contains('active')) {
            dataBox.classList.add('active');
        }
        if (displayBox.classList.contains('active')) {
            displayBox.classList.remove('active');
        }

        renderData();
    });

    btnReset.addEventListener('click', function () {
        dataBox.classList.remove('active');
        displayBox.classList.add('active');
    });
};