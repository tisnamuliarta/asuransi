window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

require('./admin/paper-dashboard.js');
require('./admin/chartist.min.js');
require('sweetalert');
require('./paper-kit/ct-paper-checkbox.js');
require('./paper-kit/bootstrap-select.js');
// require('eonasdan-bootstrap-datetimepicker');
require('./paper-kit/bootstrap-datepicker.js');
require('./paper-kit/ct-paper-radio.js');
require('./paper-kit/ct-paper.js');