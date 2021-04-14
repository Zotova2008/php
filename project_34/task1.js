const abc = {
  a: 1,
  b: 2
};

function printAbc(abc) {
  this.c = 1;
  this.d = 2;
  console.log(Object.entries(this));
};

const res = new printAbc(abc);

console.log(res);