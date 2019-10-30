// 2019-10-30
// "Prevent an error message from being hidden after 5 seconds on the frontend checkout screen":
// https://github.com/p-pcs/core/issues/23
define([], function() {'use strict'; return function(sb) {$.extend(sb, {
	onHiddenChange: function() {}
});return sb;};});