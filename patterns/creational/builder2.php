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
    public function show_status() {
        echo "Computer build status: ". implode(',', $this->parts);
    }
 }

 class ComputerBuilder {
    private $computer;
    public function __construct(){
        $this->computer = new Computer();
    }
    public function cpu_build(){
        $this->computer->add('CPU');
    }
    public function motherboard_build(){
        $this->computer->add('MOTHERBOARD');
    }
    public function monitor_build(){
        $this->computer->add('MONITOR');
    }
    public function networking_build(){
        $this->computer->add('NETWORK');
    }
    public function show_progress(){
        $this->computer->show_status();
    }
 }

 $computer = new ComputerBuilder();
 $computer->cpu_build();
 $computer->monitor_build();
 $computer->motherboard_build();
 $computer->networking_build();
 $computer->show_progress();
 