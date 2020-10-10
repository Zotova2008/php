tikTakBoom = {
    init(
        tasks,
        timerField,
        gameStatus,
        gameStatusField,
        gamePlayers,
        gameTime,
        textFieldQuestion,
        textFieldAnswer1,
        textFieldAnswer2,
        textFieldAnswer3,
        textFieldAnswer4,
        textFieldAnswer5,
        gameQuestion
    ) {
        this.boomTimer = 30;
        this.countOfPlayers = gamePlayers.value;
        this.tasks = JSON.parse(tasks);

        this.timeTraining = 3;
        this.timerField = timerField;
        this.gameStatus = gameStatus;
        this.gameStatusField = gameStatusField;
        this.gamePlayers = gamePlayers;
        this.gamePlayersArr = [];
        this.gameTime = gameTime;
        this.currentPlayer = undefined;
        this.index = 0;
        this.textFieldQuestion = textFieldQuestion;
        this.textFieldAnswer1 = textFieldAnswer1;
        this.textFieldAnswer2 = textFieldAnswer2;
        this.textFieldAnswer3 = textFieldAnswer3;
        this.textFieldAnswer4 = textFieldAnswer4;
        this.textFieldAnswer5 = textFieldAnswer5;
        this.gameQuestion = gameQuestion;

        this.needRightAnswers = 19;
    },

    run() {
        this.question = 1;
        this.gameStatus.innerText = 'Игра идет...';
        this.rightAnswers = 0;



        this.gamePlayersArr = createPlayers(this.gamePlayers.value, this.gameTime.value);
        this.createData();
        this.turnOn();
    },
    turnOn() {
        this.currentPlayer = this.gamePlayersArr[this.index];
        this.beforeTimer();
        if (this.currentPlayer.errors === 3) {
            if (this.index <= this.countOfPlayers) {
                this.index += 1;
                this.turnOn();
            } else {
                this.index = 0;
                this.turnOn();
            }
        } else {

            this.gameStatusField.innerText = `Вопрос №${this.question} игроку №${this.currentPlayer.name}`;

            const taskNumber = randomIntNumber(this.tasks.length - 1);
            this.printQuestion(this.tasks[taskNumber]);

            this.tasks.splice(taskNumber, 1);

            this.question = (this.question === this.countOfPlayers) ? 1 : this.question + 1;
            if (this.index <= this.countOfPlayers) {
                this.index += 1;
            } else {
                this.index = 0;
            }
        }
    },

    turnOff(value) {

        if (this.currentTask[value].result) {
            this.gameStatus.innerText = 'Верно!';
            this.currentPlayer.score += 1;
            this.rightAnswers += 1;
            this.currentPlayer.timer += 5;
        } else {
            this.gameStatus.innerText = 'Неверно!';
            this.currentPlayer.errors += 1;
            this.currentPlayer.timer -= 5;
        }
        if (this.rightAnswers < this.needRightAnswers) {
            if (this.tasks.length === 0) {
                this.finish('lose');

            } else {
                this.turnOn();
            }
        } else {
            this.finish('won');
        }

        this.textFieldAnswer1.removeEventListener('click', answer1);
        this.textFieldAnswer2.removeEventListener('click', answer2);
        this.textFieldAnswer3.removeEventListener('click', answer3);
        this.textFieldAnswer4.removeEventListener('click', answer4);
        this.textFieldAnswer5.removeEventListener('click', answer5);

        this.createData();
    },

    printQuestion(task) {
        this.textFieldQuestion.innerText = task.question;
        this.textFieldAnswer1.innerText = task.answer1.value;
        this.textFieldAnswer2.innerText = task.answer2.value;
        this.textFieldAnswer3.innerText = task.answer3.value;
        this.textFieldAnswer4.innerText = task.answer4.value;
        this.textFieldAnswer5.innerText = task.answer5.value;

        this.textFieldAnswer1.addEventListener('click', answer1 = () => this.turnOff('answer1'));
        this.textFieldAnswer2.addEventListener('click', answer2 = () => this.turnOff('answer2'));
        this.textFieldAnswer3.addEventListener('click', answer3 = () => this.turnOff('answer3'));
        this.textFieldAnswer4.addEventListener('click', answer4 = () => this.turnOff('answer4'));
        this.textFieldAnswer5.addEventListener('click', answer5 = () => this.turnOff('answer5'));

        this.currentTask = task;
        clearTimeout(this.timerTimeout);
        this.gameQuestion.classList.remove('open');
    },

    finish(result = 'lose') {
        this.state = 0;
        if (result === 'lose') {
            this.gameStatus.innerText = `Вы проиграли!`;
            this.gameStatusField.innerText = '';
        }
        if (result === 'won') {
            this.gameStatus.innerText = `Вы выиграли!`;
            this.gameStatusField.innerText = '';
        }

        this.textFieldQuestion.innerText = ``;
        this.textFieldAnswer1.innerText = ``;
        this.textFieldAnswer2.innerText = ``;
        this.textFieldAnswer3.innerText = ``;
        this.textFieldAnswer4.innerText = ``;
        this.textFieldAnswer5.innerText = ``;

        console.log("Игра закончена");
    },

    timer() {
        this.boomTimer = this.currentPlayer.timer;
        this.boomTimer -= 1;
        this.currentPlayer.timer = this.boomTimer;
        let sec = this.boomTimer % 60;
        let min = (this.boomTimer - sec) / 60;
        sec = (sec >= 10) ? sec : '0' + sec;
        min = (min >= 10) ? min : '0' + min;
        this.timerField.innerText = `${min}:${sec}`;

        if (this.boomTimer > 0) {
            this.timerTimeout = setTimeout(() => {
                    this.timer();
                },
                1000,
            );
        } else {
            this.finish('lose');
        }
    },
    beforeTimer() {
        var i = this.timeTraining;
        var timeClear = setInterval(() => {
            this.timerField.innerText = i;
            i--;
            if (i < 0) {
                clearInterval(timeClear);
                this.timer();
                this.gameQuestion.classList.add('open');
            }
        }, 1000);

    },
    createData() {
        let table = document.querySelector('#gameScore');
        table.innerHTML = '<tr><th>Игрок</th><th>Очки</th><th>Время</th><th>Ошибки</th></tr>';
        for (let i = 0; i < this.gamePlayersArr.length; i++) {

            let newTr = document.createElement('tr');
            newTr.innerHTML = `<td>Игрок №${i + 1}</td><td>${this.gamePlayersArr[i].score}</td><td>${this.gamePlayersArr[i].timer}</td><td>${this.gamePlayersArr[i].errors}</td>`;

            if (this.gamePlayersArr[i].errors === 3) {
                newTr.innerHTML = `<td class="lose">Игрок №${i + 1}</td><td class="lose">${this.gamePlayersArr[i].score}</td><td class="lose">${this.gamePlayersArr[i].timer}</td><td class="lose">${this.gamePlayersArr[i].errors}</td>`;
            }

            table.appendChild(newTr);
        }
    },

}