<?php 
/**
 * Proxy Pattern:
 * The Proxy Pattern is a structural design pattern that provides a surrogate or placeholder for another object. 
 * The proxy controls access to the original object, allowing you to perform something either before or after the request gets to the original object.
 * Problem: Creating or initializing an object can be resource-intensive or time-consuming. 
 * For example, loading a large image from disk or establishing a connection to a remote server.
 * Solution: The proxy pattern can defer the creation of the costly object until it is absolutely necessary, implementing a technique known as lazy initialization. 

 * Real-World Example: Virtual Proxy for Image Loading
 * Let's look at a detailed example that highlights the problems and solutions provided by the Proxy Pattern in the context of a virtual proxy for image loading.

 * Scenario
 *   Imagine a web application that allows users to view documents. 
 * However, some documents are sensitive and should only be accessible to users with appropriate permissions. 
 * We can use a protection proxy to control access to these documents.
 */

 interface Document {
    public function display() : void;
 }

 class RealDocument implements Document {
    private $filepath;
    public function __construct($filepath) {
        $this->filepath = $filepath;
        $this->load_document();
    }
    public function load_document() {
        echo "Loading document from the disk: ". $this->filepath;
    }
    public function display() : void {
        echo PHP_EOL."Displaying document: ".$this->filepath;
    }
 }

 class ProxyDocument implements Document {
    private $filepath;
    private $fileobject;
    
    public function __construct($filepath) {
        $this->filepath = $filepath;
    }
    public function display() : void {
        if ($this->can_access() === true) {
            if ($this->fileobject == null) {
                $this->fileobject = new RealDocument($this->filepath);
            }
            $this->fileobject->display();
        }
    }
    public function can_access(){
        return true; // return false if don't have access to the document
    }
 }

 // Client implementation
 $proxy = new ProxyDocument('resume.docx');
 $proxy->display();

