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
    public $root = null;
    private function AddHelper($temp, $val)
    {
        if ($temp->value > $val) {
            if ($temp->left == null) {
                $node = new node($val);
                $temp->left = $node;
            } else {
                $this->AddHelper($temp->left, $val);
            }
        } else {
            if ($temp->right == null) {
                $node = new node($val);
                $temp->right = $node;
            } else {
                $this->AddHelper($temp->right, $val);
            }
        }

    }
    private function GetMaxHelper($temp)
    {
        if ($temp->right == null) {
            return $temp->value;
        } else {
            return $this->GetMaxHelper($temp->right);
        }
    }
    private function GetMinHelper($temp)
    {
        if ($temp->left == null) {
            return $temp->value;
        } else {
            return $this->GetMinHelper($temp->left);
        }
    }
    private function GetHeightHelper($temp)
    {
        if ($temp == null) {
            return -1;
        }

        $leftSubTreeHeight = $this->GetHeightHelper($temp->left);
        $rightSubTreeHeight = $this->GetHeightHelper($temp->right);

        return 1 + max($leftSubTreeHeight, $rightSubTreeHeight);
    }
    private function PreOrder($temp)
    {
        if($temp==null) return ;
        echo $temp->value."\n";
        $this->PreOrder($temp->left);
        $this->PreOrder($temp->right);
    }
    private function RemoveHelper($root , $data)
    {
        if ($root == null) {
      return $root ;
        }elseif($data < $root->value) 
        {
            $root->left = $this->RemoveHelper($root->left,$data) ;
        }elseif($data>$root->value) 
        {
            $root->right = $this->RemoveHelper($root->right,$data) ;

        }else 
        {
            if($root->left==null) 
            {
                $temp= $root->right ;
                unset($root) ;
                return $temp ;
            }
            elseif($root->right==null) 
            {
                $temp= $root->left ;
                unset($root) ;
                return $temp ;
            }
            else  
            {
                $maxValue = $this->getMax();
                $root->value = $maxValue ;
                $this->RemoveHelper($root->left , $maxValue) ;
            }
        }
        return $root ;
    }
    public function Insert($val)
    {
        $node = new node($val);
        if ($this->root == null) {
            $this->root = $node;
            return;
        } else {
            $this->addHelper($this->root, $val);
        }
    }
    public function getMax()
    {
        return $this->GetMaxHelper($this->root);
    }
    public function getMin()
    {
        return $this->GetMinHelper($this->root);
    }
    public function GetHeight()
    {
        return $this->GetHeightHelper($this->root);
    }
    public function DisplayLevelOrder()
    {
        if($this->root==null) 
        {
            return ;
        }
        $q= new SplQueue() ;
        $q->push($this->root) ;
        while(!$q->isEmpty() )
        {
            $current = $q->top() 
            ;
            $q->pop() ;
            echo $current->value."\n" ;
            if($current->left != null  )  $q->push($current->left) ;
            if($current->right != null  )  $q->push($current->right) ;

        }
    }
    public function DisplayPreOrder()
    {
        if($this->root!=null) 
        {
            $this->PreOrder($this->root );
        }
    }
    public function Remove($data)
    {
        $this->root = $this->RemoveHelper($this->root , $data) ;
    }
}

$bst = new BST();
$bst->Insert(15);
$bst->Insert(6);
$bst->Insert(3);
$bst->Insert(25);
$bst->Insert(9);
$bst->Insert(8);
$bst->Insert(20);
$bst->Remove(15) ;
echo $bst->root->value;
    //  $bst->DisplayPreOrder();