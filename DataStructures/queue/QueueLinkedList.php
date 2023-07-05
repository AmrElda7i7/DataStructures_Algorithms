    <?php
    class node
    {
        public $data;
        public $next;
        public function __construct($data)
        {
            $this->next = null;
            $this->data = $data;
        }

    }
    class queue
    {
        private $head;
        private $tail;
        public function __construct()
        {
            $this->head = null;
            $this->tail = null;
        }
        public function HeadVal()
        {
            if (!$this->IsEmpty()) {

                return $this->head->data;
            }
        }
        public function IsEmpty()
        {
            return $this->head == null && $this->tail == null;
        }
        public function enqueue($val)
        {
            $node = new node($val);
            if ($this->IsEmpty()) {
                $this->head = $this->tail = $node;
            } else {
                $this->tail->next = $node;
                $this->tail = $node;
            }
        }
        public function dequeue()
        {
            if ($this->IsEmpty()) {
                return;
            }
            $temp = $this->head;
            if ($this->head == $this->tail) {
                $this->head = $this->tail = null;
            } else {
                $this->head = $this->head->next;
            }
            unset($temp);
        }

    }
$queue = new queue();
$queue->enqueue(10);
$queue->enqueue(120);
$queue->enqueue(130);
while (!$queue->IsEmpty()) {
    echo $queue->HeadVal() . "\n";
    $queue->dequeue();
}   
