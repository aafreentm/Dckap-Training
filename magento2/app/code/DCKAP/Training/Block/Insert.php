<?php

/*namespace DCKAP\Training\Block;

use Magento\Framework\View\Element\Template;

class MyModule extends Template
{
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getMymodule()
    {
       // return 'Module Created Successfully';
           return $this->getUrl('mymodule/index/submit', ['_secure' => true]);
    }
}

<?php*/
 
namespace DCKAP\Training\Block;
 
class Insert extends \Magento\Framework\View\Element\Template
{
     protected $_pageFactory;
     protected $_postLoader;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
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