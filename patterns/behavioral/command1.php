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
 * Command interface
* * Concrete Command
* * Receiver
* * Invoker
* * Client
* 
*/

//Command Interface
interface Command {
    public function execute() : void;
}

//Concrete Command
class LightOffCommand implements Command {
    private $receiver;
    public function __construct($light) {
        $this->receiver = $light;
    }
    public function execute(): void{
        $this->receiver->light_off();
    }
}

class LightOnCommand implements Command {
    private $receiver;
    public function __construct($light) {
        $this->receiver = $light;
    }

    public function execute(): void{
        $this->receiver->light_on();
    }
}

class ThermostatSetTemperatureCommand implements Command {
    private $receiver;
    public function __construct($thermostat) {
        $this->receiver = $thermostat;
    }
    public function execute(): void{
        $this->receiver->set_temperature();
    }
}

//Receivers
class Light {
    public function light_off() {
        echo "Switching off the lights..".PHP_EOL;
    }

    public function light_on() {
        echo "Switching on the lights..". PHP_EOL;
    }
}

class Thermostat {
    private $temperature;
    public function __construct($temperature) {
        $this->temperature = $temperature;
    }
    public function set_temperature() {
        echo "Set temperature to {$this->temperature} Degrees";
    }
}

// Invoker
class RemoteControl {
    private $concrete;

    public function set_command(Command $concrete) {
        $this->concrete = $concrete;
    }
    public function press_button() {
        $this->concrete->execute();
    }
}
// Context
$remote = new RemoteControl();

//Light Receiver
$light = new Light();
//light on command
$concreteLightOn = new LightOnCommand($light);
//set invoker
$remote->set_command($concreteLightOn);
$remote->press_button(); 

//light off command
$concreteLightOff = new LightOffCommand($light);
$remote->set_command($concreteLightOff);
$remote->press_button();

// Thermostat Receiver
$thermostat = new Thermostat(18);
$concreteSetTemp = new ThermostatSetTemperatureCommand($thermostat);
$remote->set_command($concreteSetTemp);
$remote->press_button();





