<?php
class stack
{
    private $stack = [];
    private $top;
    public function __construct()
    {
        $this->top = -1;
    }
    public function push($data)
    {
        $this->top++;
        $this->stack[$this->top] = $data;
    }
    public function pop()
    {
        if ($this->IsEmpty())
            return "stack is empty";
        else {
            $popped = $this->stack[$this->top];
            unset($this->stack[$this->top]);
            $this->top--;
            return $popped;
        }
    }
    public function IsEmpty()
    {
        return $this->top == -1 ? true : false;
    }
    public function top_val()
    {
        return $this->IsEmpty() ? 'stack is empty' : $this->stack[$this->top];
    }
}
function pair($open, $close)
{
    if ($open = "[" && $close == "]")
        return true;
    if ($open = "{" && $close == "}")
        return true;
    if ($open = "(" && $close == ")")
        return true;
    return false;
}
function balanced($expression)
{
    $openBrackets = new stack();
    for ($i = 0; $i < strlen($expression); $i++) {
        if ($expression[$i] == "{" || $expression[$i] == "[" || $expression[$i] == "(") {
            $openBrackets->push($expression[$i]);
        } elseif ($expression[$i] == "}" || $expression[$i] == "]" || $expression[$i] == ")") {
            if($openBrackets->IsEmpty()) return false ;
            elseif(!pair($openBrackets->top_val(),$expression[$i])) 
            {
                return false ;
            }
            $openBrackets->pop() ;
        }
    }
    return $openBrackets->IsEmpty() ;
}
$res= balanced("[]{}") ;
    if($res==true) 
    {
        echo 'yes' ;
    }else 
    {
        echo 'no' ;
    }