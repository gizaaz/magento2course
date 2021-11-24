<?php

namespace Jisuz\TestRouting\Controller\Index;

class Index implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    private $resultRawFactory;

    public function __construct(\Magento\Framework\Controller\ResultFactory $resultRawFactory)
    {
        $this->resultRawFactory = $resultRawFactory;
    }

    public function execute()
    {
        $resultRaw = $this->resultRawFactory->create($this->resultRawFactory::TYPE_RAW);
        return $resultRaw->setContents('simple text');
    }
}
