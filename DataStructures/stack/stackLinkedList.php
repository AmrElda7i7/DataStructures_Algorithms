<?php
class Node
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class Stack
{
    private $top;

    public function __construct()
    {
        $this->top = null;
    }
    public function push($data)
    {
        $node = new node($data) ;
        if($this->IsEmpty())
        {
            $node->next= null ;
            $this->top= $node ;
        }else 
        {
            $node->next= $this->top ;
            $this->top= $node ;
        }
    }
    public function pop()
    {   
        if($this->IsEmpty())
        {
            return ;
        }
        $tmp= $this->top ;
        $this->top= $this->top->next;
        unset($tmp) ;
    }
    public function IsEmpty()
    {
        return $this->top == null ? true : false;
    }
    public function topVal()
    {
        if (!$this->IsEmpty()) {
            return $this->top->data;
        }
    }
}
$stack = new stack() ;
$stack->push(10) ;
$stack->push(103) ;
$stack->push(12) ;
$stack->pop() ;
while(!$stack->IsEmpty())
{
     echo $stack->topVal() ;
    $stack->pop();
}
