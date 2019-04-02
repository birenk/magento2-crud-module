<?php

namespace Biren\Crudimage\Model\ResourceModel;

class Crudimage extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('biren_crudimage', 'crudimage_id');   //here "biren_crudimage" is table name and "crudimage_id" is the primary key of custom table
    }
}