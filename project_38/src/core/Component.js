import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.js";
import "../styles/style.css";

const parser = new DOMParser();

export class Component {
  constructor(componentName) {
    this.componentName = componentName;
    components[componentName] = {};
    components[componentName]['functions'] = [];
  }

  static defineComponents() {
    const componentsList = require.context('../components/', true, /\.js$/);
    componentsList.keys().forEach((path) => {
      require(`../components/${path.slice(2)}`);
    });
  }

  static defineTarget(targetName, node) {
    targets[targetName] = node;
  }

  createBody(html) {
    components[this.componentName]['body'] = html;
  }

  addFunction(func) {
    components[this.componentName]['functions'].push(func);
  }

  static renderComponent(target, componentList, props = {}) {
    targets[target].innerHTML = '';

    function render(target, componentName, props = {}) {
      if (!components[componentName]) {
        console.error(`Компонент ${componentName} не найден!`);
        return;
      }

      let html = components[componentName]['body'];

      if (Object.keys(props).length !== 0) {

        for (let key in props) {
          const pattern = new RegExp(`%${key}%`, 'g');
          html = html.replace(pattern, props[key]);
        }

        const pattern = new RegExp('%.*%', 'g');
        html = html.replace(pattern, '');
      }
      const node = parser.parseFromString(html, 'text/html').body.childNodes[0];

      targets[target].appendChild(node);

      const functions = components[componentName]['functions'];
      if (functions.length !== 0) {
        functions.forEach((func => func(props)));
      }
    }

    if (Array.isArray(componentList)) {
      for (let component of componentList) {
        render(target, component.name, component.props);
      }
    } else {
      render(target, componentList, props);
    }
  }
}

const targets = {};
const components = {};