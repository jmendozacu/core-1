<?php
namespace PPCs\Core\Plugin\Amazon\Core\Helper;
use Amazon\Core\Helper\CategoryExclusion as Sb;
// 2019-11-04
final class CategoryExclusion {
	/**
	 * 2019-11-04 «No such entity with customerId = ...»: https://github.com/p-pcs/core/issues/27
	 * @see \Amazon\Core\Helper\CategoryExclusion::isQuoteDirty()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @return bool
	 */
	function aroundIsQuoteDirty(Sb $sb, \Closure $f) {return df_checkout_session()->getQuoteId() && $f();}
}