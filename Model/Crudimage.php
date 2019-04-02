<?php

namespace Biren\Crudimage\Model;

use Magento\Framework\Model\AbstractModel;

class Crudimage extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Biren\Crudimage\Model\ResourceModel\Crudimage');
    }
}