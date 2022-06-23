<?php
 
namespace DCKAP\TextaddModule\Helper;
 
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Module\Manager;
use Magento\Store\Model\ScopeInterface;
 
class Data extends AbstractHelper
{
    protected $moduleManager;
 
    public function __construct(
        Context $context,
        Manager $moduleManager
    )
    {
        $this->moduleManager = $moduleManager;
        parent::__construct($context);
    }
    
    public function isEnable()
    {
       /* if ($this->moduleManager->isEnabled('DCKAP_AlcoholicModule')) {
            //code for Module is enabled
            return 1;
        } else {
            //code for Module is disabled
            return 0;
        }*/

            return $this->scopeConfig->getValue('sectiondckap/groupdckap/fielddckap', ScopeInterface::SCOPE_STORE);
        
    }
}