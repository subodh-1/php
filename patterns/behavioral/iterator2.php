<?php 
/**
 * Iterator pattern
 * The Iterator Pattern is a behavioral design pattern that provides a way to access the elements of a collection (like an array or a list) sequentially without exposing its underlying representation. The pattern allows you to traverse a collection without needing to know the details of how the collection is structured.
 * Key Components:
 * Iterator Interface: Declares the operations required to traverse a collection, such as next(), hasNext(), current(), key(), rewind(), and valid().
 * Concrete Iterator: Implements the iterator interface and keeps track of the current position in the traversal.
 * Aggregate Interface: Declares a method to create an iterator.
 * Concrete Aggregate: Implements the aggregate interface to return an instance of the concrete iterator.
 * Real-World Example: Library Book Collection
 * Let's consider a real-world example where a library has a collection of books. 
 * We want to iterate through the collection of books to find all books by a particular author or all books in a certain category.
 * 
 * Iterator Interface
 * Concrete Interator
 * Aggregate Interface
 * Concrete Aggregate
*/
// Iterator Interface
interface BookIterator {
    public function current();
    public function next();
    public function key();
    public function valid();
    public function rewind();
}

// Concrete Iterator
class LibraryBookIterator implements BookIterator {
    private $books;
    private $position = 0;

    public function __construct($books) {
        $this->books = $books;
    }

    public function current() {
        return $this->books[$this->position];
    }

    public function next() {
        $this->position++;
    }

    public function key() {
        return $this->position;
    }

    public function valid() {
        return isset($this->books[$this->position]);
    }

    public function rewind() {
        $this->position = 0;
    }
}

// Aggreegate Interface
interface Library {
    public function createIterator();
}
// Concrete Aggreegate 
class LibraryBookCollection implements Library {
    private $books = [];

    public function addBook($book) {
        $this->books[] = $book;
    }

    public function createIterator() {
        return new LibraryBookIterator($this->books);
    }
}

// Context
// Book class for simplicity
class Book {
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }
}

// Client code
$library = new LibraryBookCollection();
$library->addBook(new Book("Chandrakanta Santati", "Babu Devaki Nandan Khatri"));
$library->addBook(new Book("1984", "George Orwell"));
$library->addBook(new Book("To Kill a Mockingbird", "Harper Lee"));
$library->addBook(new Book("The Great Gatsby", "F. Scott Fitzgerald"));

$iterator = $library->createIterator();

echo "Books in the library:\n";
while ($iterator->valid()) {
    $book = $iterator->current();
    echo "Title: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";
    $iterator->next();
}


