<?php 
/**
 * Adapter Pattern
 * Problem: Allow incompatible interfaces to work together.
 * When to Use: When you need to integrate a new component into an existing system that doesn't have a compatible interface.
 * Example: Adapting a new payment gateway to an existing e-commerce system.
 * 
 * Scenario
 * Suppose we have a payment processing system that uses a PaymentProcessor interface. 
 * We want to integrate a new payment gateway, but its API does not match our existing PaymentProcessor interface. 
 * We can use an Adapter to make it compatible.
 */

 interface PaymentProcessor {
    public function pay($amount);
 }
 class PaypalGateway {
    public function make_payment($amount) {
        echo "Make payment of amount {$amount} using Paypal.";
    }
 }

 class BraintreeGateway {
    public function make_payment($amount) {
        echo "Make payment of amount {$amount} using Braintree";
    }
 }

 class PaypalGatewayAdapter implements PaymentProcessor{
    private $payment_gateway;
    public function __construct(PaypalGateway $new_payment_gateway) {
        $this->payment_gateway = $new_payment_gateway;
    }

    public function pay($amount) {
        return $this->payment_gateway->make_payment($amount);
    }
 }

class BraintreeAdapter implements PaymentProcessor {
    private $payment_gateway;
    public function __construct(BraintreeGateway $new_payment_gateway) {
        $this->payment_gateway = $new_payment_gateway;
    }

    public function pay($amount) {
        $this->payment_gateway->make_payment($amount);
    }
}

$paypal = new PaypalGateway();
$adapter1 = new PaypalGatewayAdapter($paypal);
$adapter1->pay(40);

$braintree = new BraintreeGateway();
$adapter2 = new BraintreeAdapter($braintree);
$adapter2->pay(60);

