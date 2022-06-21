<?php
namespace DCKAP\AlcoholicModule\Block\Addtocart;

//use Magento\Framework\App\Config\ScopeConfigInterface;

class Js extends \Magento\Framework\View\Element\Template
{

  /* public $scopeConfig;

    public function __construct(
   \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
   \Magento\Store\Model\StoreManagerInterface $storeManager
  ) {
   $this->scopeConfig = $scopeConfig;
   $this->storeManager = $storeManager;
  }

  public function getConfigValue() {

    $valueFromConfig = $this->scopeConfig->getValue(
        'states_section/group_customstates/states_required',
        \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
    );
   return $valueFromConfig;
  }*/

  protected $_regionFactory;
    protected $_scopeConfig;
    public function  __construct(
      
      \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
      \Magento\Directory\Model\RegionFactory $regionFactory
      
    ) {
      $this->_scopeConfig = $scopeConfig;
      $this->_regionFactory = $regionFactory;
      
    }

    public function getShippingregion()
    {
          $RegionId = $this->_scopeConfig->getValue(
        'states_section/group_customstates/states_required',
        \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
    );

          $shipperRegionCode = array();
         $mystates = explode(",",$RegionId);
          foreach($mystates as $states_id)
        {

          if($states_id)
            {

              
              $shipperRegion[$states_id] = $this->_regionFactory->create()->load($states_id)->getName();
              $shipperRegionCode[$states_id] = $shipperRegion[$states_id];
          }

        }


         return $shipperRegionCode;


    }
}