<?php
/**
 * * Adapter Pattern
 * Problem: Allow incompatible interfaces to work together.
 * When to Use: When you need to integrate a new component into an existing system that doesn't have a compatible interface.
 * Example: Adapting a new payment gateway to an existing e-commerce system.
 * Scenario
 * We have an application that needs to log messages. 
 * The application expects all logging systems to implement a common interface, but we have different logging systems (e.g., FileLogger and DatabaseLogger) with their own unique methods. 
 * We'll use the Adapter Pattern to make them compatible with our application's logging interface.
 */

 interface Logger {
    public function log($message);
 }

 class FileLogger {
    private $message;
    public function log_message($message){
        echo "File Message logged: ". $message .PHP_EOL;
    }
 }

 class DatabaseLogger {
    private $message;
    public function log_message($message) {
        echo "Database message logged: ". $message .PHP_EOL;
    }
 }

 class FileLogAdapter implements Logger {
    private $file_logger;
    public function __construct(FileLogger $fileLogger) {
        $this->file_logger = $fileLogger;
    }
    public function log($message) {
        $this->file_logger->log_message($message);
    }
 }

 class DatabaseLogAdapter implements Logger{
    private $db_logger;
    public function __construct(DatabaseLogger $db_logger){
        $this->db_logger = $db_logger;
    } 
    public function log($message){
        $this->db_logger->log_message($message);
    }
 }

 $file = new FileLogger();
 $fileAdopter = new FileLogAdapter($file);
 $fileAdopter->log('Error in opening file.');

 $dblog = new DatabaseLogger();
 $dbAdopter = new DatabaseLogAdapter( $dblog);
 $dbAdopter->log('Error in Databse connection.');
