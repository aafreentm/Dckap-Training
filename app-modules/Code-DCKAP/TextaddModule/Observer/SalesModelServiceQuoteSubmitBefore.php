<?php

namespace DCKAP\TextaddModule\Observer;

class SalesModelServiceQuoteSubmitBefore implements \Magento\Framework\Event\ObserverInterface
{
    protected $logger;
    protected $objectCopyService;
    private $quoteRepository;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\DataObject\Copy $objectCopyService,
        \Magento\Quote\Model\QuoteRepository $quoteRepository
    )
    {
        $this->logger = $logger;
        $this->objectCopyService = $objectCopyService;
        $this->quoteRepository = $quoteRepository;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        $quotes = $this->quoteRepository->get($order->getQuoteId());
        if ($quotes->getCustom()) {
            $order->setCustom($quotes->getCustom());
        }
        return $this;
    }
}