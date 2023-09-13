<?php
namespace Chandan\BankInfo\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class NewBank extends Action implements HttpGetActionInterface  {
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Chandan_BankInfo::newBank';
    
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    
    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Chandan_BankInfo::bankList');
        $resultPage->addBreadcrumb(__('Bank'), __('New'));
        $resultPage->getConfig()->getTitle()->prepend(__('New Bank'));
        return $resultPage;
    }
}