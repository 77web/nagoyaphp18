<?php


namespace Nagoya\Doukaku18;


use Nagoya\Doukaku18\Square\SquareInterface;

class SquareCollection
{
    /**
     * @var SquareInterface[]
     */
    private $squares;

    /**
     * @param SquareInterface[] $squares
     */
    public function __construct(array $squares)
    {
        $this->squares = $squares;
    }

    /**
     * @return SquareInterface[]
     */
    public function getSquares(): array
    {
        return $this->squares;
    }

    public function isFilledWithBlock(): bool
    {
        foreach ($this->squares as $square) {
            if (!$square->isBlock()) {
                return false;
            }
        }

        return true;
    }
}
