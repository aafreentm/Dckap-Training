<?php
namespace DCKAP\TextaddModule\Model\ResourceModel;
 
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Comment extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('sales_order', 'entity_id');
    }
}



?>