<?php
function Priority($c) {
    if ($c == '-' || $c == '+')
        return 1;
    else if ($c == '*' || $c == '/')
        return 2;
    else if ($c == '^')
        return 3;
    else
        return 0;
}

function infix_to_postfix($exp) {
    $stk = new SplStack();
    $output = "";

    for ($i = 0; $i < strlen($exp); $i++) {
        if ($exp[$i] == ' ') continue;

        if (ctype_digit($exp[$i]) || ctype_alpha($exp[$i]))
            $output .= $exp[$i];
        else if ($exp[$i] == '(')
            $stk->push('(');
        else if ($exp[$i] == ')') {
            while (!$stk->isEmpty() && $stk->top() != '(') {
                $output .= $stk->top();
                $stk->pop();
            }
            $stk->pop();
        }
        else {
            while (!$stk->isEmpty() && Priority($exp[$i]) <= Priority($stk->top())) {
                $output .= $stk->top();
                $stk->pop();
            }
            $stk->push($exp[$i]);
        }
    }

    while (!$stk->isEmpty()) {
        $output .= $stk->top();
        $stk->pop();
    }

    return $output;
}

$infixExpression = "(3+2)+7/2*((7+3)*2)";
echo infix_to_postfix($infixExpression) . "\n";
