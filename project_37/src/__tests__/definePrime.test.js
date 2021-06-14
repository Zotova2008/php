import {
  definePrime
} from "../definePrime.js";

describe("tests for definePrime function", () => {
  const simple = 19;
  const complex = 25;
  const notCorrect = -18;

  it("should operate correctly with simple, complex and invalid number", () => {
    expect(definePrime(simple)).toBe(`Число ${simple} - простое число`);
    expect(definePrime(complex)).toBe(`Число ${complex} - составное число`);
    expect(definePrime(notCorrect)).toBe("Данные неверны");
  });
});