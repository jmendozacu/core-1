<?php
namespace PPCs\Core\Plugin\Catalog\Controller\Adminhtml;
use Magento\Catalog\Controller\Adminhtml\Product as Sb;
use Magento\Framework\App\Request\Http as Request;
use Magento\Framework\App\RequestInterface as IRequest;
use Magento\Framework\App\ResponseInterface as IResponse;
// 2019-10-23
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Product extends Sb {
	/**
	 * 2019-10-23
	 * @override
	 * @see Sb::__construct()
	 */
	function __construct() {}

	/**
	 * 2019-10-23
	 * "Make the access to the Iksanika's Stock Inventory Manager module controllable per a role":
	 * https://github.com/p-pcs/core/issues/21
	 * @see \Magento\Backend\App\AbstractAction::_isAllowed()
	 * @see \Magento\Backend\App\AbstractAction::dispatch()
	 * @param Sb $sb
	 * @param \Closure $f
	 * @param IRequest|Request $req
	 * @return IResponse
	 */
	function aroundDispatch(Sb $sb, \Closure $f, IRequest $req) { /** @var IResponse $r */
		if (
			'Iksanika_Stockmanage' !== $req->getControllerModule()
			|| !$req->isDispatched()
			|| 'denied' === $req->getActionName()
			|| df_auth_f()->isAllowed('PPCs_Core::Iksanika_Stockmanage')
		) {
			$r = $f($req);
		}
		else {
			$sb->_response->setStatusHeader(403, '1.1', 'Forbidden');
			if (!$sb->_auth->isLoggedIn()) {
				$r = $this->_redirect('*/auth/login');
			}
			else {
				$sb->_view->loadLayout(['default', 'adminhtml_denied'], true, true, false);
				$sb->_view->renderLayout();
				$sb->_request->setDispatched(true);
				$r = $sb->_response;
			}
		}
		return $r;
	}

	/**
	 * 2019-10-23
	 * @override
	 * @see Sb::execute()
	 */
	function execute() {}
}