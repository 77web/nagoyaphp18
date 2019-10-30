<?php


namespace Nagoya\Doukaku18;


class InputParser
{
    /**
     * @var ColumnTransformer
     */
    private $transformer;

    /**
     * @param ColumnTransformer $transformer
     */
    public function __construct(ColumnTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @param string $input
     * @return SquareCollection[]
     */
    public function parse(string $input)
    {
        $cols = explode('-', $input);

        $collections = [];
        foreach ($cols as $x => $col) {
            $collections[] = $this->transformer->reverseTransform($x, $col);
        }

        return $collections;
    }
}
