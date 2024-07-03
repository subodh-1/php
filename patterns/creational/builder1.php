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
 *  Example: Constructing complex text documents or databases.
 * 
 * 
 */

 class Product {
    public $phase = array();
    public function add($phase) {
        $this->phase[] = $phase;
    }

    public function show(){
        //echo "<pre>"; print_r($this->phase);
        echo "Current product phase". implode(', ', $this->phase);
    }
 }

 class Build {
    public $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function build_phase_A(){
        $this->product->add('Phase A');
    }

    public function build_phase_B() {
        $this->product->add('Phase B');
    }
    public function show_phases() {
        $this->product->show();
    }
 }

 $phase = new Build();
 $phase->build_phase_A();
 $phase->build_phase_B();
 $phase->show_phases();