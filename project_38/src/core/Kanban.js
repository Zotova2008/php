import {
  Component
} from "./Component";
import {
  User
} from "./User";
import {
  Utils
} from "./Utils";

export class Kanban {

  static renderBoard() {
    const role = User.getCurrentRole();
    let renderList;

    async function loadTask() {
      tasks = (role === 'user') ? filterTask(Utils.getFromStorage('Tasks')) : Utils.getFromStorage('Tasks');
    }

    loadTask().then(renderList = [{
          name: 'readyBoard',
          props: getReadyProps(role)
        }, {
          name: 'progressBoard',
          props: getProgressProps()
        },
        {
          name: 'finishedBoard',
          props: getFinishedProps()
        }
      ])
      .then(Component.renderComponent('board', renderList))
      .then(calcTask);

    Utils.takeAwayDisabled('#addCardProgress', '.select-task-progress');
    Utils.takeAwayDisabled('#addCardFinished', '.select-task-finished');
  }

  static getTasks(status) {
    const result = tasks.filter(task => {
      return task.status === status;
    })

    return result;
  }
}

let tasks = [];

function filterTask(tasks) {
  const user = User.getCurrentUser();
  const result = tasks.filter(task => {
    return task['user'] === user;
  })

  return result;
}

function calcTask() {
  let ready = 0;
  let progress = 0;
  let finished = 0;

  for (let task of tasks) {
    if (task.status === 'finished') {
      finished++;
    } else if (task.status === 'ready') {
      ready++;
    } else {
      progress++
    }
  }

  const props = {
    ready: ready,
    progress: progress,
    finished: finished
  }
  Component.renderComponent('total', 'footerTotal', props);
}

function getReadyProps(role) {
  const readyProps = {
    addDisabled: (role === 'user') ? 'disabled' : ''
  }

  return readyProps;
}

function getProgressProps() {
  let htmlString = '';
  const readyTasks = Kanban.getTasks('ready');

  for (let task of readyTasks) {
    htmlString += `<li class="select-task-progress task-queue__item" data-id="${task.id}">${task.user}: ${task.title}</li>`;
  }

  return {
    tasks: htmlString
  };
}

function getFinishedProps() {
  let htmlString = '';

  const readyTasks = Kanban.getTasks('progress');

  for (let task of readyTasks) {
    htmlString += `<li class="select-task-finished task-queue__item" data-id="${task.id}">${task.user}: ${task.title}</li>`;
  }

  return {
    tasks: htmlString
  };
}