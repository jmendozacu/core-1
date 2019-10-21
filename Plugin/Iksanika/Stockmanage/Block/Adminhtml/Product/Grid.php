<?php
namespace PPCs\Core\Plugin\Iksanika\Stockmanage\Block\Adminhtml\Product;
use Iksanika\Stockmanage\Block\Adminhtml\Product\Grid as Sb;
use Magento\Framework\Event\Observer as Ob;
// 2019-10-22
final class Grid {
	/**
	 * 2019-10-22
	 * @see \Iksanika\Stockmanage\Block\Adminhtml\Product\Grid::_prepareColumns()
	 * @see \Magento\Backend\Block\Widget\Grid\Extended::addColumn()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param string $id
	 * @param array(string => mixed)|\Magento\Framework\DataObject $data
	 */
	function aroundAddColumn(Sb $sb, \Closure $f, $id, $data) {
		if ('websites' !== $id) {
			$f($id, $data);
		}
	}
}


