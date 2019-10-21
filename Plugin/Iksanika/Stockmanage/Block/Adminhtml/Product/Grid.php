<?php
namespace PPCs\Core\Plugin\Iksanika\Stockmanage\Block\Adminhtml\Product;
use Iksanika\Stockmanage\Block\Adminhtml\Product\Grid as Sb;
use Magento\Framework\Event\Observer as Ob;
// 2019-10-22
final class Grid {
	/**
	 * 2019-10-22
	 * 1) "Remove the «Websites» column from the Iksanika's Stock Inventory Manager's grid":
	 * https://github.com/p-pcs/core/issues/12
	 * 2) "Remove the «Visibility» column from the Iksanika's Stock Inventory Manager's grid":
	 * https://github.com/p-pcs/core/issues/13
	 * 3) "Remove the «Type» column from the Iksanika's Stock Inventory Manager's grid":
	 * https://github.com/p-pcs/core/issues/14
	 * @see \Iksanika\Stockmanage\Block\Adminhtml\Product\Grid::_prepareColumns()
	 * @see \Magento\Backend\Block\Widget\Grid\Extended::addColumn()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param string $id
	 * @param array(string => mixed)|\Magento\Framework\DataObject $data
	 */
	function aroundAddColumn(Sb $sb, \Closure $f, $id, $data) {
		if (!in_array($id, ['type', 'visibility', 'websites'])) {
			$f($id, $data);
		}
	}
}


