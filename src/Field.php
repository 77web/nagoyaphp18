<?php


namespace Nagoya\Doukaku18;


use Nagoya\Doukaku18\Square\SquareInterface;

class Field
{
    private $squares = [];

    public function addSquare(SquareInterface $square): self
    {
        $this->squares[] = $square;

        return $this;
    }

    /**
     * @param int $y
     * @return SquareInterface[]
     */
    public function getRow(int $y): array
    {
        $row = [];
        foreach ($this->squares as $square) {
            if ($square->getY() === $y) {
                $row[$square->getX()] = $square;
            }
        }

        ksort($row);

        return $row;
    }
}
