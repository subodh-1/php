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
 * Example: Building a UI menu system where menus and submenus are treated as hierarchical components.
 */

// Component (abstract base class)
abstract class FileSystemComponent {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function getSize();
    abstract public function display($indentation = 0);
}

// Leaf (concrete class for files)
class File extends FileSystemComponent {
    private $size;

    public function __construct($name, $size) {
        parent::__construct($name);
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

    public function display($indentation = 0) {
        echo str_repeat(" ", $indentation) . "- " . $this->name . " (" . $this->size . " bytes)" . PHP_EOL;
    }
}

// Composite (concrete class for directories)
class Directories extends FileSystemComponent {
    private $components = [];

    public function add(FileSystemComponent $component) {
        $this->components[] = $component;
    }

    public function remove(FileSystemComponent $component) {
        $index = array_search($component, $this->components, true);
        if ($index !== false) {
            array_splice($this->components, $index, 1);
        }
    }

    public function getSize() {
        $size = 0;
        foreach ($this->components as $component) {
            $size += $component->getSize();
        }
        return $size;
    }

    public function display($indentation = 0) {
        echo str_repeat(" ", $indentation) . "+ " . $this->name . PHP_EOL;
        foreach ($this->components as $component) {
            $component->display($indentation + 2);
        }
    }
}

// Usage
$rootDir = new Directories("Root");

$file1 = new File("File1.txt", 1024);
$file2 = new File("File2.jpg", 2048);
$file3 = new File("File3.pdf", 512);

$subDir1 = new Directories("Documents");
$subDir1->add($file1);
$subDir1->add($file2);

$subDir2 = new Directories("Photos");
$subDir2->add($file3);

$rootDir->add($subDir1);
$rootDir->add($subDir2);

echo "Total size: " . $rootDir->getSize() . " bytes" . PHP_EOL;
echo "File system structure:" . PHP_EOL;
$rootDir->display();