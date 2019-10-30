<?php


namespace Nagoya\Doukaku18\Square;


interface SquareInterface
{
    public function isBlock(): bool;

    public function getX(): int;

    public function getY(): int;

    /**
     *
     * 列は変わることがないが行は変わることがある
     * @param int $y
     */
    public function setY(int $y): void;
}
