<?php
namespace DCKAP\Adminmodule\Controller\Adminhtml\Customer;
 
use Magento\Backend\App\Action;
 
class Delete extends Action
{
    protected $_model;
 
    /**
     * @param Action\Context $context
     * @param \Maxime\Jobs\Model\Department $model
     */
    public function __construct(
        Action\Context $context,
        \DCKAP\Adminmodule\Model\Extension $model
    ) {
        parent::__construct($context);
        $this->_model = $model;
    }
 
    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('DCKAP_Adminmodule::customer_delete');
    }
 
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_model;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Customer deleted'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Customer does not exist'));
        return $resultRedirect->setPath('*/*/');
    }
}