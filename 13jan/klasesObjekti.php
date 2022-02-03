<?php

//no klases tiek veidots objekts
//klasēm ir metodes=funkcijas| parametri/mainīgie/atribūti
//php pamatuzbūves principi: OOP = Encapsulation, Inheritance, Polymorphism
 class Person {
     public string $name; //šis strādā tikai šajā ...
     public function __construct(string $name) //ar __ raksta publiskas funkcijas
     {
         $this -> name = $name;//asociējās uz visu objekta kontekstu /$name
     }

     public function sayHello(): string  {
         return $this -> name . 'is saying Hello.';
     }
 }
  //ar šo pietiek lai nodefinētu klasi
 $x = new Person("Jānis");
 $y = new Person("Dace");
 $z = new Person("Grieta");
 //šie abi ir objekti, kuri ir izveidoti no tās kalses

echo $x->sayHello() .PHP_EOL;
echo $y->sayHello() . PHP_EOL;
echo $z->sayHello() .PHP_EOL;
