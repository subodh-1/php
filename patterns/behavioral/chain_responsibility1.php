<?php
// Chain of Responsibility Pattern :
// The Chain of Responsibility Pattern is a behavioral design pattern that allows a request to pass through a chain of handlers. 
// Each handler in the chain can either handle the request or pass it to the next handler in the chain.

// Key Idea
// Chain of Handlers: You have a sequence of handlers, each responsible for processing the request or passing it to the next handler if it can't handle it.
// Decoupling: The pattern decouples the sender of the request from the receivers, allowing multiple objects to handle the request without the sender needing to know which one will handle it.
// Flexibility: You can dynamically add or remove handlers or change their order.

// Real-World Example: Customer Support System
// Imagine a customer support system where a customer can submit a support request. The request can be handled by different levels of support staff:

// Level 1 Support: Handles simple requests (e.g., password resets).
// Level 2 Support: Handles more complex requests (e.g., technical issues).
// Level 3 Support: Handles very complex or specialized requests (e.g., software bugs).
// Each level tries to handle the request. If a level can't handle it, the request is passed to the next level.

//Handler Interface
interface SupportHandler {
    public function setNext(SupportHandler $handler): SupportHandler;
    public function handle($request);
}

//Abstract Handler Class
abstract class AbstractSupportHandler implements SupportHandler {
    private $nextHandler;

    public function setNext(SupportHandler $handler): SupportHandler {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle($request) {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return null;
    }
}
//Concrete Handler Classes
class Level1Support extends AbstractSupportHandler {
    public function handle($request) {
        if ($request === 'simple') {
            return "Level 1 Support: Handling simple request\n";
        } else {
            return parent::handle($request);
        }
    }
}

class Level2Support extends AbstractSupportHandler {
    public function handle($request) {
        if ($request === 'complex') {
            return "Level 2 Support: Handling complex request\n";
        } else {
            return parent::handle($request);
        }
    }
}

class Level3Support extends AbstractSupportHandler {
    public function handle($request) {
        if ($request === 'very complex') {
            return "Level 3 Support: Handling very complex request\n";
        } else {
            return parent::handle($request);
        }
    }
}
// Client Code
// Client code
$level1 = new Level1Support();
$level2 = new Level2Support();
$level3 = new Level3Support();

$level1->setNext($level2)->setNext($level3);

echo $level1->handle('simple');
echo $level1->handle('complex');
echo $level1->handle('very complex');
echo $level1->handle('unknown');
