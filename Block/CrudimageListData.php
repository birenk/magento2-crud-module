<?php

namespace Biren\Crudimage\Block;

use Magento\Framework\View\Element\Template\Context;
use Biren\Crudimage\Model\CrudimageFactory;
/**
 * Crudimage List block
 */
class CrudimageListData extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Crudimage
     */
    protected $_crudimage;
    public function __construct(
        Context $context,
        CrudimageFactory $crudimage
    ) {
        $this->_crudimage = $crudimage;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Biren Crudimage Module List Page'));
        
        if ($this->getCrudimageCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'biren.crudimage.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getCrudimageCollection()
            );
            $this->setChild('pager', $pager);
            $this->getCrudimageCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getCrudimageCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $crudimage = $this->_crudimage->create();
        $collection = $crudimage->getCollection();
        $collection->addFieldToFilter('status','1');
        //$crudimage->setOrder('crudimage_id','ASC');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}