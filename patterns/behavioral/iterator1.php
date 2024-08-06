<?php
/**
 * Iterator pattern
 * The Iterator Pattern is a behavioral design pattern that provides a way to access the elements of a collection (like an array or a list) sequentially without exposing its underlying representation. The pattern allows you to traverse a collection without needing to know the details of how the collection is structured.
 * Key Components:
 * Iterator Interface: Declares the operations required to traverse a collection, such as next(), hasNext(), current(), key(), rewind(), and valid().
 * Concrete Iterator: Implements the iterator interface and keeps track of the current position in the traversal.
 * Aggregate Interface: Declares a method to create an iterator.
 * Concrete Aggregate: Implements the aggregate interface to return an instance of the concrete iterator.
 * 
 * Real-World Example: Music Playlist
 * Imagine you have a music playlist where you want to play songs one by one. 
 * The Iterator Pattern allows you to go through the playlist without exposing the internal structure of the 
 * playlist (e.g., array, list, etc.).
 * 
 * Iterator Interface
 * Concrete Interator
 * Aggregate Interface
 * Concrete Aggregate
*/
interface IteratorInterface {
    public function current();
    public function next();
    public function key();
    public function valid();
    public function rewind();
}

class PlaylistIterator implements IteratorInterface {
    private $playlist;
    private $position = 0;

    public function __construct($playlist) {
        $this->playlist = $playlist;
    }

    public function current() {
        return $this->playlist[$this->position];
    }

    public function next() {
        $this->position++;
    }

    public function key() {
        return $this->position;
    }

    public function valid() {
        return isset($this->playlist[$this->position]);
    }

    public function rewind() {
        $this->position = 0;
    }
}

interface Playlist {
    public function createIterator();
}

class MusicPlaylist implements Playlist {
    private $songs = [];

    public function addSong($song) {
        $this->songs[] = $song;
    }

    public function createIterator() {
        return new PlaylistIterator($this->songs);
    }
}

// Client code
$playlist = new MusicPlaylist();
$playlist->addSong("Song 1");
$playlist->addSong("Song 2");
$playlist->addSong("Song 3");

$iterator = $playlist->createIterator();

echo "Playing playlist:\n";
while ($iterator->valid()) {
    echo "Playing: " . $iterator->current() . "\n";
    $iterator->next();
}


