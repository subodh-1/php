<?php 
// Facade Pattern:
// The Facade pattern is a structural design pattern that provides a simplified interface to a complex subsystem. It acts as a wrapper around a group of classes, providing a high-level API that makes the subsystem easier to use.// Real-World Use Case: Simplifying API Usage
// Scenario: A library with a complex API (e.g., a multimedia processing library) provides a simplified interface for common tasks like converting video formats or extracting audio. The Facade pattern offers an easy-to-use interface that simplifies client interaction with the complex system.
// Example: A home automation system that provides a simple interface for controlling lights, thermostat, and security.
/* 
Scenario:
Imagine you have a smart home with various devices like lights, thermostat, and security system. Each device has its own complex API for controlling it. To make it easier for users to control their smart home, you can use the Facade pattern to provide a simple interface for common tasks.

Components Involved:
Subsystem Classes: Classes representing different devices like Lights, Thermostat, and SecuritySystem, each with their own complex interfaces.
Facade Class: A class that provides a simple interface to interact with the complex subsystems. 
*/

class LightSystem {
    public function switch_on() {
        echo "Light switched on!!";
    } 
    public function swith_off(){
        echo "Light switched off!!";
    }
    public function dim() {
        echo "Light system dimmed!!";
    }
}

class Thermostat {
    public function set_temperature() {
        echo "Temperature set to steady!!";
    }
}
class SecuritySystem {
    public function arm(){
        echo "Security system armed!!";
    }
    public function disarm(){
        echo "Security system disarmed!!";
    }
    public function activate() {
        echo "Security system activated";
    }
}

class HomeSystemFacade {
    private $light_system;
    private $thermostat;
    private $security_system;

    public function __construct(){
        $this->light_system = new LightSystem();
        $this->thermostat = new Thermostat();
        $this->security_system = new SecuritySystem();
    }
    public function leave_home() {
        $this->light_system->swith_off();
        $this->thermostat->set_temperature();
        $this->security_system->arm();
        $this->security_system->activate();
    }

    public function arrive_home() {
        $this->light_system->switch_on();
        $this->thermostat->set_temperature();
        $this->security_system->disarm();
    }
    public function night_mode() {
        $this->light_system->dim();
        $this->thermostat->set_temperature();
        $this->security_system->activate();
    }


}

// Client code

//Initiated Facade system
$homefacade = new HomeSystemFacade();
// While leaving home
$homefacade->leave_home();
echo PHP_EOL;
//When arrived at home
$homefacade->arrive_home();
echo PHP_EOL;
//When night mode acticated
$homefacade->night_mode();
