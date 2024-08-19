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

/***/ "./app/src/js/admin/dashboard_toggle_menu.ts":
/*!***************************************************!*\
  !*** ./app/src/js/admin/dashboard_toggle_menu.ts ***!
  \***************************************************/
/***/ (() => {

eval("var dashboardToggleMenuBtn = document.querySelector('.dashboard_toggle_menu');\nvar dashboardAside = document.querySelector('.dashboard_aside');\nvar state = false;\ndashboardToggleMenuBtn.addEventListener('click', function () {\n    if (dashboardAside) {\n        if (state) {\n            dashboardAside.style.transform = 'translate(-100%, 0)';\n            dashboardAside.style.position = 'absolute';\n        }\n        else {\n            dashboardAside.style.transform = 'translate(0, 0)';\n            dashboardAside.style.position = 'static';\n        }\n        state = !state;\n    }\n});\n\n\n//# sourceURL=webpack://super-movies/./app/src/js/admin/dashboard_toggle_menu.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./app/src/js/admin/dashboard_toggle_menu.ts"]();
/******/ 	
/******/ })()
;