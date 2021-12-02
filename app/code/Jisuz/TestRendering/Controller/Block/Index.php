<?php

namespace Jisuz\TestRendering\Controller\Block;

use Magento\Framework\App\ResponseInterface;

class Index implements \Magento\Framework\App\ActionInterface
{
    private $layoutFactory;

    private $resultRawFactory;

    public function __construct(
        \Magento\Framework\View\LayoutFactory $layoutFactory,
        \Magento\Framework\Controller\ResultFactory $resultRawFactory
    ) {
        $this->layoutFactory = $layoutFactory;
        $this->resultRawFactory = $resultRawFactory;
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock(\Jisuz\TestRendering\Block\Test::class);
        $resultRaw = $this->resultRawFactory->create($this->resultRawFactory::TYPE_RAW);
        return $resultRaw->setContents($block->toHtml());
    }
}
