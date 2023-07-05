<?php
class queue
{
    private $queue;
    private $front;
    private $rear;
    private $capacity ;
    public function __construct($capacity)
    {
        $this->queue = [];
        $this->front = -1;
        $this->rear = -1;
        $this->capacity=$capacity;

    }
    public function IsEmpty()
    {
        return $this->front == -1 && $this->rear == -1;
    }
    public function front()
    {

        if (!$this->IsEmpty()) {
            return $this->queue[$this->front];

        }

    }
    public function IsFull()
    {
        if(($this->rear+1)% $this->capacity== $this->front)
        {
            return true ;
        }
        return false ;
    }
    public function enqueue($val)
    {
        if($this->IsFull())
        {
            return ;
        }

        if ($this->IsEmpty()) {
            $this->front = 0;
            $this->rear = 0;
        } else {

            $this->rear= ($this->rear+1)%$this->capacity ;
        }
        $this->queue[$this->rear] = $val;

    }
    public function dequeue()
    {
        if ($this->IsEmpty()) {
            return;
        }
        if ($this->rear == $this->front) {
            $this->rear = -1;
            $this->front = -1;
        } else {
            $this->front = ($this->front+1) % $this->capacity;
        }
    }
}
$queue = new queue(10);
$queue->enqueue(1);
echo $queue->front();