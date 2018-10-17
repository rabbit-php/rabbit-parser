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
        if (!\function_exists('msgpack_pack')) {
            throw new \RuntimeException("The php extension 'swoole_serialize' is required!");
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
