<?php
class queue
{
    private $queue;
    private $front;
    private $rear;
    public function __construct()
    {
        $this->queue = [];
        $this->front = -1;
        $this->rear = -1;

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
    public function enqueue($val)
    {
        if ($this->IsEmpty()) {
            $this->front = 0;
            $this->rear = 0;
        } else {

            $this->rear++;
        }
        $this->queue[$this->rear] = $val;

    }
    public function dequeue()
    {
        if ($this->IsEmpty()) {
            return;
        }
        if ($this->rear == $this->front) {
            unset($this->queue[$this->front]);
            $this->rear = -1;
            $this->front = -1;
        } else {
            $this->front++;
        }
    }
}
$queue = new queue();
$queue->enqueue(1);
$queue->dequeue();
echo $queue->front();