<?php
namespace PPCs\Core\Plugin\Backend\Block\Widget\Grid\Massaction;
use Magento\Backend\Block\Widget\Grid\Massaction\Extended as Sb;
// 2019-10-22
final class Extended {
	/**
	 * 2019-10-22
	 * "Make the «Cost» and «Price» columns of the the Iksanika's Stock Inventory Manager's grid editable":
	 * https://github.com/p-pcs/core/issues/17
	 * @see \Iksanika\Stockmanage\Block\Adminhtml\Product\Grid::_prepareMassaction()
	 * @see \Magento\Backend\Block\Widget\Grid\Massaction\Extended::addItem()
	 * @param Sb $sb
	 * @param string $id
	 * @param array(string => mixed) $a
	 * @return array(string, array(string => mixed))
	 */
	function beforeAddItem(Sb $sb, $id, array $a) {
		if ('save' === $id && df_contains(dfa($a, 'url'), 'stockmanage/product/massUpdateProducts')) {
			$a['fields'] = array_merge($a['fields'], ['cost', 'price']);
		}
		return [$id, $a];
	}
}