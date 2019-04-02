<?php

namespace Biren\Crudimage\Block;

/**
 * Crudimage content block
 */
class Crudimage extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Biren Crudimage Module'));
        
        return parent::_prepareLayout();
    }
}
