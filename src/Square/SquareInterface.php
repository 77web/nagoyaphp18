<?php


namespace Nagoya\Doukaku18\Square;


interface SquareInterface
{
    public function isBlock(): bool;

    public function getX(): int;

    public function getY(): int;
}
