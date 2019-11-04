<?php
namespace PPCs\Core\Plugin\Quote\Model;
use Magento\Framework\Exception\NoSuchEntityException as NSE;
use Magento\Quote\Model\Quote as Q;
use Magento\Quote\Model\QuoteRepository as Sb;
// 2019-11-04
final class QuoteRepository {
	/**
	 * 2019-11-04 «No such entity with customerId = ...»: https://github.com/p-pcs/core/issues/27
	 * @see \Magento\Quote\Model\QuoteRepository::getActiveForCustomer()
	 * @param Sb $sb
	 * @param \Closure $f 
	 * @param int $customerId
	 * @param int[] $sharedStoreIds [optional]
	 * @return Q
	 */
	function aroundGetActiveForCustomer(Sb $sb, \Closure $f, $customerId, array $sharedStoreIds = []) {
		try {
			$r = $f($customerId, $sharedStoreIds);
		}
		catch (NSE $e) {
			if (!df_referer_ends_with('/checkout/onepage/success/')) {
				throw $e;
			}
			$r = df_new_om(Q::class);
		}
		return $r;
	}
}