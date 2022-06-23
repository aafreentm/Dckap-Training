<?php
namespace DCKAP\TextaddModule\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;

class ObserverforAddCustomVariable implements ObserverInterface
{

    public function __construct(
    ) {
    }

    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var \Magento\Framework\App\Action\Action $controller */
        $transport = $observer->getTransport();
        $order = $transport->getOrder();
        $items = $order->getAllItems();
         $order_cart = $observer->getEvent()->getOrder();
        $value = "";
        // ADD YOUR CONDITION BELOW
            if($order->getCustom() !=''){
              $value .= $order->getCustom();
            }else{
                 $value .= "N/A";
         }
        $transport['CustomVariable1'] = $value;
    }
}
