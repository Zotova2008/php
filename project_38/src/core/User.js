import {
  Component
} from "./Component";
import {
  Utils
} from "./Utils";

export class User {

  static createUser(login, password, roleCode = '0') {
    if (userExists(login)) return false;

    let role;
    switch ('' + roleCode) {
      case '0':
        role = 'user';
        break;
      case '1':
        role = 'administrator';
        break;
    }
    const user = {
      login: login,
      password: password,
      role: role,
      email: '',
      phone: ''
    }

    Utils.addToStorage(user, 'Users');

    return true;
  }

  static authUser(login, password) {
    const user = userExists(login);

    if (user) {
      if (user.password === password) {
        User.setCurrentUser(login, user.role);
        return user.role;
      } else {
        return 'Invalid password';
      }
    } else {
      let contentHtml = document.querySelector('#content');
      contentHtml.textContent = '';
      return 'Sorry, you have no access to this resource!';
    }
  }

  static getUserData(login) {
    return userExists(login);
  }

  static getCurrentUser() {
    return currentUser['login'];
  }

  static getCurrentRole() {
    return currentUser['role'];
  }

  static setCurrentUser(login, role) {
    currentUser = {
      login: login,
      role: role
    };
  }

  static logOut() {
    Component.renderComponent('menu', 'authForm');

    const props = {
      message: 'You log out'
    }

    Component.renderComponent('board', 'messageBlock', props);

    User.setCurrentUser(null, null);
  }
}

function userExists(login) {
  return Utils.getFromStorage('Users').filter(user => user['login'] === login)[0];
}

let currentUser;