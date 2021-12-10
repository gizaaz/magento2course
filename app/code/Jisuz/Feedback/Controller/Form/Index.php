<?php

namespace Jisuz\Feedback\Controller\Form;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Index implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageResultFactory;

    /**
     * Index constructor.
     * @param PageFactory $pageResultFactory
     */
    public function __construct(PageFactory $pageResultFactory)
    {
        $this->pageResultFactory = $pageResultFactory;
    }


    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        return $this->pageResultFactory->create();
    }
}
