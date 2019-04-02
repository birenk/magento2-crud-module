<?php

namespace Biren\Crudimage\Controller\Adminhtml\Items;

class NewAction extends \Biren\Crudimage\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
