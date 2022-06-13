<?php
 
namespace DCKAP\Training\Block;
 
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use DCKAP\Training\Model\ResourceModel\Extension\CollectionFactory;
use DCKAP\Training\Helper\Data;


use Magento\Framework\App\PageCache\Version;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\App\Cache\Frontend\Pool;

class Showdata extends Template
{
 
    public $collection;
    protected $_dataHelper;
    protected $cacheTypeList;
    protected $cacheFrontendPool;
 
    public function __construct(Context $context, CollectionFactory $collectionFactory,Data $dataHelper,TypeListInterface $cacheTypeList,
          Pool $cacheFrontendPool, array $data = [])
    {
        $this->collection = $collectionFactory;
        $this->_dataHelper = $dataHelper;
         $this->_cacheFrontendPool = $cacheFrontendPool;
        $this->_cacheTypeList = $cacheTypeList;
 
        parent::__construct($context, $data);
    }

    public function canShowBlock()
    {
      return $this->_dataHelper->isEnable();
    }
 
    public function getCollection()
    {   
        return $this->collection->create();
    }

    public function cacheClear()
      {
       /* get all types of cache in system */
        $allTypes = array_keys($this->_cacheTypeList->getTypes());
 
        /* Clean cached data for specific cache type */
        foreach ($allTypes as $type) {
            $this->_cacheTypeList->cleanType($type);
        }
 
        /* flushed the Entire cache storage from system, Works like Flush Cache Storage button click on System -> Cache Management */
        foreach ($this->_cacheFrontendPool as $cacheFrontend) {
            $cacheFrontend->getBackend()->clean();
        }
        //return true;
    }
 
}
