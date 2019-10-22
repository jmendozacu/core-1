<?php
namespace PPCs\Core\Plugin\Iksanika\Stockmanage\Block\Adminhtml\Product;
use Iksanika\Stockmanage\Block\Adminhtml\Product\Grid as Sb;
use Iksanika\Stockmanage\Block\Widget\Grid\Column\Renderer\Number;
use Magento\Catalog\Model\ResourceModel\Product\Collection as C;
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
		if (!in_array($id, ['visibility', 'websites'])) {
			if ('price' === $id) {
				/**
				 * 2019-10-22
				 * "Make the «Cost» and «Price» columns
				 * of the the Iksanika's Stock Inventory Manager's grid editable":
				 * https://github.com/p-pcs/core/issues/17
				 */
				/** @var array(string => string) $pd */
				$pd = ['class' => 'input-text admin__control-text', 'renderer' => Number::class];
				$data = $pd + $data;
				$f('cost', $pd + [
					'column_css_class' => 'col-price'
					,'currency_code' => df_currency_base_c(df_request('store', 0))
					,'header' => 'Cost'
					,'header_css_class' => 'col-price'
					,'index' => 'cost'
					,'type' => 'price'
				]);
			}
			else if ('type' === $id) {
				list($id, $data) = ['brand', [
					'header' => 'Brand'
					,'index' => 'brand'
					,'options' => df_product_att_options_m('brand')
					,'type' => 'options'
				]];
			}
			$f($id, $data);
		}
	}

	/**
	 * 2019-10-23
	 * "The «Brand» column of the Iksanika's Stock Inventory Manager's grid
	 * does not show values for some products on the live website":
	 * https://github.com/p-pcs/core/issues/18
	 * @see \Iksanika\Stockmanage\Block\Adminhtml\Product\Grid::_prepareCollection()
	 * @see \Magento\Backend\Block\Widget\Grid\Extended::setCollection()
	 * @param Sb $sb
	 * @param C $c
	 */
	function beforeSetCollection(Sb $sb, C $c) {$c->addAttributeToSelect('brand');}
}