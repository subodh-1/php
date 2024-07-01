<?php 
/*
Singleton Pattern::

Problem: Ensure a class has only one instance and provide a global point of access to it.
When to Use: When you need exactly one instance of a class to coordinate actions across the system.
Example: Logger, Configuration manager.
*/

class Singleton {
    private static $instance = null;
    
    private function __construct() {
        // Private constructor prevents instantiation from other classes.
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function showMessage($msg) {
        echo "Hello, I am a Singleton!". $msg;
    }
}

// Usage
$instance = Singleton::getInstance();
$instance->showMessage("Subodh");


