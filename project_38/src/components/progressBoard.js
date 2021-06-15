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
import progressBoardTemplate from "../templates/progressBoard.html";

const progressBoard = new Component('progressBoard');

progressBoard.createBody(progressBoardTemplate);

function selectTask() {
  const taskList = document.querySelector('#collapseProgress');

  taskList.addEventListener('click', (e) => {
    if (e.target.classList.contains('select-task-progress')) {
      const taskId = e.target.getAttribute('data-id');

      Utils.modifyInStorage('Tasks', 'id', taskId, 'status', 'progress');
      Kanban.renderBoard();
    }
  })
}

progressBoard.addFunction(selectTask);

function loadProgressTask() {
  const progressTasks = Kanban.getTasks('progress');

  Component.defineTarget('progress', document.querySelector('#progress-board'));

  const taskList = [];
  for (let task of progressTasks) {
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

  Component.renderComponent('progress', taskList);
}

progressBoard.addFunction(loadProgressTask);