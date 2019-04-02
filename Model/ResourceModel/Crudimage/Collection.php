<?php

namespace Biren\Crudimage\Model\ResourceModel\Crudimage;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'crudimage_id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Biren\Crudimage\Model\Crudimage',
            'Biren\Crudimage\Model\ResourceModel\Crudimage'
        );
    }
}