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

/***/ "./app/src/js/site/pass_visible_toggle.ts":
/*!************************************************!*\
  !*** ./app/src/js/site/pass_visible_toggle.ts ***!
  \************************************************/
/***/ (() => {

eval("// Pass\nvar passwordInput = document.querySelector('#password');\nvar passShowBtn = document.querySelector('.pass .pass_visible_toggle_show');\nvar passHiddenBtn = document.querySelector('.pass .pass_visible_toggle_hidden');\n// Pass Confirmation\nvar passwordConfirmationInput = document.querySelector('#password_confirmation');\nvar passConfirmationShowBtn = document.querySelector('.pass_confirm .pass_visible_toggle_show');\nvar passConfirmationHiddenBtn = document.querySelector('.pass_confirm .pass_visible_toggle_hidden');\nif (passwordInput) {\n    passShowBtn &&\n        passShowBtn.addEventListener('click', function () {\n            passwordInput.setAttribute('type', 'text');\n            passShowBtn.style.display = 'none';\n            passHiddenBtn.style.display = 'flex';\n        });\n    passHiddenBtn &&\n        passHiddenBtn.addEventListener('click', function () {\n            passwordInput.setAttribute('type', 'password');\n            passShowBtn.style.display = 'flex';\n            passHiddenBtn.style.display = 'none';\n        });\n}\nif (passwordConfirmationInput) {\n    passConfirmationShowBtn &&\n        passConfirmationShowBtn.addEventListener('click', function () {\n            passwordConfirmationInput.setAttribute('type', 'text');\n            passConfirmationHiddenBtn.style.display = 'flex';\n            passConfirmationShowBtn.style.display = 'none';\n        });\n    passConfirmationHiddenBtn &&\n        passConfirmationHiddenBtn.addEventListener('click', function () {\n            passwordConfirmationInput.setAttribute('type', 'password');\n            passConfirmationHiddenBtn.style.display = 'none';\n            passConfirmationShowBtn.style.display = 'flex';\n        });\n}\n\n\n//# sourceURL=webpack://super-movies/./app/src/js/site/pass_visible_toggle.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./app/src/js/site/pass_visible_toggle.ts"]();
/******/ 	
/******/ })()
;