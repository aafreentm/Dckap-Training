<?php

namespace DCKAP\Bannermodule\Block;

 
class Banner extends \Magento\Framework\View\Element\Template
{

protected $_storeManagerInterface;


public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Magento\Store\Model\StoreManagerInterface $storeManagerInterface,
    array $data = []
 ) {
    
    $this->_storeManagerInterface = $storeManagerInterface;
    parent::__construct($context, $data);
  }


public function getStoreInterface($imgUrl){
   $store = $this->_storeManagerInterface->getStore();
   $storeMedia = $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'custom_banner/banner/' . $imgUrl;
   return $storeMedia;
}


}

?>