<?php
namespace DCKAP\AlcoholicModule\Model\ResourceModel\Extension;
 
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
        $this->_init('DCKAP\AlcoholicModule\Model\Extension', 'DCKAP\AlcoholicModule\Model\ResourceModel\Extension');
    }
}

?>
