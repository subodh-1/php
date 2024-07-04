<?php 
/**
 * Prototype Pattern:
 * Creates new objects by copying an existing object, known as the prototype.
 * Prototype Pattern
 * Problem: Create new objects by copying an existing object.
 * When to Use: When the cost of creating an object is expensive or complex.
 * Example: Cloning objects like user sessions or system resources.
 * 
 * Real-Life Example: Cloning a User Profile
    * Let's consider a real-life scenario where we manage user profiles in a web application. 
    * Creating a new user profile with default settings and configurations might be complex and time-consuming. 
    * Instead, we can create a prototype user profile and clone it whenever we need a new profile.
*/

class Prototype {
    private $name;   

    public function __construct($name) {
        $this->name = $name;
    }
    public function __clone(){
        $this->name = 'Cloned';
    }
    public function get_name() {
        echo $this->name;       
    }    

 }

 $proto = new Prototype('Original');
 $proto->get_name();
 $clone = clone $proto;
 $clone->get_name();
