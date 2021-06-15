import {
  v4 as uuid
} from "uuid";

export class Utils {

  static getFromStorage(key) {
    return JSON.parse(localStorage.getItem(`STD:${key}`) || "[]");
  }

  static addToStorage(obj, key) {
    const storageData = Utils.getFromStorage(key);
    storageData.push(obj);
    localStorage.setItem(`STD:${key}`, JSON.stringify(storageData));
  }

  static modifyInStorage(key, selectorKey, selectorValue, modifyKey, modifyValue) {
    const storageData = Utils.getFromStorage(key);

    for (let obj of storageData) {
      if (obj[selectorKey] === selectorValue) {
        obj[modifyKey] = modifyValue;
      }
    }

    localStorage.setItem(`STD:${key}`, JSON.stringify(storageData));
  }

  static deleteFromStorage(key, selectorKey, selectorValue) {
    const storageData = Utils.getFromStorage(key);

    const result = storageData.filter(obj => obj[selectorKey] !== selectorValue);

    localStorage.setItem(`STD:${key}`, JSON.stringify(result));
  }

  static createID() {
    return uuid();
  }

  static takeAwayDisabled(btn, list) {
    let listTasks = document.querySelectorAll(list);
    let btnId = document.querySelector(btn);

    if (listTasks.length > 0) {
      if (btnId) {
        btnId.removeAttribute('disabled');
      }
    }
  }
}