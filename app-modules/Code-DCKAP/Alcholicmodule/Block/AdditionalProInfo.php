<?php
namespace DCKAP\Alcholicmodule\Block;

/**
 * AdditionalProInfo
 */
class AdditionalProInfo extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
    */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Cart $cart ,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_cart = $cart;  
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
    }

    /**
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
    }

    /**
     * @return additional information data
     */
    public function getAdditionalData()
    {

    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $product_det = $objectManager->get('Magento\Framework\Registry')->registry('current_product');//get current product
        //echo $product->getId();

         //$context = $objectManager->get('Magento\Framework\App\Http\Context');
        //$isLoggedIn = $context->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
        $cart = $objectManager->get('\Magento\Checkout\Model\Cart');
        $itemsCollection = $cart->getQuote()->getItemsCollection();
        
        // $productInfo = $this->_cart->getQuote()->getItemsCollection();
         //$productInfo = $this->_cart->getQuote()->getAllItems(); /*****For All items *****/
        foreach ($itemsCollection as $item){

         //  echo $item->getProductId();
            $_product_aattr = $objectManager->get('Magento\Catalog\Model\Product')->load($item->getProductId());
            
                $specialLabel = $_product_aattr->getData('enable_alcoholic_attribute'); 

                $_product_id = $item->getProductId();
                
             $alocholic_enable[$_product_id]= $specialLabel;
            
            
        }

        return $alocholic_enable;

        /*if($alocholic_enable == '1'){
            return $alocholic_enable;
            }else{
              return $alocholic_enable;
            }*/
        
    }
}

?>