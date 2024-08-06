<?php

// Template Method Pattern:
// The Template Method Pattern is a behavioral design pattern that defines the skeleton of an algorithm in a method, deferring some steps to subclasses. It allows subclasses to redefine certain steps of an algorithm without changing its structure.

// More Simplified Definition:
// The Template Method Pattern is like a recipe that provides a step-by-step guide on how to do something, but it allows you to fill in some specific details yourself.

// Real-World Example: Cooking a Dish
// Think about cooking. No matter what dish you are making, you generally follow these steps:

// Gather Ingredients
// Prepare Ingredients
// Cook Ingredients
// Serve the Dish
// Now, let’s see how this applies to two specific dishes: Pasta and Salad.

// Cooking Template
// Gather Ingredients: This is a common step for both dishes.
// Prepare Ingredients: How you prepare the ingredients might be different.
// Cook Ingredients: For some dishes, you might need to cook, but for others, you might not.
// Serve the Dish: This step is also common.

//Abstract Class with Template Method
abstract class Dish {
    // Template method
    public function makeDish() {
        $this->gatherIngredients();
        $this->prepareIngredients();
        $this->cookIngredients();
        $this->serve();
    }

    // Common steps
    private function gatherIngredients() {
        echo "Gathering ingredients\n";
    }

    private function serve() {
        echo "Serving the dish\n";
    }

    // Steps to be implemented by subclasses
    abstract protected function prepareIngredients();
    abstract protected function cookIngredients();
}

// Concrete Class for Pasta
class Pasta extends Dish {
    protected function prepareIngredients() {
        echo "Preparing pasta and sauce ingredients\n";
    }

    protected function cookIngredients() {
        echo "Cooking pasta and heating sauce\n";
    }
}
// Concreate Class for Salad
class Salad extends Dish {
    protected function prepareIngredients() {
        echo "Chopping vegetables and preparing dressing\n";
    }

    protected function cookIngredients() {
        // Salad doesn't need cooking
        echo "No cooking needed for salad\n";
    }
}

// Client Code
// Client code
function prepareDish(Dish $dish) {
    $dish->makeDish();
}

echo "Making Pasta:\n";
$pasta = new Pasta();
prepareDish($pasta);

echo "\nMaking Salad:\n";
$salad = new Salad();
prepareDish($salad);


