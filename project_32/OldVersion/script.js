var lastOperand = 0;
var btnClrAll = document.querySelector('#btn_clr');
var btnCe = document.querySelector('#btn_ce');
var btnBack = document.querySelector('#btn_back');
var btnNum = document.querySelectorAll('.btn-number');
var error = document.querySelector('.error');
var btnPoint = document.querySelector("#btn_point");
var btnMath = document.querySelectorAll('.btn-math');
var btnUnary = document.querySelector('#btn_unary');
var btnRadical = document.querySelector('#btn_radical');
var btnTotal = document.querySelector('#btn_total');
var operationBox = document.querySelector('.operation-box');
var lastOper = document.querySelector('.last-operation');
var lastOperBtn = document.querySelector('.last-operation__btn');
var lastContent = document.querySelector('.last-operation__content');
var inputWindow = document.getElementById('inputWindow');
var doubleMath = false;
var doubleTotal = false;
inputWindow.value = '0';

// Сброс, очистить все
function clear() {
    lastOperand = 0;
    operationBox.textContent = '';
    error.textContent = '';
    inputWindow.value = '0';
    doubleMath = false;
    doubleTotal = false;
}

function operationAddition(operation, lastOperation) {
    let newLi = document.createElement('li');
    newLi.innerHTML = operation.textContent;
    lastOperation.insertBefore(newLi, lastOperation.firstChild);
}

btnClrAll.addEventListener('click', function () {
    lastContent.textContent = '';
    clear();
});

btnCe.addEventListener('click', function () {
    clear();
});

btnBack.addEventListener('click', function () {
    var memory = inputWindow.value;
    inputWindow.value = memory.substring(0, memory.length - 1);
});

btnNum.forEach(element => {
    element.addEventListener('click', function () {
        error.textContent = '';
        inputWindow.value += element.textContent;
        inputWindow.value = parseFloat(inputWindow.value);
        doubleTotal = false;
    })
});

btnPoint.addEventListener('click', function () {
    if (inputWindow.value.includes('.') === false) {
        inputWindow.value += ".";
    }
})

// Математические операции
btnMath.forEach(element => {
    element.addEventListener('click', function () {

        if (doubleMath === false) {
            lastOperand = inputWindow.value;
            inputWindow.value = '0';
            lastOperand += element.textContent;
            operationBox.textContent = lastOperand;
            doubleMath = true;
            doubleTotal = false;
        }
    })
});


// Результат, равно
btnTotal.addEventListener('click', function () {
    if (doubleTotal === false) {
        lastOperand += inputWindow.value;
        operationBox.textContent = lastOperand + ' = ';
        if (lastOperand.includes('/ 0') === false) {
            inputWindow.value = eval(lastOperand);
            operationBox.textContent += inputWindow.value;
            operationAddition(operationBox, lastContent);
        } else {
            error.textContent = 'Делить на ноль нельзя';
            lastOperand = 0;
            operationBox.textContent = '';
        }

        doubleMath = false;
        doubleTotal = true;
    }
});

//Унарный минус 
btnUnary.addEventListener('click', function () {
    inputWindow.value = inputWindow.value * (-1);
})

//Корень числа
btnRadical.addEventListener('click', function () {
    lastOperand = parseFloat(inputWindow.value);
    if (lastOperand >= 0) {
        const result = Math.sqrt(lastOperand);

        operationBox.textContent = '√' + lastOperand + ' = ' + result;
        operationAddition(operationBox, lastContent);
        inputWindow.value = result;
        // lastOperand = 0;
    } else {
        lastOperand = 0;
        inputWindow.value = 0;
        error.textContent = 'Число должно быть положительное';
    }
});

//Последние операции
lastOperBtn.addEventListener('click', function (item) {
    lastOper.classList.toggle('last-operation__open');
});