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
interface Button {
    public function paint();
}

class WinButton implements Button {
    public function paint(){
        return "I am Windows button";
    }
}

class MacButton implements Button {
    public function paint() {
        return "I am Mac button";
    }
}

interface GUIFactory {
    public function createButton();
}

class WinFactory implements GUIFactory {
    public function createButton(){
        return new WinButton();
    }
}

class MacFactory implements GUIFactory {
    public function createButton() {
        return new MacButton();
    }
}

$factory = new WinFactory();
$button = $factory->createButton();
echo $button->paint();