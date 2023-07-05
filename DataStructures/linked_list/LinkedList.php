<?php
class node
{
    private $data;
    private $next;
    public function __construct()
    {
        $this->data = 0;
        $this->next = null;

    }
    public function getData()
    {
        return $this->data;
    }
    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }
    public function getNext()
    {
        return $this->next;
    }
    public function setNext($next): self
    {
        $this->next = $next;
        return $this;
    }
}
class LinkedList
{
    private $head;
    public function __construct()
    {
        $this->head = null;
    }
    private function IsEmpty(): bool
    {
        if ($this->head == null) {
            return true;
        }
        return false;
    }
    public function append($val)
    {
        $node = new node();
        $node->setData($val)->setNext(null);
        if ($this->IsEmpty() == true) {

            $this->head = $node;
        } else {
            $tmp = $this->head;
            while ($tmp->getNext() != null) {
                $tmp = $tmp->getNext();
            }
            $tmp->setNext($node);
        }
    }
    public function display(): void
    {
        $tmp = $this->head;
        while ($tmp != null) {
            echo $tmp->getData()."\n";
            $tmp = $tmp->getNext();
        }
    }
    public function remove($val)
    {
        $tmp = $this->head;
        $prev = $tmp;
        if ($this->IsEmpty() == true)
            return;
        if ($tmp->getData() == $val) {
            $this->head = $tmp->getNext();
            unset($tmp);
            return ;
        }
        while($tmp!=null && $tmp->getData()!=$val) 
        {
            $prev = $tmp;
            $tmp = $tmp->getNext();

        }
        if($tmp==null) 
        {
            return ;
        }else {
            $prev->setNext($tmp->getNext()) ;
        }
    }
    public function InsertAtPos($pos,$data)
    {
        $node = new node() ;
        $node->setData($data) ;
        if($pos==0) 
        {
            $node->setNext($this->head) ;
            $this->head= $node ;
            return ;
        }
        $tmp=$this->head ;
        for($i=0;$i<$pos-1 && $tmp->getNext()!=null ;$i++)
        {
            $tmp=  $tmp->getNext() ;
        }
        $node->setNext($tmp->getNext()) ;
        $tmp->setNext($node) ;
    }
    public function RemoveAtPos($pos)
    {
        $tmp=$this->head ;
        if ($pos==0) {
            $this->head=$this->head->getNext() ;
            unset($tmp) ;
            return ;
        }
        for($i=0;$i<$pos-1 && $tmp->getNext()!=null ;$i++)
        {
            $tmp=  $tmp->getNext() ;
        }
        if ($tmp->getNext()==null ) {
            return ;
        }
        $tmp2 = $tmp->getNext();
        $tmp->setNext($tmp2->getNext());
        unset($tmp2);
    }
    public function reverse()
    {
        $prev = null ;
        $curr= $this->head ;
        $next= null ;
        while ($curr!= null) {
            $next=$curr->getNext() ;
            $curr->setNext($prev) ;
            $prev=$curr ;
            $curr=$next ;
        }
        $this->head=$prev ;
        
    }
}
$linked = new LinkedList();
$linked->append(10);
$linked->append(100);
$linked->append(1020);
$linked->append(1500);
$linked->InsertAtPos(2,20) ;
$linked->InsertAtPos(6,210) ; 
