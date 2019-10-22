<?php
namespace PPCs\Core\Plugin\Iksanika\Stockmanage\Controller\Adminhtml\Product;
use Magento\Catalog\Model\Product as P;
// 2019-10-22
final class MassUpdateProducts {
	/**
	 * 2019-10-22
	 * "Make the «Cost» and «Price» columns of the the Iksanika's Stock Inventory Manager's grid editable":
	 * https://github.com/p-pcs/core/issues/17
	 * @see \Iksanika\Stockmanage\Controller\Adminhtml\Product\MassUpdateProducts::execute()
	 */
	function beforeExecute() {
        $cost = df_float(df_request('cost')); /** @var float[] $cost */
        $price = df_float(df_request('price')); /** @var float[] $price */
        $storeId = (int)df_request('store'); /** @var int $storeId */
        foreach (df_int(df_request('product', [])) as $i => $id) { /** @var int $i */ /** @var int $id */
			$p = df_product_r()->getById($id, true, $storeId); /** @var P $p */
			$p->addData(['cost' => $cost[$i], 'price' => $price[$i]])->save();
		}
	}
}