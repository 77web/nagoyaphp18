<?php


namespace Nagoya\Doukaku18;


use Nagoya\Doukaku18\Square\EmptySquare;

class App
{
    /**
     * @var InputParser
     */
    private $inputParser;

    /**
     * @var OutputFormatter
     */
    private $outputFormatter;

    /**
     * @param InputParser $inputParser
     * @param OutputFormatter $outputFormatter
     */
    public function __construct(InputParser $inputParser, OutputFormatter $outputFormatter)
    {
        $this->inputParser = $inputParser;
        $this->outputFormatter = $outputFormatter;
    }

    public function run(string $input): string
    {
        $initialField = new Field();
        foreach ($this->inputParser->parse($input) as $col) {
            foreach ($col->getSquares() as $square) {
                $initialField->addSquare($square);
            }
        }
        // 下〜上
        $rows = $initialField->getRows();
        $sizeOfRow = count($rows[0]->getSquares());

        $afterField = new Field();
        $newRowIndex = count($rows);
        foreach ($rows as $row) {
            if (!$row->isFilledWithBlock()) {
                foreach ($row->getSquares() as $square) {
                    $square->setY($newRowIndex);
                    $afterField->addSquare($square);
                }

                $newRowIndex--;
            }
        }

        // 上に積む
        for ($i = $newRowIndex; $i >=0; $i--) {
            foreach ($this->getEmptyRow($i, $sizeOfRow)->getSquares() as $square) {
                $afterField->addSquare($square);
            }
        }
        return $this->outputFormatter->format($afterField);
    }

    private function getEmptyRow(int $y, int $size)
    {
        $squares = [];
        for ($x = 0; $x < $size; $x++) {
            $squares[$x] = new EmptySquare($x, $y);
        }

        return new SquareCollection($squares);
    }

}
