<?php
namespace DCKAP\Bannermodule\Model;
 
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Extension extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('DCKAP\Bannermodule\Model\ResourceModel\Extension');
    }
}


?>