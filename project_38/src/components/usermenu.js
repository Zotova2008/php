import {
  Component
} from "../core/Component";
import {
  User
} from "../core/User";
import userMenuTemplate from "../templates/userMenu.html";

const userMenu = new Component('userMenu');

userMenu.createBody(userMenuTemplate);

function myAccount() {
  const myAccount = document.querySelector('#myAccount');

  myAccount.addEventListener('click', () => {
    Component.renderComponent('board', 'myAccount');
  })
}

userMenu.addFunction(myAccount);

function logOut() {
  const logOut = document.querySelector('#logOut');

  logOut.addEventListener('click', () => {
    User.logOut();

    let wellcomeBoxs = document.querySelectorAll('.navbar-islogin');
    for (let item of wellcomeBoxs) {
      item.textContent = '';
    }
  })
}

userMenu.addFunction(logOut);