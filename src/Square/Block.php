<?php


namespace Nagoya\Doukaku18\Square;


class Block extends AbstractSquare implements SquareInterface
{
    public function isBlock(): bool
    {
        return true;
    }
}
