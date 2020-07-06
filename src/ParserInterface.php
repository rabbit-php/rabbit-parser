<?php
declare(strict_types=1);

namespace Rabbit\Parser;

/**
 * Interface ParserInterface
 * @package Rabbit\Parser
 */
interface ParserInterface
{
    /**
     * @param mixed $data
     * @return string
     */
    public function encode($data): string;

    /**
     * @param string $data
     * @return mixed
     */
    public function decode(string $data);
}
