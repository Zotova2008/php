import {
  Component
} from "../core/Component";
import {
  Kanban
} from "../core/Kanban";
import {
  User
} from "../core/User";
import {
  Utils
} from "../core/Utils";
import readyBoardTemplate from "../templates/readyBoard.html";

const readyBoard = new Component('readyBoard');

readyBoard.createBody(readyBoardTemplate);

function addCardClick() {
  const addCard = document.querySelector('#addCardReady');
  const btnCloseCard = document.querySelector('.form__task-close');
  addCard.addEventListener('click', (e) => {
    addCard.textContent = 'Submit';
    addCard.removeAttribute('data-bs-toggle');
    setTimeout(() => {
      addCard.type = 'submit';
    }, 100);
  });

  btnCloseCard.addEventListener('click', (e) => {
    addCard.textContent = '+Add card';
    addCard.setAttribute('data-bs-toggle', 'collapse');
    setTimeout(() => {
      addCard.type = 'button';
    }, 100);
  });
}

readyBoard.addFunction(addCardClick);

function addTaskFormSubmit() {
  const addCardForm = document.querySelector('#taskForm');

  addCardForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const form = new FormData(taskForm);
    const user = form.get('user-name');
    const taskTitle = form.get('task-title');
    const taskBody = form.get('task-content');

    const task = {
      id: Utils.createID(),
      user: user,
      title: taskTitle,
      body: taskBody,
      status: 'ready'
    }

    Utils.addToStorage(task, 'Tasks');
    Kanban.renderBoard();
  })
}

readyBoard.addFunction(addTaskFormSubmit);

function loadReadyTasks() {
  const readyTasks = Kanban.getTasks('ready');

  Component.defineTarget('ready', document.querySelector('#ready-board'));

  const taskList = [];
  for (let task of readyTasks) {
    const user = User.getUserData(task.user);

    const props = {
      id: task.id,
      user: task.user,
      title: task.title,
      body: task.body,
      delete: (User.getCurrentRole() === 'user') ? 'disabled' : '',
      email: (user) ? `${user['email']}` : '',
      phone: (user) ? `${user['phone']}` : ''
    }

    taskList.push({
      name: 'taskCard',
      props: props
    });
  }

  Component.renderComponent('ready', taskList);
}

readyBoard.addFunction(loadReadyTasks);