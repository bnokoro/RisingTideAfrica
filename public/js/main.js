/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Register Datatables
$('#datatable').DataTable(); // Magnific Popup

$('.image-popup').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  closeBtnInside: false,
  fixedContentPos: true,
  mainClass: 'mfp-no-margins mfp-with-zoom',
  // class to remove default margin from left and right side
  image: {
    verticalFit: true
  },
  zoom: {
    enabled: true,
    duration: 300 // don't foget to change the duration also in CSS

  }
}); // Pass id to delete modal

$('.delete-button').on('click', function (event) {
  event.preventDefault();
  var url = $(this).data('url');
  console.log(url);
  $('#deleteModalForm').attr('action', url);
}); // jQuery is required to run this code

$(document).ready(function () {
  scaleVideoContainer();
  initBannerVideoSize('.video-container .poster img');
  initBannerVideoSize('.video-container .filter');
  initBannerVideoSize('.video-container video');
  $(window).on('resize', function () {
    scaleVideoContainer();
    scaleBannerVideoSize('.video-container .poster img');
    scaleBannerVideoSize('.video-container .filter');
    scaleBannerVideoSize('.video-container video');
  });
});

function scaleVideoContainer() {
  var height = $(window).height() + 5;
  var unitHeight = parseInt(height) + 'px';
  $('.homepage-hero-module').css('height', unitHeight);
}

function initBannerVideoSize(element) {
  $(element).each(function () {
    $(this).data('height', $(this).height());
    $(this).data('width', $(this).width());
  });
  scaleBannerVideoSize(element);
}

function scaleBannerVideoSize(element) {
  var windowWidth = $(window).width(),
      windowHeight = $(window).height() + 5,
      videoWidth,
      videoHeight; // console.log(windowHeight);

  $(element).each(function () {
    var videoAspectRatio = $(this).data('height') / $(this).data('width');
    $(this).width(windowWidth);

    if (windowWidth < 1000) {
      videoHeight = windowHeight;
      videoWidth = videoHeight / videoAspectRatio;
      $(this).css({
        'margin-top': 0,
        'margin-left': -(videoWidth - windowWidth) / 2 + 'px'
      });
      $(this).width(videoWidth).height(videoHeight);
    }

    $('.homepage-hero-module .video-container video').addClass('fadeIn animated');
  });
} // Initialize quill editor


var quill = new Quill('.quill', {
  theme: 'snow',
  modules: {
    toolbar: [[{
      header: [1, 2, 3, 4, 5, 6, false]
    }], ['bold', 'italic', 'underline', 'strike'], [{
      'list': 'ordered'
    }, {
      'list': 'bullet'
    }], [{
      'script': 'sub'
    }, {
      'script': 'super'
    }], [{
      'indent': '-1'
    }, {
      'indent': '+1'
    }], [{
      'align': []
    }], ['image', 'link', 'code-block']]
  },
  placeholder: 'Blog Content'
});

Quill.prototype.setHTML = function (html) {
  quill.container.firstChild.innerHTML = html;
};

var blogContent = $('#content-body').val();

if (blogContent.length > 0) {
  quill.setHTML(blogContent);
} // Init date picker


$('#datepicker').datepicker(); //Initialize File pond

var fileElement = document.querySelector('.filepond');
FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileEncode, FilePondPluginFilePoster);
var filepond = FilePond.create(fileElement);
FilePond.create({
  source: '12345',
  //don't know what should be the value
  options: {
    type: 'local',
    file: {
      name: 'hedgehog.jpg',
      size: 189397,
      //correct size of the file
      type: 'image/jpeg'
    },
    metadata: {
      poster: 'http://sifuse.test/storage/blogs/477403056.png'
    }
  }
}); // Submit blog form

$('#blog-form').on('submit', function (event) {
  event.preventDefault();
  var title = $('#blog-title').val();
  var date = $('#datepicker').val();
  var category_id = $('#category_select').val();
  var content = quill.container.firstChild.innerHTML;
  var blogImage = JSON.parse($('input[name="filepond"]').val());
  var image = blogImage['data'];
  var image_extension = blogImage['type'].split('/').pop();
  var formData = new FormData();
  formData.append('body', content);
  formData.append('image', image);
  formData.append('title', title);
  formData.append('category_id', category_id);
  formData.append('extension', image_extension);
  formData.append('date', date);
  var isEditing = $(this).data('editing');
  var blogId = $(this).data('id');
  console.log(blogId);
  var url = isEditing ? "/admin/blogs/".concat(blogId) : '/admin/blogs/';
  var method = isEditing ? 'patch' : 'post';
  axios({
    method: 'post',
    url: url,
    data: formData
  }).then(function (response) {
    if (response.data.status === 'success') {
      location.href = '/admin/blogs';
    }
  })["catch"](function (error) {
    console.log(error);
  });
}); // Submit event form

$('#event-form').on('submit', function (event) {
  event.preventDefault();
  var title = $('#event-title').val();
  var date = $('.event-date').val();
  var location = $('#location').val();
  var amount = $('#amount').val();
  var stage = $('#stage').val();
  var content = quill.container.firstChild.innerHTML;
  var eventImage = JSON.parse($('input[name="filepond"]').val());
  var image = eventImage['data'];
  var image_extension = eventImage['type'].split('/').pop();
  var formData = new FormData();
  formData.append('body', content);
  formData.append('image', image);
  formData.append('title', title);
  formData.append('amount', amount);
  formData.append('stage', stage);
  formData.append('location', location);
  formData.append('extension', image_extension);
  formData.append('date', date);
  var isEditing = $(this).data('editing');
  var eventId = $(this).data('id');
  var url = isEditing ? "/admin/events/".concat(eventId) : '/admin/events/';
  axios({
    method: 'post',
    url: url,
    data: formData
  }).then(function (response) {
    if (response.data.status === 'success') {
      location.href = '/admin/events';
    }
  })["catch"](function (error) {
    console.log(error);
  });
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\sif\sifuse\resources\js\main.js */"./resources/js/main.js");


/***/ })

/******/ });