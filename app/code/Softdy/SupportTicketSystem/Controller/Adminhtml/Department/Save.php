<?php

namespace Softdy\SupportTicketSystem\Controller\Adminhtml\Department;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Softdy\SupportTicketSystem\Model\DepartmentFactory
     */
    var $departmentFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Softdy\SupportTicketSystem\Model\DepartmentFactory $departmentFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Softdy\SupportTicketSystem\Model\DepartmentFactory $departmentFactory
    ) {
        parent::__construct($context);
        $this->departmentFactory = $departmentFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('softdy/department/addnew');
            return;
        }
        try {
            $rowData = $this->departmentFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('softdy/department/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Softdy_SupportTicketSystem::save');
    }
}