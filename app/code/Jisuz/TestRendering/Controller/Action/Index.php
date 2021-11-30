<?php

namespace Jisuz\TestRendering\Controller\Action;

use Magento\Framework\App\ResponseInterface;

class Index implements \Magento\Framework\App\ActionInterface
{
    private $resultRawFactory;

    private $layoutFactory;

    public function __construct(
        \Magento\Framework\Controller\Result\RawFactory $resultRawFactory,
        \Magento\Framework\View\LayoutFactory $layoutFactory
    ) {
        $this->resultRawFactory = $resultRawFactory;
        $this->layoutFactory = $layoutFactory;
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock(\Jisuz\TestRendering\Block\Test::class);
        $block->setTemplate('test.phtml');
        $resultRaw = $this->resultRawFactory->create();
        return $resultRaw->setContents($block->toHtml());
    }
}
