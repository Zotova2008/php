class ElectricEquipment {
  constructor(powerConsumption) {
    this.powerConsumption = powerConsumption;
    this.state = false;
  }

  static totalConsumtion = 0;
  static getTotalConsumption() {
    console.log(ElectricEquipment.totalConsumtion);
  }

  changeState() {
    if (this.state === true) {
      this.state = false;
      ElectricEquipment.totalConsumtion -= this.powerConsumption;
    } else if (this.state === false) {
      this.state = true;
      ElectricEquipment.totalConsumtion += this.powerConsumption;
    }
  }
}

class Bulb extends ElectricEquipment {
  constructor(powerConsumption, lightColor) {
    super(powerConsumption)
    this.lightColor = lightColor
  }
}

class Computer extends ElectricEquipment {
  constructor(powerConsumption, CPU, APU) {
    super(powerConsumption)
    this.CPU = lightColor
    this.APU = lightColor
  }
}

const bulb1 = new Bulb(30, 'white');
const bulb2 = new Bulb(60, 'yellow');
const computer = new Bulb(300, 'Intel', 'GeeForse');
bulb1.changeState();
bulb2.changeState();

ElectricEquipment.getTotalConsumption();
computer.changeState();
ElectricEquipment.getTotalConsumption();
bulb2.changeState();
ElectricEquipment.getTotalConsumption();