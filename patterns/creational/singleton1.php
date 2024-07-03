<?php 
/*
Singleton Pattern::

Problem: 
    Ensure a class has only one instance and provide a global point of access to it.
When to Use: 
    When you need exactly one instance of a class to coordinate actions across the system.
Example:   
    Logger, Configuration manager.
*/

class Singleton {
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}


