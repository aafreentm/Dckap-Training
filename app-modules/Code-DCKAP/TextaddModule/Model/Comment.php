<?php

namespace DCKAP\TextaddModule\Model;
 
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Comment extends AbstractModel
{

     const CACHE_TAG = 'DCKAP_shippingcomment_comment'; 

    protected function _construct()
    {
        $this->_init('DCKAP\TextaddModule\Model\ResourceModel\Comment');
    }

     public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}

?>