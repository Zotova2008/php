var gameStart = document.querySelector('.game-start');
var gameAnswer = document.querySelector('.game-answer');
var min = document.querySelector('.input-min');
var max = document.querySelector('.input-max');
min.value = 0;
max.value = 100;
var answerNumber;
var btnStart = document.querySelector('#btn-start');
var btnRetry = document.querySelector('#btn-retry');
var btnEqual = document.querySelector('#btn-equal');
var btnOver = document.querySelector('#btn-over');
var btnLess = document.querySelector('#btn-less');

var errorMin = document.querySelector('.error-min');
var errorMax = document.querySelector('.error-max');

var orderNumber = 1;
var gameRun = false;

var orderNumberField = document.querySelector('#order-number');
var answerField = document.querySelector('#answer-field');

function checkValue(item) {
    if (item.value < -999) {
        item.value = -999;
    }

    if (item.value > 999) {
        item.value = 999;
    }
};

function wrongNumber() {
    const phraseRandom = Math.round(Math.random());
    const answerPhrase = (phraseRandom === 1) ?
        `Вы загадали неправильное число!\n\u{1F914}` :
        `Я сдаюсь..\n\u{1F92F}`;

    answerField.innerText = answerPhrase;
    gameRun = false;
}

function calculation(item) {
    orderNumber++;
    orderNumberField.innerText = orderNumber;
    var phraseAnswer = Math.round(Math.random() * 3);

    var answers = {
        0: 'Вы загадали число ' + item + '?',
        1: 'Это легко! Ваше число ' + item + '?',
        2: 'Я догадался! Ваше число ' + item + '?',
        3: 'Ваше число ' + item + '. Я угадал?',
    };
    answerField.innerText = answers[phraseAnswer];
}

function calcWord(item) {

    var itemConst = item;
    var a1 = ['ноль', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'];
    var a2 = ['', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать'];
    var a3 = ['', 'десять', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'];
    var a4 = ['', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот'];
    var stringNumber = '';
    var arr = Array.from(String(item));

    if (arr[0] === '-') {
        arr = arr.slice(1);
        stringNumber += 'минус ';
    }

    if (arr.length === 1) {
        stringNumber += a1[arr[0]];
    }

    if (arr.length === 2) {
        if (parseInt(arr[0]) === 1) {
            stringNumber += a2[arr[1]];
        } else if (parseInt(arr[1]) === 0) {
            stringNumber += a3[arr[0]];
        } else {
            stringNumber += a3[arr[0]] + ' ';
            stringNumber += a1[arr[1]];
        }
    }

    if (arr.length === 3) {
        if (parseInt(arr[2]) === 0) {
            stringNumber += a4[arr[0]] + ' ';
            stringNumber += a3[arr[1]];
        } else {
            stringNumber += a4[arr[0]] + ' ';
            stringNumber += a3[arr[1]] + ' ';
            stringNumber += a1[arr[2]];
        }
    }

    if (stringNumber.length >= 20) {
        stringNumber = itemConst;
    }

    item = stringNumber;

    return item;
};

min.addEventListener('keyup', function () {
    checkValue(min);
});

max.addEventListener('keyup', function () {
    checkValue(max);
});

btnStart.addEventListener('click', function () {
    minValue = parseInt(min.value);
    maxValue = parseInt(max.value);

    if (isNaN(minValue)) {
        errorMin.textContent = 'Вы не ввели число';
    }

    if (isNaN(maxValue)) {
        errorMax.textContent = 'Вы не ввели число';
    }

    if (minValue === maxValue || minValue > maxValue) {
        errorMin.textContent = 'Число должно быть меньше максимального';
        errorMax.textContent = 'Число должно быть больше минимального';
    } else {
        answerNumber = Math.floor((minValue + maxValue) / 2);
        gameRun = true;
        gameStart.classList.remove('active');
        gameAnswer.classList.add('active');
        orderNumberField.innerText = orderNumber;
        var calcAnswer = calcWord(answerNumber);
        answerField.innerText = 'Вы загадали число ' + calcAnswer + '?';
    }
});

btnRetry.addEventListener('click', function () {
    gameStart.classList.add('active');
    gameAnswer.classList.remove('active');
    min.value = 0;
    max.value = 100;
    errorMin.textContent = '';
    errorMax.textContent = '';
    orderNumber = 1;
    gameRun = false;
});

btnOver.addEventListener('click', function () {
    if (gameRun) {
        if (minValue >= maxValue) {
            wrongNumber();
        } else {
            minValue = answerNumber + 1;
            answerNumber = Math.floor((minValue + maxValue) / 2);
            var calcAnswer = calcWord(answerNumber);
            calculation(calcAnswer);
        }
    }
})

btnLess.addEventListener('click', function () {
    if (gameRun) {
        if (minValue >= maxValue) {
            wrongNumber();
        } else {
            maxValue = answerNumber - 1;
            answerNumber = Math.ceil((minValue + maxValue) / 2);
            var calcAnswer = calcWord(answerNumber);
            calculation(calcAnswer);
        }
    }
})


btnEqual.addEventListener('click', function () {
    if (gameRun) {
        var phraseAnswer = Math.round(Math.random() * 3);

        var answers = {
            0: 'Я всегда угадываю\n\u{1F60E}',
            1: 'Это было просто\n\u{1F609}',
            2: 'Даа, это было сложновато\n\u{1F605}',
            3: 'Я крут!!!\n\u{1F60E}',
        };
        answerField.innerText = answers[phraseAnswer];
        gameRun = false;
    }
});