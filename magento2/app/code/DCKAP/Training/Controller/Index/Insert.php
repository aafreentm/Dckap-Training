<?php
/* 
namespace DCKAP\Training\Controller\Index;
 
use Magento\Framework\App\Action\Action;
 
class Index extends Action
{
    protected $_resultPageFactory;
 
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
 
    public function execute()
    {
        //echo "Module Cretaed Successfully";
         return $this->_resultPageFactory->create();
    }
}*/

 
namespace DCKAP\Training\Controller\Index;
 
class Insert extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory
     ){
          $this->_pageFactory = $pageFactory;
          return parent::__construct($context);
     }
 
     public function execute()
     {
          return $this->_pageFactory->create();
     }
}


?>