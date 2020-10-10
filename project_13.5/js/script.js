window.onload = function () {
    tikTakBoom.init(
        tasks,
        document.querySelector('#timerField'),
        document.querySelector('#gameStatus'),
        document.querySelector('#gameStatusField'),
        document.querySelector('#gamePlayers'),
        document.querySelector('#gameTime'),
        document.querySelector('#questionField'),
        document.querySelector('#answer1'),
        document.querySelector('#answer2'),
        document.querySelector('#answer3'),
        document.querySelector('#answer4'),
        document.querySelector('#answer5'),
        document.querySelector('.game__question')
    )
    // tikTakBoom.run();

    var game = document.querySelector('.game');
    var gameStart = document.querySelector('#start');
    var gameEnd = document.querySelector('#end');

    gameStart.addEventListener('click', function () {
        game.classList.add('game--active');
        tikTakBoom.run();
    });

    gameEnd.addEventListener('click', function () {
        game.classList.remove('game--active');
        tikTakBoom.finish('lose');
    });
}