<?php

declare(strict_types=1);

namespace DevLess\Math;

class Calculator implements CalculatorInterface
{
    public function add(AddRequest $request): AddReply
    {
    	$sum = $request->getX() + $request->getY();

    	return (new AddReply())->setSum($sum);
    }

    public function subtract(SubtractRequest $request): SubtractReply
    {
    	$diff = $request->getX() - $request->getY();
    	return (new SubtractReply())->setDiff($diff);
    }
}

