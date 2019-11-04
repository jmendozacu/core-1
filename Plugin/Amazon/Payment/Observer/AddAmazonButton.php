<?php
namespace PPCs\Core\Plugin\Amazon\Payment\Observer;
use Amazon\Payment\Observer\AddAmazonButton as Sb;
use Magento\Framework\Event\Observer as Ob;
// 2019-09-25
final class AddAmazonButton {
	/**
	 * 2019-09-25
	 * @see \Amazon\Payment\Observer\AddAmazonButton::execute()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param Ob $ob
	 */
	function aroundExecute(Sb $sb, \Closure $f, Ob $ob) {
		if (!df_referer_ends_with('/checkout/')) {
			$f($ob);
		}
	}
}