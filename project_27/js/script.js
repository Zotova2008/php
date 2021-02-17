// 'use strict';

// // Модальные окна
// var loginInLink = document.querySelector('.login__in-js');
// var loginIn = document.querySelector('.login__in');
// var popupCloseIn = loginIn.querySelector('.icon-close');

// var loginOutLink = document.querySelector('.login__out-js');
// var loginOut = document.querySelector('.login__out');
// var popupCloseOut = loginOut.querySelector('.icon-close');

// if (loginInLink) {
//   loginInLink.addEventListener('click', function (evt) {
//     evt.preventDefault();
//     loginIn.classList.add('login__form--overlay');
//   });

//   popupCloseIn.addEventListener('click', function (evt) {
//     evt.preventDefault();
//     loginIn.classList.remove('login__form--overlay');
//   });
// }

// if (loginOutLink) {
//   loginOutLink.addEventListener('click', function (evt) {
//     evt.preventDefault();
//     loginOut.classList.add('login__form--overlay');
//   });

//   popupCloseOut.addEventListener('click', function (evt) {
//     evt.preventDefault();
//     loginOut.classList.remove('login__form--overlay');
//   });
// }

// // Скрипт для Ajax формы
// $('form-in').submit(function (e) {
//   e.preventDefault();
//   var data = new FormData(this);
//   $.ajax({
//     type: 'POST',
//     url: 'registration.php',
//     data: data,
//     cache: false,
//     contentType: false,
//     processData: false,
//     success: function (response) {
//       swal({
//         title: "Отлично!",
//         text: "Пользователь успешно зарегистрирован!",
//         icon: "success",
//       }).then(() => {
//         location.reload();
//       });
//     },
//     error: function (response, status, error) {
//       var errors = response.responseJSON;
//       if (errors.errors) {
//         errors.errors.forEach(function (data, index) {
//           var field = Object.getOwnPropertyNames(data);
//           var value = data[field];
//           var div = $("#" + field[0]).closest('div');
//           div.addClass('has-danger');
//           div.children('.form-control-feedback').text(value);
//         });
//       }
//     }
//   });
// });

// $('form-out').submit(function (e) {
//   e.preventDefault();
//   var data = new FormData(this);
//   $.ajax({
//     type: 'POST',
//     url: 'registration.php',
//     data: data,
//     cache: false,
//     contentType: false,
//     processData: false,
//     success: function (response) {
//       swal({
//         title: "Отлично!",
//         text: "Пользователь успешно зарегистрирован2!",
//         icon: "success",
//       }).then(() => {
//         location.reload();
//       });
//     },
//     error: function (response, status, error) {
//       var errors = response.responseJSON;
//       if (errors.errors) {
//         errors.errors.forEach(function (data, index) {
//           var field = Object.getOwnPropertyNames(data);
//           var value = data[field];
//           var div = $("#" + field[0]).closest('div');
//           div.addClass('has-danger');
//           div.children('.form-control-feedback').text(value);
//         });
//       }
//     }
//   });
// });