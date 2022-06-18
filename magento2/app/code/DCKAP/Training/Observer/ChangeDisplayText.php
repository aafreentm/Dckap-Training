<?php

namespace DCKAP\Training\Observer;


class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface {

private $messageManager;

public function __construct(\Magento\Framework\Message\ManagerInterface $messageManager) {
    $this->messageManager = $messageManager;        
}

public function execute(\Magento\Framework\Event\Observer $observer) {
    $this->messageManager->addErrorMessage("Custom error message");
}

}

?>