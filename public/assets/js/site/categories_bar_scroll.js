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

/***/ "./app/src/js/site/categories_bar_scroll.ts":
/*!**************************************************!*\
  !*** ./app/src/js/site/categories_bar_scroll.ts ***!
  \**************************************************/
/***/ (() => {

eval("var categoriesBar = document.querySelector('.categories_bar ul');\nvar isDown = false;\nvar startX;\nvar scrollLeft;\ncategoriesBar.addEventListener('wheel', function (event) {\n    event.preventDefault();\n    categoriesBar.scrollLeft += event.deltaY * 0.5;\n});\ncategoriesBar.addEventListener('touchstart', function (event) {\n    isDown = true;\n    startX = event.touches[0].pageX - categoriesBar.offsetLeft;\n    scrollLeft = categoriesBar.scrollLeft;\n});\ncategoriesBar.addEventListener('touchmove', function (event) {\n    if (!isDown)\n        return;\n    event.preventDefault();\n    var x = event.touches[0].pageX - categoriesBar.offsetLeft;\n    var walk = (x - startX) * 1;\n    categoriesBar.scrollLeft = scrollLeft - walk;\n});\ncategoriesBar.addEventListener('touchend', function (event) {\n    isDown = false;\n});\ncategoriesBar.addEventListener('touchcancel', function (event) {\n    isDown = false;\n});\n\n\n//# sourceURL=webpack://super-movies/./app/src/js/site/categories_bar_scroll.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./app/src/js/site/categories_bar_scroll.ts"]();
/******/ 	
/******/ })()
;