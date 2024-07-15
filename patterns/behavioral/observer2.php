<?php 
/* Observer Pattern in PHP
What Problem Does It Solve?
The Observer Pattern addresses the problem of notifying multiple objects about changes in the state of another object without tightly coupling them. It allows a subject (or publisher) to maintain a list of its dependents (observers) and automatically notify them of any state changes, usually by calling one of their methods.

When to Use
When an object’s state changes and other objects need to be notified automatically.
When there is a one-to-many relationship between objects, such as a subject and its observers.
When you need to decouple the subject from the observers to promote code reuse and flexibility.

Real-Life Examples
News Publishing: Subscribers receive updates when a new article is published.
Event Handling in GUIs: GUI elements update their state in response to user events.
Stock Market Tickers: Investors receive updates when stock prices change.
Example in PHP
Let's consider a simple example where we have a NewsPublisher (subject) and Subscriber (observer) objects. */

interface Observer {
    public function update(string $message) : void;
}

interface Subject {
    public function attach(Observer $observer) : void;
    public function detach(Observer $observer) : void;
    public function notify() : void;
}

class NewsPublisher implements Subject {
    private $observer = [];
    private $news;
    public function attach(Observer $observer) : void {
        $this->observer[] = $observer;
    }
    public function detach(Observer $observer) : void {
        $key = array_search($observer, $this->observer, true);
        if($key !== false) {
            unset($this->observer[$key]);
        }
        $this->observer = array_values($this->observer);
    }

    public function notify() : void {
        foreach($this->observer as $observer) {
            $observer->update($this->news);
        }
    }

    public function set_news($news) {
        $this->news = $news;
    }

}

//Create Subscriber

class Subscriber implements Observer {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function update($news) : void {
        echo $this->name . " Subscriber received news: ". $news. PHP_EOL;
    }
}

// Client Implementation
$publisher = new NewsPublisher();
$subscriber1 = new Subscriber('Subodh');
$subscriber2 = new Subscriber('Achyut');
$subscriber3 = new Subscriber('Vinayak');

$publisher->attach($subscriber1);
$publisher->attach($subscriber2);
$publisher->attach($subscriber3);

$publisher->set_news('Breaking news 1');
$publisher->notify();

$publisher->detach($subscriber2);
$publisher->set_news('Breaking news 2');
$publisher->notify();
