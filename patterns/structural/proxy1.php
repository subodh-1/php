<?php

/* Proxy Pattern:
The Proxy Pattern is a structural design pattern that provides a surrogate or placeholder for another object. 
The proxy controls access to the original object, allowing you to perform something either before or after the request gets to the original object.
Problem: Creating or initializing an object can be resource-intensive or time-consuming. 
For example, loading a large image from disk or establishing a connection to a remote server.
Solution: The proxy pattern can defer the creation of the costly object until it is absolutely necessary, implementing a technique known as lazy initialization. 

Real-World Example: Virtual Proxy for Image Loading
Let's look at a detailed example that highlights the problems and solutions provided by the Proxy Pattern in the context of a virtual proxy for image loading.

Scenario: Loading and Displaying Images
Problem: Loading high-resolution images from disk is time-consuming. Displaying a gallery of images would require loading all images upfront, which can lead to performance issues.
Solution: Use a virtual proxy to defer the loading of each image until it is actually needed (lazy loading).
*/

interface Image {
    public function display();
}

class RealImage implements Image {
    private $filepath;
    public function __construct($filepath){
        $this->filepath = $filepath;
        $this->load_image();
    }
    public function load_image(){
        echo "Loading image: ".$this->filepath."...";
        echo PHP_EOL;
    }
    public function display(){
        echo "Displaying image: ". $this->filepath;
    }
}

class ProxyImage implements Image {
    private $filepath;
    private $real_image;

    public function __construct($filepath) {
        $this->filepath = $filepath;
    }
    public function display() {
        if ($this->real_image == null) {
            $this->real_image = new RealImage($this->filepath);
        }
        $this->real_image->display();
    }
}

// client code
$proxy = new ProxyImage('imaginary.png');
$proxy->display();