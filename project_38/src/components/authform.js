import {
  Kanban
} from "../core/Kanban";
import {
  Component
} from "../core/Component";
import {
  User
} from "../core/User";
import authFormTemplate from "../templates/authForm.html";
import avatar from "../assets/avatar.png";

const authForm = new Component('authForm');

authForm.createBody(authFormTemplate);

function signInClick() {
  const signIn = document.querySelector('.form-login__submit');
  signIn.addEventListener('click', (e) => {
    e.preventDefault();
    const form = new FormData(loginform);
    const login = form.get('login');
    const password = form.get('password');

    async function auth(login, password) {
      return User.authUser(login, password);
    }

    auth(login, password).then(result => {
      var props;
      if (result === 'user') {
        props = {
          username: login,
          avatar: avatar
        }

        Component.renderComponent('menu', 'userMenu', props);
        Kanban.renderBoard();
      } else if (result === 'administrator') {
        props = {
          username: login,
          avatar: avatar
        }

        Component.renderComponent('menu', 'adminMenu', props);
        Kanban.renderBoard();
      } else {
        props = {
          error: result
        }
        Component.renderComponent('board', 'errorBlock', props);
      }

      if (props.username) {
        let wellcomeBoxs = document.querySelectorAll('.navbar-islogin');
        for (let item of wellcomeBoxs) {
          item.textContent = `Здравствуйте, ${props.username}`;
        }
      }

      if (!props.error) {
        let contentHtml = document.querySelector('#content');
        contentHtml.textContent = '';
      }
    })
  })
}

authForm.addFunction(signInClick);