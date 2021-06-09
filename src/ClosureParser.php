<?php

declare(strict_types=1);

namespace Rabbit\Parser;

use function Opis\Closure\serialize;
use function Opis\Closure\unserialize;

use Rabbit\Base\Exception\InvalidArgumentException;

class ClosureParser implements ParserInterface
{
    public function encode($closure): string
    {
        if (!is_callable($closure)) {
            throw new InvalidArgumentException('Argument invalid, it must be callable.');
        }

        return serialize($closure);
    }

    public function decode(string $serialized)
    {
        return unserialize($serialized);
    }
}
