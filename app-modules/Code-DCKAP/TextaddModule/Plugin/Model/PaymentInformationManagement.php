<?php
namespace DCKAP\TextaddModule\Plugin\Model;

use Magento\Quote\Api\Data\AddressInterface;

class PaymentInformationManagement
{
    protected $orderRepository;
    protected $paymentFactory;
    protected $logger;
    protected $quoteRepository;

    public function __construct(
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Quote\Api\Data\PaymentExtensionFactory $paymentFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Quote\Api\CartRepositoryInterface $quoteRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->paymentFactory = $paymentFactory;
        $this->logger = $logger;
        $this->quoteRepository = $quoteRepository;
    }

    public function beforeSavePaymentInformationAndPlaceOrder(
        \Magento\Checkout\Api\PaymentInformationManagementInterface $subject,
        $cartId,
        \Magento\Quote\Api\Data\PaymentInterface $paymentMethod
    )
    {   
         try {
        if ($paymentMethod->getExtensionAttributes()->getCustom()!='') {
            $quote = $this->quoteRepository->getActive($cartId);
            $quote->setCustom($paymentMethod->getExtensionAttributes()->getCustom());
            $this->quoteRepository->save($quote);
         }
        } catch (\Exception $e) {
            throw new CouldNotSaveException(
                __($e->getMessage()),$e);
        }
        
    }
}


?>