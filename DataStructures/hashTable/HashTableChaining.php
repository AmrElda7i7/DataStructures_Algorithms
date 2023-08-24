<?php 
class Node
{
    public $key;
    public $value;
    public $next;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = null;
    }
}

class HashTableChaining
{
    private $table;
    private $size;

    public function __construct($size = 10)
    {
        $this->table = array_fill(0, $size, null);
        $this->size = $size;
    }

    private function hash($key)
    {
        // A simple hash function (you may want to use a more robust one)
        return strlen($key) % $this->size;
    }

    public function put($key, $value)
    {
        $index = $this->hash($key);
        $node = new Node($key, $value);

        if ($this->table[$index] === null) {
            $this->table[$index] = $node;
        } else {
            // Collision: Append the new node to the end of the linked list
            $current = $this->table[$index];
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $node;
        }
    }

    public function get($key)
    {
        $index = $this->hash($key);
        $current = $this->table[$index];

        while ($current !== null) {
            if ($current->key === $key) {
                return $current->value;
            }
            $current = $current->next;
        }

        return null; // Key not found
    }

    public function remove($key)
    {
        $index = $this->hash($key);
        $current = $this->table[$index];
        $prev = null;

        while ($current !== null) {
            if ($current->key === $key) {
                if ($prev === null) {
                    // The node to remove is the head of the linked list
                    $this->table[$index] = $current->next;
                } else {
                    // Remove the current node by updating the previous node's next pointer
                    $prev->next = $current->next;
                }
                return; // Key removed
            }
            $prev = $current;
            $current = $current->next;
        }
    }
}
// Create a hash table instance
$hashTable = new HashTableChaining();

// Insert key-value pairs
$hashTable->put("John", "555-1234");
$hashTable->put("Alice", "555-5678");
$hashTable->put("Bob", "555-7890");
$hashTable->put("Eve", "555-4567");

// Retrieve values
echo "Phone number for John: " . $hashTable->get("John") . "\n";   // Output: Phone number for John: 555-1234
echo "Phone number for Alice: " . $hashTable->get("Alice") . "\n"; // Output: Phone number for Alice: 555-5678
echo "Phone number for Bob: " . $hashTable->get("Bob") . "\n";     // Output: Phone number for Bob: 555-7890

// Remove a key-value pair
$hashTable->remove("Bob");

// Attempt to retrieve a removed key
echo "Phone number for Bob: " . $hashTable->get("Bob") . "\n";     // Output: Phone number for Bob:

// Insert a new key-value pair with the same key as a removed one
$hashTable->put("Bob", "555-9876");

// Retrieve the new value for Bob
echo "Phone number for Bob: " . $hashTable->get("Bob") . "\n";     // Output: Phone number for Bob: 555-9876
