<?php
/*
Abstract Factory Pattern
Problem: Provide an interface for creating families of related or dependent objects without specifying their concrete classes.
When to Use: When you need to create a variety of related objects.
Example1: UI toolkit for different platforms.

Abstract Factory Pattern. It provides an interface to create a family of related objects without specifying their exact classes. This pattern is useful when you want to ensure that the related objects are used together and can be easily swapped for different variants.

Explanation:
Abstract Factory Pattern: A way to create groups (families) of related objects without specifying their exact types.
Why Use It?: To ensure that a set of related objects are used together and to make it easy to switch between different sets of related objects.
Example2:
Imagine you are making a program for a furniture shop. The shop sells different styles of furniture like Victorian and Modern. Each style includes related objects like chairs and sofas.

*/

interface Sofa {
    public function lie_on();
}
interface Chair {
    public function sit_on();
}

class ValerianSofa implements Sofa {
    public function lie_on(){
        return "Lie on Valerian Sofa";
    }
}
class ValerianChair implements Chair {
    public function sit_on() {
        return "Sit on Valerian Chair";
    }
}

class ModernSofa implements Sofa{
    public function lie_on() {
        return "Lie on Modern Sofa";
    }
}
class ModernChair implements Chair {
    public function sit_on() {
        return "Sit on Modern Chair";
    }
}

interface FurnitureFactory {
    public function create_sofa();
    public function create_chair();
}

class ValerianFurnitureFactory implements FurnitureFactory {
    public function create_sofa() {
        return new ValerianSofa();
    }
    public function create_chair() {
        return new ValerianChair();
    }
}

class ModernFurnitureFactory implements FurnitureFactory {
    public function create_sofa() {
        return new ModernSofa();
    }
    public function create_chair() {
        return new ModernChair();
    }
}

class FurnitureShop {
    public $factory;
    public function __construct(FurnitureFactory $furniture) {
        $this->factory = $furniture;
    }

    public function create_furniture() {
        $sofa = $this->factory->create_sofa();
        $chair = $this->factory->create_chair();
        echo $sofa->lie_on();
        echo PHP_EOL;
        echo $chair->sit_on();
    }
}

$valefurniture = new FurnitureShop(new ValerianFurnitureFactory());
$valefurniture->create_furniture();
echo PHP_EOL;
$modfurniture = new FurnitureShop(new ModernFurnitureFactory());
$modfurniture->create_furniture();