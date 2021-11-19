<?php

namespace Jisuz\TestOM\Model;

class Test
{
    private $manager;
    private $arrayList;
    private $name;
    private $number;
    private $managerFactory;

    public function __construct(
        \Jisuz\TestOM\Model\ManagerInterface $manager,
        \Jisuz\TestOM\Model\ManagerInterfaceFactory $managerFactory,
        string $name,
        int $number,
        array $arrayList
    ) {
        $this->manager = $manager;
        $this->managerFactory = $managerFactory;
        $this->arrayList = $arrayList;
        $this->name = $name;
        $this->number = $number;
    }

    public function log()
    {
        echo get_class($this->manager);
        echo "<br/>\n";
        print_r($this->arrayList);
        echo "<br/>\n";
        echo $this->name;
        echo "<br/>\n";
        echo $this->number;
        echo "<br/>\n";
        $newmanager = $this->managerFactory->create();
        echo print_r(get_class($newmanager));
        echo "<br/>\n";
    }
}
