function ElectricEquipment(powerConsumption) {
  this.powerConsumption = powerConsumption,
    this.state = false,
    totalConsumption = 0
}

ElectricEquipment.prototype.getTotalConsumption = function () {
  console.log(totalConsumption);
}

ElectricEquipment.prototype.changeState = function () {
  if (this.state === true) {
    this.state = false;
    totalConsumption -= this.powerConsumption;
  } else if (this.state === false) {
    this.state = true;
    totalConsumption += this.powerConsumption;
  }
}

function Bulb(powerConsumption, lightColor) {
  this.powerConsumption = powerConsumption;
  this.lightColor = lightColor
}

function Computer(powerConsumption, CPU, APU) {
  this.powerConsumption = powerConsumption;
  this.CPU = lightColor
  this.APU = lightColor
}


Bulb.prototype = new ElectricEquipment();

const bulb1 = new Bulb(30, 'white');
const bulb2 = new Bulb(60, 'yellow');
const computer = new Bulb(300, 'Intel', 'GeeForse');
bulb1.changeState();
bulb2.changeState();

ElectricEquipment.prototype.getTotalConsumption();
computer.changeState();
ElectricEquipment.prototype.getTotalConsumption();
bulb2.changeState();
ElectricEquipment.prototype.getTotalConsumption();