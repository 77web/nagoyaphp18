<?php


namespace Nagoya\Doukaku18;


class App
{
    public function run(string $input): string
    {
        $initialField = new Field();
        foreach ($this->inputConverter->convert($input) as $col) {
            foreach ($col as $square) {
                $initialField->addSquare($square);
            }
        }

        // 上〜下
        $rows = $initialField->getRows();

        $afterField = new Field();
        $newRowIndex = 0;
        foreach ($rows as $row) {
            if (!$row->isFilledWithBlock()) {
                foreach ($row->getSquares() as $square) {
                    $square->setY($newRowIndex);
                    $afterField->addSquare($square);
                }
                
                $newRowIndex++;
            }
        }

        return $this->outputFormatter->formatField($afterField);
    }
}
