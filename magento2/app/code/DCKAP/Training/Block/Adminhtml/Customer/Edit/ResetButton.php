<?php

namespace DCKAP\Training\Block\Adminhtml\Customer\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton extends GenericButton implements ButtonProviderInterface
{

/**
* @return array
*/
public function getButtonData()
{
return [
'label' => __('Reset'),
'class' => 'reset',
'on_click' => 'location.reload();',
'sort_order' => 30
];
}
}