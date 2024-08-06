<?php
/**State Pattern:
* The State Pattern is a behavioral design pattern that allows an object to change its behavior when its internal state changes. It achieves this by encapsulating state-specific behavior into separate state classes and delegating the state transitions to these classes.

* The State Pattern allows us to encapsulate each of these behaviors into separate classes and switch between them dynamically based on the current state of the traffic light.
** State Interface
** Concrete State
** Context
** Client code

* Real-World Example: 
* Vending Machine
* Imagine a traffic light system at an intersection. The traffic light can be in one of three states: Green, Yellow, or Red. The behavior of the traffic light changes depending on its current state:

*/
// State Interface
interface VendingMachineState {
    public function insertMoney(VendingMachine $vendingMachine);
    public function selectProduct(VendingMachine $vendingMachine, $product);
    public function dispenseProduct(VendingMachine $vendingMachine);
}

// Concrete State: Idle
class IdleState implements VendingMachineState {
    public function insertMoney(VendingMachine $vendingMachine) {
        echo "Money inserted. Transitioning to Payment Accepted state.\n";
        $vendingMachine->setState(new PaymentAcceptedState());
    }

    public function selectProduct(VendingMachine $vendingMachine, $product) {
        echo "Please insert money first.\n";
    }

    public function dispenseProduct(VendingMachine $vendingMachine) {
        echo "No product selected.\n";
    }
}

// Concrete State: Payment Accepted
class PaymentAcceptedState implements VendingMachineState {
    public function insertMoney(VendingMachine $vendingMachine) {
        echo "Already have money. Please select a product.\n";
    }

    public function selectProduct(VendingMachine $vendingMachine, $product) {
        echo "Product '$product' selected. Transitioning to Dispensing Product state.\n";
        $vendingMachine->setState(new DispensingProductState());
    }

    public function dispenseProduct(VendingMachine $vendingMachine) {
        echo "Please select a product first.\n";
    }
}

// Concrete State: Dispensing Product
class DispensingProductState implements VendingMachineState {
    public function insertMoney(VendingMachine $vendingMachine) {
        echo "Please wait while we dispense your product.\n";
    }

    public function selectProduct(VendingMachine $vendingMachine, $product) {
        echo "Already dispensing a product. Please wait.\n";
    }

    public function dispenseProduct(VendingMachine $vendingMachine) {
        echo "Dispensing the product. Transitioning to Idle state.\n";
        $vendingMachine->setState(new IdleState());
    }
}

/// Context Class
class VendingMachine {
    private $state;

    public function __construct() {
        $this->state = new IdleState(); // Initial state
    }

    public function setState(VendingMachineState $state) {
        $this->state = $state;
    }

    public function insertMoney() {
        $this->state->insertMoney($this);
    }

    public function selectProduct($product) {
        $this->state->selectProduct($this, $product);
    }

    public function dispenseProduct() {
        $this->state->dispenseProduct($this);
    }
}

// Client Code
$vendingMachine = new VendingMachine();

$vendingMachine->insertMoney(); // Insert money
$vendingMachine->selectProduct("Soda"); // Select product
$vendingMachine->dispenseProduct(); // Dispense product