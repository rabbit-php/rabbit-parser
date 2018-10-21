<?php

namespace rabbit\parser;

use Swoole\Serialize;

/**
 * Class SwooleParser
 * @package rabbit\parser
 */
class SwooleParser implements ParserInterface
{
    /**
     * class constructor.
     * @throws \RuntimeException
     */
    public function __construct()
    {
        if (!\is_callable('\Swoole\Serialize::pack')) {
            throw new \RuntimeException("The php extension 'swoole' is required! or the swoole_serialize ini is not open!");
        }
    }

    /**
     * @param mixed $data
     * @return string
     */
    public function encode($data): string
    {
        return (string)Serialize::pack($data);
    }

    /**
     * @param string $data
     * @return mixed
     */
    public function decode(string $data)
    {
        return Serialize::unpack($data);
    }
}
