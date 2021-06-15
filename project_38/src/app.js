import {
    Component
} from './core/Component';
import {
    Kanban
} from './core/Kanban';
import {
    User
} from './core/User';

Component.defineTarget('menu', document.querySelector('#menu'));
Component.defineTarget('board', document.querySelector('#board'));
Component.defineTarget('total', document.querySelector('#total'));
Component.defineComponents();

Component.renderComponent('menu', 'authForm');

User.createUser('admin', '1', 1);
User.createUser('user', '1', 0);
User.setCurrentUser(null, null);

document.querySelector('#home').addEventListener('click', () => {
    if (User.getCurrentUser() !== null) Kanban.renderBoard();
})