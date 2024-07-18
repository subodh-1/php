<?php
/**
 * Behavioral Patterns:
 * Behavioral Patterns are a set of design patterns in software development that focus on the communication and interaction between objects. 
 * These patterns help to improve the flexibility, modularity, and maintainability of your code. 
 * 
 * Observer Pattern:
 * Observer Pattern
 *   The Observer Pattern is a behavioral pattern that allows objects to be notified when the state of 
 *  another object changes. In this pattern, there is a subject (also known as the observable) and one or more observers. The subject maintains a list of its observers and notifies them whenever its state changes. This pattern is useful when you have multiple objects that need to be updated when the state of another object changes.
 * 
 * What Problem Does It Solve?
  *    The Observer Pattern addresses the problem of notifying multiple objects about changes in the state of 
  *  another object without tightly coupling them. It allows a subject (or publisher) to maintain a list of 
  *  its dependents (observers) and automatically notify them of any state changes, usually by calling one of their methods.

   *   When to Use
   *     When an object’s state changes and other objects need to be notified automatically.
   *    When there is a one-to-many relationship between objects, such as a subject and its observers.
   *    When you need to decouple the subject from the observers to promote code reuse and flexibility.
*  Real-Life Examples
 *     News Publishing: Subscribers receive updates when a new article is published.
   *   Event Handling in GUIs: GUI elements update their state in response to user events.
    *  Stock Market Tickers: Investors receive updates when stock prices change.
 */

 interface Observer {
    public function update($data) : void;
 }

 class ConcreteObserver implements Observer {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function update($data) : void {
        echo PHP_EOL;
        echo "Observer: {$this->name} receives data => ". $data;
    }
 }


 class Subject {
    private $observer ;
    public function addObserver(Observer $observer) {
        $this->observer[] = $observer;
    }
    public function notifyObserver($data) {
        foreach ($this->observer as $observer) {
            $observer->update($data);
        }
    }
 }

$subject = new Subject();
$observer1 = new ConcreteObserver('First Observer');
$observer2 = new ConcreteObserver('Second Observer');
$observer3 = new ConcreteObserver('Third Observer');
$subject->addObserver($observer1);
$subject->addObserver($observer2);
$subject->addObserver($observer3);
$subject->notifyObserver('Please receive data');

