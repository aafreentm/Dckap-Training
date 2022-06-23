<?php 

namespace DCKAP\TextaddModule\Block\Frontend\View;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class View extends Template
{

    public function __construct(
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getCustomData()
    {
        return 'Shipping Comment';
    }
}
?>