<?php 
class HashTableProbing
{
    private $table;
    private $size;

    public function __construct()
    {
        $this->table = array_fill(0, 10, null);
        $this->size = 10;
    }

    public function put($key, $value)
    {
        $index = $this->hash($key);
        while (isset($this->table[$index])) {
            // Linear probing: move to the next slot
            $index = ($index + 1) % $this->size;
        }
        $this->table[$index] = ['key' => $key, 'value' => $value];
    }

    public function get($key)
    {
        $index = $this->hash($key);
        $initialIndex = $index;
        while (isset($this->table[$index])) {
            if ($this->table[$index]['key'] === $key) {
                return $this->table[$index]['value'];
            }
            // Linear probing: move to the next slot
            $index = ($index + 1) % $this->size;
            if ($index === $initialIndex) {
                return null; // Element not found
            }
        }
        return null; // Element not found
    }

    public function remove($key)
    {
        $index = $this->hash($key);
        $initialIndex = $index;
        while (isset($this->table[$index])) {
            if ($this->table[$index]['key'] === $key) {
                // Remove the current key-value pair
                unset($this->table[$index]);

                // Rehash and reinsert subsequent elements
                $nextIndex = ($index + 1) % $this->size;
                while (isset($this->table[$nextIndex])) {
                    $current = $this->table[$nextIndex];
                    unset($this->table[$nextIndex]);
                    $this->put($current['key'], $current['value']);
                    $nextIndex = ($nextIndex + 1) % $this->size;
                }
                return;
            }
            // Linear probing: move to the next slot
            $index = ($index + 1) % $this->size;
            if ($index === $initialIndex) {
                return; // Element not found
            }
        }
    }
   public function Update($key, $value)
{
    $existingValue = $this->get($key);
    if ($existingValue !== null) {
        $index = $this->hash($key);
            if ($this->table[$index]['key'] === $key) {
                $this->table[$index]['value'] = $value;
                return true; 
            }
           
        }
        return false ;
  
}


    private function hash($key)
    {
        // A simple hash function (you may want to use a more robust one)
        return strlen($key) % $this->size;
    }
}
// Create a hash table instance
$hashTable = new HashTableProbing();

// Insert key-value pairs
$hashTable->put("John", "555-1234");
$hashTable->put("Alice", "555-5678");
$hashTable->put("Bob", "555-7890");
$hashTable->put("Eve", "555-4567");

// Retrieve values
echo "Phone number for John: " . $hashTable->get("John") . "\n";   // Output: Phone number for John: 555-1234
echo "Phone number for Alice: " . $hashTable->get("Alice") . "\n"; // Output: Phone number for Alice: 555-5678

// Remove a key-value pair
$hashTable->remove("Bob");

// Attempt to retrieve a removed key
echo "Phone number for Bob: " . $hashTable->get("Bob") . "\n";     // Output: Phone number for Bob:

// Insert a new key-value pair with the same key as a removed one
$hashTable->put("Bob", "555-9876");

// Retrieve the new value for Bob
echo "Phone number for Bob: " . $hashTable->get("Bob") . "\n";     // Output: Phone number for Bob: 555-9876
var_dump($hashTable->Update('lol' ,'555-4568213223')) ;
echo "Phone number for Alice: " . $hashTable->get("Alice") . "\n";     