import {
  Component
} from "../core/Component";
import {
  User
} from "../core/User";
import adminMenuTemplate from "../templates/adminMenu.html";

const adminMenu = new Component('adminMenu');

adminMenu.createBody(adminMenuTemplate);

function myAccount() {
  const myAccount = document.querySelector('#myAccount');

  myAccount.addEventListener('click', () => {
    Component.renderComponent('board', 'myAccount');
  })
}

adminMenu.addFunction(myAccount);

function createUser() {
  const createUser = document.querySelector('#createUser');

  createUser.addEventListener('click', () => {
    Component.renderComponent('board', 'createUser');
  })
}

adminMenu.addFunction(createUser);

function logOut() {
  const logOut = document.querySelector('#logOut');

  logOut.addEventListener('click', () => {
    User.logOut();
    let wellcomeBoxs = document.querySelectorAll('.navbar-islogin');
    let contentHtml = document.querySelector('#content');
    for (let item of wellcomeBoxs) {
      item.textContent = '';
    }
    contentHtml.textContent = 'Please Sign In to see your tasks!';
  })
}

adminMenu.addFunction(logOut);