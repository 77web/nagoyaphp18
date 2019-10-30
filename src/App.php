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

        $afterField = new Field();
        foreach ($initialField->getRows() as $row) {
            if (!$row->isFilledWithBlock()) {
                foreach ($row as $square) {
                    $afterField->addSquare($square);
                }
            }
        }

        return $this->outputFormatter->formatField($afterField);
    }
}
