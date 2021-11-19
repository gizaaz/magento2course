<?php

namespace Jisuz\TestOM\Model;

class PlayWithTest
{
    private $testObject;
    private $testObjectFactory;
    private $manager;

    public function __construct(
        \Jisuz\TestOM\Model\Test $testObject,
        \Jisuz\TestOM\Model\TestFactory $testObjectFactory,
        \Jisuz\TestOM\Model\ManagerCustomImplementation $manager
    ) {
        $this->testObject = $testObject;
        $this->testObjectFactory = $testObjectFactory;
        $this->manager = $manager;
    }
    public function run()
    {
        $this->testObject->log();
        echo "</br>\n";
        echo "</br>\n";
        $customArrayList = ['item1' => 'Vlad', 'item2' => 'Pylypenko'];
        $newTestObject = $this->testObjectFactory->create([
            'arrayList' => $customArrayList,
            'manager' => $this->manager,
            'number' => 777
        ]);
        $newTestObject->log();
    }
}
