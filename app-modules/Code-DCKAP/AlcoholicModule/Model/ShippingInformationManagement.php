<?php

namespace DCKAP\AlcoholicModule\Model;
use Magento\Framework\Exception\StateException;

class ShippingInformationManagement
{

    protected $_messageManager;
    protected $jsonResultFactory;

   public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        $this->_messageManager = $messageManager;
        $this->jsonResultFactory = $jsonResultFactory;
        //parent::__construct($context);
    }
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation

    )
    {
    $address = $addressInformation->getShippingAddress();
    $region_shipping = $address->getData('region');
    #echo '<pre>';print_r($postcode);exit;
    $datsload =  \Magento\Framework\App\ObjectManager::getInstance();
    $result = $this->jsonResultFactory->create();
    $store = $datsload->get('Magento\Store\Model\StoreManagerInterface')->getStore();
     $cart = $datsload->get('\Magento\Checkout\Model\Cart');
        $itemsCollection = $cart->getQuote()->getItemsCollection();

      $getstatesOptions =  $store->getConfig('states_section/group_customstates/states_required');
     $region_name_config = array();
      $not_matched = 0;
      $alocholic_matched = 0;
      $alocholic_enable = array();
     $mystates = explode(",",$getstatesOptions);
        
           foreach($itemsCollection as $item){
            $_product_aattr = $datsload->get('Magento\Catalog\Model\Product')->load($item->getProductId());
            $specialLabel = $_product_aattr->getData('enable_alcoholic_attribute'); 
           
            if(($specialLabel==1)){
            $alocholic_matched = 1;
            break;
            // return;
            }
        }
           foreach($mystates as $states_id){
                if($states_id)
                {
                   $region = $datsload->create('Magento\Directory\Model\Region')->load($states_id);
                    $region_name_config =  $region->getName();

                  if(($region_name_config!=$region_shipping)){
                    $not_matched = 1;
                  }else if($region_name_config==$region_shipping){
                    $not_matched = 0;
                    break;
                  }
                } 
            }
        if(($alocholic_matched==1) && ($not_matched==1)){
        //if(in_array($region_shipping,$region_name_config))
          //{
           $stat="Some Products are not able to ship in selected region,please try again.";
           throw new StateException(__($stat));
        // }
        
       }
        // $stat="no sevice";
        //    throw new StateException(__($alocholic_matched));

     }
}