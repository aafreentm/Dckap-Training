<?php
namespace DCKAP\TextaddModule\Model\ResourceModel\Comment;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * 
     * Define resource model
     *
     * @return void
     */
    protected $_idFieldName = 'entity_id';
    public static $table = 'sales_order';
    public static $leftJoinTable = 'quote';

    protected function _construct()
    {   

        $this->_init('DCKAP\TextaddModule\Model\Comment', 'DCKAP\TextaddModule\Model\ResourceModel\Comment');
    }
}

?>
