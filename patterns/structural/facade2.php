<?php
// Facade Pattern:
// The Facade pattern is a structural design pattern that provides a simplified interface to a complex subsystem. It acts as a wrapper around a group of classes, providing a high-level API that makes the subsystem easier to use.// Real-World Use Case: Simplifying API Usage
// Scenario: A library with a complex API (e.g., a multimedia processing library) provides a simplified interface for common tasks like converting video formats or extracting audio. The Facade pattern offers an easy-to-use interface that simplifies client interaction with the complex system.
// Example: A home automation system that provides a simple interface for controlling lights, thermostat, and security.
/* 

// Exmple skeleton for Facade
*/

class SystemA {
    public function operationA1(){
        echo "This is operation 1";
    }
    public function operationA2(){
        echo "This is operation 2";
    }
}

class SystemB {
    public function operationB1() {
        echo "This is operation 1 - B";
    }
    public function operationB2() {
        echo "This is operation 2 - B";
    }
}

class SystemFacade {
    private $systemA;
    private $systemB;

    public function __construct(){
        $this->systemA = new SystemA();
        $this->systemB = new SystemB();
    }

    public function perform_operation_one() {
        $this->systemA->operationA1();
        $this->systemB->operationB1();
    }
    public function perform_operation_two() {
        $this->systemA->operationA2();
        $this->systemB->operationB2();
    }
}

// Client use
$system = new SystemFacade();
$system->perform_operation_one();
$system->perform_operation_two();