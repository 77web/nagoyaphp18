<?php


namespace Nagoya\Doukaku18\Square;


class AbstractSquare
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     *
     * @param int $y
     * @return self
     */
    public function setY($y): self
    {
        $this->y = $y;

        return $this;
    }
}
