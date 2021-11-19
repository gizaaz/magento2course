<?php

namespace Jisuz\TestOM\Controller\Index;


class View implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    private $testArguments;

    public function __construct(\Jisuz\TestOM\Model\Test $testArguments) {
        $this->testArguments = $testArguments;
    }

    public function execute()
    {
        $this->testArguments->log();

        exit();
    }
}
