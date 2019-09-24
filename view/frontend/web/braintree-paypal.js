// 2019-09-25
// "«Cannot read property '0' of undefined»
// in Magento_Braintree/js/view/payment/method-renderer/paypal.js":
// https://github.com/p-pcs/core/issues/2
define(['jquery', 'Magento_Checkout/js/model/quote'], function($, q) {'use strict'; return function(sb) {
$.extend(sb.prototype, {
	// 2019-09-25
	// https://github.com/genecommerce/module-braintree-magento2/blob/3.3.0/view/frontend/web/js/view/payment/method-renderer/paypal.js#L300-L316
	getShippingAddress: function() {var a = q.shippingAddress(); var s = a.street; return {
		city: a.city
		,countryCode: a.countryId
		,line1: !s || !s.length ? '' : s[0]
		,line2: !s || 2 > s.length ? '' : (3 > s.length ? s[1] : s[1] + ' ' + s[2])
		,postalCode: a.postcode
		,recipientName: a.firstname + ' ' + a.lastname
		,state: a.region
	};}
});
return sb;};});