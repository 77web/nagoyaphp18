<?php


namespace Nagoya\Doukaku18\Square;


class EmptySquare extends AbstractSquare implements SquareInterface
{
    public function isBlock(): bool
    {
        return false;
    }
}
