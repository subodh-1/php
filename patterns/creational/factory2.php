<?php 
    /*
    Factory Pattern
    Problem: Create objects without specifying the exact class to instantiate.
    When to Use: When the exact type of the object isn't known until runtime.
    Example: Shape or product creation.
    */

    interface Product{
        public function getName();
    }

    class ConcreteProductA implements Product{
        public function getName(){
            return 'This is Product A';
        }
    }

    class ConcreteProductB implements Product{
        public function getName(){
            return 'This is Product B';
        }
    }

    class ProductFactory{
        public static function createProduct($type){
            if ($type == 'A') {
                return new ConcreteProductA();
            }
            if ($type == 'B') {
                return new ConcreteProductB();
            }
            throw new Exception("Invalid product type.");
        }
    }

    $prod1 = ProductFactory::createProduct('A');
    echo $prod1->getName();
    echo PHP_EOL;
    $prod2 = ProductFactory::createProduct('B');
    echo $prod2->getName();
   