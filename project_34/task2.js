function checkBool(ArgString, ArgObject) {
  for (let key in ArgObject) {
    if (ArgObject.hasOwnProperty(ArgString)) {
      return true;
    }
  }
  return false;
}

var exampleObj = {
  argument1: "123",
  argument2: "Hello",
  argument3: "Привет"
}

console.log(checkBool('argument1', exampleObj));
console.log(checkBool('argument2', exampleObj));
console.log(checkBool('argument3', exampleObj));
console.log(checkBool('argument4', exampleObj));