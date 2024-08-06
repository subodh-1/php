<?php
/**State Pattern:
* The State Pattern is a behavioral design pattern that allows an object to change its behavior when its internal state changes. It achieves this by encapsulating state-specific behavior into separate state classes and delegating the state transitions to these classes.

* Real-World Example: 
* Traffic Light System
* Imagine a traffic light system at an intersection. The traffic light can be in one of three states: Green, Yellow, or Red. The behavior of the traffic light changes depending on its current state:

* The State Pattern allows us to encapsulate each of these behaviors into separate classes and switch between them dynamically based on the current state of the traffic light.
** State Interface
** Concrete State
** Context
** Client code
*/
interface TrafficLightState {
    public function handle();
}

// Concrete state for Green
class GreenLight implements TrafficLightState {
    public function handle() {
        echo "Green light: Cars can go.\n";
    }
}

// Concrete state for Yellow
class YellowLight implements TrafficLightState {
    public function handle() {
        echo "Yellow light: Cars should prepare to stop.\n";
    }
}

// Concrete state for Red
class RedLight implements TrafficLightState {
    public function handle() {
        echo "Red light: Cars must stop.\n";
    }
}
// Context class
class TrafficLight {
    private $state;

    public function __construct(TrafficLightState $state) {
        $this->setState($state);
    }

    public function setState(TrafficLightState $state) {
        $this->state = $state;
    }

    public function changeState(TrafficLightState $state) {
        $this->setState($state);
        $this->state->handle();
    }

    public function showLight() {
        $this->state->handle();
    }
}

// Client code
$greenLight = new GreenLight();
$yellowLight = new YellowLight();
$redLight = new RedLight();

$trafficLight = new TrafficLight($greenLight);

echo "Initial state:\n";
$trafficLight->showLight();

echo "\nChanging to yellow:\n";
$trafficLight->changeState($yellowLight);

echo "\nChanging to red:\n";
$trafficLight->changeState($redLight);

echo "\nChanging back to green:\n";
$trafficLight->changeState($greenLight);
