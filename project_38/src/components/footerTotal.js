import {
  Component
} from "../core/Component";

const footerTotal = new Component('footerTotal');

footerTotal.createBody(`<p>Ready tasks: %ready%, Progress tasks: %progress%, Finished tasks: %finished%</p>`);