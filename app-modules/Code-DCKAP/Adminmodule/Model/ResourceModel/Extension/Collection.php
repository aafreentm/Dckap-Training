<?php
namespace DCKAP\Adminmodule\Model\ResourceModel\Extension;
 
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
        $this->_init('DCKAP\Adminmodule\Model\Extension', 'DCKAP\Adminmodule\Model\ResourceModel\Extension');
    }
}

?>
