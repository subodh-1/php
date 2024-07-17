<?php
/**
* Strategy Pattern:
* The Strategy Pattern is a behavioral design pattern that allows an object to change its behavior when its 
* internal state changes. It is particularly useful when an object's behavior depends on its state, 
* and the state can change during the object's lifecycle. 

* What problem does it solves:
* The Strategy Pattern solves the problem of having multiple algorithms or behaviors that need to be used 
* interchangeably within a single class or object. It allows you to encapsulate each algorithm into a 
* separate class, making them interchangeable and independent of the client that uses them.
* 
* Real-World Use Case: Payment Processing
* Imagine a courier company that uses different transportation methods (bike, van, truck) based on the number 
* of parcels to be delivered. Each transportation method has its own cost and path to be used.
* 
* => Create Strategy
* => Create Concrete Strategy
* => Create Context
*/

// create Strategy
interface TransportStrategy {
    public function transport(array $data) : void;
}

// Create Concrete Strategy
class BikeTransport implements TransportStrategy {
    private $data;
    public function __construct(){
        echo "Initiate Bike transport...".PHP_EOL;
    }    

    public function transport(array $data): void {
        $this->data = $data;
        echo PHP_EOL."Transporting... ".PHP_EOL;
        echo "<pre>"; 
        print_r($data);
        echo "</pre>";
    }
}

class TruckTransport implements TransportStrategy {
    private $docket;
    public function __construct() {
        echo PHP_EOL."Initiating Truck transport".PHP_EOL;
    }    
    public function transport(array $docket) : void {
        $this->docket = $docket;
        echo "Transporting...".PHP_EOL;
        echo "<pre>"; 
        print_r($this->docket);
        echo "</pre>";
    }
}

class AirTransport implements TransportStrategy {
    private $docket;
    public function __construct() {
        echo PHP_EOL."Initiating Air transport".PHP_EOL;
    }    
    public function transport(array $docket) : void {
        $this->docket = $docket;
        echo PHP_EOL."Transporting...".PHP_EOL;
        echo "<pre>"; 
        print_r($this->docket);
        echo "</pre>";
    }
}

// Client implementation
$bike = new BikeTransport();
$bike_item = array('item_no'=>12313, 'address'=>'Fashion Street, Pune, India');
$bike->transport($bike_item);

$truck = new TruckTransport();
$truck_item = array('item_no'=>456789, 'address'=>'Fashion Street, Hyderabad, India');
$truck->transport($truck_item);

$air = new AirTransport();
$air_item = array('item_no'=>789445, 'address'=>'Fashion Street, New Yourk, USA');
$air->transport($air_item);


