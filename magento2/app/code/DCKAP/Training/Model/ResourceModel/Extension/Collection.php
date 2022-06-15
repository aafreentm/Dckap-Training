<?php
namespace DCKAP\Training\Model\ResourceModel\Extension;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * 
     * Define resource model
     *
     * @return void
     */
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init('DCKAP\Training\Model\Extension', 'DCKAP\Training\Model\ResourceModel\Extension');
    }
}

?>
