/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./app/src/js/admin/pass_visible_toggle.ts":
/*!*************************************************!*\
  !*** ./app/src/js/admin/pass_visible_toggle.ts ***!
  \*************************************************/
/***/ (() => {

eval("// Pass\nvar passwordInputAdmin = document.querySelector('#password');\nvar passShowBtnAdmin = document.querySelector('.pass .pass_visible_toggle_show');\nvar passHiddenBtnAdmin = document.querySelector('.pass .pass_visible_toggle_hidden');\n// Pass Confirmation\nvar passwordConfirmationInputAdmin = document.querySelector('#password_confirmation');\nvar passConfirmationShowBtnAdmin = document.querySelector('.pass_confirm .pass_visible_toggle_show');\nvar passConfirmationHiddenBtnAdmin = document.querySelector('.pass_confirm .pass_visible_toggle_hidden');\nif (passwordInputAdmin) {\n    passShowBtnAdmin &&\n        passShowBtnAdmin.addEventListener('click', function () {\n            passwordInputAdmin.setAttribute('type', 'text');\n            passShowBtnAdmin.style.display = 'none';\n            passHiddenBtnAdmin.style.display = 'flex';\n        });\n    passHiddenBtnAdmin &&\n        passHiddenBtnAdmin.addEventListener('click', function () {\n            passwordInputAdmin.setAttribute('type', 'password');\n            passShowBtnAdmin.style.display = 'flex';\n            passHiddenBtnAdmin.style.display = 'none';\n        });\n}\nif (passwordConfirmationInputAdmin) {\n    passConfirmationShowBtnAdmin &&\n        passConfirmationShowBtnAdmin.addEventListener('click', function () {\n            passwordConfirmationInputAdmin.setAttribute('type', 'text');\n            passConfirmationHiddenBtnAdmin.style.display = 'flex';\n            passConfirmationShowBtnAdmin.style.display = 'none';\n        });\n    passConfirmationHiddenBtnAdmin &&\n        passConfirmationHiddenBtnAdmin.addEventListener('click', function () {\n            passwordConfirmationInputAdmin.setAttribute('type', 'password');\n            passConfirmationHiddenBtnAdmin.style.display = 'none';\n            passConfirmationShowBtnAdmin.style.display = 'flex';\n        });\n}\n\n\n//# sourceURL=webpack://super-movies/./app/src/js/admin/pass_visible_toggle.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./app/src/js/admin/pass_visible_toggle.ts"]();
/******/ 	
/******/ })()
;