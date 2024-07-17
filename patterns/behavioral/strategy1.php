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
* Scenario: An e-commerce platform supports multiple payment methods like credit cards, PayPal, and cryptocurrency. The Strategy pattern allows the payment processing algorithm to be selected at runtime based on the user's choice.
* Example: Sorting algorithms that can be changed at runtime depending on the data size and type.
* 
* => Create Strategy
* => Create Concrete Strategy
* => Create Context
*/

// Create Strategy
interface PaymentStrategy {
    public function pay($amount) : void;
    public function set_currency($currency) : void;
}

// Create Concrete Strategy

class CreditCardPayment implements PaymentStrategy {
    private $card_number;
    private $card_holder_name;
    private $cvv;
    private $currency;

    public function __construct(){
        echo "Initiated Credit card payment...".PHP_EOL;
    }
    public function set_parameters($cardnumber, $cardholdername, $cvv) {
        $this->card_number = $cardnumber;
        $this->card_holder_name = $cardholdername;
        $this->cvv = $cvv;
    }
    public function set_currency($currency) : void {
        $this->currency = $currency;
    }
    public function pay($amount) : void {
        echo "Pay amount {$amount} {$this->currency} using credit card.". PHP_EOL;
    }
}

class PaypalPayment implements PaymentStrategy {
    private $currency;
    private $email;
    private $password;
    public function __construct() {
        echo "Initiating Paypal Payment ....".PHP_EOL;
    }
    public function set_parameters($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }
    public function set_currency($currency) : void {
        $this->currency = $currency;
    }
    public function pay($amount) : void {
        echo "Pay amount {$amount} {$this->currency} using Paypal payment". PHP_EOL;
    }
}

class CryptoPayment implements PaymentStrategy {
    private $currency;
    private $wallet;
    public function __construct() {
        echo "Initiating Crypto Payment...". PHP_EOL;
    }

    public function set_parameters($wallet) {
        $this->wallet = $wallet;
    }
    public function set_currency($currency) : void{
        $this->currency = $currency;
    }
    public function pay($amount): void {
        echo "Pay amount {$amount} {$this->currency} using Crypto Payment".PHP_EOL;
    }
}

// Create context
class Order {
    private $currency;
    private $payment_strategy;
    public function __construct($currency) {
        $this->currency = $currency;
    }
    public function set_strategy(PaymentStrategy $paymentStrategy) {
        $this->payment_strategy = $paymentStrategy;
    }

    public function process_payment($amount) {
        $this->payment_strategy->set_currency($this->currency);
        $this->payment_strategy->pay($amount);
    }
}

//Client implementation
$order = new Order('₹');

//First Payment strategy
$credit = new CreditCardPayment();
$credit->set_parameters('123-456-7891', 'Subodh Choure', '1234');
$order->set_strategy($credit);
$order->process_payment(5000);

//Sedond Payment strategy
$order = new Order('€');
$paypal = new PaypalPayment();
$paypal->set_parameters('choure.subodh@gmail.com', 'xxx78797xxx');
$order->set_strategy($paypal);
$order->process_payment(5000);

//Sedond Payment strategy
$order = new Order('₿');
$crypto = new CryptoPayment();
$crypto->set_parameters('455645654446545664464644646');
$order->set_strategy($crypto);
$order->process_payment(5000);



