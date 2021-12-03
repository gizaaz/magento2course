<?php

namespace Jisuz\TestRendering\Controller\Layout;

use Magento\Framework\App\ResponseInterface;

class Onecolumn implements \Magento\Framework\App\ActionInterface
{
    private $resultRawFactory;

    public function __construct(
        \Magento\Framework\Controller\ResultFactory $resultRawFactory
    ) {
        $this->resultRawFactory = $resultRawFactory;
    }

    public function execute()
    {
        return $this->resultRawFactory->create($this->resultRawFactory::TYPE_PAGE);
    }
}
