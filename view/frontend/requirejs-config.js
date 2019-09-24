// 2019-09-25
// "«Cannot read property '0' of undefined»
// in Magento_Braintree/js/view/payment/method-renderer/paypal.js":
// https://github.com/p-pcs/core/issues/2
var config = {config: {mixins: {
	'Magento_Braintree/js/view/payment/method-renderer/paypal': {'PPCs_Core/braintree-paypal': true}
}}};