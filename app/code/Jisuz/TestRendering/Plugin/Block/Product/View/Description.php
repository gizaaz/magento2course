<?php

namespace Jisuz\TestRendering\Plugin\Block\Product\View;

class Description extends \Magento\Catalog\Block\Product\View\Description
{
    public function beforeToHtml(
        \Magento\Catalog\Block\Product\View\Description $subject
    ) {
//        $subject->getProduct()->setDescription('Test description');
        if ($subject->getNameInLayout() === 'product.info.sku') {
            $subject->setTemplate('Jisuz_TestRendering::description.phtml');
        }
    }
}
