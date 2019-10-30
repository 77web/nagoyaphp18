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
     * @return SquareCollection
     */
    public function getRow(int $y): SquareCollection
    {
        $row = [];
        foreach ($this->squares as $square) {
            if ($square->getY() === $y) {
                $row[$square->getX()] = $square;
            }
        }

        return new SquareCollection($row);
    }

    /**
     * @param int $x
     * @return SquareCollection
     */
    public function getCol(int $x): SquareCollection
    {
        $row = [];
        foreach ($this->squares as $square) {
            if ($square->getX() === $x) {
                $row[$square->getY()] = $square;
            }
        }

        return new SquareCollection($row);
    }

    /**
     * @return SquareCollection[]
     */
    public function getRows(): array
    {
        $rows = [];

        foreach ($this->squares as $square) {
            $rows[$square->getY()][$square->getX()] = $square;
        }

        $rows = array_map(function ($row) {
            return new SquareCollection($row);
        }, $rows);
        ksort($rows);

        return $rows;
    }
}
