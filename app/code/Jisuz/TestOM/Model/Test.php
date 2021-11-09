<?php

namespace Jisuz\TestOM\Model;

class Test
{
    private $manager;
    private $arrayList;
    private $name;
    private $number;

    public function __construct(
        \Jisuz\TestOM\Model\Manager $manager,
        string $name,
        int $number,
        array $arrayList
    ) {
        $this->manager = $manager;
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
    }
}
