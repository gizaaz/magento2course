<?php

namespace Jisuz\TestRendering\Controller\Block;

use Magento\Framework\App\ResponseInterface;

class Index implements \Magento\Framework\App\ActionInterface
{
    private $layoutFactory;

    public function __construct(
        \Magento\Framework\View\LayoutFactory $layoutFactory
    ) {
        $this->layoutFactory = $layoutFactory;
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock('Jisuz\TestRendering\Block\Test');
        echo $block->toHtml();
    }
}
