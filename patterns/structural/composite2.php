<?php 

/**
 * Composite Pattern:
 * The Composite Design Pattern is a structural pattern that allows you to treat individual objects and compositions of objects uniformly. 
 * It enables you to compose objects into tree-like structures to represent part-whole hierarchies. 
 * This pattern is particularly useful when dealing with hierarchical structures, such as file systems or organizational charts.
 * Real-World Use Case: Filesystem Management
 * Scenario: A filesystem represents files and directories as a tree structure. 
 * The Composite pattern allows both files and directories to be treated uniformly, 
 * enabling operations like adding, deleting, or iterating over both files and directories.
 * Example: Organization Chart
 */

// Component (abstract base class)
abstract class OrganizationComponent {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function getTitle();
    abstract public function getResponsibility();
    abstract public function addComponent(OrganizationComponent $component);
    abstract public function removeComponent(OrganizationComponent $component);
    abstract public function display($indentation = 0);
}

// Leaf (concrete class for employees)
class Employee extends OrganizationComponent {
    private $title;
    private $responsibility;

    public function __construct($name, $title, $responsibility) {
        parent::__construct($name);
        $this->title = $title;
        $this->responsibility = $responsibility;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getResponsibility() {
        return $this->responsibility;
    }

    public function addComponent(OrganizationComponent $component) {
        // Employees cannot have subordinates
        return false;
    }

    public function removeComponent(OrganizationComponent $component) {
        // Employees cannot have subordinates
        return false;
    }

    public function display($indentation = 0) {
        echo str_repeat(" ", $indentation) . "- " . $this->name . " (" . $this->title . ")" . PHP_EOL;
    }
}

// Composite (concrete class for departments)
class Department extends OrganizationComponent {
    private $components = [];

    public function addComponent(OrganizationComponent $component) {
        $this->components[] = $component;
    }

    public function removeComponent(OrganizationComponent $component) {
        $index = array_search($component, $this->components, true);
        if ($index !== false) {
            array_splice($this->components, $index, 1);
        }
    }

    public function getTitle() {
        return "Department: " . $this->name;
    }

    public function getResponsibility() {
        $responsibility = "";
        foreach ($this->components as $component) {
            $responsibility .= $component->getResponsibility() . ", ";
        }
        return rtrim($responsibility, ", ");
    }

    public function display($indentation = 0) {
        echo str_repeat(" ", $indentation) . "+ " . $this->name . PHP_EOL;
        foreach ($this->components as $component) {
            $component->display($indentation + 2);
        }
    }
}

// Usage
$ceo = new Employee("John Doe", "CEO", "Oversee the entire organization");

$salesDepartment = new Department("Sales");
$salesManager = new Employee("Robert Smith", "Sales Manager", "Manage the sales team");
$salesRepresentative1 = new Employee("Alice Johnson", "Sales Representative", "Sell products to customers");
$salesRepresentative2 = new Employee("Bob Williams", "Sales Representative", "Sell products to customers");
$salesDepartment->addComponent($salesManager);
$salesDepartment->addComponent($salesRepresentative1);
$salesDepartment->addComponent($salesRepresentative2);

$marketingDepartment = new Department("Marketing");
$marketingManager = new Employee("Jane Doe", "Marketing Manager", "Develop and implement marketing strategies");
$marketingSpecialist1 = new Employee("Tom Davis", "Marketing Specialist", "Create marketing materials");
$marketingSpecialist2 = new Employee("Sara Lee", "Marketing Specialist", "Analyze market trends");
$marketingDepartment->addComponent($marketingManager);
$marketingDepartment->addComponent($marketingSpecialist1);
$marketingDepartment->addComponent($marketingSpecialist2);

$ceo->addComponent($salesDepartment);
$ceo->addComponent($marketingDepartment);

echo "Organization Chart:" . PHP_EOL;
$ceo->display();
echo "CEO's Responsibility: " . $ceo->getResponsibility() . PHP_EOL;