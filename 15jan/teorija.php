<?php

class Person
{

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (strlen($name) > 3) return;

        $this->name = $name;
    }
}

class All_Figures {

}

$person = new Person("Jānis");
$person->setName("Yo");
echo $person->getName();


/* Class var izveidot sub-class rakstot:
Class Parent {
    ...;
}
class Child extends Parent {
    ...;
}
*/
// Tā var katrā sub-class ievietot vienu un to pašu get/set metodi ar attiecīgās metodes saturu

