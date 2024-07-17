<?php

/**
 * 
 * Command Pattern:
 * The Command Pattern is a behavioral design pattern that turns a request into a stand-alone object that contains all information about the request. This conversion allows you to parameterize methods with different requests, delay or queue a request's execution, and support undoable operations.
 * 
 * Real-World Example: Smart Home System
 * Imagine you have a smart home system that can control various devices like lights, thermostats, and door locks. You want to be able to issue commands to these devices, such as turning the lights on or off, setting the thermostat temperature, and locking or unlocking the doors.
 * 
 * Components Involved
 * Command Interface: Declares an interface for executing an operation.
 * Concrete Commands: Implement the command interface to perform specific actions.
 * Invoker: Asks the command to carry out the request.
 * Receiver: Knows how to perform the operations associated with carrying out a request. Any class can act as a receiver.
 * Client: Creates a concrete command object and sets its receiver.
*/

//Command Interface
interface Command {
    public function execute() : void;
}

