<?php


/**
 * 
 * Command Pattern:
 * The Command Pattern is a behavioral design pattern that turns a request into a stand-alone object that contains all information about the request. This conversion allows you to parameterize methods with different requests, delay or queue a request's execution, and support undoable operations.
 *  * 
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
* Real World Scenario:
* Consider a Order preperation by waiter in a hotel* 
*/

// Command Interface
interface Order {
    public function execute() : void;
}
// Concreate Command (for example not following Single Responsibility Principle)
class PreparePizza implements Order {
    private $receiver;
    private $command;
    public function __construct(Pizza $receiver) {
        $this->receiver = $receiver;
    }
    public function set_command($command) {
        $this->command = $command;
    }
    public function execute() : void {
        if ($this->command == 'paperonny') {
            $this->receiver->paperonny_pizza();
        } elseif ($this->command == 'barbeque') {
            $this->receiver->bbq_pizza();
        }elseif ($this->command == 'italian') {
            $this->receiver->italian_pizza();
        } else {
            echo "invalid command";
        }
        
    }
}
// One more concreate command for Pasta
class PreparePasta implements Order {
    private $receiver;
    private $command;
    public function __construct(Pasta $receiver) {
        $this->receiver = $receiver;
    }
    public function set_command($command) {
        $this->command = $command;
    }
    public function execute() : void {
        if ($this->command == 'macarony') {
            $this->receiver->prepare_macarony();
        } elseif ($this->command == 'sphagety') {
            $this->receiver->prepare_sphagety();
        } else {
            echo "Invalid Order..". PHP_EOL;
        }       
        
    }
}

// Receiver
class Pizza {
    public function paperonny_pizza() {
        echo "Preparing paperonny pizza..".PHP_EOL;
    }
    public function bbq_pizza() {
        echo "Preparing barbeque pizza..".PHP_EOL;
    }
    public function italian_pizza() {
        echo "Preparing Italian pizza..".PHP_EOL;
    }
}

class Pasta {
    public function prepare_macarony(){
        echo "Preparing macarony Pasta ...". PHP_EOL;
    }
    public function prepare_sphagety() {
        echo "Preparing Sphagety pasta..".PHP_EOL;
    }
}
// Invoker
class waiter {
    private $order;    
    public function set_order(Order $order){
        $this->order = $order;
    }
    public function place_order() {
        $this->order->execute();
    }
}
// Context

$waiter = new waiter();
//order for Pizza
$pizza = new Pizza();
$pizzaorder = new PreparePizza($pizza);
$pizzaorder->set_command('barbeque');
$waiter->set_order($pizzaorder);
$waiter->place_order();

//Order Pasta
$pasta = new Pasta();
$pastaorder = new PreparePasta($pasta);
$pastaorder->set_command('macarony');
$waiter->set_order($pastaorder);
$waiter->place_order();


