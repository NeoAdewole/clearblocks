/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/bootstrap-icons/font/bootstrap-icons.css":
/*!***************************************************************!*\
  !*** ./node_modules/bootstrap-icons/font/bootstrap-icons.css ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/block-editor/neon.css":
/*!***********************************!*\
  !*** ./src/block-editor/neon.css ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/rich-text":
/*!**********************************!*\
  !*** external ["wp","richText"] ***!
  \**********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["richText"];

/***/ }),

/***/ "./src/block-editor/neon-format.js":
/*!*****************************************!*\
  !*** ./src/block-editor/neon-format.js ***!
  \*****************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _neon_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./neon.css */ "./src/block-editor/neon.css");
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/rich-text */ "@wordpress/rich-text");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");






(0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_2__.registerFormatType)("clearblocks/neon", {
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)("Neon", "cc-clearblocks"),
  tagName: "span",
  className: 'neon',
  edit({
    isActive,
    onChange,
    value
  }) {
    const selectedBlock = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useSelect)(select => select('core/block-editor').getSelectedBlock());
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, selectedBlock?.name === "core/paragraph" && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.RichTextToolbarButton, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)("Neon", "cc-clearblocks"),
      icon: "superhero",
      isActive: isActive,
      onClick: () => {
        onChange((0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_2__.toggleFormat)(value, {
          type: "clearblocks/neon"
        }));
      }
    }));
  }
});

/***/ }),

/***/ "./src/block-editor/sidebar.js":
/*!*************************************!*\
  !*** ./src/block-editor/sidebar.js ***!
  \*************************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\src\\block-editor\\sidebar.js: Unexpected token (9:1)\n\n\u001b[0m \u001b[90m  7 |\u001b[39m \u001b[36mimport\u001b[39m { \u001b[33mMediaUpload\u001b[39m\u001b[33m,\u001b[39m \u001b[33mMediaUploadCheck\u001b[39m } \u001b[36mfrom\u001b[39m \u001b[32m\"@wordpress/block-editor\"\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m  8 |\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m  9 |\u001b[39m \u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    |\u001b[39m  \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 10 |\u001b[39m \u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 11 |\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 12 |\u001b[39m\u001b[0m\n    at instantiate (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:63:32)\n    at constructor (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:358:12)\n    at JSXParserMixin.raise (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:3255:19)\n    at JSXParserMixin.unexpected (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:3285:16)\n    at JSXParserMixin.jsxParseIdentifier (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:6767:12)\n    at JSXParserMixin.jsxParseNamespacedName (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:6774:23)\n    at JSXParserMixin.jsxParseElementName (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:6783:21)\n    at JSXParserMixin.jsxParseOpeningElementAt (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:6863:22)\n    at JSXParserMixin.jsxParseElementAt (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:6888:33)\n    at JSXParserMixin.jsxParseElement (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:6957:17)\n    at JSXParserMixin.parseExprAtom (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:6969:19)\n    at JSXParserMixin.parseExprSubscripts (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10890:23)\n    at JSXParserMixin.parseUpdate (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10873:21)\n    at JSXParserMixin.parseMaybeUnary (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10849:23)\n    at JSXParserMixin.parseMaybeUnaryOrPrivate (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10687:61)\n    at JSXParserMixin.parseExprOps (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10692:23)\n    at JSXParserMixin.parseMaybeConditional (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10669:23)\n    at JSXParserMixin.parseMaybeAssign (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10630:21)\n    at JSXParserMixin.parseExpressionBase (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10584:23)\n    at D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10580:39\n    at JSXParserMixin.allowInAnd (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:12275:16)\n    at JSXParserMixin.parseExpression (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:10580:17)\n    at JSXParserMixin.parseStatementContent (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:12733:23)\n    at JSXParserMixin.parseStatementLike (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:12584:17)\n    at JSXParserMixin.parseModuleItem (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:12561:17)\n    at JSXParserMixin.parseBlockOrModuleBlockBody (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:13185:36)\n    at JSXParserMixin.parseBlockBody (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:13178:10)\n    at JSXParserMixin.parseProgram (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:12460:10)\n    at JSXParserMixin.parseTopLevel (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:12450:25)\n    at JSXParserMixin.parse (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:14347:10)\n    at parse (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\parser\\lib\\index.js:14388:38)\n    at parser (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\core\\lib\\parser\\index.js:41:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:64:38)\n    at normalizeFile.next (<anonymous>)\n    at run (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\core\\lib\\transformation\\index.js:21:50)\n    at run.next (<anonymous>)\n    at transform (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\core\\lib\\transform.js:22:41)\n    at transform.next (<anonymous>)\n    at step (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\gensync\\index.js:261:32)\n    at D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\gensync\\index.js:273:13\n    at async.call.result.err.err (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\gensync\\index.js:223:11)\n    at D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\gensync\\index.js:189:28\n    at D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\@babel\\core\\lib\\gensync-utils\\async.js:68:7\n    at D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\gensync\\index.js:113:33\n    at step (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\gensync\\index.js:287:14)\n    at D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\gensync\\index.js:273:13\n    at async.call.result.err.err (D:\\DEVELOPMENT\\Local Sites\\niyiadewole\\app\\public\\wp-content\\plugins\\clearblocks\\node_modules\\gensync\\index.js:223:11)");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!***********************************!*\
  !*** ./src/block-editor/index.js ***!
  \***********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var bootstrap_icons_font_bootstrap_icons_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! bootstrap-icons/font/bootstrap-icons.css */ "./node_modules/bootstrap-icons/font/bootstrap-icons.css");
/* harmony import */ var _sidebar_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./sidebar.js */ "./src/block-editor/sidebar.js");
/* harmony import */ var _neon_format_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./neon-format.js */ "./src/block-editor/neon-format.js");



})();

/******/ })()
;
//# sourceMappingURL=index.js.map