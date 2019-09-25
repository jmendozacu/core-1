// 2019-09-25
var config = {config: {mixins: {
	// 2019-09-25
	// "«Cannot read property '0' of undefined»
	// in Magento_Braintree/js/view/payment/method-renderer/paypal.js":
	// https://github.com/p-pcs/core/issues/2
	'Magento_Braintree/js/view/payment/method-renderer/paypal': {'PPCs_Core/braintree-paypal': true}
	// 2019-09-25
	// 1) "aheadWorks One Step Checkout does not save the customers telephone on a guest checkout":
	// https://github.com/p-pcs/core/issues/7
	// 2) "A guest checkout with Klarna: «Please check the shipping address information. "telephone" is required»":
	// https://github.com/p-pcs/core/issues/6
	,'Magento_Checkout/js/model/shipping-rates-validation-rules': {'PPCs_Core/shipping-rates-validation-rules': true}
}}};