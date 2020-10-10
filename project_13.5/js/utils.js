const randomIntNumber = (max = 1, min = 0) => Math.floor(Math.random() * (max - min + 1) + min);

function createPlayers(gamePlayers, gameTime) {
  var arr = [];
  for (var i = 1; i <= gamePlayers; i++) {
    var player = {
      name: `${i}`,
      // количество очков
      score: 0,
      // Оставшееся время
      timer: gameTime,
      // количество не правильных ответов
      errors: 0,
      //0 - проиграл, 1 - выиграл, 2 - игра идёт
      state: 0
    };

    arr.push(player)
  }

  return arr;
};