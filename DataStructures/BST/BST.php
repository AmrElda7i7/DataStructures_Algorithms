<?php
class node
{
    public $value;
    public $left;
    public $right;
    public function __construct($value)
    {
        $this->value = $value;
        $this->right = null;
        $this->left = null;
    }
}
class BST
{
    private $root = null;
   
    public function Insert($val)
    {
        $node = new node($val);
        if ($this->root == null) {
            $this->root = $node;
            return;
        } else {
            $temp = $this->root;
            while ($temp != null) {
                $parent = $temp;
                if ($val <= $temp->value) {
                    $temp = $temp->left;
                } else {
                    $temp = $temp->right;
                }
            }
        }
        if ($parent->value <= $val) {
            $parent->right = $node;
        } else {
            $parent->left = $node;
        }
        
        
    }
    public function getMax()
    {
        $temp =$this->root ;
        while($temp->right!= null) 
        {
            $temp= $temp->right ;
        }
        return $temp->value  ;
    }
    public function getMin()
    {
        $temp =$this->root ;
        while($temp->left!= null) 
        {
            $temp= $temp->left ;

        }
        return $temp->value  ;
    }
}
$bst = new BST() ;
$bst->Insert(10) ;
$bst->Insert(20) ;
$bst->Insert(230) ;
$bst->Insert(240) ;
echo $bst->getMin();