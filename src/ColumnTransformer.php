<?php


namespace Nagoya\Doukaku18;


use Nagoya\Doukaku18\Square\Block;
use Nagoya\Doukaku18\Square\EmptySquare;

class ColumnTransformer
{
    public function transform(SquareCollection $col): string
    {
        $codes = [];
        foreach ($col->getSquares() as $square) {
            $codes[] = $square->isBlock() ? 1 : 0;
        }

        return base_convert(implode('', array_reverse($codes)), 2, 16);
    }

    /**
     * @param int $x
     * @param string $colString
     * @return SquareCollection
     */
    public function reverseTransform(int $x, string $colString): SquareCollection
    {
        $codes = sprintf('%08d', base_convert($colString, 16, 2));
        $squares = [];
        foreach (str_split($codes) as $index => $code) {
            $squares[$index] = $code == 1 ? new Block($x, $index) : new EmptySquare($x, $index);
        }

        return new SquareCollection($squares);
    }
}
