function a() {
  let returnA = Object.create(null);
  return returnA;
}

let test = a();
console.log(Object.getPrototypeOf(test));