<?php
// Template Method Pattern:
// The Template Method Pattern is a behavioral design pattern that defines the skeleton of an algorithm in a method, deferring some steps to subclasses. It allows subclasses to redefine certain steps of an algorithm without changing its structure.

// More Simplified Definition:
// The Template Method Pattern is like a recipe that provides a step-by-step guide on how to do something, but it allows you to fill in some specific details yourself.

// Real-World Example: Preparing Different Types of Coffee
// Imagine you run a coffee shop and need to prepare different types of coffee (like Americano and Latte). The steps to make coffee generally involve:

// Boiling water
// Brewing the coffee
// Pouring the coffee into a cup
// Adding extras (like milk, sugar, etc.)
// While the steps to make coffee are the same, the details of brewing and adding extras vary depending on the type of coffee. The Template Method Pattern can help encapsulate the common steps in a template method and let subclasses handle the specific details.

abstract class CoffeeMaker {
    // Template method
    public function makeCoffee() {
        $this->boilWater();
        $this->brewCoffee();
        $this->pourInCup();
        $this->addExtras();
    }

    // Common steps
    private function boilWater() {
        echo "Boiling water\n";
    }

    private function pourInCup() {
        echo "Pouring coffee into cup\n";
    }

    // Steps to be implemented by subclasses
    abstract protected function brewCoffee();
    abstract protected function addExtras();
}

class AmericanoMaker extends CoffeeMaker {
    protected function brewCoffee() {
        echo "Brewing Americano coffee\n";
    }

    protected function addExtras() {
        echo "Adding nothing\n";
    }
}

class LatteMaker extends CoffeeMaker {
    protected function brewCoffee() {
        echo "Brewing Latte coffee\n";
    }

    protected function addExtras() {
        echo "Adding steamed milk\n";
    }
}

// Client Code
// Client code
function prepareCoffee(CoffeeMaker $coffeeMaker) {
    $coffeeMaker->makeCoffee();
}

echo "Preparing Americano:\n";
$americanoMaker = new AmericanoMaker();
prepareCoffee($americanoMaker);

echo "\nPreparing Latte:\n";
$latteMaker = new LatteMaker();
prepareCoffee($latteMaker);







