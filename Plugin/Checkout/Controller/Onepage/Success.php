<?php
namespace PPCs\Core\Plugin\Checkout\Controller\Onepage;
// 2019-11-03
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Success {
	/**
	 * 2019-11-03 «No such entity with customerId = ...»: https://github.com/p-pcs/core/issues/27
	 * @see \Magento\Checkout\Controller\Onepage::dispatch()
	 */
	function beforeDispatch() {df_checkout_session()->setLoadInactive();}
}