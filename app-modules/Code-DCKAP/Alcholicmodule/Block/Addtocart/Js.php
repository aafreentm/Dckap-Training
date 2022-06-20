<?php
namespace DCKAP\Alcholicmodule\Block\Addtocart;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Js extends \Magento\Framework\View\Element\Template
{
      public function __construct(ScopeConfigInterface $scopeConfig)
      {
          $this->_scopeConfig = $scopeConfig;
      }

      public function getstatesOptions()
      {
          return $this->_scopeConfig->getValue("states_section/group_customstates/states_required");
      }
}