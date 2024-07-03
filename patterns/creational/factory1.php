<?php 
/**
 *  Factory Pattern::
* The Factory Pattern is a design pattern used in programming to create objects without specifying the exact class of the object that will be created. Instead, it defines an interface or abstract class for creating an object, but the actual decision of which class to instantiate is deferred to the subclasses.

* Here's a simple explanation with an example:

* Explanation:
* Factory Pattern: A way to create objects where the exact type of object is determined by subclasses, not the main code.
*  Why Use It?: To make your code more flexible and easier to manage, especially when adding new types of objects.
* Real-World Use Case: Vehicle Manufacturing
* Scenario: A car manufacturing plant needs to produce different types of vehicles like cars, trucks, and motorcycles. The Factory pattern can be used to instantiate different vehicle types based on input parameters, allowing the system to create objects without specifying the exact class.
* Example: An application that needs to generate various types of documents (PDF, Word, Excel) can use a factory to create the appropriate document type.
*/

interface Product {
    public function getName();
}

class ConcreateProduct implements Product {
    public function getName(){
        return 'Concrete Product';
    }
}

class ProductFactory {
    public static function createProduct(){
        return new ConcreateProduct();
    }
}