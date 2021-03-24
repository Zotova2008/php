"use strict";
//математические операции калькулятора
class CalculatorMath {
    sum(FirstOperand, SecondOperand) {
        var result = Number(FirstOperand) + Number(SecondOperand);
        return result;
    }

    minus(FirstOperand, SecondOperand) {
        var result = Number(FirstOperand) - Number(SecondOperand);
        return result;
    }

    multiply(FirstOperand, SecondOperand) {
        var result = Number(FirstOperand) * Number(SecondOperand);
        return result;
    }

    devide(FirstOperand, SecondOperand) {
        var result = Number(FirstOperand) / Number(SecondOperand);
        return result;
    }

    sqrt(FirstOperand) {
        var result = Number(FirstOperand) ** 0.5;
        return result;
    }
}
//вывод информации на экраны
class CalculatorTablou {
    //для текущего операнда
    currentNumField = null;
    //история вычисления
    resultField = null;

    constructor(CurrentNumField, ResultField) {
        this.currentNumField = CurrentNumField;
        this.resultField = ResultField;
    }
    //отобразить текущее значение
    viewCurrentNum(Value) {
        this.currentNumField.value = Value;
    }
    //сбросить текущее значение
    resetCurrentNum() {
        this.currentNumField.value = '';
    }
    //отобразить в результат результат
    addToOperations(Value, NeedNewLine) {
        this.addNewLine();
        this.resultField.value += Value;
        if (NeedNewLine) {
            this.resultField.scrollTop = this.resultField.scrollHeight;
        }
    }

    //добавить новую строку в результат
    addNewLine() {
        this.resultField.value += '\r\n';
    }
    //сбросить результат
    resetResult() {
        this.resultField.value = '';
    }
}

//логика для кнопок калькулятора
class CalculatorLogic {
    calculatorCore;

    constructor(core) {
        this.calculatorCore = core;
        this.initNumButtons();
        this.initOperatorsWithTwoOperands();
        this.initOperatorsWithOneOperand();
        this.initActions();
    }

    //логика для кнопок с цифрами
    initNumButtons() {
        document.querySelectorAll('.js-number').forEach(item => {
            if (item.textContent >= 0 && item.textContent <= 9) {
                item.addEventListener('click', event => {
                    this.calculatorCore.updateCurrentOperand(item.textContent);
                })
            }
        })
    }

    //логика кнопок с двумя операндами
    initOperatorsWithTwoOperands() {
        document.querySelectorAll('.js-math').forEach(item => {
            item.addEventListener('click', event => {
                if (this.calculatorCore.getCurrentOperand() !== null) {
                    this.calculatorCore.setOperator(item.textContent, true);
                }
            })
        })
    }

    //логика кнопок с одним операндом
    initOperatorsWithOneOperand() {
        document.querySelectorAll('.js-radical').forEach(item => {
            item.addEventListener('click', event => {
                this.calculatorCore.calculateOneOperator(item.textContent);
            })
        })
    }

    //отключение все операторов с двумя операндами
    turnOffOperators() {
        document.querySelectorAll('.js-math').forEach(item => {
            item.disabled = true;
        })

        document.querySelectorAll('.js-radical').forEach(item => {
            item.disabled = true;
        })
    }

    //включение всех операторов с двумя операндами
    turnOnOperators() {
        document.querySelectorAll('.js-math').forEach(item => {
            item.disabled = false;
        })

        document.querySelectorAll('.js-radical').forEach(item => {
            item.disabled = false;
        })
    }

    //добавление кнопок действий дл кнопок действий
    initActions() {
        //кнопка сброса
        document.querySelector('.js-clr').addEventListener('click', event => {
            this.calculatorCore.calculatorReset();
        })
        //кнопка расчёта (работает только для двух операндов и оператора)
        document.querySelector('.js-total').addEventListener('click', event => {
            if (this.calculatorCore.getCurrentOperand() !== null && this.calculatorCore.getLastOperand() !== null) {
                this.calculatorCore.calculateTwoOperands();
            }
        })
    }

}

//хранит цифры и обеспечивает бизнес-логику
class CalculatorCore {
    result = null;
    lastOperand = null;
    currentOperand = null;
    operator = null;
    calculatorTablou;
    calculatorLogic;
    calculatorMath;

    constructor() {
        this.calculatorLogic = new CalculatorLogic(this);
        this.calculatorTablou = new CalculatorTablou(document.querySelector('.calc__input'), document.querySelector('.calc__operation'));
        this.calculatorMath = new CalculatorMath();
    }

    getOperator() {
        return this.operator;
    }
    //добавление оператора
    setOperator(Operator, NeedNewLine) {
        if (this.currentOperand != null) {
            this.setLastOperand();
            this.operator = Operator;
            this.calculatorTablou.addToOperations(Operator, NeedNewLine);
            this.calculatorLogic.turnOffOperators();
        }
    }

    getCurrentOperand() {
        return this.currentOperand;
    }

    getLastOperand() {
        return this.lastOperand;
    }

    //перемещение операнда в предыдущий (используется при любой операции, кроме сброса)
    setLastOperand() {
        this.lastOperand = this.currentOperand;
        this.currentOperand = null;
        this.calculatorTablou.resetCurrentNum();
        this.calculatorTablou.addToOperations(this.lastOperand, true);
    }

    //обновление операнда при вводе цифр
    updateCurrentOperand(number) {
        if (this.currentOperand == null) {
            this.currentOperand = number;
        } else {
            this.addToOperandEnd(number);
        }
        this.calculatorTablou.viewCurrentNum(this.currentOperand);
    }

    //добавление введённого числа в конец текущего операнда
    addToOperandEnd(number) {
        try {
            var tmpStr = String(this.currentOperand);
            tmpStr += number;
            this.currentOperand = Number(tmpStr);
        } catch (error) {}
    }

    //сброс калькулятора
    calculatorReset() {
        this.result = null;
        this.operator = null;
        this.currentOperand = null;
        this.lastOperand = null;
        this.calculatorTablou.resetResult();
        this.calculatorTablou.resetCurrentNum();
        this.calculatorLogic.turnOnOperators();
    }

    //вычисление значений для двух операндов
    calculateTwoOperands() {
        var result = null;

        if (this.operator != null) {
            try {
                switch (this.operator) {
                    case '+':
                        result = this.calculatorMath.sum(this.lastOperand, this.currentOperand);
                        break;
                    case '-':
                        result = this.calculatorMath.minus(this.lastOperand, this.currentOperand);
                        break;
                    case '*':
                        result = this.calculatorMath.multiply(this.lastOperand, this.currentOperand);
                        break;
                    case '/':
                        result = this.calculatorMath.devide(this.lastOperand, this.currentOperand);
                        break;
                    default:
                        result = null;
                }
                if (result !== null) {
                    this.setResultTwoOperands(result);
                } else {
                    throw error;
                }
            } catch (error) {
                console.log("Ошибка вычисления");
                this.calculatorTablou.viewCurrentNum('ОШИБКА');
            }
        }
    }
    //установка результата после вычисления для двух операндов
    setResultTwoOperands(Result) {
        if (this.lastOperand !== null) {
            this.calculatorTablou.addToOperations(this.currentOperand, true);
        }
        this.calculatorTablou.addToOperations('=', true);
        this.operator = null;
        this.currentOperand = Result;
        this.calculatorTablou.viewCurrentNum(this.currentOperand);
        this.lastOperand = null;
        this.calculatorLogic.turnOnOperators();
    }
    //вычисление значений для одного операнда
    calculateOneOperator(Operator) {
        var result = null;
        this.operator = Operator;

        if (this.operator != null) {
            try {
                switch (this.operator) {
                    case 'sqrt':
                        result = this.calculatorMath.sqrt(this.currentOperand);
                        break;
                    default:
                        result = null;
                }
                if (result !== null) {
                    this.setResultOneOperands(result, this.currentOperand, this.operator);
                } else {
                    throw error;
                }
            } catch (error) {
                console.log("Ошибка вычисления");
                this.calculatorTablou.viewCurrentNum('ОШИБКА');
            }
        }
    }
    //установка результата после вычисления для одного операнда
    setResultOneOperands(Result, Operand, Operation) {
        this.calculatorTablou.addToOperations(Operation + '(' + Operand + ')', true);
        this.calculatorTablou.addToOperations('=', true);
        this.operator = null;
        this.currentOperand = Result;
        this.calculatorTablou.viewCurrentNum(this.currentOperand);
        this.lastOperand = null;
        this.calculatorLogic.turnOnOperators();
    }
}

var calculator = new CalculatorCore();