<?php

namespace Jisuz\TestOM\Controller\Index;


class View implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    private $testArguments;
    private $playWithTest;

    public function __construct(\Jisuz\TestOM\Model\Test $testArguments, \Jisuz\TestOM\Model\PlayWithTest $playWithTest) {
        $this->testArguments = $testArguments;
        $this->playWithTest = $playWithTest;
    }

    public function execute()
    {
        $this->testArguments->log();
        echo "</br>\n";
        echo "</br>\n";
        $this->playWithTest->run();

        exit();
    }
}
