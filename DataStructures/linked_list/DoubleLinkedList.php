<?php
class node
{
    private $prev;
    private $data;
    private $next;

    public function __construct()
    {
        $this->data = 0;
        $this->next = null;
        $this->prev = null;
    }
    public function getPrev()
    {
        return $this->prev;
    }
    public function setPrev($prev): self
    {
        $this->prev = $prev;
        return $this;
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
class DoublyLinkedList
{
    private $head;
    public function __construct()
    {
        $this->head = null;
    }
    public function append($val)
    {
        $node = new node();
        $node->setData($val);
        if ($this->head == null) {
            $this->head = $node;
        } else {
            $tmp = $this->head;
        }
        while ($tmp->getNext() != null) {
            $tmp = $tmp->getNext();
        }
        $tmp->setNext($node);
        $node->prev = $tmp;


    }
    public function InsertAtPos($data, $pos)
    {
        $node = new node();
        $node->setData($data);
        if ($this->head == null) {
            $this->head = $node;
            return;
        }
        if ($pos = 0) {
            $node->setNext($this->head);
            $this->head->setPrev($node);
            $this->head = $node;
            return;
        }
        $tmp = $this->head;
        for ($i = 0; $i < $pos && $tmp != null; $i++) {
            $tmp = $tmp->getNext();
        }
        if ($tmp == null) {
            $this->append($data);
            return;
        }
        $node->setPrev($tmp->getPrev());
        $tmp->getPrev()->setNext($node);
        $tmp->setPrev($node);
        $node->setNext($tmp);
    }

    public function remove($val)
    {
        if ($this->head == null)
            return;

        $tmp = $this->head;

        if ($tmp->getData() == $val) {
            $this->head = $tmp->getNext();
            if ($this->head != null)
                $this->head->setPrev(null);
            unset($tmp);
            return;
        }

        while ($tmp != null && $tmp->getData() != $val) {
            $tmp = $tmp->getNext();
        }

        if ($tmp == null) {
            return;
        } else {
            $tmp->getPrev()->setNext($tmp->getNext());
            if ($tmp->getNext() != null)
                $tmp->getNext()->setPrev($tmp->getPrev());
            unset($tmp);
        }
    }

    public function removeAtPos($pos)
    {
        if ($this->head == null)
            return;

        $tmp = $this->head;
        if ($pos == 0) {
            $this->head = $tmp->getNext();
            if ($this->head)
                $this->head->setPrev(null);
            unset($tmp);
            return;
        }

        for ($i = 0; $i < $pos && $tmp != null; $i++)
            $tmp = $tmp->getNext();

        if ($tmp == null)
            return;

        $tmp->getPrev()->setNext($tmp->getNext());
        if ($tmp->getNext())
            $tmp->getNext()->setPrev($tmp->getPrev());
        unset($tmp);
    }

    public function display()
    {
        $tmp = $this->head;
        while ($tmp != null) {
            echo $tmp->getData() . " ";
            $tmp = $tmp->getNext();
        }
        echo "\n";
    }

    public function reverseDisplay()
    {
        $tmp = $this->head;
        while ($tmp->getNext() != null) {
            $tmp = $tmp->getNext();
        }

        while ($tmp != null) {
            echo $tmp->getData() . " ";
            $tmp = $tmp->getPrev();
        }
        echo "\n";
    }
}