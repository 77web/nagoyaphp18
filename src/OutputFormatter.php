<?php


namespace Nagoya\Doukaku18;


class OutputFormatter
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

    public function format(Field $field): string
    {
        $cols = array_map(function(SquareCollection $col){
            return $this->transformer->transform($col);
        }, $field->getCols());

        return implode('-', $cols);
    }
}
