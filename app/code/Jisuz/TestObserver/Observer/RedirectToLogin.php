<?php

namespace Jisuz\TestObserver\Observer;

use Magento\Framework\Event\ObserverInterface;

class RedirectToLogin implements ObserverInterface
{
    private $redirect;
    private $actionFlag;
    private $customerSession;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag
    )
    {
        $this->redirect = $redirect;
        $this->actionFlag = $actionFlag;
        $this->customerSession = $customerSession;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getEvent()->getData('request');

          if ($request->getFullActionName() == 'catalog_product_view' && !$this->customerSession->isLoggedIn()) {
            $controller = $observer->getEvent()->getData('controller_action');
            $this->actionFlag->set('', \Magento\Framework\App\ActionInterface::FLAG_NO_DISPATCH, true);

            $this->redirect->redirect($controller->getResponse(), 'customer/account/login');
        }
    }
}
