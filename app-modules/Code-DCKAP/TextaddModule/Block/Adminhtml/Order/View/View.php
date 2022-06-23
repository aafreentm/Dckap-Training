<?php

namespace DCKAP\TextaddModule\Block\Adminhtml\Order\View;


class View extends \Magento\Backend\Block\Template
{


    public function myFunction()
    {
        $orderId = $this->getRequest()->getParam('order_id');
        return "Customer's Custom Comment";
    }
}

?>