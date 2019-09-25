// 2019-09-25
// 1) "aheadWorks One Step Checkout does not save the customers telephone on a guest checkout":
// https://github.com/p-pcs/core/issues/7
// 2) "A guest checkout with Klarna: «Please check the shipping address information. "telephone" is required»":
// https://github.com/p-pcs/core/issues/6
define([
	'df-lodash', 'jquery', 'mage/utils/wrapper'
], function(_, $, w) {'use strict';
return function(sb) {
$.extend(sb, {
	// 2019-09-25 https://github.com/magento/magento2/blob/2.3.2/app/code/Magento/Checkout/view/frontend/web/js/model/shipping-rates-validation-rules.js#L36-L49
	getObservableFields: w.wrap(sb.getObservableFields, function(_super) {return _.uniq(_super().concat([
		// 2019-09-25 @todo Maybe we need to add 'region_id' / 'region' too?
		'city', 'country_id', 'firstname', 'lastname', 'postcode', 'street', 'telephone'
	]));})
});
return sb;};});