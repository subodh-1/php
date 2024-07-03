<?php 
/**
 * Builder Pattern in Simple Language
 * The Builder Pattern is a design pattern used to construct complex objects step by step. This pattern is helpful when an object requires several steps to be created, and you want to control the construction process.

 * Explanation
 * Problem: You have a complex object that needs to be created in multiple steps.
 * When to Use: Use the Builder Pattern when the object creation process is complicated and involves several steps.
 * Example: Constructing a complex text document or building a house.
 * Example: Building a House
 * Let's use the example of building a house. A house can have different parts like a foundation, walls, roof, and interior. Each of these parts can be built step by step.
 * 
 * Builder Pattern
 *  Problem: Construct a complex object step by step.
 *  When to Use: When creating a complex object that requires multiple steps.
 *  Example: Building a computer.
 * 
 * 
 */

 class Computer {
    public $parts = array();

    public function add($part){
        $this->parts[] = $part;
    }
 }

 class ComputerBuilder {
    
 }