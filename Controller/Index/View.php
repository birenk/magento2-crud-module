<?php

namespace Biren\Crudimage\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Biren\Crudimage\Block\CrudimageView;

class View extends \Magento\Framework\App\Action\Action
{
	protected $_crudimageview;

	public function __construct(
        Context $context,
        CrudimageView $crudimageview
    ) {
        $this->_crudimageview = $crudimageview;
        parent::__construct($context);
    }

	public function execute()
    {
    	if(!$this->_crudimageview->getSingleData()){
    		throw new NotFoundException(__('Parameter is incorrect.'));
    	}
    	
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
