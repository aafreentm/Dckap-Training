<?php
 
namespace DCKAP\Training\Controller\Index;
 
use Magento\Framework\App\Action\Action;

 
class Index extends Action
{
    protected $_resultPageFactory;
 
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Cache\Manager $cacheManager
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->cacheManager = $cacheManager;
        parent::__construct($context);
    }
 
    public function execute()
    {
        //echo "Module Cretaed Successfully";

          $this->cacheManager->flush($this->cacheManager->getAvailableTypes());
          // or this
         //$this->cacheManager->clean($this->cacheManager->getAvailableTypes());
         return $this->_resultPageFactory->create();
    }
}


?>