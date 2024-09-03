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

/***/ "./app/src/js/admin/video_preview.ts":
/*!*******************************************!*\
  !*** ./app/src/js/admin/video_preview.ts ***!
  \*******************************************/
/***/ (() => {

eval("var movieFileInput = document.querySelector('#movie_file_input');\nvar videoPreviewDiv = document.querySelector('#video_preview');\nmovieFileInput &&\n    movieFileInput.addEventListener('change', function (event) {\n        var _a;\n        var target = event.target;\n        var file = (_a = target.files) === null || _a === void 0 ? void 0 : _a[0];\n        if (file) {\n            var videoUrl = URL.createObjectURL(file);\n            videoPreviewDiv.src = videoUrl;\n            videoPreviewDiv.style.display = 'block';\n            videoPreviewDiv.load();\n        }\n    });\n\n\n//# sourceURL=webpack://super-movies/./app/src/js/admin/video_preview.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./app/src/js/admin/video_preview.ts"]();
/******/ 	
/******/ })()
;