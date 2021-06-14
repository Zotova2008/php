import {
  multiply,
  sum,
  minus
} from "../index.js";

describe("test multiply, sum, minus", () => {
  it("multiply 1 * 0 to equal 0", () => {
      const result = multiply(1, 0);
      expect(result).toBe(0);
    }),
    it("sum 10 + 5 to equal 15", () => {
      const result = sum(10, 5);
      expect(result).toBe(15);
    }),
    it("minus 10 - 5 to equal 5", () => {
      const result = minus(10, 5);
      expect(result).toBe(5);
    });
});